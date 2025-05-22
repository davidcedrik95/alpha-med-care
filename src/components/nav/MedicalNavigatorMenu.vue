<template>
  <v-app-bar>
    <v-container class="d-flex align-center">
      <!-- Logo ou nom du site -->
      <v-toolbar-title>{{ $t('app.title') }}</v-toolbar-title>

      <v-spacer></v-spacer>

      <!-- Navigation principale -->
      <v-toolbar-items class="hidden-sm-and-down">
        <!-- Startseite -->
        <v-btn variant="text" to="/" class="text-none">{{ $t('menu.home') }}</v-btn>

        <!-- Dienstleistungen avec méga-menu -->
        <v-menu open-on-hover offset-y transition="slide-y-transition" close-delay="200">
          <template v-slot:activator="{ props }">
            <v-btn variant="text" v-bind="props" class="text-none">{{ $t('menu.services') }}</v-btn>
          </template>

          <v-card width="100vw" class="mx-auto" elevation="4">
            <v-container class="py-6 mega-menu-container">
              <v-row>
                <v-col cols="12" md="3" v-for="(category, index) in menuCategories" :key="index">
                  <div class="d-flex flex-column h-100 category-column">
                    <h3 class="text-h6 mb-2">{{ $t(`services.${category.key}`) }}</h3>
                    <v-divider class="mb-3" thickness="2" color="primary"></v-divider>
                    <v-list density="compact" class="pa-0 flex-grow-1">
                      <v-list-item
                        v-for="(item, itemIndex) in category.items"
                        :key="itemIndex"
                        :title="$t(`services.items.${item.key}`)"
                        class="px-0 list-item"
                        link
                      >
                        <template v-slot:append>
                          <v-icon icon="mdi-chevron-right" size="small" class="ml-0"></v-icon>
                        </template>
                      </v-list-item>
                    </v-list>
                    <v-divider v-if="index < menuCategories.length - 1" class="d-md-none mt-4"></v-divider>
                  </div>
                </v-col>
              </v-row>
            </v-container>
          </v-card>
        </v-menu>

        <!-- Über uns -->
        <v-btn variant="text" to="/about" class="text-none">{{ $t('menu.about') }}</v-btn>

        <!-- Contact -->
        <v-btn variant="text" to="/contact" class="text-none">{{ $t('menu.contact') }}</v-btn>
      </v-toolbar-items>

      <!-- Language switcher -->
      <v-menu offset-y>
        <template v-slot:activator="{ props }">
          <v-btn variant="text" v-bind="props" class="text-none">
            {{ currentLocale.toUpperCase() }}
          </v-btn>
        </template>
        <v-list>
          <v-list-item 
            v-for="locale in availableLocales" 
            :key="locale" 
            @click="changeLocale(locale)"
          >
            <v-list-item-title>{{ locale.toUpperCase() }}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>

      <!-- Menu mobile - seulement pour les petits écrans -->
      <v-app-bar-nav-icon class="hidden-md-and-up"></v-app-bar-nav-icon>
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
    key: "inspection",
    items: [
      { key: "stk" },
      { key: "mtk" },
      { key: "stu" },
      { key: "mtu" },
      { key: "dguv" },
      { key: "inspection" },
      { key: "visual" }
    ]
  },
  {
    key: "calibration",
    items: [
      { key: "ergometer" },
      { key: "thermometer" },
      { key: "blood_pressure" }
    ]
  },
  {
    key: "service",
    items: [
      { key: "repairs" },
      { key: "spare_parts" },
      { key: "delivery" },
      { key: "training" },
      { key: "disposal" }
    ]
  },
  {
    key: "maintenance",
    items: [
      { key: "mpbetreibv" },
      { key: "regular" },
      { key: "tests" }
    ]
  }
]
</script>

<style scoped>

.v-app-bar {
  top: auto !important;
  position: relative !important;
  box-shadow: none !important;
  border-top: 1px solid #e0e0e0;
  background-color: #b2d6ee !important;
  /* Vous pouvez soit modifier la valeur ci-dessus, soit ajouter un dégradé par exemple : */
  /* background: linear-gradient(to right, #b2d6ee, #5ab1f3); */
  color: rgb(37, 36, 36) !important;
}

.text-h6 {
  font-weight: 600;
  color: #005b96;
}

.v-list-item {
  margin-bottom: 4px;
}

.v-list-item:hover {
  color: #005b96;
  background-color: #f5f5f5;
}

.v-list--density-compact .v-list-item .v-list-item__append {
  margin-inline-start: 4px !important;
}

.v-list--density-compact .v-list-item {
  --v-list-item-padding-left: 0;
  --v-list-item-min-height: 32px;
}


</style>