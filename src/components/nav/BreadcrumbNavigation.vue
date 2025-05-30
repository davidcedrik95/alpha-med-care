<template>
  <div class="breadcrumb-wrapper">
    <div class="breadcrumb-content">
      <div class="breadcrumbs-container">
        <v-breadcrumbs :items="breadcrumbItems" divider=">">
          <template v-slot:item="{ item }">
            <v-breadcrumbs-item
              :to="item.to"
              :disabled="item.disabled"
              class="breadcrumb-item"
            >
              <v-icon v-if="item.icon" small class="mr-1">{{ item.icon }}</v-icon>
              <span class="breadcrumb-text">{{ item.text }}</span>
            </v-breadcrumbs-item>
          </template>
        </v-breadcrumbs>

        <div class="current-context" v-if="currentContext">
          <v-chip variant="outlined" color="primary" small>
            {{ currentContext }}
          </v-chip>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()

// Configuration des breadcrumbs de base
const baseBreadcrumbs = [
  { text: 'Home', to: '/', icon: 'mdi-home', disabled: false }
]

const breadcrumbItems = ref([...baseBreadcrumbs])
const currentContext = ref('')

watch(route, (newRoute) => {
  updateBreadcrumbs(newRoute)
}, { immediate: true })

function updateBreadcrumbs(route) {
  const items = [...baseBreadcrumbs]
  const pathParts = route.path.split('/').filter(Boolean)
  
  let accumulatedPath = ''
  pathParts.forEach((part, index) => {
    accumulatedPath += `/${part}`
    items.push({
      text: formatBreadcrumbText(part),
      to: accumulatedPath,
      disabled: index === pathParts.length - 1,
      icon: getIconForPath(part)
    })
  })

  breadcrumbItems.value = items
  currentContext.value = getCurrentContext(route)
}

function formatBreadcrumbText(text) {
  return text.split('-').map(word => 
    word.charAt(0).toUpperCase() + word.slice(1)
  ).join(' ')
}

function getIconForPath(path) {
  const icons = {
    'services': 'mdi-cog',
    'about': 'mdi-information',
    'contact': 'mdi-email',
    'stk': 'mdi-car-brake-alert',
    'mtk': 'mdi-motorbike'
  }
  return icons[path] || ''
}

function getCurrentContext(route) {
  if (route.path.startsWith('/services')) {
    return 'Services médicaux'
  }
  if (route.path.startsWith('/about')) {
    return 'À propos de nous'
  }
  return ''
}
</script>

<style scoped>
.breadcrumb-wrapper {
  background-color: #f8f9fa;
  border-bottom: 1px solid #e0e0e0;
  position: sticky;
  top: 64px;
  z-index: 900;
  width: 100%;
}

.breadcrumb-content {
  max-width: 1280px;
  margin: 0 auto;
  padding: 8px 16px;
}

.breadcrumbs-container {
  display: flex;
  align-items: center;
  gap: 8px;
  width: 100%;
}

.v-breadcrumbs {
  padding: 0;
  flex-grow: 1;
  overflow-x: auto;
  scrollbar-width: none; /* Pour Firefox */
}

.v-breadcrumbs::-webkit-scrollbar {
  display: none; /* Pour Chrome/Safari */
}

.breadcrumb-item {
  display: flex;
  align-items: center;
  white-space: nowrap;
}

.breadcrumb-text {
  white-space: nowrap;
}

.current-context {
  flex-shrink: 0;
  margin-left: 8px;
}

/* Styles pour mobile */
@media (max-width: 960px) {
  .breadcrumb-wrapper {
    top: 56px;
    padding: 0;
  }
  
  .breadcrumb-content {
    padding: 6px 12px;
  }
  
  .breadcrumbs-container {
    gap: 6px;
  }
  
  .v-breadcrumbs {
    flex-wrap: nowrap;
  }
  
  .breadcrumb-item {
    font-size: 0.75rem;
  }
  
  .current-context {
    margin-left: 6px;
  }
  
  .v-chip {
    font-size: 0.75rem;
    height: 24px;
  }
}

/* Styles pour les très grands écrans */
@media (min-width: 1600px) {
  .breadcrumb-content {
    padding: 8px 24px;
  }
}
</style>