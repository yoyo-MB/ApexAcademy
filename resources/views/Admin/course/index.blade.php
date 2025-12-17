@extends('layouts.dashboard')


@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
<h2 class="fw-bold">Courses</h2>
<a href="{{ route('course.create') }}" class="btn btn-primary">+ Add Course</a>
</div>


<div class="row">
@foreach($courses as $course)
<div class="col-lg-4 col-md-6 mb-4">
<div class="card h-100">
@if($course->pictureUrl)
<img src="{{ asset($course->pictureUrl) }}" class="card-img-top" style="height:200px;object-fit:cover">
@endif
<div class="card-body">
<h5 class="card-title">{{ $course->title }}</h5>
<p class="text-muted mb-1">Instructor: {{ $course->instructor->name ?? '—' }}</p>
<p class="small">{{ Str::limit($course->description,80) }}</p>
</div>
<div class="card-footer bg-transparent border-0 d-flex gap-2">
<a href="{{ route('course.show',$course->id) }}" class="btn btn-outline-primary btn-sm">Details</a>
<a href="{{ route('course.edit',$course->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
</div>
</div>
</div>
@endforeach
</div>
@endsection