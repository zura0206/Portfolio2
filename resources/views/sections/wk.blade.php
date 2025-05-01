
<!-- Experience Section -->
<section id="experience" class="py-16 bg-gray-50">
    <div class="container max-w-5xl mx-auto px-4">
      <div class="text-center mb-16">
        <span class="text-sm font-medium text-red-500 uppercase tracking-wider">My Professional Journey</span>
        <h2 class="text-4xl font-bold mt-2 text-gray-800">Work Experience</h2>
        <div class="w-16 h-1 bg-red-500 mx-auto mt-4"></div>
      </div>
      
      <div class="max-w-3xl mx-auto">
        <!-- Timeline Item 1 -->
        @foreach ($experiences as $experience)
          
        <div class="timeline-item flex mb-12">
          <div class="timeline-marker mr-8 flex flex-col items-center">
            <div class="w-4 h-4 rounded-full bg-red-500"></div>
            <div class="w-0.5 bg-red-300 flex-grow mt-2"></div>
          </div>
          <div class="timeline-content bg-white rounded-lg shadow-md p-8 flex-grow transition-shadow duration-300">
            <div class="flex flex-wrap items-center justify-between mb-4">
              <h3 class="text-xl font-bold text-gray-800">{{$experience->job_title}}</h3>
              <span class="text-sm font-medium bg-red-100 text-red-500 py-1 px-3 rounded-full">2023 - Present</span>
            </div>
            <h4 class="text-md font-medium text-gray-600 mb-4">{{$experience->company}}</h4>
            <p class="text-gray-600 mb-4">{{$experience->description}}</p>
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
  </section>