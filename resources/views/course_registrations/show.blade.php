@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Course Registration Details</h2>
    <a href="{{ route('course_registrations.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to List
    </a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-user me-2"></i>Student Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center mb-3">
                        <div class="avatar-circle bg-primary text-white d-flex align-items-center justify-content-center rounded-circle mx-auto mb-3" style="width: 80px; height: 80px; font-weight: 600; font-size: 2rem;">
                            {{ strtoupper(substr($course_registration->first_name, 0, 1)) }}{{ strtoupper(substr($course_registration->last_name, 0, 1)) }}
                        </div>
                        <h6 class="fw-bold">Registration #{{ $course_registration->id }}</h6>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <td class="fw-semibold text-muted" width="120">Full Name:</td>
                                <td>{{ $course_registration->first_name }} {{ $course_registration->last_name }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-muted">Email:</td>
                                <td><i class="fas fa-envelope text-muted me-2"></i>{{ $course_registration->email }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-muted">Phone:</td>
                                <td><i class="fas fa-phone text-muted me-2"></i>{{ $course_registration->phone_number }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="fas fa-book me-2"></i>Course Information</h5>
            </div>
            <div class="card-body">
                @if($course_registration->course)
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="fw-bold text-primary">{{ $course_registration->course->title }}</h6>
                            <p class="text-muted">{{ Str::limit($course_registration->course->description, 150) }}</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <small class="text-muted"><i class="fas fa-clock me-1"></i> Duration: {{ $course_registration->course->duration }} hours</small>
                                </div>
                                <div class="col-md-6">
                                    <small class="text-muted"><i class="fas fa-dollar-sign me-1"></i> Price: ${{ $course_registration->course->price }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Course information not available
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Registration Details</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <small class="text-muted d-block">Registration Date</small>
                    <strong>{{ $course_registration->created_at->format('F j, Y') }}</strong>
                    <br><small class="text-muted">{{ $course_registration->created_at->format('g:i A') }}</small>
                </div>
                <div class="mb-3">
                    <small class="text-muted d-block">Last Updated</small>
                    <strong>{{ $course_registration->updated_at->format('F j, Y') }}</strong>
                    <br><small class="text-muted">{{ $course_registration->updated_at->format('g:i A') }}</small>
                </div>
                <hr>
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Registration Record</strong><br>
                    <small>This is a permanent record of the student's registration. Personal information cannot be edited to maintain data integrity.</small>
                </div>
                <div class="d-grid">
                    <form action="{{ route('course_registrations.destroy', $course_registration->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this registration?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fas fa-trash me-2"></i>Delete Registration
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
