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
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed, watch } from 'vue'
import { useRoute } from 'vue-router'
import { useI18n } from 'vue-i18n'

const route = useRoute()
const { t, locale } = useI18n()

// Configuration des mappings
const pathConfig = {
  translations: {
    // Items spécifiques
    'visual': 'menu.items.visual_inspection',
    'stk': 'menu.items.stk_inspection',
    'mtk': 'menu.items.mtk_inspection',
    'stue': 'menu.items.stue_inspection',
    'mtue': 'menu.items.mtue_inspection',
    'dguv': 'menu.items.dguv_inspection',
    'ergometer': 'menu.items.ergometer_calibration',
    'thermometer': 'menu.items.thermometer_calibration',
    'blood-pressure': 'menu.items.blood_pressure_calibration',
    'repairs': 'menu.items.repairs',
    'parts': 'menu.items.spare_parts',
    'installation': 'menu.items.installation_service',
    'training': 'menu.items.training',
    'disposal': 'menu.items.equipment_disposal',
    'maintenance': 'menu.items.regular_maintenance',
    
    // Catégories
    'inspections': 'menu.items.general_inspection',
    'calibration': 'menu.categories.calibration',
    
    // Pages principales
    'services': 'menu.services',
    'about': 'menu.about',
    'contact': 'menu.contact',
    'products': 'menu.products'
  },
  icons: {
    'services': 'mdi-cog',
    'about': 'mdi-information',
    'contact': 'mdi-email',
    'products': 'mdi-package-variant',
    'inspections': 'mdi-clipboard-check',
    'calibration': 'mdi-ruler',
    'maintenance': 'mdi-wrench',
    'stk': 'mdi-car-brake-alert',
    'mtk': 'mdi-motorbike',
    'stue': 'mdi-truck-check',
    'mtue': 'mdi-bus-alert',
    'dguv': 'mdi-shield-check',
    'visual': 'mdi-eye-check',
    'ergometer': 'mdi-run-fast',
    'thermometer': 'mdi-thermometer',
    'blood-pressure': 'mdi-heart-pulse',
    'repairs': 'mdi-tools',
    'parts': 'mdi-cog',
    'installation': 'mdi-wrench',
    'training': 'mdi-school',
    'disposal': 'mdi-trash-can'
  },
  fullPaths: {
    '/services/inspections': 'menu.items.general_inspection',
    '/services/visual': 'menu.items.visual_inspection'
  }
}

// Breadcrumb de base avec clés de traduction
const baseBreadcrumbs = [
  { 
    text: 'menu.home',
    to: '/', 
    icon: 'mdi-home', 
    disabled: false 
  }
]

// Watcher pour les changements de langue
watch(locale, () => {
  // Force la réactivité lorsqu'on change la langue
})

const breadcrumbItems = computed(() => {
  // Traduction des éléments de base
  const items = baseBreadcrumbs.map(item => ({
    ...item,
    text: t(item.text)
  }))
  
  const pathParts = route.path.split('/').filter(Boolean)
  let accumulatedPath = ''
  
  // Construction dynamique du breadcrumb
  pathParts.forEach((part, index) => {
    accumulatedPath += `/${part}`
    
    // Résolution de la traduction
    const translationKey = pathConfig.fullPaths[accumulatedPath] || 
                         pathConfig.translations[part] || 
                         part
    
    items.push({
      text: translationKey.startsWith('menu.') ? t(translationKey) : part,
      to: accumulatedPath,
      disabled: index === pathParts.length - 1,
      icon: pathConfig.icons[part] || ''
    })
  })

  return items
})
</script>

<style scoped>
.breadcrumb-wrapper {
  background-color: #f8f9fa;
  border-bottom: 1px solid #e0e0e0;
  position: sticky;
  top: 112px;
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