<template>
  <v-navigation-drawer
    v-model="drawer"
    app
    temporary
    absolute
    :width="drawerWidth"
    class="navigation-drawer"
    @click-outside="closeDrawer"
  >
    <!-- Première carte pour le menu principal -->
    <v-card class="menu-card" flat>
      <v-list dense nav>
        <!-- Header Drawer -->
        <v-list-item class="drawer-header">
          <div class="drawer-header-content">
            <v-icon size="36" color="#626363">mdi-menu-open</v-icon>
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
          <template v-slot:prepend>
            <v-icon>mdi-home</v-icon>
          </template>
          <v-list-item-title>{{ $t('menu.home') }}</v-list-item-title>
        </v-list-item>

        <!-- Menu déroulant Services -->
        <v-list-group value="Services">
          <template v-slot:activator="{ props }">
            <v-list-item v-bind="props">
              <template v-slot:prepend>
                <v-icon>mdi-cog</v-icon>
              </template>
              <v-list-item-title>{{ $t('menu.services') }}</v-list-item-title>
            </v-list-item>
          </template>

          <!-- Sous-menu Inspections -->
          <v-list-group value="Inspections" sub-group>
            <template v-slot:activator="{ props }">
              <v-list-item v-bind="props">
                <template v-slot:prepend>
                  <v-icon>mdi-clipboard-check</v-icon>
                </template>
                <v-list-item-title>{{ $t('menu.categories.inspections') }}</v-list-item-title>
              </v-list-item>
            </template>
            
            <v-list-item
              v-for="(item, index) in menuCategories[0].items"
              :key="'inspections-'+index"
              :to="item.route"
              link
              @click="closeDrawer"
            >
              <template v-slot:prepend>
                <v-icon>{{ item.icon }}</v-icon>
              </template>
              <v-list-item-title>
                {{ $t(`menu.items.${item.key}`) }}
              </v-list-item-title>
            </v-list-item>
          </v-list-group>

          <!-- Sous-menu Calibration -->
          <v-list-group value="Calibration" sub-group>
            <template v-slot:activator="{ props }">
              <v-list-item v-bind="props">
                <template v-slot:prepend>
                  <v-icon>mdi-tune</v-icon>
                </template>
                <v-list-item-title>{{ $t('menu.categories.calibration') }}</v-list-item-title>
              </v-list-item>
            </template>
            
            <v-list-item
              v-for="(item, index) in menuCategories[1].items"
              :key="'calibration-'+index"
              :to="item.route"
              link
              @click="closeDrawer"
            >
              <template v-slot:prepend>
                <v-icon>{{ item.icon }}</v-icon>
              </template>
              <v-list-item-title>
                {{ $t(`menu.items.${item.key}`) }}
              </v-list-item-title>
            </v-list-item>
          </v-list-group>

          <!-- Sous-menu Maintenance -->
          <v-list-group value="Maintenance" sub-group>
            <template v-slot:activator="{ props }">
              <v-list-item v-bind="props">
                <template v-slot:prepend>
                  <v-icon>mdi-wrench</v-icon>
                </template>
                <v-list-item-title>{{ $t('menu.categories.maintenance') }}</v-list-item-title>
              </v-list-item>
            </template>
            
            <v-list-item
              v-for="(item, index) in menuCategories[2].items"
              :key="'maintenance-'+index"
              :to="item.route"
              link
              @click="closeDrawer"
            >
              <template v-slot:prepend>
                <v-icon>{{ item.icon }}</v-icon>
              </template>
              <v-list-item-title>
                {{ $t(`menu.items.${item.key}`) }}
              </v-list-item-title>
            </v-list-item>
          </v-list-group>
        </v-list-group>

        <!-- Autres liens -->
        <v-list-item
          :to="'/products'"
          link
          @click="closeDrawer"
        >
          <template v-slot:prepend>
            <v-icon>mdi-cart</v-icon>
          </template>
          <v-list-item-title>{{ $t('menu.products') }}</v-list-item-title>
        </v-list-item>

        <v-list-item
          :to="'/contact'"
          link
          @click="closeDrawer"
        >
          <template v-slot:prepend>
            <v-icon>mdi-phone</v-icon>
          </template>
          <v-list-item-title>{{ $t('menu.contact') }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-card>

    <!-- Deuxième carte pour les réseaux sociaux et connexion -->
    <v-card class="social-card" flat>
      <!-- Header avec icônes réseaux sociaux -->
      <v-card-title class="social-header">
        <div class="social-icons">
          <v-btn icon variant="text" aria-label="Facebook">
            <v-icon color="#3b5998">mdi-facebook</v-icon>
          </v-btn>
          <v-btn icon variant="text" aria-label="Twitter">
            <v-icon color="#1da1f2">mdi-twitter</v-icon>
          </v-btn>
          <v-btn icon variant="text" aria-label="Instagram">
            <v-icon color="#e1306c">mdi-instagram</v-icon>
          </v-btn>
          <v-btn icon variant="text" aria-label="LinkedIn">
            <v-icon color="#0077b5">mdi-linkedin</v-icon>
          </v-btn>
        </div>
      </v-card-title>

      <!-- Liens Anmelden et Registrieren -->
      <v-card-actions class="auth-links">
        <v-btn variant="text" class="auth-link" to="/login">Anmelden</v-btn>
        <v-divider vertical></v-divider>
        <v-btn variant="text" class="auth-link" to="/register">Registrieren</v-btn>
      </v-card-actions>
    </v-card>
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

function closeDrawer() {
  drawer.value = false
}
</script>

<style scoped>
.navigation-drawer {
  background-color: #f5f7fa;
  display: flex;
  flex-direction: column;
}

.menu-card {
  flex: 1;
  overflow-y: auto;
}

.social-card {
  border-top: 1px solid #e0e0e0;
  padding: 16px 0;
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

/* Style pour aligner les icônes */
.v-list-item {
  padding-left: 16px;
}

.v-list-item__prepend {
  margin-right: 32px;
}

.v-list-group__items .v-list-item {
  padding-left: 40px;
}

/* Styles pour les sous-menus */
.v-list-group--sub-group .v-list-item {
  padding-left: 56px;
}

.v-list-group--sub-group .v-list-item__prepend {
  margin-right: 24px;
}

/* Styles pour la partie réseaux sociaux */
.social-header {
  padding: 8px 16px;
}

.social-icons {
  display: flex;
  justify-content: space-around;
  width: 100%;
}

.auth-links {
  display: flex;
  justify-content: center;
  padding: 8px 0;
}

.auth-link {
  flex: 1;
  text-align: center;
  text-decoration: underline;
  color: #1976d2;
}

@media (max-width: 599px) {
  .navigation-drawer {
    height: 100vh !important;
    top: 0 !important;
  }
}
</style>