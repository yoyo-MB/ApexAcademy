<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'duration',
        'price',
        'instructorId',
        'pictureUrl',
        'slug',
    ]; 

    protected static function booted()
    {
        static::creating(function ($course) {
            if (empty($course->slug) && !empty($course->title)) {
                $course->slug = static::generateUniqueSlug($course->title);
            }
        });

        static::updating(function ($course) {
            if ($course->isDirty('title') && empty($course->slug)) {
                $course->slug = static::generateUniqueSlug($course->title, $course->id);
            }
        });
    }

    protected static function generateUniqueSlug($title, $ignoreId = null)
    {
        $slugBase = Str::slug($title);
        $slug = $slugBase;
        $i = 2;
        while (static::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '<>', $ignoreId))->exists()) {
            $slug = $slugBase . '-' . $i++;
        }
        return $slug;
    }

    public function instructor(){
        return $this->belongsTo(Instructor::class,"instructorId","id");
    } 

    /**
     * Use slug for route model binding
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Resolve route binding for both numeric IDs and slugs.
     * This allows admin routes (e.g. /course/1) and public slug routes (e.g. /courses/my-course)
     */
    public function resolveRouteBinding($value, $field = null)
    {
        if (is_numeric($value)) {
            return static::where('id', $value)->firstOrFail();
        }

        return static::where($field ?? $this->getRouteKeyName(), $value)->firstOrFail();
    }
}
