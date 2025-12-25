@extends('layouts.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Course Registrations</h2>
</div>

@if($course_registrations->count() > 0)
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Contact Info</th>
                            <th>Course</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($course_registrations as $registration)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle bg-primary text-white d-flex align-items-center justify-content-center rounded-circle me-3" style="width: 40px; height: 40px; font-weight: 600;">
                                            {{ strtoupper(substr($registration->first_name, 0, 1)) }}{{ strtoupper(substr($registration->last_name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-semibold">{{ $registration->first_name }} {{ $registration->last_name }}</div>
                                            <small class="text-muted">ID: #{{ $registration->id }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="small">
                                        <div class="d-flex align-items-center mb-1">
                                            <i class="fas fa-envelope text-muted me-2"></i>
                                            {{ $registration->email }}
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-phone text-muted me-2"></i>
                                            {{ $registration->phone_number }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($registration->course)
                                        <span class="badge bg-primary">
                                            {{ $registration->course->title }}
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            Course not found
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('course_registrations.show', $registration->id) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <form action="{{ route('course_registrations.destroy', $registration->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this registration?')" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else
    <div class="card">
        <div class="card-body text-center py-5">
            <div class="text-muted mb-3">
                <i class="fas fa-user-graduate fa-3x"></i>
            </div>
            <h4 class="text-muted">No Course Registrations Yet</h4>
            <p class="text-muted">Students can register for courses through the public registration form.</p>
            <a href="{{ route('home') }}" class="btn btn-primary">
                <i class="fas fa-home me-2"></i>View Public Site
            </a>
        </div>
    </div>
@endif
@endsection
