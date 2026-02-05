<template>
  <Layout>
    <div class="bg-white">
      <!-- Header -->
      <div class="bg-primary-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <h1 class="text-4xl font-extrabold">Careers</h1>
          <p class="mt-4 text-xl">Join our team and be part of something amazing</p>
        </div>
      </div>

      <!-- Job Listings -->
      <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div v-if="jobCirculars.length > 0">
          <h2 class="text-3xl font-bold text-gray-900 mb-8">Current Job Openings</h2>
          
          <div class="space-y-6">
            <div v-for="job in jobCirculars" :key="job.id" class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-lg transition duration-300">
              <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="flex-1">
                  <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ job.title }}</h3>
                  <p class="text-gray-600 mb-4">{{ job.description }}</p>
                  
                  <div class="flex flex-wrap gap-4 text-sm text-gray-500 mb-4">
                    <div class="flex items-center">
                      <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                      {{ job.location || 'Remote' }}
                    </div>
                    
                    <div class="flex items-center">
                      <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6" />
                      </svg>
                      {{ job.job_type }}
                    </div>
                    
                    <div class="flex items-center">
                      <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 6v6m-4-6h8m-8 0V9a4 4 0 118 0v4" />
                      </svg>
                      Deadline: {{ new Date(job.application_deadline).toLocaleDateString() }}
                    </div>
                  </div>
                  
                  <div v-if="job.requirements" class="mb-4">
                    <h4 class="font-semibold text-gray-900 mb-2">Requirements:</h4>
                    <p class="text-gray-600 text-sm">{{ job.requirements }}</p>
                  </div>
                  
                  <div v-if="job.salary_min || job.salary_max" class="text-sm text-gray-500 mb-4">
                    <span class="font-semibold">Salary: </span>
                    <span v-if="job.salary_min && job.salary_max">
                      ${{ job.salary_min }} - ${{ job.salary_max }}
                    </span>
                    <span v-else-if="job.salary_min">
                      From ${{ job.salary_min }}
                    </span>
                    <span v-else-if="job.salary_max">
                      Up to ${{ job.salary_max }}
                    </span>
                  </div>
                </div>
                
                <div class="mt-4 md:mt-0 md:ml-6">
                  <Link href="/contact" class="bg-primary-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-primary-700 transition duration-300">
                    Apply Now
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- No Jobs Available -->
        <div v-else class="text-center py-12">
          <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6" />
          </svg>
          <h3 class="text-2xl font-semibold text-gray-900 mb-2">No Current Openings</h3>
          <p class="text-gray-600 mb-6">
            We don't have any job openings at the moment, but we're always looking for talented individuals to join our team.
          </p>
          <Link href="/contact" class="bg-primary-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-700 transition duration-300">
            Send Us Your Resume
          </Link>
        </div>

        <!-- Why Work With Us -->
        <div class="mt-16">
          <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Why Work With Us?</h2>
          
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="text-center">
              <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                <svg class="h-8 w-8 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
              </div>
              <h3 class="text-xl font-semibold text-gray-900 mb-2">Innovation</h3>
              <p class="text-gray-600">Work with cutting-edge technologies and innovative projects that challenge and inspire you.</p>
            </div>
            
            <div class="text-center">
              <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                <svg class="h-8 w-8 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                </svg>
              </div>
              <h3 class="text-xl font-semibold text-gray-900 mb-2">Growth</h3>
              <p class="text-gray-600">Continuous learning opportunities and career advancement in a supportive environment.</p>
            </div>
            
            <div class="text-center">
              <div class="bg-primary-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                <svg class="h-8 w-8 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
              </div>
              <h3 class="text-xl font-semibold text-gray-900 mb-2">Benefits</h3>
              <p class="text-gray-600">Competitive salary, flexible working hours, health benefits, and a great work-life balance.</p>
            </div>
          </div>
        </div>

        <!-- CTA Section -->
        <div class="mt-16 bg-primary-600 text-white rounded-lg p-8 text-center">
          <h2 class="text-3xl font-bold mb-4">Ready to Join Our Team?</h2>
          <p class="text-xl mb-6">Even if there are no current openings, we'd love to hear from you!</p>
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
  jobCirculars: Array,
})
</script>