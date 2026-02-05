<template>
  <div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow p-8">
      <h1 class="text-3xl font-bold mb-4">Debug Page</h1>
      <p class="text-lg mb-4">{{ message }}</p>
      <p class="text-gray-600">Timestamp: {{ timestamp }}</p>
      <div class="mt-8">
        <h2 class="text-xl font-semibold mb-2">Vue is working!</h2>
        <p>If you can see this, Inertia.js and Vue.js are properly configured.</p>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  message: String,
  timestamp: String,
})
</script>
