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
                    <h4>Add Category
                        <a href="{{ url('admin/category') }}" class="  btn btn-danger float-end text-white"> Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table>
                        <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-10 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" required />

                                </div>
                                <div class="col-md-10 mb-3">
                                    <label>Slug</label>
                                    <input type="text" name="slug" class="form-control" required />

                                </div>

                                <div class="col-md-10 mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control btn " />
                                </div>

                                <div class="col-md-10 mb-3">

                                   


                                    <label>Select parent category*</label>
                                    <select type="text" name="parent_id" class="form-control">
                                        <option value="">None</option>
                                        @if($categories)
                                            @foreach($categories as $category)
                                                <?php $dash=''; ?>
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>


                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Status</label><br>
                                    <input type="checkbox"style="width: 30px; height: 30px;" name="status" />
                                </div>


                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn btn-primary float-end text-white">Save</button>
                                </div>
                            </div>

                        </form>

                </div>
            </div>
        </div>
    </div>
    </table>
@endsection
