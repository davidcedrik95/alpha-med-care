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
    <!-- Menu principal -->
    <div class="drawer-content">
      <!-- Header avec effet de gradient -->
      <div class="drawer-header">
        <div class="header-content">
          <v-icon size="36" color="white">mdi-menu-open</v-icon>
          <span class="title">{{ $t('app.title') }}</span>
          <v-btn 
            icon 
            variant="text" 
            @click.stop="closeDrawer" 
            class="close-btn"
            color="white"
          >
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </div>
      </div>

      <!-- Contenu scrollable -->
      <div class="scrollable-content">
        <v-list class="menu-list">
          <!-- Accueil -->
          <v-list-item 
            :to="'/'"
            link
            @click="closeDrawer"
            class="menu-item"
            active-class="active-menu-item"
          >
            <template v-slot:prepend>
              <v-icon class="menu-icon">mdi-home</v-icon>
            </template>
            <v-list-item-title class="menu-text">{{ $t('menu.home') }}</v-list-item-title>
            <template v-slot:append>
              <v-icon size="small">mdi-chevron-right</v-icon>
            </template>
          </v-list-item>

          <!-- Groupe Services -->
          <v-list-group value="Services" class="menu-group">
            <template v-slot:activator="{ props }">
              <v-list-item 
                v-bind="props"
                class="menu-item"
              >
                <template v-slot:prepend>
                  <v-icon class="menu-icon">mdi-cog</v-icon>
                </template>
                <v-list-item-title class="menu-text">{{ $t('menu.services') }}</v-list-item-title>
                <template v-slot:append>
                  <v-icon size="small">mdi-chevron-down</v-icon>
                </template>
              </v-list-item>
            </template>

            <!-- Inspections -->
            <v-list-group value="Inspections" sub-group class="sub-group">
              <template v-slot:activator="{ props }">
                <v-list-item v-bind="props" class="sub-menu-item">
                  <template v-slot:prepend>
                    <v-icon class="sub-menu-icon">mdi-clipboard-check</v-icon>
                  </template>
                  <v-list-item-title class="sub-menu-text">{{ $t('menu.categories.inspections') }}</v-list-item-title>
                  <template v-slot:append>
                    <v-icon size="small">mdi-chevron-down</v-icon>
                  </template>
                </v-list-item>
              </template>

              <v-list-item
                v-for="(item, index) in menuCategories[0].items"
                :key="'inspections-'+index"
                :to="item.route"
                link
                @click="closeDrawer"
                class="nested-item"
                active-class="active-nested-item"
              >
                <template v-slot:prepend>
                  <v-icon size="small" class="nested-icon">{{ item.icon }}</v-icon>
                </template>
                <v-list-item-title class="nested-text">{{ $t(`menu.items.${item.key}`) }}</v-list-item-title>
              </v-list-item>
            </v-list-group>

            <!-- Calibration -->
            <v-list-group value="Calibration" sub-group class="sub-group">
              <template v-slot:activator="{ props }">
                <v-list-item v-bind="props" class="sub-menu-item">
                  <template v-slot:prepend>
                    <v-icon class="sub-menu-icon">mdi-tune</v-icon>
                  </template>
                  <v-list-item-title class="sub-menu-text">{{ $t('menu.categories.calibration') }}</v-list-item-title>
                  <template v-slot:append>
                    <v-icon size="small">mdi-chevron-down</v-icon>
                  </template>
                </v-list-item>
              </template>

              <v-list-item
                v-for="(item, index) in menuCategories[1].items"
                :key="'calibration-'+index"
                :to="item.route"
                link
                @click="closeDrawer"
                class="nested-item"
                active-class="active-nested-item"
              >
                <template v-slot:prepend>
                  <v-icon size="small" class="nested-icon">{{ item.icon }}</v-icon>
                </template>
                <v-list-item-title class="nested-text">{{ $t(`menu.items.${item.key}`) }}</v-list-item-title>
              </v-list-item>
            </v-list-group>

            <!-- Maintenance -->
            <v-list-group value="Maintenance" sub-group class="sub-group">
              <template v-slot:activator="{ props }">
                <v-list-item v-bind="props" class="sub-menu-item">
                  <template v-slot:prepend>
                    <v-icon class="sub-menu-icon">mdi-wrench</v-icon>
                  </template>
                  <v-list-item-title class="sub-menu-text">{{ $t('menu.categories.maintenance') }}</v-list-item-title>
                  <template v-slot:append>
                    <v-icon size="small">mdi-chevron-down</v-icon>
                  </template>
                </v-list-item>
              </template>

              <v-list-item
                v-for="(item, index) in menuCategories[2].items"
                :key="'maintenance-'+index"
                :to="item.route"
                link
                @click="closeDrawer"
                class="nested-item"
                active-class="active-nested-item"
              >
                <template v-slot:prepend>
                  <v-icon size="small" class="nested-icon">{{ item.icon }}</v-icon>
                </template>
                <v-list-item-title class="nested-text">{{ $t(`menu.items.${item.key}`) }}</v-list-item-title>
              </v-list-item>
            </v-list-group>
          </v-list-group>

          <!-- Liens supplémentaires -->
          <v-list-item 
            :to="'/products'" 
            link 
            @click="closeDrawer"
            class="menu-item"
            active-class="active-menu-item"
          >
            <template v-slot:prepend>
              <v-icon class="menu-icon">mdi-cart</v-icon>
            </template>
            <v-list-item-title class="menu-text">{{ $t('menu.products') }}</v-list-item-title>
            <template v-slot:append>
              <v-icon size="small">mdi-chevron-right</v-icon>
            </template>
          </v-list-item>

          <v-list-item 
            :to="'/contact'" 
            link 
            @click="closeDrawer"
            class="menu-item"
            active-class="active-menu-item"
          >
            <template v-slot:prepend>
              <v-icon class="menu-icon">mdi-phone</v-icon>
            </template>
            <v-list-item-title class="menu-text">{{ $t('menu.contact') }}</v-list-item-title>
            <template v-slot:append>
              <v-icon size="small">mdi-chevron-right</v-icon>
            </template>
          </v-list-item>
        </v-list>

        <!-- Compte utilisateur -->
        <v-list class="account-list" density="compact">
          <v-list-subheader class="account-subheader">{{ $t('account.myAccount') }}</v-list-subheader>
          <v-list-item
            v-for="(item, index) in accountItems"
            :key="'account-'+index"
            :to="item.route"
            link
            @click="closeDrawer"
            class="account-item"
            active-class="active-account-item"
          >
            <template v-slot:prepend>
              <v-icon class="account-icon">{{ item.icon }}</v-icon>
            </template>
            <v-list-item-title class="account-text">{{ $t(`account.${item.key}`) }}</v-list-item-title>
          </v-list-item>
        </v-list>

        <!-- Carte d'authentification -->
        <v-card class="auth-card mx-4 my-4">
          <v-card-title class="auth-card-title">
            <v-icon left>mdi-account-key</v-icon>
            {{ $t('auth.authentication') }}
          </v-card-title>
          <v-card-text class="auth-card-actions">
            <v-btn
              block
              variant="tonal"
              color="primary"
              class="auth-action-btn"
              to="/login"
              @click="closeDrawer"
            >
              <v-icon left>mdi-login</v-icon>
              {{ $t('auth.login') }}
            </v-btn>
            <v-btn
              block
              variant="outlined"
              color="primary"
              class="auth-action-btn mt-3"
              to="/register"
              @click="closeDrawer"
            >
              <v-icon left>mdi-account-plus</v-icon>
              {{ $t('auth.register') }}
            </v-btn>
          </v-card-text>
        </v-card>
      </div>

      <!-- Footer avec réseaux sociaux -->
      <div class="drawer-footer">
        <div class="social-links">
          <v-btn 
            icon 
            variant="text" 
            aria-label="Facebook"
            class="social-icon"
            color="#3b5998"
          >
            <v-icon size="28">mdi-facebook</v-icon>
          </v-btn>
          <v-btn 
            icon 
            variant="text" 
            aria-label="Twitter"
            class="social-icon"
            color="#1da1f2"
          >
            <v-icon size="28">mdi-twitter</v-icon>
          </v-btn>
          <v-btn 
            icon 
            variant="text" 
            aria-label="Instagram"
            class="social-icon"
            color="#e1306c"
          >
            <v-icon size="28">mdi-instagram</v-icon>
          </v-btn>
          <v-btn 
            icon 
            variant="text" 
            aria-label="WhatsApp"
            class="social-icon"
            color="#25D366"
          >
            <v-icon size="28">mdi-whatsapp</v-icon>
          </v-btn>
        </div>
      </div>
    </div>
  </v-navigation-drawer>
