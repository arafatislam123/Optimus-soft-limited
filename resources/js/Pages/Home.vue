<template>
  <Layout>
    <!-- Hero Slider Section -->
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
          <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
      </div>

      <!-- Hero Content -->
      <div class="absolute inset-0 flex items-center justify-center">
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8 text-center">
          <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
            {{ settings?.hero_title || 'Welcome to Optimus Software Limited' }}
          </h1>
          <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-300">
            {{ settings?.hero_description || 'Leading provider of innovative software solutions, web development, mobile applications, and digital transformation services.' }}
          </p>
          <div class="mt-10 flex justify-center space-x-4">
            <Link href="/services" class="bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
              Our Services
            </Link>
            <Link href="/contact" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary-600 transition duration-300">
              Get Started
            </Link>
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

    <!-- Services Section -->
    <section class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
            Our Services
          </h2>
          <p class="mt-4 text-xl text-gray-600">
            Comprehensive solutions for your digital transformation needs
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="service in services" :key="service.id" class="bg-gray-50 rounded-lg p-6 hover:shadow-lg transition duration-300">
            <div class="text-primary-600 mb-4">
              <svg class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ service.title }}</h3>
            <p class="text-gray-600">{{ service.description }}</p>
          </div>
        </div>

        <div class="text-center mt-12">
          <Link href="/services" class="bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition duration-300">
            View All Services
          </Link>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          <div>
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl mb-6">
              {{ settings?.about_title || 'About Optimus Software Limited' }}
            </h2>
            <p class="text-lg text-gray-600 mb-6">
              {{ settings?.about_description || 'We are a leading software development company specializing in web applications, mobile apps, digital marketing, business solutions, and hardware solutions. Our team of experienced professionals is dedicated to delivering innovative and scalable solutions that drive business growth.' }}
            </p>
            <div class="grid grid-cols-2 gap-4 mb-6">
              <div class="text-center">
                <div class="text-3xl font-bold text-primary-600">50+</div>
                <div class="text-gray-600">Projects Completed</div>
              </div>
              <div class="text-center">
                <div class="text-3xl font-bold text-primary-600">25+</div>
                <div class="text-gray-600">Happy Clients</div>
              </div>
            </div>
            <Link href="/about" class="bg-primary-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-700 transition duration-300">
              Learn More
            </Link>
          </div>
          <div class="relative">
            <img 
              :src="settings?.about_image ? `/storage/${settings.about_image}` : '/images/about-placeholder.jpg'" 
              alt="About Us" 
              class="rounded-lg shadow-lg w-full h-96 object-cover"
            />
          </div>
        </div>
      </div>
    </section>

    <!-- Job Circulars Section -->
    <section v-if="jobCirculars.length > 0" class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
          <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
            Current Job Openings
          </h2>
          <p class="mt-4 text-xl text-gray-600">
            Join our team and be part of something amazing
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div v-for="job in jobCirculars" :key="job.id" class="border border-gray-200 rounded-lg p-6 hover:shadow-lg transition duration-300">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ job.title }}</h3>
            <p class="text-gray-600 mb-4">{{ job.description.substring(0, 100) }}...</p>
            <div class="flex justify-between items-center text-sm text-gray-500 mb-4">
              <span>{{ job.location }}</span>
              <span>{{ job.job_type }}</span>
            </div>
            <div class="text-sm text-gray-500 mb-4">
              Deadline: {{ new Date(job.application_deadline).toLocaleDateString() }}
            </div>
            <Link href="/careers" class="text-primary-600 font-semibold hover:text-primary-700">
              Apply Now →
            </Link>
          </div>
        </div>

        <div class="text-center mt-12">
          <Link href="/careers" class="bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition duration-300">
            View All Jobs
          </Link>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-primary-600 text-white py-16">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-extrabold mb-4">
          Ready to Start Your Project?
        </h2>
        <p class="text-xl mb-8">
          Let's discuss how we can help transform your business with our innovative solutions.
        </p>
        <Link href="/contact" class="bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
          Get In Touch
        </Link>
      </div>
    </section>
  </Layout>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue'
import Layout from '../Components/Layout.vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  settings: Object,
  services: Array,
  jobCirculars: Array,
})

const currentSlide = ref(0)
let sliderInterval = null

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
      // Use a default placeholder
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
  if (sliderItems.value.length > 1) {
    sliderInterval = setInterval(() => {
      currentSlide.value = (currentSlide.value + 1) % sliderItems.value.length
    }, 5000) // Change slide every 5 seconds
  }
})

onUnmounted(() => {
  if (sliderInterval) {
    clearInterval(sliderInterval)
  }
})
</script>