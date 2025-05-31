<template>
  <v-app-bar>
    <v-container class="d-flex align-center">
        <!-- Logo / Titre du site -->
        <div class="title-container">
            <v-toolbar-title class="app-title flex-shrink-0" >{{ $t('app.title') }}</v-toolbar-title>
        </div>
        <v-spacer></v-spacer>

      <!-- Menu principal -->
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn variant="text" to="/" class="text-none nav-btn" active-class="router-link-active">{{ $t('menu.home') }}</v-btn>

        <!-- Mega-menu -->
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
              elevation="4"
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
  closeServicesMenu();
  router.push(route);
};

const closeServicesMenu = () => {
  isServicesMenuOpen.value = false;
  hoverEnabled.value = true;
  if (hoverTimeout) clearTimeout(hoverTimeout);
};

const handleActivatorClick = () => {
  if (isMobile.value) {
    isServicesMenuOpen.value = !isServicesMenuOpen.value;
  } else if (hoverEnabled.value) {
    isServicesMenuOpen.value = true;
  }
};
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
</script>

<style scoped>

.v-app-bar {
  background-color: rgba(12, 72, 129, 0.95) !important;
  color: white !important;
  z-index: 999 !important;
  top: 56px !important;
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
  padding-right: 16px; /* Espacement constant */
  margin-right: auto; /* Pousse le reste à droite */
}


/* Navigation buttons */
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

/* Mega menu styles */
.mega-menu {
  background: rgba(12, 72, 129, 1) !important;
  border-radius: 0 0 8px 8px;
  border: 1px solid rgba(255, 255, 255, 0.2);
  z-index: 1000;
}

/* Pour le wrapper du menu */

.mega-menu-wrapper {
  position: fixed;
  left: 0;
  right: 0;
  display: flex;
  justify-content: center;
  width: 100%;
  overflow-x: hidden;
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
  color: #0C4881F2!important;
  
}

.close-megamenu:hover {
  transform: rotate(90deg);
}

/* Category styles */
.category-title {
  color: white !important;
  font-weight: 600;
}

.category-divider {
  opacity: 0.5;
  background-color: rgba(255, 255, 255, 0.5) !important;
}

.category-list {
  background-color: transparent !important;
}

/* Service items */
.service-item {
  transition: all 0.2s ease;
  border-radius: 4px;
  margin-bottom: 4px;
  color: white !important;
}

.service-item:hover {
  background-color: rgba(255, 255, 255, 0.1) !important;
}

.service-item.router-link-active {
  background-color: rgba(255, 255, 255, 0.15) !important;
}

.service-item .v-icon {
  color: white !important;
  opacity: 0.8;
}

.service-item:hover .v-icon,
.service-item.router-link-active .v-icon {
  opacity: 1;
}

/* Language selector */
.language-btn {
  font-weight: 500;
  color: white !important;
}

.language-list {
  padding: 8px 0;
   background-color: rgba(12, 72, 129, 0.95) !important;
  border: 1px solid rgba(255, 255, 255, 0.2);
}

.language-item {
  transition: all 0.2s ease;
  min-height: 40px;
  color: white !important;
}

.language-item:hover {
  background-color: rgba(255, 255, 255, 0.1) !important;
}

.language-item.active {
  background-color: rgba(255, 255, 255, 0.15) !important;
}

.flag-icon {
  border-radius: 2px;
  object-fit: cover;
}

/* Responsive adjustments */
@media (max-width: 960px) {
  .v-app-bar {
    top: 0 !important;
   background-color: rgba(12, 72, 129, 0.95) !important;
  }
  
  .app-title {
    font-size: 1rem; /* Taille légèrement réduite */
  }
  
   .mega-menu {
    position: static;
    transform: none !important;
    left: auto !important;
    width: 100%;
    margin: 0 auto;
    border-radius: 0;
    border-left: none;
    border-right: none;
  }
  
  .mega-menu-wrapper {
    position: static;
  }

  .v-container {
    padding-left: 8px !important;
    padding-right: 8px !important;
  }
}

@media (max-width: 600px) {
  .app-title {
    font-size: 0.9rem; /* Taille encore plus petite */
   
    
  }
  .nav-btn {
    font-size: 0.9rem;
  }
  
  .mega-menu-container {
    padding: 0 8px;
  }
}


</style>