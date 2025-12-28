@extends('layouts.app')

@section('content')

<section class="hero-area">
    <div class="container">
        <div class="caption-content text-center">
            <h2 class="english-font"><mark>Grand Dental Academy</mark></h2>
            <p>
                بإمكانية تفوق كافة أكاديميات الشرق الأوسط، أكاديمية Apex
                وجدت لتصنع فارقًا في طب الأسنان الليبي
            </p>
        </div>
    </div>
</section>

@include('sections.courses')
@include('sections.about')
@include('sections.instructors')

@endsection
