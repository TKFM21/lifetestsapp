<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meas_record extends Model
{
    protected $fillable = ['sample_id', 'kataban_kensa_item_id', 'meas_record', 'inspector_id', 'judge_id'];
    
    public function judge()
    {
        return $this->belongsTo(Judge::class);
    }
    
    public function kataban_kensa_item()
    {
        return $this->belongsTo(Kataban_kensa_item::class);
    }
    
    public function sample()
    {
        return $this->belongsTo(Sample::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'inspector_id');
    }
}
