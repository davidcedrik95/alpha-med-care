<template>
  <v-app>
    <NavigationHeader class="header" />
    
    <div class="layout-container">
      <MedicalNavigatorMenu class="nav-bar" @toggle-drawer="toggleDrawer" />
      <NavigationDrawer v-model="mobileDrawer" class="custom-drawer"/>
      
      <BreadcrumbNavigation class="breadcrumb" />
      
      <v-main class="content">
        <router-view class="router-view-content" />
      </v-main>
    </div>

    <NavigationFooter />
  </v-app>
</template>

<script setup>
import { ref } from 'vue'
import NavigationHeader from './components/nav/NavigationHeader.vue'
import MedicalNavigatorMenu from './components/nav/MedicalNavigatorMenu.vue'
import NavigationDrawer from './components/nav/NavigationDrawer.vue'
import NavigationFooter from './components/nav/NavigationFooter.vue'
import BreadcrumbNavigation from './components/nav/BreadcrumbNavigation.vue'

const mobileDrawer = ref(false)

const toggleDrawer = () => {
  mobileDrawer.value = !mobileDrawer.value
}
</script>

<style scoped>
.layout-container {
  display: flex;
  flex-direction: column;
  min-height: 100vh; /* Utilise toute la hauteur de la vue */
}

.content {
  flex: 1; /* Prend tout l'espace disponible */
  padding-bottom: 60px; /* Espace pour le footer */
}

.router-view-content {
  min-height: calc(100vh - 200px); /* Ajustez selon vos besoins */
}
</style>