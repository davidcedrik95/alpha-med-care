<template>
  <v-app-bar>
    <v-container class="d-flex align-center">
      <!-- Logo / Titre du site -->
      <div class="title-container">
        <v-toolbar-title class="app-title flex-shrink-0">{{ $t('app.title') }}</v-toolbar-title>
      </div>
      <v-spacer></v-spacer>

      <!-- Menu principal -->
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn variant="text" to="/" class="text-none nav-btn" active-class="router-link-active">{{ $t('menu.home') }}</v-btn>

        <!-- Mega-menu Services -->
        <v-menu
          :open-on-hover="!isMobile && hoverEnabled"
          :close-on-content-click="false"
          v-model="isServicesMenuOpen"
          ref="servicesMenu"
          offset-y
          content-class="mega-menu-wrapper"
          :position-x="0"
        >
          <template v-slot:activator="{ props }">
            <v-btn
              variant="text"
              v-bind="props"
              class="text-none nav-btn"
              :class="{ 'active-link': isServicesMenuOpen }"
              @click="handleActivatorClick"
            >
              {{ $t('menu.services') }}
              <v-icon right>mdi-chevron-down</v-icon>
            </v-btn>
          </template>

          <v-card 
            :width="isMobile ? '100%' : '100vw'"
            class="mega-menu"
            elevation="0"
            :style="{
              'max-width': isMobile ? '100%' : '1280px',
              'margin': isMobile ? '0' : '14px auto 0',
              'left': isMobile ? '0' : '50%',
              'transform': isMobile ? 'none' : 'translateX(-50%)',
              'position': isMobile ? 'static' : 'relative'
            }"
          >
            <div class="close-button-wrapper">
              <v-btn icon class="close-megamenu" @click.stop="closeServicesMenu">
                <v-icon>mdi-close</v-icon>
              </v-btn>
            </div>
            <v-container class="py-4 mega-menu-container">
              <v-row>
                <v-col
                  cols="12"
                  md="4"
                  v-for="(category, index) in servicesCategories"
                  :key="index"
                  class="category-col"
                >
                  <div class="d-flex flex-column h-100 category-column">
                    <h3 class="text-h6 mb-3 category-title">{{ $t(`menu.categories.${category.key}`) }}</h3>
                    <v-divider class="mb-4 category-divider" thickness="2" color="primary"></v-divider>
                    <v-list density="comfortable" class="pa-0 flex-grow-1 category-list">
                      <v-list-item
                        v-for="(item, itemIndex) in category.items"
                        :key="itemIndex"
                        :title="$t(`menu.items.${item.key}`)"
                        class="px-0 list-item service-item"
                        :to="item.route"
                        active-class="router-link-active"
                        @click="navigateToService(item.route)"
                      >
                        <template v-slot:prepend>
                          <v-icon :icon="item.icon" size="small" class="mr-2"></v-icon>
                        </template>
                        <template v-slot:append>
                          <v-icon icon="mdi-chevron-right" size="small" class="ml-0"></v-icon>
                        </template>
                      </v-list-item>
                    </v-list>
                  </div>
                </v-col>
              </v-row>
            </v-container>
          </v-card>
        </v-menu>

        <!-- Mega-menu Produkte -->
        <v-menu
          :open-on-hover="!isMobile && hoverEnabled"
          :close-on-content-click="false"
          v-model="isProductsMenuOpen"
          ref="productsMenu"
          offset-y
          content-class="mega-menu-wrapper"
          :position-x="0"
        >
          <template v-slot:activator="{ props }">
            <v-btn
              variant="text"
              v-bind="props"
              class="text-none nav-btn"
              :class="{ 'active-link': isProductsMenuOpen }"
              @click="handleProductsActivatorClick"
            >
              {{ $t('menu.products') }}
              <v-icon right>mdi-chevron-down</v-icon>
            </v-btn>
          </template>

          <v-card 
            :width="isMobile ? '100%' : '100vw'"
            class="mega-menu"
            elevation="0"
            :style="{
              'max-width': isMobile ? '100%' : '1280px',
              'margin': isMobile ? '0' : '14px auto 0',
              'left': isMobile ? '0' : '50%',
              'transform': isMobile ? 'none' : 'translateX(-50%)',
              'position': isMobile ? 'static' : 'relative'
            }"
          >
            <div class="close-button-wrapper">
              <v-btn icon class="close-megamenu" @click.stop="closeProductsMenu">
                <v-icon>mdi-close</v-icon>
              </v-btn>
            </div>
            <v-container class="py-4 mega-menu-container">
              <v-row>
                <v-col
                  cols="12"
                  md="4"
                  v-for="(category, index) in productsCategories"
                  :key="index"
                  class="category-col"
                >
                  <div class="d-flex flex-column h-100 category-column">
                    <h3 class="text-h6 mb-3 category-title">{{ $t(`menu.productData.categories.${category.key}`) }}</h3>
                    <v-divider class="mb-4 category-divider" thickness="2" color="primary"></v-divider>
                    <v-list density="comfortable" class="pa-0 flex-grow-1 category-list">
                      <v-list-item
                        v-for="(product, productIndex) in category.items"
                        :key="productIndex"
                        :title="$t(`menu.productData.items.${product.key}`)"
                        class="px-0 list-item product-item"
                        :to="product.route"
                        active-class="router-link-active"
                        @click="navigateToProduct(product.route)"
                      >
                        <template v-slot:prepend>
                          <v-icon :icon="product.icon" size="small" class="mr-2"></v-icon>
                        </template>
                        <template v-slot:append>
                          <v-icon icon="mdi-chevron-right" size="small" class="ml-0"></v-icon>
                        </template>
                      </v-list-item>
                    </v-list>
                  </div>
                </v-col>
              </v-row>
            </v-container>
          </v-card>
        </v-menu>

        <v-btn variant="text" to="/about" class="text-none nav-btn" active-class="router-link-active">{{ $t('menu.about') }}</v-btn>
        <v-btn variant="text" to="/contact" class="text-none nav-btn" active-class="router-link-active">{{ $t('menu.contact') }}</v-btn>
      </v-toolbar-items>

      <!-- Sélecteur de langue -->
      <LanguageSelector />

      <!-- Icône menu mobile -->
      <v-app-bar-nav-icon class="hidden-md-and-up" @click="toggleMobileMenu"></v-app-bar-nav-icon>
    </v-container>
  </v-app-bar>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import { useRouter } from 'vue-router'
