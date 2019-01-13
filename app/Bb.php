<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bb extends Model
{
    protected $fillable = ['bb'];
    
    public function katabans()
    {
        return $this->hasMany(Kataban::class);
    }
}
