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
  display: grid;
  grid-template-areas:
    "header"
    "nav"
    "content";
  grid-template-rows: auto auto 1fr;
  min-height: 100vh;
}

.header {
  grid-area: header;
  position: sticky;
  top: 0;
  z-index: 100;
}

.nav-bar {
  grid-area: nav;
  position: sticky;
  top: 56px; /* Hauteur du header */
  z-index: 99;
}

.content {
  grid-area: content;
  margin-top: 0;
}
</style>
<script setup>
import { ref } from 'vue'
import NavigationHeader from './components/nav/NavigationHeader.vue'
import MedicalNavigatorMenu from './components/nav/MedicalNavigatorMenu.vue'
import NavigationDrawer from './components/nav/NavigationDrawer.vue'

const mobileDrawer = ref(false)
</script>


