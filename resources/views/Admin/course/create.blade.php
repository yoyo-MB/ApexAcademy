@extends('layouts.dashboard')


@section('content')
<h2 class="fw-bold mb-3">Create Course</h2>


<form method="POST" action="{{ route('course.store') }}" enctype="multipart/form-data" class="card p-4">
@csrf


<div class="row g-3">
<div class="col-md-6">
<label class="form-label">Title</label>
<input name="title" class="form-control" required>
</div>


<div class="col-md-6">
<label class="form-label">Instructor</label>
<select name="instructorId" class="form-select" required>
@foreach(App\Models\Instructor::all() as $instructor)
<option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
@endforeach
</select>
</div>


<div class="col-md-12">
<label class="form-label">Description</label>
<textarea name="description" class="form-control" rows="4"></textarea>
</div>


<div class="col-md-4">
<label class="form-label">Duration (hours)</label>
<input type="number" name="duration" class="form-control" required>
</div>


<div class="col-md-4">
<label class="form-label">Price</label>
<input type="number" step="0.01" name="price" class="form-control" required>
</div>


<div class="col-md-4">
<label class="form-label">Course Image</label>
<input type="file" name="image" class="form-control">
</div>
</div>


<button class="btn btn-primary mt-4">Save Course</button>
</form>
@endsection