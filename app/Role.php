<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['role', 'priority'];
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
