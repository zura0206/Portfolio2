
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Anton&family=Poppins:wght@300;400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            background-color: #f9fafb;
        }
        
        .py-16 {
            padding-top: 4rem;
            padding-bottom: 4rem;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        .carousel-container {
            max-width: 1080px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        /* Projects Section Styling */
        #projects {
            background-color: #f9fafb;
            position: relative;
        }
        
        #projects h2 {
            /* font-family: 'Anton', sans-serif; */
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 2.5rem;
            color: #1f2937;
            position: relative;
            display: inline-block;
            left: 50%;
            transform: translateX(-50%);
        }
        
        #projects h2:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #ff6b6b, #f06595);
            border-radius: 2px;
        }
        
        /* Carousel Styling */
        .swiper {
            width: 100%;
            height: auto;
            margin-bottom: 30px;
            overflow: hidden;
        }
        
        .swiper-slide {
            height: auto;
            transition: transform 0.3s ease, opacity 0.3s ease;
            opacity: 0.5;
            transform: scale(0.9);
        }
        
        .swiper-slide-active,
        .swiper-slide-prev,
        .swiper-slide-next {
            opacity: 1;
            transform: scale(1);
        }
        
        .swiper-wrapper {
            display: flex;
            align-items: stretch;
        }
        
        .project-card {
            height: 100%;
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }
        
        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
        }
        
        .project-image-container {
            position: relative;
            height: 200px;
            overflow: hidden;
        }
        
        .project-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .project-card:hover .project-image {
            transform: scale(1.05);
        }
        
        .project-content {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        
        .project-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.75rem;
        }
        
        .project-description {
            color: #6b7280;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.5;
            flex-grow: 1;
        }
        
        .tech-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.25rem;
        }
        
        .tech-tag {
            font-size: 0.75rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            background-color: #fee2e2;
            color: #b91c1c;
            font-weight: 500;
            display: inline-block;
            transition: all 0.2s ease;
        }
        
        .project-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }
        
        .github-link {
            color: #6b7280;
            font-size: 1.25rem;
            transition: color 0.2s ease;
            text-decoration: none;
        }
        
        .github-link:hover {
            color: #1f2937;
        }
        
        .live-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #ef4444;
            font-weight: 500;
            transition: color 0.2s ease;
            text-decoration: none;
        }
        
        .live-link:hover {
            color: #dc2626;
        }
        
        /* Custom navigation and pagination styling */
        .swiper-pagination {
            bottom: -30px !important;
        }
        
        .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background-color: #d1d5db;
            opacity: 1;
        }
        
        .swiper-pagination-bullet-active {
            background-color: #ef4444 !important;
            transform: scale(1.2);
        }
        
        .swiper-button-next,
        .swiper-button-prev {
            color: #ef4444 !important;
            background-color: rgba(255, 255, 255, 0.8);
            width: 40px !important;
            height: 40px !important;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 1.25rem !important;
        }
        
        .view-link {
            display: inline-block;
            color: #ef4444;
            font-size: 0.875rem;
            font-weight: 500;
            margin-top: 1rem;
            text-decoration: none;
            transition: color 0.2s ease;
        }
        
        .view-link:hover {
            color: #dc2626;
            text-decoration: underline;
        }
        
        /* Hide navigation/pagination for single slide */
        .single-slide .swiper-pagination,
        .single-slide .swiper-button-next,
        .single-slide .swiper-button-prev {
            display: none !important;
        }
        
        /* Media Queries */
        @media (max-width: 768px) {
            .swiper-button-next,
            .swiper-button-prev {
                display: none !important;
            }
            
            .swiper-slide {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
<section id="projects" class="py-16">
    <div class="container">
        <h2>My Projects</h2>
        <div class="carousel-container">
            <div class="swiper projectSwiper {{ count($projects) === 1 ? 'single-slide' : '' }}" data-project-count="{{ count($projects) }}">
                <div class="swiper-wrapper">
                    @foreach($projects as $project)
                    <div class="swiper-slide">
                        <div class="project-card">
                            <div class="project-image-container">
                                <img src="{{ $project->image_url ?? '/placeholder.jpg' }}" alt="{{ $project->title }}" class="project-image">
                            </div>
                            <div class="project-content">
                                <h3 class="project-title">{{ $project->title }}</h3>
                                <p class="project-description">{{ $project->description }}</p>
                                <div class="tech-tags">
                                    @foreach(json_decode($project->technologies) as $tech)
                                    <span class="tech-tag">{{ $tech }}</span>
                                    @endforeach
                                </div>
                                <div class="project-links">
                                    @if($project->github_url)
                                    <a href="{{ $project->github_url }}" class="github-link" target="_blank">
                                        <i class="fab fa-github"></i>
                                    </a>
                                    @endif
                                    @if($project->live_url)
                                    <a href="{{ $project->live_url }}" class="live-link" target="_blank">
                                        <i class="fas fa-external-link-alt"></i> View Live
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Add pagination and navigation -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get the number of projects from the data attribute
    const swiperEl = document.querySelector('.projectSwiper');
    const projectCount = parseInt(swiperEl.dataset.projectCount, 10);

    // Determine slidesPerView and loop based on project count
    let slidesPerView = Math.min(projectCount, 3);
    let loop = projectCount > 1;

    // Swiper configuration
    const projectSwiper = new Swiper(".projectSwiper", {
        direction: "horizontal",
        slidesPerView: slidesPerView,
        spaceBetween: 30,
        grabCursor: true,
        loop: loop,
        centeredSlides: true,
        speed: 300,
        autoplay: projectCount > 1 ? {
            delay: 2000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        } : false,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            320: {
                slidesPerView: Math.min(projectCount, 1),
                spaceBetween: 20,
                centeredSlides: true
            },
            640: {
                slidesPerView: Math.min(projectCount, 2),
                spaceBetween: 20,
                centeredSlides: true
            },
            1024: {
                slidesPerView: Math.min(projectCount, 3),
                spaceBetween: 30,
                centeredSlides: true
            }
        },
        a11y: {
            prevSlideMessage: 'Previous project',
            nextSlideMessage: 'Next project',
            firstSlideMessage: 'This is the first project',
            lastSlideMessage: 'This is the last project'
        }
    });

    // Handle visibility change for autoplay
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            projectSwiper.autoplay.stop();
        } else if (projectCount > 1) {
            projectSwiper.autoplay.start();
        }
    });
});
</script>
</body>
</html>