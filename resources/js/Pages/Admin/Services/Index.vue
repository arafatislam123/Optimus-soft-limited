<template>
  <div class="min-h-screen bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex items-center space-x-4">
            <Link href="/admin/dashboard" class="text-gray-500 hover:text-gray-700">
              ← Back to Dashboard
            </Link>
            <h1 class="text-xl font-semibold text-gray-900">Manage Services</h1>
          </div>
          <div class="flex items-center space-x-4">
            <Link href="/" class="text-gray-500 hover:text-gray-700">
              View Site
            </Link>
          </div>
        </div>
      </div>
    </nav>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Services</h2>
        <Link href="/admin/services/create" class="bg-primary-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-primary-700 transition duration-300">
          Add New Service
        </Link>
      </div>

      <div v-if="$page.props.flash?.success" class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        {{ $page.props.flash.success }}
      </div>

      <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <ul class="divide-y divide-gray-200">
          <li v-for="service in services" :key="service.id" class="px-6 py-4">
            <div class="flex items-center justify-between">
              <div class="flex items-center space-x-4">
                <div v-if="service.image" class="flex-shrink-0">
                  <img :src="`/storage/${service.image}`" :alt="service.title" class="h-16 w-16 object-cover rounded-lg" />
                </div>
                <div v-else class="flex-shrink-0">
                  <div class="h-16 w-16 bg-gray-200 rounded-lg flex items-center justify-center">
                    <svg class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                  </div>
                </div>
                <div>
                  <h3 class="text-lg font-medium text-gray-900">{{ service.title }}</h3>
                  <p class="text-gray-600">{{ service.description.substring(0, 100) }}...</p>
                  <div class="flex items-center space-x-4 mt-2">
                    <span :class="service.is_active ? 'text-green-600' : 'text-red-600'" class="text-sm font-medium">
                      {{ service.is_active ? 'Active' : 'Inactive' }}
                    </span>
                    <span class="text-sm text-gray-500">Order: {{ service.sort_order }}</span>
                  </div>
                </div>
              </div>
              <div class="flex items-center space-x-2">
                <Link :href="`/admin/services/${service.id}/edit`" class="text-primary-600 hover:text-primary-700 font-medium">
                  Edit
                </Link>
                <button @click="deleteService(service)" class="text-red-600 hover:text-red-700 font-medium">
                  Delete
                </button>
              </div>
            </div>
          </li>
          <li v-if="services.length === 0" class="px-6 py-8 text-center text-gray-500">
            No services found. <Link href="/admin/services/create" class="text-primary-600 hover:text-primary-700">Create your first service</Link>.
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'

defineProps({
  services: Array,
})

const deleteService = (service) => {
  if (confirm(`Are you sure you want to delete "${service.title}"?`)) {
    router.delete(`/admin/services/${service.id}`)
  }
}
</script>