<template>
  <v-app-bar>
    <v-container class="d-flex align-center">
      <!-- Logo ou nom du site -->
      <v-toolbar-title>{{ $t('app.title') }}</v-toolbar-title>

      <v-spacer></v-spacer>

      <!-- Navigation principale -->
      <v-toolbar-items class="hidden-sm-and-down">
        <!-- Startseite -->
        <v-btn variant="text" to="/" class="text-none nav-btn">{{ $t('menu.home') }}</v-btn>

        <!-- Dienstleistungen avec méga-menu -->
        <v-menu 
          :open-on-hover="!isMobile"
          :close-on-content-click="false"
          offset-y 
          transition="slide-y-transition"
          v-model="isServicesMenuOpen"
          ref="servicesMenu"
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

          <v-card width="100vw" class="mx-auto mega-menu" elevation="4">
            <div class="close-button-wrapper">
              <v-btn
                icon
                class="close-megamenu"
                @click="closeServicesMenu"
                aria-label="Close menu"
              >
                <v-icon>mdi-close</v-icon>
              </v-btn>
            </div>

            <v-container class="py-6 mega-menu-container">
              <v-row>
                <v-col cols="12" md="4" v-for="(category, index) in menuCategories" :key="index" class="category-col">
                  <div class="d-flex flex-column h-100 category-column">
                    <h3 class="text-h6 mb-2 category-title">{{ $t(`menu.categories.${category.key}`) }}</h3>
                    <v-divider class="mb-3 category-divider" thickness="2" color="primary"></v-divider>
                    <v-list density="compact" class="pa-0 flex-grow-1 category-list">
                      <v-list-item
                        v-for="(item, itemIndex) in category.items"
                        :key="itemIndex"
                        :title="$t(`menu.items.${item.key}`)"
                        class="px-0 list-item service-item"
                        link
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
                    <v-divider v-if="index < menuCategories.length - 1" class="d-md-none mt-4 mobile-divider"></v-divider>
                  </div>
                </v-col>
              </v-row>
            </v-container>
          </v-card>
        </v-menu>

        <!-- Über uns -->
        <v-btn variant="text" to="/about" class="text-none nav-btn">{{ $t('menu.about') }}</v-btn>

        <!-- Contact -->
        <v-btn variant="text" to="/contact" class="text-none nav-btn">{{ $t('menu.contact') }}</v-btn>
      </v-toolbar-items>

      <!-- Language switcher -->
     
<v-menu offset-y>
  <template v-slot:activator="{ props }">
    <v-btn variant="text" v-bind="props" class="text-none language-btn">
      <img 
        :src="`/images/flags/${currentLocale}.png`"
        :alt="$t(`language.${currentLocale}`)"
        width="24"
        height="16"
        loading="lazy"
        class="flag-icon mr-2"
      />
      {{ currentLocale.toUpperCase() }}
      <v-icon right>mdi-chevron-down</v-icon>
    </v-btn>
  </template>
  <v-list class="language-list">
    <v-list-item 
      v-for="locale in availableLocales" 
      :key="locale" 
      @click="changeLocale(locale)"
      class="language-item"
    >
      <template v-slot:prepend>
        <img 
          :src="`/images/flags/${locale}.png`" 
          :alt="$t(`language.${locale}`)"
          width="24"
          height="16"
          loading="lazy"
          class="flag-icon mr-2"
        />
      </template>
      <v-list-item-title>{{ $t(`language.${locale}`) }}</v-list-item-title>
    </v-list-item>
  </v-list>
</v-menu>

      <!-- Menu mobile -->
      <v-app-bar-nav-icon class="hidden-md-and-up" @click="toggleMobileMenu"></v-app-bar-nav-icon>
    </v-container>
  </v-app-bar>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useI18n } from 'vue-i18n'
import { useRouter } from 'vue-router'

// État du menu
const isServicesMenuOpen = ref(false)
const servicesMenu = ref(null)
const isMobile = ref(false)
const isMobileMenuOpen = ref(false)

const { locale, availableLocales } = useI18n()
const router = useRouter()

