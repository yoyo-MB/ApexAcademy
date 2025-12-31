@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Contact Message #{{ $contact->id }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('contact_us.index') }}" class="btn btn-default btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to Messages
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Name:</strong>
                            <p>{{ $contact->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Email:</strong>
                            <p>{{ $contact->email }}</p>
                        </div>
                        <div class="col-md-12">
                            <strong>Subject:</strong>
                            <p>{{ $contact->subject }}</p>
                        </div>
                        <div class="col-md-12">
                            <strong>Message:</strong>
                            <p style="white-space: pre-wrap;">{{ $contact->message }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Received:</strong>
                            <p>{{ $contact->created_at->format('M d, Y H:i:s') }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Last Updated:</strong>
                            <p>{{ $contact->updated_at->format('M d, Y H:i:s') }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="btn btn-primary">
                            <i class="fas fa-envelope"></i> Reply via Email
                        </a>
                        <a href="{{ route('contact_us.index') }}" class="btn btn-default ml-2">
                            <i class="fas fa-arrow-left"></i> Back to Messages
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
