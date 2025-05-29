<template>
  <v-app>
    <NavigationHeader class="header" />
    
    <div class="layout-container">
      <MedicalNavigatorMenu class="nav-bar" @toggle-drawer="toggleDrawer" />
      <NavigationDrawer v-model="mobileDrawer" class="custom-drawer"/>
      
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
<style>
/* Style pour le header fixe */
.header {
  position: fixed; /* Changé de sticky à fixed */
  top: 0;
  z-index: 1000;
  width: 100%;
}

/* Ajustements pour le drawer */
.custom-drawer {
  top: 64px !important; /* Ajustez selon la hauteur de votre header */
  height: calc(100vh - 64px) !important;
}

/* Suppression du fond bleu superposé */
.v-navigation-drawer__scrim {
  top: 64px !important;
  height: calc(100vh - 64px) !important;
}

/* Compensation pour le header fixe */
.content {
  margin-top: 64px;
}

/* Nouveau style pour le MedicalNavigatorMenu */
.nav-bar {
  position: sticky;
  top: 64px; /* Positionné sous le header */
  z-index: 999; /* Un z-index inférieur au header */
}
</style>