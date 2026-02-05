<template>
  <div class="min-h-screen bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex items-center space-x-4">
            <Link href="/admin/job-circulars" class="text-gray-500 hover:text-gray-700">
              ← Back to Job Circulars
            </Link>
            <h1 class="text-xl font-semibold text-gray-900">Edit Job Circular</h1>
          </div>
        </div>
      </div>
    </nav>

    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
      <form @submit.prevent="submitForm" class="space-y-8">
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
          <div class="space-y-6">
            <div>
              <label for="title" class="block text-sm font-medium text-gray-700">Job Title *</label>
              <input
                v-model="form.title"
                type="text"
                id="title"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                :class="{ 'border-red-500': errors.title }"
              />
              <p v-if="errors.title" class="mt-1 text-sm text-red-600">{{ errors.title }}</p>
            </div>

            <div>
              <label for="description" class="block text-sm font-medium text-gray-700">Job Description *</label>
              <textarea
                v-model="form.description"
                id="description"
                rows="6"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                :class="{ 'border-red-500': errors.description }"
              ></textarea>
              <p v-if="errors.description" class="mt-1 text-sm text-red-600">{{ errors.description }}</p>
            </div>

            <div>
              <label for="requirements" class="block text-sm font-medium text-gray-700">Requirements</label>
              <textarea
                v-model="form.requirements"
                id="requirements"
                rows="4"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                :class="{ 'border-red-500': errors.requirements }"
              ></textarea>
              <p v-if="errors.requirements" class="mt-1 text-sm text-red-600">{{ errors.requirements }}</p>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
              <div>
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <input
                  v-model="form.location"
                  type="text"
                  id="location"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                  :class="{ 'border-red-500': errors.location }"
                />
                <p v-if="errors.location" class="mt-1 text-sm text-red-600">{{ errors.location }}</p>
              </div>

              <div>
                <label for="job_type" class="block text-sm font-medium text-gray-700">Job Type *</label>
                <select
                  v-model="form.job_type"
                  id="job_type"
                  required
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                  :class="{ 'border-red-500': errors.job_type }"
                >
                  <option value="">Select job type</option>
                  <option value="Full-time">Full-time</option>
                  <option value="Part-time">Part-time</option>
                  <option value="Contract">Contract</option>
                  <option value="Internship">Internship</option>
                </select>
                <p v-if="errors.job_type" class="mt-1 text-sm text-red-600">{{ errors.job_type }}</p>
              </div>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
              <div>
                <label for="salary_min" class="block text-sm font-medium text-gray-700">Minimum Salary (USD)</label>
                <input
                  v-model.number="form.salary_min"
                  type="number"
                  id="salary_min"
                  min="0"
                  step="100"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                  :class="{ 'border-red-500': errors.salary_min }"
                />
                <p v-if="errors.salary_min" class="mt-1 text-sm text-red-600">{{ errors.salary_min }}</p>
              </div>

              <div>
                <label for="salary_max" class="block text-sm font-medium text-gray-700">Maximum Salary (USD)</label>
                <input
                  v-model.number="form.salary_max"
                  type="number"
                  id="salary_max"
                  min="0"
                  step="100"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                  :class="{ 'border-red-500': errors.salary_max }"
                />
                <p v-if="errors.salary_max" class="mt-1 text-sm text-red-600">{{ errors.salary_max }}</p>
              </div>
            </div>

            <div>
              <label for="application_deadline" class="block text-sm font-medium text-gray-700">Application Deadline *</label>
              <input
                v-model="form.application_deadline"
                type="date"
                id="application_deadline"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                :class="{ 'border-red-500': errors.application_deadline }"
              />
              <p v-if="errors.application_deadline" class="mt-1 text-sm text-red-600">{{ errors.application_deadline }}</p>
            </div>

            <div class="flex items-center">
              <input
                v-model="form.is_active"
                type="checkbox"
                id="is_active"
                class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
              />
              <label for="is_active" class="ml-2 block text-sm text-gray-900">
                Active (visible on careers page)
              </label>
            </div>
          </div>
        </div>

        <div class="flex justify-end space-x-3">
          <Link href="/admin/job-circulars" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-400 transition duration-300">
            Cancel
          </Link>
          <button
            type="submit"
            :disabled="processing"
            class="bg-primary-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-primary-700 transition duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
          >
            <span v-if="processing">Updating...</span>
            <span v-else>Update Job</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  jobCircular: Object,
})

const form = useForm({
  title: props.jobCircular.title,
  description: props.jobCircular.description,
  requirements: props.jobCircular.requirements || '',
  location: props.jobCircular.location || '',
  job_type: props.jobCircular.job_type,
  salary_min: props.jobCircular.salary_min,
  salary_max: props.jobCircular.salary_max,
  application_deadline: props.jobCircular.application_deadline,
  is_active: props.jobCircular.is_active,
})

const errors = ref({})
const processing = ref(false)

const submitForm = () => {
  processing.value = true
  errors.value = {}
  
  form.put(`/admin/job-circulars/${props.jobCircular.id}`, {
    onSuccess: () => {
      processing.value = false
    },
    onError: (formErrors) => {
      errors.value = formErrors
      processing.value = false
    },
    onFinish: () => {
      processing.value = false
    }
  })
}
</script>