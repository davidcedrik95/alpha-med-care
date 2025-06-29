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
      
      <!-- Quatrième carte - Langue et copyright -->
      <div class="language-copyright-section">
        <!-- Titre placé avant la carte -->
        <div class="section-header">
          <h3>{{ $t('language') }}</h3>
        </div>
        
        <!-- La carte elle-même -->
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
  navbarHeight: {
    type: Number,
    default: 0
  }
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
  
  // Charger la langue sauvegardée
  const savedLang = localStorage.getItem('userLanguage')
  if (savedLang) {
    locale.value = savedLang
    currentLanguage.value = savedLang
  }
})
onUnmounted(() => window.removeEventListener('resize', updateWidth))

const drawerWidth = computed(() => {
  // Écrans très petits (iPhone) - 85% de largeur
  if (windowWidth.value < 400) {
    return windowWidth.value * 0.85;
  }
  // Mobiles - 75% de largeur (max 320px)
  else if (windowWidth.value < 600) {
    return Math.min(windowWidth.value * 0.75, 320);
  }
  // Tablettes - 60% de largeur (max 450px)
  else if (windowWidth.value >= 768 && windowWidth.value <= 1024) {
    return Math.min(windowWidth.value * 0.6, 450);
  }
  // Bureau - largeur fixe
  return 370;
});

const appVersion = "1.2.5"; // Version de l'application

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

const currentLanguage = ref(locale.value)

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


.title {
  font-weight: 600;
  font-size: 1.5rem;
  color: white;
  flex-grow: 1;
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
  margin-right: 10px; /* Réduit de 16px à 10px */
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
    margin-left: 56px !important;
    margin-right: 28px;
  }
  
  .main-divider {
    margin: 12px 28px;
  }
}

@media (max-width: 599px) {
  .v-list-item {
    min-height: 42px; /* Réduit de 44px à 42px */
    padding: 0 10px !important; /* Réduit de 12px à 10px */
  }

  .v-list-item__prepend {
    margin-right: 8px !important; /* Réduit de 12px à 8px */
  }

  .v-list-item-title {
    font-size: 0.82rem !important; /* Légèrement plus petit */
    padding-right: 4px; /* Évite le débordement */
  }

  .v-list-group__items .v-list-item {
    padding-left: 18px !important; /* Réduit de 20px à 18px */
  }
  
  .submenu-divider {
    margin-left: 18px !important; /* Aligné sur le nouveau padding */
    margin-right: 10px;
  }

  .v-icon {
    font-size: 16px !important; /* Plus petit sur mobile */
  }

  .section-header h3 {
    font-size: 0.85rem !important; /* Plus petit */
  }
  
  .custom-divider {
    margin: 4px 10px; /* Réduit */
  }

  /* Réduire l'espace vertical entre les éléments */
  .v-list-item {
    padding-top: 2px !important;
    padding-bottom: 2px !important;
  }
}

.v-list-item {
  transition: background-color 0.2s ease;
}

.v-icon {
  transition: color 0.2s ease;
}

/* Nouveau style pour réduire l'espace autour des icônes */
.v-list-item__prepend {
  min-width: 24px; /* Largeur fixe pour les icônes */
  display: flex;
  justify-content: center;
}

/* Styles pour la nouvelle section Langue et Copyright */
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
  flex-wrap: wrap;
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
  transform: scale(1.1);
  opacity: 0.9;
}

.flag-icon.active {
  opacity: 1;
  border-color: #3a7bd5;
  box-shadow: 0 0 0 2px rgba(58, 123, 213, 0.3);
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

/* Responsive */
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