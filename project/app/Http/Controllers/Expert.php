<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Quiz;
use Auth;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Collection;

class Expert extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language = Language::all()->where('language', ucfirst(Auth::user()->expert))->first();
        if($language)
        {
            $language_id = $language->id;
            $quizzes = Quiz::all()->where('language_id', $language_id);
            return view('expert.index')->withQuizzes($quizzes);
        }
        else if(Auth::user()->expert)
        {
            $quizzes = array();
            return view('expert.index')->withQuizzes($quizzes);
        }
        else
        {
            return redirect('/quizzes');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
