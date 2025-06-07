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
        <v-icon size="36" color="white">mdi-menu-open</v-icon>
        <span class="title">{{ $t('app.title') }}</span>
        <v-btn
          icon
          @click.stop="closeDrawer"
          variant="text"
          aria-label="Close drawer"
          class="close-btn"
        >
          <v-icon color="white">mdi-close</v-icon>
        </v-btn>
      </div>
    </div>

    <!-- Contenu principal -->
    <div class="drawer-content">
      <!-- Première carte pour le menu principal -->
      <v-card class="menu-card" flat>
        <v-list dense nav>
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

          <hr class="custom-divider">

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
              
              <template v-for="(item, index) in menuCategories[0].items" :key="'inspections-'+index">
                <v-list-item
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
                <hr class="custom-divider submenu-divider" v-if="index < menuCategories[0].items.length - 1">
              </template>
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
              
              <template v-for="(item, index) in menuCategories[1].items" :key="'calibration-'+index">
                <v-list-item
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
                <hr class="custom-divider submenu-divider" v-if="index < menuCategories[1].items.length - 1">
              </template>
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
              
              <template v-for="(item, index) in menuCategories[2].items" :key="'maintenance-'+index">
                <v-list-item
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
                <hr class="custom-divider submenu-divider" v-if="index < menuCategories[2].items.length - 1">
              </template>
            </v-list-group>
          </v-list-group>

          <hr class="custom-divider">

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

          <hr class="custom-divider">

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
            <template v-for="(item, index) in accountItems" :key="'account-'+index">
              <v-list-item
                :to="item.route"
                link
                @click="closeDrawer"
              >
                <template v-slot:prepend>
                  <v-icon>{{ item.icon }}</v-icon>
                </template>
                <v-list-item-title>{{ item.title }}</v-list-item-title>
              </v-list-item>
              <hr class="custom-divider" v-if="index < accountItems.length - 1">
            </template>
            
            <!-- Séparateur principal -->
            <hr class="custom-divider main-divider">
            
            <!-- Nouveaux éléments dépliables -->
            <v-list-group
              v-for="(item, index) in infoItems"
              :key="'info-'+index"
              :value="item.title"
            >
              <template v-slot:activator="{ props }">
                <v-list-item v-bind="props">
                  <template v-slot:prepend>
                    <v-icon>{{ item.icon }}</v-icon>
                  </template>
                  <v-list-item-title>{{ item.title }}</v-list-item-title>
                  <template v-slot:append>
                    <v-icon>mdi-plus</v-icon>
                  </template>
                </v-list-item>
                <!-- Ligne horizontale sous chaque titre -->
                <hr class="custom-divider" v-if="index < infoItems.length - 1">
              </template>
              
              <template v-for="(subItem, subIndex) in item.items" :key="'subinfo-'+index+'-'+subIndex">
                <v-list-item
                  :to="subItem.route"
                  link
                  @click="closeDrawer"
                >
                  <v-list-item-title>{{ subItem.title }}</v-list-item-title>
                </v-list-item>
                <hr class="custom-divider submenu-divider" v-if="subIndex < item.items.length - 1">
              </template>
            </v-list-group>
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
            <template v-for="(item, index) in authItems" :key="'auth-'+index">
              <v-list-item
                :to="item.route"
                link
                @click="closeDrawer"
              >
                <template v-slot:prepend>
                  <v-icon>{{ item.icon }}</v-icon>
                </template>
                <v-list-item-title>{{ $t(`auth.${item.key}`) }}</v-list-item-title>
              </v-list-item>
              <hr class="custom-divider" v-if="index < authItems.length - 1">
            </template>
          </v-list>
        </v-card>
      </div>
    </div>
  </v-navigation-drawer>
</template>

<script setup>
import { computed, ref, onMounted, onUnmounted } from 'vue'
import { defineProps, defineEmits } from 'vue'
import { useI18n } from 'vue-i18n'
const { t } = useI18n()

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

const drawerWidth = computed(() => {
  if (windowWidth.value < 600) return windowWidth.value;
  if (windowWidth.value >= 768 && windowWidth.value <= 1024) {
    return Math.min(windowWidth.value * 0.6, 450);
  }
  return 350;
});

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

const accountItems = computed(() => [
  { title: t('account.items.my_account'), icon: 'mdi-account', route: '/account' },
  { title: t('account.items.my_orders'), icon: 'mdi-package-variant', route: '/orders' },
  { title: t('account.items.my_returns'), icon: 'mdi-undo-variant', route: '/returns' },
  { title: t('account.items.return_info'), icon: 'mdi-information', route: '/return-info' },
  { title: t('account.items.contact_settings'), icon: 'mdi-message-settings', route: '/contact-settings' }
])

