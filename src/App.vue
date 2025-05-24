<template>
  <v-app>
    <div class="layout-container">
      <NavigationHeader class="header" />
      <MedicalNavigatorMenu class="nav-bar" @toggle-drawer="mobileDrawer = !mobileDrawer" />
      <NavigationDrawer v-model="mobileDrawer" />
      
      <v-main class="content">
        <router-view />
      </v-main>
    </div>
  </v-app>
</template>

<style scoped>
.layout-container {
  position: relative;
}

.header {
  position: sticky;
  top: 0;
  z-index: 1000;
}

.nav-bar {
  position: sticky;
  top: 56px;
  z-index: 999;
}

.content {
  position: relative;
  z-index: 1;
}
</style>
<script setup>
import { ref } from 'vue'
import NavigationHeader from './components/nav/NavigationHeader.vue'
import MedicalNavigatorMenu from './components/nav/MedicalNavigatorMenu.vue'
import NavigationDrawer from './components/nav/NavigationDrawer.vue'

const mobileDrawer = ref(false)
</script>


