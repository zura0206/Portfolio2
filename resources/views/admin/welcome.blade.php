  <!DOCTYPE html>
  <html lang="en">
  <head>
      <title>MB</title>
            <!-- Styles / Scripts -->
            @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            @vite('resources/css/app.css', 'resources/js/app.js')
        @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chart.js/3.7.0/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
  </head>
  <body class="bg-gray-50 font-sans">
    <div class="flex h-screen overflow-hidden">
      <!-- Sidebar -->
      <div id="sidebar" class="sidebar w-64 bg-black text-white shadow-md flex-shrink-0 h-full overflow-y-auto">
        <div class="p-6">
          <div class="flex items-center">
            <div class="h-10 w-10 rounded-full bg-red-500 flex items-center justify-center text-white font-bold mr-2">
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
      <style>
 .circle-bg {
  display: none !important;
}


      </style>
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
    <div 
      class="flex items-center cursor-pointer" 
      @click="open = !open">
      <div class="h-10 w-10 rounded-full bg-red-500 flex items-center justify-center text-white mr-2">
        MB
      </div>
      <span class="text-gray-700 font-medium mr-1">Maldrey</span>
      <i class="fas fa-chevron-down text-xs text-gray-500"></i>
    </div>

    <!-- Dropdown Menu -->
    <div 
      x-show="open" 
      @click.away="open = false"
      class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-50"
    >
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
    </form>       </div>
  </div>

        </div>
        
      </header>
      
      <!-- Content Area -->
      <main class="flex-1 overflow-y-auto p-6">
        <!-- Welcome Section -->
        <div class="container overflow-auto">
          <!-- Content Area -->
        <div class="flex-1 bg-white text-gray-900">
          <div onclick="window.location.href='{{ route('admin.Awelcome') }}'" class="cursor-pointer hover:opacity-90 transition">
            @include('sections.hero')
         </div>
          <div onclick="window.location.href='{{ route('admin.Askills') }}'" class="cursor-pointer hover:opacity-90 transition">
            @include('sections.skills')
         </div>
          <div onclick="window.location.href='{{ route('admin.EC') }}'" class="cursor-pointer hover:opacity-90 transition">
            @include('sections.edu_cert')
         </div>
          <div onclick="window.location.href='{{ route('admin.Aivet') }}'" class="cursor-pointer hover:opacity-90 transition">
            @include('sections.ivet')
         </div>
          <div onclick="window.location.href='{{ route('admin.Awelcome') }}'" class="cursor-pointer hover:opacity-90 transition">
            @include('components.footer')
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
  

</body>
</html>