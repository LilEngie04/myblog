@extends('layouts.app')
@section('title', 'Search Question')

@section('content')

    {{--<div class="bg-primary py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>--}}

    <form action="/search" method="post" role="search">
        {{csrf_field()}}
        <div class="input-group">
            <input type="text" class="form-control" name="q" placeholder="Search question">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </form>

    <div class="container">
        @if(isset($details))
            <p> The Search results for your query <b> {{ $query }} </b> are :</p>
            <h2>Sample User details</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                </tr>
                </thead>
                <tbody>
                @foreach($details as $question)
                    <tr>
                        <td>{{$question->name}}</td>
                        <td>{{$question->slug}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Питання</h4>
                    <div class="underline"></div>
                </div>
                <div class="col-md-8">
                    <p> The Search results for your query <b> {{ $query }} </b> are :</p>

                @foreach($questions as $question)
                        <div class="card card-body bg-gray shadow mb-3">
                            <a href="{{url('/search')}}" class="text-decoration-none">
                                <h5 class="text-dark mb-0">{{$question->name }}</h5>
                            </a>
                            <h6>Posted On: {{$question->created_at->format('d-m-Y')}}</h6>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
{{--
    <div class="container-fluid py-5">
        <div class="card py-5">
            <div class="card-header">
                <h4>View Questions
--}}
{{--
                    <a href="{{url('user/add-post')}}" class="btn btn-primary float-end">Add Question</a>
--}}{{--

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
                        --}}
{{--<th>Edit</th>
                        <th>Delete</th>--}}{{--

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->name}}</td>
                        --}}
{{--<td>
                            <a href="{{url('user/post/'.$item->id)}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <a href="{{url('user/delete-post/'.$item->id)}}" class="btn btn-danger">Delete</a>
                        </td>--}}{{--

                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
--}}
@endsection
