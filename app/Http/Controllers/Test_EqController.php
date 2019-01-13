<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Test_eq;

class Test_EqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test_eqs = Test_eq::all();
        return view('test_eqs.index', ['test_eqs' => $test_eqs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $test_eq = new Test_eq;
        return view('test_eqs.create', ['test_eq' => $test_eq]);
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
            'test_eq' => 'required|max:100|unique:test_eqs',
            'temp' => 'required|numeric',
            'maker' => 'required|max:50',
            'address' => 'required|max:150',
        ]);
        
        $test_eq = new Test_eq;
        $test_eq->test_eq = $request->test_eq;
        $test_eq->temp = $request->temp;
        $test_eq->maker = $request->maker;
        $test_eq->address = $request->address;
        $test_eq->save();
        return redirect('test_eqs');
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
