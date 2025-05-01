<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MB - Portfolio</title>
    <!-- Vite Assets -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <!-- External Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chart.js/3.7.0/chart.min.js"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom Styles -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gray-50 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar w-64 bg-black text-white shadow-md flex-shrink-0 h-full overflow-y-auto">
            <div class="p-6">
                <div class="flex items-center">
                    <div
                        class="h-10 w-10 rounded-full bg-red-500 flex items-center justify-center text-white font-bold mr-2">
                        MB</div>
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
                </div>
                <div x-data="{ open: false }" class="relative">
                    <div class="flex items-center cursor-pointer" @click="open = !open">
                        <div class="h-10 w-10 rounded-full bg-red-500 flex items-center justify-center text-white mr-2">
                            MB</div>
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
                        </form>          </div>
                </div>
            </header>



            <body class="bg-gray-50 font-sans">
                <div class="flex h-screen overflow-hidden">

                    <!-- Main Content -->
                    <div id="mainContent" class="flex flex-col flex-1 overflow-hidden">
                        <!-- Header -->
                        <div class="container overflow-auto">
                            <style>
                                /* Experience Section */
                                #experience {
                                    border-radius: 50px 50px 0 0;
                                }

                                .timeline-item {
                                    opacity: 0;
                                    transform: translateY(20px);
                                    transition: opacity 0.6s ease, transform 0.6s ease;
                                }

                                .timeline-item.visible {
                                    opacity: 1;
                                    transform: translateY(0);
                                }

                                .timeline-item:hover {
                                    transform: translateY(-5px);
                                }

                                .timeline-content:hover {
                                    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                                }

                                /* Admin Controls */
                                .admin-experience-item {
                                    position: relative;
                                }

                                .experience-actions {
                                    position: absolute;
                                    top: 15px;
                                    right: 15px;
                                    display: none;
                                }

                                .admin-experience-item:hover .experience-actions {
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
                            </style>

                            <section id="experience" class="py-16 bg-gray-50">
                                <div class="container max-w-5xl mx-auto px-4">
                                    <div class="text-center mb-16">
                                        <span class="text-sm font-medium text-red-500 uppercase tracking-wider">My
                                            Professional Journey</span>
                                        <h2 class="text-4xl font-bold mt-2 text-gray-800">Work Experience</h2>
                                        <div class="w-16 h-1 bg-red-500 mx-auto mt-4"></div>
                                    </div>

                                    <!-- Add Experience Button -->
                                    <div class="flex justify-center mb-6">
                                        <button id="addExperienceBtn"
                                            class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors">
                                            <i class="fas fa-plus mr-2"></i>Add Experience
                                        </button>
                                    </div>

                                    <div class="max-w-3xl mx-auto">
                                        @foreach ($experiences as $experience)
                                            <div class="admin-experience-item timeline-item flex mb-12">
                                                <!-- Action Buttons -->
                                                <div class="experience-actions">
                                                    <div class="action-btn edit-btn" data-id="{{ $experience->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </div>
                                                    <div class="action-btn delete-btn" data-id="{{ $experience->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </div>
                                                </div>

                                                <div class="timeline-marker mr-8 flex flex-col items-center">
                                                    <div class="w-4 h-4 rounded-full bg-red-500"></div>
                                                    @if (!$loop->last)
                                                        <div class="w-0.5 bg-red-300 flex-grow mt-2"></div>
                                                    @endif
                                                </div>
                                                <div
                                                    class="timeline-content bg-white rounded-lg shadow-md p-8 flex-grow transition-shadow duration-300">
                                                    <div class="flex flex-wrap items-center justify-between mb-4">
                                                        <h3 class="text-xl font-bold text-gray-800">
                                                            {{ $experience->job_title }}</h3>
                                                        <span
                                                            class="text-sm font-medium bg-red-100 text-red-500 py-1 px-3 rounded-full">{{ $experience->period }}</span>
                                                    </div>
                                                    <h4 class="text-md font-medium text-gray-600 mb-4">
                                                        {{ $experience->company }}</h4>
                                                    <p class="text-gray-600 mb-4">{{ $experience->description }}</p>
                                                    <div class="mb-4">
                                                        @php
                                                            $responsibilities = $experience->responsibilities;
                                                    
                                                            // If it's a string, split it into an array using new lines
                                                            if (is_string($responsibilities)) {
                                                                $responsibilities = preg_split('/\r\n|\r|\n/', $responsibilities);
                                                            }
                                                        @endphp
                                                    
                                                        @if(is_array($responsibilities) && count($responsibilities) > 0)
                                                            <ul class="list-disc list-outside pl-6 text-gray-800 space-y-2">
                                                                @foreach($responsibilities as $responsibility)
                                                                    @if(trim($responsibility) !== '')
                                                                        <li class="leading-relaxed">{{ $responsibility }}</li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>

                            <!-- Modal for Add/Edit Experience -->
                            <div id="experienceModal"
                                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden p-4 z-50">
                                <div class="bg-white rounded-xl p-6 w-full max-w-2xl">
                                    <h3 id="experienceModalTitle" class="text-xl font-semibold text-gray-800 mb-4">Add
                                        Work Experience</h3>
                                    <form id="experienceForm">
                                        @csrf
                                        <input type="hidden" id="experienceId" name="id" value="">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Job
                                                    Title</label>
                                                <input id="jobTitle" name="job_title" type="text"
                                                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                                    placeholder="e.g., Web Developer" required>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Company</label>
                                                <input id="company" name="company" type="text"
                                                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                                    placeholder="e.g., Tech Company Inc." required>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Period</label>
                                                <input id="period" name="period" type="text"
                                                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                                    placeholder="e.g., 2020 - Present" required>
                                            </div>
                                            <div class="md:col-span-2">
                                                <label
                                                    class="block text-sm font-medium text-gray-700">Description</label>
                                                <textarea id="description" name="description"
                                                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                                    placeholder="Brief description of your role..." rows="3" required></textarea>
                                            </div>
                                            <div class="md:col-span-2">
                                                <label class="block text-sm font-medium text-gray-700">Responsibilities
                                                    (one per line)</label>
                                                <textarea id="responsibilities" name="responsibilities"
                                                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                                    placeholder="List your key responsibilities..." rows="5" required></textarea>
                                            </div>
                                        </div>
                                        <div class="flex justify-end space-x-3 mt-6">
                                            <button type="button" id="cancelExperienceBtn"
                                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">Cancel</button>
                                            <button type="submit" id="saveExperienceBtn"
                                                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- JavaScript for CRUD Operations -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Animation for timeline items
                        const timelineItems = document.querySelectorAll('.timeline-item');
                        const observer = new IntersectionObserver(
                            (entries) => {
                                entries.forEach((entry, index) => {
                                    if (entry.isIntersecting) {
                                        setTimeout(() => {
                                            entry.target.classList.add('visible');
                                        }, index * 150);
                                        observer.unobserve(entry.target);
                                    }
                                });
                            }, {
                                threshold: 0.1
                            }
                        );
                        timelineItems.forEach(item => observer.observe(item));

                        // Modal functionality
                        const experienceModal = document.getElementById('experienceModal');
                        const addExperienceBtn = document.getElementById('addExperienceBtn');
                        const cancelExperienceBtn = document.getElementById('cancelExperienceBtn');
                        const saveExperienceBtn = document.getElementById('saveExperienceBtn');
                        const experienceModalTitle = document.getElementById('experienceModalTitle');
                        const experienceForm = document.getElementById('experienceForm');

                        let currentEditId = null;

                        // Add experience button
                        addExperienceBtn.addEventListener('click', function() {
                            currentEditId = null;
                            experienceModalTitle.textContent = 'Add Work Experience';
                            document.getElementById('experienceId').value = '';
                            document.getElementById('jobTitle').value = '';
                            document.getElementById('company').value = '';
                            document.getElementById('period').value = '';
                            document.getElementById('description').value = '';
                            document.getElementById('responsibilities').value = '';
                            experienceModal.classList.remove('hidden');
                        });

                        // Edit experience buttons
                        document.querySelectorAll('.edit-btn').forEach(btn => {
                            btn.addEventListener('click', function() {
                                const experienceId = this.getAttribute('data-id');
                                fetch(`/work-experiences/${experienceId}/edit`)
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Network response was not ok');
                                        }
                                        return response.json();
                                    })
                                    .then(experience => {
                                        currentEditId = experience.id;
                                        experienceModalTitle.textContent = 'Edit Work Experience';
                                        document.getElementById('experienceId').value = experience.id;
                                        document.getElementById('jobTitle').value = experience.job_title;
                                        document.getElementById('company').value = experience.company;
                                        document.getElementById('period').value = experience.period;
                                        document.getElementById('description').value = experience
                                            .description;
                                        document.getElementById('responsibilities').value = experience
                                            .responsibilities;
                                        experienceModal.classList.remove('hidden');
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert('Error fetching experience data');
                                    });
                            });
                        });

                        // Delete experience buttons
                        document.querySelectorAll('.delete-btn').forEach(btn => {
                            btn.addEventListener('click', function() {
                                const experienceId = this.getAttribute('data-id');
                                if (confirm('Are you sure you want to delete this work experience?')) {
                                    fetch(`/work-experiences/${experienceId}`, {
                                            method: 'DELETE',
                                            headers: {
                                                'X-CSRF-TOKEN': document.querySelector(
                                                    'meta[name="csrf-token"]').getAttribute('content'),
                                                'Accept': 'application/json',
                                                'Content-Type': 'application/json'
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
                                                window.location.reload();
                                            } else {
                                                alert('Error deleting experience: ' + (data.message ||
                                                    'Unknown error'));
                                            }
                                        })
                                        .catch(error => {
                                            console.error('Error:', error);
                                            alert('Error deleting experience');
                                        });
                                }
                            });
                        });

                        // Cancel button
                        cancelExperienceBtn.addEventListener('click', function() {
                            experienceModal.classList.add('hidden');
                        });

                        // Form submission
                        experienceForm.addEventListener('submit', function(e) {
                            e.preventDefault();

                            const formData = new FormData(this);
                            const url = currentEditId ? `/work-experiences/${currentEditId}` : '/work-experiences';
                            const method = currentEditId ? 'PUT' : 'POST';

                            fetch(url, {
                                    method: method,
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                            .getAttribute('content'),
                                        'Accept': 'application/json',
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify(Object.fromEntries(formData))
                                })
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Network response was not ok');
                                    }
                                    return response.json();
                                })
                                .then(data => {
                                    if (data.success) {
                                        window.location.reload();
                                    } else {
                                        alert('Error saving experience: ' + (data.message || 'Unknown error'));
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    alert('Error saving experience');
                                });
                        });
                    });
                </script>
            </body>

</html>
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
</script>
