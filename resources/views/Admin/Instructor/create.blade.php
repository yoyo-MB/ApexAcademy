@extends('layouts.dashboard')


@section('content')
<h2>Add Instructor</h2>
<form method="POST" action="{{ route('instructor.store') }}" enctype="multipart/form-data" class="card p-4">
@csrf
<input class="form-control mb-3" name="name" placeholder="Name">
<textarea class="form-control mb-3" name="bio" placeholder="Bio"></textarea>
<input class="form-control mb-3" name="speciality" placeholder="Speciality">
<input type="number" class="form-control mb-3" name="yearsOfExperience" placeholder="Years of Experience">
<input type="file" class="form-control mb-3" name="image">
<button class="btn btn-primary">Save</button>
</form>
@endsection