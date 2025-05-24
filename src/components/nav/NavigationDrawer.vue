<template>
  <v-navigation-drawer
    v-model="model"
    temporary
    location="right"
    width="320"
    class="mobile-drawer"
  >
    <v-list>
      <!-- En-tête -->
      <v-list-item class="drawer-header">
        <template v-slot:prepend>
          <v-icon icon="mdi-chair-school" size="large" style="color: #626363;"/>
        </template>
        <v-list-item-title class="app-title">{{ $t('app.title') }}</v-list-item-title>
      </v-list-item>

      <v-divider/>

      <!-- Menu -->
      <v-list-item to="/" @click="model = false">
        <template v-slot:prepend>
          <v-icon icon="mdi-home"/>
        </template>
        <v-list-item-title>{{ $t('menu.home') }}</v-list-item-title>
      </v-list-item>

      <!-- Services avec sous-menus -->
      <v-list-group value="services">
        <template v-slot:activator="{ props }">
          <v-list-item v-bind="props">
            <template v-slot:prepend>
              <v-icon icon="mdi-cog"/>
            </template>
            <v-list-item-title>{{ $t('menu.services') }}</v-list-item-title>
          </v-list-item>
        </template>

        <v-list-item
          v-for="(category, i) in menuCategories"
          :key="i"
          :value="category.key"
          @click="navigateTo(category.items[0].route)"
        >
          <v-list-item-title>
            {{ $t(`menu.categories.${category.key}`) }}
          </v-list-item-title>
        </v-list-item>
      </v-list-group>

      <!-- Autres liens -->
      <v-list-item to="/about" @click="model = false">
        <template v-slot:prepend>
          <v-icon icon="mdi-information"/>
        </template>
        <v-list-item-title>{{ $t('menu.about') }}</v-list-item-title>
      </v-list-item>

      <v-list-item to="/contact" @click="model = false">
        <template v-slot:prepend>
          <v-icon icon="mdi-email"/>
        </template>
        <v-list-item-title>{{ $t('menu.contact') }}</v-list-item-title>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script setup>
import { computed } from 'vue'
import { useRouter } from 'vue-router'

const props = defineProps({
  modelValue: Boolean
})

const emit = defineEmits(['update:modelValue'])
const router = useRouter()

const model = computed({
  get: () => props.modelValue,
  set: (value) => emit('update:modelValue', value)
})

const navigateTo = (route) => {
  router.push(route)
  model.value = false
}

const menuCategories = [
  {
    key: "inspections",
    items: [
      { key: "stk_inspection", icon: "mdi-car-brake-alert", route: "/services/stk" }
    ]
  },
  {
    key: "calibration",
    items: [
      { key: "ergometer_calibration", icon: "mdi-bike", route: "/services/ergometer" }
    ]
  },
  {
    key: "maintenance",
    items: [
      { key: "repairs", icon: "mdi-tools", route: "/services/repairs" }
    ]
  }
]
</script>

<style scoped>
.mobile-drawer {
 z-index: 1002; /* Entre le header (1000) et la recherche mobile (1001) */
}

.drawer-header {
  background: rgba(178, 214, 238, 0.2);
}

.app-title {
  font-weight: bold;
  color: #626363 !important;
  font-size: 1rem;
}

.v-list-item {
  margin: 4px 8px;
  border-radius: 8px;
}
</style>