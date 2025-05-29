<!-- src/components/nav/BreadcrumbNavigation.vue -->
<template>
  <div class="breadcrumb-container">
    <v-breadcrumbs :items="items" divider=">">
      <template v-slot:item="{ item }">
        <v-breadcrumbs-item
          :href="item.href"
          :disabled="item.disabled"
        >
          {{ item.text }}
        </v-breadcrumbs-item>
      </template>
    </v-breadcrumbs>
  </div>
</template>

<script setup>
import { ref, watch } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()
const items = ref([])

watch(route, (newRoute) => {
  updateBreadcrumbs(newRoute)
}, { immediate: true })

const updateBreadcrumbs = (route) => {
  const paths = route.path.split('/').filter(Boolean)
  items.value = [
    {
      text: 'Home',
      href: '/',
      disabled: route.path === '/'
    }
  ]

  let currentPath = ''
  paths.forEach((path, index) => {
    currentPath += `/${path}`
    items.value.push({
      text: path.charAt(0).toUpperCase() + path.slice(1),
      href: currentPath,
      disabled: index === paths.length - 1
    })
  })
}
</script>

<style scoped>
.breadcrumb-container {
  padding: 12px 24px;
  background-color: #f5f5f5;
  border-bottom: 1px solid #e0e0e0;
}
</style>