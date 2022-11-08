<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('user.question.index', compact('questions'));
    }

    public  function create()
    {
        $category = Category::where('status', '0')->get();
        return view('user.question.create', compact('category'));
    }
}
