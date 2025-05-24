<template>
  <v-app>
    <!-- Menu de navigation - maintenant en premier -->
    <MedicalNavigatorMenu @toggle-drawer="mobileDrawer = !mobileDrawer" />
    
    <!-- Header en haut - maintenant en second -->
    <NavigationHeader />

    <!-- Drawer latéral -->
    <NavigationDrawer v-model="mobileDrawer" />

    <!-- Contenu principal -->
    <v-main>
      <v-container>
        <router-view />
      </v-container>
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