<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Http\Requests\User\QuestionFormRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::where('created_by', Auth::user()->id)->get();
        return view('user.question.index', compact('questions'));
    }

    public  function create()
    {
        $category = Category::where('status', '0')->get();
        return view('user.question.create', compact('category'));
    }

    public function store(QuestionFormRequest $request)
    {
        $data = $request->validated();
        //dd($request->hasFile('image'));
        $question = new Question;
        $question->name = $data['name'];
        $question->category_id = $data["category_id"];

/*        $category->navbar_status = $request->navbar_status == true ? '1':'0';*/
/*        $category->status = $request->status == true ? '1':'0';*/
        $question->created_by = Auth::user()->id;
        $question->save();

        return redirect('user/questions')->with('message', 'Question Sended Successfully');
    }

    public function edit($question_id)
    {
        $question = Question::find($question_id);
        $category = Category::all();
        return view('user.question.edit', compact('question', 'category'));
    }

    public function update(QuestionFormRequest $request, $question_id)
    {
        $data = $request->validated();
        //dd($request->hasFile('image'));

        $question = Question::find($question_id);
        $question->name = $data['name'];
        $question->slug = Str::slug($data['slug']);


/*        $category->navbar_status = $request->navbar_status == true ? '1':'0';*/
/*        $category->status = $request->status == true ? '1':'0';*/
        $question->created_by = Auth::user()->id;
        $question->update();

        return redirect('user/questions')->with('message', 'Question Updated Successfully');
    }

    public function destroy(Request $request)
    {
        $question = Question::find($request->question_delete_id);
        if($question)
        {
            $question->delete();
            return redirect('user/question')->with('message', 'Question Deleted Successfully');
        }
        else
        {
            return redirect('user/question')->with('message', 'No Question Id Found');
        }
    }
}
