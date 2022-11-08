@extends('layouts.admin')
@section('content')
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Brand
                        <a href="{{ url('admin/brands') }}" class="  btn btn-danger float-end text-white">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table>
                        <form action="{{ url('admin/brands') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="mb-3">
                                <label>Select Category</label>
                                <select name="category_id" required class="form-control">
                                    <option value="">-- Select parent Category --</option>
                                    @foreach ($categories as $categoryItem)
                                        <option value="{{ $categoryItem->id }}">{{ $categoryItem->name }}</option>
                                    @endforeach
                                </select>
                             
                            </div>


                            <div class="mb-3">
                                <label>Brand Name</label>
                                <input type="text" name="name" class="form-control"required />
                            
                            </div>
                            <div class="mb-3">
                                <label>Brand Slug</label>
                    
                            <input type="text" name="slug" class="form-control" required/>
                         
                            </div>

                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control btn "required/>
                            </div>

                            <div class="mb-3">
                                <label>Status</label> <br />
                                <input type="checkbox"style="width: 30px; height: 30px;" name="status">
                                @error('status')
                                    <small style="width: 40px; height: 40px;" class="text-danger">{{ $message }}</small>
                                @enderror Checked-Hidden, Un-Checked= Visible
                            </div>
                 <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary float-end text-white">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </table>
@endsection
