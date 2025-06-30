<template>
  <v-app>
   <div class="sticky-header-group" ref="headerGroup">
      <NavigationHeader class="header" />
      <MedicalNavigatorMenu 
        :style="{'--navbar-height': navbarHeight + 'px'}" ref="navbar"
        class="nav-bar" 
        :mobile-drawer="mobileDrawer"
        @update:mobile-drawer="mobileDrawer = $event"
      />
      <BreadcrumbNavigation class="breadcrumb" ref="breadcrumb" />
    </div>
    
    <NavigationDrawer 
  v-model="mobileDrawer" 
  :navbar-height="navbarHeight"
  :breadcrumb-height="breadcrumbHeight"
/>
    
    <div class="app-container">
      <v-main class="main-content">
        <router-view class="page-content" />
      </v-main>
    </div>

    <!-- Boutons d'actions secondaires -->
    <div class="action-buttons-container" :class="{ 'open': isActionsOpen }">
      <v-fab-transition v-for="(action, index) in actions" :key="index">
        <v-btn
          fab
          dark
          :color="action.color"
          @click="handleActionClick(action)"
          class="action-btn"
          :style="getActionButtonStyle(index)"
          :aria-label="action.label"
          size="x-small"
          elevation="4"
        >
          <v-icon>{{ action.icon }}</v-icon>
          <v-tooltip
            activator="parent"
            location="left"
            transition="slide-x-reverse-transition"
          >
            {{ action.label }}
          </v-tooltip>
        </v-btn>
      </v-fab-transition>
    </div>

    <!-- Bouton pour monter progressivement (up) - Desktop seulement -->
    <template v-if="isDesktop">
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
          aria-label="Langsam wieder hochgehen "
          size="x-small"
          elevation="4"
        >
          <v-icon>mdi-chevron-up</v-icon>
          <v-tooltip activator="parent" location="left">hochgehen</v-tooltip>
        </v-btn>
      </v-fab-transition>
    </template>

    <!-- Bouton d'actions flottant principal -->
    <v-fab-transition>
      <v-btn
        fab
        dark
        fixed
        bottom
        right
        @click="toggleActionButtons"
        class="action-main-btn"
        aria-label="Schnellzugriffe "
        size="x-small"
        elevation="4"
      >
        <v-icon>{{ isActionsOpen ? 'mdi-close' : 'mdi-plus' }}</v-icon>
        <v-tooltip activator="parent" location="left">
          {{ isActionsOpen ? 'schließen' : 'Schnellzugriffe ' }}
        </v-tooltip>
      </v-btn>
    </v-fab-transition>

    <!-- Bouton pour descendre progressivement (down) - Desktop seulement -->
    <template v-if="isDesktop">
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
          aria-label="Langsam hinuntergehen"
          size="x-small"
          elevation="4"
        >
          <v-icon>mdi-chevron-down</v-icon>
          <v-tooltip activator="parent" location="left">untergehen</v-tooltip>
        </v-btn>
      </v-fab-transition>
    </template>

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

const breadcrumb = ref(null)
const breadcrumbHeight = ref(0)

// Détection d'appareil
const isDesktop = ref(false)
const isTablet = ref(false)
const isMobile = ref(false)

const updateDeviceDetection = () => {
  const width = window.innerWidth
  isMobile.value = width < 768  // Mobile: <768px
  isTablet.value = width >= 768 && width < 1024  // Tablette: 768-1023px
  isDesktop.value = width >= 1024  // Desktop: ≥1024px
}

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

  scrollInterval = setInterval(scrollStep, 16)
  accelerationInterval = setInterval(() => {
    scrollSpeed = Math.min(scrollSpeed + accelerationRate, maxSpeed)
  }, accelerationDelay)
}

const stopContinuousScroll = () => {
  if (scrollInterval) clearInterval(scrollInterval)
  if (accelerationInterval) clearInterval(accelerationInterval)
  scrollSpeed = 8
  scrollInterval = null
  accelerationInterval = null
}

const handleResize = () => {
  screenWidth.value = window.innerWidth
  updateDeviceDetection()
  if (screenWidth.value < mobileBreakpoint) {
    mobileDrawer.value = false
  }
  breadcrumbHeight.value = breadcrumb.value?.$el.clientHeight || 0
}

