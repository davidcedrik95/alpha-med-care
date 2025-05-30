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
              <span class="breadcrumb-text">{{ displayText(item) }}</span>
            </v-breadcrumbs-item>
          </template>
        </v-breadcrumbs>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, watch } from 'vue'
import { useRoute } from 'vue-router'
import { useI18n } from 'vue-i18n'

const route = useRoute()
const { t } = useI18n()

// Base breadcrumbs configuration
const baseBreadcrumbs = [
  { 
    text: 'menu.home',
    path: 'home', 
    to: '/', 
    icon: 'mdi-home', 
    disabled: false 
  }
]

const breadcrumbItems = ref([...baseBreadcrumbs])
const currentContext = ref('')

// Path to translation mapping with hierarchy support
const pathTranslations = {
  // Main menu items
  'services': { 
    full: 'menu.services',
    context: 'menu.categories.inspections'
  },
  'about': { 
    full: 'menu.about'
  },
  'contact': { 
    full: 'menu.contact'
  },
  'products': { 
    full: 'menu.products',
    context: 'menu.products'
  },
  'blog': { 
    full: 'menu.blog'
  },
  'faq': { 
    full: 'menu.faq'
  },
  'imprint': { 
    full: 'menu.imprint'
  },
  'privacy': { 
    full: 'menu.privacy'
  },
  
  // Account related
  'account': { 
    full: 'account.title',
    context: 'account.title',
    items: {
      'login': { full: 'auth.login' },
      'register': { full: 'auth.register' },
      'profile': { full: 'account.profile' },
      'orders': { full: 'account.items.my_orders' }
    }
  },
  
  // Services categories
  'categories': {
    full: 'menu.categories.inspections'
  },
  'stue_inspection': { 
    full: 'menu.items.stue_inspection'
  },

  'calibration': {
    full: 'menu.categories.calibration'
  },
  'maintenance': {
    full: 'menu.categories.maintenance'
  },
  'sales': {
    full: 'menu.categories.sales'
  },
  'consulting': {
    full: 'menu.categories.consulting'
  },
  
  // Inspection items
  'stk_inspection': { 
    full: 'menu.items.stk_inspection'
  },
  'mtk_inspection': { 
    full: 'menu.items.mtk_inspection'
  },
  'stue_inspection': { 
    full: 'menu.items.stue_inspection'
  },
  'mtue_inspection': { 
    full: 'menu.items.mtue_inspection'
  },
  'dguv_inspection': { 
    full: 'menu.items.dguv_inspection'
  },
  'general_inspection': { 
    full: 'menu.items.general_inspection'
  },
  
  
  // Calibration items
  'ergometer_calibration': { 
    full: 'menu.items.ergometer_calibration'
  },
  'thermometer_calibration': { 
    full: 'menu.items.thermometer_calibration'
  },
  
  // Maintenance items
  'repairs': { 
    full: 'menu.items.repairs'
  },
  'training': { 
    full: 'menu.items.training'
  }
}

watch(route, (newRoute) => {
  updateBreadcrumbs(newRoute)
}, { immediate: true })

function updateBreadcrumbs(route) {
  const items = [...baseBreadcrumbs]
  const pathParts = route.path.split('/').filter(Boolean)
  
  let accumulatedPath = ''
  
  pathParts.forEach((part, index) => {
    accumulatedPath += `/${part}`
    let translation = findTranslation(part, index, pathParts)
    
    items.push({
      text: translation.full || part,
      path: part,
      to: accumulatedPath,
      disabled: index === pathParts.length - 1,
      icon: getIconForPath(part)
    })
  })

  breadcrumbItems.value = items
  currentContext.value = getCurrentContext(route)
}

function displayText(item) {
  return t(item.text) || formatBreadcrumbText(item.path)
}

function formatBreadcrumbText(text) {
  return text.split('-').map(word => 
    word.charAt(0).toUpperCase() + word.slice(1)
  ).join(' ')
}

function getIconForPath(path) {
  const icons = {
    // Main menu
    'services': 'mdi-cog',
    'about': 'mdi-information',
    'contact': 'mdi-email',
    'products': 'mdi-package-variant',
    'blog': 'mdi-post',
    'faq': 'mdi-help-circle',
    
    // Account
    'account': 'mdi-account',
    'login': 'mdi-login',
    'register': 'mdi-account-plus',
    'profile': 'mdi-account-details',
    'orders': 'mdi-clipboard-list',
    
    // Services
    'stk': 'mdi-car-brake-alert',
    'mtk': 'mdi-motorbike',
    'inspections': 'mdi-clipboard-check',
    'calibration': 'mdi-ruler',
    'maintenance': 'mdi-wrench',
    'sales': 'mdi-cart',
    'consulting': 'mdi-school',
    
    // Specific services
    'stk_inspection': 'mdi-car-brake-alert',
    'mtk_inspection': 'mdi-motorbike',
    'ergometer_calibration': 'mdi-run-fast',
    'thermometer_calibration': 'mdi-thermometer',
    'repairs': 'mdi-tools',
    'training': 'mdi-teach'
  }
  return icons[path] || ''
}

function findTranslation(part, index, pathParts) {
  // 1. Check exact match
  if (pathTranslations[part]) {
    return pathTranslations[part]
  }

  // 2. Check if part is in any nested items
  if (index > 0) {
    const parent = pathParts[index-1]
    if (pathTranslations[parent]?.items?.[part]) {
      return pathTranslations[parent].items[part]
    }
  }

  // 3. Check for common suffixes
  const suffixes = ['_inspection', '_calibration', '_service']
  for (const suffix of suffixes) {
    if (part.endsWith(suffix)) {
      const base = part.replace(suffix, '')
      if (pathTranslations[base]) {
        return pathTranslations[base]
      }
    }
  }

  // 4. Try to find partial matches (like "inspections" matching "categories.inspections")
  for (const key in pathTranslations) {
    if (key.includes(part) || part.includes(key)) {
      const translation = pathTranslations[key]
      if (translation.full && translation.full.includes(part)) {
        return translation
      }
    }
  }

  return { full: part } // fallback
}

function getCurrentContext(route) {
  const pathParts = route.path.split('/').filter(Boolean)
  
  // First try to get context from the last path part
  if (pathParts.length > 0) {
    const lastPart = pathParts[pathParts.length - 1]
    const translation = pathTranslations[lastPart]
    if (translation && translation.context) {
      return t(translation.context)
    }
  }
  
  // Then try to get context from parent paths
  for (let i = pathParts.length - 1; i >= 0; i--) {
    const part = pathParts[i]
    const translation = pathTranslations[part]
    if (translation && translation.context) {
      return t(translation.context)
    }
  }
  
  // Fallback to specific route patterns
  if (route.path.startsWith('/services')) {
    return t('menu.categories.inspections')
  }
  if (route.path.startsWith('/products')) {
    return t('menu.products')
  }
  if (route.path.startsWith('/account')) {
    return t('account.title')
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
  scrollbar-width: none;
}

.v-breadcrumbs::-webkit-scrollbar {
  display: none;
}

.breadcrumb-item {
  display: flex;
  align-items: center;
  white-space: nowrap;
}

.breadcrumb-text {
  white-space: nowrap;
}

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
}

@media (min-width: 1600px) {
  .breadcrumb-content {
    padding: 8px 24px;
  }
}
</style>