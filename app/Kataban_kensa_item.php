<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kataban_kensa_item extends Model
{
    protected $fillable = ['kataban_id', 'kensa_c1_id', 'nominal_value', 'lower_value', 'upper_value'];
    
    public function kataban()
    {
        return $this->belongsTo(Kataban::class);
    }
    
    public function kensa_c1()
    {
        return $this->belongsTo(Kensa_c1::class);
    }
    
    public function meas_records()
    {
        return $this->hasMany(Meas_record::class);
    }
}
