<template>
  <Layout>
    <!-- Hero Slider Section with Animated Text -->
    <section class="relative h-screen overflow-hidden">
      <!-- Slider Items (Images and Videos) -->
      <div class="relative h-full">
        <div
          v-for="(item, index) in sliderItems"
          :key="index"
          class="absolute inset-0 transition-opacity duration-1000"
          :class="{ 'opacity-100': currentSlide === index, 'opacity-0': currentSlide !== index }"
        >
          <!-- Video -->
          <video
            v-if="item.type === 'video'"
            :src="item.src"
            class="w-full h-full object-cover"
            autoplay
            muted
            loop
            playsinline
          ></video>
          <!-- Image -->
          <img
            v-else
            :src="item.src"
            :alt="`Slide ${index + 1}`"
            class="w-full h-full object-cover"
          />
          <div class="absolute inset-0 bg-gradient-to-br from-primary-900/80 via-primary-800/70 to-secondary-900/80"></div>
        </div>
      </div>

      <!-- Animated Hero Content -->
      <div class="absolute inset-0 flex items-center justify-center">
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8 text-center">
          <div class="hero-title mb-6">
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight text-white">
              <span class="block opacity-0">{{ settings?.hero_title || 'Welcome to' }}</span>
              <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-pink-500 to-purple-500 opacity-0 mt-2">
                &lt;OPTIMUS&gt;
              </span>
            </h1>
          </div>
          <p class="hero-description mt-6 max-w-3xl mx-auto text-xl md:text-2xl text-gray-200 opacity-0">
            {{ settings?.hero_description || 'Leading provider of innovative software solutions, web development, mobile applications, and digital transformation services.' }}
          </p>
          <div class="hero-buttons mt-10 flex justify-center space-x-4 opacity-0">
            <Link href="/services" class="bg-gradient-to-r from-yellow-400 to-pink-500 text-white px-8 py-4 rounded-full font-bold text-lg hover:shadow-2xl hover:scale-105 transform transition duration-300">
              Explore Services
            </Link>
            <Link href="/contact" class="border-2 border-white text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-primary-600 transition duration-300">
              Get Started
            </Link>
          </div>
          
          <!-- Floating Code Elements -->
          <div class="floating-elements absolute inset-0 pointer-events-none">
            <div class="code-element absolute top-20 left-10 text-green-400 font-mono text-sm opacity-70">&lt;code/&gt;</div>
            <div class="code-element absolute top-40 right-20 text-blue-400 font-mono text-sm opacity-70">{...}</div>
            <div class="code-element absolute bottom-40 left-20 text-purple-400 font-mono text-sm opacity-70">function()</div>
            <div class="code-element absolute bottom-20 right-10 text-pink-400 font-mono text-sm opacity-70">=&gt;</div>
          </div>
        </div>
      </div>

      <!-- Slider Indicators -->
      <div v-if="sliderItems.length > 1" class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
        <button
          v-for="(item, index) in sliderItems"
          :key="index"
          @click="currentSlide = index"
          class="w-3 h-3 rounded-full transition-all duration-300"
          :class="currentSlide === index ? 'bg-white w-8' : 'bg-white/50'"
        ></button>
      </div>
    </section>

    <!-- Stats Section with Counter Animation -->
    <section class="py-16 bg-gradient-to-r from-primary-600 to-secondary-600 text-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
          <div class="stat-item opacity-0">
            <div class="text-5xl font-bold mb-2" data-count="50">0</div>
            <div class="text-lg">Projects Completed</div>
          </div>
          <div class="stat-item opacity-0">
            <div class="text-5xl font-bold mb-2" data-count="25">0</div>
            <div class="text-lg">Happy Clients</div>
          </div>
          <div class="stat-item opacity-0">
            <div class="text-5xl font-bold mb-2" data-count="15">0</div>
            <div class="text-lg">Team Members</div>
          </div>
          <div class="stat-item opacity-0">
            <div class="text-5xl font-bold mb-2" data-count="5">0</div>
            <div class="text-lg">Years Experience</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Section with Stagger Animation -->
    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 section-title opacity-0">
          <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
            Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-secondary-600">Services</span>
          </h2>
          <p class="text-xl text-gray-600">
            Comprehensive solutions for your digital transformation needs
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="(service, index) in services" :key="service.id" 
               class="service-card bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-8 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 opacity-0 border border-gray-200">
            <div class="text-primary-600 mb-6 transform transition-transform duration-300 hover:scale-110 hover:rotate-6">
              <svg class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ service.title }}</h3>
            <p class="text-gray-600 leading-relaxed">{{ service.description }}</p>
            <div class="mt-6">
              <span class="text-primary-600 font-semibold hover:text-primary-700 cursor-pointer">Learn More →</span>
            </div>
          </div>
        </div>

        <div class="text-center mt-16 cta-button opacity-0">
          <Link href="/services" class="bg-gradient-to-r from-primary-600 to-secondary-600 text-white px-10 py-4 rounded-full font-bold text-lg hover:shadow-2xl hover:scale-105 transform transition duration-300 inline-block">
            View All Services
          </Link>
        </div>
      </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-gray-100">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 section-title opacity-0">
          <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
            Why <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-secondary-600">Choose Us?</span>
          </h2>
          <p class="text-xl text-gray-600">
            We deliver excellence through innovation and dedication
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="feature-card text-center p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 opacity-0">
            <div class="w-20 h-20 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6">
              <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">Fast Delivery</h3>
            <p class="text-gray-600">Quick turnaround time without compromising quality</p>
          </div>

          <div class="feature-card text-center p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 opacity-0">
            <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-6">
              <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">Quality Assured</h3>
            <p class="text-gray-600">Rigorous testing and quality control processes</p>
          </div>

          <div class="feature-card text-center p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 opacity-0">
            <div class="w-20 h-20 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-6">
              <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">24/7 Support</h3>
            <p class="text-gray-600">Round-the-clock customer support and maintenance</p>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
          <div class="about-content opacity-0">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6">
              {{ settings?.about_title || 'About' }} <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-secondary-600">&lt;OPTIMUS&gt;</span>
            </h2>
            <p class="text-lg text-gray-600 mb-6 leading-relaxed">
              {{ settings?.about_description || 'We are a leading software development company specializing in web applications, mobile apps, digital marketing, business solutions, and hardware solutions. Our team of experienced professionals is dedicated to delivering innovative and scalable solutions that drive business growth.' }}
            </p>
            <div class="grid grid-cols-2 gap-6 mb-8">
              <div class="bg-gradient-to-br from-primary-50 to-secondary-50 p-6 rounded-xl text-center transform hover:scale-105 transition-transform duration-300">
                <div class="text-4xl font-bold text-primary-600 mb-2">50+</div>
                <div class="text-gray-700 font-semibold">Projects</div>
              </div>
              <div class="bg-gradient-to-br from-secondary-50 to-primary-50 p-6 rounded-xl text-center transform hover:scale-105 transition-transform duration-300">
                <div class="text-4xl font-bold text-secondary-600 mb-2">25+</div>
                <div class="text-gray-700 font-semibold">Clients</div>
              </div>
            </div>
            <Link href="/about" class="bg-gradient-to-r from-primary-600 to-secondary-600 text-white px-8 py-4 rounded-full font-bold text-lg hover:shadow-2xl hover:scale-105 transform transition duration-300 inline-block">
              Learn More About Us
            </Link>
          </div>
          <div class="about-image relative opacity-0">
            <div class="absolute -inset-4 bg-gradient-to-r from-primary-400 to-secondary-400 rounded-2xl blur-2xl opacity-30"></div>
            <img 
              :src="settings?.about_image ? `/storage/${settings.about_image}` : '/images/about-placeholder.jpg'" 
              alt="About Us" 
              class="relative rounded-2xl shadow-2xl w-full h-96 object-cover transform hover:scale-105 transition-transform duration-500"
            />
          </div>
        </div>
      </div>
    </section>

    <!-- Technologies Section -->
    <section class="py-20 bg-gray-900 text-white overflow-hidden">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 section-title opacity-0">
          <h2 class="text-4xl md:text-5xl font-extrabold mb-4">
            Technologies We <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-pink-500">Master</span>
          </h2>
          <p class="text-xl text-gray-400">
            Cutting-edge tools and frameworks for modern solutions
          </p>
        </div>

        <div class="tech-logos grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
          <div v-for="tech in technologies" :key="tech" 
               class="tech-item bg-gray-800 rounded-xl p-6 flex items-center justify-center hover:bg-gradient-to-br hover:from-primary-600 hover:to-secondary-600 transition-all duration-300 transform hover:scale-110 opacity-0">
            <span class="text-2xl font-bold">{{ tech }}</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Job Circulars Section -->
    <section v-if="jobCirculars.length > 0" class="py-20 bg-gradient-to-br from-gray-50 to-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 section-title opacity-0">
          <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
            Join Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-secondary-600">Team</span>
          </h2>
          <p class="text-xl text-gray-600">
            Be part of something amazing and grow your career with us
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="job in jobCirculars" :key="job.id" 
               class="job-card bg-white border-2 border-gray-200 rounded-2xl p-8 hover:shadow-2xl hover:border-primary-500 transition-all duration-300 transform hover:-translate-y-2 opacity-0">
            <div class="flex items-start justify-between mb-4">
              <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-secondary-500 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
              </div>
              <span class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">Open</span>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ job.title }}</h3>
            <p class="text-gray-600 mb-4 line-clamp-2">{{ job.description }}</p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="bg-gray-100 text-gray-700 text-sm px-3 py-1 rounded-full">{{ job.location }}</span>
              <span class="bg-gray-100 text-gray-700 text-sm px-3 py-1 rounded-full">{{ job.job_type }}</span>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
              <span class="text-sm text-gray-500">Deadline: {{ new Date(job.application_deadline).toLocaleDateString() }}</span>
              <Link href="/careers" class="text-primary-600 font-bold hover:text-primary-700 flex items-center">
                Apply <span class="ml-1">→</span>
              </Link>
            </div>
          </div>
        </div>

        <div class="text-center mt-16 cta-button opacity-0">
          <Link href="/careers" class="bg-gradient-to-r from-primary-600 to-secondary-600 text-white px-10 py-4 rounded-full font-bold text-lg hover:shadow-2xl hover:scale-105 transform transition duration-300 inline-block">
            View All Openings
          </Link>
        </div>
      </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 section-title opacity-0">
          <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
            What Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-secondary-600">Clients Say</span>
          </h2>
          <p class="text-xl text-gray-600">
            Success stories from our satisfied clients
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="testimonial-card bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 opacity-0">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center text-white font-bold text-xl">A</div>
              <div class="ml-4">
                <div class="font-bold text-gray-900">Ahmed Rahman</div>
                <div class="text-sm text-gray-600">CEO, Tech Solutions</div>
              </div>
            </div>
            <p class="text-gray-600 italic">"Optimus delivered an exceptional web application that exceeded our expectations. Their team is professional and highly skilled."</p>
            <div class="flex mt-4 text-yellow-400">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            </div>
          </div>

          <div class="testimonial-card bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 opacity-0">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-xl">S</div>
              <div class="ml-4">
                <div class="font-bold text-gray-900">Sarah Khan</div>
                <div class="text-sm text-gray-600">Founder, StartupHub</div>
              </div>
            </div>
            <p class="text-gray-600 italic">"Working with Optimus was a game-changer for our business. They transformed our ideas into a beautiful, functional product."</p>
            <div class="flex mt-4 text-yellow-400">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            </div>
          </div>

          <div class="testimonial-card bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 opacity-0">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full flex items-center justify-center text-white font-bold text-xl">M</div>
              <div class="ml-4">
                <div class="font-bold text-gray-900">Michael Chen</div>
                <div class="text-sm text-gray-600">CTO, InnovateCorp</div>
              </div>
            </div>
            <p class="text-gray-600 italic">"The level of expertise and attention to detail from Optimus is unmatched. Highly recommend for any software project!"</p>
            <div class="flex mt-4 text-yellow-400">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-20 overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-r from-primary-600 via-purple-600 to-secondary-600"></div>
      <div class="absolute inset-0 opacity-20">
        <div class="absolute top-10 left-10 w-72 h-72 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-yellow-300 rounded-full blur-3xl"></div>
      </div>
      <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center cta-section opacity-0">
        <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6">
          Ready to Transform Your Business?
        </h2>
        <p class="text-xl md:text-2xl text-gray-100 mb-10 max-w-3xl mx-auto">
          Let's discuss how we can help you achieve your goals with our innovative solutions and expert team.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
          <Link href="/contact" class="bg-white text-primary-600 px-10 py-4 rounded-full font-bold text-lg hover:shadow-2xl hover:scale-105 transform transition duration-300 inline-block">
            Start Your Project
          </Link>
          <Link href="/services" class="border-2 border-white text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-primary-600 transition duration-300 inline-block">
            Explore Services
          </Link>
        </div>
      </div>
    </section>
  </Layout>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue'
