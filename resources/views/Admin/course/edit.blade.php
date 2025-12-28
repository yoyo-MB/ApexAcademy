@extends('layouts.dashboard')


@section('content')
<h2 class="fw-bold mb-3">Edit Course</h2>


<form method="POST" action="{{ route('course.update',$course->id) }}" enctype="multipart/form-data" class="card p-4">
@csrf
@method('PUT')


<div class="row g-3">
<div class="col-md-6">
<label class="form-label">Title</label>
<input name="title" class="form-control" value="{{ $course->title }}" required>
</div>


<div class="col-md-6">
<label class="form-label">Instructor</label>
<select name="instructorId" class="form-select" required>
@foreach($instructors as $instructor)
<option value="{{ $instructor->id }}" @selected($course->instructorId == $instructor->id)>
{{ $instructor->name }}
</option>
@endforeach
</select>
</div>


<div class="col-md-12">
<label class="form-label">Description</label>
<textarea name="description" class="form-control" rows="4">{{ $course->description }}</textarea>
</div>


<div class="col-md-4">
<label class="form-label">Duration (hours)</label>
<input type="number" name="duration" class="form-control" value="{{ $course->duration }}">
</div>


<div class="col-md-4">
<label class="form-label">Price</label>
<input type="number" step="0.01" name="price" class="form-control" value="{{ $course->price }}">
</div>


<div class="col-md-4">
<label class="form-label">Change Image</label>
<input type="file" name="image" class="form-control">
</div>
</div>


<div class="d-flex gap-2 mt-4">
	<button class="btn btn-primary">Update Course</button>
	<form action="{{ route('course.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');">
		@csrf
		@method('DELETE')
		<button type="submit" class="btn btn-danger">Delete Course</button>
	</form>
</div>
</form>
@endsection