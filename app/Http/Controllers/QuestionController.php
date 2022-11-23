<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userAuth = Auth::user();
        $questions = Question::where('user_id', $userAuth->id)->get();

        return view('questionListPage', ['questions' => $questions, 'userAuth' => $userAuth]);
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
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $userAuth = Auth::user();

        if (is_null($question->id)) {
            $itemsPositives = [];
            $itemsNegatives = [];
        } else {
            if ($question->user_id == $userAuth->id) {
                $itemsPositives = Item::where('question_id', $question->id)
                                        ->where('type', 'positive')->get();
                $itemsNegatives = Item::where('question_id', $question->id)
                                        ->where('type', 'negative')->get();
            } else {
                return to_route('questionUser.list');
            }
        }

        return view('itemsQuestionPage', ['itemsPositives' => $itemsPositives, 'itemsNegatives' => $itemsNegatives, 'question' => $question, 'userAuth' => $userAuth]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $request->validate([
            'hQuestion' => 'required|string'
        ]);

        $campos = $request->only('hQuestion');
        $question->question = $campos['hQuestion'];

        $question->save();

        return back()->with(["updateSuccess" => "Registro modificado", "idUpdated" => $question->id ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        $url = redirect()->getUrlGenerator()->previous();
        if (str_contains($url, "members-list")) {
            //$questions = Question::all();
            //$userAuth = Auth::user();

            return to_route('questionUser.list')->with("destroySuccess", "Registro borrado");
        } else {
            return back()->with("destroySuccess", "Registro borrado");
        }
    }
}
