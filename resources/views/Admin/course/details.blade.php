@extends('layouts.dashboard')


@section('content')
<div class="card p-4">
<div class="row g-4">
<div class="col-md-5">
@if($course->pictureUrl)
@php
	$courseImage = (\Illuminate\Support\Str::startsWith($course->pictureUrl, ['http://', 'https://'])) ? $course->pictureUrl : asset($course->pictureUrl);
@endphp
<img src="{{ $courseImage }}" class="img-fluid rounded">
@endif
</div>
<div class="col-md-7">
<h2 class="fw-bold">{{ $course->title }}</h2>
<p class="text-muted">Instructor: {{ $course->instructor->name }}</p>


<p>{{ $course->description }}</p>


<div class="d-flex gap-3 mt-3">
<span class="badge bg-primary">{{ $course->duration }} Hours</span>
<span class="badge bg-success">${{ number_format($course->price,2) }}</span>
</div>
</div>
</div>
</div>
@endsection