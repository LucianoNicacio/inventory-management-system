<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function AllWarehouse()
    {
        $warehouse = warehouse::latest()->get();
        return view('admin.backend.warehouse.all_warehouse', compact('warehouse'));
    }

    public function AddWarehouse()
    {
        return view('admin.backend.warehouse.add_warehouse');
    }

    public function StoreWarehouse(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:warehouses,email|max:255',
            'phone' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',
        ]);

        Warehouse::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'phone' => $validate['phone'],
            'city' => $validate['city'],
        ]);

        $notification = array(
            'message' => 'Warehouse Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.warehouse')->with($notification);
    }

    public function EditWarehouse($id)
    {
        $warehouse = Warehouse::find($id);
        return view('admin.backend.warehouse.edit_warehouse', compact('warehouse'));
    }

    public function UpdateWarehouse(Request $request)
    {
        $warehouse_id = $request->id;

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',
        ]);

        Warehouse::find($warehouse_id)->update([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'phone' => $validate['phone'],
            'city' => $validate['city'],
        ]);

        $notification = array(
            'message' => 'Warehouse Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.warehouse')->with($notification);
    }

    public function DeleteWarehouse($id)
    {
        Warehouse::find($id)->delete();

        $notification = array(
            'message' => 'Warehouse Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
