<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sample;
use App\Kataban;

class SamplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $samples = Sample::all();
        return view('samples.index', ['samples' => $samples]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $sample = new Sample;
        $katabans = Kataban::all()->pluck('kataban', 'id');
        $data = ['sample' => $sample, 'katabans' => $katabans];
        
        return view('samples.create', $data);
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
        ]);
        
        $sample = new Sample;
        $sample->kataban_id = $request->kataban_id;
        $sample->save();
        return back();
    }
    
    public function directstore($id)
    {
        $sample = new Sample;
        $sample->kataban_id = $id;
        $sample->save();
        return redirect('katabans.show');
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
