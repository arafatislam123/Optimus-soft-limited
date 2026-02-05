<template>
  <Layout>
    <div class="bg-white">
      <!-- Header -->
      <div class="bg-primary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <h1 class="text-4xl font-extrabold">About Us</h1>
          <p class="mt-4 text-xl">Learn more about Optimus Software Limited</p>
        </div>
      </div>

      <!-- About Content -->
      <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
          <div>
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl mb-6">
              {{ settings?.about_title || 'About Optimus Software Limited' }}
            </h2>
            <p class="text-lg text-gray-600 mb-6 leading-relaxed">
              {{ settings?.about_description || 'We are a leading software development company specializing in web applications, mobile apps, digital marketing, business solutions, and hardware solutions. Our team of experienced professionals is dedicated to delivering innovative and scalable solutions that drive business growth.' }}
            </p>
            
            <!-- Stats -->
            <div class="grid grid-cols-2 gap-6 mb-8">
              <div class="text-center">
                <div class="text-4xl font-bold text-primary-600 mb-2">50+</div>
                <div class="text-gray-600">Projects Completed</div>
              </div>
              <div class="text-center">
                <div class="text-4xl font-bold text-primary-600 mb-2">25+</div>
                <div class="text-gray-600">Happy Clients</div>
              </div>
              <div class="text-center">
                <div class="text-4xl font-bold text-primary-600 mb-2">5+</div>
                <div class="text-gray-600">Years Experience</div>
              </div>
              <div class="text-center">
                <div class="text-4xl font-bold text-primary-600 mb-2">24/7</div>
                <div class="text-gray-600">Support</div>
              </div>
            </div>
          </div>
          
          <div class="relative">
            <img 
              :src="settings?.about_image ? `/storage/${settings.about_image}` : '/images/about-placeholder.jpg'" 
              alt="About Us" 
              class="rounded-lg shadow-lg w-full h-96 object-cover"
            />
          </div>
        </div>

        <!-- Mission & Vision -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
          <div class="bg-gray-50 p-8 rounded-lg">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h3>
            <p class="text-gray-600 leading-relaxed">
              To empower businesses with innovative technology solutions that drive growth, efficiency, and digital transformation. We strive to deliver exceptional value through cutting-edge software development and comprehensive digital services.
            </p>
          </div>
          
          <div class="bg-gray-50 p-8 rounded-lg">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Vision</h3>
            <p class="text-gray-600 leading-relaxed">
              To be the leading technology partner for businesses seeking digital excellence. We envision a future where every organization can leverage the power of technology to achieve their goals and create meaningful impact.
            </p>
          </div>
        </div>

        <!-- Values -->
        <div class="text-center mb-12">
          <h2 class="text-3xl font-extrabold text-gray-900 mb-8">Our Values</h2>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
              <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                <svg class="h-8 w-8 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <h3 class="text-xl font-semibold text-gray-900 mb-2">Quality</h3>
              <p class="text-gray-600">We deliver high-quality solutions that exceed expectations and stand the test of time.</p>
            </div>
            
            <div class="text-center">
              <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                <svg class="h-8 w-8 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
              </div>
              <h3 class="text-xl font-semibold text-gray-900 mb-2">Innovation</h3>
              <p class="text-gray-600">We embrace cutting-edge technologies and innovative approaches to solve complex challenges.</p>
            </div>
            
            <div class="text-center">
              <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                <svg class="h-8 w-8 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
              </div>
              <h3 class="text-xl font-semibold text-gray-900 mb-2">Collaboration</h3>
              <p class="text-gray-600">We work closely with our clients as partners to achieve shared success and mutual growth.</p>
            </div>
          </div>
        </div>

        <!-- CTA Section -->
        <div class="bg-primary-600 text-white rounded-lg p-8 text-center">
          <h2 class="text-3xl font-bold mb-4">Ready to Work With Us?</h2>
          <p class="text-xl mb-6">Let's discuss how we can help transform your business with our expertise.</p>
          <Link href="/contact" class="bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
            Get In Touch
          </Link>
        </div>
      </div>
    </div>
  </Layout>
</template>

<script setup>
import Layout from '../Components/Layout.vue'
import { Link } from '@inertiajs/vue3'

defineProps({
  settings: Object,
})
</script>