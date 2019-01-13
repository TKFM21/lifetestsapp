<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    protected $fillable = ['judge'];
    
    public function meas_records()
    {
        return $this->hasMany(Meas_record::class);
    }
}
