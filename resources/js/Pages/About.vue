<template>
  <Layout>
    <div class="bg-white">
      <!-- Animated Header -->
      <div class="relative bg-gradient-to-r from-primary-600 via-purple-600 to-secondary-600 text-white py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
          <div class="absolute top-10 left-10 w-64 h-64 bg-yellow-400 rounded-full blur-3xl animate-pulse"></div>
          <div class="absolute bottom-10 right-10 w-96 h-96 bg-pink-400 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <h1 class="page-title text-5xl md:text-6xl font-extrabold mb-4 opacity-0">About Us</h1>
          <p class="page-subtitle text-xl md:text-2xl opacity-0">Discover the story behind &lt;OPTIMUS&gt;</p>
        </div>
      </div>

      <!-- About Content -->
      <div class="max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-20">
          <div class="about-text opacity-0">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6">
              {{ settings?.about_title || 'About' }} <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-secondary-600">&lt;OPTIMUS&gt;</span>
            </h2>
            <p class="text-lg text-gray-600 mb-6 leading-relaxed">
              {{ settings?.about_description || 'We are a leading software development company specializing in web applications, mobile apps, digital marketing, business solutions, and hardware solutions. Our team of experienced professionals is dedicated to delivering innovative and scalable solutions that drive business growth.' }}
            </p>
            
            <!-- Animated Stats -->
            <div class="grid grid-cols-2 gap-6 mb-8">
              <div class="stat-box bg-gradient-to-br from-primary-50 to-secondary-50 p-6 rounded-2xl text-center transform hover:scale-105 transition-all duration-300 opacity-0">
                <div class="text-5xl font-bold text-primary-600 mb-2" data-count="50">0</div>
                <div class="text-gray-700 font-semibold">Projects</div>
              </div>
              <div class="stat-box bg-gradient-to-br from-secondary-50 to-primary-50 p-6 rounded-2xl text-center transform hover:scale-105 transition-all duration-300 opacity-0">
                <div class="text-5xl font-bold text-secondary-600 mb-2" data-count="25">0</div>
                <div class="text-gray-700 font-semibold">Clients</div>
              </div>
              <div class="stat-box bg-gradient-to-br from-green-50 to-blue-50 p-6 rounded-2xl text-center transform hover:scale-105 transition-all duration-300 opacity-0">
                <div class="text-5xl font-bold text-green-600 mb-2" data-count="5">0</div>
                <div class="text-gray-700 font-semibold">Years</div>
              </div>
              <div class="stat-box bg-gradient-to-br from-yellow-50 to-orange-50 p-6 rounded-2xl text-center transform hover:scale-105 transition-all duration-300 opacity-0">
                <div class="text-5xl font-bold text-orange-600 mb-2">24/7</div>
                <div class="text-gray-700 font-semibold">Support</div>
              </div>
            </div>
          </div>
          
          <div class="about-image relative opacity-0">
            <div class="absolute -inset-4 bg-gradient-to-r from-primary-400 to-secondary-400 rounded-3xl blur-2xl opacity-30"></div>
            <img 
              :src="settings?.about_image ? `/storage/${settings.about_image}` : '/images/about-placeholder.jpg'" 
              alt="About Us" 
              class="relative rounded-3xl shadow-2xl w-full h-96 object-cover transform hover:scale-105 transition-transform duration-500"
            />
          </div>
        </div>

        <!-- Mission & Vision -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-20">
          <div class="mission-card bg-gradient-to-br from-blue-50 to-purple-50 p-10 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 opacity-0">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-2xl flex items-center justify-center mb-6">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
              </svg>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-4">Our Mission</h3>
            <p class="text-gray-600 leading-relaxed text-lg">
              To empower businesses with innovative technology solutions that drive growth, efficiency, and digital transformation. We strive to deliver exceptional value through cutting-edge software development and comprehensive digital services.
            </p>
          </div>
          
          <div class="vision-card bg-gradient-to-br from-green-50 to-teal-50 p-10 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 opacity-0">
            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-500 rounded-2xl flex items-center justify-center mb-6">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
              </svg>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-4">Our Vision</h3>
            <p class="text-gray-600 leading-relaxed text-lg">
              To be the leading technology partner for businesses seeking digital excellence. We envision a future where every organization can leverage the power of technology to achieve their goals and create meaningful impact.
            </p>
          </div>
        </div>

        <!-- Values -->
        <div class="text-center mb-16">
          <h2 class="values-title text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 opacity-0">
            Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-secondary-600">Core Values</span>
          </h2>
          <p class="values-subtitle text-xl text-gray-600 mb-12 opacity-0">The principles that guide everything we do</p>
          
          <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="value-card text-center p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 opacity-0">
              <div class="w-20 h-20 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 transform hover:rotate-12 transition-transform duration-300">
                <svg class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <h3 class="text-2xl font-bold text-gray-900 mb-3">Quality Excellence</h3>
              <p class="text-gray-600 leading-relaxed">We deliver high-quality solutions that exceed expectations and stand the test of time, ensuring every project meets the highest standards.</p>
            </div>
            
            <div class="value-card text-center p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 opacity-0">
              <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-6 transform hover:rotate-12 transition-transform duration-300">
                <svg class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
              </div>
              <h3 class="text-2xl font-bold text-gray-900 mb-3">Innovation First</h3>
              <p class="text-gray-600 leading-relaxed">We embrace cutting-edge technologies and innovative approaches to solve complex challenges and stay ahead of the curve.</p>
            </div>
            
            <div class="value-card text-center p-8 bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 opacity-0">
              <div class="w-20 h-20 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-6 transform hover:rotate-12 transition-transform duration-300">
                <svg class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
              </div>
              <h3 class="text-2xl font-bold text-gray-900 mb-3">Client Partnership</h3>
              <p class="text-gray-600 leading-relaxed">We work closely with our clients as true partners to achieve shared success, mutual growth, and long-term relationships.</p>
            </div>
          </div>
        </div>

        <!-- CTA Section -->
        <div class="cta-section relative py-16 rounded-3xl overflow-hidden opacity-0">
          <div class="absolute inset-0 bg-gradient-to-r from-primary-600 via-purple-600 to-secondary-600"></div>
          <div class="absolute inset-0 opacity-20">
            <div class="absolute top-10 left-10 w-64 h-64 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-yellow-300 rounded-full blur-3xl"></div>
          </div>
          <div class="relative text-center px-8">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Ready to Work With Us?</h2>
            <p class="text-xl md:text-2xl text-gray-100 mb-8 max-w-3xl mx-auto">Let's discuss how we can help transform your business with our expertise and innovative solutions.</p>
            <Link href="/contact" class="inline-block bg-white text-primary-600 px-10 py-4 rounded-full font-bold text-lg hover:shadow-2xl hover:scale-105 transform transition duration-300">
              Get In Touch
            </Link>
          </div>
        </div>
      </div>
    </div>
  </Layout>
