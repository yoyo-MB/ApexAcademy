@extends('layouts.dashboard')


@section('content')
<div class="card p-4">
<div class="row">
<div class="col-md-4">
<img src="{{ $instructor->pictureUrl }}" class="img-fluid rounded">
</div>
<div class="col-md-8">
<h2>{{ $instructor->name }}</h2>
<p class="text-muted">{{ $instructor->speciality }}</p>
<p>{{ $instructor->bio }}</p>
<span class="badge bg-primary">{{ $instructor->yearsOfExperience }} Years Experience</span>
</div>
</div>
</div>
@endsection