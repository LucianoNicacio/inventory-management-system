@extends('admin.admin_master')
@section('admin')
    <div class="content">
        
        <!-- Start Content-->
        <div class="container-xxl">
            
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Edit Customer</h4>
                </div>
                
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item active">Edit Customer</li>
                    </ol>
                </div>
            </div>
            
            <!-- Form Validation -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Edit Customer</h5>
                        </div><!-- end card header -->
                        
                        <div class="card-body">
                            <form action="{{ route('update.customer') }}" method="post" class="row g-3" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $customer->id }}">
                                
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label">Customer Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $customer->name }}">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label @error('email') is-invalid @enderror">Customer Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $customer->email }}">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label @error('phone') is-invalid @enderror">Customer Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label @error('address') is-invalid @enderror">Customer Address</label>
                                    <input type="text" class="form-control" name="address" value="{{ $customer->address }}">
                                    @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Save Change</button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            
            </div>
        
        </div> <!-- container-fluid -->
    
    </div>
@endsection