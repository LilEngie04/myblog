@extends('layouts.master')
@section('title', 'Answer Question')
@section('content')

    <div class="container-fluid px-4">
        <div class="card mt-4">

            <div class="card-header">
                <h4>Answer Question
                    <a href="{{url('admin/questions')}}" class="btn btn-danger float-end">BACK</a>
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

                <form action="{{url('admin/update-question/'.$question->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>cat Name</label>
                        <input type="text" name="name" value="{{$question->category->name}}" class="form-control"/>
                    </div>

                    <div class="mb-3">
                        <label>Question Name</label>
                        <input type="text" name="name" value="{{$question->name}}" class="form-control"/>
                    </div>

                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" value="{{$question->slug}}" class="form-control"/>
                    </div>

                    <div class ="mb-3">
                        <label>Description</label>
                        <textarea name="description" id="mySummernote" rows="4" class="form-control">{!!$question->description !!}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>YouTube Iframe Link</label>
                        <input type="text" name="yt_iframe" value="{{$question->yt_iframe}}" class="form-control"/>
                    </div>

                    <h4>SEO Tags</h4>
                    <div class ="mb-3">
                        <label>Meta title</label>
                        <input type="text" name="meta_title" value="{{$question->meta_title}}" class="form-control">
                    </div>

                    <div class ="mb-3">
                        <label>Meta Description</label>
                        <textarea name="meta_description" rows ="3" class="form-control">{!! $question->meta_description !!}</textarea>
                    </div>

                    <div class ="mb-3">
                        <label>Meta Keywords</label>
                        <textarea name="meta_keyword" rows ="3" class="form-control">{!! $question->meta_keyword !!}</textarea>
                    </div>

                    <h4>Status </h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Status</label>
                                <input type="checkbox" name ="status" {{$question->status == '1' ? 'checked':''}}/>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary float-end">Answer Question</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
