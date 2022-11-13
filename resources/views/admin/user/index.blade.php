@extends('layouts.master')
@section('title', 'View Users')
@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>View Users</h4>
            </div>
            <div class="card-body">
                @if(session('massage'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif

                <table id="myDataTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Status</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->role_as == '1' ? 'Admin':'User'}}</td>
                            <td>
                                <a href="{{url('admin/user/'.$item->id)}}" class="btn btn-success">Edit</a>
                            </td>
                            @if($item->status == 1)
                            <td>
                                <a href="{{route('user.status.update', ['user_id' => $item->id, 'status_code' => 0])}}" class="btn btn-warning">Ban</a>
                            </td>
                            @else
                            <td>
                                <a href="{{route('user.status.update', ['user_id' => $item->id, 'status_code' => 1])}}" class="btn btn-success">Check</a>
                            </td>
                            @endif
                            <td>
                                <a href="{{url('admin/user/'.$item->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
