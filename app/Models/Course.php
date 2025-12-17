<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'duration',
        'price',
        'instructorId',
        'pictureUrl',
    ]; 
     public function instructor(){
        return $this->belongsTo(Instructor::class,"instructorId","id");
    } 
}
