@extends('layouts.app')
@section('title', 'Search Question')

@section('content')

    <div class="bg-primary py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="card py-5">
            <div class="card-header">
                <h4>View Questions
{{--
                    <a href="{{url('user/add-post')}}" class="btn btn-primary float-end">Add Question</a>
--}}
                </h4>
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
                        {{--<th>Edit</th>
                        <th>Delete</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->name}}</td>
                        {{--<td>
                            <a href="{{url('user/post/'.$item->id)}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <a href="{{url('user/delete-post/'.$item->id)}}" class="btn btn-danger">Delete</a>
                        </td>--}}
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
