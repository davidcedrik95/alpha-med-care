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

    <!-- Deuxième carte pour les options de compte -->
    <v-card class="account-card" flat>
      <v-list dense>
        <v-list-item
          v-for="(item, index) in accountItems"
          :key="'account-'+index"
          :to="item.route"
          link
          @click="closeDrawer"
        >
          <template v-slot:prepend>
            <v-icon>{{ item.icon }}</v-icon>
          </template>
          <v-list-item-title>{{ item.title }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-card>

    <!--  Troisième carte pour la connexion -->
    <v-card class="social-card" flat>
      <!-- Liens Anmelden et Registrieren -->
      <v-card-actions class="auth-links">
        <v-btn variant="text" class="auth-link" to="/login">Anmelden</v-btn>
        <v-divider vertical></v-divider>
        <v-btn variant="text" class="auth-link" to="/register">Registrieren</v-btn>
      </v-card-actions>
    </v-card>

    <!-- Footer avec icônes réseaux sociaux -->
    <footer class="social-footer">
      <div class="social-links">
        <v-btn icon variant="text" aria-label="Facebook" color="#3b5998">
          <v-icon>mdi-facebook</v-icon>
        </v-btn>
        <v-btn icon variant="text" aria-label="Twitter" color="#1da1f2">
          <v-icon>mdi-twitter</v-icon>
        </v-btn>
        <v-btn icon variant="text" aria-label="Instagram" color="#e1306c">
          <v-icon>mdi-instagram</v-icon>
        </v-btn>
        <v-btn icon variant="text" aria-label="WhatsApp" color="#25D366">
          <v-icon>mdi-whatsapp</v-icon>
        </v-btn>
      </div>
    </footer>
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

const accountItems = [
  { title: 'Mein Konto', icon: 'mdi-account', route: '/account' },
  { title: 'Meine Bestellungen', icon: 'mdi-package-variant', route: '/orders' },
  { title: 'Meine Rücksendungen', icon: 'mdi-truck-return', route: '/returns' },
  { title: 'Informationen zur Rücksendungen', icon: 'mdi-information', route: '/return-info' },
  { title: 'Kontakteinstellungen', icon: 'mdi-account-cog', route: '/contact-settings' }
]

function closeDrawer() {
  drawer.value = false
}
</script>

<style scoped>
.navigation-drawer {
  background: linear-gradient(135deg, #f0f4f8, #e6ebf1);
  display: flex;
  flex-direction: column;
  box-shadow: 0 6px 20px rgb(0 0 0 / 0.08);
}

.menu-card {
  flex: 1;
  overflow-y: auto;
  background: #ffffff;
  box-shadow: inset 0 0 10px rgb(0 0 0 / 0.04);
  padding-top: 8px;
  transition: box-shadow 0.3s ease;
}

.menu-card:hover {
  box-shadow: inset 0 0 20px rgb(0 0 0 / 0.08);
}

.social-card, .account-card {
  background: #fff;
  border-top: 1px solid #d1d9e6;
  box-shadow: 0 -2px 6px rgb(0 0 0 / 0.04);
  padding: 12px 24px;
}

.drawer-header {
  border-bottom: 1px solid #ccd6e3;
  padding: 12px 24px;
}

.drawer-header-content {
  display: flex;
  align-items: center;
  width: 100%;
  gap: 12px;
}

.title {
  font-weight: 700;
  font-size: 1.3rem;
  color: #2c3e50;
  user-select: none;
}

.close-btn {
  margin-left: auto;
  color: #606f7b;
  transition: color 0.3s ease;
}

.close-btn:hover {
  color: #e74c3c;
}

.v-list-item {
  padding-left: 20px;
  transition: background-color 0.25s ease;
  border-radius: 8px;
  margin: 2px 12px;
}

.v-list-item:hover {
  background-color: #dde6f3;
  cursor: pointer;
}

.v-list-item--active, .v-list-item--active:hover {
  background-color: #1976d2 !important;
  color: white !important;
}

.v-list-item--active .v-icon,
.v-list-item--active .v-list-item-title {
  color: white !important;
}

.v-list-item__prepend {
  margin-right: 28px;
  color: #4a6572;
  font-size: 22px;
}

.v-list-group__items .v-list-item {
  padding-left: 48px;
  margin: 2px 8px;
}

.v-list-group--sub-group .v-list-item {
  padding-left: 64px;
  margin: 2px 8px;
}

.v-list-group--sub-group .v-list-item__prepend {
  margin-right: 20px;
  color: #5a7d8a;
  font-size: 20px;
}

/* Auth links */
.auth-links {
  display: flex;
  justify-content: space-around;
  padding: 10px 0;
  border-top: 1px solid #d1d9e6;
}

.auth-link {
  flex: 1;
  text-align: center;
  text-decoration: underline;
  color: #1976d2;
  font-weight: 600;
  font-size: 1rem;
  transition: color 0.3s ease;
}

.auth-link:hover {
  color: #0d47a1;
}

/* Social Footer */
.social-footer {
  padding: 16px 0;
  background-color: #f8fafc;
  border-top: 1px solid #d1d9e6;
}

.social-links {
  display: flex;
  justify-content: center;
  gap: 12px;
}

.social-links .v-btn:hover .v-icon {
  transform: scale(1.2);
  transition: transform 0.3s ease;
}

/* Responsive tweaks */
@media (max-width: 599px) {
  .navigation-drawer {
    height: 100vh !important;
    top: 0 !important;
  }
}
</style>