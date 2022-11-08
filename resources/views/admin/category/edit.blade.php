@extends('layouts.admin')
@section('content')
    <div class="row ">
        <div class="col-md-12">
              @if ($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Opps Something went wrong</strong></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Edit Category
                        <a href="{{ url('admin/category') }}" class="  btn btn-danger float-end text-white"> Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-10 mb-3">
                                <label>Name</label>
                                <input type="text" name="name"
                                    value="{{ $category->name }}"class="form-control"required />

                            </div>
                            <div class="col-md-10 mb-3">
                                <label>Slug</label>
                                <input type="text" name="slug"value="{{ $category->slug }}" class="form-control"
                                    required />

                            </div>

                            <div class="col-md-10 mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" />

                                <div>
                                    @if ($category->image)
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="{{ asset($category->image) }}" style="width: 50px;height:50px;"
                                                    class="me-4 border" alt="img" /><br /><br />
                                            </div>
                                        </div>
                                    @else
                                        <h5>No Image Added</h5>
                                    @endif
                                </div>


                            </div>
                            <div class="col-md-10 mb-3">

                                <label>Select parent category*</label>
                                <select type="text" name="parent_id" class="form-control">
                                    <option value="">None</option>
                                    @if ($categories)
                                        @foreach ($categories as $category)
                                            <?php $dash = ''; ?>
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Status</label><br>
                                <input type="checkbox" name="status"
                                    style="width: 30px; height: 30px;"{{ $category->status == '1' ? 'checked' : '' }} />

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
