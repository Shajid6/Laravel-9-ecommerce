@extends('layouts.admin')
@section('content')
@section('title', 'Edit User-')

<div class="row">
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
    <div class="col-md-10 m-auto">
        <div class="card">
            <div class="card-header">
                <h4>Add User
                    <a href="{{ url('admin/user') }}" class="  btn btn-danger float-end text-white">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <form action="{{ url('admin/user/'.$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>User Name</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control" required/>
                      
                    </div>
                    <div class="mb-3">
                        <label> Email</label>

                        <input type="text" name="email" value="{{$user->email}}" class="form-control" required/>
                       
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control"/>
                       
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Select Role</label>
                        <select name="role_as" class="form-control"required>
                            <option value="">Select User/Admin</option>
                            <option value="0"{{$user->role_as=='0' ? 'selected': ''}}>User</option>
                            <option value="1"{{$user->role_as=='1' ? 'selected': ''}}>Admin</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end text-white">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
