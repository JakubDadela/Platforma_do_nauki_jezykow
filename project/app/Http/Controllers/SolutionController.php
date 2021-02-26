<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Solution;
use Auth;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Quiz $quiz)
    {
        return view('solutions.index')->withQuiz($quiz)
            ->withQuestions($quiz->question)
            ->withSolutions($quiz->solution)
            ->withTotal(0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Quiz $quiz)
    {
        return view("solutions.create")->withQuiz($quiz)->withQuestions($quiz->question);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Quiz $quiz)
    {
        $keys = $request->keys();
        $keys = array_slice($keys, 1);
        $answers = $request->all();
        $answers = array_slice($answers, 1);

        $i=0;
        $total = 0;
        foreach($answers as $answer)
        {
            $solution = new Solution();
            $solution->quiz_id = $quiz->id;
            $solution->user_id  = Auth::id();
            $solution->question_id = $keys[$i];
            $solution->answer = $answer;
            $solution->save();
            $i++;
        }

        $solutions = $quiz->solution->where('user_id', Auth::id());

        $result = new Result();
        $result->quiz_id  = $quiz->id;
        $result->user_id = Auth::id();
        $result->points_gained = $total;
        $result->save();


        return view('solutions.index')->withQuiz($quiz)
                                            ->withQuestions($quiz->question)
                                            ->withKeys($keys)
                                            ->withSolutions($solutions)
                                            ->withTotal($total);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function show(solution $solution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function edit(solution $solution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz,  Solution $solution)
    {
        $my_question = Question::all()->where('id', $solution->question->id)->first();
        if(isset($request->is_correct))
        {
            $my_question->is_correct = $request->is_correct;
            $my_question->save();
            $my_question->check = 0;
            return view('quizzes.details')->withQuiz($quiz)->withQuestions($quiz->questions);
        }
        else
        {
            $my_question->check = 1;
            $my_question->save();
            return view('solutions.index')->withQuiz($quiz)
                ->withQuestions($quiz->question)
                ->withSolutions($quiz->solution)
                ->withTotal(0);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function destroy(solution $solution)
    {
        //
    }
}