import Layout from '../Components/Layout.vue'
import { Link } from '@inertiajs/vue3'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

gsap.registerPlugin(ScrollTrigger)

const props = defineProps({
  settings: Object,
  services: Array,
  jobCirculars: Array,
})

const currentSlide = ref(0)
let sliderInterval = null

const technologies = ['Vue.js', 'React', 'Laravel', 'Node.js', 'Python', 'PHP', 'MySQL', 'MongoDB', 'AWS', 'Docker', 'Git', 'Figma']

// Compute slider items (both images and videos) from settings
const sliderItems = computed(() => {
  const items = []
  
  // Add slider videos if they exist (priority)
  for (let i = 1; i <= 4; i++) {
    const videoField = `slider_video_${i}`
    if (props.settings?.[videoField]) {
      items.push({
        type: 'video',
        src: `/storage/${props.settings[videoField]}`
      })
    }
  }
  
  // Add slider images if they exist
  for (let i = 1; i <= 4; i++) {
    const imageField = `slider_image_${i}`
    if (props.settings?.[imageField]) {
      items.push({
        type: 'image',
        src: `/storage/${props.settings[imageField]}`
      })
    }
  }
  
  // If no slider items, use hero image or default gradient
  if (items.length === 0) {
    if (props.settings?.hero_image) {
      items.push({
        type: 'image',
        src: `/storage/${props.settings.hero_image}`
      })
    } else {
      items.push({
        type: 'image',
        src: 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 1080"%3E%3Cdefs%3E%3ClinearGradient id="grad" x1="0%25" y1="0%25" x2="100%25" y2="100%25"%3E%3Cstop offset="0%25" style="stop-color:rgb(37,99,235);stop-opacity:1" /%3E%3Cstop offset="100%25" style="stop-color:rgb(13,148,136);stop-opacity:1" /%3E%3C/linearGradient%3E%3C/defs%3E%3Crect width="1920" height="1080" fill="url(%23grad)" /%3E%3C/svg%3E'
      })
    }
  }
  
  return items
})

