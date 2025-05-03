<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MB - Portfolio Admin</title>
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- External Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chart.js/3.7.0/chart.min.js"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .admin-hero-item {
            position: relative;
            overflow: visible !important;
            transition: all 0.3s ease;
        }

        .admin-hero-item:hover {
            transform: translateY(-3px);
        }

        .hero-actions {
            z-index: 20;
            position: absolute;
            top: 15px;
            right: 15px;
            display: none;
            gap: 8px;
        }

        .admin-hero-item:hover .hero-actions {
            display: flex;
        }

        .action-btn {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .edit-btn {
            background-color: #3b82f6;
            color: white;
        }

        .delete-btn {
            background-color: #ef4444;
            color: white;
        }

        .action-btn:hover {
            transform: scale(1.1);
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: white;
            border-radius: 0.5rem;
            width: 100%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
        }

        @media (min-width: 768px) {
            .hero-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        .preview-image {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        /* Hero specific styles */
        .hello-bubble {
            display: inline-block;
            background-color: #ff5e62;
            color: #fff;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            position: relative;
            margin-bottom: 1rem;
            line-height: 1;
        }

        .hello-bubble::after {
            content: '';
            position: absolute;
            width: 12px;
            height: 12px;
            background-color: #ff5e62;
            border-radius: 50%;
            right: -15px;
            transform: translateY(-50%);
        }

        .hello-bubble::before {
            content: '';
            position: absolute;
            width: 8px;
            height: 8px;
            background-color: #ff5 acoustics:1;
            e62;
            border-radius: 50%;
            right: -25px;
            top: 50%;
            transform: translateY(-50%);
        }

        .name-highlight {
            color: #ff5e62;
            position: relative;
            display: inline-block;
        }

        .name-highlight::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 8px;
            background-color: rgba(255, 94, 98, 0.2);
            z-index: -1;
        }

        .rating-stars {
            color: #ff5e62;
            font-size: 24px;
            letter-spacing: 2px;
        }

        .circle-bg-preview {
            position: absolute;
            width: 480px;
            height: 520px;
            background-color: #ff5e62;
            border-radius: 50%;
            bottom: -300px;
            z-index: -1;
        }

        /* Success Message */
        .success-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #10b981;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            z-index: 1000;
            display: none;
            animation: fadeInOut 2s ease-in-out;
        }

        @keyframes fadeInOut {
            0% { opacity: 0; transform: translateY(-10px); }
            10% { opacity: 1; transform: translateY(0); }
            90% { opacity: 1; transform: translateY(0); }
            100% { opacity: 0; transform: translateY(-10px); }
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">
    <!-- Success Message -->
    <div id="successMessage" class="success-message"></div>

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar w-64 bg-black text-white shadow-md flex-shrink-0 h-full overflow-y-auto">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="h-10 w-10 rounded-full bg-red-500 flex items-center justify-center text-white font-bold mr-2">MB</div>
                    <h1 class="text-xl font-bold text-white">Maldrey Bernardo</h1>
                </div>
            </div>
            <div class="px-4 text-sm text-gray-400 mb-2">MENU</div>
            <nav class="px-4 py-2">
                <a href="{{ route('admin.Awelcome') }}" class="sidebar-item flex items-center py-3 px-4 text-gray-300 font-medium rounded-md mb-3">
                    <i class="fas fa-th-large mr-3"></i><span>DASHBOARD</span>
                </a>
                <a href="{{ route('admin.Ahero') }}" class="sidebar-item flex items-center py-3 px-4 bg-red-500 font-medium rounded-md mb-3 active">
                    <i class="fas fa-user mr-3"></i><span>HERO SECTION</span>
                </a>
                <a href="{{ route('admin.Askills') }}" class="sidebar-item flex items-center py-3 px-4 text-gray-300 font-medium rounded-md mb-3">
                    <i class="fas fa-laptop-code mr-3"></i><span>SKILLS</span>
                </a>
                <a href="{{ route('admin.Aivet') }}" class="sidebar-item flex items-center py-3 px-4 text-gray-300 font-medium rounded-md mb-3">
                    <i class="fas fa-graduation-cap mr-3"></i><span>IVET</span>
                </a>
                <a href="{{ route('admin.EC') }}" class="sidebar-item flex items-center py-3 px-4 text-gray-300 font-medium rounded-md mb-3">
                    <i class="fas fa-certificate mr-3"></i><span>QUALIFICATIONS</span>
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
                </div>
                <div x-data="{ open: false }" class="relative">
                    <div class="flex items-center cursor-pointer" @click="open = !open">
                        <div class="h-10 w-10 rounded-full bg-red-500 flex items-center justify-center text-white mr-2">MB</div>
                        <span class="text-gray-700 font-medium mr-1">Maldrey</span>
                        <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                    </div>
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>     {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a> --}}

                        <div class="border-t border-gray-100"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>         </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <div class="flex-1 overflow-auto p-6">
                <div class="container mx-auto">
                    <!-- Page Header -->
                    <div class="flex justify-between items-center mb-8">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800">Hero Section Management</h1>
                            <p class="text-gray-600">Add, edit or remove hero sections</p>
                        </div>
                        <button id="addHeroBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-plus mr-2"></i> Add Hero Section
                        </button>
                    </div>

                    <!-- Hero Sections Grid -->
                    <div class="hero-grid grid grid-cols-1 gap-6 mb-8">
                        @foreach($heroes as $hero)
                        <div class="admin-hero-item bg-white rounded-xl shadow-md overflow-hidden relative hover:shadow-lg transition-all duration-300">
                            <!-- Action Buttons -->
                            <div class="hero-actions">
                                <div class="action-btn edit-btn" data-id="{{ $hero->id }}">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="action-btn delete-btn" data-id="{{ $hero->id }}">
                                    <i class="fas fa-trash"></i>
                                </div>
                            </div>
                            
                            <!-- Hero Preview -->
                            <div class="p-6">
                                <div class="flex flex-col md:flex-row gap-6 items-center">
                                    <!-- Text Content -->
                                    <div class="flex-1">
                                        <div class="hello relative inline-block mb-4">
                                            <span class="hello-bubble">Hello!</span>
                                        </div>
                                        <h1 class="text-3xl font-bold mb-2">I'm <span class="name-highlight">{{ $hero->name }}</span>,</h1>
                                        <h2 class="text-2xl text-gray-600 mb-4">{{ $hero->job_title }}</h2>
                                        
                                        <div class="testimonial-block relative bg-gray-50 p-4 rounded-lg mb-4">
                                            <div class="text-5xl text-gray-200 absolute top-0 left-0">"</div>
                                            <p class="pl-6 italic text-gray-700">{{ $hero->testimonial }}</p>
                                        </div>
                                        
                                        <div class="flex items-center">
                                            <div class="mr-8">
                                                <p class="text-2xl font-bold">{{ $hero->clients_served }}</p>
                                                <p class="text-gray-500">Clients Served</p>
                                            </div>
                                            <div>
                                                <div class="flex text-yellow-400 mb-1">
                                                    ★ ★ ★ ★ ★
                                                </div>
                                                <p class="text-xl font-medium">{{ $hero->experience_duration }}</p>
                                                <p class="text-sm bg-gray-100 inline-block px-2 py-1 rounded">{{ $hero->expertise_level }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Image Preview -->
                                    <div class="relative">
                                        <div class="circle-bg-preview"></div>
                                        <img 
                                        src="{{ $hero && $hero->profile_image && Storage::exists('public/hero_images/' . $hero->profile_image) ? url('storage/hero_images/' . $hero->profile_image) : '#' }}" 
                                        onerror="this.style.display='none'" 
                                        alt="{{ $hero->name ?? 'No Name' }}" 
                                        class="profile-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Hero Section Modal -->
    <div id="heroModal" class="modal-overlay">
        <div class="modal-content">
            <div class="flex justify-between items-center border-b px-6 py-4">
                <h3 id="heroModalTitle" class="text-lg font-semibold">Add Hero Section</h3>
                <button id="closeHeroModal" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form id="heroForm" class="p-6 space-y-4" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="heroId" name="id">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name*</label>
                        <input type="text" id="name" name="name" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>
                    <div>
                        <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title*</label>
                        <input type="text" id="job_title" name="job_title" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>
                </div>
                <div>
                    <label for="testimonial" class="block text-sm font-medium text-gray-700">Testimonial*</label>
                    <textarea id="testimonial" name="testimonial" rows="3" required
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"></textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="clients_served" class="block text-sm font-medium text-gray-700">Clients Served*</label>
                        <input type="text" id="clients_served" name="clients_served" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>
                    <div>
                        <label for="experience_duration" class="block text-sm font-medium text-gray-700">Experience Duration*</label>
                        <input type="text" id="experience_duration" name="experience_duration" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>
                    <div>
                        <label for="expertise_level" class="block text-sm font-medium text-gray-700">Expertise Level*</label>
                        <input type="text" id="expertise_level" name="expertise_level" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>
                </div>
                <div>
                    <label for="profile_image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                    <input type="file" id="profile_image" name="profile_image" accept="image/*"
                           class="mt-1 block w-full text-sm text-gray-500
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-md file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-red-50 file:text-red-700
                                  hover:file:bg-red-100">
                    <div id="currentImageContainer" class="mt-2 hidden">
                        <p class="text-sm text-gray-500">Current Image:</p>
                        <img id="currentImagePreview" src="" class="preview-image">
                    </div>
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" id="cancelHeroBtn" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Modal elements
        const heroModal = document.getElementById('heroModal');
        const heroModalTitle = document.getElementById('heroModalTitle');
        const heroForm = document.getElementById('heroForm');
        const currentImageContainer = document.getElementById('currentImageContainer');
        const currentImagePreview = document.getElementById('currentImagePreview');
        const successMessage = document.getElementById('successMessage');
        let currentEditId = null;

        // Ensure modal is hidden on page load
        heroModal.style.display = 'none';

        // Show add hero button
        document.getElementById('addHeroBtn').addEventListener('click', function() {
            currentEditId = null;
            heroModalTitle.textContent = 'Add Hero Section';
            heroForm.reset();
            document.getElementById('heroId').value = '';
            currentImageContainer.classList.add('hidden');
            heroModal.style.display = 'flex';
        });

        // Show edit hero buttons
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const heroId = this.getAttribute('data-id');
                fetch(`/hero/${heroId}/edit`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(hero => {
                        currentEditId = hero.id;
                        heroModalTitle.textContent = 'Edit Hero Section';
                        document.getElementById('heroId').value = hero.id;
                        document.getElementById('name').value = hero.name;
                        document.getElementById('job_title').value = hero.job_title;
                        document.getElementById('testimonial').value = hero.testimonial;
                        document.getElementById('clients_served').value = hero.clients_served;
                        document.getElementById('experience_duration').value = hero.experience_duration;
                        document.getElementById('expertise_level').value = hero.expertise_level;

                        // Handle image preview
                        if (hero.profile_image) {
                            currentImagePreview.src = '/storage/hero_images/' + hero.profile_image;
                            currentImageContainer.classList.remove('hidden');
                        } else {
                            currentImageContainer.classList.add('hidden');
                        }

                        heroModal.style.display = 'flex';
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to load hero data');
                    });
            });
        });

        // Close modal buttons
        document.getElementById('closeHeroModal').addEventListener('click', function() {
            heroModal.style.display = 'none';
        });

        document.getElementById('cancelHeroBtn').addEventListener('click', function() {
            heroModal.style.display = 'none';
        });

        // Close modal when clicking outside
        heroModal.addEventListener('click', function(e) {
            if (e.target === heroModal) {
                heroModal.style.display = 'none';
            }
        });

        // Save hero section
        heroForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const url = currentEditId ? `/hero/${currentEditId}` : '/hero';
            const method = 'POST';

            if (currentEditId) {
                formData.append('_method', 'PUT');
            }

            fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(errorData => {
                        if (response.status === 422) {
                            const errors = Object.values(errorData.errors).flat().join('\n');
                            throw new Error(errors || 'Validation failed');
                        }
                        throw new Error(errorData.message || 'Network response was not ok');
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    heroModal.style.display = 'none';
                    successMessage.textContent = data.message;
                    successMessage.style.display = 'block';
                    setTimeout(() => {
                        successMessage.style.display = 'none';
                    }, 2000);
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000); // Reload after message disappears
                } else {
                    alert('Error saving hero section: ' + (data.message || 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error saving hero section: ' + error.message);
            });
        });

        // Delete hero section
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                if (confirm('Are you sure you want to delete this hero section?')) {
                    const heroId = this.getAttribute('data-id');

                    fetch(`/hero/${heroId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            successMessage.textContent = data.message;
                            successMessage.style.display = 'block';
                            setTimeout(() => {
                                successMessage.style.display = 'none';
                            }, 2000);
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000); // Reload after message disappears
                        } else {
                            alert('Error deleting hero section: ' + (data.message || 'Unknown error'));
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error deleting hero section: ' + error.message);
                    });
                }
            });
        });

        // Sidebar toggle
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');

            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
                mainContent.classList.add('ml-64');
            } else {
                sidebar.classList.add('hidden');
                mainContent.classList.remove('ml-64');
            }
        });
    });
    </script>

    
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
</body>
</html>