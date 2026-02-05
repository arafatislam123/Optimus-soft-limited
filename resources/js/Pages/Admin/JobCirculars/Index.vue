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
            <h1 class="text-xl font-semibold text-gray-900">Job Circulars</h1>
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
        <h2 class="text-2xl font-bold text-gray-900">Job Circulars</h2>
        <Link href="/admin/job-circulars/create" class="bg-primary-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-primary-700 transition duration-300">
          Post New Job
        </Link>
      </div>

      <div v-if="$page.props.flash?.success" class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        {{ $page.props.flash.success }}
      </div>

      <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <ul class="divide-y divide-gray-200">
          <li v-for="job in jobCirculars" :key="job.id" class="px-6 py-4">
            <div class="flex items-center justify-between">
              <div class="flex-1">
                <div class="flex items-center justify-between">
                  <h3 class="text-lg font-medium text-gray-900">{{ job.title }}</h3>
                  <div class="flex items-center space-x-2">
                    <span :class="job.is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium">
                      {{ job.is_active ? 'Active' : 'Inactive' }}
                    </span>
                    <span :class="new Date(job.application_deadline) > new Date() ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800'" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium">
                      {{ new Date(job.application_deadline) > new Date() ? 'Open' : 'Expired' }}
                    </span>
                  </div>
                </div>
                
                <p class="text-gray-600 mt-1">{{ job.description.substring(0, 150) }}...</p>
                
                <div class="flex items-center space-x-4 mt-2 text-sm text-gray-500">
                  <span class="flex items-center">
                    <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ job.location || 'Remote' }}
                  </span>
                  
                  <span class="flex items-center">
                    <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6" />
                    </svg>
                    {{ job.job_type }}
                  </span>
                  
                  <span class="flex items-center">
                    <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6v6m-4-6h8m-8 0V9a4 4 0 118 0v4" />
                    </svg>
                    Deadline: {{ new Date(job.application_deadline).toLocaleDateString() }}
                  </span>
                  
                  <span v-if="job.salary_min || job.salary_max" class="flex items-center">
                    <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                    <span v-if="job.salary_min && job.salary_max">
                      ${{ job.salary_min }} - ${{ job.salary_max }}
                    </span>
                    <span v-else-if="job.salary_min">
                      From ${{ job.salary_min }}
                    </span>
                    <span v-else-if="job.salary_max">
                      Up to ${{ job.salary_max }}
                    </span>
                  </span>
                </div>
              </div>
              
              <div class="flex items-center space-x-2 ml-4">
                <Link :href="`/admin/job-circulars/${job.id}/edit`" class="text-primary-600 hover:text-primary-700 font-medium">
                  Edit
                </Link>
                <button @click="deleteJob(job)" class="text-red-600 hover:text-red-700 font-medium">
                  Delete
                </button>
              </div>
            </div>
          </li>
          <li v-if="jobCirculars.length === 0" class="px-6 py-8 text-center text-gray-500">
            No job circulars found. <Link href="/admin/job-circulars/create" class="text-primary-600 hover:text-primary-700">Post your first job</Link>.
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'

defineProps({
  jobCirculars: Array,
})

const deleteJob = (job) => {
  if (confirm(`Are you sure you want to delete "${job.title}"?`)) {
    router.delete(`/admin/job-circulars/${job.id}`)
  }
}
</script>