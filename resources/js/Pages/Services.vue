<template>
  <Layout>
    <div class="bg-white">
      <!-- Header -->
      <div class="bg-primary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <h1 class="text-4xl font-extrabold">Our Services</h1>
          <p class="mt-4 text-xl">Comprehensive solutions for your digital transformation needs</p>
        </div>
      </div>

      <!-- Services Grid -->
      <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="service in services" :key="service.id" class="bg-white border border-gray-200 rounded-lg p-8 hover:shadow-lg transition duration-300">
            <div class="text-primary-600 mb-6">
              <svg class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ service.title }}</h3>
            <p class="text-gray-600 leading-relaxed">{{ service.description }}</p>
          </div>
        </div>

        <!-- CTA Section -->
        <div class="mt-16 text-center">
          <h2 class="text-3xl font-bold text-gray-900 mb-4">
            Ready to Get Started?
          </h2>
          <p class="text-xl text-gray-600 mb-8">
            Let's discuss how we can help transform your business with our services.
          </p>
          <Link href="/contact" class="bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition duration-300">
            Contact Us Today
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
  services: Array,
})
</script>