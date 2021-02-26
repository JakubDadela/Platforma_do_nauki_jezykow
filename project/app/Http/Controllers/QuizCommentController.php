<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function index(Quiz $quiz)
    {
        $comments=Comment::where('quiz_id',$quiz->id)->get();
        return view('quizzescomments.index')->withComments($quiz->comment)->withQuiz($quiz);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function create(Quiz $quiz)
    {
        return view("quizzescomments.create")->withQuiz($quiz);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Quiz $quiz)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);
        $comment = new Comment();
        $comment->title = $request->title;
        $comment->text = $request->text;
        $comment->quiz_id = $quiz->id;
        $comment->user_id=$id = Auth::id();
        $comment->save();

        return redirect(route('quizzes.comments.index', $quiz));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz, Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz, Comment $comment)
    {
        return view('quizzescomments.edit')->withComment($comment)->withQuiz($quiz);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz, Comment $comment)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);
        $comment->title = $request->title;
        $comment->text = $request->text;
        $comment->quiz_id = $quiz->id;
        $comment->user_id=$id = Auth::id();
        $comment->save();

        return redirect(route('quizzes.comments.index', $quiz));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz, Comment $comment)
    {
        $comment->delete();
        return redirect(route('quizzes.comments.index',$quiz));
    }
}
