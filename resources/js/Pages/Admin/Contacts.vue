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
            <h1 class="text-xl font-semibold text-gray-900">Customer Messages</h1>
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
      <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Contact Messages</h2>
        <p class="text-gray-600">Manage customer inquiries and messages</p>
      </div>

      <div v-if="$page.props.flash?.success" class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        {{ $page.props.flash.success }}
      </div>

      <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <ul class="divide-y divide-gray-200">
          <li v-for="contact in contacts.data" :key="contact.id" class="px-6 py-4">
            <div class="flex items-start justify-between">
              <div class="flex items-start space-x-4 flex-1">
                <div class="flex-shrink-0">
                  <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                    <span class="text-sm font-medium text-gray-700">{{ contact.name.charAt(0).toUpperCase() }}</span>
                  </div>
                </div>
                
                <div class="flex-1 min-w-0">
                  <div class="flex items-center space-x-2 mb-1">
                    <p class="text-lg font-medium text-gray-900">{{ contact.name }}</p>
                    <span v-if="!contact.is_read" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                      New
                    </span>
                  </div>
                  
                  <div class="text-sm text-gray-600 space-y-1">
                    <p><span class="font-medium">Email:</span> {{ contact.email }}</p>
                    <p v-if="contact.phone"><span class="font-medium">Phone:</span> {{ contact.phone }}</p>
                    <p><span class="font-medium">Subject:</span> {{ contact.subject }}</p>
                  </div>
                  
                  <div class="mt-3">
                    <p class="text-gray-800">{{ contact.message }}</p>
                  </div>
                  
                  <div class="mt-3 text-sm text-gray-500">
                    <p>Received: {{ new Date(contact.created_at).toLocaleString() }}</p>
                  </div>
                </div>
              </div>
              
              <div class="flex items-center space-x-2 ml-4">
                <button 
                  v-if="!contact.is_read"
                  @click="markAsRead(contact.id)"
                  class="text-primary-600 hover:text-primary-700 font-medium text-sm"
                >
                  Mark as Read
                </button>
                <span v-else class="text-green-600 text-sm font-medium">Read</span>
              </div>
            </div>
          </li>
          <li v-if="contacts.data.length === 0" class="px-6 py-8 text-center text-gray-500">
            No messages found.
          </li>
        </ul>
      </div>

      <!-- Pagination -->
      <div v-if="contacts.links && contacts.links.length > 3" class="mt-6 flex justify-center">
        <nav class="flex items-center space-x-2">
          <Link 
            v-for="link in contacts.links" 
            :key="link.label"
            :href="link.url"
            v-html="link.label"
            :class="[
              'px-3 py-2 text-sm font-medium rounded-md',
              link.active 
                ? 'bg-primary-600 text-white' 
                : link.url 
                  ? 'text-gray-700 hover:text-primary-600 hover:bg-gray-50' 
                  : 'text-gray-400 cursor-not-allowed'
            ]"
          />
        </nav>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'

defineProps({
  contacts: Object,
})

const markAsRead = (contactId) => {
  router.patch(`/admin/contacts/${contactId}/read`, {}, {
    preserveScroll: true,
  })
}
</script>