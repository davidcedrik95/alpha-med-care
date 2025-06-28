<template>
  <div class="navbar">
    <!-- Titre de l'application -->
    <div class="title-container">
      <v-toolbar-title class="app-title">
        <router-link to="/">{{ $t('app.title') }}</router-link>
      </v-toolbar-title>
    </div>
    
    <!-- Liens de navigation -->
    <div class="nav-links">
      <router-link to="/">{{ $t('menu.home') }}</router-link>
      
      <!-- Menu déroulant Services -->
      <div class="dropdown" @mouseenter="showDropdown = true" @mouseleave="showDropdown = false">
        <button class="dropbtn">
          {{ $t('menu.services') }} 
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" v-show="showDropdown">
          <div class="header">
            <h2>{{ $t('menu.services') }}</h2>
            <button class="close-megamenu" @click.stop="showDropdown = false">
              <v-icon>mdi-close</v-icon>
            </button>
          </div>   
          <div class="row">
            <div class="column">
              <h3>{{ $t('menu.categories.inspections') }}</h3>
              <hr class="category-divider">
              <router-link to="/services/stk" @click="closeMenus"><i class="fa fa-car"></i> {{ $t('menu.items.stk_inspection') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/services/mtk" @click="closeMenus"><i class="fa fa-motorcycle"></i> {{ $t('menu.items.mtk_inspection') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/services/stue" @click="closeMenus"><i class="fa fa-truck"></i> {{ $t('menu.items.stue_inspection') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/services/mtue" @click="closeMenus"><i class="fa fa-bus"></i> {{ $t('menu.items.mtue_inspection') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/services/dguv" @click="closeMenus"><i class="fa fa-shield-alt"></i> {{ $t('menu.items.dguv_inspection') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/services/inspections" @click="closeMenus"><i class="fa fa-clipboard-check"></i> {{ $t('menu.items.general_inspection') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/services/visual" @click="closeMenus"><i class="fa fa-eye"></i> {{ $t('menu.items.visual_inspection') }} <i class="fa fa-chevron-right"></i></router-link>
            </div>
            <div class="column">
              <h3>{{ $t('menu.categories.calibration') }}</h3>
              <hr class="category-divider">
              <router-link to="/services/ergometer" @click="closeMenus"><i class="fa fa-running"></i> {{ $t('menu.items.ergometer_calibration') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/services/thermometer" @click="closeMenus"><i class="fa fa-thermometer-half"></i> {{ $t('menu.items.thermometer_calibration') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/services/blood-pressure" @click="closeMenus"><i class="fa fa-heartbeat"></i> {{ $t('menu.items.blood_pressure_calibration') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/services/ecg" @click="closeMenus"><i class="fa fa-heartbeat"></i> {{ $t('menu.items.ecg_calibration') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/services/ultrasound" @click="closeMenus"><i class="fa fa-wave-square"></i> {{ $t('menu.items.ultrasound_calibration') }} <i class="fa fa-chevron-right"></i></router-link>
            </div>
            <div class="column">
              <h3>{{ $t('menu.categories.maintenance') }}</h3>
              <hr class="category-divider">
              <router-link to="/services/repairs" @click="closeMenus"><i class="fa fa-tools"></i> {{ $t('menu.items.repairs') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/services/parts" @click="closeMenus"><i class="fa fa-cog"></i> {{ $t('menu.items.spare_parts') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/services/installation" @click="closeMenus"><i class="fa fa-wrench"></i> {{ $t('menu.items.installation_service') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/services/training" @click="closeMenus"><i class="fa fa-graduation-cap"></i> {{ $t('menu.items.training') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/services/disposal" @click="closeMenus"><i class="fa fa-trash-alt"></i> {{ $t('menu.items.equipment_disposal') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/services/maintenance" @click="closeMenus"><i class="fa fa-calendar-check"></i> {{ $t('menu.items.regular_maintenance') }} <i class="fa fa-chevron-right"></i></router-link>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Menu déroulant Produits -->
      <div class="dropdown" @mouseenter="showProductsDropdown = true" @mouseleave="showProductsDropdown = false">
        <button class="dropbtn">
          {{ $t('menu.products') }} 
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" v-show="showProductsDropdown">
          <div class="header">
            <h2>{{ $t('menu.products') }}</h2>
            <button class="close-megamenu" @click.stop="showProductsDropdown = false">
               <v-icon>mdi-close</v-icon>
            </button>
          </div>   
          <div class="row">
            <div class="column">
              <h3>{{ $t('menu.productData.categories.mtt_devices') }}</h3>
              <hr class="category-divider">
              <router-link to="/products/ergo-fit-cycle" @click="closeMenus"><i class="fa fa-bicycle"></i> {{ $t('menu.productData.items.ergo_fit_cycle') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/proxomed-treadmill" @click="closeMenus"><i class="fa fa-running"></i> {{ $t('menu.productData.items.proxomed_treadmill') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/physiomed-trainer" @click="closeMenus"><i class="fa fa-dumbbell"></i> {{ $t('menu.productData.items.physiomed_trainer') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/frei-ag-ergometer" @click="closeMenus"><i class="fa fa-biking"></i> {{ $t('menu.productData.items.frei_ag_ergometer') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/rehabilitation-bike" @click="closeMenus"><i class="fa fa-biking"></i> {{ $t('menu.productData.items.rehabilitation_bike') }} <i class="fa fa-chevron-right"></i></router-link>
            </div>
            <div class="column">
              <h3>{{ $t('menu.productData.categories.therapy') }}</h3>
              <hr class="category-divider">
              <router-link to="/products/electrotherapy" @click="closeMenus"><i class="fa fa-bolt"></i> {{ $t('menu.productData.items.electrotherapy') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/ultrasound-therapy" @click="closeMenus"><i class="fa fa-wave-square"></i> {{ $t('menu.productData.items.ultrasound_therapy') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/heat-therapy" @click="closeMenus"><i class="fa fa-fire"></i> {{ $t('menu.productData.items.heat_therapy') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/cryotherapy" @click="closeMenus"><i class="fa fa-snowflake"></i> {{ $t('menu.productData.items.cryotherapy') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/magnetotherapy" @click="closeMenus"><i class="fa fa-magnet"></i> {{ $t('menu.productData.items.magnetotherapy') }} <i class="fa fa-chevron-right"></i></router-link>
            </div>
            <div class="column">
              <h3>{{ $t('menu.productData.categories.sport_gymnastics') }}</h3>
              <hr class="category-divider">
              <router-link to="/products/training-equipment" @click="closeMenus"><i class="fa fa-dumbbell"></i> {{ $t('menu.productData.items.training_equipment') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/rehabilitation-balls" @click="closeMenus"><i class="fa fa-basketball-ball"></i> {{ $t('menu.productData.items.rehabilitation_balls') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/resistance-bands" @click="closeMenus"><i class="fa fa-elastic"></i> {{ $t('menu.productData.items.resistance_bands') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/balance-boards" @click="closeMenus"><i class="fa fa-surfing"></i> {{ $t('menu.productData.items.balance_boards') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/gymnastics-mats" @click="closeMenus"><i class="fa fa-th-large"></i> {{ $t('menu.productData.items.gymnastics_mats') }} <i class="fa fa-chevron-right"></i></router-link>
            </div>
          </div>
          <div class="row">
            <div class="column">
              <h3>{{ $t('menu.productData.categories.therapy_beds') }}</h3>
              <hr class="category-divider">
              <router-link to="/products/adjustable-beds" @click="closeMenus"><i class="fa fa-bed"></i> {{ $t('menu.productData.items.adjustable_beds') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/massage-tables" @click="closeMenus"><i class="fa fa-table"></i> {{ $t('menu.productData.items.massage_tables') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/examination-beds" @click="closeMenus"><i class="fa fa-procedures"></i> {{ $t('menu.productData.items.examination_beds') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/hydrotherapy-beds" @click="closeMenus"><i class="fa fa-water"></i> {{ $t('menu.productData.items.hydrotherapy_beds') }} <i class="fa fa-chevron-right"></i></router-link>
            </div>
            <div class="column">
              <h3>{{ $t('menu.productData.categories.practice_supplies') }}</h3>
              <hr class="category-divider">
              <router-link to="/products/medical-instruments" @click="closeMenus"><i class="fa fa-stethoscope"></i> {{ $t('menu.productData.items.medical_instruments') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/diagnostic-equipment" @click="closeMenus"><i class="fa fa-heartbeat"></i> {{ $t('menu.productData.items.diagnostic_equipment') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/disposables" @click="closeMenus"><i class="fa fa-syringe"></i> {{ $t('menu.productData.items.disposables') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/furniture" @click="closeMenus"><i class="fa fa-chair"></i> {{ $t('menu.productData.items.furniture') }} <i class="fa fa-chevron-right"></i></router-link>
            </div>
            <div class="column">
              <h3>{{ $t('menu.productData.categories.cardio') }}</h3>
              <hr class="category-divider">
              <router-link to="/products/ecg-machines" @click="closeMenus"><i class="fa fa-heartbeat"></i> {{ $t('menu.productData.items.ecg_machines') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/blood-pressure-monitors" @click="closeMenus"><i class="fa fa-heartbeat"></i> {{ $t('menu.productData.items.blood_pressure_monitors') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/stress-test-systems" @click="closeMenus"><i class="fa fa-heartbeat"></i> {{ $t('menu.productData.items.stress_test_systems') }} <i class="fa fa-chevron-right"></i></router-link>
              <hr>
              <router-link to="/products/holter-monitors" @click="closeMenus"><i class="fa fa-heartbeat"></i> {{ $t('menu.productData.items.holter_monitors') }} <i class="fa fa-chevron-right"></i></router-link>
            </div>
          </div>
        </div>
      </div>
      
      <router-link to="/about" @click="closeMenus">{{ $t('menu.about') }}</router-link>
      <router-link to="/contact" @click="closeMenus">{{ $t('menu.contact') }}</router-link>
      <router-link to="/blog" @click="closeMenus">{{ $t('menu.blog') }}</router-link>
      <router-link to="/faq" @click="closeMenus">{{ $t('menu.faq') }}</router-link>
      <router-link to="/imprint" @click="closeMenus">{{ $t('menu.imprint') }}</router-link>
    </div>
    
    <!-- Conteneur pour les éléments de droite -->
    <div class="right-section">
      <!-- Sélecteur de langue -->
      <LanguageSelector />

       <!-- Icône menu mobile -->
      <v-app-bar-nav-icon 
          class="hidden-md-and-up" 
          @click.stop="toggleMobileMenu"
          :icon="mobileDrawer ? 'mdi-close' : 'mdi-menu'"
      ></v-app-bar-nav-icon>
    </div>
  </div>
</template>

<script>
import LanguageSelector from './LanguageSelector.vue'

export default {
  name: 'MegaMenu',
  components: {
    LanguageSelector
  },
  props: {
    mobileDrawer: Boolean
  },
  data() {
    return {
      showDropdown: false,
      showProductsDropdown: false,
      mobileMenuOpen: false
    }
  },
  methods: {
    toggleMobileMenu() {
      this.$emit('update:mobile-drawer', !this.mobileDrawer)
    },
    closeMenus() {
      this.showDropdown = false;
      this.showProductsDropdown = false;
      
      if (this.mobileDrawer) {
        this.$emit('update:mobile-drawer', false);
      }
    }
  }
}
</script>

<style scoped>
* {
  box-sizing: border-box;
}

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #333;
  padding: 0 20px;
  width: 100%;
  position: relative;
  z-index: 1000;
}

.title-container {
  flex: 0 0 auto;
}

.app-title {
  color: white !important;
  font-size: 1.25rem;
  font-weight: 600;
  white-space: nowrap;
}

.app-title a {
  color: inherit;
  text-decoration: none;
}

.nav-links {
  display: flex;
  justify-content: center;
  flex-grow: 1;
  flex-wrap: wrap;
}

.right-section {
  display: flex;
  align-items: center;
  gap: 16px;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.navbar .router-link-exact-active {
  background-color: rgb(9, 113, 182);
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font: inherit;
  margin: 0;
  cursor: pointer;
}

.navbar a:hover, 
.navbar .router-link:hover, 
.dropdown:hover .dropbtn {
  background-color: rgb(9, 113, 182);
}

.dropdown-content {
  position: absolute;
  background-color: #f9f9f9;
  width: 80%;
  left: 10%;
  right: 10%;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  max-width: 1200px;
  margin: 0 auto;
}

.dropdown-content .header {
  background: rgb(9, 113, 182);
  padding: 16px;
  color: white;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.close-megamenu {
  border: none;
  color: white;
  cursor: pointer;
  font-size: 20px;
  padding: 0 8px;
  background: transparent;
}

.close-megamenu:hover {
  opacity: 0.8;
}

.column {
  float: left;
  width: 33.33%;
  padding: 10px;
  background-color: #f9f9f9;
  height: auto;
  min-height: 250px;
}

.column a,
.column .router-link {
  float: none;
  color: #333;
  padding: 10px 16px;
  text-decoration: none;
  display: flex;
  align-items: center;
  text-align: left;
  transition: background-color 0.3s;
  position: relative;
}

.column a i:not(.fa-chevron-right),
.column .router-link i:not(.fa-chevron-right) {
  margin-right: 10px;
  min-width: 20px;
  text-align: center;
}

.column a i.fa-chevron-right,
.column .router-link i.fa-chevron-right {
  position: absolute;
  right: 16px;
  color: #666;
  font-size: 12px;
}

.column a span,
.column .router-link span {
  flex-grow: 1;
  padding-right: 20px;
}

.column a i:first-child,
.column .router-link i:first-child {
  margin-right: 10px;
  width: 20px;
  text-align: center;
}

.column a:hover,
.column .router-link:hover {
  background-color: #ddd;
  color: rgb(9, 113, 182);
}

.column a i,
.column .router-link i {
  margin-right: 8px;
  color: rgb(9, 113, 182);
}

.column a i.fa-chevron-right,
.column .router-link i.fa-chevron-right {
  margin-right: 0;
  margin-left: 8px;
  color: #666;
  font-size: 12px;
}

hr {
  border: 0;
  height: 1px;
  background-color: #eee;
  margin: 4px 0;
}

hr.category-divider {
  height: 2px;
  background-color: rgb(9, 113, 182);
  margin: 8px 0 12px 0;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

 .hidden-md-and-up {
   color: white;
  }

/* Responsive styles */
@media screen and (max-width: 1200px) {
  .dropdown-content {
    width: 90%;
    left: 5%;
    right: 5%;
  }
}

@media screen and (max-width: 960px) {
  .navbar {
    flex-wrap: wrap;
    padding: 10px;
  }
  
  .nav-links {
    order: 3;
    width: 100%;
    display: none;
  }
  
  .navbar.expanded .nav-links {
    display: flex;
    flex-direction: column;
  }
  
  .right-section {
    margin-left: auto;
  }
  
  .column {
    width: 50%;
  }
}

@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
  
  .navbar a, 
  .navbar .router-link,
  .dropdown .dropbtn {
    padding: 10px 12px;
    font-size: 14px;
  }
  
  .dropdown-content {
    width: 95%;
    left: 2.5%;
    right: 2.5%;
  }
}

/* Language selector styles */
.language-selector-container {
  display: flex;
  align-items: center;
}

.language-selector-btn {
  color: white !important;
  text-transform: none;
  letter-spacing: normal;
}

.hidden-md-and-up {
  display: none;
}

@media screen and (max-width: 960px) {
  .hidden-md-and-up {
    display: block;
  }
}
</style>