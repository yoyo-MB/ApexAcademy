@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto text-center">
        <div class="mb-8">
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-4">
                <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Registration Successful!</h1>
            <p class="text-lg text-gray-600 mb-8">
                Thank you for registering for the course. We have received your registration and will contact you shortly with further details.
            </p>
        </div>

        <div class="bg-gray-50 rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">What's Next?</h2>
            <ul class="text-left text-gray-600 space-y-2">
                <li class="flex items-start">
                    <span class="text-blue-500 mr-2">•</span>
                    You will receive a confirmation email shortly
                </li>
                <li class="flex items-start">
                    <span class="text-blue-500 mr-2">•</span>
                    Our team will review your registration and contact you with course details
                </li>
                <li class="flex items-start">
                    <span class="text-blue-500 mr-2">•</span>
                    Payment information and schedule will be provided via email
                </li>
            </ul>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('course_registrations.create') }}" 
               class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Register Another Course
            </a>
            <a href="/" 
               class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Back to Home
            </a>
        </div>
    </div>
</div>
@endsection
