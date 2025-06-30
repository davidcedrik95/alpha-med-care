<template>
  <v-navigation-drawer
    v-model="drawer"
    app
    temporary
    absolute
    :width="drawerWidth"
    class="navigation-drawer"
    :style="drawerStyle"
    @click-outside="closeDrawer"
  >
    <div class="drawer-content">
      <v-card class="menu-card" flat>
        <v-list dense nav>
          <v-list-item :to="'/'">
            <template v-slot:prepend>
              <v-icon>mdi-home</v-icon>
            </template>
            <v-list-item-title>{{ $t('menu.home') }}</v-list-item-title>
          </v-list-item>

          <hr class="custom-divider">

          <v-list-group value="Services">
            <template v-slot:activator="{ props }">
              <v-list-item v-bind="props">
                <template v-slot:prepend>
                  <v-icon>mdi-cog</v-icon>
                </template>
                <v-list-item-title>{{ $t('menu.services') }}</v-list-item-title>
              </v-list-item>
            </template>

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
                <v-list-item :to="item.route">
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
                <v-list-item :to="item.route">
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
                <v-list-item :to="item.route">
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

          <v-list-item :to="'/products'">
            <template v-slot:prepend>
              <v-icon>mdi-cart</v-icon>
            </template>
            <v-list-item-title>{{ $t('menu.products') }}</v-list-item-title>
          </v-list-item>

          <hr class="custom-divider">

          <v-list-item :to="'/contact'">
            <template v-slot:prepend>
              <v-icon>mdi-phone</v-icon>
            </template>
            <v-list-item-title>{{ $t('menu.contact') }}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-card>

      <div class="account-section">
        <div class="section-header">
          <h3>{{ $t('account.title') }}</h3>
        </div>
        
        <v-card class="account-card" flat>
          <v-list dense>
            <template v-for="(item, index) in accountItems" :key="'account-'+index">
              <v-list-item :to="item.route">
                <template v-slot:prepend>
                  <v-icon>{{ item.icon }}</v-icon>
                </template>
                <v-list-item-title>{{ item.title }}</v-list-item-title>
              </v-list-item>
              <hr class="custom-divider" v-if="index < accountItems.length - 1">
            </template>
            
            <hr class="custom-divider main-divider">
            
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
                </v-list-item>
                <hr class="custom-divider" v-if="index < infoItems.length - 1">
              </template>
              
              <template v-for="(subItem, subIndex) in item.items" :key="'subinfo-'+index+'-'+subIndex">
                <v-list-item :to="subItem.route">
                  <v-list-item-title>{{ subItem.title }}</v-list-item-title>
                </v-list-item>
                <hr class="custom-divider submenu-divider" v-if="subIndex < item.items.length - 1">
              </template>
            </v-list-group>
          </v-list>
        </v-card>
      </div>
      
      <div class="auth-section">
        <div class="section-header">
          <h3>{{ $t('auth.authentication') }}</h3>
        </div>
        
        <v-card class="auth-card" flat>
          <v-list dense>
            <template v-for="(item, index) in authItems" :key="'auth-'+index">
              <v-list-item :to="item.route">
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
      
      <div class="language-copyright-section">
        <div class="section-header">
          <h3>{{ $t('language') }}</h3>
        </div>
        
        <v-card class="language-copyright-card" flat>
          <div class="language-selector">
            <span class="language-text">{{ $t('language') }}</span>
            <div class="vertical-divider"></div>
            <div class="flags">
              <div 
                class="flag-icon" 
                :class="{ active: currentLanguage === 'de' }"
                @click="changeLanguage('de')"
              >
                <img src="/images/flags/de.png" alt="Deutsch" class="flag-img">
              </div>
              <div 
                class="flag-icon" 
                :class="{ active: currentLanguage === 'en' }"
                @click="changeLanguage('en')"
              >
                <img src="/images/flags/en.png" alt="English" class="flag-img">
              </div>
              <div 
                class="flag-icon" 
                :class="{ active: currentLanguage === 'fr' }"
                @click="changeLanguage('fr')"
              >
                <img src="/images/flags/fr.png" alt="Français" class="flag-img">
              </div>
            </div>
          </div>

          <hr class="custom-divider">

          <div class="copyright-version">
            <div class="copyright">
              {{ $t('footer.copyright', { year: new Date().getFullYear(), company: $t('company.name') }) }}
            </div>
            <div class="app-version">
              v{{ appVersion }}
            </div>
          </div>
        </v-card>
      </div>
    </div>
  </v-navigation-drawer>
</template>

<script setup>
import { computed, ref, onMounted, onUnmounted } from 'vue'
import { defineProps, defineEmits } from 'vue'
import { useI18n } from 'vue-i18n'

