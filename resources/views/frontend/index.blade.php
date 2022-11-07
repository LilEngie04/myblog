@extends('layouts.app')

@section('title', "Auto Blog")
@section('meta_description', "Auto Blog")
@section('meta_keyword', "Auto Blog")

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

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Auto Blog</h4>
                <div class="underline"></div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor dolorum, facilis incidunt iure necessitatibus qui sunt ullam vel veniam! Ad adipisci eveniet hic impedit iure modi nam nesciunt repellat veniam?
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus illum repellat sunt totam. A atque dolor dolorum expedita explicabo fuga omnis placeat quasi reprehenderit vero? Corporis cumque ducimus excepturi rem!
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam asperiores at debitis dignissimos dolorum ea, enim esse itaque laboriosam minus, molestias natus nisi nobis nostrum quas, repellat repellendus tempora unde.
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
