<template>
  <v-app>
    <div class="sticky-header-group">
      <NavigationHeader class="header" />
      <MedicalNavigatorMenu class="nav-bar" @toggle-drawer="toggleDrawer" />
      <BreadcrumbNavigation class="breadcrumb" />
    </div>
    
    <div class="app-container">
      <NavigationDrawer v-model="mobileDrawer" />
      
      <v-main class="main-content">
        <router-view class="page-content" />
      </v-main>
    </div>

    <NavigationFooter />
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
})
</script>

<style scoped>
.sticky-header-group {
  position: sticky;
  top: 0;
  z-index: 1000;
}

.header {
  position: static; /* Plus besoin de fixed car le groupe entier est sticky */
}

.nav-bar {
  position: static; /* Pareil ici */
  top: auto;
}

.breadcrumb {
  position: static; /* Pareil ici */
  top: auto;
}

.app-container {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  /* Supprimez le padding-top car les éléments sont maintenant dans le groupe sticky */
}

.main-content {
  flex: 1;
  padding: 0;
}

.page-content {
  min-height: calc(100vh - 180px);
  padding: 16px;
}

@media (max-width: 960px) {
  .page-content {
    min-height: calc(100vh - 172px);
  }
}

@media (max-width: 600px) {
  .page-content {
    min-height: calc(100vh - 124px);
  }
}
</style>