<template>
  <v-app-bar>
    <v-container class="d-flex align-center">
      <!-- Logo / Titre du site -->
      <v-toolbar-title>{{ $t('app.title') }}</v-toolbar-title>

      <v-spacer></v-spacer>

      <!-- Menu principal -->
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn variant="text" to="/" class="text-none nav-btn">{{ $t('menu.home') }}</v-btn>

        <!-- Mega-menu -->
       <v-menu
        :open-on-hover="!isMobile && hoverEnabled"
        :close-on-content-click="false"
        offset-y
        :transition="!isMobile ? 'slide-y-reverse-transition' : 'slide-y-transition'"
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
                @click.stop="closeServicesMenu"
              >
                <v-icon>mdi-close</v-icon>
              </v-btn>
            </div>
            <v-container class="py-6 mega-menu-container">
              <v-row>
                <v-col
                  cols="12"
                  md="4"
                  v-for="(category, index) in menuCategories"
                  :key="index"
                  class="category-col"
                >
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
                  </div>
                </v-col>
              </v-row>
            </v-container>
          </v-card>
        </v-menu>

        <v-btn variant="text" to="/about" class="text-none nav-btn">{{ $t('menu.about') }}</v-btn>
        <v-btn variant="text" to="/contact" class="text-none nav-btn">{{ $t('menu.contact') }}</v-btn>
      </v-toolbar-items>

      <!-- Sélecteur de langue -->
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

      <!-- Icône menu mobile -->
      <v-app-bar-nav-icon class="hidden-md-and-up" @click="toggleMobileMenu"></v-app-bar-nav-icon>
    </v-container>
  </v-app-bar>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { useI18n } from 'vue-i18n'
import { useRouter } from 'vue-router'
import { onBeforeUnmount } from 'vue'

// Nettoyage du timeout quand le composant est détruit
onBeforeUnmount(() => {
  if (hoverTimeout) clearTimeout(hoverTimeout)
})

// Responsiveness
const isMobile = ref(false)
onMounted(() => {
  isMobile.value = window.innerWidth <= 960
  window.addEventListener('resize', () => {
    isMobile.value = window.innerWidth <= 960
  })
})

// i18n
const { locale, availableLocales } = useI18n()
const currentLocale = computed(() => locale.value)

const changeLocale = (newLocale) => {
  locale.value = newLocale
  localStorage.setItem('userLocale', newLocale)
}

// Navigation
const router = useRouter()
const navigateToService = (route) => {
  router.push(route)
  closeServicesMenu()
}

const servicesMenu = ref(null)

// Mega-menu
const isServicesMenuOpen = ref(false)
const hoverEnabled = ref(true)
let hoverTimeout = null

const closeServicesMenu = () => {
  // Désactive immédiatement le hover
  hoverEnabled.value = false
  isServicesMenuOpen.value = false
  
  // Annule tout timeout précédent
  if (hoverTimeout) clearTimeout(hoverTimeout)
  
  // Réactive le hover après un délai suffisant (500ms)
  hoverTimeout = setTimeout(() => {
    hoverEnabled.value = true
  }, 500)
}

const handleActivatorClick = () => {
  if (isMobile.value) {
    // Comportement mobile simple
    isServicesMenuOpen.value = !isServicesMenuOpen.value
  } else {
    // Sur desktop, ne s'ouvre que si le hover est activé
    if (hoverEnabled.value) {
      isServicesMenuOpen.value = true
    }
  }
}

const toggleMobileMenu = () => {
  // À personnaliser : gestion du menu mobile drawer
  console.log('Mobile menu toggled')
}

// Données du mega-menu
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
:root {
  --header-bg: #b2d6ee;
  --header-text: #252424;
  --primary-color: #005b96;
  --hover-bg: #f5f5f5;
  --transition-speed: 0.3s;
}

.v-app-bar {
  top: auto !important;
  position: relative !important;
  background-color: #b2d6ee!important;
  color: #252424 !important;
}

.nav-btn {
  font-size: 1rem;
  font-weight: 500;
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

.mega-menu {
  max-width: 1280px;
  margin-top: 14px;
  background-color: #ddeaf1;
  left: 50% !important;
  transform: translateX(-50%) !important;
  position: relative;
}

.close-button-wrapper {
  position: absolute;
  top: 12px;
  right: 12px;
}

.close-megamenu {
  background-color: rgba(255, 255, 255, 0.9);
}

.v-menu__content {
  pointer-events: none;
  transition: opacity 0.3s, transform 0.3s;
}

.v-menu__content.menuable__content__active {
  pointer-events: auto;
}

.language-btn {
  text-transform: none;
  min-width: 64px;
}

.flag-icon {
  border-radius: 2px;
  box-shadow: 0 0 1px rgba(0,0,0,0.3);
}
</style>
