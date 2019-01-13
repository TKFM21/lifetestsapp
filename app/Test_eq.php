<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test_eq extends Model
{
    protected $fillable = ['test_eq'];
    
    public function katabans()
    {
        return $this->hasMany(Kataban::class);
    }
}
