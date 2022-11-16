@extends('layouts.app')

@section('title', "$question->meta_title")
@section('meta_description', "$question->meta_description")
@section('meta_keyword', "$question->meta_keyword")

@section('content')

    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="category-heading">
                        <h4 class="mb-0">{!!  $question->name !!}</h4>
                    </div>

{{--                    <div class="mt-3">
                        <h6>{{$post->category->name .'/'. $post->name}}</h6>
                    </div>--}}

                    <div class="card card-shadow mt-4">
                        <div class="card-body">
                            {!!  $question->description !!}
                        </div>
                    </div>

                    <div class="comment-area mt-4">
                        @if(session('message'))
                            <h6 class="alert alert-warning mb-3">{{  session('message')  }}</h6>
                        @endif
                        <div class="card card-body">
                            <h6 class="card-title">Leave a comment</h6>
                            <form action="{{ url('comments') }}" method="POST">
                                @csrf
                                <input type="hidden" name="question_slug" value="{{$question->slug}}">
                                <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>

                        @forelse($comments as $comment)
                        <div class="comment-container card card-body shadow-sm mt-3">
                            <div class="detail-area">
                                <h6 class="user-name mb-1">
                                    @if($comment->user)
                                        {{$comment->user->name}}
                                    @endif
                                    <smal class="ms-3 text-primary">Commented on: {{$comment->created_at->format('d-m-y')}}</smal>
                                </h6>
                                <p class="user-command mb-1">
                                    {!!  $comment->comment_body !!}
                                </p>
                            </div>
                            @if(Auth::check() && Auth::id() == $comment->user_id)
                                <div>
                                    <a href="" class="btn btn-primary btn-sm me-2">Edit</a>
                                    <button type="button" value="{{$comment->id}}" class="deleteComment btn btn-danger btn-sm me-2">Delete</button>
                                </div>
                            @endif
                        </div>
                            @empty
                                <div class="card card-body shadow-sm mt-3">
                                <h6>No Comment Yet</h6>
                                </div>
                            @endforelse
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="border p-2 my-2">
                        <h4>Advertising area</h4>
                    </div>
                    <div class="border p-2 my-2">
                        <h4>Advertising area</h4>
                    </div>
                    <div class="border p-2 my-2">
                        <h4>Advertising area</h4>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
                        </div>
                        <div class="card-body">
                            @foreach($latest_questions as $latest_question_item)
                                <a href="{{url('tutorial/'.$latest_question_item->category->slug.'/'.$latest_question_item->slug)}}" class="text-decoration-none">
                                    <h6>{{$latest_question_item->name}}</h6>
                                </a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.deleteComment', function (){
                if (confirm('Are you sure you want to delete this comment?'))
                {
                    var thisClicked = $(this);
                    var comment_id = thisClicked.val();

                    $.ajax({
                        type: "POST",
                        url: "/delete-comment",
                        data: {
                            'comment_id': comment_id
                        },
                        success: function (res) {
                            if(res.status == 200)
                            {
                                thisClicked.closest('.comment-container').remove();
                                alert(res.message);
                            } else {
                                alert(res.message);
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection

