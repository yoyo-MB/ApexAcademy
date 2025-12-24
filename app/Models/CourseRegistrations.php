<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class CourseRegistrations extends Model
{
    protected $fillable = ['course_id','email','first_name','last_name','phone_number'];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
