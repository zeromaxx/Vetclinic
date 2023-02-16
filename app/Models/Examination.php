<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Examination extends Model
{
    use SoftDeletes;
    protected $table = 'examinations';

    public $timestamps = true;

    public function examinations()
    {
        return $this->hasMany('App\Models\PetExamination', 'examinationId');
    }
}