// Auto-advance slider
onMounted(() => {
  // Slider
  if (sliderItems.value.length > 1) {
    sliderInterval = setInterval(() => {
      currentSlide.value = (currentSlide.value + 1) % sliderItems.value.length
    }, 5000)
  }

  // GSAP Animations
  // Hero Section
  gsap.to('.hero-title span', {
    opacity: 1,
    y: 0,
    duration: 1,
    stagger: 0.3,
    ease: 'power3.out'
  })

  gsap.to('.hero-description', {
    opacity: 1,
    y: 0,
    duration: 1,
    delay: 0.8,
    ease: 'power3.out'
  })

  gsap.to('.hero-buttons', {
    opacity: 1,
    y: 0,
    duration: 1,
    delay: 1.2,
    ease: 'power3.out'
  })

  // Floating code elements
  gsap.to('.code-element', {
    y: -20,
    duration: 2,
    repeat: -1,
    yoyo: true,
    ease: 'power1.inOut',
    stagger: 0.2
  })

  // Stats Counter Animation
  ScrollTrigger.create({
    trigger: '.stat-item',
    start: 'top 80%',
    onEnter: () => {
      document.querySelectorAll('.stat-item').forEach((item, index) => {
        gsap.to(item, {
          opacity: 1,
          y: 0,
          duration: 0.8,
          delay: index * 0.1,
          ease: 'power3.out'
        })

        const counter = item.querySelector('[data-count]')
        const target = parseInt(counter.getAttribute('data-count'))
        gsap.to(counter, {
          innerHTML: target,
          duration: 2,
          delay: index * 0.1,
          snap: { innerHTML: 1 },
          ease: 'power1.out'
        })
      })
    }
  })

  // Section Titles
  gsap.utils.toArray('.section-title').forEach(title => {
    gsap.to(title, {
      scrollTrigger: {
        trigger: title,
        start: 'top 85%',
      },
      opacity: 1,
      y: 0,
      duration: 1,
      ease: 'power3.out'
    })
  })

  // Service Cards
  gsap.utils.toArray('.service-card').forEach((card, index) => {
    gsap.to(card, {
      scrollTrigger: {
        trigger: card,
        start: 'top 85%',
      },
      opacity: 1,
      y: 0,
      duration: 0.8,
      delay: index * 0.1,
      ease: 'power3.out'
    })
  })

  // Feature Cards
  gsap.utils.toArray('.feature-card').forEach((card, index) => {
    gsap.to(card, {
      scrollTrigger: {
        trigger: card,
        start: 'top 85%',
      },
      opacity: 1,
      scale: 1,
      duration: 0.8,
      delay: index * 0.15,
      ease: 'back.out(1.7)'
    })
  })

  // About Section
  gsap.to('.about-content', {
    scrollTrigger: {
      trigger: '.about-content',
      start: 'top 80%',
    },
    opacity: 1,
    x: 0,
    duration: 1,
    ease: 'power3.out'
  })

  gsap.to('.about-image', {
    scrollTrigger: {
      trigger: '.about-image',
      start: 'top 80%',
    },
    opacity: 1,
    x: 0,
    duration: 1,
    ease: 'power3.out'
  })

  // Tech Logos
  gsap.utils.toArray('.tech-item').forEach((item, index) => {
    gsap.to(item, {
      scrollTrigger: {
        trigger: item,
        start: 'top 90%',
      },
      opacity: 1,
      scale: 1,
      duration: 0.5,
      delay: index * 0.05,
      ease: 'back.out(1.7)'
    })
  })

  // Job Cards
  gsap.utils.toArray('.job-card').forEach((card, index) => {
    gsap.to(card, {
      scrollTrigger: {
        trigger: card,
        start: 'top 85%',
      },
      opacity: 1,
      y: 0,
      duration: 0.8,
      delay: index * 0.1,
      ease: 'power3.out'
    })
  })

  // Testimonial Cards
  gsap.utils.toArray('.testimonial-card').forEach((card, index) => {
    gsap.to(card, {
      scrollTrigger: {
        trigger: card,
        start: 'top 85%',
      },
      opacity: 1,
      y: 0,
      rotation: 0,
      duration: 0.8,
      delay: index * 0.15,
      ease: 'power3.out'
    })
  })

  // CTA Buttons
  gsap.utils.toArray('.cta-button').forEach(button => {
    gsap.to(button, {
      scrollTrigger: {
        trigger: button,
        start: 'top 90%',
      },
      opacity: 1,
      scale: 1,
      duration: 0.8,
      ease: 'back.out(1.7)'
    })
  })

  // CTA Section
  gsap.to('.cta-section', {
    scrollTrigger: {
      trigger: '.cta-section',
      start: 'top 80%',
    },
    opacity: 1,
    y: 0,
    duration: 1,
    ease: 'power3.out'
  })
})

onUnmounted(() => {
  if (sliderInterval) {
    clearInterval(sliderInterval)
  }
  ScrollTrigger.getAll().forEach(trigger => trigger.kill())
})
</script>

<style scoped>
.hero-title span {
  transform: translateY(30px);
}

.hero-description,
.hero-buttons {
  transform: translateY(30px);
}

.stat-item {
  transform: translateY(30px);
}

.service-card,
.job-card,
.testimonial-card {
  transform: translateY(30px);
}

.feature-card {
  transform: scale(0.8);
}

.about-content {
  transform: translateX(-50px);
}

.about-image {
  transform: translateX(50px);
}

.tech-item {
  transform: scale(0.5);
}

.cta-button {
  transform: scale(0.8);
}

.cta-section {
  transform: translateY(30px);
}

.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
