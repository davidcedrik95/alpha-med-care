<template>
  <v-app-bar>
    <v-container class="d-flex align-center">
      <!-- Logo / Titre du site -->
      <v-toolbar-title class="app-title">{{ $t('app.title') }}</v-toolbar-title>
   
      <v-spacer></v-spacer>

      <!-- Menu principal -->
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn variant="text" to="/" class="text-none nav-btn" active-class="router-link-active">{{ $t('menu.home') }}</v-btn>

        <!-- Mega-menu -->
        <v-menu
          :open-on-hover="!isMobile && hoverEnabled"
          :close-on-content-click="false"
          :transition="!isMobile ? 'slide-y-reverse-transition' : 'slide-y-transition'"
          v-model="isServicesMenuOpen"
          ref="servicesMenu"
          offset-y
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
            class="mx-auto mega-menu" 
            elevation="4"
            :max-width="isMobile ? '100%' : '1280px'"
          >
            <div class="close-button-wrapper">
              <v-btn icon class="close-megamenu" @click.stop="closeServicesMenu">
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
                        :to="item.route"
                        active-class="router-link-active"
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

        <v-btn variant="text" to="/about" class="text-none nav-btn" active-class="router-link-active">{{ $t('menu.about') }}</v-btn>
        <v-btn variant="text" to="/contact" class="text-none nav-btn" active-class="router-link-active">{{ $t('menu.contact') }}</v-btn>
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
            :class="{ 'active': currentLocale === locale }"
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
import { ref, computed, onMounted, onBeforeUnmount } from 'vue'
import { useI18n } from 'vue-i18n'
import { useRouter } from 'vue-router'

const { locale, availableLocales } = useI18n()
const router = useRouter()
const currentLocale = computed(() => locale.value)
const servicesMenu = ref(null)
const isServicesMenuOpen = ref(false)
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

const changeLocale = (newLocale) => {
  locale.value = newLocale
  localStorage.setItem('userLocale', newLocale)
}

const navigateToService = (route) => {
  router.push(route)
  closeServicesMenu()
}

const closeServicesMenu = () => {
  hoverEnabled.value = false
  isServicesMenuOpen.value = false
  
  if (hoverTimeout) clearTimeout(hoverTimeout)
  
  hoverTimeout = setTimeout(() => {
    hoverEnabled.value = true
  }, 500)
}

const handleActivatorClick = () => {
  if (isMobile.value) {
    isServicesMenuOpen.value = !isServicesMenuOpen.value
  } else if (hoverEnabled.value) {
    isServicesMenuOpen.value = true
  }
}

const emit = defineEmits(['toggle-drawer'])

const toggleMobileMenu = () => {
  emit('toggle-drawer')
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
.v-app-bar {
  background-color: #b2d6ee !important;
  color: #252424 !important;
  z-index: 999 !important;
  top: 56px !important;
  position: sticky !important;
  overflow: visible !important;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.app-title {
  white-space: nowrap;
  overflow: visible;
  text-overflow: unset;
  min-width: max-content;
  margin-right: 16px;
  font-size: 1.25rem;
  font-weight: 600;
  color: #252424 !important;
}

/* Navigation buttons */
.nav-btn {
  font-size: 1rem;
  font-weight: 500;
  transition: all 0.3s ease;
  position: relative;
  letter-spacing: normal;
}

.nav-btn:hover,
.nav-btn.router-link-active {
  color: #005b96 !important;
  background-color: transparent !important;
}

.nav-btn.router-link-active::after {
  content: '';
  position: absolute;
  bottom: 8px;
  left: 50%;
  transform: translateX(-50%);
  width: 30px;
  height: 3px;
  background-color: #005b96;
  border-radius: 2px;
  transition: all 0.3s ease;
}

.nav-btn.active-link {
  color: #005b96 !important;
}

.nav-btn.active-link::after {
  content: '';
  position: absolute;
  bottom: 8px;
  left: 50%;
  transform: translateX(-50%);
  width: 30px;
  height: 3px;
  background-color: #005b96;
  border-radius: 2px;
}

/* Mega menu styles */
.mega-menu {
  max-width: 1280px;
  margin-top: 14px;
  background-color: #ddeaf1;
  left: 50% !important;
  transform: translateX(-50%) !important;
  animation: fadeInDown 0.3s ease-out;
  border-radius: 0 0 8px 8px;
}

.mega-menu-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 16px;
}

.close-button-wrapper {
  position: absolute;
  top: 12px;
  right: 12px;
  z-index: 1;
}

.close-megamenu {
  background-color: rgba(255, 255, 255, 0.9);
  transition: all 0.2s ease;
}

.close-megamenu:hover {
  transform: rotate(90deg);
}

/* Category styles */
.category-title {
  color: #005b96;
  font-weight: 600;
}

.category-divider {
  opacity: 0.8;
}

.category-list {
  background-color: transparent !important;
}

/* Service items */
.service-item {
  transition: all 0.2s ease;
  border-radius: 4px;
  margin-bottom: 4px;
}

.service-item:hover {
  background-color: rgba(0, 91, 150, 0.1) !important;
}

.service-item:active {
  transform: scale(0.98);
}

.service-item.router-link-active {
  background-color: rgba(0, 91, 150, 0.1) !important;
  color: #005b96 !important;
}

.service-item.router-link-active .v-icon {
  color: #005b96 !important;
}

.service-item .v-list-item__prepend .v-icon {
  transition: color 0.2s ease;
}

.service-item:hover .v-icon,
.service-item.router-link-active .v-icon {
  color: #005b96 !important;
}

/* Language selector */
.language-btn {
  font-weight: 500;
}

.language-list {
  padding: 8px 0;
}

.language-item {
  transition: all 0.2s ease;
  min-height: 40px;
}

.language-item:hover {
  background-color: rgba(0, 91, 150, 0.1) !important;
}

.language-item.active {
  background-color: rgba(0, 91, 150, 0.1) !important;
  color: #005b96;
}

.flag-icon {
  border-radius: 2px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
  object-fit: cover;
}

/* Animations */
@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateX(-50%) translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateX(-50%) translateY(0);
  }
}

/* Responsive adjustments */
@media (max-width: 960px) {
  .v-app-bar {
    top: 0 !important;
  }
  
  .app-title {
    font-size: 1.1rem;
    margin-right: 12px;
  }
  
  .mega-menu {
    margin-top: 0;
    border-radius: 0;
  }
}

@media (max-width: 600px) {
  .app-title {
    font-size: 1rem;
    margin-right: 8px;
  }
  
  .nav-btn {
    padding-left: 8px;
    padding-right: 8px;
    font-size: 0.9rem;
  }
  
  .mega-menu-container {
    padding: 0 8px;
  }
  
  .category-title {
    font-size: 1.1rem;
  }
}

/* Global transitions */
.v-list-item {
  transition: all 0.2s ease;
}

.v-btn:active {
  transform: scale(0.98);
}
</style>