<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kensa_c1 extends Model
{
    protected $fillable = ['kensa_c1', 'display_no'];
    
    public function kataban_kensa_items()
    {
        return $this->hasMany(Kataban_kensa_item::class);
    }
}
