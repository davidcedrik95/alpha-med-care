<template>
  <div class="navbar"  ref="navbarEl" :style="style">
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
          </div>
        </div>
      </div>
      
      <!-- Menu déroulant Produits (version partenaires) -->
<div class="dropdown" @mouseenter="showProductsDropdown = true" @mouseleave="showProductsDropdown = false">
  <button class="dropbtn">
    {{ $t('menu.shop') }} 
    <i class="fa fa-caret-down"></i>
  </button>
  
</div>
      <!-- Menu déroulant About -->
<div class="dropdown about-dropdown" @mouseenter="showAboutDropdown = true" @mouseleave="showAboutDropdown = false">
  <button class="dropbtn">
    {{ $t('menu.about') }}
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content about-dropdown-content" v-show="showAboutDropdown">
    <div class="header">
      <h2>{{ $t('menu.about') }}</h2>
      <button class="close-megamenu" @click.stop="showAboutDropdown = false">
        <v-icon>mdi-close</v-icon>
      </button>
    </div>
    <div class="row about-menu">
      <!-- Catégorie Informations -->
      <div class="column">
        <h3>{{ $t('menu.categories.information') }}</h3>
        <hr class="category-divider">
        <router-link to="/about/company" @click="closeMenus" class="capitalize">Das Unternehmen <i class="fa fa-chevron-right"></i></router-link>
        <hr>
        <router-link to="/about/team" @click="closeMenus" class="capitalize">Unsere Mitarbeiter <i class="fa fa-chevron-right"></i></router-link>
        <hr>
        <router-link to="/about/partner" @click="closeMenus" class="capitalize">Servicepartner <i class="fa fa-chevron-right"></i></router-link>
      </div>

      <!-- Catégorie Formular -->
      <div class="column">
        <h3>{{ $t('menu.categories.forms') }}</h3>
        <hr class="category-divider">
        <router-link to="/about/service-request" @click="closeMenus">Serviceanforderung <i class="fa fa-chevron-right"></i></router-link>
        <hr>
        <router-link to="/about/installation" @click="closeMenus">Installationsservice <i class="fa fa-chevron-right"></i></router-link>
        <hr>
        <router-link to="/about/installation" @click="closeMenus">Wartungsvertrag <i class="fa fa-chevron-right"></i></router-link>
      </div>


    </div>
  </div>
</div>

      <router-link to="/contact" @click="closeMenus">{{ $t('menu.contact') }}</router-link>
      <router-link to="/career" @click="closeMenus">{{ $t('menu.career') }}</router-link>
    </div>
    
    <!-- Conteneur pour les éléments de droite -->
    <div class="right-section">
      <!-- Sélecteur de langue -->
      <div class="language-selector-container hidden-on-mobile">
          <LanguageSelector />
      </div>

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
      mobileMenuOpen: false,
      showAboutDropdown: false,
      partners: [
        { name: 'ERGO-FIT', logo: '/images/partners/ergo-fit-logo.png', url: 'https://www.ergo-fit.de/de/' },
        { name: 'amer-sports', logo: '/images/partners/amer-sports-logo.png', url: 'https://www.amersports.com/' },
        { name: 'ergoline', logo: '/images/partners/ergoline-logo.png', url: 'https://www.ergoline.com/de/' },
        { name: 'FREI AG', logo: '/images/partners/frei-ag-logo.png', url: 'https://www.frei-ag.de/' },
        { name: 'hp-cosmos', logo: '/images/partners/hp-cosmos-logo.png', url: 'https://www.hpcosmos.com/' },
        { name: 'motomed', logo: '/images/partners/motomed.png', url: 'https://www.motomed.com/' }
      ]
  
    }
  },
  methods: {
    toggleMobileMenu() {
      this.$emit('update:mobile-drawer', !this.mobileDrawer)
    },

    closeMenus() {
        this.showDropdown = false;
        this.showProductsDropdown = false;
        this.showAboutDropdown = false;
      
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

.about-menu .column {
  width: 50%;
}


.about-dropdown-content {
  width: 50% !important;  /* Réduit la largeur uniquement pour le menu About */
  left: 20% !important;
  right: auto !important;
  max-width: unset; /* annule max-width si nécessaire */
}


.about-dropdown-content .column {
  width: 40%;
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


/* Nouveaux styles pour la grille de partenaires */
.partners-grid .dropdown-content {
  padding-bottom: 20px;
}

.partners-container {
  display: flex;
  flex-direction: column;
  gap: 30px;
  padding: 20px;
}

.partner-row {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
  gap: 20px;
}

.partner-logo {
  max-height: 80px;
  max-width: 200px;
  object-fit: contain;
  transition: transform 0.3s ease, opacity 0.3s ease;
  filter: grayscale(100%);
  opacity: 0.8;
}

.partner-logo:hover {
  transform: scale(1.05);
  filter: grayscale(0%);
  opacity: 1;
}

/* Responsive */
@media (max-width: 1200px) {
  .partner-logo {
    max-height: 70px;
    max-width: 180px;
  }
}

@media (max-width: 768px) {
  .partner-row {
    gap: 15px;
  }
  
  .partner-logo {
    max-height: 60px;
    max-width: 150px;
  }
}

@media (max-width: 480px) {
  .partner-row {
    gap: 10px;
  }
  
  .partner-logo {
    max-height: 50px;
    max-width: 120px;
  }
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

   .hidden-on-mobile {
    display: none !important;
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