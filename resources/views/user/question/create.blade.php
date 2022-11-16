@extends('layouts.app')
@section('title', 'Add Question')
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

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif

            <div class="card-header">
                <h4>Задати питання</h4>
            </div>
            <div class="card-body">
                <form action="{{url('user/add-question')}}" method="POST">

                    @csrf

                    <div class="mb-3">
                        <label>Категорія</label>
                        <select name="category_id" class="form-control">
                            @foreach($category as $cateitem)
                                <option value="{{$cateitem->id}}">{{$cateitem->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Запитання</label>
                        <input type="text" name="name" class="form-control"/>
                    </div>

                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control"/>
                    </div>

                    {{--<h4>SEO Tags</h4>
                    <div class ="mb-3">
                        <label>Meta title</label>
                        <input type="text" name="meta_title" class="form-control">
                    </div>

                    <div class ="mb-3">
                        <label>Meta Keywords</label>
                        <textarea name="meta_keyword" rows ="3" class="form-control"></textarea>
                    </div>--}}

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary float-end">Зберегти запитання</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
