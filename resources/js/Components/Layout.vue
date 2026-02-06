<template>
  <div class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <nav ref="navbar" class="bg-white/95 backdrop-blur-md shadow-lg fixed w-full top-0 z-50 transition-all duration-300">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
          <div class="flex items-center nav-logo">
            <Link href="/" class="flex items-center group">
              <span class="text-3xl font-bold tracking-tight transition-transform duration-300 group-hover:scale-110">
                <span class="text-gray-800 inline-block transition-all duration-300 group-hover:text-primary-600">&lt;</span>
                <span class="bg-gradient-to-r from-primary-600 via-purple-600 to-secondary-600 bg-clip-text text-transparent animate-gradient">OPTIMUS</span>
                <span class="text-gray-800 inline-block transition-all duration-300 group-hover:text-secondary-600">&gt;</span>
              </span>
            </Link>
          </div>
          
          <div class="hidden md:flex items-center space-x-2">
            <Link 
              v-for="(item, index) in navItems" 
              :key="item.href"
              :href="item.href" 
              :class="['nav-item relative px-4 py-2 rounded-lg text-base font-semibold transition-all duration-300 group overflow-hidden',
                       $page.url === item.href ? 'text-primary-600' : 'text-gray-700 hover:text-primary-600']"
              :style="{ transitionDelay: `${index * 50}ms` }"
            >
              <span class="relative z-10">{{ item.label }}</span>
              <span class="absolute inset-0 bg-gradient-to-r from-primary-100 to-secondary-100 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left rounded-lg"></span>
              <span v-if="$page.url === item.href" class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-1/2 h-1 bg-gradient-to-r from-primary-600 to-secondary-600 rounded-full"></span>
            </Link>
          </div>

          <!-- Mobile menu button -->
          <div class="md:hidden flex items-center">
            <button @click="toggleMobileMenu" class="text-gray-700 hover:text-primary-600 p-2 rounded-lg hover:bg-gray-100 transition-all duration-300">
              <svg v-if="!mobileMenuOpen" class="h-6 w-6 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
              <svg v-else class="h-6 w-6 transition-transform duration-300 rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile menu -->
      <transition
        enter-active-class="transition duration-300 ease-out"
        enter-from-class="transform -translate-y-full opacity-0"
        enter-to-class="transform translate-y-0 opacity-100"
        leave-active-class="transition duration-200 ease-in"
        leave-from-class="transform translate-y-0 opacity-100"
        leave-to-class="transform -translate-y-full opacity-0"
      >
        <div v-show="mobileMenuOpen" class="md:hidden bg-white border-t shadow-lg">
          <div class="px-4 pt-4 pb-6 space-y-2">
            <Link 
              v-for="item in navItems" 
              :key="item.href"
              :href="item.href" 
              @click="mobileMenuOpen = false"
              :class="['block px-4 py-3 rounded-lg text-base font-semibold transition-all duration-300',
                       $page.url === item.href 
                         ? 'bg-gradient-to-r from-primary-600 to-secondary-600 text-white' 
                         : 'text-gray-700 hover:bg-gradient-to-r hover:from-primary-100 hover:to-secondary-100 hover:text-primary-600']"
            >
              {{ item.label }}
            </Link>
          </div>
        </div>
      </transition>
    </nav>

    <!-- Spacer for fixed navbar -->
    <div class="h-20"></div>

    <!-- Main Content -->
    <main class="page-content">
      <slot />
    </main>

    <!-- Footer -->
    <footer ref="footer" class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white relative overflow-hidden">
      <!-- Animated Background Elements -->
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-64 h-64 bg-primary-500 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-secondary-500 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
      </div>

      <div class="relative max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
          <div class="col-span-1 md:col-span-2 footer-section">
            <div class="mb-6">
              <span class="text-4xl font-bold tracking-tight">
                <span class="text-gray-300">&lt;</span>
                <span class="bg-gradient-to-r from-yellow-400 via-pink-500 to-purple-500 bg-clip-text text-transparent">OPTIMUS</span>
                <span class="text-gray-300">&gt;</span>
              </span>
            </div>
            <p class="text-gray-300 mb-6 leading-relaxed text-lg">
              Leading provider of web application development, mobile apps, digital marketing, 
              business solutions, and hardware solutions. Transform your business with cutting-edge technology.
            </p>
            <div class="flex space-x-4">
              <a v-if="$page.props.globalSettings?.facebook_url" :href="$page.props.globalSettings.facebook_url" target="_blank" 
                 class="social-icon w-12 h-12 rounded-full bg-gray-800 flex items-center justify-center text-gray-300 hover:bg-gradient-to-r hover:from-primary-600 hover:to-secondary-600 hover:text-white transition-all duration-300 transform hover:scale-110 hover:-translate-y-1">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
              </a>
              <a v-if="$page.props.globalSettings?.twitter_url" :href="$page.props.globalSettings.twitter_url" target="_blank" 
                 class="social-icon w-12 h-12 rounded-full bg-gray-800 flex items-center justify-center text-gray-300 hover:bg-gradient-to-r hover:from-primary-600 hover:to-secondary-600 hover:text-white transition-all duration-300 transform hover:scale-110 hover:-translate-y-1">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                </svg>
              </a>
              <a v-if="$page.props.globalSettings?.linkedin_url" :href="$page.props.globalSettings.linkedin_url" target="_blank" 
                 class="social-icon w-12 h-12 rounded-full bg-gray-800 flex items-center justify-center text-gray-300 hover:bg-gradient-to-r hover:from-primary-600 hover:to-secondary-600 hover:text-white transition-all duration-300 transform hover:scale-110 hover:-translate-y-1">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                </svg>
              </a>
              <a v-if="$page.props.globalSettings?.instagram_url" :href="$page.props.globalSettings.instagram_url" target="_blank" 
                 class="social-icon w-12 h-12 rounded-full bg-gray-800 flex items-center justify-center text-gray-300 hover:bg-gradient-to-r hover:from-primary-600 hover:to-secondary-600 hover:text-white transition-all duration-300 transform hover:scale-110 hover:-translate-y-1">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
              </a>
            </div>
          </div>
          
          <div class="footer-section">
            <h3 class="text-xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-pink-500">Quick Links</h3>
            <ul class="space-y-3">
              <li v-for="item in navItems" :key="item.href">
                <Link :href="item.href" class="text-gray-300 hover:text-white hover:translate-x-2 inline-block transition-all duration-300 group">
                  <span class="inline-block mr-2 text-primary-400 group-hover:text-yellow-400 transition-colors duration-300">→</span>
                  {{ item.label }}
                </Link>
              </li>
            </ul>
          </div>
          
          <div class="footer-section">
            <h3 class="text-xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">Contact Info</h3>
            <div class="space-y-4">
              <div class="flex items-start group">
                <svg class="w-6 h-6 text-primary-400 mr-3 mt-1 group-hover:text-yellow-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <div>
                  <p class="text-sm text-gray-400">Email</p>
                  <p class="text-gray-200">{{ $page.props.globalSettings?.contact_email || 'info@optimussoftware.com' }}</p>
                </div>
              </div>
              <div class="flex items-start group">
                <svg class="w-6 h-6 text-primary-400 mr-3 mt-1 group-hover:text-yellow-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <div>
                  <p class="text-sm text-gray-400">Phone</p>
                  <p class="text-gray-200">{{ $page.props.globalSettings?.contact_phone || '+880 1234 567890' }}</p>
                </div>
              </div>
              <div class="flex items-start group">
                <svg class="w-6 h-6 text-primary-400 mr-3 mt-1 group-hover:text-yellow-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <div>
                  <p class="text-sm text-gray-400">Address</p>
                  <p class="text-gray-200">{{ $page.props.globalSettings?.contact_address || 'Dhaka, Bangladesh' }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="pt-8 border-t border-gray-700">
          <div class="flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-400 text-center md:text-left mb-4 md:mb-0">
              &copy; 2026 <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-400 to-secondary-400 font-semibold">Optimus Software Limited</span>. All rights reserved.
            </p>
            <div class="flex space-x-6 text-sm">
              <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Privacy Policy</a>
              <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Terms of Service</a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { Link } from '@inertiajs/vue3'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

gsap.registerPlugin(ScrollTrigger)

const mobileMenuOpen = ref(false)
const navbar = ref(null)
const footer = ref(null)

const navItems = [
  { label: 'Home', href: '/' },
  { label: 'About', href: '/about' },
  { label: 'Services', href: '/services' },
  { label: 'Careers', href: '/careers' },
  { label: 'Contact', href: '/contact' }
]

const toggleMobileMenu = () => {
  mobileMenuOpen.value = !mobileMenuOpen.value
}

onMounted(() => {
  // Navbar animation on load
  gsap.from('.nav-logo', {
    opacity: 0,
    x: -50,
    duration: 0.8,
    ease: 'power3.out'
  })

  gsap.from('.nav-item', {
    opacity: 0,
    y: -20,
    duration: 0.6,
    stagger: 0.1,
    ease: 'power3.out',
    delay: 0.3
  })

  // Navbar scroll effect
  let lastScroll = 0
  const handleScroll = () => {
    const currentScroll = window.pageYOffset
    
    if (currentScroll > 100) {
      navbar.value?.classList.add('shadow-2xl')
      navbar.value?.classList.remove('shadow-lg')
    } else {
      navbar.value?.classList.add('shadow-lg')
      navbar.value?.classList.remove('shadow-2xl')
    }

    // Hide/show navbar on scroll
    if (currentScroll > lastScroll && currentScroll > 500) {
      gsap.to(navbar.value, { y: -100, duration: 0.3, ease: 'power2.out' })
    } else {
      gsap.to(navbar.value, { y: 0, duration: 0.3, ease: 'power2.out' })
    }
    
    lastScroll = currentScroll
  }

  window.addEventListener('scroll', handleScroll)

  // Footer animation
  gsap.utils.toArray('.footer-section').forEach((section, index) => {
    gsap.from(section, {
      scrollTrigger: {
        trigger: section,
        start: 'top 90%',
      },
      opacity: 0,
      y: 50,
      duration: 0.8,
      delay: index * 0.2,
      ease: 'power3.out'
    })
  })

  gsap.from('.social-icon', {
    scrollTrigger: {
      trigger: '.social-icon',
      start: 'top 90%',
    },
    opacity: 0,
    scale: 0,
    duration: 0.5,
    stagger: 0.1,
    ease: 'back.out(1.7)'
  })

  // Cleanup
  return () => {
    window.removeEventListener('scroll', handleScroll)
  }
})

onUnmounted(() => {
  ScrollTrigger.getAll().forEach(trigger => trigger.kill())
})
</script>

<style scoped>
@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}

.animate-gradient {
  background-size: 200% 200%;
  animation: gradient 3s ease infinite;
}

/* Smooth page transitions */
.page-content {
  animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
