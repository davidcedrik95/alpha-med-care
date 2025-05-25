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
    <!-- Barre de navigation header -->
    <div class="drawer-header">
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
    </div>

    <!-- Contenu principal -->
    <div class="drawer-content">
      <!-- Première carte pour le menu principal -->
      <v-card class="menu-card" flat>
        <v-list dense nav>
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

      <!-- Deuxième carte - Compte utilisateur -->
      <div class="account-section">
        <!-- Titre placé avant la carte -->
        <div class="section-header">
          <h3>{{ $t('account.title') }}</h3>
        </div>
        
        <!-- La carte elle-même -->
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
      </div>

      <!-- Troisième carte - Authentification -->
      <div class="auth-section">
        <!-- Titre placé avant la carte -->
        <div class="section-header">
          <h3>{{ $t('auth.authentication') }}</h3>
        </div>
        
        <!-- La carte elle-même -->
        <v-card class="auth-card" flat>
          <v-list dense>
            <v-list-item
              v-for="(item, index) in authItems"
              :key="'auth-'+index"
              :to="item.route"
              link
              @click="closeDrawer"
            >
              <template v-slot:prepend>
                <v-icon>{{ item.icon }}</v-icon>
              </template>
              <v-list-item-title>{{ $t(`auth.${item.key}`) }}</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-card>
      </div>
    </div>

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
  { title: 'Meine Rücksendungen', icon: 'mdi-undo-variant', route: '/returns' },
  { title: 'Informationen zur Rücksendungen', icon: 'mdi-information', route: '/return-info' },
  { title: 'Kontakteinstellungen', icon: 'mdi-account-cog', route: '/contact-settings' }
]

const authItems = [
  { key: "login", icon: "mdi-login", route: "/login" },
  { key: "register", icon: "mdi-account-plus", route: "/register" }
]

function closeDrawer() {
  drawer.value = false
}
</script>

<style scoped>
.navigation-drawer {
  display: flex;
  flex-direction: column;
  height: 100%;
  background: linear-gradient(135deg, #f0f4f8, #e6ebf1);
  box-shadow: 0 6px 20px rgb(0 0 0 / 0.08);
}

.drawer-header {
  background-color: #ffffff;
  padding: 12px 16px;
  display: flex;
  align-items: center;
  border-bottom: 1px solid #e0e0e0;
  position: sticky;
  top: 0;
  z-index: 2;
}

.drawer-header-content {
  display: flex;
  align-items: center;
  width: 100%;
  gap: 12px;
}

.title {
  font-weight: 600;
  font-size: 1.2rem;
  color: #333;
  flex-grow: 1;
}

.close-btn {
  margin-left: auto;
  color: #757575;
}

.drawer-content {
  flex: 1;
  overflow-y: auto;
  padding: 8px;
}

/* Styles optimisés pour la première carte (menu principal) */
.menu-card {
  background: #ffffff;
  box-shadow: inset 0 0 10px rgb(0 0 0 / 0.04);
  padding-top: 4px;
  transition: box-shadow 0.3s ease;
  margin-bottom: 8px;
  border-radius: 8px;
}

.menu-card:hover {
  box-shadow: inset 0 0 20px rgb(0 0 0 / 0.08);
}

.menu-card .v-list {
  padding: 0;
}

.menu-card .v-list-item {
  min-height: 40px;
  padding: 0 12px;
  margin: 1px 8px;
  transition: background-color 0.25s ease;
  border-radius: 6px;
}

.menu-card .v-list-item:hover {
  background-color: #dde6f3;
  cursor: pointer;
}

.menu-card .v-list-item--active, 
.menu-card .v-list-item--active:hover {
  background-color: #1976d2 !important;
  color: white !important;
}

.menu-card .v-list-item--active .v-icon,
.menu-card .v-list-item--active .v-list-item-title {
  color: white !important;
}

.menu-card .v-list-item__prepend {
  margin-right: 16px;
  color: #4a6572;
  font-size: 20px;
}

.menu-card .v-list-item-title {
  font-size: 0.875rem;
  font-weight: 500;
}

.menu-card .v-list-group__items .v-list-item {
  padding-left: 36px;
  margin: 1px 8px;
}

.menu-card .v-list-group--sub-group .v-list-item {
  padding-left: 48px;
  margin: 1px 8px;
}

.menu-card .v-list-group--sub-group .v-list-item__prepend {
  margin-right: 16px;
  color: #5a7d8a;
  font-size: 18px;
}

/* Style pour les sections */
.section-header {
  background: linear-gradient(135deg, #f0f4f8, #e6ebf1);
  padding: 10px 16px;
  margin: 8px 0 0 0;
  border-radius: 4px 4px 0 0;
}

.section-header h3 {
  margin: 0;
  font-size: 1rem;
  font-weight: 600;
  color: #2c3e50;
}

/* Styles optimisés pour account-card */
.account-section {
  margin-bottom: 12px;
}

.account-card {
  border-radius: 0 0 4px 4px;
  margin-bottom: 0;
  box-shadow: 0 1px 2px rgba(0,0,0,0.08);
  padding: 2px 0;
}

.account-card .v-list {
  padding: 0;
}

.account-card .v-list-item {
  min-height: 36px;
  padding: 0 12px;
  margin: 1px 4px;
  border-radius: 6px;
}

.account-card .v-list-item__prepend {
  margin-right: 12px;
  font-size: 18px;
}

.account-card .v-list-item-title {
  font-size: 0.825rem;
  font-weight: 500;
}

/* Styles pour la section d'authentification */
.auth-section {
  margin-bottom: 12px;
}

.auth-card {
  border-radius: 0 0 4px 4px;
  margin-bottom: 0;
  box-shadow: 0 1px 2px rgba(0,0,0,0.08);
  padding: 2px 0;
}

.auth-card .v-list {
  padding: 0;
  display: flex;
  flex-wrap: wrap;
}

.auth-card .v-list-item {
  min-height: 36px;
  padding: 0 12px;
  margin: 1px 4px;
  border-radius: 6px;
  width: calc(50% - 8px);
  box-sizing: border-box;
}

.auth-card .v-list-item__prepend {
  margin-right: 12px;
  font-size: 18px;
}

.auth-card .v-list-item-title {
  font-size: 0.825rem;
  font-weight: 500;
}

/* Social Footer */
.social-footer {
  padding: 12px 0;
  background-color: #d1d9e6;
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
  
  .drawer-header {
    padding: 10px 12px;
  }
  
  .title {
    font-size: 1.1rem;
  }

  .menu-card .v-list-item {
    min-height: 36px;
    padding: 0 10px;
  }
  
  .account-card .v-list-item,
  .auth-card .v-list-item {
    min-height: 32px;
  }
  
  .account-card .v-list-item__prepend,
  .auth-card .v-list-item__prepend {
    font-size: 16px;
    margin-right: 10px;
  }
  
  .account-card .v-list-item-title,
  .auth-card .v-list-item-title {
    font-size: 0.8rem;
  }

  .auth-card .v-list-item {
    width: calc(50% - 6px);
  }
}
</style>