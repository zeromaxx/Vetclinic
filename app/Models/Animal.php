<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Animal extends Model
{
    use SoftDeletes;

    protected $table = 'animals';
    
    public $timestamps = true;

}
