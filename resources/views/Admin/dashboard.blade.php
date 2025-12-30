@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Admin Dashboard</h1>
        <div class="text-muted">
            <i class="bi bi-calendar3"></i>
            {{ now()->format('F j, Y') }}
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3">
                                <i class="bi bi-book-fill text-primary fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">Total Courses</h6>
                            <h3 class="mb-0">{{ $stats['total_courses'] }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle bg-success bg-opacity-10 p-3">
                                <i class="bi bi-person-badge-fill text-success fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">Total Instructors</h6>
                            <h3 class="mb-0">{{ $stats['total_instructors'] }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle bg-info bg-opacity-10 p-3">
                                <i class="bi bi-person-plus-fill text-info fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">Total Registrations</h6>
                            <h3 class="mb-0">{{ $stats['total_registrations'] }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                                <i class="bi bi-envelope-fill text-warning fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="text-muted mb-1">Contact Messages</h6>
                            <h3 class="mb-0">{{ $stats['total_contact_messages'] }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Registrations -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recent Course Registrations</h5>
                <a href="{{ route('course_registrations.index') }}" class="btn btn-sm btn-outline-primary">
                    View All <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            @if($stats['recent_registrations']->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stats['recent_registrations'] as $registration)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-light text-primary d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px; font-size: 12px; font-weight: 600;">
                                                {{ strtoupper(substr($registration->first_name, 0, 1)) }}{{ strtoupper(substr($registration->last_name, 0, 1)) }}
                                            </div>
                                            {{ $registration->first_name }} {{ $registration->last_name }}
                                        </div>
                                    </td>
                                    <td>{{ $registration->email }}</td>
                                    <td>
                                        @if($registration->course)
                                            <span class="badge bg-light text-dark">{{ $registration->course->title }}</span>
                                        @else
                                            <span class="text-muted">Course not found</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $registration->created_at->format('M j, Y') }}</small>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-person-plus text-muted fs-1 mb-3"></i>
                    <h6 class="text-muted">No course registrations yet</h6>
                    <p class="text-muted small">Students can register for courses through the public registration form.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Recent Contact Messages -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recent Contact Messages</h5>
                <a href="{{ route('contact_us.index') }}" class="btn btn-sm btn-outline-warning">
                    View All <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            @if($stats['recent_contact_messages']->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stats['recent_contact_messages'] as $message)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-light text-warning d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px; font-size: 12px; font-weight: 600;">
                                                {{ strtoupper(substr($message->name, 0, 1)) }}
                                            </div>
                                            {{ $message->name }}
                                        </div>
                                    </td>
                                    <td>{{ $message->email }}</td>
                                    <td>
                                        <span class="text-truncate d-block" style="max-width: 200px;">
                                            {{ Str::limit($message->subject, 30) }}
                                        </span>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $message->created_at->format('M j, Y') }}</small>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-envelope text-muted fs-1 mb-3"></i>
                    <h6 class="text-muted">No contact messages yet</h6>
                    <p class="text-muted small">Users can contact you through the contact form.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0">
                    <h5 class="mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('course.create') }}" class="btn btn-outline-primary w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                                <i class="bi bi-plus-circle fs-2 mb-2"></i>
                                Add New Course
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('instructor.create') }}" class="btn btn-outline-success w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                                <i class="bi bi-person-plus fs-2 mb-2"></i>
                                Add Instructor
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ route('course_registrations.index') }}" class="btn btn-outline-secondary w-100 h-100 d-flex flex-column align-items-center justify-content-center p-3">
                                <i class="bi bi-people fs-2 mb-2"></i>
                                View Registrations
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
