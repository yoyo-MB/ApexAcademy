<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Apex Dental Academy</title>
    
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
            background: linear-gradient(180deg, var(--primary), var(--accent));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .register-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            margin: 20px;
        }
        
        .register-left {
            background: linear-gradient(180deg, var(--primary), var(--accent));
            color: white;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        
        .register-right {
            padding: 3rem;
        }
        
        .logo {
            margin-bottom: 2rem;
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
        
        @media (max-width: 768px) {
            .register-left {
                display: none;
            }
            
            .register-right {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="row g-0 h-100">
            <div class="col-md-6">
                <div class="register-left">
                    <div class="logo">
                        <img src="{{ asset('assets/images/no_background.png') }}" alt="Apex Dental Academy" style="max-width: 120px; margin-bottom: 1rem;">
                        <h2>Apex Dental Academy</h2>
                    </div>
                    <p class="lead">Join our admin team! Create an account to manage courses and instructors.</p>
                    <div class="mt-4">
                        <i class="fas fa-user-plus fa-3x" style="opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="register-right">
                    <div class="text-center mb-4">
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Admin Registration Only</strong><br>
                            <small>This registration is for administrators only</small>
                        </div>
                        <h3>Admin Registration</h3>
                        <p class="text-muted">Create your admin account to manage courses and instructors</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-3">
                        <small class="text-muted">
                            Already have an account? <a href="{{ route('login') }}">Login here</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
