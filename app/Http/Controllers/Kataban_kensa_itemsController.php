<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Kataban_kensa_item;
use App\Kataban;
use App\Kensa_c1;

class Kataban_kensa_itemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kataban_kensa_items = Kataban_kensa_item::all();
        return view('kataban_kensa_items.index', ['kataban_kensa_items' => $kataban_kensa_items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($kataban_id)
    {
        $data = [];
        $kataban_kensa_item = new Kataban_kensa_item;
        $kataban = Kataban::find($kataban_id);
        $kensa_c1s = Kensa_c1::all()->pluck('kensa_c1', 'id');
        
        $data = ['kataban_kensa_item' => $kataban_kensa_item, 'kensa_c1s' => $kensa_c1s, 'kataban' => $kataban];
        
        return view('kataban_kensa_items.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kataban_id' => 'required|integer',
            'kensa_c1_id' => ['required', 'integer',
                            Rule::unique('kataban_kensa_items')->where(function ($query) use($request) {
                                return $query->where('kataban_id', $request->kataban_id)
                                ->where('kensa_c1_id', $request->kensa_c1_id);
                            }),
                        ],
            'nominal_value' => 'required|numeric',
            'lower_value' => 'required|numeric',
            'upper_value' => 'required|numeric',
        ]);
        
        $kataban_kensa_item = new Kataban_kensa_item;
        $kataban_kensa_item->kataban_id = $request->kataban_id;
        $kataban_kensa_item->kensa_c1_id = $request->kensa_c1_id;
        $kataban_kensa_item->nominal_value = $request->nominal_value;
        $kataban_kensa_item->upper_value = $request->upper_value;
        $kataban_kensa_item->lower_value = $request->lower_value;
        $kataban_kensa_item->save();
        
        return redirect()->route('katabans.show', ['kataban_id' => $request->kataban_id]);
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
