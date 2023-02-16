<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetExamination extends Model
{
    protected $table = 'pets_examinations';

    public $timestamps = true;

    protected $fillable = [
        'petId',
        'examinationId',
        'appointment_id',
        'total',
        'comments'
    ];

    public function pet()
    {
        return $this->belongsTo('App\Models\Pet', 'petId');
    }

    public function examination()
    {
        return $this->belongsTo('App\Models\Examination', 'examinationId');
    }

    public function appointment()
    {
        return $this->belongsTo('App\Models\Appointment', 'appointment_id');
    }
}
