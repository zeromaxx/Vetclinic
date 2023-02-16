<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;
    protected $table = 'appointments';

    protected $tinestamps = true;

    protected $fillable = [
        'user_id',
        'pet_id',
        'schedule_date',
        'time',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function pet()
    {
        return $this->belongsTo('App\Models\Pet', 'pet_id');
    }

    public function petexamination()
    {
        return $this->hasMany('App\Models\PetExamination', 'appointment_id');
    }
}