const currentLocale = computed(() => locale.value)

const changeLocale = (newLocale) => {
  locale.value = newLocale
  localStorage.setItem('userLocale', newLocale)
}

const navigateToService = (route) => {
  router.push(route)
  closeServicesMenu()
}

const closeServicesMenu = () => {
  isServicesMenuOpen.value = false
  if (servicesMenu.value) {
    servicesMenu.value.isActive = false
  }
}

const handleActivatorClick = () => {
  if (isServicesMenuOpen.value) {
    closeServicesMenu()
  } else {
    isServicesMenuOpen.value = true
  }
}

const toggleMobileMenu = () => {
  isMobileMenuOpen.value = !isMobileMenuOpen.value
}

const menuCategories = [
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
      { key: "ergometer_calibration", icon: "mdi-bike", route: "/services/ergometer" },
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
</script>

<style scoped>
/* Variables */
:root {
  --header-bg: #b2d6ee;
  --header-text: rgb(37, 36, 36);
  --primary-color: #005b96;
  --hover-bg: #f5f5f5;
  --transition-speed: 0.3s;
}

/* App Bar */
.v-app-bar {
  top: auto !important;
  position: relative !important;
  box-shadow: none !important;
  border-top: 1px solid #e0e0e0;
  background-color: #b2d6ee !important;
  color: var(--header-text) !important;
}

/* Navigation buttons */
.nav-btn {
  font-size: 1rem;
  font-weight: 500;
  letter-spacing: normal;
  transition: color var(--transition-speed) ease;
}

.nav-btn:hover {
  color: var(--primary-color) !important;
}

.active-link {
  color: var(--primary-color) !important;
  position: relative;
}

.active-link::after {
  content: '';
  position: absolute;
  bottom: 8px;
  left: 50%;
  transform: translateX(-50%);
  width: 30px;
  height: 3px;
  background-color: var(--primary-color);
  border-radius: 2px;
}

/* Mega menu */
.mega-menu {
  max-width: 1280px;
  left: 50% !important;
  transform: translateX(-50%) !important;
  margin-top: 14px;
  position: relative;
  background-color: #ddeaf1;
}

.mega-menu-container {
  width: 100%;
  margin: 0;
}

.close-button-wrapper {
  position: absolute;
  top: 12px;
  right: 12px;
  z-index: 10;
}

.close-megamenu {
  background-color: rgba(255, 255, 255, 0.9);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: all var(--transition-speed) ease;
}

.close-megamenu:hover {
  transform: scale(1.1);
  background-color: #f5f5f5;
}

.close-megamenu:active {
  transform: scale(0.95);
}

.category-title {
  font-size: 1.125rem;
  font-weight: 600;
  color: var(--primary-color);
}

.category-divider {
  opacity: 0.5;
}

.category-list {
  font-size: 0.9375rem;
}

.service-item {
  min-height: 32px;
  margin-bottom: 4px;
  white-space: nowrap;
  transition: all var(--transition-speed) ease;
}

.service-item:hover {
  color: var(--primary-color) !important;
  background-color: var(--hover-bg);
}

/* Language switcher */
.flag-icon {
  border-radius: 2px;
  box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1);
  vertical-align: middle;
}

/* Language menu adjustments */
.language-btn {
  display: flex;
  align-items: center;
  font-size: 0.875rem;
  transition: all var(--transition-speed) ease;
}

.language-list {
  min-width: 120px;
}

.language-item {
  display: flex;
  align-items: center;
  padding: 8px 16px;
}

.language-item:hover {
  background-color: var(--hover-bg);
}

/* Responsive adjustments */
@media (max-width: 959px) {
  .category-title {
    font-size: 1rem;
  }
  
  .category-list {
    font-size: 0.875rem;
  }
}

@media (max-width: 599px) {
  .nav-btn {
    font-size: 0.875rem;
  }
  
  .mega-menu {
    width: 100vw !important;
    left: 0 !important;
    transform: none !important;
    margin-left: 0 !important;
  }
}
</style>