<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Quiz;
use App\Models\Subcomment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentSubcommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function index(Quiz $quiz,Comment $comment)
    {
        $subcomments=Subcomment::where('comment_id',$comment->id)->get();
        return view('commentssubcomments.index')->withQuiz($quiz)->withComment($comment)->withSubcomments($subcomments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function create(Quiz $quiz,Comment $comment)
    {
        return view("commentssubcomments.create")->withQuiz($quiz)->withComment($comment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Quiz $quiz,Comment $comment)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);
        $subcomment = new Subcomment();
        $subcomment->title = $request->title;
        $subcomment->text = $request->text;
        $subcomment->comment_id=$comment->id;
        $subcomment->user_id=$id = Auth::id();
        $subcomment->save();

        return redirect(route('quizzes.comments.subcomments.index', ['quiz'=>$quiz,'comment'=>$comment]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @param  \App\Models\Subcomment  $subcomment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment, Subcomment $subcomment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @param  \App\Models\Subcomment  $subcomment
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz,Comment $comment, Subcomment $subcomment)
    {
        return view('commentssubcomments.edit')->withQuiz($quiz)->withComment($comment)->withSubcomment($subcomment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @param  \App\Models\Subcomment  $subcomment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz,Comment $comment, Subcomment $subcomment)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
        ]);
        $subcomment->title = $request->title;
        $subcomment->text = $request->text;
        $subcomment->comment_id = $comment->id;
        $subcomment->user_id=$id = Auth::id();
        $subcomment->save();

        return redirect(route('quizzes.comments.subcomments.index', ['quiz'=>$quiz,'comment'=>$comment]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @param  \App\Models\Subcomment  $subcomment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz,Comment $comment, Subcomment $subcomment)
    {
        $subcomment->delete();
        return redirect(route('quizzes.comments.subcomments.index', ['quiz'=>$quiz,'comment'=>$comment]));
    }
}


