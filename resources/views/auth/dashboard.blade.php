@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Welcome, {{ Auth::user()->name }}!</h5>
                            <p>You are successfully logged in to your account.</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <h6>Quick Actions</h6>
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action">
                                    <i class="fas fa-user"></i> Profile Settings
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <i class="fas fa-book"></i> My Courses
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <i class="fas fa-cog"></i> Account Settings
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
