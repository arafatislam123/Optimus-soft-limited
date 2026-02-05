<template>
  <div class="min-h-screen bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex items-center space-x-4">
            <Link href="/admin/services" class="text-gray-500 hover:text-gray-700">
              ← Back to Services
            </Link>
            <h1 class="text-xl font-semibold text-gray-900">Edit Service</h1>
          </div>
        </div>
      </div>
    </nav>

    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
      <form @submit.prevent="submitForm" class="space-y-8">
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
          <div class="space-y-6">
            <div>
              <label for="title" class="block text-sm font-medium text-gray-700">Service Title *</label>
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
              <label for="description" class="block text-sm font-medium text-gray-700">Description *</label>
              <textarea
                v-model="form.description"
                id="description"
                rows="4"
                required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                :class="{ 'border-red-500': errors.description }"
              ></textarea>
              <p v-if="errors.description" class="mt-1 text-sm text-red-600">{{ errors.description }}</p>
            </div>

            <div>
              <label for="icon" class="block text-sm font-medium text-gray-700">Icon Class (Optional)</label>
              <input
                v-model="form.icon"
                type="text"
                id="icon"
                placeholder="e.g., fas fa-laptop-code"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                :class="{ 'border-red-500': errors.icon }"
              />
              <p class="mt-1 text-sm text-gray-500">Font Awesome or other icon class names</p>
              <p v-if="errors.icon" class="mt-1 text-sm text-red-600">{{ errors.icon }}</p>
            </div>

            <div>
              <label for="image" class="block text-sm font-medium text-gray-700">Service Image</label>
              <div v-if="service.image" class="mb-3">
                <p class="text-sm text-gray-600 mb-2">Current image:</p>
                <img :src="`/storage/${service.image}`" :alt="service.title" class="h-32 w-32 object-cover rounded-lg" />
              </div>
              <input
                @change="handleFileChange"
                type="file"
                id="image"
                accept="image/*"
                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100"
              />
              <p class="mt-1 text-sm text-gray-500">Upload a new image to replace the current one (JPEG, PNG, JPG, GIF - Max: 2MB)</p>
              <p v-if="errors.image" class="mt-1 text-sm text-red-600">{{ errors.image }}</p>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
              <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-700">Sort Order</label>
                <input
                  v-model.number="form.sort_order"
                  type="number"
                  id="sort_order"
                  min="0"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                  :class="{ 'border-red-500': errors.sort_order }"
                />
                <p class="mt-1 text-sm text-gray-500">Lower numbers appear first</p>
                <p v-if="errors.sort_order" class="mt-1 text-sm text-red-600">{{ errors.sort_order }}</p>
              </div>

              <div class="flex items-center">
                <input
                  v-model="form.is_active"
                  type="checkbox"
                  id="is_active"
                  class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                />
                <label for="is_active" class="ml-2 block text-sm text-gray-900">
                  Active (visible on website)
                </label>
              </div>
            </div>
          </div>
        </div>

        <div class="flex justify-end space-x-3">
          <Link href="/admin/services" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-400 transition duration-300">
            Cancel
          </Link>
          <button
            type="submit"
            :disabled="processing"
            class="bg-primary-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-primary-700 transition duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
          >
            <span v-if="processing">Updating...</span>
            <span v-else>Update Service</span>
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
  service: Object,
})

const form = useForm({
  title: props.service.title,
  description: props.service.description,
  icon: props.service.icon || '',
  image: null,
  sort_order: props.service.sort_order,
  is_active: props.service.is_active,
})

const errors = ref({})
const processing = ref(false)

const handleFileChange = (event) => {
  const file = event.target.files[0]
  if (file) {
    form.image = file
  }
}

const submitForm = () => {
  processing.value = true
  errors.value = {}
  
  form.put(`/admin/services/${props.service.id}`, {
    forceFormData: true,
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