<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Kataban;
use App\Test_eq;
use App\Fan_kbn1;
use App\Status;
use App\Bb;
use App\User;
use App\Meas_record;

class KatabansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $katabans = Kataban::all();
        return view('katabans.index', ['katabans' => $katabans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $kataban = new Kataban;
        $test_eqs = Test_eq::all()->pluck('test_eq', 'id');
        $fan_kbn1s = Fan_kbn1::all()->pluck('fan_kbn1', 'id');
        $statuses = Status::all()->pluck('status', 'id');
        $bbs = Bb::all()->pluck('bb', 'id');
        $users = User::all()->pluck('name', 'id');
        $data = ['kataban' => $kataban, 'test_eqs' => $test_eqs, 'fan_kbn1s' => $fan_kbn1s, 'statuses' => $statuses, 'bbs' => $bbs, 'users' => $users];
        return view('katabans.create', $data);
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
            'kataban' => 'required|max:50|unique:katabans',
            'test_eq_id' => 'required|integer',
            'rated_voltage' => 'required|numeric',
            'expect_life_time' => 'required|numeric',
            'now_life_time' => 'required|numeric',
            'fan_kbn1_id' => 'required|integer',
            'status_id' => 'required|integer',
            'bb_id' => 'required|integer',
            'cd_user_id' => 'required|integer',
        ]);
        
        // $user = $request->user();
        $now = Carbon::now();
        $add3m = $now->addMonth(3);
        
        $kataban = new Kataban;
        $kataban->kataban = $request->kataban;
        $kataban->test_eq_id = $request->test_eq_id;
        $kataban->rated_voltage = $request->rated_voltage;
        $kataban->expect_life_time = $request->expect_life_time;
        $kataban->now_life_time = $request->now_life_time;
        $kataban->fan_kbn1_id = $request->fan_kbn1_id;
        $kataban->status_id = $request->status_id;
        $kataban->bb_id = $request->bb_id;
        $kataban->edit_user_id = $request->user()->id;
        $kataban->cd_user_id = $request->cd_user_id;
        $kataban->next_meas_at = $add3m;
        $kataban->save();
        return redirect('katabans');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $kataban = Kataban::find($id);
        $samples = $kataban->samples;
        $kataban_kensa_items = $kataban->kataban_kensa_items;
        
        $data = ['kataban' => $kataban, 'samples' => $samples, 'kataban_kensa_items' => $kataban_kensa_items];
        
        return view('katabans.show', $data);
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
