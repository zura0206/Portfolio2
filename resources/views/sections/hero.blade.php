
<style>
    @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700&display=swap');
    
    body {
        font-family: "poppins", sans-serif!important;
    font-weight: 100;
    font-style: normal;
      background-color: #f8f8f8;
      overflow-x: hidden;
      margin: 0;
      padding: 0;
      color: #333;
    }
    
    .profile-image:hover {
      transform: scale(1.02);
    }
    
    .curved-arrow {
      position: absolute;
      bottom: 60px;
      left: 180px!important;
      z-index: 3;
      opacity: 0.7;
      transition: all 0.3s ease;
    }
    
    .curved-arrow:hover {
      opacity: 1;
      transform: scale(1.1);
    }
    
    .btn {
      border: none;
      outline: none;
      font-family: "Anton", sans-serif;
        font-weight: 200;
        font-style: normal;
      padding: 12px 24px;
      border-radius: 30px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      font-size: 15px;
    }
    
    .btn-portfolio {
      background-color: #ff4b25;
      color: white;
      position: relative;
      z-index: 3;
    }
    
    .btn-portfolio:hover {
      background-color: #e53e20;
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(255, 75, 37, 0.3);
    }
    
    .btn-hire {
      background-color: white;
      color: #333;
      position: relative;
      z-index: 3;
    }
    
    .btn-hire:hover {
      background-color: #f5f5f5;
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }
    
    .main-wrapper {
      max-width: 1200px;
      position: relative;
      min-height: 80vh;
      display: flex;
      align-items: center;
    }
    
    .mobile-menu {
      position: fixed;
      top: 0;
      right: 0;
      width: 100%;
      height: 100vh;
      background: rgba(0, 0, 0, 0.95);
      z-index: 50;
      transform: translateX(100%);
      transition: transform 0.4s cubic-bezier(0.77, 0, 0.175, 1);
      display: flex;
      flex-direction: column;
    }
    
    .mobile-menu.active {
      transform: translateX(0);
    }
    
    .menu-item {
      position: relative;
      transition: all 0.3s ease;
      padding: 2px 0;
      text-decoration: none;
    }
    
    .menu-item::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 2px;
      background-color: #ff4b25;
      transition: width 0.3s ease;
    }
    
    .menu-item:hover {
      color: #ff4b25;
    }
    
    .menu-item:hover::after {
      width: 100%;
    }
    
    
    
    .name-highlight {
      color: #ff4b25;
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
      background-color: rgba(255, 75, 37, 0.2);
      z-index: -1;
    }
    
    .testimonial-block {
      position: relative;
      padding-left: 20px;
      border-left: 3px solid #ff4b25;
      transition: all 0.3s ease;
    }
    
    .testimonial-block:hover {
      transform: translateY(-5px);
    }
    
    .stats-number {
      font-size: 40px;
      font-weight: 700;
      color: #333;
      margin: 0;
      line-height: 1;
    }
    
    .stats-label {
      font-size: 14px;
      color: #666;
      margin: 0;
    }
    
    .rating-stars {
      color: #ff4b25;
      font-size: 24px;
      letter-spacing: 2px;
    }
    
    .experience-tag {
      position: relative;
      display: inline-block;
    }
    
    .experience-tag::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 100%;
      height: 1px;
      background-color: #ddd;
    }
    
    .content-left, .content-center, .content-right {
      transition: all 0.5s ease;
    }
    
    /* Menu Toggle Icon */
    .menu-toggle-icon {
      width: 24px;
      height: 24px;
      position: relative;
      cursor: pointer;
    }
    
    .menu-toggle-icon .hamburger {
      position: absolute;
      width: 100%;
      height: 2px;
      background-color: white;
      transition: all 0.3s ease;
    }
    
    .menu-toggle-icon .hamburger:nth-child(1) {
      top: 6px;
    }
    
    .menu-toggle-icon .hamburger:nth-child(2) {
      top: 12px;
    }
    
    .menu-toggle-icon .hamburger:nth-child(3) {
      top: 18px;
    }
    
    .menu-toggle-icon.active .hamburger:nth-child(1) {
      transform: rotate(45deg);
      top: 12px;
    }
    
    .menu-toggle-icon.active .hamburger:nth-child(2) {
      opacity: 0;
    }
    
    .menu-toggle-icon.active .hamburger:nth-child(3) {
      transform: rotate(-45deg);
      top: 12px;
    }
    
    @media (max-width: 1024px) {
      .circle-bg {
        width: 350px;
        height: 350px;
      }
      
      .profile-image {
        max-height: 320px;
      }
      
      .stats-number {
        font-size: 32px;
      }
    }
    
    @media (max-width: 768px) {
      .circle-bg {
        width: 300px;
        height: 300px;
      }
      
      .profile-image {
        max-height: 280px;
      }
      
      .main-wrapper {
        padding-top: 5rem;
        min-height: auto;
      }
      
      .container {
        padding: 0 1rem;
      }
      
      .stats-number {
        font-size: 28px;
      }
      
      .hello-bubble {
        font-size: 12px;
        padding: 6px 12px;
      }
    }
  </style>
  <style>

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1rem;
    }

    .main-wrapper {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      position: relative;
      padding-top: 2rem;
    }

    /* Header Section */
    .header-section {
      text-align: center;
      margin-bottom: 2rem;
      z-index: 2;
    }
    .hello{
        margin: auto;
        margin-top: 4rem;
    }
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
      line-height: 1; /* Ensure proper line height */
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
      background-color: #ff5e62;
      border-radius: 50%;
      right: -25px;
      top: 50%;
      transform: translateY(-50%);
    }

    h1 {
      font-size: 3.75rem;
      font-weight: 700;
      line-height: 1.2;
    }

    h1 .name-highlight {
      color: #ff5e62;
    }

    h2 {
      font-size: 3rem;
      font-weight: 600;
    }

    /* Main Content Layout */
    .content-wrapper {
      position: relative;
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      max-width: 1000px;
      z-index: 2;
    }

    /* Left Content */
    .content-left {
      text-align: left;
      max-width: 300px;
    }

    .testimonial-block {
      position: relative;
      max-width: 300px;
      margin-bottom: 2rem;
    }

    .testimonial-block p {
      font-size: 14px;
      line-height: 1.5;
      color: #666;
    }

    .stats-number {
      font-size: 2rem;
      font-weight: 700;
    }

    .stats-label {
      font-size: 1rem;
      color: #666;
    }

    /* Right Content */
    .content-right {
      text-align: right;
      max-width: 300px;
    }

    .rating-stars {
      font-size: 24px;
      color: #ff5e62;
    }

    .experience-tag {
      font-size: 16px;
      color: #666;
      border-bottom: 2px solid #000;
    }

    /* Image and Circle Section */
    .image-section {
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      justify-content: center;
      align-items: flex-end;
      width: 100%;
      z-index: 2;
    }

    .circle-bg {
      position: absolute;
      width: 480px;
      height: 520px;
      background-color: #ff5e62;
      border-radius: 50%;
      bottom: -300px;
      z-index: -1;
    }

    .profile-image {
      width: 360px;
      height: auto;
      object-fit: cover;
      z-index: 2;
    }

    .btn-wrapper {
      position: absolute;
      bottom: 20px;
      display: flex;
      gap: 1rem;
      z-index: 2;
    }

    .btn {
      padding: 12px 24px;
      border-radius: 25px;
      font-size: 16px;
      font-weight: 600;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .btn-portfolio {
        
      background-color: #fff;
      color: #000;
      border: 2px solid #000;
    }

    .btn-portfolio:hover {
      background-color: #f0f0f0;
    }

    .btn-hire {
      background-color: #ff5e62;
      color: #fff;
      border: none;
    }

    .btn-hire:hover {
      background-color: #e05257;
    }

    .curved-arrow {
      position: absolute;
      bottom: 50px;
      left: 32%!important;
    }

    

    @media (max-width: 1024px) {
      .content-wrapper {
        flex-direction: column;
        align-items: center;
        text-align: center;
      }

      .content-left, .content-right {
        text-align: center;
        max-width: 100%;
      }

      .content-right {
        margin-top: 1rem;
      }

      .circle-bg {
        width: 380px;
        height: auto;
        bottom: -250px;
      }

      .profile-image {
        width: 400px;
      }

      .curved-arrow {
        left: -20px;
      }
    }

    @media (max-width: 768px) {
      h1 {
        font-size: 2.5rem;
      }

      h2 {
        font-size: 2rem;
      }

      .circle-bg {
        width: 400px;
        height: 380px;
        bottom: -200px;
      }

      .profile-image {
        width: 300px;
      }

      .curved-arrow {
        bottom: 70px;
        width: 10%!important;
        height: 10%!important;
        left: 5%!important;
      }
      svg{
        width: 150%!important;
      }
   
    }
  </style>
<section id="hero">

    <div id="mobile-menu" class="mobile-menu">
      <div class="flex flex-col items-center justify-center flex-1 space-y-8">
        <a href="#qualification" class="text-white text-lg menu-item">Home</a>
        <a href="#skills" class="text-white text-lg menu-item">Skills</a>
        <a href="#experience" class="text-white text-lg menu-item">Experience</a>
        <div class="h-12 w-12 rounded-full bg-red-500 flex items-center justify-center text-white font-bold text-lg my-2">MB</div>
        <a href="#industry-visits" class="text-white text-lg menu-item">IVET</a>
        <a href="#qualifications" class="text-white text-lg menu-item">Qualification</a>
        <a href="#contact" class="text-white text-lg menu-item">Contact</a>
      </div>
    </div>
   
</head>
<body>
  
  
  <div class="min-h-screen flex flex-col">
    <div class="container">
      <div class="main-wrapper mx-auto">
        <!-- Header Section -->
        <div class="header-section">
            <div class="hello relative inline-block mb-6">
                <span class="hello-bubble">Hello!</span>
              </div>
              <h1>I'm <span class="name-highlight">{{ $hero->name ?? 'Marldrey' }},</span></h1>
              <h2>{{ $hero->job_title ?? 'Programmer' }}</h2>
             </div>
        

        <!-- Main Content -->
        <div class="content-wrapper">
          <!-- Left Content -->
          <div class="content-left">
            <div class="testimonial-block">
              <div class="text-5xl text-gray-200 absolute top-0 left-0">"</div>
              <p class="pl-6">
                {{ $hero->testimonial ?? "Marldrey's exceptional Web design ensured our website's success. Highly recommended!" }}
            </p>
         </div>
            <div>
              <p class="stats-number">{{ $hero->clients_served ?? '20+' }}</p>
              <p class="stats-label">Client Served</p>
      </div>
          </div>

          <!-- Right Content -->
          <div class="content-right">
            <div class="rating-stars">★ ★ ★ ★ ★</div>
            <div class="text-3xl font-medium mt-3">{{ $hero->experience_duration ?? '1 Year' }}</div>
            <div class="experience-tag mt-1 pb-2">{{ $hero->expertise_level ?? 'Experts' }}</div>
      </div>
        </div>

        <!-- Image Section -->
        <div class="image-section">
          <div class="circle-bg"></div>
          <img 
          src="{{ $hero && $hero->profile_image && Storage::exists('public/hero_images/' . $hero->profile_image) ? url('storage/hero_images/' . $hero->profile_image) : '#' }}" 
          onerror="this.style.display='none'" 
          alt="{{ $hero->name ?? 'No Name' }}" 
          class="profile-image">
        
    <div class="btn-wrapper">
            
            <a href="#qualifications" class="btn btn-portfolio">
               Interested ? <span class="ml-1">→</span>
            </a>
            <a href="mailto:marldreybernardo910@gmail.com?subject=Hire Me - Website Enquiry" class="btn btn-hire">
              Hire Me
            </a>
          </div>
          <div class="curved-arrow">
            <svg width="85" height="55" viewBox="0 0 60 40" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M5 5 C30 5, 30 35, 55 35" stroke="black" stroke-width="2" fill="none" />
              <path d="M50 30 L55 35 L50 40" stroke="black" stroke-width="2" fill="none" />
            </svg>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <script>
    // Mobile menu functionality
    document.addEventListener('DOMContentLoaded', function() {
      const menuToggle = document.getElementById('menu-toggle');
      const menuToggleIcon = menuToggle.querySelector('.menu-toggle-icon');
      const mobileMenu = document.getElementById('mobile-menu');
      const navbar = document.querySelector('.navbar');
      
      if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', () => {
          mobileMenu.classList.toggle('active');
          menuToggleIcon.classList.toggle('active');
          
          if (mobileMenu.classList.contains('active')) {
            document.body.style.overflow = 'hidden';
          } else {
            document.body.style.overflow = '';
          }
        });
      }
      
      // Close mobile menu when clicking on a menu item
      const menuItems = document.querySelectorAll('#mobile-menu a');
      menuItems.forEach(item => {
        item.addEventListener('click', () => {
          mobileMenu.classList.remove('active');
          menuToggleIcon.classList.remove('active');
          document.body.style.overflow = '';
        });
      });

      // Handle window resize
      window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024 && mobileMenu.classList.contains('active')) {
          mobileMenu.classList.remove('active');
          menuToggleIcon.classList.remove('active');
          document.body.style.overflow = '';
        }
      });
      
      // Navbar scroll effect
      window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
          navbar.classList.add('scrolled');
        } else {
          navbar.classList.remove('scrolled');
        }
      });
      
      // Animation on load
      setTimeout(() => {
        document.querySelector('.content-left').style.opacity = '1';
        document.querySelector('.content-center').style.opacity = '1';
        document.querySelector('.content-right').style.opacity = '1';
      }, 300);
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();
        
        const targetId = this.getAttribute('href');
        if (targetId === '#') return;
        
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
          window.scrollTo({
            top: targetElement.offsetTop - 80,
            behavior: 'smooth'
          });
        }
      });
    });
  </script>
</body>