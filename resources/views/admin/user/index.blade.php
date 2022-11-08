@extends('layouts.admin')
@section('content')
@section('title','Users-')
<div class="row ">
        @if (session('message'))
            <div class="alert alert-success"> {{ session('message') }}</div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Users List
                        <a href="{{ url('admin/user/create') }}" class="btn btn-primary float-end"> Add User </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Admin/User</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                    
                                            {{ $user->email }}
                                      
                                    </td>
                                    <td>
                                       @if($user->role_as==0)

                                        <label class="badge btn-danger">User</label>

                                       
                                       @elseif($user->role_as ==1)
                                        <label class="badge btn-primary">Admin</label>
                                       @else
                                         <label class="badge btn-primary">None</label>
                                       
                                       @endif
                                    </td>
                                    <td>{{ $user->status == '1 ' ? 'hidden' : 'visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/user/' . $user->id . '/edit') }}"
                                            class="btn btn-success btn-sm">
                                            Edit </a>

                                        <a type="button" href="{{ url('admin/user/' . $user->id . '/delete') }}"
                                            class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this data?')"
                                            data-bs-target="#exampleModal2">
                                            Delete </a>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="5">No users Found</td>
                                </tr>
                        </tbody>
                        @endforelse
                    </table><br />
                 {{ $users->links() }}
                  

                </div>
            </div>
        </div>
    </div>

@endsection