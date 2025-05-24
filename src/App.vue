<template>
  <v-app>
    <NavigationHeader />
    <MedicalNavigatorMenu @toggle-drawer="mobileDrawer = !mobileDrawer" />
    <NavigationDrawer v-model="mobileDrawer" />
    
    <v-main style="margin-top: 120px"> <!-- Ajustez selon la hauteur combinée -->
      <router-view />
    </v-main>
  </v-app>
</template>
<script setup>
import { ref } from 'vue'
import NavigationHeader from './components/nav/NavigationHeader.vue'
import MedicalNavigatorMenu from './components/nav/MedicalNavigatorMenu.vue'
import NavigationDrawer from './components/nav/NavigationDrawer.vue'

const mobileDrawer = ref(false)
</script>


<style>
.mobile-drawer {
  z-index: 1003 !important;
}

</style>