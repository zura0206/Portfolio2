<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MB - Projects Portfolio</title>
    <!-- Vite Assets -->
    @if (file_exists(public_path('build/manifest.json')))
        @vite(['resources/js/app.js', 'resources/css/app.css'])
    @else
        <!-- Fallback for production when manifest exists but Vite helper fails -->
        <link href="{{ asset('build/assets/app-DehKQBJm.css') }}" rel="stylesheet">
        <script src="{{ asset('build/assets/app-eMHK6VFw.js') }}" defer></script>
    @endif
    <!-- External Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chart.js/3.7.0/chart.min.js"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Swiper JS for Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .admin-project-item {
            position: relative;
            overflow: visible !important;
        }

        .project-actions {
            z-index: 20;
            position: absolute;
            top: 15px;
            right: 15px;
            display: none;
            gap: 8px;
        }

        .admin-project-item:hover .project-actions {
            display: flex;
        }

        .action-btn {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
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

        /* Modal Styles */
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
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal-overlay.show {
            display: flex;
            opacity: 1;
        }

        .modal-content {
            background-color: white;
            border-radius: 0.5rem;
            width: 100%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            transform: scale(0.8);
            transition: transform 0.3s ease;
        }

        .modal-overlay.show .modal-content {
            transform: scale(1);
        }

        /* Swiper Carousel Styles */
        .swiper {
            width: 100%;
            height: 450px;
            margin-bottom: 30px;
        }

        .swiper-slide {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .swiper-button-next, .swiper-button-prev {
            color: #ef4444 !important;
        }

        .swiper-pagination-bullet-active {
            background: #ef4444 !important;
        }

        .project-card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .project-image {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }

        .tech-tag {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            background-color: #f3f4f6;
            color: #374151;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            display: inline-block;
        }

        /* Responsive Grid */
        @media (min-width: 768px) {
            .project-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">
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
                <a href="{{ route('admin.Ahero') }}" class="sidebar-item flex items-center py-3 px-4 text-gray-300 font-medium rounded-md mb-3">
                    <i class="fas fa-user mr-3"></i><span>HERO SECTION</span>
                </a>
                <a href="{{ route('admin.Askills') }}" class="sidebar-item flex items-center py-3 px-4 text-gray-300 font-medium rounded-md mb-3">
                    <i class="fas fa-laptop-code mr-3"></i><span>SKILLS</span>
                </a>
                <a href="{{ route('admin.Aivet') }}" class="sidebar-item flex items-center py-3 px-4 text-gray-300 font-medium rounded-md mb-3">
                    <i class="fas fa-graduation-cap mr-3"></i><span>IVET</span>
                </a>
                <a href="{{ route('admin.Aproject') }}" class="sidebar-item flex items-center py-3 px-4 bg-red-500 font-medium rounded-md mb-3 active">
                    <i class="fas fa-code mr-3"></i><span>PROJECTS</span>
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
                        </x-dropdown-link>
                        <div class="border-t border-gray-100"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <div class="flex-1 overflow-auto p-6">
                <div class="container mx-auto">
                    <!-- Page Header -->
                    <div class="flex justify-between items-center mb-8">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800">Projects Management</h1>
                            <p class="text-gray-600">Add, edit or remove portfolio projects</p>
                        </div>
                        <button id="addProjectBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-plus mr-2"></i> Add Project
                        </button>
                    </div>

                    <!-- Carousel Preview -->
                    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Projects Carousel Preview</h2>
                        <div class="swiper projectSwiper">
                            <div class="swiper-wrapper">
                                @foreach($projects as $project)
                                <div class="swiper-slide">
                                    <div class="project-card">
                                        <img src="{{ $project->image_url ?? '/placeholder.jpg' }}" alt="{{ $project->title }}" class="project-image">
                                        <div class="p-4">
                                            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $project->title }}</h3>
                                            <p class="text-gray-600 mb-3 line-clamp-2">{{ $project->description }}</p>
                                            <div class="mb-3">
                                                @foreach(json_decode($project->technologies) as $tech)
                                                <span class="tech-tag">{{ $tech }}</span>
                                                @endforeach
                                            </div>
                                            <div class="flex justify-between items-center mt-2">
                                                @if($project->github_url)
                                                <a href="{{ $project->github_url }}" target="_blank" class="text-gray-600 hover:text-gray-800">
                                                    <i class="fab fa-github text-xl"></i>
                                                </a>
                                                @endif
                                                @if($project->live_url)
                                                <a href="{{ $project->live_url }}" target="_blank" class="text-blue-500 hover:text-blue-700">
                                                    <i class="fas fa-external-link-alt mr-1"></i> View Live
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>

                    <!-- Projects List -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">All Projects</h2>
                        <div class="project-grid grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($projects as $project)
                            <div class="admin-project-item bg-gray-50 rounded-xl overflow-hidden relative hover:shadow-lg transition-all duration-300">
                                <!-- Action Buttons -->
                                <div class="project-actions">
                                    <div class="action-btn edit-btn" data-id="{{ $project->id }}">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                    <div class="action-btn delete-btn" data-id="{{ $project->id }}">
                                        <i class="fas fa-trash"></i>
                                    </div>
                                </div>
                                <div class="flex flex-col md:flex-row">
                                    <div class="md:w-1/3">
                                        <img src="{{ $project->image_url ?? '/placeholder.jpg' }}"
                                            alt="{{ $project->title }}"
                                            class="w-full h-32 md:h-full object-cover">
                                    </div>
                                    <div class="p-4 md:w-2/3">
                                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $project->title }}</h3>
                                        <p class="text-gray-600 mb-3 line-clamp-2">{{ $project->description }}</p>
                                        <div class="mb-3">
                                            @foreach(json_decode($project->technologies) as $tech)
                                            <span class="tech-tag">{{ $tech }}</span>
                                            @endforeach
                                        </div>
                                        <div class="flex justify-between items-center mt-2">
                                            @if($project->github_url)
                                            <a href="{{ $project->github_url }}" target="_blank" class="text-gray-600 hover:text-gray-800">
                                                <i class="fab fa-github text-xl"></i>
                                            </a>
                                            @endif
                                            @if($project->live_url)
                                            <a href="{{ $project->live_url }}" target="_blank" class="text-blue-500 hover:text-blue-700">
                                                <i class="fas fa-external-link-alt mr-1"></i> View Live
                                            </a>
                                            @endif
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
    </div>

    <!-- Add/Edit Project Modal -->
    <div id="projectModal" class="modal-overlay">
        <div class="modal-content">
            <div class="flex justify-between items-center border-b px-6 py-4">
                <h3 id="projectModalTitle" class="text-lg font-semibold">Add Project</h3>
                <button id="closeProjectModal" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form id="projectForm" class="p-6 space-y-4" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="projectId" name="id">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Project Title*</label>
                        <input type="text" id="title" name="title" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>
                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700">Display Order</label>
                        <input type="number" id="order" name="order" min="1"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description*</label>
                    <textarea id="description" name="description" rows="3" required
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"></textarea>
                </div>
                <div>
                    <label for="technologies" class="block text-sm font-medium text-gray-700">Technologies* (Comma separated)</label>
                    <input type="text" id="technologies" name="technologies" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                           placeholder="e.g. HTML, CSS, JavaScript, Laravel">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="github_url" class="block text-sm font-medium text-gray-700">GitHub URL</label>
                        <input type="url" id="github_url" name="github_url"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>
                    <div>
                        <label for="live_url" class="block text-sm font-medium text-gray-700">Live URL</label>
                        <input type="url" id="live_url" name="live_url"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                    </div>
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Project Image*</label>
                    <input type="file" id="image" name="image" accept="image/*"
                           class="mt-1 block w-full text-sm text-gray-500
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-md file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-red-50 file:text-red-700
                                  hover:file:bg-red-100">
                    <div id="currentImageContainer" class="mt-2 hidden">
                        <p class="text-sm text-gray-500">Current Image:</p>
                        <img id="currentImagePreview" src="" class="h-20 mt-1 rounded">
                    </div>
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" id="cancelProjectBtn" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                        Save Project
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Swiper
        const swiper = new Swiper(".projectSwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
        });

        // Modal elements
        const projectModal = document.getElementById('projectModal');
        const projectModalTitle = document.getElementById('projectModalTitle');
        const projectForm = document.getElementById('projectForm');
        const currentImageContainer = document.getElementById('currentImageContainer');
        const currentImagePreview = document.getElementById('currentImagePreview');
        let currentEditId = null;

        // Function to show modal
        function showModal() {
            projectModal.classList.add('show');
        }

        // Function to hide modal
        function hideModal() {
            projectModal.classList.remove('show');
            projectForm.reset();
            document.getElementById('projectId').value = '';
            currentImageContainer.classList.add('hidden');
        }

        // Add Project button
        document.getElementById('addProjectBtn').addEventListener('click', function() {
            currentEditId = null;
            projectModalTitle.textContent = 'Add Project';
            projectForm.reset();
            document.getElementById('projectId').value = '';
            currentImageContainer.classList.add('hidden');
            showModal();
        });

        // Edit Project buttons
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const projectId = this.getAttribute('data-id');
                fetch(`/projects/${projectId}/edit`, {
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => {
                    if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                    return response.json();
                })
                .then(project => {
                    currentEditId = project.id;
                    projectModalTitle.textContent = 'Edit Project';
                    document.getElementById('projectId').value = project.id;
                    document.getElementById('title').value = project.title || '';
                    document.getElementById('description').value = project.description || '';
                    document.getElementById('order').value = project.order || '';
                    document.getElementById('technologies').value = Array.isArray(project.technologies)
                        ? project.technologies.join(', ')
                        : JSON.parse(project.technologies || '[]').join(', ');
                    document.getElementById('github_url').value = project.github_url || '';
                    document.getElementById('live_url').value = project.live_url || '';
                    
                    if (project.image_url) {
                        currentImagePreview.src = project.image_url;
                        currentImageContainer.classList.remove('hidden');
                    } else {
                        currentImageContainer.classList.add('hidden');
                    }
                    
                    showModal();
                })
                .catch(error => {
                    console.error('Error fetching project:', error);
                    alert('Failed to load project data. Please try again.');
                });
            });
        });

        // Close modal
        document.getElementById('closeProjectModal').addEventListener('click', hideModal);
        document.getElementById('cancelProjectBtn').addEventListener('click', hideModal);

        // Close modal when clicking outside
        projectModal.addEventListener('click', function(e) {
            if (e.target === projectModal) {
                hideModal();
            }
        });

        // Save Project
        projectForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const url = currentEditId ? `/projects/${currentEditId}` : '/projects';
            const method = currentEditId ? 'PUT' : 'POST';

            if (currentEditId) {
                formData.append('_method', 'PUT');
            }

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    hideModal();
                    window.location.reload();
                } else {
                    alert('Error saving project: ' + (data.message || 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Error saving project:', error);
                alert('Error saving project. Please try again.');
            });
        });

        // Delete Project
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                if (confirm('Are you sure you want to delete this project?')) {
                    const projectId = this.getAttribute('data-id');
                    fetch(`/projects/${projectId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => {
                        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            window.location.reload();
                        } else {
                            alert('Error deleting project: ' + (data.message || 'Unknown error'));
                        }
                    })
                    .catch(error => {
                        console.error('Error deleting project:', error);
                        alert('Error deleting project. Please try again.');
                    });
                }
            });
        });

        // Sidebar toggle functionality
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const sidebarToggle = document.getElementById('sidebarToggle');
        let sidebarCollapsed = false;

        function toggleSidebar() {
            if (window.innerWidth < 768) {
                sidebar.classList.toggle('open');
            } else {
                sidebarCollapsed = !sidebarCollapsed;
                if (sidebarCollapsed) {
                    sidebar.style.width = '80px';
                    mainContent.style.marginLeft = '0';
                    document.querySelectorAll('.sidebar-item span').forEach(el => el.style.display = 'none');
                    document.querySelectorAll('.sidebar-item').forEach(el => el.style.justifyContent = 'center');
                    const menuText = document.querySelector('.px-4.text-sm.text-gray-400');
                    if (menuText) menuText.style.display = 'none';
                    const nameText = document.querySelector('.text-xl.font-bold.text-white');
                    if (nameText) nameText.style.display = 'none';
                } else {
                    sidebar.style.width = '256px';
                    mainContent.style.marginLeft = '0';
                    document.querySelectorAll('.sidebar-item span').forEach(el => el.style.display = 'inline');
                    document.querySelectorAll('.sidebar-item').forEach(el => el.style.justifyContent = '');
                    const menuText = document.querySelector('.px-4.text-sm.text-gray-400');
                    if (menuText) menuText.style.display = 'block';
                    const nameText = document.querySelector('.text-xl.font-bold.text-white');
                    if (nameText) nameText.style.display = 'block';
                }
            }
        }

        sidebarToggle.addEventListener('click', toggleSidebar);
    });
    </script>
</body>
</html>