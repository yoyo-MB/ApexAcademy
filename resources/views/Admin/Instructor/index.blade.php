@extends('layouts.dashboard')


@section('content')
<div class="d-flex justify-content-between mb-4">
<h2>Instructors</h2>
<a href="{{ route('instructor.create') }}" class="btn btn-primary">+ Add Instructor</a>
</div>


<div class="row">
@foreach($instructors as $instructor)
<div class="col-md-4 mb-4">
<div class="card h-100">
@if($instructor->pictureUrl)
<img src="{{ $instructor->pictureUrl }}" class="card-img-top" style="height:220px;object-fit:cover">
@endif
<div class="card-body">
<h5>{{ $instructor->name }}</h5>
<p class="text-muted">{{ $instructor->speciality }}</p>
<a href="{{ route('instructor.show',$instructor->id) }}" class="btn btn-sm btn-outline-primary">Details</a>
<a href="{{ route('instructor.edit',$instructor->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
</div>
</div>
</div>
@endforeach
</div>
@endsection