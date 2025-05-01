<style>
    #qualifications,
    #footer {
        border-radius: 50px 50px 0 0;
    }

    .qualification-item {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease, box-shadow 0.3s ease;
    }

    .qualification-item.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .qualification-item:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        border: 1px solid transparent;
        border-image: linear-gradient(to right, #dc2626, #9ca3af) 1;
    }

    .icon-hover:hover {
        transform: scale(1.2);
        transition: transform 0.3s ease;
    }

    #footer {
        background-color: #1a1a1a;
        color: #ffffff;
    }

    .footer-item {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .footer-item.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .social-link:hover {
        color: #dc2626;
        transition: color 0.3s ease;
    }

    .back-to-top:hover {
        background-color: #dc2626;
        transition: background-color 0.3s ease;
    }

    @media (max-width: 640px) {

        .qualification-item,
        .footer-item {
            padding: 1.25rem;
        }

        .footer-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Education Section with Enhanced Vertical Timeline -->
<section id="education" class="py-16 bg-white m-5">
    <div class="container max-w-5xl mx-auto px-4">
        <div class="text-center mb-16">
            <span class="text-sm font-medium text-red-600 uppercase tracking-widest">My Academic Background</span>
            <h2 class="text-5xl font-bold mt-3 text-gray-900">Education & Qualifications</h2>
            <div class="w-20 h-1 bg-red-600 mx-auto mt-5"></div>
            <p class="text-gray-600 mt-6 max-w-2xl mx-auto">A chronological journey through my educational experiences,
                professional certifications, and academic achievements that have shaped my expertise.</p>
        </div>



        <div class="relative">
            <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-red-600"></div>

            <div class="flex flex-col space-y-16">
                @foreach ($educations as $index => $education)
                    <div class="relative">
                        <!-- Timeline Node -->
                        <div class="absolute left-1/2 transform -translate-x-1/2 -mt-3">
                            <div
                                class="w-12 h-12 rounded-full bg-red-600 border-4 border-white shadow flex items-center justify-center">
                                <!-- Icon here -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                </svg>
                            </div>
                        </div>

                        @if ($index % 2 == 0)
                            <!-- Even index = Right Side -->
                            <div class="ml-auto w-5/12 pr-8">
                                <div
                                    class="bg-gray-50 rounded-xl p-7 shadow-md transform transition-all hover:scale-105 border-l-4 border-red-600">
                                    <div class="flex items-center justify-between mb-3">
                                        <h4 class="text-xl font-bold text-gray-900">{{ $education->course }}</h4>
                                        <span
                                            class="text-sm font-medium bg-red-100 text-red-700 py-1 px-3 rounded-full">{{ $education->duration }}</span>
                                    </div>
                                    <p class="text-gray-600 mb-2 font-medium">{{ $education->school_name }}</p>
                                    <p class="text-gray-600 text-sm mb-4">{{ $education->description }}</p>
                                </div>
                            </div>
                        @else
                            <!-- Odd index = Left Side -->
                            <div class="mr-auto w-5/12 pl-8">
                                <div
                                    class="bg-gray-50 rounded-xl p-7 shadow-md transform transition-all hover:scale-105 border-r-4 border-red-600">
                                    <div class="flex items-center justify-between mb-3">
                                        <h4 class="text-xl font-bold text-gray-900">{{ $education->course }}</h4>
                                        <span
                                            class="text-sm font-medium bg-red-100 text-red-700 py-1 px-3 rounded-full">{{ $education->duration }}</span>
                                    </div>
                                    <p class="text-gray-600 mb-2 font-medium">{{ $education->school_name }}</p>
                                    <p class="text-gray-600 text-sm mb-4">{{ $education->description }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach

                <!-- Tree Root Design -->
                <div class="relative flex justify-center mt-4">
                    <div
                        class="w-16 h-16 rounded-full bg-red-600 border-4 border-white shadow flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Certifications Section - Dynamic Version --}}
        <div class="mt-24 relative">
            <h3 class="text-3xl font-bold text-center text-gray-900 mb-12">Professional Certifications</h3>

            <!-- Main Vertical Trunk -->
            <div class="absolute left-1/2 transform -translate-x-1/2 w-1 bg-red-600 h-full top-10"></div>

            <!-- Center Node -->
            <div class="relative flex justify-center">
                <div
                    class="w-12 h-12 rounded-full bg-red-600 border-4 border-white shadow flex items-center justify-center z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
            </div>

            <!-- Certifications Container -->
            <div class="relative pt-16">
                @php
                    // Split certifications into groups for each level
                    $levels = [
                        'top' => $certifications->take(3),
                        'middle' => $certifications->slice(3, 2),
                        'bottom' => $certifications->slice(5),
                    ];
                @endphp

                <!-- Top Level (3 certifications) -->
                @if ($levels['top']->isNotEmpty())
                    <div class="relative mb-8">
                        <!-- Horizontal Branch -->
                        <div class="absolute top-0 left-0 right-0 h-1 bg-red-600"></div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-12">
                            @foreach ($levels['top'] as $index => $certification)
                                <div class="relative">
                                    <!-- Vertical Connector -->
                                    <div
                                        class="absolute -top-10 left-1/2 transform -translate-x-1/2 h-10 w-1 bg-red-600">
                                    </div>
                                    <!-- Node -->
                                    <div
                                        class="absolute -top-4 left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-red-600 border-2 border-white shadow">
                                    </div>
                                    <!-- Certification Card -->
                                    <div
                                        class="bg-gray-50 rounded-xl p-6 shadow-md hover:shadow-lg transition-all border-t-4 border-red-600 h-full">
                                        <div class="text-center pt-2">
                                            <h4 class="text-lg font-bold text-gray-900 mb-2">
                                                {{ $certification->cert_title }}</h4>
                                            <p class="text-sm text-gray-600 mb-3">{{ $certification->cert_issuer }}</p>
                                            <div class="flex justify-center mb-4">
                                                <span
                                                    class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">{{ $certification->cert_year }}</span>
                                            </div>
                                            <p class="text-xs text-gray-500">{{ $certification->cert_description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Middle Level (2 certifications) -->
                @if ($levels['middle']->isNotEmpty())
                    <div class="relative mb-8">
                        <!-- Vertical Connector from top level -->
                        <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 h-8 w-1 bg-red-600"></div>
                        <!-- Horizontal Branch -->
                        <div class="absolute top-0 left-1/4 right-1/4 h-1 bg-red-600"></div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-12 mx-auto max-w-3xl">
                            @foreach ($levels['middle'] as $index => $certification)
                                <div class="relative">
                                    <!-- Vertical Connector -->
                                    <div
                                        class="absolute -top-10 left-1/2 transform -translate-x-1/2 h-10 w-1 bg-red-600">
                                    </div>
                                    <!-- Node -->
                                    <div
                                        class="absolute -top-4 left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-red-600 border-2 border-white shadow">
                                    </div>
                                    <!-- Certification Card -->
                                    <div
                                        class="bg-gray-50 rounded-xl p-6 shadow-md hover:shadow-lg transition-all border-t-4 border-red-600 h-full">
                                        <div class="text-center pt-2">
                                            <h4 class="text-lg font-bold text-gray-900 mb-2">
                                                {{ $certification->cert_title }}</h4>
                                            <p class="text-sm text-gray-600 mb-3">{{ $certification->cert_issuer }}</p>
                                            <div class="flex justify-center mb-4">
                                                <span
                                                    class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">{{ $certification->cert_year }}</span>
                                            </div>
                                            <p class="text-xs text-gray-500">{{ $certification->cert_description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <!-- Bottom Level (remaining certifications) -->
                @if ($levels['bottom']->isNotEmpty())
                    <div class="relative">
                        <!-- Vertical Connector from middle level -->
                        <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 h-8 w-1 bg-red-600"></div>
                        <!-- Horizontal Branch -->
                        <div class="absolute top-0 left-1/3 right-1/3 h-1 bg-red-600"></div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 pt-12">
                            @foreach ($levels['bottom'] as $index => $certification)
                                <div class="relative">
                                    <!-- Vertical Connector -->
                                    <div
                                        class="absolute -top-8 left-1/2 transform -translate-x-1/2 h-10 w-1 bg-red-600">
                                    </div>
                                    <!-- Node -->
                                    <div
                                        class="absolute -top-4 left-1/2 transform -translate-x-1/2 w-8 h-8 rounded-full bg-red-600 border-2 border-white shadow">
                                    </div>
                                    <!-- Certification Card -->
                                    <div
                                        class="bg-gray-50 rounded-xl p-6 shadow-md hover:shadow-lg transition-all border-t-4 border-red-600 h-full">
                                        <div class="text-center pt-2">
                                            <h4 class="text-lg font-bold text-gray-900 mb-2">
                                                {{ $certification->cert_title }}</h4>
                                            <p class="text-sm text-gray-600 mb-3">{{ $certification->cert_issuer }}
                                            </p>
                                            <div class="flex justify-center mb-4">
                                                <span
                                                    class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">{{ $certification->cert_year }}</span>
                                            </div>
                                            <p class="text-xs text-gray-500">{{ $certification->cert_description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    </div>
</section>





<script>
    document.addEventListener('DOMContentLoaded', () => {
        const items = document.querySelectorAll('.qualification-item, .footer-item');
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
            }, {
                threshold: 0.1
            }
        );
        items.forEach((item) => observer.observe(item));
    });
</script>


<!-- Skills Section -->
{{-- <div class="mt-24 text-center">
      <h3 class="text-2xl font-bold text-gray-900 mb-8">Technical Proficiencies</h3>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-gray-50 rounded-lg p-4 shadow-sm hover:bg-red-50 transition-colors">
          <div class="w-12 h-12 mx-auto bg-red-100 rounded-full flex items-center justify-center mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
            </svg>
          </div>
          <h4 class="font-medium text-gray-900">Frontend Development</h4>
          <p class="text-xs text-gray-600 mt-1">HTML, CSS, JavaScript, React</p>
        </div>
        
        <div class="bg-gray-50 rounded-lg p-4 shadow-sm hover:bg-red-50 transition-colors">
          <div class="w-12 h-12 mx-auto bg-red-100 rounded-full flex items-center justify-center mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4" />
            </svg>
          </div>
          <h4 class="font-medium text-gray-900">Backend Development</h4>
          <p class="text-xs text-gray-600 mt-1">Node.js, Express, MongoDB</p>
        </div>
        
        <div class="bg-gray-50 rounded-lg p-4 shadow-sm hover:bg-red-50 transition-colors">
          <div class="w-12 h-12 mx-auto bg-red-100 rounded-full flex items-center justify-center mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
            </svg>
          </div>
          <h4 class="font-medium text-gray-900">UI/UX Design</h4>
          <p class="text-xs text-gray-600 mt-1">Figma, Adobe XD, Sketch</p>
        </div>
        
        <div class="bg-gray-50 rounded-lg p-4 shadow-sm hover:bg-red-50 transition-colors">
          <div class="w-12 h-12 mx-auto bg-red-100 rounded-full flex items-center justify-center mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
          </div>
          <h4 class="font-medium text-gray-900">Data Analytics</h4>
          <p class="text-xs text-gray-600 mt-1">SQL, Python, Data Visualization</p>
        </div>
      </div>
    </div> --}}
