@extends('layouts.master')
@section('title', 'View Questions')
@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
            </div>
            <div class="card-body">
                @if(session('massage'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif

                <table id="myDataTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Question</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->status == '1' ? 'Answered':'Waiting'}}</td>
                        <td>
                            <a href="{{url('admin/question/'.$item->id)}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <a href="{{url('admin/delete-question/'.$item->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
