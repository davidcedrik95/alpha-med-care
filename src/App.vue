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
import { ref} from 'vue'
import NavigationHeader from './components/nav/NavigationHeader.vue'
import MedicalNavigatorMenu from './components/nav/MedicalNavigatorMenu.vue'
import NavigationDrawer from './components/nav/NavigationDrawer.vue'
import BreadcrumbNavigation from './components/nav/BreadcrumbNavigation.vue'

const mobileDrawer = ref(false)

const toggleDrawer = () => {
  mobileDrawer.value = !mobileDrawer.value
}
</script>