import LanguageSelector from './LanguageSelector.vue'

const router = useRouter()
const servicesMenu = ref(null)
const productsMenu = ref(null)
const isServicesMenuOpen = ref(false)
const isProductsMenuOpen = ref(false)
const hoverEnabled = ref(true)
let hoverTimeout = null

// Responsiveness
const isMobile = ref(false)
onMounted(() => {
  isMobile.value = window.innerWidth <= 960
  window.addEventListener('resize', () => {
    isMobile.value = window.innerWidth <= 960
  })
})

// Nettoyage
onBeforeUnmount(() => {
  if (hoverTimeout) clearTimeout(hoverTimeout)
})

const navigateToService = (route) => {
  closeServicesMenu()
  router.push(route)
}

const navigateToProduct = (route) => {
  closeProductsMenu()
  router.push(route)
}

const closeServicesMenu = () => {
  isServicesMenuOpen.value = false
  hoverEnabled.value = true
  if (hoverTimeout) clearTimeout(hoverTimeout)
}

const closeProductsMenu = () => {
  isProductsMenuOpen.value = false
  hoverEnabled.value = true
  if (hoverTimeout) clearTimeout(hoverTimeout)
}

const handleActivatorClick = () => {
  if (isMobile.value) {
    isServicesMenuOpen.value = !isServicesMenuOpen.value
    isProductsMenuOpen.value = false
  } else if (hoverEnabled.value) {
    isServicesMenuOpen.value = true
    isProductsMenuOpen.value = false
  }
}

const handleProductsActivatorClick = () => {
  if (isMobile.value) {
    isProductsMenuOpen.value = !isProductsMenuOpen.value
    isServicesMenuOpen.value = false
  } else if (hoverEnabled.value) {
    isProductsMenuOpen.value = true
    isServicesMenuOpen.value = false
  }
}

const emit = defineEmits(['toggle-drawer'])

const toggleMobileMenu = () => {
  emit('toggle-drawer')
}

