
<style>
    #industry-visits {
        border-radius: 50px 50px 0 0;
    }
    .visit-item, .summary-item {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease, box-shadow 0.3s ease;
    }
    .visit-item.visible, .summary-item.visible {
        opacity: 1;
        transform: translateY(0);
    }
    .visit-item:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        border: 1px solid transparent;
        border-image: linear-gradient(to right, #dc2626, #9ca3af) 1;
    }
    .visit-item img:hover {
        transform: scale(1.05);
        filter: blur(1px);
    }
    .icon-hover:hover {
        transform: scale(1.2);
        transition: transform 0.3s ease;
    }
    @media (max-width: 640px) {
        .visit-item, .summary-item {
            padding: 1.25rem;
        }
    }
</style>

<section id="industry-visits" class="py-16 bg-gray-50">
    <div class="container max-w-5xl mx-auto px-4">
        <div class="text-center mb-16">
            <span class="text-sm font-medium text-red-600 uppercase tracking-widest">Learning from the Industry</span>
            <h2 class="text-5xl font-bold mt-3 text-gray-900">Industry Visit Experiences</h2>
            <div class="w-20 h-1 bg-red-600 mx-auto mt-5"></div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            @foreach($visits as $visit)
                <div class="visit-item bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="h-64 overflow-hidden">
                        <img src="{{ $visit->image_url ?? '/api/placeholder/800/500' }}" alt="{{ $visit->title }}" class="w-full h-full object-cover transition-transform duration-500">
                    </div>
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-2xl font-bold text-gray-900">{{ $visit->title }}</h3>
                            <span class="text-sm font-medium bg-gray-200 text-gray-700 py-1 px-3 rounded-full">{{ $visit->date }}</span>
                        </div>
                        <p class="text-gray-600 mb-6 text-base">{{ $visit->description }}</p>
                        
                        <h4 class="text-lg font-semibold mb-3 text-gray-900">Key Takeaways:</h4>
                        <ul class="list-disc list-inside text-gray-600 space-y-2 mb-6 text-sm">
                            @foreach($visit->key_takeaways as $takeaway)
                                <li>{{ $takeaway }}</li>
                            @endforeach
                        </ul>
                        
                        <h4 class="text-lg font-semibold mb-3 text-gray-900">Personal Reflection:</h4>
                        <p class="text-gray-600 italic text-sm">
                            "{{ $visit->reflection }}"
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        
        @if($summary)
        <div class="summary-item mt-16 bg-white rounded-xl shadow-md p-8">
            <h3 class="text-3xl font-bold mb-6 text-gray-900">Overall Learning Impact</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h4 class="text-lg font-semibold mb-3 flex items-center text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-red-600 icon-hover" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Professional Skills Development
                    </h4>
                    <p class="text-gray-600 mb-6 text-sm">
                        {{ $summary->professional_skills }}
                    </p>
                    
                    <h4 class="text-lg font-semibold mb-3 flex items-center text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-red-600 icon-hover" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Networking Opportunities
                    </h4>
                    <p class="text-gray-600 text-sm">
                        {{ $summary->networking }}
                    </p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-3 flex items-center text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-red-600 icon-hover" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                        Industry Trend Awareness
                    </h4>
                    <p class="text-gray-600 mb-6 text-sm">
                        {{ $summary->trend_awareness }}
                    </p>
                    
                    <h4 class="text-lg font-semibold mb-3 flex items-center text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-red-600 icon-hover" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        Personal Growth
                    </h4>
                    <p class="text-gray-600 text-sm">
                        {{ $summary->personal_growth }}
                    </p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

  
  
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const items = document.querySelectorAll('.visit-item, .summary-item, .footer-item');
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
    });
  </script>