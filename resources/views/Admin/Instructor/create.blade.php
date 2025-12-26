@extends('layouts.dashboard')


@section('content')
<h2>Add Instructor</h2>

@if ($errors->any())
	<div class="alert alert-danger">
		<ul class="mb-0">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

@if(session('success'))
	<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('instructor.store') }}" enctype="multipart/form-data" class="card p-4">
@csrf
<input class="form-control mb-3" name="name" placeholder="Name" value="{{ old('name') }}">
<textarea class="form-control mb-3" name="bio" placeholder="Bio">{{ old('bio') }}</textarea>
<input class="form-control mb-3" name="speciality" placeholder="Speciality" value="{{ old('speciality') }}">
<input type="number" class="form-control mb-3" name="yearsOfExperience" placeholder="Years of Experience" value="{{ old('yearsOfExperience') }}">
<input type="file" class="form-control mb-3" name="image">
<button class="btn btn-primary">Save</button>
</form>
@endsection