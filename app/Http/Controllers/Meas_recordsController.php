<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Meas_record;
use App\Judge;
use App\Sample;
use App\Kataban_kensa_item;
use App\User;
use App\Kataban;

class Meas_recordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meas_records = Meas_record::all();
        return view('meas_records.index', ['meas_records' => $meas_records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * $sample_array = [];
        foreach($samples as $sample){
            $sample_array += [$sample->id => $sample->kataban->kataban.'('.$sample->id.')'];
        }
       $kataban_kensa_item_array = [];
        foreach($kataban_kensa_items as $kataban_kensa_item){
            $kataban_kensa_item_array += [$kataban_kensa_item->id => $kataban_kensa_item->kensa_c1->kensa_c1.'('.$kataban_kensa_item->kataban->kataban.')'];
        }
     */
    public function create($sample_id)
    {
        $data = [];
        $meas_record = new Meas_record;
        $sample = Sample::find($sample_id);
        $kataban_kensa_items = $sample->kataban->kataban_kensa_items;
        $judges = Judge::all()->pluck('judge', 'id');
        
        $data = ['meas_record' => $meas_record, 'sample' => $sample, 'kataban_kensa_items' => $kataban_kensa_items, 'judges' => $judges];
        return view('meas_records.create', $data);
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
            'sample_id' => 'required|integer',
        ]);
        
        $sample = Sample::find($request->sample_id);
        $kataban_kensa_items = $sample->kataban->kataban_kensa_items;
        foreach($kataban_kensa_items as $kataban_kensa_item){
            $this->validate($request, [
            't'.$kataban_kensa_item->id => 'required|numeric',
            'judge_id'.$kataban_kensa_item->id => 'required|integer',
            ]);
            $meas_record = new Meas_record;
            $meas_record->sample_id = $request->sample_id;
            $meas_record->kataban_kensa_item_id = $kataban_kensa_item->id;
            $kataban_kensa_item_id = 't'.$kataban_kensa_item->id;
            $meas_record->meas_record = $request->$kataban_kensa_item_id;
            $meas_record->inspector_id = $request->user()->id;
            $judge_id = 'judge_id'.$kataban_kensa_item->id;
            $meas_record->judge_id = $request->$judge_id;
            $meas_record->save();
        }
        
        $kataban = Kataban::find($sample->kataban->id);
        
        return redirect()->route('katabans.show', ['kataban_id' => $kataban->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sample_id)
    {
        $data = [];
        $sample = Sample::find($sample_id);
        $kataban = $sample->kataban;
        $kataban_kensa_items = $kataban->kataban_kensa_items;
        $meas_records = [];
        foreach($kataban_kensa_items as $kataban_kensa_item){
            $meas_record_x = Meas_record::where([
                ['sample_id', $sample_id],
                ['kataban_kensa_item_id', $kataban_kensa_item->id]
            ])->get();
            $meas_records += [$kataban_kensa_item->kensa_c1->kensa_c1 => $meas_record_x];
        }
        $data = ['sample' => $sample, 'kataban' => $kataban, 'kataban_kensa_items' => $kataban_kensa_items, 'meas_records' => $meas_records];
        return view('meas_records.show', $data);
        //$is = $meas_records['Main Speed'];
        //foreach($is as $i){echo $i->meas_record;echo '<br>';}
        //echo '<br>';
        //echo '<br>';
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
