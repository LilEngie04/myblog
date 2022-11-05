@extends('layouts.app')

@section('title', "Auto Blog")
@section('meta_description', "Auto Blog")
@section('meta_keyword', "Auto Blog")

@section('content')

<div class="bg-primary py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="owl-carousel category-carousel owl-theme">

                    @foreach($all_categories as $all_cate_item)
                    <div class="item">
                        <a href="{{ url('tutorial/'.$all_cate_item->slug)}}" class="text-decoration-none">
                        <div class="card">
                            <img src="{{asset('uploads/category/'.$all_cate_item->image)}}" alt="Image">
                            <div class="card-body text-center">
                                <h5 class="text-dark">{{ $all_cate_item->name }}</h5>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>


<div class="py-1 bg-gray">
    <div class="container">
        <div class="border text-center p-3">
            <h3>Advertise here</h3>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Auto Blog</h4>
                <div class="underline"></div>
                <p>
                    Art is a diverse range of human activity, and resulting product, that involves creative or imaginative talent expressive of technical proficiency, beauty, emotional power, or conceptual ideas.
                </p>
                <p>
                    There is no generally agreed definition of what constitutes art and its interpretation has varied greatly throughout history and across cultures. The three classical branches of visual art are painting, sculpture, and architecture.
                </p>
                <p>
                    Theatre, dance, and other performing arts, as well as literature, music, film and other media such as interactive media, are included in a broader definition of the arts.
                </p>
            </div>
        </div>
    </div>
</div>


<div class="py-5 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>All Categories List</h4>
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
                <h4>Latest Posts</h4>
                <div class="underline"></div>
            </div>
            <div class="col-md-8">
                @foreach($latest_posts as $latest_posts_item)
                    <div class="card card-body bg-gray shadow mb-3">
                        <a href="{{url('tutorial/'.$latest_posts_item->category->slug.'/'.$latest_posts_item->slug)}}" class="text-decoration-none">
                            <h5 class="text-dark mb-0">{{$latest_posts_item->name }}</h5>
                        </a>
                        <h6>Posted On: {{$latest_posts_item->created_at->format('d-m-Y')}}</h6>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="border text-center p-3">
                    <h3>Advertise here</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