</template>

<script setup>
import { computed, ref, onMounted, onUnmounted } from 'vue'
import { defineProps, defineEmits } from 'vue'

const props = defineProps({ modelValue: Boolean })
const emit = defineEmits(['update:modelValue'])

const drawer = computed({
  get: () => props.modelValue,
  set: (value) => emit('update:modelValue', value)
})

const windowWidth = ref(window.innerWidth)
const updateWidth = () => (windowWidth.value = window.innerWidth)
onMounted(() => window.addEventListener('resize', updateWidth))
onUnmounted(() => window.removeEventListener('resize', updateWidth))

const drawerWidth = computed(() => (windowWidth.value < 600 ? windowWidth.value : 350))

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
  { key: "myAccount", icon: "mdi-account", route: "/account" },
  { key: "orders", icon: "mdi-package-variant", route: "/orders" },
  { key: "returns", icon: "mdi-undo-variant", route: "/returns" },
  { key: "returnInfo", icon: "mdi-information", route: "/return-info" },
  { key: "settings", icon: "mdi-account-cog", route: "/contact-settings" }
]

function closeDrawer() {
  drawer.value = false
}
</script>

<style scoped lang="scss">
.navigation-drawer {
  background-color: #ffffff;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
  
  .drawer-content {
    display: flex;
    flex-direction: column;
    height: 100%;
  }

  .drawer-header {
    background: linear-gradient(135deg, #6e8efb 0%, #4a6cf7 100%);
    color: white;
    padding: 16px;
    
    .header-content {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
      
      .title {
        font-weight: 600;
        font-size: 1.3rem;
        margin-left: 12px;
        flex-grow: 1;
      }
      
      .close-btn {
        margin-left: auto;
        opacity: 0.8;
        transition: opacity 0.2s;
        
        &:hover {
          opacity: 1;
        }
      }
    }
  }

  .scrollable-content {
    flex: 1;
    overflow-y: auto;
    padding-bottom: 16px;
  }

  .menu-list {
    padding: 8px 0;
    
    .menu-item {
      border-radius: 8px;
      margin: 4px 8px;
      transition: all 0.3s ease;
      
      &:hover {
        background-color: #f0f4ff;
      }
      
      &.active-menu-item {
        background-color: #e0e8ff;
        
        .menu-icon, .menu-text {
          color: #4a6cf7;
          font-weight: 500;
        }
      }
      
      .menu-icon {
        color: #5a6c8d;
        margin-right: 12px;
      }
      
      .menu-text {
        color: #2d3748;
        font-size: 0.95rem;
        font-weight: 500;
      }
    }
    
    .menu-group {
      :deep(.v-list-group__items) {
        padding-left: 12px;
      }
    }
    
    .sub-group {
      .sub-menu-item {
        border-radius: 8px;
        margin: 4px 8px;
        min-height: 40px;
        
        .sub-menu-icon {
          color: #5a6c8d;
          margin-right: 12px;
          font-size: 1.1rem;
        }
        
        .sub-menu-text {
          color: #2d3748;
          font-size: 0.9rem;
          font-weight: 500;
        }
      }
      
      .nested-item {
        border-radius: 8px;
        margin: 2px 8px 2px 32px;
        min-height: 36px;
        transition: all 0.3s ease;
        
        &:hover {
          background-color: #f0f4ff;
        }
        
        &.active-nested-item {
          background-color: #e0e8ff;
          
          .nested-icon, .nested-text {
            color: #4a6cf7;
          }
        }
        
        .nested-icon {
          color: #6b7280;
          margin-right: 12px;
          font-size: 1rem;
        }
        
        .nested-text {
          color: #4a5568;
          font-size: 0.85rem;
        }
      }
    }
  }

  .account-list {
    margin-top: 16px;
    padding: 8px 0;
    
    .account-subheader {
      color: #6b7280;
      font-size: 0.8rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      padding-left: 24px;
    }
    
    .account-item {
      border-radius: 8px;
      margin: 4px 8px;
      min-height: 40px;
      transition: all 0.3s ease;
      
      &:hover {
        background-color: #f0f4ff;
      }
      
      &.active-account-item {
        background-color: #e0e8ff;
        
        .account-icon, .account-text {
          color: #4a6cf7;
        }
      }
      
      .account-icon {
        color: #5a6c8d;
        margin-right: 12px;
        font-size: 1.1rem;
      }
      
      .account-text {
        color: #2d3748;
        font-size: 0.9rem;
        font-weight: 500;
      }
    }
  }

  .auth-card {
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    border: 1px solid #e2e8f0;
    overflow: hidden;
    transition: all 0.3s ease;

    &:hover {
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
    }

    .auth-card-title {
      background-color: #f8fafc;
      color: #4a6cf7;
      font-weight: 600;
      font-size: 1rem;
      padding: 16px;
      display: flex;
      align-items: center;
      border-bottom: 1px solid #e2e8f0;
    }

    .auth-card-actions {
      padding: 16px;
      background-color: white;
    }

    .auth-action-btn {
      text-transform: none;
      letter-spacing: normal;
      font-weight: 500;
      height: 44px;
      border-radius: 8px;
      transition: all 0.3s ease;

      &:hover {
        transform: translateY(-2px);
      }
    }
  }

  .drawer-footer {
    padding: 16px;
    border-top: 1px solid #e2e8f0;
    background-color: #f8fafc;
    
    .social-links {
      display: flex;
      justify-content: center;
      gap: 12px;
      margin-bottom: 16px;
      
      .social-icon {
        transition: transform 0.2s;
        
        &:hover {
          transform: scale(1.1);
        }
      }
    }
  }
}

// Animation pour l'ouverture/fermeture du drawer
.v-navigation-drawer {
  transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
}
</style>