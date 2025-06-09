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
      </v-btn>
    </v-fab-transition>
  </div>
<!-- Bouton pour monter progressivement (up) -->
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

<!-- Bouton d'actions flottant principal (au milieu) -->
<v-fab-transition>
   <v-btn
    fab
    dark
    fixed
    bottom
    right
    color="teal-darken-2"
    @click="toggleActionButtons"
    class="action-main-btn"
    aria-label="Actions rapides"
    size="x-small"
    elevation="4"
  >
    <v-icon>{{ isActionsOpen ? 'mdi-close' : 'mdi-plus' }}</v-icon>
  </v-btn>
</v-fab-transition>

<!-- Bouton pour descendre progressivement (down) -->
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

// Actions flottantes
const isActionsOpen = ref(false)

const actions = ref([
  { icon: 'mdi-email', color: 'red-darken-1', label: 'Email', action: 'email' },
  { icon: 'mdi-phone', color: 'green-darken-1', label: 'Contact', action: 'phone' },
  { icon: 'mdi-cart', color: 'blue-darken-1', label: 'Achat', action: 'cart' },
  { icon: 'mdi mdi-heart', color: 'purple-darken-1', label: 'Partage', action: 'share' }
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
  
  const totalButtons = actions.value.length
  const startAngle = -160 // Commence à 120° à gauche
  const endAngle = -70 // Termine à 60° à gauche
  const angle = startAngle + (index * (endAngle - startAngle) / (totalButtons - 1))
  const radius = 120 // Augmentez ce rayon pour plus d'espace
  
  // Calcul des positions avec un peu plus d'espace
  const x = Math.cos(angle * Math.PI / 180) * radius
  const y = Math.sin(angle * Math.PI / 180) * radius - 20 // Ajustez ce décalage vertical
  
  return {
    transform: `translate(calc(${x}px - 50%), calc(${y}px - 50%))`,
    opacity: 1,
    transition: `all 0.3s ease ${index * 0.1}s`,
    position: 'absolute'
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
  z-index: 9997; /* Sous les boutons d'action */
  opacity: 0.9;
  transition: all 0.3s ease;
  border-radius: 5px;
  border: solid 1px #9a9a9b;
}

.scroll-btn.down {
  bottom: 24px;
}

.scroll-btn.up {
  bottom: 104px; /* Position au-dessus du bouton descendant */
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

/* Bouton principal */
.action-main-btn {
  position: fixed;
  bottom: 64px;
  right: 24px;
  width: 40px;
  height: 40px;
  z-index: 9999; /* Au-dessus de tout */
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.action-main-btn:hover {
  transform: scale(1.1);
}

/* Conteneur des boutons secondaires */
.action-buttons-container {
  position: fixed;
  bottom: 80px;
  right: 50px;
  width: 0;
  height: 0;
  z-index: 9998; /* Juste en dessous du bouton principal */
}


/* Boutons secondaires */
.action-btn {
  position: absolute;
  width: 40px;
  height: 40px;
  bottom: 0;
  right: 0;
  opacity: 0;
  pointer-events: none;
  transform-origin: center;
  margin: 8px; /* Ajoute une marge supplémentaire */
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
}

.action-buttons-container.open .action-btn {
  pointer-events: auto;
}

/* Responsive */
@media (max-width: 960px) {
  .page-content {
    min-height: calc(100vh - 172px);
  }
  
 .scroll-btn {
    opacity: 0 !important;
    pointer-events: none !important;
  }
  
  .action-main-btn,
  .action-buttons-container {
     bottom: 70px;
    right: 40px;
  }
  
  .action-main-btn {
    width: 48px;
    height: 48px;
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
  
  .action-main-btn,
  .action-buttons-container {
    right: 16px;
    bottom: 16px;
  }
  
  .action-main-btn {
    width: 40px;
    height: 40px;
  }
  
  .action-btn {
    width: 36px;
    height: 36px;
  }
}
</style>