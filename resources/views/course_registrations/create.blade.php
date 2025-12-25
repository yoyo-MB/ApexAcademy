<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Course Registration - Apex Dental Academy</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #478AB1;
            --accent: #1877AF;
            --light: #E7E4E4;
            --dark-color: #1f2937;
            --light-bg: #f8f9fa;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-bg);
        }
        
        .registration-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 2rem auto;
            padding: 3rem;
        }
        
        .form-control {
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            padding: 12px 16px;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(71, 138, 177, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(180deg, var(--primary), var(--accent));
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(71, 138, 177, 0.3);
        }
        
        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        
        .header-section {
            background: linear-gradient(180deg, var(--primary), var(--accent));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 1rem;
        }
        
        .logo img {
            max-width: 80px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header-section">
        <div class="container">
            <div class="logo">
                <img src="{{ asset('assets/images/no_background.png') }}" alt="Apex Dental Academy">
                <h2 class="mt-2">Apex Dental Academy</h2>
            </div>
        </div>
    </div>

    <!-- Registration Form -->
    <div class="container">
        <div class="registration-container">
            <h1 class="text-center mb-4">Course Registration</h1>
            <p class="text-center text-muted mb-5">Register for one of our dental courses and start your learning journey</p>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('course_registrations.store') }}" method="POST">
                @csrf
                
                <!-- Course Selection -->
                <div class="mb-4">
                    <label for="course_id" class="form-label">
                        Select Course <span class="text-danger">*</span>
                    </label>
                    <select name="course_id" id="course_id" required class="form-control">
                        <option value="">Choose a course...</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                                {{ $course->title }} - ${{ $course->price }}
                            </option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <!-- First Name -->
                    <div class="col-md-6 mb-4">
                        <label for="first_name" class="form-label">
                            First Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="first_name" id="first_name" required
                               value="{{ old('first_name') }}" class="form-control">
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div class="col-md-6 mb-4">
                        <label for="last_name" class="form-label">
                            Last Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="last_name" id="last_name" required
                               value="{{ old('last_name') }}" class="form-control">
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="form-label">
                        Email Address <span class="text-danger">*</span>
                    </label>
                    <input type="email" name="email" id="email" required
                           value="{{ old('email') }}" class="form-control">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Phone Number -->
                <div class="mb-4">
                    <label for="phone_number" class="form-label">
                        Phone Number <span class="text-danger">*</span>
                    </label>
                    <input type="tel" name="phone_number" id="phone_number" required
                           value="{{ old('phone_number') }}" class="form-control">
                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-user-plus me-2"></i>Register for Course
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
