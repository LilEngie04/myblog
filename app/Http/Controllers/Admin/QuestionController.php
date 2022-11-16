<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionFormRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('admin.questions.index', compact('questions'));
    }

    public function edit($question_id)
    {
        $question = Question::find($question_id);
        return view('admin.questions.edit', compact('question'));
    }
    public function update(QuestionFormRequest $request, $question_id)
    {
        $data = $request->validated();

        $question = Question::find($question_id);
        $question->name = $data['name'];
        $question->slug = Str::slug($data['slug']);
        $question->description = $data['description'];
        $question->status = $request->status == true ? '1': '0';
        $question->meta_title = $data['meta_title'];
        $question->meta_description = $data['meta_description'];
        $question->meta_keyword = $data['meta_keyword'];
        $question->created_by = Auth::user()->id;
        $question->update();

        return redirect('admin/questions')->with('message', 'Question Answered Successfully');
    }
}