// Données du mega-menu Services
const servicesCategories = [
  {
    key: "inspections",
    items: [
      { key: "stk_inspection", icon: "mdi-car-brake-alert", route: "/services/stk" },
      { key: "mtk_inspection", icon: "mdi-motorbike", route: "/services/mtk" },
      { key: "stue_inspection", icon: "mdi-truck-check", route: "/services/stue" },
      { key: "mtue_inspection", icon: "mdi-bus-alert", route: "/services/mtue" },
      { key: "dguv_inspection", icon: "mdi-shield-check", route: "/services/dguv" },
      { key: "general_inspection", icon: "mdi-clipboard-check", route: "/services/inspections" },
      { key: "visual_inspection", icon: "mdi-eye-check", route: "/services/visual" }
    ]
  },
  {
    key: "calibration",
    items: [
      { key: "ergometer_calibration", icon: "mdi-run-fast", route: "/services/ergometer" },
      { key: "thermometer_calibration", icon: "mdi-thermometer", route: "/services/thermometer" },
      { key: "blood_pressure_calibration", icon: "mdi-heart-pulse", route: "/services/blood-pressure" }
    ]
  },
  {
    key: "maintenance",
    items: [
      { key: "repairs", icon: "mdi-tools", route: "/services/repairs" },
      { key: "spare_parts", icon: "mdi-cog", route: "/services/parts" },
      { key: "installation_service", icon: "mdi-wrench", route: "/services/installation" },
      { key: "training", icon: "mdi-school", route: "/services/training" },
      { key: "equipment_disposal", icon: "mdi-trash-can", route: "/services/disposal" },
      { key: "regular_maintenance", icon: "mdi-calendar-check", route: "/services/maintenance" }
    ]
  }
]

// Données du mega-menu Produkte
const productsCategories = [
  {
    key: "mtt_devices",
    items: [
      { key: "ergo_fit_cycle", icon: "mdi-bike", route: "/products/ergo-fit-cycle" },
      { key: "proxomed_treadmill", icon: "mdi-run", route: "/products/proxomed-treadmill" },
      { key: "physiomed_trainer", icon: "mdi-weight-lifter", route: "/products/physiomed-trainer" },
      { key: "frei_ag_ergometer", icon: "mdi-bike-fast", route: "/products/frei-ag-ergometer" },
      { key: "rehabilitation_bike", icon: "mdi-bike-pedal", route: "/products/rehabilitation-bike" }
    ]
  },
  {
    key: "therapy",
    items: [
      { key: "electrotherapy", icon: "mdi-flash", route: "/products/electrotherapy" },
      { key: "ultrasound_therapy", icon: "mdi-sound", route: "/products/ultrasound-therapy" },
      { key: "heat_therapy", icon: "mdi-fire", route: "/products/heat-therapy" },
      { key: "cryotherapy", icon: "mdi-snowflake", route: "/products/cryotherapy" },
      { key: "magnetotherapy", icon: "mdi-magnet", route: "/products/magnetotherapy" }
    ]
  },
  {
    key: "sport_gymnastics",
    items: [
      { key: "training_equipment", icon: "mdi-dumbbell", route: "/products/training-equipment" },
      { key: "rehabilitation_balls", icon: "mdi-ballot-recount", route: "/products/rehabilitation-balls" },
      { key: "resistance_bands", icon: "mdi-elastic", route: "/products/resistance-bands" },
      { key: "balance_boards", icon: "mdi-surfing", route: "/products/balance-boards" },
      { key: "gymnastics_mats", icon: "mdi-floor-mat", route: "/products/gymnastics-mats" }
    ]
  },
  {
    key: "therapy_beds",
    items: [
      { key: "adjustable_beds", icon: "mdi-bed-king", route: "/products/adjustable-beds" },
      { key: "massage_tables", icon: "mdi-table-furniture", route: "/products/massage-tables" },
      { key: "examination_beds", icon: "mdi-hospital-bed", route: "/products/examination-beds" },
      { key: "hydrotherapy_beds", icon: "mdi-water", route: "/products/hydrotherapy-beds" }
    ]
  },
  {
    key: "practice_supplies",
    items: [
      { key: "medical_instruments", icon: "mdi-stethoscope", route: "/products/medical-instruments" },
      { key: "diagnostic_equipment", icon: "mdi-heart-pulse", route: "/products/diagnostic-equipment" },
      { key: "disposables", icon: "mdi-needle", route: "/products/disposables" },
      { key: "furniture", icon: "mdi-chair-rolling", route: "/products/furniture" }
    ]
  },
  {
    key: "cardio",
    items: [
      { key: "ecg_machines", icon: "mdi-heart-flash", route: "/products/ecg-machines" },
      { key: "blood_pressure_monitors", icon: "mdi-blood-bag", route: "/products/blood-pressure-monitors" },
      { key: "stress_test_systems", icon: "mdi-heart-plus", route: "/products/stress-test-systems" },
      { key: "holter_monitors", icon: "mdi-monitor-heart", route: "/products/holter-monitors" }
    ]
  }
]
</script>

