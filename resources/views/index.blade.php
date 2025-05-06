<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MB</title>
    
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        @vite('resources/css/app.css', 'resources/js/app.js')
    @endif
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    
    <style>
        /* Loading screen styles */
        #loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease-out;
        }
        
        .loading-logo {
            position: relative;
            width: 100px;
            height: 100px;
            margin-bottom: 2rem;
        }
        
        .loading-circle {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: #ff6b6b;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 1.5s infinite ease-in-out;
        }
        
        .loading-icon {
            color: white;
            font-size: 24px;
            font-weight: bold;
            font-family: 'Anton', sans-serif;
            letter-spacing: 1px;
        }
        
        .loading-text {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 1.5rem;
        }
        
        .loading-dots {
            display: flex;
            justify-content: center;
        }
        
        .loading-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #ff6b6b;
            margin: 0 5px;
            opacity: 0;
            animation: loadingDots 1.5s infinite ease-in-out;
        }
        
        .loading-dot:nth-child(2) {
            animation-delay: 0.2s;
        }
        
        .loading-dot:nth-child(3) {
            animation-delay: 0.4s;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); box-shadow: 0 0 0 rgba(255, 107, 107, 0.4); }
            50% { transform: scale(1.1); box-shadow: 0 0 20px rgba(255, 107, 107, 0.6); }
            100% { transform: scale(1); box-shadow: 0 0 0 rgba(255, 107, 107, 0.4); }
        }
        
        @keyframes loadingDots {
            0% { opacity: 0; transform: scale(0.8); }
            50% { opacity: 1; transform: scale(1.2); }
            100% { opacity: 0; transform: scale(0.8); }
        }
        
        .main-content {
            opacity: 0;
            display: none;
            transition: opacity 0.5s ease-in;
        }
        
        .show-content {
            opacity: 1;
            display: block;
        }
    </style>
</head>
<body class="font-sans bg-white text-gray-900">
    <!-- Loading Screen -->
    <div id="loading-screen">
        <div class="loading-logo">
            <div class="loading-circle">
                <span class="loading-icon">MB</span>
            </div>
        </div>
        <div class="loading-dots">
            <div class="loading-dot"></div>
            <div class="loading-dot"></div>
            <div class="loading-dot"></div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        @include('components.navbar')
        @include('sections.hero')
        @include('sections.skills')
        @include('sections.wk')
        @include('sections.project')
        @include('sections.edu_cert')
        @include('sections.ivet')
        @include('components.footer')
    </div>
    
    <script>
        // Script to hide loading screen after 4 seconds
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const loadingScreen = document.getElementById('loading-screen');
                const mainContent = document.querySelector('.main-content');
                
                // Fade out loading screen
                loadingScreen.style.opacity = '0';
                
                // Show main content
                mainContent.classList.add('show-content');
                
                // Remove loading screen after transition
                setTimeout(function() {
                    loadingScreen.style.display = 'none';
                }, 500);
            }, 4000); // 4 seconds loading time
        });
    </script>
</body>
</html>


