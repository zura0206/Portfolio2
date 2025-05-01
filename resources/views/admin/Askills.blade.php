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
                        </x-dropdown-link>             <div class="border-t border-gray-100"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>     </div>
                </div>
            </header>
            <style>
                /* Skills Section */
                #skills {
                    background-color: #1a1a1a;
                    text-align: center;
                    padding: 60px 20px;
                    width: 100%;
                    position: relative;
                    border-radius: 50px 50px 0 0;
                    height: auto;
                }

                .b-text-4xl {
                    color: #ffffff;
                }

                .container {
                    max-width: 1200px;
                    margin: 0 auto;
                }

                .grid {
                    display: grid;
                    gap: 2rem;
                }

                .bg-gray-50 {
                    background-color: #f9fafb;
                }

                .hover\:shadow-lg:hover {
                    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                }

                .transition-shadow {
                    transition: box-shadow 0.3s ease;
                }

                .skill-card {
                    opacity: 0;
                    transform: translateY(20px);
                    transition: opacity 0.5s ease, transform 0.5s ease, scale 0.3s ease;
                }

                .skill-card.visible {
                    opacity: 1;
                    transform: translateY(0);
                }

                .skill-card:hover {
                    transform: translateY(-5px) scale(1.02);
                    border: 1px solid transparent;
                    border-image: linear-gradient(to right, #dc2626, #9ca3af) 1;
                }

                .skill-icon {
                    transition: transform 0.5s ease;
                }

                .skill-card.visible .skill-icon {
                    animation: iconPulse 0.5s ease;
                }

                .progress-bar {
                    width: 0;
                    transition: width 1s ease-in-out;
                }

                .skill-card.visible .progress-bar {
                    width: var(--progress-width);
                }

                @keyframes iconPulse {

                    0%,
                    100% {
                        transform: scale(1);
                    }

                    50% {
                        transform: scale(1.15);
                    }
                }

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

                /* Responsive Styles */
                @media (max-width: 640px) {
                    #skills {
                        padding: 40px 10px;
                    }

                    .grid {
                        grid-template-columns: 1fr;
                        gap: 1.5rem;
                    }

                    .skill-card {
                        padding: 1.5rem;
                    }

                    .skill-card h3 {
                        font-size: 1.125rem;
                        /* text-lg */
                    }

                    .skill-card p {
                        font-size: 0.875rem;
                        /* text-sm */
                    }

                    .skill-icon {
                        width: 1.5rem;
                        height: 1.5rem;
                    }

                    .progress-bar-container {
                        height: 0.25rem;
                    }

                    .timeline-marker {
                        margin-right: 1rem;
                    }

                    .timeline-content {
                        padding: 1.5rem;
                    }

                    .timeline-content h3 {
                        font-size: 1.125rem;
                        /* text-lg */
                    }

                    .timeline-content p,
                    .timeline-content li {
                        font-size: 0.875rem;
                        /* text-sm */
                    }
                }

                @media (max-width: 320px) {
                    .skill-card {
                        padding: 1rem;
                    }

                    .skill-card h3 {
                        font-size: 1rem;
                    }

                    .skill-card p {
                        font-size: 0.75rem;
                    }

                    .skill-icon {
                        width: 1.25rem;
                        height: 1.25rem;
                    }

                    .timeline-content {
                        padding: 1rem;
                    }
                }
            </style>

     
       
        
                   <div class="container overflow-auto">
                       <style>
                    
                           .admin-skill-card {
                               position: relative;
                           }
                           .skill-actions {
                               position: absolute;
                               top: 15px;
                               right: 15px;
                               display: none;
                           }
                           .admin-skill-card:hover .skill-actions {
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
       
                       <section id="skills">
                           <div class="container mx-auto px-4">
                               <div class="text-center mb-16">
                                   <span class="text-sm font-medium text-red-500 uppercase tracking-wider">What I'm good at</span>
                                   <h2 class="b-text-4xl font-bold mt-2">My Skills</h2>
                                   <div class="w-16 h-1 bg-red-500 mx-auto mt-4"></div>
                               </div>
       
                               <!-- Add Skill Button -->
                               <div class="flex justify-center mb-6">
                                   <button id="addSkillBtn"
                                       class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors">
                                       <i class="fas fa-plus mr-2"></i>Add Skill
                                   </button>
                               </div>
       
                               <!-- Skills Grid -->
                               <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                                   @foreach($skills as $skill)
                                   <div class="admin-skill-card skill-card bg-gray-50 rounded-lg p-8 hover:shadow-lg transition-shadow duration-300">
                                       <!-- Action Buttons -->
                                       <div class="skill-actions">
                                           <div class="action-btn edit-btn" data-id="{{ $skill->id }}">
                                               <i class="fas fa-edit"></i>
                                           </div>
                                           <div class="action-btn delete-btn" data-id="{{ $skill->id }}">
                                               <i class="fas fa-trash"></i>
                                           </div>
                                       </div>
                                       
                                       <!-- Skill Content -->
                                       <div class="flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mb-6">
                                           <svg xmlns="http://www.w3.org/2000/svg" class="skill-icon h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $skill->getIconPath() }}" />
                                           </svg>
                                       </div>
                                       <h3 class="text-xl font-bold mb-3">{{ $skill->title }}</h3>
                                       <p class="text-gray-600">{{ $skill->description }}</p>
                                       <div class="mt-4">
                                           <div class="flex items-center justify-between mb-2">
                                               <span class="text-sm font-medium">{{ $skill->tools }}</span>
                                               <span class="text-sm font-medium">{{ $skill->percentage }}%</span>
                                           </div>
                                           <div class="w-full bg-gray-200 rounded-full h-1.5 progress-bar-container">
                                               <div class="progress-bar bg-red-500 h-1.5 rounded-full" style="--progress-width: {{ $skill->percentage }}%"></div>
                                           </div>
                                       </div>
                                   </div>
                                   @endforeach
                               </div>
                           </div>
                       </section>
       
                       <!-- Modal for Add/Edit Skill -->
                       <div id="skillModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden p-4 z-50">
                           <div class="bg-white rounded-xl p-6 w-full max-w-md">
                               <h3 id="skillModalTitle" class="text-xl font-semibold text-gray-800 mb-4">Add Skill</h3>
                               <form id="skillForm">
                                   @csrf
                                   <input type="hidden" id="skillId" name="id" value="">
                                   <div class="space-y-4">
                                       <div>
                                           <label for="skillTitle" class="block text-sm font-medium text-gray-700">Title</label>
                                           <input type="text" id="skillTitle" name="title"
                                               class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                               placeholder="e.g., Web Design" required>
                                       </div>
                                       <div>
                                           <label for="skillDescription" class="block text-sm font-medium text-gray-700">Description</label>
                                           <textarea id="skillDescription" name="description"
                                               class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                               placeholder="e.g., Creating visually appealing websites..." rows="3" required></textarea>
                                       </div>
                                       <div>
                                           <label for="skillTech" class="block text-sm font-medium text-gray-700">Technologies</label>
                                           <input type="text" id="skillTech" name="tools"
                                               class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                               placeholder="e.g., HTML/CSS" required>
                                       </div>
                                       <div>
                                           <label for="skillProficiency" class="block text-sm font-medium text-gray-700">Proficiency (%)</label>
                                           <input type="number" id="skillProficiency" name="percentage" min="0" max="100"
                                               class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                               placeholder="e.g., 95" required>
                                       </div>
                                   </div>
                                   <div class="flex justify-end space-x-3 mt-6">
                                       <button type="button" id="cancelSkillBtn"
                                           class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">Cancel</button>
                                       <button type="submit" id="saveSkillBtn"
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
                   // Animation for skill cards
                   const skillCards = document.querySelectorAll('.skill-card');
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
                       },
                       { threshold: 0.1 }
                   );
                   skillCards.forEach(card => observer.observe(card));
       
                   // Modal functionality
                   const skillModal = document.getElementById('skillModal');
                   const addSkillBtn = document.getElementById('addSkillBtn');
                   const cancelSkillBtn = document.getElementById('cancelSkillBtn');
                   const saveSkillBtn = document.getElementById('saveSkillBtn');
                   const skillModalTitle = document.getElementById('skillModalTitle');
                   const skillForm = document.getElementById('skillForm');
                   
                   let currentEditId = null;
       
                   // Add skill button
                   addSkillBtn.addEventListener('click', function() {
                       currentEditId = null;
                       skillModalTitle.textContent = 'Add Skill';
                       document.getElementById('skillId').value = '';
                       document.getElementById('skillTitle').value = '';
                       document.getElementById('skillDescription').value = '';
                       document.getElementById('skillTech').value = '';
                       document.getElementById('skillProficiency').value = '';
                       skillModal.classList.remove('hidden');
                   });
       
                   // Edit skill buttons
                   document.querySelectorAll('.edit-btn').forEach(btn => {
                       btn.addEventListener('click', function() {
                           const skillId = this.getAttribute('data-id');
                           fetch(`/skills/${skillId}/edit`)
                               .then(response => {
                                   if (!response.ok) {
                                       throw new Error('Network response was not ok');
                                   }
                                   return response.json();
                               })
                               .then(skill => {
                                   currentEditId = skill.id;
                                   skillModalTitle.textContent = 'Edit Skill';
                                   document.getElementById('skillId').value = skill.id;
                                   document.getElementById('skillTitle').value = skill.title;
                                   document.getElementById('skillDescription').value = skill.description;
                                   document.getElementById('skillTech').value = skill.tools;
                                   document.getElementById('skillProficiency').value = skill.percentage;
                                   skillModal.classList.remove('hidden');
                               })
                               .catch(error => {
                                   console.error('Error:', error);
                                   alert('Error fetching skill data');
                               });
                       });
                   });
       
                   // Delete skill buttons
                   document.querySelectorAll('.delete-btn').forEach(btn => {
                       btn.addEventListener('click', function() {
                           const skillId = this.getAttribute('data-id');
                           if (confirm('Are you sure you want to delete this skill?')) {
                               fetch(`/skills/${skillId}`, {
                                   method: 'DELETE',
                                   headers: {
                                       'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
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
                                       alert('Error deleting skill: ' + (data.message || 'Unknown error'));
                                   }
                               })
                               .catch(error => {
                                   console.error('Error:', error);
                                   alert('Error deleting skill');
                               });
                           }
                       });
                   });
       
                   // Cancel button
                   cancelSkillBtn.addEventListener('click', function() {
                       skillModal.classList.add('hidden');
                   });
       
                   // Form submission
                   skillForm.addEventListener('submit', function(e) {
                       e.preventDefault();
                       
                       const formData = new FormData(this);
                       const url = currentEditId ? `/skills/${currentEditId}` : '/skills';
                       const method = currentEditId ? 'PUT' : 'POST';
                       
                       fetch(url, {
                           method: method,
                           headers: {
                               'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
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
                               alert('Error saving skill: ' + (data.message || 'Unknown error'));
                           }
                       })
                       .catch(error => {
                           console.error('Error:', error);
                           alert('Error saving skill');
                       });
                   });
       
                   // Sidebar toggle functionality
                   const sidebar = document.getElementById('sidebar');
                   const mainContent = document.getElementById('mainContent');
                   const sidebarToggle = document.getElementById('sidebarToggle');
                   let sidebarCollapsed = false;
       
                   // Toggle sidebar function
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
       
                   // Add event listener for sidebar toggle
                   sidebarToggle.addEventListener('click', toggleSidebar);
       
                   // Function to handle resize events
                   function handleResize() {
                       if (window.innerWidth < 768) {
                           sidebar.classList.add('collapsed');
                           if (sidebarCollapsed) {
                               sidebarCollapsed = false;
                               sidebar.style.width = '256px';
                               document.querySelectorAll('.sidebar-item span').forEach(el => el.style.display = 'inline');
                               document.querySelectorAll('.sidebar-item').forEach(el => el.style.justifyContent = '');
                               const menuText = document.querySelector('.px-4.text-sm.text-gray-400');
                               if (menuText) menuText.style.display = 'block';
                               const nameText = document.querySelector('.text-xl.font-bold.text-white');
                               if (nameText) nameText.style.display = 'block';
                           }
                       } else {
                           sidebar.classList.remove('collapsed', 'open');
                       }
                   }
       
                   // Initialize and add resize listener
                   window.addEventListener('resize', handleResize);
                   handleResize();
       
                   // Close sidebar when clicking outside on mobile
                   document.addEventListener('click', function(event) {
                       if (window.innerWidth < 768 &&
                           !sidebar.contains(event.target) &&
                           !sidebarToggle.contains(event.target) &&
                           sidebar.classList.contains('open')) {
                           sidebar.classList.remove('open');
                       }
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
