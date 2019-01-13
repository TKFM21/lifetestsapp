<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kataban extends Model
{
    protected $fillable = ['kataban', 'test_eq_id', 'rated_voltage', 'expect_life_time', 'now_life_time', 'fan_kbn1_id', 'status_id', 'bb_id', 'edit_user_id', 'cd_user_id', 'next_meas_at'];
    
    public function test_eq()
    {
        return $this->belongsTo(Test_eq::class);
    }
    
    public function fan_kbn1()
    {
        return $this->belongsTo(Fan_kbn1::class);
    }
    
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    
    public function bb()
    {
        return $this->belongsTo(Bb::class);
    }
    
    public function edit_user()
    {
        return $this->belongsTo(User::class, 'edit_user_id');
    }
    
    public function cd_user()
    {
        return $this->belongsTo(User::class, 'cd_user_id');
    }
    
    public function samples()
    {
        return $this->hasMany(Sample::class);
    }
    
    public function kataban_kensa_items()
    {
        return $this->hasMany(Kataban_kensa_item::class);
    }
}
