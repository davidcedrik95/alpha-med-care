<template>
  <v-app-bar color="primary">
    <v-container class="d-flex align-center px-4">
      <!-- Logo -->
      <v-toolbar-title class="d-flex align-center">
        <v-img
          src="/logo.png"
          alt="Logo"
          max-height="40"
          max-width="120"
          contain
          class="mr-2"
        ></v-img>
      </v-toolbar-title>

      <v-spacer></v-spacer>

      <!-- Navigation desktop -->
      <v-toolbar-items class="hidden-sm-and-down">
        <v-btn variant="text" to="/" class="text-none nav-btn">{{ $t('menu.home') }}</v-btn>

        <!-- Mega Menu -->
        <v-menu
          open-on-hover
          :close-on-content-click="false"
          offset-y
          transition="slide-y-transition"
          content-class="centered-mega-menu"
        >
          <template v-slot:activator="{ props }">
            <v-btn variant="text" v-bind="props" class="text-none nav-btn">
              {{ $t('menu.services') }}
              <v-icon icon="mdi-chevron-down" size="small" class="ml-1"></v-icon>
            </v-btn>
          </template>

          <v-card width="100vw" class="mx-auto" elevation="4" style="margin-top: 15px;">
            <v-container>
              <v-row>
                <v-col
                  cols="12"
                  md="4"
                  v-for="(category, index) in menuCategories"
                  :key="index"
                  class="category-col"
                >
                  <div class="d-flex flex-column h-100">
                    <h3 class="text-h6 mb-2 category-title">
                      {{ $t(`menu.categories.${category.key}`) }}
                    </h3>
                    <v-divider class="mb-3" thickness="2" color="primary"></v-divider>
                    
                    <v-list density="compact" class="pa-0">
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
                          <v-icon icon="mdi-chevron-right" size="small"></v-icon>
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

      <!-- Language switcher -->
      <v-menu offset-y>
        <template v-slot:activator="{ props }">
          <v-btn variant="text" v-bind="props" class="text-none language-btn">
            {{ currentLocale.toUpperCase() }}
            <v-icon icon="mdi-chevron-down" size="small" class="ml-1"></v-icon>
          </v-btn>
        </template>
        <v-list>
          <v-list-item 
            v-for="locale in availableLocales" 
            :key="locale" 
            @click="changeLocale(locale)"
            :class="{ 'active-language': locale === currentLocale }"
          >
            <v-list-item-title>{{ locale.toUpperCase() }}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>

      <!-- Mobile menu button -->
      <v-app-bar-nav-icon 
        class="hidden-md-and-up" 
        @click="drawer = !drawer"
      ></v-app-bar-nav-icon>
    </v-container>
  </v-app-bar>

  <!-- Mobile navigation drawer -->
  <v-navigation-drawer
    v-model="drawer"
    temporary
    location="right"
    width="300"
  >
    <v-list>
      <v-list-item to="/" @click="drawer = false">{{ $t('menu.home') }}</v-list-item>
      
      <v-list-group :value="true">
        <template v-slot:activator="{ props }">
          <v-list-item v-bind="props" :title="$t('menu.services')"></v-list-item>
        </template>

        <v-list-item
          v-for="(category, index) in menuCategories"
          :key="index"
          :title="$t(`menu.categories.${category.key}`)"
          class="category-title-mobile"
        ></v-list-item>
          
        <v-list-item
          v-for="(item, itemIndex) in menuCategories.flatMap(c => c.items)"
          :key="'item-' + itemIndex"
          :title="$t(`menu.items.${item.key}`)"
          :prepend-icon="item.icon"
          :value="item.route"
          @click="navigateToService(item.route); drawer = false"
          class="px-8"
        ></v-list-item>
      </v-list-group>

      <v-list-item to="/about" @click="drawer = false">{{ $t('menu.about') }}</v-list-item>
      <v-list-item to="/contact" @click="drawer = false">{{ $t('menu.contact') }}</v-list-item>
      
      <v-divider class="my-2"></v-divider>
      
      <v-list-subheader>{{ $t('menu.language') }}</v-list-subheader>
      <v-list-item
        v-for="locale in availableLocales"
        :key="'lang-' + locale"
        @click="changeLocale(locale)"
      >
        <v-list-item-title>{{ locale.toUpperCase() }}</v-list-item-title>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useI18n } from 'vue-i18n'
import { useRouter } from 'vue-router'

const { locale, availableLocales } = useI18n()
const router = useRouter()
const drawer = ref(false)

const currentLocale = computed(() => locale.value)

const changeLocale = (newLocale) => {
  locale.value = newLocale
  localStorage.setItem('userLocale', newLocale)
  drawer.value = false
}

const navigateToService = (route) => {
  router.push(route)
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
  --primary-color: #005b96;
  --secondary-color: #e3f2fd;
  --hover-color: rgba(0, 91, 150, 0.08);
}

/* App Bar */
.v-app-bar {
  top: auto !important;
  position: relative !important;
  box-shadow: none !important;
  border-top: 1px solid #e0e0e0;
  background-color: #b2d6ee !important; /* Remplacement direct */
  color: rgb(37, 36, 36) !important;
}
/* Navigation buttons */
.nav-btn {
  font-weight: 500;
  letter-spacing: normal;
  transition: all 0.3s ease;
}

.nav-btn:hover {
  color: var(--primary-color) !important;
  background-color: var(--hover-color) !important;
}

/* Mega menu */
.centered-mega-menu {
  left: 50% !important;
  transform: translateX(-50%) !important;
  margin-top: 15px !important;
  max-width: 1280px;
  width: 100%;
}

.category-title {
  color: var(--primary-color);
  font-weight: 600;
}

.service-item {
  min-height: 38px;
  border-radius: 4px;
  transition: all 0.2s ease;
}

.service-item:hover {
  background-color: var(--hover-color);
  color: var(--primary-color);
}

.service-item :deep(.v-list-item__prepend) {
  margin-inline-end: 12px;
}

/* Language switcher */
.language-btn {
  font-weight: 500;
}

.active-language {
  color: var(--primary-color);
  background-color: var(--hover-color);
}

/* Mobile styles */
.category-title-mobile {
  font-weight: 600;
  color: var(--primary-color);
  background-color: var(--secondary-color);
}

@media (max-width: 959px) {
  .category-col {
    margin-bottom: 16px;
  }
  
  .category-col:last-child {
    margin-bottom: 0;
  }
}

@media (max-width: 599px) {
  .v-toolbar-title {
    font-size: 1.25rem;
  }
  
  .nav-btn {
    font-size: 0.875rem;
  }
}
</style>