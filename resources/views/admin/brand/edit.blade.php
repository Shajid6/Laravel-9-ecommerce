@extends('layouts.admin')
@section('content')
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <br />
                    <h4>Edit Brands
                        <a href="{{ url('admin/brands') }}" class="  btn btn-danger float-end text-white"> Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/brands/' . $brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class=" mb-3 py-4">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option
                                            value="{{ $category->id }}"{{ $category->id == $brand->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class=" mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $brand->name }}"class="form-control"required />
                           
                            </div>
                            <div class=" mb-3">
                                <label>Slug</label>
                                <input type="text" name="slug"value="{{ $brand->slug }}" class="form-control" required />
                              
                            </div>
                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control btn "required/>
                            </div>
                            <div class=" mb-3">
                                <label>Status</label><br>
                                <input type="checkbox" name="status"style="width: 30px; height: 30px;" {{ $brand->status == '1' ? 'checked' : '' }} />
                                @error('status')
                                    <small class="text-danger"> {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary float-end text-white">Update</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
