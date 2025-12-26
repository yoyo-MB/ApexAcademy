@extends('layouts.dashboard')

@section('title','Edit Instructor')
@section('content')
<h2>Edit Instructor</h2>
<form method="POST" action="{{ route('instructor.update',$instructor->id) }}" enctype="multipart/form-data" class="card p-4">
@csrf
@method('PUT')
<input class="form-control mb-3" name="name" value="{{ $instructor->name }}">
<textarea class="form-control mb-3" name="bio">{{ $instructor->bio }}</textarea>
<input class="form-control mb-3" name="speciality" value="{{ $instructor->speciality }}">
<input type="number" class="form-control mb-3" name="yearsOfExperience" value="{{ $instructor->yearsOfExperience }}">
<input type="file" class="form-control mb-3" name="image">
<button class="btn btn-primary">Update</button>
</form>
@endsection