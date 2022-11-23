<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'hQuestion' => 'required|string',
            'hItemDesc' => 'required|string',
            'hItemPoint' => ['required', Rule::in(['1','2','3','4'])]
        ]);

        $campos = $request->all();
        if (is_null($campos['hIdQuestion'])) {
            // No se ha creado aún la IdQuestion

            $question = new Question;
            $question->question = $campos['hQuestion'];
            $question->user_id = $campos['hUserId'];

            $question->save();

            $newItem = new Item();
            $newItem->desc = $campos['hItemDesc'];
            $newItem->point =  $campos['hItemPoint'];
            $newItem->type = $campos['hItemType'];
            $newItem->question_id = $question->id;
            $newItem->user_id = $campos['hUserId'];

            $newItem->save();

            $itemsPositives = Item::where('question_id', $question->id)
                                    ->where('type', 'positive')->get();
            $itemsNegatives = Item::where('question_id', $question->id)
                                    ->where('type', 'negative')->get();

            $userAuth = Auth::user();

            return view('itemsQuestionPage', ['itemsPositives' => $itemsPositives, 'itemsNegatives' => $itemsNegatives, 'question' => $question, 'userAuth' => $userAuth]);
        } else {
            // Se ha creado ya la IdQuestion

            $question = Question::find($campos['hIdQuestion']);

            $newItem = new Item();
            $newItem->desc = $campos['hItemDesc'];
            $newItem->point =  $campos['hItemPoint'];
            $newItem->type = $campos['hItemType'];
            $newItem->question_id = $campos['hIdQuestion'];
            $newItem->user_id = $campos['hUserId'];

            $newItem->save();

            $itemsPositives = Item::where('question_id', $campos['hIdQuestion'])
                                    ->where('type', 'positive')->get();
            $itemsNegatives = Item::where('question_id', $campos['hIdQuestion'])
                                    ->where('type', 'negative')->get();

            $userAuth = Auth::user();

            return view('itemsQuestionPage', ['itemsPositives' => $itemsPositives, 'itemsNegatives' => $itemsNegatives, 'question' => $question, 'userAuth' => $userAuth]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'hhItemDesc' => 'required|string',
            'hhItemPoint' => ['required', Rule::in(['1','2','3','4'])]
        ]);

        $campos = $request->only('hhItemDesc','hhItemPoint');
        $item->desc = $campos['hhItemDesc'];
        $item->point = $campos['hhItemPoint'];

        $item->save();

        return back()->with(["updateSuccess" => "Registro modificado", "idUpdated" => $item->id ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return back();
    }

    public function tip(Question $question)
    {
        $userAuth = Auth::user();
        if ($question->user_id == $userAuth->id) {
            $itemsPositives = Item::where('question_id', $question->id)
                                    ->where('type', 'positive')->get();
            $itemsNegatives = Item::where('question_id', $question->id)
                                    ->where('type', 'negative')->get();

            $sumaP = 0;
            $sumaN = 0;
            foreach ($itemsPositives as $itemPositive) {
                $sumaP += $itemPositive->point;
            }
            foreach ($itemsNegatives as $itemNegative) {
                $sumaN += $itemNegative->point;
            }

            $mediaG = count($itemsPositives) + count($itemsNegatives) / 2;
            $mediaP = $sumaP / $mediaG;
            $mediaN = $sumaN / $mediaG;
            $puntuacionP = round(($mediaP / ($sumaP + $sumaN)) * 100, 2);
            $puntuacionN = round(($mediaN / ($sumaP + $sumaN)) * 100, 2);

            $diferencia = round($puntuacionP - $puntuacionN, 2);

            if (abs($diferencia) > 1) {
                if ($diferencia > 0 ) {
                    // Positivo
                    $semaforo = 3;
                } else {
                    // Negativo
                    $semaforo = 1;
                }
            } else {
                // Indiferente
                $semaforo = 2;
            }

            return view('questionTipPage', ['puntuacionP' => $puntuacionP, 'puntuacionN' => $puntuacionN, 'semaforo' => $semaforo, 'question' => $question]);
        } else {
            return to_route('questionUser.list');
        }
    }
}
