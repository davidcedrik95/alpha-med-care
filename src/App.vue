<template>
  <v-app>
    <NavigationHeader class="header" />
    
    <div class="layout-container">
      <MedicalNavigatorMenu class="nav-bar" @toggle-drawer="toggleDrawer" />
      <NavigationDrawer v-model="mobileDrawer" class="custom-drawer"/>
      
      <BreadcrumbNavigation class="breadcrumb" />
      
      <v-main class="content">
        <router-view />
      </v-main>
    </div>
  </v-app>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import NavigationHeader from './components/nav/NavigationHeader.vue'
import MedicalNavigatorMenu from './components/nav/MedicalNavigatorMenu.vue'
import NavigationDrawer from './components/nav/NavigationDrawer.vue'
import BreadcrumbNavigation from './components/nav/BreadcrumbNavigation.vue'

const mobileDrawer = ref(false)

const toggleDrawer = () => {
  mobileDrawer.value = !mobileDrawer.value
}
</script>

<style>
.header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  width: 100%;
  margin: 0 auto;
}

.custom-drawer {
  top: 64px !important;
  height: calc(100vh - 64px) !important;
}

.v-navigation-drawer__scrim {
  top: 64px !important;
  height: calc(100vh - 64px) !important;
}

.content {
  margin-top: 64px;
}

.nav-bar {
  position: sticky;
  top: 64px;
  z-index: 999;
}

.breadcrumb {
  position: sticky;
  top: 64px;
  z-index: 900;
}

@media (max-width: 960px) {
  .content {
    margin-top: 56px; /* Ajustez selon la hauteur de votre header mobile */
  }
  
  .custom-drawer,
  .v-navigation-drawer__scrim {
    top: 56px !important;
    height: calc(100vh - 56px) !important;
  }
  
  .nav-bar,
  .breadcrumb {
    top: 56px;
  }
}
</style>