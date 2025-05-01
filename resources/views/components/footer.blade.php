<style>
    #footer {
      background: linear-gradient(180deg, #1a1a1a 0%, #2d2d2d 100%);
      border-radius: 50px 50px 0 0;
    }
    .footer-item {
      opacity: 0;
      transform: translateY(20px) scale(0.95);
      transition: opacity 0.5s ease, transform 0.5s ease;
    }
    .footer-item.visible {
      opacity: 1;
      transform: translateY(0) scale(1);
    }
    .social-links {
      display: flex;
      justify-content: center;
      gap: 1.5rem;
    }
    .social-link {
      opacity: 0;
      transform: translateY(10px);
      animation: popUp 0.5s ease forwards;
      padding: 0.5rem; /* Ensures touch target size */
      border-radius: 0.5rem;
      position: relative;
    }
    .social-link:nth-child(1) { animation-delay: 0.1s; }
    .social-link:nth-child(2) { animation-delay: 0.2s; }
    .social-link:nth-child(3) { animation-delay: 0.3s; }
    .social-link:hover {
      color: #dc2626;
      transform: scale(1.2) rotate(8deg);
      transition: color 0.3s ease, transform 0.3s ease;
    }
    .social-link:hover::after {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle, rgba(220, 38, 38, 0.2) 0%, transparent 70%);
      transform: translate(-50%, -50%);
      z-index: -1;
    }
    .back-to-top {
      position: fixed;
      bottom: 2rem;
      right: 2rem;
      width: 3rem;
      height: 3rem;
      background-color: #374151;
      color: #ffffff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.3s ease, background-color 0.3s ease, transform 0.3s ease;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
      z-index: 1000;
    }
    .back-to-top.visible {
      opacity: 1;
      visibility: visible;
      animation: bounce 0.5s ease, pulse 2s infinite ease-in-out;
    }
    .back-to-top:hover {
      background-color: #dc2626;
      transform: translateY(-5px);
    }
    .back-to-top:hover .tooltip {
      opacity: 1;
      transform: translateX(-10px);
    }
    .tooltip {
      position: absolute;
      left: -8rem;
      background-color: #374151;
      color: #ffffff;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      font-size: 0.875rem;
      opacity: 0;
      transform: translateX(0);
      transition: opacity 0.3s ease, transform 0.3s ease;
      white-space: nowrap;
    }
    .heading-underline {
      background: linear-gradient(to right, #dc2626, #9ca3af);
      height: 2px;
      width: 6rem;
      margin: 1rem auto;
    }
    @keyframes popUp {
      0% { opacity: 0; transform: translateY(10px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }
    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }
    @media (max-width: 640px) {
      #footer {
        padding: 2rem 1rem;
      }
      .container {
        max-width: 100%;
      }
      .footer-item {
        padding: 1rem;
      }
      .footer-item h2 {
        font-size: 2rem; /* text-3xl */
      }
      .footer-item p {
        font-size: 0.875rem; /* text-sm */
      }
      .social-links {
        flex-direction: column;
        gap: 1rem;
      }
      .social-link svg {
        width: 2rem;
        height: 2rem;
      }
      .social-link {
        padding: 0.75rem; /* Larger touch target */
      }
      .back-to-top {
        width: 2rem;
        height: 2rem;
        bottom: 1rem;
        right: 1rem;
      }
      .back-to-top svg {
        width: 1rem;
        height: 1rem;
      }
      .tooltip {
        left: -7rem;
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
      }
      .heading-underline {
        width: 4rem;
      }
    }
    @media (max-width: 320px) {
      .footer-item h2 {
        font-size: 1.5rem;
      }
      .footer-item p {
        font-size: 0.75rem;
      }
      .social-link svg {
        width: 1.75rem;
        height: 1.75rem;
      }
      .back-to-top {
        width: 1.75rem;
        height: 1.75rem;
      }
      .tooltip {
        left: -6rem;
      }
    }
  </style>
  
  <!-- Footer Section -->
  <section id="footer" class="py-16">
    <div class="container max-w-5xl mx-auto px-4">
      <div class="footer-item text-center">
        <h2 class="text-5xl font-bold text-white mb-4">Let's Connect</h2>
        <div class="heading-underline"></div>
        <p class="text-gray-300 text-xl mb-8 max-w-2xl mx-auto">Interested in collaborating or discussing a project? Reach out, and let's create something extraordinary together!</p>
        
        <!-- Contact Form (Commented Out) -->
        <!--
        <div class="max-w-lg mx-auto bg-gray-800 rounded-xl p-8">
          <div class="grid grid-cols-1 gap-6">
            <input type="text" placeholder="Your Name" class="w-full p-3 rounded-lg bg-gray-900 text-white border border-gray-700 focus:outline-none focus:border-red-600">
            <input type="email" placeholder="Your Email" class="w-full p-3 rounded-lg bg-gray-900 text-white border border-gray-700 focus:outline-none focus:border-red-600">
            <textarea placeholder="Your Message" rows="5" class="w-full p-3 rounded-lg bg-gray-900 text-white border border-gray-700 focus:outline-none focus:border-red-600"></textarea>
            <button class="w-full p-3 bg-red-600 text-white rounded-lg font-medium hover:bg-red-700 transition-colors duration-300">Send Message</button>
          </div>
        </div>
        -->
      
      <!-- Social Media Links -->
      <div class="footer-item flex justify-center mb-5 social-links">
        <a href="#" class="social-link text-gray-300 text-2xl">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />
          </svg>
        </a>
        <a href="#" class="social-link text-gray-300 text-2xl">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
          </svg>
        </a>
        <a href="#" class="social-link text-gray-300 text-2xl">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
        </a>
      </div>
      
      <!-- Copyright -->
      <div class="footer-item text-center">
        <p class="text-gray-400 text-sm">© 2025 MB. All rights reserved.</p>
      </div>
    </div>
  
    <!-- Back to Top Button -->
    <a href="#top" class="back-to-top">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
      </svg>
      <span class="tooltip">Back to Top</span>
    </a>
  </section>
  
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Animate footer items
      const items = document.querySelectorAll('.footer-item');
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
              setTimeout(() => {
                entry.target.classList.add('visible');
              }, index * 150); // Stagger animation by 150ms per item
              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.1 }
      );
      items.forEach((item) => observer.observe(item));
  
      // Back to Top button visibility
      const backToTop = document.querySelector('.back-to-top');
      window.addEventListener('scroll', () => {
        if (window.scrollY > 300) { // Show button after scrolling 300px
          backToTop.classList.add('visible');
        } else {
          backToTop.classList.remove('visible');
        }
      });
  
      // Smooth scroll for back to top
      backToTop.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    });
  </script>