<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Question;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check())
        {
            $valadator = Validator::make($request->all(), [
                'comment_body' => 'required|string'
            ]);
            if ($valadator->fails())
            {
                return redirect()->back()->with('message', 'Comment area is mandatory');
            }
            $question = Question::where('slug', $request->question_slug)->where('status', '0')->first();
            if ($question) {
                Comment::create([
                    'question_id' => $question->id,
                    'user_id' => Auth::user()->id,
                    'comment_body' => $request->comment_body
                ]);
                return redirect()->back()->with('message', 'Commented Successfully');
            }
            else
            {
                return redirect()->back()->with('message', 'No such post found');
            }
        }
        else
        {
            return redirect('login')->with('message', 'Login first to comment');
        }
    }

    public function destroy(Request $request)
    {
        if(Auth::check())
        {
            $comment = Comment::where('id', $request->comment_id)->where('user_id', Auth::user()->id)->first();

            if ($comment)
            {
                $comment->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Comment Deleted Successfully'
                ]);
            } else
            {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong'
                ]);
            }
        } else
        {
            return response()->json([
                'status' => 401,
                'message' => 'Login to delete this comment'
            ]);
        }
    }

}
