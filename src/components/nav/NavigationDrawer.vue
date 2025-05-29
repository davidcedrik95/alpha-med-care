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
      <!-- Dans le template, modifiez la partie account-section comme ceci : -->
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
      
      <!-- Séparateur -->
      <v-divider color="#e0e0e0" thickness="1" class="my-2"></v-divider>
      
      <!-- Nouveaux éléments dépliables -->
      <!-- Modifiez la partie des éléments dépliables dans le template comme ceci : -->
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
    <v-divider 
      v-if="index < infoItems.length - 1" 
      color="#e0e0e0" 
      thickness="1" 
      class="my-1"
    ></v-divider>
  </template>
  
  <v-list-item
    v-for="(subItem, subIndex) in item.items"
    :key="'subinfo-'+index+'-'+subIndex"
    :to="subItem.route"
    link
    @click="closeDrawer"
  >
    <v-list-item-title>{{ subItem.title }}</v-list-item-title>
  </v-list-item>
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
        <v-btn 
          icon 
          variant="text" 
          aria-label="Facebook"
          class="social-icon"
          color="white"
        >
          <v-icon size="24">mdi-facebook</v-icon>
        </v-btn>
        <v-btn 
          icon 
          variant="text" 
          aria-label="Twitter"
          class="social-icon"
          color="white"
        >
          <v-icon size="24">mdi-twitter</v-icon>
        </v-btn>
        <v-btn 
          icon 
          variant="text" 
          aria-label="LinkedIn"
          class="social-icon"
          color="white"
        >
          <v-icon size="24">mdi-linkedin</v-icon>
        </v-btn>
        <v-btn 
          icon 
          variant="text" 
          aria-label="YouTube"
          class="social-icon"
          color="white"
        >
          <v-icon size="24">mdi-youtube</v-icon>
        </v-btn>
      </div>
      <div class="copyright">
          © {{ new Date().getFullYear() }} {{ $t('company.name') }}. {{ $t('company.copyright') }}
      </div>
    </footer>
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
  display: flex;
  flex-direction: column;
  height: 100%;
  background: #0d2b6b; /* Bleu médical foncé principal */
  background: linear-gradient(135deg, #0d2b6b 0%, #0a1942 100%);
  color: white;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
  margin-top: 55px;
}


.drawer-header {
  background-color: rgba(13, 43, 107, 0.95);
  padding: 14px 16px;
  display: flex;
  align-items: center;
  border-bottom: 1px solid rgba(255, 255, 255, 0.15);
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
}

/* Styles pour toutes les cartes */
.menu-card,
.account-card,
.auth-card {
  background: rgba(255, 255, 255, 0.08);
  backdrop-filter: blur(8px);
  border-radius: 10px;
  margin-bottom: 16px;
  border: 1px solid rgba(255, 255, 255, 0.1);
  overflow: hidden;
  transition: all 0.3s ease;
}

.menu-card:hover,
.account-card:hover,
.auth-card:hover {
  background: rgba(255, 255, 255, 0.12);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

/* Styles communs pour les listes */
.v-list {
  background: transparent !important;
  color: white !important;
  padding: 4px 0 !important;
}

.v-list-item {
  color: white !important;
  min-height: 48px;
  padding: 0 16px !important;
}

.v-list-item__prepend {
  margin-right: 16px;
}

.v-list-item__prepend .v-icon {
  color: rgba(255, 255, 255, 0.9) !important;
  opacity: 0.9;
}

.v-list-item-title {
  font-size: 0.9rem;
  font-weight: 500;
  letter-spacing: 0.2px;
  color: white !important;
}

.v-list-item:hover {
  background-color: rgba(255, 255, 255, 0.15) !important;
}

.v-list-item--active {
  background-color: #1e88e5 !important;
  color: white !important;
}

/* Styles spécifiques pour les groupes */
.v-list-group__items .v-list-item {
  padding-left: 48px !important;
}

.v-list-group__items .v-list-item__prepend {
  margin-right: 12px;
}

/* Section Header */
.section-header {
  background: linear-gradient(to right, rgba(13, 43, 107, 0.9), rgba(30, 136, 229, 0.4));
  padding: 12px 16px;
  margin: 0 0 4px 0;
  border-radius: 10px 10px 0 0;
}

.section-header h3 {
  margin: 0;
  font-size: 0.95rem;
  font-weight: 600;
  color: white;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

/* Divider personnalisé */
.v-divider {
  border-color: rgba(255, 255, 255, 0.1) !important;
  margin: 8px 16px !important;
}

/* Social Footer */
.social-footer {
  padding: 20px 0 12px;
  background: rgba(13, 43, 107, 0.9);
  text-align: center;
  border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.social-links {
  display: flex;
  justify-content: center;
  gap: 20px;
  margin-bottom: 12px;
}

.social-icon {
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  width: 36px;
  height: 36px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.1);
}

.social-icon:hover {
  transform: translateY(-2px) scale(1.1);
  background: rgba(255, 255, 255, 0.2);
}

.social-icon .v-icon {
  font-size: 20px;
  color: white;
  filter: drop-shadow(0 2px 3px rgba(0, 0, 0, 0.2));
}

.copyright {
  font-size: 0.75rem;
  color: rgba(255, 255, 255, 0.6);
  margin-top: 8px;
  letter-spacing: 0.3px;
}

/* Responsive */
@media (max-width: 599px) {
  .navigation-drawer {
    height: 100vh !important;
    top: 0 !important;
  }

  .drawer-header {
    padding: 12px;
  }

  .title {
    font-size: 1.1rem;
  }

  .v-list-item {
    min-height: 44px;
    padding: 0 12px !important;
  }

  .social-links {
    gap: 16px;
  }

  .social-icon {
    width: 32px;
    height: 32px;
  }

  .social-icon .v-icon {
    font-size: 18px;
  }
}
</style>