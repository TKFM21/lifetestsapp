<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['status'];
    
    public function katabans()
    {
        return $this->hasMany(Kataban::class);
    }
}
