<template>
  <v-app>
    <div class="headers-wrapper">
      <NavigationHeader />
      <MedicalNavigatorMenu />
    </div>
    
    <v-main>
      <v-container>
        <router-view></router-view>
      </v-container>
    </v-main>
  </v-app>
</template>

<script setup>
import NavigationHeader from './components/nav/NavigationHeader.vue'
import MedicalNavigatorMenu from './components/nav/MedicalNavigatorMenu.vue'
</script>