<template>
  <v-app>
    <div class="layout-container">
      <NavigationHeader class="header" />
      <MedicalNavigatorMenu class="nav-bar" @toggle-drawer="toggleDrawer" />
      <NavigationDrawer v-model="mobileDrawer" />
      
      <v-main class="content">
        <router-view />
      </v-main>
    </div>
  </v-app>
</template>

<script setup>
import { ref } from 'vue'
import NavigationHeader from './components/nav/NavigationHeader.vue'
import MedicalNavigatorMenu from './components/nav/MedicalNavigatorMenu.vue'
import NavigationDrawer from './components/nav/NavigationDrawer.vue'

const mobileDrawer = ref(false)

const toggleDrawer = () => {
  mobileDrawer.value = !mobileDrawer.value
}

</script>