const { t, locale } = useI18n({ useScope: 'global' })
const props = defineProps({
  modelValue: Boolean,
  navbarHeight: { type: Number, default: 0 }
})
const emit = defineEmits(['update:modelValue'])

const drawerStyle = computed(() => ({
  top: `${props.navbarHeight}px`,
  height: `calc(100vh - ${props.navbarHeight}px)`
}))

const drawer = computed({
  get: () => props.modelValue,
  set: (value) => emit('update:modelValue', value)
})

const windowWidth = ref(window.innerWidth)
const updateWidth = () => (windowWidth.value = window.innerWidth)

onMounted(() => {
  window.addEventListener('resize', updateWidth)
  const savedLang = localStorage.getItem('userLanguage')
  if (savedLang) {
    locale.value = savedLang
    currentLanguage.value = savedLang
  }
})
onUnmounted(() => window.removeEventListener('resize', updateWidth))

const drawerWidth = computed(() => {
  if (windowWidth.value < 400) return windowWidth.value * 0.85
  if (windowWidth.value < 600) return Math.min(windowWidth.value * 0.75, 320)
  if (windowWidth.value >= 768 && windowWidth.value <= 1024) return Math.min(windowWidth.value * 0.6, 450)
  return 370
})

const appVersion = "1.2.5"
const currentLanguage = ref(locale.value)

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

function changeLanguage(lang) {
  locale.value = lang
  currentLanguage.value = lang
  localStorage.setItem('userLanguage', lang)
  closeDrawer()
}
</script>

<style scoped>
.navigation-drawer {
  position: fixed !important;
  top: 0;
  left: 0;
  transform: translateX(-100%);
  transition: transform 0.3s ease;
  z-index: 1200;
}

.navigation-drawer.v-navigation-drawer--active {
  transform: translateX(0);
  box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
}

.drawer-content {
  flex: 1;
  overflow-y: auto;
  padding: 12px 8px;
  padding-top: 20px;
  margin-top: 20px;
  
}


.menu-card,
.account-card,
.auth-card,
.language-copyright-card {
  background: #ffffff;
  border-radius: 10px;
  margin-bottom: 16px;
  border: 1px solid #eaeaea;
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
  margin-right: 10px;
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
  padding-left: 20px !important;
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
  margin-left: 20px !important;
  margin-right: 16px;
}

@media (max-width: 599px) {
  .v-list-item {
    min-height: 42px;
    padding: 0 10px !important;
  }

  .v-list-item__prepend {
    margin-right: 8px !important;
  }

  .v-list-item-title {
    font-size: 0.82rem !important;
  }

  .v-list-group__items .v-list-item {
    padding-left: 18px !important;
  }
  
  .submenu-divider {
    margin-left: 18px !important;
    margin-right: 10px;
  }

  .v-icon {
    font-size: 16px !important;
  }

  .section-header h3 {
    font-size: 0.85rem !important;
  }
  
  .custom-divider {
    margin: 4px 10px;
  }
}

.language-copyright-section {
  margin-top: 16px;
}

.language-copyright-card {
  padding: 16px 0;
}

.language-selector {
  display: flex;
  align-items: center;
  padding: 0 16px 8px;
  gap: 12px;
}

.language-text {
  font-weight: 500;
  color: #2c3e50;
  font-size: 0.95rem;
  min-width: 70px;
}

.vertical-divider {
  height: 24px;
  width: 1px;
  background-color: rgba(0, 0, 0, 0.12);
}

.flags {
  display: flex;
  gap: 8px;
}

.flag-icon {
  width: 32px;
  height: 24px;
  border-radius: 3px;
  overflow: hidden;
  cursor: pointer;
  transition: all 0.2s ease;
  opacity: 0.7;
  border: 1px solid transparent;
}

.flag-icon:hover {
  opacity: 0.9;
}

.flag-icon.active {
  opacity: 1;
  border-color: #3a7bd5;
}

.flag-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.copyright-version {
  padding: 8px 16px 0;
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.copyright {
  text-align: center;
  font-size: 0.75rem;
  color: #7f8c8d;
  line-height: 1.4;
}

.app-version {
  text-align: center;
  font-size: 0.75rem;
  color: #666;
  background: rgba(0,0,0,0.05);
  padding: 2px 8px;
  border-radius: 12px;
  font-family: monospace;
  align-self: center;
}

@media (max-width: 599px) {
  .language-selector {
    padding: 0 12px 6px;
  }
  
  .flag-icon {
    width: 28px;
    height: 21px;
  }
  
  .copyright {
    font-size: 0.7rem;
  }
  
  .app-version {
    font-size: 0.7rem;
    padding: 2px 6px;
  }
}
</style>