<style scoped>
.v-app-bar {
  background-color: rgba(12, 72, 129, 0.95) !important;
  color: white !important;
  z-index: 999 !important;
  position: sticky !important;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.title-container {
  flex: 0 0 auto;
  min-width: 0;
}

.app-title {
  font-size: 1.25rem;
  font-weight: 600;
  color: white !important;
  white-space: nowrap;
  padding-right: 16px;
  margin-right: auto;
}

.nav-btn {
  font-size: 1rem;
  font-weight: 500;
  transition: all 0.3s ease;
  position: relative;
  color: white !important;
}

.nav-btn:hover,
.nav-btn.router-link-active {
  color: #a0c4ff !important;
}

.nav-btn.router-link-active::after,
.nav-btn.active-link::after {
  content: '';
  position: absolute;
  bottom: 8px;
  left: 50%;
  transform: translateX(-50%);
  width: 30px;
  height: 3px;
  background-color: #a0c4ff;
  border-radius: 2px;
}

.nav-btn.active-link {
  color: #a0c4ff !important;
}

.mega-menu {
  background: white !important;
  border-radius: 0 0 8px 8px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
  border: none;
  z-index: 1000;
  padding: 16px 0;
}

.mega-menu-wrapper {
  position: fixed;
  left: 0;
  right: 0;
  display: flex;
  justify-content: center;
  width: 100%;
  overflow-x: hidden;
  background: linear-gradient(to bottom, rgba(12, 72, 129, 0.1) 0%, transparent 100%);
}

.mega-menu-container {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 24px;
}

.category-col {
  border-right: 1px solid #f0f0f0;
  padding: 0 24px;
}

.category-col:last-child {
  border-right: none;
}

.category-title {
  color: var(--v-primary-base) !important;
  font-weight: 600;
  font-size: 1.1rem;
  padding-top: 8px;
}

.category-divider {
  width: 40px;
  margin-left: 0;
  background-color: var(--v-primary-base) !important;
  height: 3px !important;
}

.service-item, .product-item {
  transition: all 0.2s ease;
  border-radius: 6px;
  margin-bottom: 4px;
  color: #333 !important;
  min-height: 42px;
}

.service-item:hover, .product-item:hover {
  background-color: #f8fafc !important;
  transform: translateX(4px);
}

.service-item.router-link-active, 
.product-item.router-link-active {
  background-color: #f0f7ff !important;
  color: var(--v-primary-base) !important;
}

.service-item .v-icon, 
.product-item .v-icon {
  color: var(--v-primary-base) !important;
  opacity: 0.9;
}

.service-item:hover .v-icon,
.product-item:hover .v-icon,
.service-item.router-link-active .v-icon,
.product-item.router-link-active .v-icon {
  opacity: 1;
}

.close-button-wrapper {
  position: absolute;
  top: 16px;
  right: 16px;
  z-index: 1;
}

.close-megamenu {
  background-color: #f5f5f5;
  color: #666 !important;
}

.close-megamenu:hover {
  background-color: #e0e0e0;
  transform: rotate(90deg);
}

/* Animation d'ouverture */
.v-menu__content {
  transition: all 0.3s ease-out !important;
}

.v-menu__content:before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 2px;
  background: var(--v-primary-base);
  animation: grow 0.3s ease-out forwards;
}

@keyframes grow {
  from { transform: scaleX(0); }
  to { transform: scaleX(1); }
}

/* Responsive */
@media (max-width: 960px) {
  .v-app-bar {
    top: 0 !important;
    background-color: rgba(12, 72, 129, 0.95) !important;
  }
  
  .app-title {
    font-size: 1rem;
  }
  
  .mega-menu {
    border-radius: 0;
    box-shadow: none;
    border-top: 1px solid #eee;
    padding: 8px 0;
  }
  
  .category-col {
    border-right: none;
    border-bottom: 1px solid #f0f0f0;
    padding: 16px 0;
    margin-bottom: 8px;
  }
  
  .category-col:last-child {
    border-bottom: none;
    margin-bottom: 0;
  }
  
  .category-title {
    font-size: 1rem;
  }
  
  .mega-menu-container {
    padding: 0 16px;
  }
  
  .nav-btn {
    font-size: 0.9rem;
  }
}

@media (max-width: 600px) {
  .app-title {
    font-size: 0.9rem;
  }
  
  .mega-menu {
    padding: 8px 0;
  }
  
  .service-item, .product-item {
    min-height: 38px;
  }
}
</style>