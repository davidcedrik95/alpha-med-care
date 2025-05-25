<template>
  <v-navigation-drawer
    v-model="drawer"
    app
    temporary
    :width="drawerWidth"
    class="navigation-drawer"
    @click-outside="closeDrawer"
  >
    <v-list dense nav>
      <!-- Header Drawer -->
      <v-list-item class="drawer-header">
        <div class="drawer-header-content">
          <v-icon size="36" color="#626363">mdi-chair-school</v-icon>
          <span class="title">{{ $t('app.title') }}</span>
          <v-btn
            icon
            @click.stop="closeDrawer"
            variant="text"
            aria-label="Close drawer"
            class="close-btn"
          >
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </div>
      </v-list-item>

      <v-divider></v-divider>

      <!-- Menu principal -->
      <v-list-item
        :to="'/'"
        link
        @click="closeDrawer"
      >
        <v-list-item-icon>
          <v-icon>mdi-home</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>{{ $t('menu.home') }}</v-list-item-title>
        </v-list-item-content>
      </v-list-item>

      <!-- Menu déroulant Services -->
      <v-list-group prepend-icon="mdi-cog" no-action>
        <template #activator="{ props }">
          <v-list-item v-bind="props">
            <v-list-item-content>
              <v-list-item-title>{{ $t('menu.services') }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>

        <v-list-item
          v-for="(category, index) in menuCategories"
          :key="index"
          :to="{ name: category.route }"
          link
          @click="closeDrawer"
        >
          <v-list-item-icon>
            <v-icon>{{ category.icon }}</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>
              {{ $t(`menu.categories.${category.key}`) }}
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-group>

      <!-- Autres liens -->
      <v-list-item
        :to="'/products'"
        link
        @click="closeDrawer"
      >
        <v-list-item-icon>
          <v-icon>mdi-cart</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>{{ $t('menu.products') }}</v-list-item-title>
        </v-list-item-content>
      </v-list-item>

      <v-list-item
        :to="'/contact'"
        link
        @click="closeDrawer"
      >
        <v-list-item-icon>
          <v-icon>mdi-phone</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title>{{ $t('menu.contact') }}</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script setup>
import { computed, ref, onMounted, onUnmounted } from 'vue'
import { defineProps, defineEmits } from 'vue'

const props = defineProps({
  modelValue: Boolean
})
const emit = defineEmits(['update:modelValue'])

const drawer = computed({
  get: () => props.modelValue,
  set: (value) => emit('update:modelValue', value)
})

const windowWidth = ref(window.innerWidth)
const updateWidth = () => (windowWidth.value = window.innerWidth)

onMounted(() => window.addEventListener('resize', updateWidth))
onUnmounted(() => window.removeEventListener('resize', updateWidth))

const drawerWidth = computed(() => (windowWidth.value < 600 ? windowWidth.value : 300))

const menuCategories = [
  { key: 'stk', route: 'stk', icon: 'mdi-medical-bag' },
  { key: 'mtk', route: 'mtk', icon: 'mdi-stethoscope' },
  { key: 'calibration', route: 'calibration', icon: 'mdi-tune' },
  { key: 'maintenance', route: 'maintenance', icon: 'mdi-wrench' }
]

function closeDrawer() {
  drawer.value = false
}
</script>

<style scoped>
.navigation-drawer {
  background-color: #f5f7fa;
}

.drawer-header {
  border-bottom: 1px solid #ddd;
}
.drawer-header-content {
  display: flex;
  align-items: center;
  width: 100%;
}

.title {
  margin-left: 8px;
  font-weight: bold;
  font-size: 1.2rem;
}

.close-btn {
  margin-left: auto;
}
</style>
