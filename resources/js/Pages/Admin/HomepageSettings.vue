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
            <h1 class="text-xl font-semibold text-gray-900">Homepage Settings</h1>
          </div>
          <div class="flex items-center space-x-4">
            <Link href="/" class="text-gray-500 hover:text-gray-700">
              View Site
            </Link>
          </div>
        </div>
      </div>
    </nav>

    <div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
      <div v-if="$page.props.flash?.success" class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        {{ $page.props.flash.success }}
      </div>

      <form @submit.prevent="submitForm" class="space-y-8">
        <!-- Hero Section -->
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Hero Section</h3>
              <p class="mt-1 text-sm text-gray-500">
                Update the main hero section of your homepage.
              </p>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <div class="space-y-6">
                <div>
                  <label for="hero_title" class="block text-sm font-medium text-gray-700">Hero Title</label>
                  <input
                    v-model="form.hero_title"
                    type="text"
                    id="hero_title"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                    :class="{ 'border-red-500': errors.hero_title }"
                  />
                  <p v-if="errors.hero_title" class="mt-1 text-sm text-red-600">{{ errors.hero_title }}</p>
                </div>

                <div>
                  <label for="hero_description" class="block text-sm font-medium text-gray-700">Hero Description</label>
                  <textarea
                    v-model="form.hero_description"
                    id="hero_description"
                    rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                    :class="{ 'border-red-500': errors.hero_description }"
                  ></textarea>
                  <p v-if="errors.hero_description" class="mt-1 text-sm text-red-600">{{ errors.hero_description }}</p>
                </div>

                <div>
                  <label for="hero_image" class="block text-sm font-medium text-gray-700">Hero Image</label>
                  <div class="mt-1 flex items-center space-x-4">
                    <div v-if="settings?.hero_image" class="flex-shrink-0">
                      <img :src="`/storage/${settings.hero_image}`" alt="Current hero image" class="h-20 w-20 object-cover rounded-lg" />
                    </div>
                    <input
                      @change="handleFileChange('hero_image', $event)"
                      type="file"
                      id="hero_image"
                      accept="image/*"
                      class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100"
                    />
                  </div>
                  <p v-if="errors.hero_image" class="mt-1 text-sm text-red-600">{{ errors.hero_image }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Hero Slider Images -->
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Hero Slider Images</h3>
              <p class="mt-1 text-sm text-gray-500">
                Upload 3-4 images for the hero slider. Images will transition automatically.
              </p>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <div class="space-y-6">
                <div v-for="i in 4" :key="i">
                  <label :for="`slider_image_${i}`" class="block text-sm font-medium text-gray-700">Slider Image {{ i }}</label>
                  <div class="mt-1 flex items-center space-x-4">
                    <div v-if="settings?.[`slider_image_${i}`]" class="flex-shrink-0">
                      <img :src="`/storage/${settings[`slider_image_${i}`]}`" :alt="`Slider image ${i}`" class="h-20 w-32 object-cover rounded-lg" />
                    </div>
                    <input
                      @change="handleFileChange(`slider_image_${i}`, $event)"
                      type="file"
                      :id="`slider_image_${i}`"
                      accept="image/*"
                      class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100"
                    />
                  </div>
                  <p v-if="errors[`slider_image_${i}`]" class="mt-1 text-sm text-red-600">{{ errors[`slider_image_${i}`] }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Hero Slider Videos -->
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Hero Slider Videos</h3>
              <p class="mt-1 text-sm text-gray-500">
                Upload 3-4 MP4 videos for the hero slider. Videos will play automatically with smooth transitions.
              </p>
              <p class="mt-2 text-xs text-gray-400">
                Max file size: 50MB per video
              </p>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <div class="space-y-6">
                <div v-for="i in 4" :key="i">
                  <label :for="`slider_video_${i}`" class="block text-sm font-medium text-gray-700">Slider Video {{ i }}</label>
                  <div class="mt-1 flex items-center space-x-4">
                    <div v-if="settings?.[`slider_video_${i}`]" class="flex-shrink-0">
                      <video :src="`/storage/${settings[`slider_video_${i}`]}`" class="h-20 w-32 object-cover rounded-lg" muted></video>
                      <p class="text-xs text-gray-500 mt-1">Current video</p>
                    </div>
                    <input
                      @change="handleFileChange(`slider_video_${i}`, $event)"
                      type="file"
                      :id="`slider_video_${i}`"
                      accept="video/mp4,video/mov,video/avi,video/wmv"
                      class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100"
                    />
                  </div>
                  <p v-if="errors[`slider_video_${i}`]" class="mt-1 text-sm text-red-600">{{ errors[`slider_video_${i}`] }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- About Section -->
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <h3 class="text-lg font-medium leading-6 text-gray-900">About Section</h3>
              <p class="mt-1 text-sm text-gray-500">
                Update the about section content.
              </p>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <div class="space-y-6">
                <div>
                  <label for="about_title" class="block text-sm font-medium text-gray-700">About Title</label>
                  <input
                    v-model="form.about_title"
                    type="text"
                    id="about_title"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                    :class="{ 'border-red-500': errors.about_title }"
                  />
                  <p v-if="errors.about_title" class="mt-1 text-sm text-red-600">{{ errors.about_title }}</p>
                </div>

                <div>
                  <label for="about_description" class="block text-sm font-medium text-gray-700">About Description</label>
                  <textarea
                    v-model="form.about_description"
                    id="about_description"
                    rows="6"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                    :class="{ 'border-red-500': errors.about_description }"
                  ></textarea>
                  <p v-if="errors.about_description" class="mt-1 text-sm text-red-600">{{ errors.about_description }}</p>
                </div>

                <div>
                  <label for="about_image" class="block text-sm font-medium text-gray-700">About Image</label>
                  <div class="mt-1 flex items-center space-x-4">
                    <div v-if="settings?.about_image" class="flex-shrink-0">
                      <img :src="`/storage/${settings.about_image}`" alt="Current about image" class="h-20 w-20 object-cover rounded-lg" />
                    </div>
                    <input
                      @change="handleFileChange('about_image', $event)"
                      type="file"
                      id="about_image"
                      accept="image/*"
                      class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100"
                    />
                  </div>
                  <p v-if="errors.about_image" class="mt-1 text-sm text-red-600">{{ errors.about_image }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Contact Information -->
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Contact Information</h3>
              <p class="mt-1 text-sm text-gray-500">
                Update contact details displayed on the website.
              </p>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                  <label for="contact_email" class="block text-sm font-medium text-gray-700">Email</label>
                  <input
                    v-model="form.contact_email"
                    type="email"
                    id="contact_email"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                    :class="{ 'border-red-500': errors.contact_email }"
                  />
                  <p v-if="errors.contact_email" class="mt-1 text-sm text-red-600">{{ errors.contact_email }}</p>
                </div>

                <div>
                  <label for="contact_phone" class="block text-sm font-medium text-gray-700">Phone</label>
                  <input
                    v-model="form.contact_phone"
                    type="tel"
                    id="contact_phone"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                    :class="{ 'border-red-500': errors.contact_phone }"
                  />
                  <p v-if="errors.contact_phone" class="mt-1 text-sm text-red-600">{{ errors.contact_phone }}</p>
                </div>

                <div class="sm:col-span-2">
                  <label for="contact_address" class="block text-sm font-medium text-gray-700">Address</label>
                  <textarea
                    v-model="form.contact_address"
                    id="contact_address"
                    rows="3"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                    :class="{ 'border-red-500': errors.contact_address }"
                  ></textarea>
                  <p v-if="errors.contact_address" class="mt-1 text-sm text-red-600">{{ errors.contact_address }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Social Media Links -->
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Social Media</h3>
              <p class="mt-1 text-sm text-gray-500">
                Add your social media profile links.
              </p>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                  <label for="facebook_url" class="block text-sm font-medium text-gray-700">Facebook URL</label>
                  <input
                    v-model="form.facebook_url"
                    type="url"
                    id="facebook_url"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                    :class="{ 'border-red-500': errors.facebook_url }"
                  />
                  <p v-if="errors.facebook_url" class="mt-1 text-sm text-red-600">{{ errors.facebook_url }}</p>
                </div>

                <div>
                  <label for="twitter_url" class="block text-sm font-medium text-gray-700">Twitter URL</label>
                  <input
                    v-model="form.twitter_url"
                    type="url"
                    id="twitter_url"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                    :class="{ 'border-red-500': errors.twitter_url }"
                  />
                  <p v-if="errors.twitter_url" class="mt-1 text-sm text-red-600">{{ errors.twitter_url }}</p>
                </div>

                <div>
                  <label for="linkedin_url" class="block text-sm font-medium text-gray-700">LinkedIn URL</label>
                  <input
                    v-model="form.linkedin_url"
                    type="url"
                    id="linkedin_url"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                    :class="{ 'border-red-500': errors.linkedin_url }"
                  />
                  <p v-if="errors.linkedin_url" class="mt-1 text-sm text-red-600">{{ errors.linkedin_url }}</p>
                </div>

                <div>
                  <label for="instagram_url" class="block text-sm font-medium text-gray-700">Instagram URL</label>
                  <input
                    v-model="form.instagram_url"
                    type="url"
                    id="instagram_url"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500"
                    :class="{ 'border-red-500': errors.instagram_url }"
                  />
                  <p v-if="errors.instagram_url" class="mt-1 text-sm text-red-600">{{ errors.instagram_url }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
          <button
            type="submit"
            :disabled="processing"
            class="bg-primary-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 disabled:opacity-50 disabled:cursor-not-allowed"
          >
            <span v-if="processing">Saving...</span>
            <span v-else>Save Changes</span>
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
  settings: Object,
})

const form = useForm({
  hero_title: props.settings?.hero_title || 'Welcome to Optimus Software Limited',
  hero_description: props.settings?.hero_description || '',
  hero_image: null,
  slider_image_1: null,
  slider_image_2: null,
  slider_image_3: null,
  slider_image_4: null,
  slider_video_1: null,
  slider_video_2: null,
  slider_video_3: null,
  slider_video_4: null,
  about_title: props.settings?.about_title || 'About Us',
  about_description: props.settings?.about_description || '',
  about_image: null,
  contact_email: props.settings?.contact_email || '',
  contact_phone: props.settings?.contact_phone || '',
  contact_address: props.settings?.contact_address || '',
  facebook_url: props.settings?.facebook_url || '',
  twitter_url: props.settings?.twitter_url || '',
  linkedin_url: props.settings?.linkedin_url || '',
  instagram_url: props.settings?.instagram_url || '',
})

const errors = ref({})
const processing = ref(false)

const handleFileChange = (field, event) => {
  const file = event.target.files[0]
  if (file) {
    form[field] = file
  }
}

const submitForm = () => {
  processing.value = true
  errors.value = {}
  
  form.post('/admin/homepage-settings', {
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