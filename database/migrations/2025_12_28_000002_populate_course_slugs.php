<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Populate slug for existing records where missing
        DB::table('courses')->orderBy('id')->chunk(100, function ($courses) {
            foreach ($courses as $c) {
                if (empty($c->slug)) {
                    $base = Str::slug($c->title ?: "course-{$c->id}");
                    $slug = $base;
                    $i = 2;
                    while (DB::table('courses')->where('slug', $slug)->exists()) {
                        $slug = $base . '-' . $i++;
                    }
                    DB::table('courses')->where('id', $c->id)->update(['slug' => $slug]);
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // leave slugs as-is (no safe down)
    }
};
