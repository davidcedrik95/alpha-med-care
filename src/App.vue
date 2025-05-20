<template>
  <v-app>
    <NavigationHeader />
    <v-main>
      <v-container>
        <router-view></router-view>
      </v-container>
    </v-main>
  </v-app>
</template>

<script setup>
import NavigationHeader from './components/nav/NavigationHeader.vue'


</script>
