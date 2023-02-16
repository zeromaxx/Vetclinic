<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use SoftDeletes;
    protected $table = 'pets';

    public $timestamps = true;

    protected $fillable = [
        'userId',
        'name',
        'animal_id',
        'weight',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'userId');
    }

    public function animal()
    {
        return $this->belongsTo('App\Models\Animal', 'animal_id');
    }

   
}