const infoItems = computed(() => [
  {
    title: t('info.help.title'),
    icon: 'mdi-help-circle',
    items: [
      { title: t('info.help.items.faq'), route: '/help/faq' },
      { title: t('info.help.items.shipping'), route: '/help/shipping' },
      { title: t('info.help.items.payment'), route: '/help/payment' },
      { title: t('info.help.items.privacy'), route: '/help/privacy' },
      { title: t('info.help.items.terms'), route: '/help/terms' }
    ]
  },
  {
    title: t('info.about.title'),
    icon: 'mdi-information',
    items: [
      { title: t('info.about.items.about_us'), route: '/about' },
      { title: t('info.about.items.career'), route: '/career' },
      { title: t('info.about.items.locations'), route: '/locations' },
      { title: t('info.about.items.partners'), route: '/partners' },
      { title: t('info.about.items.press'), route: '/press' }
    ]
  }
])

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
  position: fixed !important;
  top: 0 !important;
  left: 0 !important;
  height: 100vh !important;
  transform: translateX(-100%);
  transition: transform 0.3s ease;
  z-index: 1200;
}

.navigation-drawer.v-navigation-drawer--active {
  transform: translateX(0);
  box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
}

.drawer-header {
  background-color: #0C4881F2 !important;
  padding: 14px 16px;
  padding-top: calc(14px + env(safe-area-inset-top));
  display: flex;
  align-items: center;
  border-bottom: 1px solid rgba(255, 255, 255, 0.15);
}

.drawer-header-content {
  display: flex;
  align-items: center;
  width: 100%;
  gap: 12px;
}

.title {
  font-weight: 600;
  font-size: 1.25rem;
  color: white;
  flex-grow: 1;
  letter-spacing: 0.5px;
}

.close-btn {
  margin-left: auto;
  color: white;
  opacity: 0.8;
  transition: opacity 0.2s ease;
}

.close-btn:hover {
  opacity: 1;
}

.drawer-content {
  flex: 1;
  overflow-y: auto;
  padding: 12px 8px;
  background: #ffffff;
}

.menu-card,
.account-card,
.auth-card {
  background: #ffffff;
  border-radius: 10px;
  margin-bottom: 16px;
  border: 1px solid #eaeaea;
  overflow: hidden;
  transition: all 0.3s ease;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.v-list {
  background: transparent !important;
  color: #2c3e50 !important;
  padding: 4px 0 !important;
}

.v-list-item {
  color: #2c3e50 !important;
  min-height: 48px;
  padding: 0 16px !important;
}

.v-list-item__prepend {
  margin-right: 16px;
}

.v-list-item__prepend .v-icon {
  color: #7f8c8d !important;
  opacity: 0.9;
}

.v-list-item-title {
  font-size: 0.9rem;
  font-weight: 500;
  letter-spacing: 0.2px;
  color: #2c3e50 !important;
}

.v-list-item:hover {
  background-color: #f8f9fa !important;
}

.v-list-item--active {
  background-color: #e3f2fd !important;
  color: #1976d2 !important;
}

.v-list-group__items .v-list-item {
  padding-left: 48px !important;
}

.section-header {
  background: #f8f9fa;
  padding: 12px 16px;
  margin: 0 0 4px 0;
  border-radius: 10px 10px 0 0;
  border-bottom: 1px solid #eaeaea;
}

.section-header h3 {
  margin: 0;
  font-size: 0.95rem;
  font-weight: 600;
  color: #2c3e50;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.custom-divider {
  border: none;
  height: 1px;
  background-color: rgba(0, 0, 0, 0.08);
  margin: 4px 16px;
}

.main-divider {
  margin: 8px 16px;
}

.submenu-divider {
  margin-left: 48px;
  margin-right: 16px;
}

.v-list-group--active .v-list-group__items {
  max-height: 1000px !important;
}

.v-list-group__items {
  transition: max-height 0.5s ease-in-out;
}

@media (min-width: 768px) and (max-width: 1024px) {
  .navigation-drawer {
    width: 400px !important;
  }

  .v-list-item {
    min-height: 52px;
  }

  .v-list-item-title {
    font-size: 1rem;
  }

  .v-icon {
    font-size: 1.4rem;
  }

  .v-list-group__items .v-list-item {
    padding-left: 56px !important;
  }

  .section-header h3 {
    font-size: 1.1rem;
  }

  .drawer-header {
    padding: 16px 20px;
  }

  .title {
    font-size: 1.4rem;
  }

  .drawer-content {
    padding: 16px 12px;
  }

  .custom-divider {
    margin: 8px 28px;
  }
  
  .submenu-divider {
    margin-left: 56px;
    margin-right: 28px;
  }
  
  .main-divider {
    margin: 12px 28px;
  }
}

@media (max-width: 599px) {
  .v-list-item {
    min-height: 44px;
    padding: 0 12px !important;
  }

  .custom-divider {
    margin: 4px 12px;
  }
  
  .submenu-divider {
    margin-left: 44px;
  }
}

.v-list-item {
  transition: background-color 0.2s ease;
}

.v-icon {
  transition: color 0.2s ease;
}
</style>