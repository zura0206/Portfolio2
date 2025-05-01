<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qualifications - MB Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .sidebar-item:hover {
            background-color: rgba(239, 68, 68, 0.1);
        }

        .sidebar-item.active {
            background-color: rgba(239, 68, 68, 0.1);
            border-left: 4px solid #EF4444;
        }

        .progress-ring {
            stroke-dasharray: 400;
            stroke-dashoffset: 400;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
        }

        .sidebar {
            transition: width 0.3s ease-in-out;
        }

        .main-content {
            transition: margin-left 0.3s ease-in-out;
        }

        @media (max-width: 768px) {
            .sidebar.collapsed {
                position: fixed;
                z-index: 50;
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }

            .sidebar.collapsed.open {
                transform: translateX(0);
            }
        }

        .hello-bubble {
            background-color: #FF6B6B;
            border-radius: 30px;
            padding: 6px 20px;
            color: white;
            font-weight: 500;
            display: inline-block;
            position: relative;
        }

        .hello-bubble::after {
            content: "";
            width: 8px;
            height: 8px;
            background-color: #FF6B6B;
            position: absolute;
            right: -8px;
            top: 50%;
            border-radius: 50%;
        }

        .hello-bubble::before {
            content: "";
            width: 4px;
            height: 4px;
            background-color: #FF6B6B;
            position: absolute;
            right: -16px;
            top: 50%;
            border-radius: 50%;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar w-64 bg-black text-white shadow-md flex-shrink-0 h-full overflow-y-auto">
            <div class="p-6">
                <div class="flex items-center">
                    <div
                        class="h-10 w-10 rounded-full bg-red-500 flex items-center justify-center text-white font-bold mr-2">
                        MB
                    </div>
                    <h1 class="text-xl font-bold text-white">Maldrey Bernardo</h1>
                </div>
            </div>

            <div class="px-4 text-sm text-gray-400 mb-2">MENU</div>

            <nav class="px-4 py-2">
                <a href="{{ route('admin.Awelcome') }}" class="sidebar-item flex items-center py-3 px-4 text-gray-300 font-medium rounded-md mb-3">
                    <i class="fas fa-th-large mr-3"></i><span>DASHBOARD</span>
                </a>
                <a href="{{ route('admin.Ahero') }}" class="sidebar-item flex items-center py-3 px-4 text-gray-300 font-medium rounded-md mb-3">
                  <i class="fas fa-user mr-3"></i><span>HERO SECTION</span>
              </a>
                <a href="{{ route('admin.Askills') }}" class="sidebar-item flex items-center py-3 px-4 bg-red-500 font-medium rounded-md mb-3 active">
                    <i class="fas fa-laptop-code mr-3"></i><span>SKILLS</span>
                </a>
                <a href="{{ route('admin.Aivet') }}" class="sidebar-item flex items-center py-3 px-4 text-gray-300 font-medium rounded-md mb-3">
                    <i class="fas fa-graduation-cap mr-3"></i><span>IVET</span>
                </a>
                <a href="{{ route('admin.EC') }}" class="sidebar-item flex items-center py-3 px-4 text-gray-300 font-medium rounded-md mb-3">
                    <i class="fas fa-certificate mr-3"></i><span>QUALIFICATIONS</span>
                </a>
                <a href="{{ route('admin.EC') }}" class="sidebar-item flex items-center py-3 px-4 text-gray-300 font-medium rounded-md mb-3">
                    <i class="fas fa-user-graduate mr-3"></i><span>EDUCATION</span>
                </a>
                <a href="{{ route('admin.Awk') }}" class="sidebar-item flex items-center py-3 px-4 text-gray-300 font-medium rounded-md mb-3">
                    <i class="fas fa-project-diagram mr-3"></i><span>WORK EXPERIENCE</span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div id="mainContent" class="flex flex-col flex-1 overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm py-4 px-6 flex items-center justify-between">
                <div class="flex items-center">
                    <button id="sidebarToggle" class="mr-4 text-gray-500 focus:outline-none">
                        <i class="fas fa-bars"></i>
                    </button>
                    {{-- <div class="relative">
              <input type="text" placeholder="Search or type command..." class="px-4 py-2 pl-10 pr-8 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500 w-64">
              <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
              <div class="absolute right-3 top-2 px-1 py-0.5 bg-gray-100 rounded text-xs text-gray-500">⌘K</div>
            </div> --}}
                </div>

                <div class="flex items-center space-x-4">
                    {{-- <button class="text-gray-500">
              <i class="far fa-moon"></i>
            </button>
            <button class="text-gray-500 relative">
              <i class="far fa-bell"></i>
              <span class="w-2 h-2 bg-red-500 absolute top-0 right-0 rounded-full"></span>
            </button> --}}
                    <!-- Make sure Alpine.js is included -->
                    <script src="//unpkg.com/alpinejs" defer></script>

                    <div x-data="{ open: false }" class="relative">
                        <div class="flex items-center cursor-pointer" @click="open = !open">
                            <div
                                class="h-10 w-10 rounded-full bg-red-500 flex items-center justify-center text-white mr-2">
                                MB
                            </div>
                            <span class="text-gray-700 font-medium mr-1">Maldrey</span>
                            <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                        </div>

                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>          {{-- <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                 --}}
                            <div class="border-t border-gray-100"></div>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                        </div>
                    </div>

                </div>

            </header>



            <!-- Content Area -->
            <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                <!-- Qualifications Page -->
                <!-- Content Area -->
                <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
                    <!-- Qualifications Admin Page -->
                    <div id="qualificationsAdminPage" class="page-content">
                        <section>
                            <div class="container max-w-7xl mx-auto px-4">
                                <div class="flex justify-between items-center mb-8">
                                    <div>
                                        <h1 class="text-3xl font-bold text-gray-900">Education &
                                            Certifications</h1>
                                        <p class="text-gray-600">Manage your academic background and
                                            professional certifications</p>
                                    </div>
                                    <div class="flex space-x-4">
                                        <button id="addEducationBtn"
                                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors">
                                            <i class="fas fa-plus mr-2"></i>Add Education
                                        </button>
                                        <button id="addCertificationBtn"
                                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors">
                                            <i class="fas fa-plus mr-2"></i>Add Certification
                                        </button>
                                    </div>
                                </div>

                                <!-- Education Timeline Admin View -->
                                <div class="bg-gray-50 rounded-xl p-6 mb-12">
                                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Education Timeline
                                    </h2>

                                    <div class="relative">
                                        <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-red-600">
                                        </div>

                                        <div class="flex flex-col space-y-16" id="educationTimelineAdmin">
                                            @foreach ($educations as $index => $education)
                                                <div class="relative">
                                                    <!-- Timeline Node -->
                                                    <div class="absolute left-1/2 transform -translate-x-1/2 -mt-3">
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-red-600 border-4 border-white shadow flex items-center justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-6 w-6 text-white" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                            </svg>
                                                        </div>
                                                    </div>

                                                    @if ($index % 2 == 0)
                                                        <!-- Even index = Right Side -->
                                                        <div class="ml-auto w-5/12 pr-8">
                                                            <div
                                                                class="bg-gray-50 rounded-xl p-7 shadow-md transform transition-all hover:scale-105 border-l-4 border-red-600 relative group">
                                                                <div class="flex items-center justify-between mb-3">
                                                                    <h4 class="text-xl font-bold text-gray-900">
                                                                        {{ $education->course }}</h4>
                                                                    <span
                                                                        class="text-sm font-medium bg-red-100 text-red-700 py-1 px-3 rounded-full">{{ $education->duration }}</span>
                                                                </div>
                                                                <p class="text-gray-600 mb-2 font-medium">
                                                                    {{ $education->school_name }}</p>
                                                                <p class="text-gray-600 text-sm mb-4">
                                                                    {{ $education->description }}</p>
                                                                <div
                                                                    class="flex justify-end space-x-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                                                    <button
                                                                        class="edit-education-btn text-blue-500 hover:text-blue-700"
                                                                        data-id="{{ $education->id }}">
                                                                        <i class="fas fa-edit"></i> Edit
                                                                    </button>
                                                                    <form method="POST"
                                                                        action="{{ route('admin.education.destroy', $education->id) }}"
                                                                        onsubmit="return confirm('Are you sure you want to delete this EDUCATION?')">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="text-red-500 hover:text-red-700 text-sm">
                                                                            <i class="fas fa-trash mr-1"></i> Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <!-- Odd index = Left Side -->
                                                        <div class="mr-auto w-5/12 pl-8">
                                                            <div
                                                                class="bg-gray-50 rounded-xl p-7 shadow-md transform transition-all hover:scale-105 border-r-4 border-red-600 relative group">
                                                                <div class="flex items-center justify-between mb-3">
                                                                    <h4 class="text-xl font-bold text-gray-900">
                                                                        {{ $education->course }}</h4>
                                                                    <span
                                                                        class="text-sm font-medium bg-red-100 text-red-700 py-1 px-3 rounded-full">{{ $education->duration }}</span>
                                                                </div>
                                                                <p class="text-gray-600 mb-2 font-medium">
                                                                    {{ $education->school_name }}</p>
                                                                <p class="text-gray-600 text-sm mb-4">
                                                                    {{ $education->description }}</p>
                                                                <div
                                                                    class="flex justify-end space-x-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                                                    <button
                                                                        class="edit-education-btn text-blue-500 hover:text-blue-700"
                                                                        data-id="{{ $education->id }}">
                                                                        <i class="fas fa-edit"></i> Edit
                                                                    </button>
                                                                    <form method="POST"
                                                                        action="{{ route('admin.education.destroy', $education->id) }}"
                                                                        onsubmit="return confirm('Are you sure you want to delete this EDUCATION?')">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="text-red-500 hover:text-red-700 text-sm">
                                                                            <i class="fas fa-trash mr-1"></i> Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>


                                 <!-- Certifications Section - Dynamic Version -->
                                 <div class="mt-24 relative">
                                    <h3 class="text-3xl font-bold text-center text-gray-900 mb-12">Professional Certifications</h3>
    
                                    <!-- Main Vertical Trunk -->
                                    <div class="absolute left-1/2 transform -translate-x-1/2 w-1 bg-red-600 h-full top-10"></div>
    
                                    <!-- Center Node -->
                                    <div class="relative flex justify-center">
                                        <div class="w-12 h-12 rounded-full bg-red-600 border-4 border-white shadow flex items-center justify-center z-10">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                            </svg>
                                        </div>
                                    </div>
    
                                    <!-- Certifications Container -->
                                    <div class="relative pt-16" id="certificationsContainer">
                                        @php
                                            $levels = [
                                                'top' => $certifications->take(3),
                                                'middle' => $certifications->slice(3, 2),
                                                'bottom' => $certifications->slice(5),
                                            ];
                                        @endphp
    
                                        <!-- Top Level (3 certifications) -->
                                        @if ($levels['top']->isNotEmpty())
                                            <div class="relative mb-8">
                                                <!-- Horizontal Branch -->
                                                <div class="absolute top-0 left-0 right-0 h-1 bg-red-600"></div>
    
                                                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-12">
                                                    @foreach ($levels['top'] as $certification)
                                                        <div class="relative group">
                                                            <!-- Vertical Connector -->
                                                            <div class="absolute -top-10 left-1/2 transform -translate-x-1/2 h-10 w-1 bg-red-600"></div>
                                                            <!-- Node -->
                                                            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-red-600 border-2 border-white shadow"></div>
                                                            <!-- Certification Card -->
                                                            <div class="bg-gray-50 rounded-xl p-6 shadow-md hover:shadow-lg transition-all border-t-4 border-red-600 h-full">
                                                                <div class="text-center pt-2">
                                                                    <h4 class="text-lg font-bold text-gray-900 mb-2">{{ $certification->cert_title }}</h4>
                                                                    <p class="text-sm text-gray-600 mb-3">{{ $certification->cert_issuer }}</p>
                                                                    <div class="flex justify-center mb-4">
                                                                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">{{ $certification->cert_year }}</span>
                                                                    </div>
                                                                    <p class="text-xs text-gray-500">{{ $certification->cert_description }}</p>
    
                                                                    <!-- Action Buttons (shown on hover) -->
                                                                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex space-x-2">
                                                                        <button class="edit-certification-btn text-blue-500 hover:text-blue-700 text-sm" data-id="{{ $certification->id }}">
                                                                            <i class="fas fa-edit mr-1"></i> Edit
                                                                        </button>
                                                                        <form method="POST" action="{{ route('certifications.destroy', $certification->id) }}"
                                                                            onsubmit="return confirm('Are you sure you want to delete this certification?')">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="text-red-500 hover:text-red-700 text-sm">
                                                                                <i class="fas fa-trash mr-1"></i> Delete
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
    
                                        <!-- Middle Level (2 certifications) -->
                                        @if ($levels['middle']->isNotEmpty())
                                            <div class="relative mb-8">
                                                <!-- Vertical Connector from top level -->
                                                <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 h-8 w-1 bg-red-600"></div>
                                                <!-- Horizontal Branch -->
                                                <div class="absolute top-0 left-1/4 right-1/4 h-1 bg-red-600"></div>
    
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-12 mx-auto max-w-3xl">
                                                    @foreach ($levels['middle'] as $certification)
                                                        <div class="relative group">
                                                            <!-- Vertical Connector -->
                                                            <div class="absolute -top-10 left-1/2 transform -translate-x-1/2 h-10 w-1 bg-red-600"></div>
                                                            <!-- Node -->
                                                            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-red-600 border-2 border-white shadow"></div>
                                                            <!-- Certification Card -->
                                                            <div class="bg-gray-50 rounded-xl p-6 shadow-md hover:shadow-lg transition-all border-t-4 border-red-600 h-full">
                                                                <div class="text-center pt-2">
                                                                    <h4 class="text-lg font-bold text-gray-900 mb-2">{{ $certification->cert_title }}</h4>
                                                                    <p class="text-sm text-gray-600 mb-3">{{ $certification->cert_issuer }}</p>
                                                                    <div class="flex justify-center mb-4">
                                                                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">{{ $certification->cert_year }}</span>
                                                                    </div>
                                                                    <p class="text-xs text-gray-500">{{ $certification->cert_description }}</p>
    
                                                                    <!-- Action Buttons (shown on hover) -->
                                                                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex space-x-2">
                                                                        <button class="edit-certification-btn text-blue-500 hover:text-blue-700 text-sm" data-id="{{ $certification->id }}">
                                                                            <i class="fas fa-edit mr-1"></i> Edit
                                                                        </button>
                                                                        <form method="POST" action="{{ route('certifications.destroy', $certification->id) }}"
                                                                            onsubmit="return confirm('Are you sure you want to delete this certification?')">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="text-red-500 hover:text-red-700 text-sm">
                                                                                <i class="fas fa-trash mr-1"></i> Delete
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
    
                                        <!-- Bottom Level (remaining certifications) -->
                                        @if ($levels['bottom']->isNotEmpty())
                                            <div class="relative">
                                                <!-- Vertical Connector from middle level -->
                                                <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 h-8 w-1 bg-red-600"></div>
                                                <!-- Horizontal Branch -->
                                                <div class="absolute top-0 left-1/3 right-1/3 h-1 bg-red-600"></div>
    
                                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 pt-12">
                                                    @foreach ($levels['bottom'] as $certification)
                                                        <div class="relative group">
                                                            <!-- Vertical Connector -->
                                                            <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 h-10 w-1 bg-red-600"></div>
                                                            <!-- Node -->
                                                            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-red-600 border-2 border-white shadow"></div>
                                                            <!-- Certification Card -->
                                                            <div class="bg-gray-50 rounded-xl p-6 shadow-md hover:shadow-lg transition-all border-t-4 border-red-600 h-full">
                                                                <div class="text-center pt-2">
                                                                    <h4 class="text-lg font-bold text-gray-900 mb-2">{{ $certification->cert_title }}</h4>
                                                                    <p class="text-sm text-gray-600 mb-3">{{ $certification->cert_issuer }}</p>
                                                                    <div class="flex justify-center mb-4">
                                                                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">{{ $certification->cert_year }}</span>
                                                                    </div>
                                                                    <p class="text-xs text-gray-500">{{ $certification->cert_description }}</p>
    
                                                                    <!-- Action Buttons (shown on hover) -->
                                                                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex space-x-2">
                                                                        <button class="edit-certification-btn text-blue-500 hover:text-blue-700 text-sm" data-id="{{ $certification->id }}">
                                                                            <i class="fas fa-edit mr-1"></i> Edit
                                                                        </button>
                                                                        <form method="POST" action="{{ route('certifications.destroy', $certification->id) }}"
                                                                            onsubmit="return confirm('Are you sure you want to delete this certification?')">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="text-red-500 hover:text-red-700 text-sm">
                                                                                <i class="fas fa-trash mr-1"></i> Delete
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </main>
            </div>
        </div>
    
  <script>
    // Get elements
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    const sidebarToggle = document.getElementById('sidebarToggle');
    
    // Variable to track sidebar state
    let sidebarCollapsed = false;
    
    // Toggle sidebar function
    function toggleSidebar() {
      if (window.innerWidth < 768) {
        // Mobile behavior - slide in/out
        sidebar.classList.toggle('open');
      } else {
        // Desktop behavior - expand/collapse
        sidebarCollapsed = !sidebarCollapsed;
        
        if (sidebarCollapsed) {
          sidebar.style.width = '80px';
          mainContent.style.marginLeft = '0';
          
          // Hide text in sidebar items, only show icons
          const sidebarTexts = document.querySelectorAll('.sidebar-item span');
          sidebarTexts.forEach(el => {
            el.style.display = 'none';
          });
          
          // Center icons
          const sidebarItems = document.querySelectorAll('.sidebar-item');
          sidebarItems.forEach(el => {
            el.style.justifyContent = 'center';
          });
          
          // Hide menu text
          const menuText = document.querySelector('.px-4.text-sm.text-gray-400');
          if (menuText) menuText.style.display = 'none';
          
          // Hide name text
          const nameText = document.querySelector('.text-xl.font-bold.text-white');
          if (nameText) nameText.style.display = 'none';
          
        } else {
          sidebar.style.width = '256px';
          mainContent.style.marginLeft = '0';
          
          // Show text in sidebar items
          const sidebarTexts = document.querySelectorAll('.sidebar-item span');
          sidebarTexts.forEach(el => {
            el.style.display = 'inline';
          });
          
          // Reset justify content
          const sidebarItems = document.querySelectorAll('.sidebar-item');
          sidebarItems.forEach(el => {
            el.style.justifyContent = '';
          });
          
          // Show menu text
          const menuText = document.querySelector('.px-4.text-sm.text-gray-400');
          if (menuText) menuText.style.display = 'block';
          
          // Show name text
          const nameText = document.querySelector('.text-xl.font-bold.text-white');
          if (nameText) nameText.style.display = 'block';
        }
      }
    }
    
    // Add event listener for sidebar toggle
    sidebarToggle.addEventListener('click', toggleSidebar);
    
    // Function to handle resize events
    function handleResize() {
      if (window.innerWidth < 768) {
        sidebar.classList.add('collapsed');
        if (sidebarCollapsed) {
          // Reset desktop collapsed state when moving to mobile
          sidebarCollapsed = false;
          sidebar.style.width = '256px';
          
          // Show text in sidebar items
          const sidebarTexts = document.querySelectorAll('.sidebar-item span');
          sidebarTexts.forEach(el => {
            el.style.display = 'inline';
          });
          
          // Reset justify content
          const sidebarItems = document.querySelectorAll('.sidebar-item');
          sidebarItems.forEach(el => {
            el.style.justifyContent = '';
          });
          
          // Show menu text
          const menuText = document.querySelector('.px-4.text-sm.text-gray-400');
          if (menuText) menuText.style.display = 'block';
          
          // Show name text
          const nameText = document.querySelector('.text-xl.font-bold.text-white');
          if (nameText) nameText.style.display = 'block';
        }
      } else {
        sidebar.classList.remove('collapsed', 'open');
      }
    }
    
    // Initialize and add resize listener
    window.addEventListener('resize', handleResize);
    handleResize(); // Initial call
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
      if (window.innerWidth < 768 && 
          !sidebar.contains(event.target) && 
          !sidebarToggle.contains(event.target) &&
          sidebar.classList.contains('open')) {
        sidebar.classList.remove('open');
      }
    });
  </script>
        @include('sharedComponents.modal')
