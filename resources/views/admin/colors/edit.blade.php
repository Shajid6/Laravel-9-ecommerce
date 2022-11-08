@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Edit Colors

                        <a href="{{ url('admin/colors') }}" method="Post"
                            class="btn btn-primary btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">

                        @if ($errors->any())
                            <div class="alert alert-warning">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <form action="{{ url('admin/colors/' . $color->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="mb-3">
                                    <label>Color Name</label>
                                   
                                    <input type="text" name='name'value="{{ $color->name }}" class="form-control"required>
                                    
                                </div>
                                <div class="mb-3">
                                    <label>Color Code</label>
                                    <input type="text" name='code'value="{{ $color->code }}" class="form-control"required>
                                    
                                </div>
                                <div class="mb-3">
                                    <label>Status</label> <br />
                                    <input type="checkbox" name='status'{{ $color->staus ? 'checked' : '' }}
                                    style="width: 30px; height: 30px;" /> Checked-Hidden, UnChecked-Visible
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary float-end"> Update</button>
                                </div>
                            </div>
                        </form>

                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
