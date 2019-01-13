<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $fillable = ['kataban_id'];
    
    public function kataban()
    {
        return $this->belongsTo(Kataban::class);
    }
    
    public function meas_records()
    {
        return $this->hasMany(Meas_record::class);
    }
}
