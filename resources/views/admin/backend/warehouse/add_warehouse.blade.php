@extends('admin.admin_master')
@section('admin')
    <div class="content">
        
        <!-- Start Content-->
        <div class="container-xxl">
            
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Add Warehouse</h4>
                </div>
                
            </div>
            
            <!-- Form Validation -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        
                        <div class="card-body">
                            <form action="{{ route('store.warehouse') }}" method="post" class="row g-3">
                                @csrf
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label">Warehouse Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label @error('email') is-invalid @enderror">Warehouse Email</label>
                                    <input type="email" class="form-control" name="email">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label @error('phone') is-invalid @enderror">Warehouse Phone</label>
                                    <input type="text" class="form-control" name="phone">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label @error('city') is-invalid @enderror">Warehouse City</label>
                                    <input type="text" class="form-control" name="city">
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