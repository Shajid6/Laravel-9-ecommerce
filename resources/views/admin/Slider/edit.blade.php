@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Edit Slider

                        <a href="{{ url('admin/sliders') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">

        


                    <table class="table table-bordered table-striped">



                        <form action="{{ url('admin/sliders/' . $slider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3">
                                    <label>Title</label>
                                    
                                    <input type="text" name='title' value="{{ $slider->title }}"required class="form-control">
                                   
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <input type="text" name='description'value="{{ $slider->description }}"
                                        class="form-control"required>
                                        
                                    </div>

                                <div class="col-md-6 mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image"class="form-control btn " required/>
                                    <img src="{{ asset($slider->image) }}" style="width: 50px;height:50px;"
                                        class="me-4 border" alt="Slider"/><br /><br />
                                   
                                </div>
                                <div class="mb-3">
                                    <label>Status</label> <br />
                                    <input type="checkbox" name='status'{{ $slider->staus ? 'checked' : '' }}
                                        style="width: 50px; height: 50px;" />
                                    Checked-Hidden, UnChecked-Visible
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary float-end">Update</button>
                                </div>
                            </div>
                        </form>

                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
