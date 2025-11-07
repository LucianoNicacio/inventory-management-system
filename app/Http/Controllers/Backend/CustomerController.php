<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function AllCustomer()
    {
        $customer = Customer::latest()->get();
        return view('admin.backend.customer.all_customer', compact('customer'));
    }

    public function AddCustomer()
    {
        return view('admin.backend.customer.add_customer');
    }

    public function StoreCustomer(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|unique:customers,email|max:255',
            'address' => 'required|string|max:255',
        ]);

        Customer::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'phone' => $validate['phone'],
            'address' => $validate['address'],
        ]);

        $notification = array(
            'message' => 'Customer Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.customer')->with($notification);
    }

    public function EditCustomer($id){
        $customer = Customer::find($id);
        return view('admin.backend.customer.edit_customer', compact('customer'));
    }

    public function UpdateCustomer(Request $request){
        $customer_id = $request->id;

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        Customer::find($customer_id)->update([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'phone' => $validate['phone'],
            'address' => $validate['address'],
        ]);

        $notification = array(
            'message' => 'Customer Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.customer')->with($notification);
    }

    public function DeleteCustomer($id){
        Customer::find($id)->delete();

        $notification = array(
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
