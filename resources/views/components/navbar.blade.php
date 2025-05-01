<style>
    .navbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      padding: 1rem 2rem;
      z-index: 100;
      transition: all 0.3s ease;
    }
    
    .navbar.scrolled {
      /* background-color: rgba(0, 0, 0, 0.9); */
      background-color: black;
      padding: 0.7rem 2rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
</style>

  <div class="min-h-screen flex flex-col">
    <nav class="navbar">
        <div class="container mx-auto">
          <div class="bg-black rounded-full px-6 py-3 flex items-center justify-between">
            {{-- <div class="text-red-500 font-bold text-lg">Home</div> --}}
            
            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center justify-center space-x-40 w-full">
              <!-- Left Menu Items -->
              <div class="flex space-x-20">
                <a href="#hero" class="text-white menu-item">Home</a>
                <a href="#skills" class="text-white menu-item">Skills</a>
                <a href="#experience" class="text-white menu-item">Experience</a>
              </div>
              <!-- Centered MB -->
              <div class="flex items-center ">
<a href="{{ route('login') }}">
                <div class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center text-white font-bold text-sm">
                  MB
                  
                </div></a> 
                
                <div class="text-white font-bold ml-2">Maldrey</div>
                
              </div>

              
              <!-- Right Menu Items -->
              <div class="flex space-x-20">
                <a href="#industry-visits" class="text-white menu-item">IVET</a>
                <a href="#qualifications" class="text-white menu-item">Qualification</a>
                <a href="#footer" class="text-white menu-item">Contact</a>
              </div>
            </div>
            
            <!-- Mobile Menu Button -->
            <div class="lg:hidden">
              <button id="menu-toggle" class="text-white focus:outline-none">
                <div class="menu-toggle-icon">
                  <span class="hamburger"></span>
                  <span class="hamburger"></span>
                  <span class="hamburger"></span>
                </div>
              </button>
            </div>
          </div>
        </div>
      </nav>  