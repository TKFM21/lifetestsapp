<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fan_kbn1 extends Model
{
    protected $fillable = ['fan_kbn1'];
    
    public function katabans()
    {
        return $this->hasMany(Kataban::class);
    }
}
