<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $all_categories = Category::where('status', '0')->get();
        $latest_questions=Question::orderBy('created_at', 'DESC')->get()->take(15);
        //$question = Question::all();
        return view( 'frontend.index', compact('all_categories', 'latest_questions'));
    }

    public function viewCategoryQuestion(string $category_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status','0')->first();
        if($category)
        {
            $question = Question::where('category_id', $category->id)->paginate(2);
            return view('frontend.question.index', compact('question', 'category'));
        }
        else
        {
            return redirect('/');
        }
    }

    public function viewQuestion(string $category_slug, string $question_slug, Request $request)
    {
        $category = Category::where('slug', $category_slug)->where('status','0')->first();
        if($category)
        {
            /** @var Question $question */
            $question = Question::where('category_id', $category->id)
                ->where('slug', $question_slug)
                ->first()
            ;

            $authors = User::all();

            if ($request->getMethod() === Request::METHOD_GET) {
                $comments = $question->comments;
            } else {
                $author = ($request->get('authors'));

                $comments = Comment::all()->where('user_id', $author)->where('question_id', $question->id);
            }

            $latest_questions = Question::where('category_id', $category->id)->orderBy('created_at', 'DESC')->get()->take(10);

            return view('frontend.question.view', compact('question', 'authors', 'comments', 'latest_questions'));
        }
        else
        {
            return redirect('/');
        }
    }
}
