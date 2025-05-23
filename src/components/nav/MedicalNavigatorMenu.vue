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
        <v-menu open-on-hover offset-y transition="slide-y-transition" close-delay="200">
          <template v-slot:activator="{ props }">
            <v-btn variant="text" v-bind="props" class="text-none nav-btn">{{ $t('menu.services') }}</v-btn>
          </template>

          <v-card width="100vw" class="mx-auto mega-menu" elevation="4" style="margin-top: 15px;">
            <v-container class="py-6 mega-menu-container">
              <v-row>
                <v-col cols="12" md="4" v-for="(category, index) in menuCategories" :key="index" class="category-col">

                  <div class="d-flex flex-column h-100 category-column">
                    <!-- Pour les titres de catégories -->
                    <h3 class="text-h6 mb-2 category-title">{{ $t(`menu.categories.${category.key}`) }}</h3>
                    <v-divider class="mb-3 category-divider" thickness="2" color="primary"></v-divider>
                    <v-list density="compact" class="pa-0 flex-grow-1 category-list">
                      <!-- Pour les items -->
                      <v-list-item
                        v-for="(item, itemIndex) in category.items"
                        :key="itemIndex"
                        :title="$t(`menu.items.${item.key}`)"
                        class="px-0 list-item service-item"
                        link
                      >
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
            {{ currentLocale.toUpperCase() }}
          </v-btn>
        </template>
        <v-list class="language-list">
          <v-list-item 
            v-for="locale in availableLocales" 
            :key="locale" 
            @click="changeLocale(locale)"
            class="language-item"
          >
            <v-list-item-title>{{ locale.toUpperCase() }}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>

      <!-- Menu mobile - seulement pour les petits écrans -->
      <v-app-bar-nav-icon class="hidden-md-and-up mobile-menu-icon"></v-app-bar-nav-icon>
    </v-container>
  </v-app-bar>
</template>

<script setup>
import { computed } from 'vue'
import { useI18n } from 'vue-i18n'

const { locale, availableLocales } = useI18n()

const currentLocale = computed(() => locale.value)

const changeLocale = (newLocale) => {
  locale.value = newLocale
  localStorage.setItem('userLocale', newLocale)
}

const menuCategories = [
  {
    key: "inspections",
    items: [
      { key: "stk_inspection" },
      { key: "mtk_inspection" },
      { key: "stue_inspection" },
      { key: "mtue_inspection" },
      { key: "dguv_inspection" },
      { key: "general_inspection" },
      { key: "visual_inspection" }
    ]
  },
  {
    key: "calibration",
    items: [
      { key: "ergometer_calibration" },
      { key: "thermometer_calibration" },
      { key: "blood_pressure_calibration" }
    ]
  },
  {
    key: "maintenance",
    items: [
      { key: "repairs" },
      { key: "spare_parts" },
      { key: "installation_service" },
      { key: "training" },
      { key: "equipment_disposal" },
      { key: "regular_maintenance" }
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
  font-size: 1rem;
  font-weight: 500;
  letter-spacing: normal;
}

/* Mega menu */
.mega-menu {
  max-width: 1280px;
  left: 50% !important;
  transform: translateX(-50%) !important;
}

.mega-menu-container {
  width: 100%;
  margin: 0;
}

/* Corrige le recentrage du mega-menu sur tous les écrans */
.v-menu__content.mega-menu {
  left: 50% !important;
  transform: translateX(-50%) !important;
  max-width: 1280px;
  width: 100vw;
}


.category-title {
  font-size: 1.125rem;
  font-weight: 600;
  color: var(--primary-color);
}

.category-list {
  font-size: 0.9375rem;
}

.service-item {
  min-height: 32px;
  margin-bottom: 4px;
}

.service-item:hover {
  color: var(--primary-color);
  background-color: var(--hover-bg);
}

.v-list--density-compact .v-list-item .v-list-item__append {
  margin-inline-start: 4px !important;
}

/* Language switcher */
.language-btn {
  font-size: 0.875rem;
}

.language-list {
  padding: 0.5rem 0;
}

.language-item {
  min-height: 40px;
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
}
</style>