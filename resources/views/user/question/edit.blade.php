@extends('layouts.app')
@section('title', 'Edit Question')
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
    <div class="container-fluid px-4">
        <div class="card mt-4">

            <div class="card-header">
                <h4>Edit Post
                    <a href="{{url('user/questions')}}" class="btn btn-danger float-end">Назад</a>
                </h4>
            </div>
            <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{url('user/update-question/'.$question->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id" required class="form-control">
                            <option value="">--- Select Category ---</option>
                            @foreach($category as $cateitem)
                                <option value="{{$cateitem->id}}" {{$post->category_id == $cateitem->id ? 'selected':''}}>
                                    {{$cateitem->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Питання</label>
                        <input type="text" name="name" value="{{$post->name}}" class="form-control"/>
                    </div>

                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" value="{{$post->slug}}" class="form-control"/>
                    </div>

                    <h4>SEO Tags</h4>
                    <div class ="mb-3">
                        <label>Meta title</label>
                        <input type="text" name="meta_title" value="{{$post->meta_title}}" class="form-control">
                    </div>

                    <div class ="mb-3">
                        <label>Meta Keywords</label>
                        <textarea name="meta_keyword" rows ="3" class="form-control">{!! $post->meta_keyword !!}</textarea>
                    </div>

                    <h4>Status </h4>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary float-end">Оновити питання</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
