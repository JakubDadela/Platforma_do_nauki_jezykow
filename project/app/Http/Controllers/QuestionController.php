<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Storage;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Quiz $quiz)
    {
        //TODO add user name in questions index
        $questions = Question::all()->where('quiz_id', $quiz->id);
        return view('questions.index')->withQuiz($quiz)->withQuestions($questions);
    }
    public function index2(Quiz $quiz)
    {
        //TODO add user name in questions index
        $questions = Question::all()->where('quiz_id', $quiz->id);
        return view('quizzes.details')->withQuiz($quiz)->withQuestions($questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Quiz $quiz)
    {
        if(isset($request->create_new))
        {
            switch($request->question_type)
            {
                case 1:
                    return view('quizzes.question1.create')->withQuiz($quiz);
                case 2:
                    return view('quizzes.question2.create')->withQuiz($quiz);
                case 3:
                    return view('quizzes.question3.create')->withQuiz($quiz);
                case 4:
                    return view('quizzes.question4.create')->withQuiz($quiz);
                case 5:
                    return view('quizzes.question5.create')->withQuiz($quiz);
            }
        }
        switch($request->question_type)
        {
            case 1:
                return view('questions.question1.create')->withQuiz($quiz);
            case 2:
                return view('questions.question2.create')->withQuiz($quiz);
            case 3:
                return view('questions.question3.create')->withQuiz($quiz);
            case 4:
                return view('questions.question4.create')->withQuiz($quiz);
            case 5:
                return view('questions.question5.create')->withQuiz($quiz);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Quiz $quiz)
    {
        //TODO validation
        $request->validate([
            'answer' => 'required',
            'in_english' => 'required',
        ]);

        //TODO refactor
        $question = new Question();
        $question->in_english = $request->in_english;
        $question->answer = $request->answer;
        $question->quiz_id = $quiz->id;
        $question->is_correct = true;
        $question->type = $request->type;
        $question->save();

        if($question->type == 4)
        {
            $request->validate([
                'Answer_A'=>'required',
                'Answer_B'=>'required',
                'Answer_C'=>'required',
                'Answer_D'=>'required'
            ]);
            $option1 = new Option();
            $image = $request->file('Answer_A');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $option1->data = "images/" . $new_name;
            $option1->question_id = $question->id;
            $option1->save();

            $option2 = new Option();
            $image = $request->file('Answer_B');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $option2->data = "images/" . $new_name;
            $option2->question_id = $question->id;
            $option2->save();

            $option3 = new Option();
            $image = $request->file('Answer_C');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $option3->data = "images/" . $new_name;
            $option3->question_id = $question->id;
            $option3->save();

            $option4 = new Option();
            $image = $request->file('Answer_D');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $option4->data = "images/" . $new_name;
            $option4->question_id = $question->id;
            $option4->save();
        }
        else if($question->type == 3)
        {
            $request->validate([
                'answerA'=>'required',
                'answerB'=>'required',
                'answerC'=>'required',
                'answerD'=>'required'
            ]);
            $option1 = new Option();
            $option1->data = $request->answerA;
            $option1->question_id = $question->id;
            $option1->save();

            $option2 = new Option();
            $option2->data = $request->answerB;
            $option2->question_id = $question->id;
            $option2->save();

            $option3 = new Option();
            $option3->data = $request->answerC;
            $option3->question_id = $question->id;
            $option3->save();

            $option4 = new Option();
            $option4->data = $request->answerD;
            $option4->question_id = $question->id;
            $option4->save();
        }
        if(isset($request->create_new))
        {
            return $this->index2($quiz);
        }
        return redirect()->route('quizzes.questions.index', $quiz);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function edit(Request $request, Quiz $quiz,Question $question)
    {
        if(isset($request->create_new))
        {
            switch ($question->type) {
                case "1":
                {
                    return view('quizzes.question1.edit')->withQuiz($quiz)->withQuestion($question);
                }
                case "2":
                {
                    return view('quizzes.question2.edit')->withQuiz($quiz)->withQuestion($question);
                }
                case "3":
                {
                    $options = Option::query()->where('question_id', $question->id)->pluck('data');
                    return view('quizzes.question3.edit')->withQuiz($quiz)->withQuestion($question)->withOptions($options);
                }
                case "4":
                {
                    $options = Option::query()->where('question_id', $question->id)->pluck('data');
                    return view('quizzes.question4.edit')->withQuiz($quiz)->withQuestion($question)->withOptions($options);
                }
                default:
                {
                    return "No editing enabled yet";
                }
            }
        } else {
            switch ($question->type) {
                case "1":
                {
                    return view('questions.question1.edit')->withQuiz($quiz)->withQuestion($question);
                }
                case "2":
                {
                    return view('questions.question2.edit')->withQuiz($quiz)->withQuestion($question);
                }
                case "3":
                {
                    $options = Option::query()->where('question_id', $question->id)->pluck('data');
                    //dd($options);
                    return view('questions.question3.edit')->withQuiz($quiz)->withQuestion($question)->withOptions($options);
                }
                case "4":
                {
                    $options = Option::query()->where('question_id', $question->id)->pluck('data');
                    //dd($options);
                    return view('questions.question4.edit')->withQuiz($quiz)->withQuestion($question)->withOptions($options);
                }
                default:
                {
                    return "No editing enabled yet";
                }
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Quiz $quiz,Question $question)
    {
        $request->validate([
            'answer' => 'required',
            'in_english' => 'required',
        ]);

        Question::query()->where('id', $question->id)
            ->update(['answer' => $request->answer, 'in_english' => $request->in_english]);
        $quiz = Quiz::query()->where('id', $quiz->id)->first();

        if($question->type == "3")
        {
            $request->validate([
                'answerA'=>'required',
                'answerB'=>'required',
                'answerC'=>'required',
                'answerD'=>'required'
            ]);
            $letter = 'A';
            $options = Option::query()->where('question_id', $question->id)->get();
            foreach($options as $option)
            {
                $var = "answer".$letter++;
                $option->data = $request->$var;
                $option->save();
            }
        }
        if($question->type == 4)
        {
            $letter = 'A';
            $options = Option::query()->where('question_id', $question->id)->get();
            foreach($options as $option)
            {
                $var = "Answer_".$letter++;
                if(isset($request->$var)) {
                    File::delete($option->data);
                    $image = $request->file($var);
                    $new_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images'), $new_name);
                    $option->data = "images/" . $new_name;
                    $option->question_id = $question->id;
                    $option->save();
                }
            }
        }
        if($request->create_new)
        {
            $questions = Question::all()->where('quiz_id', $quiz->id);
            return view('questions.index')->withQuiz($quiz)->withQuestions($questions);
        }
        return view('quizzes.details')->withQuiz($quiz);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Quiz $quiz, Question $question)
    {
        $question->delete();
        if(isset($request->create_new))
        {
            $questions = Question::all()->where('quiz_id', $quiz->id);
            return view('questions.index')->withQuiz($quiz)->withQuestions($questions);
        }
        return view('quizzes.details')->withQuiz($quiz);
    }
}