</template>

<script setup>
import { onMounted, onUnmounted } from 'vue'
import Layout from '../Components/Layout.vue'
import { Link } from '@inertiajs/vue3'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

gsap.registerPlugin(ScrollTrigger)

defineProps({
  settings: Object,
})

onMounted(() => {
  // Header animations
  gsap.to('.page-title', {
    opacity: 1,
    y: 0,
    duration: 1,
    ease: 'power3.out'
  })

  gsap.to('.page-subtitle', {
    opacity: 1,
    y: 0,
    duration: 1,
    delay: 0.3,
    ease: 'power3.out'
  })

  // About text animation
  gsap.to('.about-text', {
    scrollTrigger: {
      trigger: '.about-text',
      start: 'top 80%',
    },
    opacity: 1,
    x: 0,
    duration: 1,
    ease: 'power3.out'
  })

  // About image animation
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

  // Stats counter animation
  ScrollTrigger.create({
    trigger: '.stat-box',
    start: 'top 80%',
    onEnter: () => {
      document.querySelectorAll('.stat-box').forEach((box, index) => {
        gsap.to(box, {
          opacity: 1,
          scale: 1,
          duration: 0.8,
          delay: index * 0.1,
          ease: 'back.out(1.7)'
        })

        const counter = box.querySelector('[data-count]')
        if (counter) {
          const target = parseInt(counter.getAttribute('data-count'))
          gsap.to(counter, {
            innerHTML: target,
            duration: 2,
            delay: index * 0.1,
            snap: { innerHTML: 1 },
            ease: 'power1.out'
          })
        }
      })
    }
  })

  // Mission & Vision cards
  gsap.to('.mission-card', {
    scrollTrigger: {
      trigger: '.mission-card',
      start: 'top 85%',
    },
    opacity: 1,
    y: 0,
    duration: 0.8,
    ease: 'power3.out'
  })

  gsap.to('.vision-card', {
    scrollTrigger: {
      trigger: '.vision-card',
      start: 'top 85%',
    },
    opacity: 1,
    y: 0,
    duration: 0.8,
    delay: 0.2,
    ease: 'power3.out'
  })

  // Values section
  gsap.to('.values-title', {
    scrollTrigger: {
      trigger: '.values-title',
      start: 'top 85%',
    },
    opacity: 1,
    y: 0,
    duration: 1,
    ease: 'power3.out'
  })

  gsap.to('.values-subtitle', {
    scrollTrigger: {
      trigger: '.values-subtitle',
      start: 'top 85%',
    },
    opacity: 1,
    y: 0,
    duration: 1,
    delay: 0.2,
    ease: 'power3.out'
  })

  gsap.utils.toArray('.value-card').forEach((card, index) => {
    gsap.to(card, {
      scrollTrigger: {
        trigger: card,
        start: 'top 85%',
      },
      opacity: 1,
      y: 0,
      duration: 0.8,
      delay: index * 0.15,
      ease: 'power3.out'
    })
  })

  // CTA section
  gsap.to('.cta-section', {
    scrollTrigger: {
      trigger: '.cta-section',
      start: 'top 85%',
    },
    opacity: 1,
    scale: 1,
    duration: 1,
    ease: 'power3.out'
  })
})

onUnmounted(() => {
  ScrollTrigger.getAll().forEach(trigger => trigger.kill())
})
</script>

<style scoped>
.page-title,
.page-subtitle {
  transform: translateY(30px);
}

.about-text {
  transform: translateX(-50px);
}

.about-image {
  transform: translateX(50px);
}

.stat-box {
  transform: scale(0.8);
}

.mission-card,
.vision-card,
.value-card {
  transform: translateY(30px);
}

.cta-section {
  transform: scale(0.95);
}
</style>
