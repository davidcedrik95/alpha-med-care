<template>
  <v-app>
    <NavigationDrawer v-model="mobileDrawer" />
    
    <div class="sticky-header-group">
      <NavigationHeader class="header" />
      <MedicalNavigatorMenu class="nav-bar" @toggle-drawer="toggleDrawer" />
      <BreadcrumbNavigation class="breadcrumb" />
    </div>
    
    <div class="app-container">
      <v-main class="main-content">
        <router-view class="page-content" />
      </v-main>
    </div>

    <!-- Bouton pour descendre progressivement -->
    <v-fab-transition>
      <v-btn
        fab
        dark
        fixed
        bottom
        right
        @mousedown="startContinuousScroll('down')"
        @mouseup="stopContinuousScroll"
        @mouseleave="stopContinuousScroll"
        @touchstart="startContinuousScroll('down')"
        @touchend="stopContinuousScroll"
        class="scroll-btn down"
        aria-label="Descendre progressivement"
        size="x-small"
        elevation="4"
      >
        <v-icon>mdi-chevron-down</v-icon>
      </v-btn>
    </v-fab-transition>

    <!-- Bouton pour monter progressivement -->
    <v-fab-transition>
      <v-btn
        fab
        dark
        fixed
        bottom
        right
        @mousedown="startContinuousScroll('up')"
        @mouseup="stopContinuousScroll"
        @mouseleave="stopContinuousScroll"
        @touchstart="startContinuousScroll('up')"
        @touchend="stopContinuousScroll"
        class="scroll-btn up"
        aria-label="Remonter progressivement"
        size="x-small"
        elevation="4"
      >
        <v-icon>mdi-chevron-up</v-icon>
      </v-btn>
    </v-fab-transition>

    <NavigationFooter ref="footer" />
  </v-app>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import NavigationHeader from './components/nav/NavigationHeader.vue'
import MedicalNavigatorMenu from './components/nav/MedicalNavigatorMenu.vue'
import NavigationDrawer from './components/nav/NavigationDrawer.vue'
import NavigationFooter from './components/nav/NavigationFooter.vue'
import BreadcrumbNavigation from './components/nav/BreadcrumbNavigation.vue'

const mobileDrawer = ref(false)
const screenWidth = ref(window.innerWidth)
const mobileBreakpoint = 960
const footer = ref(null)

// Gestion du défilement continu
let scrollInterval = null
let scrollSpeed = 8
let accelerationInterval = null
let maxSpeed = 30
let accelerationRate = 1
let accelerationDelay = 100

const startContinuousScroll = (direction) => {
  stopContinuousScroll()
  
  const scrollStep = () => {
    const currentPosition = window.scrollY
    const maxPosition = document.documentElement.scrollHeight - window.innerHeight
    
    if (direction === 'down' && currentPosition < maxPosition) {
      window.scrollBy(0, scrollSpeed)
    } else if (direction === 'up' && currentPosition > 0) {
      window.scrollBy(0, -scrollSpeed)
    } else {
      stopContinuousScroll()
    }
  }

  scrollInterval = setInterval(scrollStep, 16) // ~60fps

  // Accélération progressive
  accelerationInterval = setInterval(() => {
    scrollSpeed = Math.min(scrollSpeed + accelerationRate, maxSpeed)
  }, accelerationDelay)
}

const stopContinuousScroll = () => {
  if (scrollInterval) {
    clearInterval(scrollInterval)
    scrollInterval = null
  }
  if (accelerationInterval) {
    clearInterval(accelerationInterval)
    accelerationInterval = null
  }
  scrollSpeed = 8 // Réinitialiser la vitesse
}

const toggleDrawer = () => {
  mobileDrawer.value = !mobileDrawer.value
}

const handleResize = () => {
  screenWidth.value = window.innerWidth
  if (screenWidth.value < mobileBreakpoint) {
    mobileDrawer.value = false
  }
}

onMounted(() => {
  window.addEventListener('resize', handleResize)
})

onUnmounted(() => {
  window.removeEventListener('resize', handleResize)
  stopContinuousScroll()
})
</script>

<style scoped>
.sticky-header-group {
  position: sticky;
  top: 0;
  z-index: 1000;
  background: white;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.app-container {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

.main-content {
  flex: 1;
  padding: 0;
}

.page-content {
  min-height: calc(100vh - 180px);
  padding: 16px;
}

/* Boutons de défilement */
.scroll-btn {
  position: fixed;
  right: 24px;
  width: 40px;
  height: 40px;
  z-index: 9999;
  opacity: 0.9;
  transition: all 0.3s ease;
  border-radius: 5px;
  border: solid 1px #9a9a9b;

  
}

.scroll-btn.down {
  bottom: 24px;
}

.scroll-btn.up {
  bottom: 80px; /* Position au-dessus du bouton descendant */
}

.scroll-btn:active {
  transform: scale(0.95);
  opacity: 1;
}

.scroll-btn:hover {
  opacity: 1;
  transform: scale(1.05);
  box-shadow: 0 4px 12px rgba(0,0,0,0.25) !important;
}

@media (max-width: 960px) {
  .page-content {
    min-height: calc(100vh - 172px);
  }
  
  .scroll-btn {
    right: 20px;
    width: 36px;
    height: 36px;
  }
  
  .scroll-btn.down {
    bottom: 20px;
  }
  
  .scroll-btn.up {
    bottom: 72px;
  }
}

@media (max-width: 600px) {
  .page-content {
    min-height: calc(100vh - 124px);
  }
  
  .scroll-btn {
    right: 16px;
    width: 32px;
    height: 32px;
  }
  
  .scroll-btn.down {
    bottom: 16px;
  }
  
  .scroll-btn.up {
    bottom: 64px;
  }
}
</style>