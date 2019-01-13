<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'gender_id', 'role_id', 'department_id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function katabans_edit_users()
    {
        return $this->hasMany(Kataban::class, 'edit_user_id');
    }
    
    public function katabans_cd_users()
    {
        return $this->hasMany(Kataban::class, 'cd_user_id');
    }
    
    public function meas_records()
    {
        return $this->hasMany(Meas_record::class, 'inspector_id');
    }
}
