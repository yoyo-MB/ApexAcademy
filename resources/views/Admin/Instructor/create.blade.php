@extends('layouts.dashboard')


@section('content')
<h2>Add Instructor</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('instructor.store') }}" enctype="multipart/form-data" class="card p-4">
@csrf
<div class="mb-3">
    <label class="form-label">Name</label>
    <input class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required>
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label">Bio</label>
    <textarea class="form-control" name="bio" placeholder="Bio" required>{{ old('bio') }}</textarea>
    @error('bio')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label">Speciality</label>
    <input class="form-control" name="speciality" placeholder="Speciality" value="{{ old('speciality') }}" required>
    @error('speciality')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label">Years of Experience</label>
    <input type="number" class="form-control" name="yearsOfExperience" placeholder="Years of Experience" value="{{ old('yearsOfExperience') }}" required min="0">
    @error('yearsOfExperience')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" class="form-control" name="image" accept="image/*">
    @error('image')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection