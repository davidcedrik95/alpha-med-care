<template>
  <div class="breadcrumb-wrapper" v-if="!isMobile">
    <div class="breadcrumb-content">
      <v-breadcrumbs :items="breadcrumbItems" divider=">">
        <template v-slot:item="{ item }">
          <v-breadcrumbs-item
            :to="item.to"
            :disabled="item.disabled"
            class="breadcrumb-item"
          >
            <v-icon v-if="item.icon" small class="mr-1">{{ item.icon }}</v-icon>
            {{ item.text }}
          </v-breadcrumbs-item>
        </template>
      </v-breadcrumbs>

      <div class="current-context" v-if="currentContext">
        <v-chip variant="outlined" color="primary">
          {{ currentContext }}
        </v-chip>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue'
import { useRoute } from 'vue-router'
import { useDisplay } from 'vuetify'

const route = useRoute()
const { mobile } = useDisplay()
const isMobile = computed(() => mobile.value)

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
  padding: 0 24px;
  position: sticky;
  top: 64px; /* Position sous le header */
  z-index: 900;
}

.breadcrumb-content {
  max-width: 1280px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 8px 0;
}

.breadcrumb-item {
  font-size: 0.875rem;
  font-weight: 500;
}

.current-context {
  margin-left: 16px;
}

/* Adaptation pour les écrans très larges */
@media (min-width: 1600px) {
  .breadcrumb-content {
    padding: 8px 24px;
  }
}

/* Masquer complètement sur mobile */
@media (max-width: 960px) {
  .breadcrumb-wrapper {
    display: none;
  }
}
</style>