<x-guest-layout>
    <!-- Custom CSS to fix hover issues and apply enhanced color scheme -->
    <style>
        /* Fix for circle-bg hover issue */
        #skills:hover .circle-bg,
        #skills *:hover .circle-bg {
            display: none !important;
        }
        
        /* Background gradient and overall styling */
        body {
            background: linear-gradient(135deg, #2a2a2a 0%, #1a1a1a 100%);
            min-height: 100vh;
        }
        .bg-white {
            background: none !important;
        }
        .login-container {
            background-color: rgba(40, 40, 40, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4), 
                        0 0 0 1px rgba(255, 255, 255, 0.05),
                        inset 0 0 0 1px rgba(255, 255, 255, 0.1);
            max-width: 680px!important;
            margin: 5rem auto;
            position: relative;
            overflow: hidden;
        }
        
        /* Decorative elements */
        .login-container::before {
            content: "";
            position: absolute;
            top: -100px;
            right: -100px;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(255, 90, 95, 0.15) 0%, rgba(255, 90, 95, 0) 70%);
            z-index: 0;
            border-radius: 50%;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
        }
        
        .login-header h1 {
            color: white;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            background: linear-gradient(90deg, #ffffff, #ff5a5f);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 0.5px;
        }
        
        .login-header p {
            color: #bbb;
            font-size: 1rem;
        }
        
        .login-logo {
            width: 60px;
            height: 60px;
            margin: 0 auto 1rem;
            background-color: #ff5a5f;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(255, 90, 95, 0.4);
        }
        
        .login-logo svg {
            width: 30px;
            height: 30px;
            fill: white;
        }
        
   
        .form-input {
            background-color: rgba(30, 30, 30, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 8px;
            padding: 0.9rem 1rem 0.9rem 3rem;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 1rem;
        }
        
        .form-input:focus {
            border-color: #ff5a5f;
            box-shadow: 0 0 0 3px rgba(255, 90, 95, 0.2);
            background-color: rgba(30, 30, 30, 0.8);
        }
        
        .form-label {
            color: #e0e0e0;
            font-weight: 500;
            margin-bottom: 0.5rem;
            display: block;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }
        
        .input-icon {
            position: absolute;
            left: 1rem;
            top: 2.5rem;
            color: #ff5a5f;
        }
        
        /* Button styling */
        .btn-primary {
            background: linear-gradient(90deg, #ff5a5f, #ff424b);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 0.9rem 2.5rem;
            font-weight: 600;
            font-size: 1.05rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 90, 95, 0.4);
            width: 100%;
            cursor: pointer;
            letter-spacing: 0.5px;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 90, 95, 0.5);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        /* Links and checkbox styling */
        .text-link {
            color: #ff5a5f;
            text-decoration: none;
            transition: all 0.2s ease;
            font-weight: 500;
            font-size: 0.9rem;
            position: relative;
        }
        
        .text-link:hover {
            color: #ff8a8f;
        }
        
        .text-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: -2px;
            left: 0;
            background-color: #ff8a8f;
            transition: width 0.3s ease;
        }
        
        .text-link:hover::after {
            width: 100%;
        }
        
        .checkbox-container {
            display: flex;
            align-items: center;
        }
        
        .custom-checkbox {
            position: relative;
            padding-left: 30px;
            cursor: pointer;
            font-size: 0.9rem;
            color: #e0e0e0;
            display: flex;
            align-items: center;
        }
        
        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }
        
        .checkmark {
            position: absolute;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: rgba(30, 30, 30, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 4px;
            transition: all 0.2s ease;
        }
        
        .custom-checkbox:hover input ~ .checkmark {
            background-color: rgba(40, 40, 40, 0.8);
        }
        
        .custom-checkbox input:checked ~ .checkmark {
            background-color: #ff5a5f;
            border-color: #ff5a5f;
        }
        
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }
        
        .custom-checkbox input:checked ~ .checkmark:after {
            display: block;
        }
        
        .custom-checkbox .checkmark:after {
            left: 7px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
        
        /* Footer styling */
        .login-footer {
            text-align: center;
            margin-top: 2rem;
            color: #999;
            font-size: 0.9rem;
        }
        
        .login-footer a {
            color: #ff5a5f;
            text-decoration: none;
            font-weight: 500;
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .form-group, .login-header, .btn-primary, .login-footer {
            animation: fadeIn 0.4s ease-out forwards;
        }
        
        .form-group:nth-child(2) { animation-delay: 0.1s; }
        .form-group:nth-child(3) { animation-delay: 0.2s; }
        .login-footer { animation-delay: 0.3s; }
        
        /* Error messages */
        .error-message {
            color: #ff5a5f;
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
        }
        
        .error-message svg {
            margin-right: 0.25rem;
            width: 14px;
            height: 14px;
        }
    </style>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="login-container">
        <div class="login-header">
            <div class="login-logo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z"/>
                </svg>
            </div>
            <h1>Welcome Back</h1>
            <p>Sign in to continue to your account</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <div class="input-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </div>
                <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="your@email.com" />
                @if($errors->get('email'))
                <div class="error-message">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    {{ $errors->first('email') }}
                </div>
                @endif
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <div class="input-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                </div>
                <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                @if($errors->get('password'))
                <div class="error-message">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    {{ $errors->first('password') }}
                </div>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="form-group">
                <label class="custom-checkbox">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span class="checkmark"></span>
                    {{ __('Remember me') }}
                </label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-primary">
                    {{ __('Sign In') }}
                </button>
            </div>

            <div class="flex items-center justify-center">
                @if (Route::has('password.request'))
                    <a class="text-link" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            
            <div class="login-footer">
                Don't have an account? <a href="{{ route('register') }}">Sign up</a>
            </div>
        </form>
    </div>
</x-guest-layout>





{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
