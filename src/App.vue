<template>
  <v-app>
    <div class="header-container">
      <NavigationHeader />
    </div>
    
    <div class="menu-container">
      <MedicalNavigatorMenu />
    </div>
    
    <v-main>
      <v-container>
        <router-view></router-view>
      </v-container>
    </v-main>
  </v-app>
</template>

<style scoped>
.header-container {
  position: relative;
  z-index: 1002;
}

.menu-container {
  position: relative;
  z-index: 1001;
}
</style>

<script setup>
import NavigationHeader from './components/nav/NavigationHeader.vue'
import MedicalNavigatorMenu from './components/nav/MedicalNavigatorMenu.vue'
</script>