// Actions flottantes
const isActionsOpen = ref(false)
const actions = ref([
  { icon: 'mdi-email', color: 'red-darken-1', label: 'Email', action: 'email' },
  { icon: 'mdi-phone', color: 'green-darken-1', label: 'Beratung', action: 'phone' },
  { icon: 'mdi-cart', color: 'blue-darken-1', label: 'Warenkorb', action: 'cart' },
  { icon: 'mdi-heart', color: 'purple-darken-1', label: 'Merkliste', action: 'merkliste'},
  { icon: 'mdi-cart-arrow-down', color: 'grey darken-4', label: 'Online Shop', action: 'shop'}
])

const toggleActionButtons = () => {
  isActionsOpen.value = !isActionsOpen.value
}

const handleActionClick = (action) => {
  console.log(`Action: ${action.action}`)
  toggleActionButtons()
}

const getActionButtonStyle = (index) => {
  if (!isActionsOpen.value) return {}
  const verticalSpacing = 60
  const y = -((index + 1) * verticalSpacing)
  return {
    transform: `translateY(${y}px)`,
    opacity: 1,
    transition: `all 0.3s ease ${index * 0.1}s`,
    position: 'absolute'
  }
}

const navbar = ref(null)
const navbarHeight = ref(0)

onMounted(() => {
  updateDeviceDetection()
  window.addEventListener('resize', handleResize)
  navbarHeight.value = navbar.value.$el.clientHeight,
  breadcrumbHeight.value = breadcrumb.value?.$el.clientHeight || 0
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
  z-index: 1300;
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
  width: 40px !important;
  height: 40px !important;
  min-width: 40px !important;
  min-height: 40px !important;
  padding: 0 !important;
  z-index: 9997;
  opacity: 0.9;
  transition: all 0.3s ease;
  border-radius: 50%;
  border: solid 1px #9a9a9b;
}

.scroll-btn.down {
  bottom: 24px;
}

.scroll-btn.up {
  bottom: 104px;
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

/* Bouton principal (+) */
.action-main-btn {
  position: fixed;
  bottom: 64px;
  right: 24px;
  width: 40px !important;
  height: 40px !important;
  min-width: 40px !important;
  min-height: 40px !important;
  padding: 0 !important;
  z-index: 9999;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  border-radius: 50%;
  border: solid 1px #9a9a9b;
}

.action-main-btn:hover {
  transform: scale(1.1);
  box-shadow: 0 6px 16px rgba(0,0,0,0.3);
}

.action-buttons-container {
  position: fixed;
  bottom: 120px;
  right: 24px;
  width: 40px;
  height: auto;
  z-index: 9998;
  pointer-events: none;
  display: flex;
  flex-direction: column-reverse;
  align-items: center;
  gap: 12px;
}

/* Boutons d'action secondaires */
.action-btn {
  position: relative;
  width: 40px !important;
  height: 40px !important;
  min-width: 40px !important;
  min-height: 40px !important;
  padding: 0 !important;
  opacity: 0;
  pointer-events: none;
  transform: translateY(20px);
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  margin-bottom: 8px;
  border-radius: 50%;
}

.action-buttons-container.open .action-btn {
  opacity: 1;
  pointer-events: auto;
  transform: translateY(0);
  width: 40px;
  height: 40px;
  border-radius: 50%;
}

.action-btn:hover {
  box-shadow: 0 6px 12px rgba(0,0,0,0.3) !important;
  z-index: 9999;
}

.v-tooltip__content {
  background: rgba(0, 0, 0, 0.8) !important;
  font-size: 0.8rem !important;
  padding: 8px 12px !important;
  border-radius: 4px !important;
}

.slide-x-reverse-transition-enter-active,
.slide-x-reverse-transition-leave-active {
  transition: all 0.3s ease !important;
}

/* Styles pour tablette (768px-1023px) */
@media (max-width: 1023px) {
  .scroll-btn.up,
  .scroll-btn.down {
    display: none !important;
    visibility: hidden !important;
    pointer-events: none !important;
  }
  
  .page-content {
    min-height: calc(100vh - 172px);
  }
  
  .action-main-btn {
    bottom: 24px !important;
  }
  
  .action-buttons-container {
    bottom: 90px !important;
  }
}

/* Styles pour mobile (<768px) */
@media (max-width: 767px) {
  .page-content {
    min-height: calc(100vh - 124px);
  }
  
  .action-main-btn {
    bottom: 16px !important;
    right: 16px;
  }
  
  .action-buttons-container {
    bottom: 70px !important;
    right: 16px;
  }
  
  .action-btn {
    width: 36px;
    height: 36px;
  }

  .v-tooltip__content {
    font-size: 0.7rem !important;
    padding: 6px 10px !important;
  }
}
</style>