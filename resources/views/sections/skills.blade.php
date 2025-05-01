<style>
  /* Skills Section */
  #skills {
    background-color: #1a1a1a;
    text-align: center;
    padding: 60px 20px;
    width: 100%;
    position: relative;
    z-index: 3;
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
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.15); }
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
      font-size: 1.125rem; /* text-lg */
    }
    .skill-card p {
      font-size: 0.875rem; /* text-sm */
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
      font-size: 1.125rem; /* text-lg */
    }
    .timeline-content p,
    .timeline-content li {
      font-size: 0.875rem; /* text-sm */
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

<section id="skills">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <span class="text-sm font-medium text-red-500 uppercase tracking-wider">What I'm good at</span>
      <h2 class="b-text-4xl font-bold mt-2">My Skills</h2>
      <div class="w-16 h-1 bg-red-500 mx-auto mt-4"></div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($skills as $skill)
      <div class="skill-card bg-gray-50 rounded-lg p-8 hover:shadow-lg transition-shadow duration-300">
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



<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Animate timeline items (Experience Section)
    const timelineItems = document.querySelectorAll('.timeline-item');
    const skillCards = document.querySelectorAll('.skill-card');
    
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

    // Observe timeline items
    timelineItems.forEach((item) => observer.observe(item));
    // Observe skill cards
    skillCards.forEach((card) => observer.observe(card));
  });
</script>
