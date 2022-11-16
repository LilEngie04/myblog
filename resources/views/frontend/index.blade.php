@extends('layouts.app')

@section('title', "Auto Blog")
@section('meta_description', "Auto Blog")
@section('meta_keyword', "Auto Blog")

@section('content')

<div class="bg-primary py-5">
    <div class="container">
        <div class="row">
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>FoodChecker</h4>
                <div class="underline"></div>
                <p>
                    FoodChecker - це веб-сайт, створений з ціллю допомогти у виборі харчових продуктів за їх якістю та складом.
                </p>
            </div>
        </div>
    </div>
</div>


<div class="py-5 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Категорії продуктів</h4>
                <div class="underline"></div>
            </div>
            @foreach($all_categories as $all_cateitem)
                <div class="col-md-3">
                <div class="card card-body mb-3">
                    <a href="{{url('tutorial/'.$all_cateitem->slug)}}" class="text-decoration-none">
                        <h5 class="text-dark mb-0">{{$all_cateitem->name }}</h5>
                    </a>
                </div>
                </div>
            @endforeach
        </div>
    </div>
</div>



<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Останні запитання</h4>
                <div class="underline"></div>
            </div>
            <div class="col-md-8">
                @foreach($latest_questions as $latest_questions_item)
                    <div class="card card-body bg-gray shadow mb-3">
                        <a href="{{url('tutorial/'.$latest_questions_item->category->slug.'/'.$latest_questions_item->slug)}}" class="text-decoration-none">
                            <h5 class="text-dark mb-0">{{$latest_questions_item->name }}</h5>
                        </a>
                        <h6>Posted On: {{$latest_questions_item->created_at->format('d-m-Y')}}</h6>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
