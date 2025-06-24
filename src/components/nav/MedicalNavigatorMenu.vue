<template>
  <div class="navbar">
    <!-- Titre de l'application -->
    <div class="title-container">
      <v-toolbar-title class="app-title flex-shrink-0">{{ $t('app.title') }}</v-toolbar-title>
    </div>
    <v-spacer></v-spacer>
    
    <!-- Liens de navigation -->
    <div class="nav-links">
      <a href="#home">{{ $t('menu.home') }}</a>
      
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
              <a href="/services/stk"><i class="fa fa-car"></i> {{ $t('menu.items.stk_inspection') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/services/mtk"><i class="fa fa-motorcycle"></i> {{ $t('menu.items.mtk_inspection') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/services/stue"><i class="fa fa-truck"></i> {{ $t('menu.items.stue_inspection') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/services/mtue"><i class="fa fa-bus"></i> {{ $t('menu.items.mtue_inspection') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/services/dguv"><i class="fa fa-shield-alt"></i> {{ $t('menu.items.dguv_inspection') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/services/inspections"><i class="fa fa-clipboard-check"></i> {{ $t('menu.items.general_inspection') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/services/visual"><i class="fa fa-eye"></i> {{ $t('menu.items.visual_inspection') }} <i class="fa fa-chevron-right"></i></a>
            </div>
            <div class="column">
              <h3>{{ $t('menu.categories.calibration') }}</h3>
              <hr class="category-divider">
              <a href="/services/ergometer"><i class="fa fa-running"></i> {{ $t('menu.items.ergometer_calibration') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/services/thermometer"><i class="fa fa-thermometer-half"></i> {{ $t('menu.items.thermometer_calibration') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/services/blood-pressure"><i class="fa fa-heartbeat"></i> {{ $t('menu.items.blood_pressure_calibration') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/services/ecg"><i class="fa fa-heartbeat"></i> {{ $t('menu.items.ecg_calibration') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/services/ultrasound"><i class="fa fa-wave-square"></i> {{ $t('menu.items.ultrasound_calibration') }} <i class="fa fa-chevron-right"></i></a>
            </div>
            <div class="column">
              <h3>{{ $t('menu.categories.maintenance') }}</h3>
              <hr class="category-divider">
              <a href="/services/repairs"><i class="fa fa-tools"></i> {{ $t('menu.items.repairs') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/services/parts"><i class="fa fa-cog"></i> {{ $t('menu.items.spare_parts') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/services/installation"><i class="fa fa-wrench"></i> {{ $t('menu.items.installation_service') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/services/training"><i class="fa fa-graduation-cap"></i> {{ $t('menu.items.training') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/services/disposal"><i class="fa fa-trash-alt"></i> {{ $t('menu.items.equipment_disposal') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/services/maintenance"><i class="fa fa-calendar-check"></i> {{ $t('menu.items.regular_maintenance') }} <i class="fa fa-chevron-right"></i></a>
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
              <a href="/products/ergo-fit-cycle"><i class="fa fa-bicycle"></i> {{ $t('menu.productData.items.ergo_fit_cycle') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/proxomed-treadmill"><i class="fa fa-running"></i> {{ $t('menu.productData.items.proxomed_treadmill') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/physiomed-trainer"><i class="fa fa-dumbbell"></i> {{ $t('menu.productData.items.physiomed_trainer') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/frei-ag-ergometer"><i class="fa fa-biking"></i> {{ $t('menu.productData.items.frei_ag_ergometer') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/rehabilitation-bike"><i class="fa fa-biking"></i> {{ $t('menu.productData.items.rehabilitation_bike') }} <i class="fa fa-chevron-right"></i></a>
            </div>
            <div class="column">
              <h3>{{ $t('menu.productData.categories.therapy') }}</h3>
              <hr class="category-divider">
              <a href="/products/electrotherapy"><i class="fa fa-bolt"></i> {{ $t('menu.productData.items.electrotherapy') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/ultrasound-therapy"><i class="fa fa-wave-square"></i> {{ $t('menu.productData.items.ultrasound_therapy') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/heat-therapy"><i class="fa fa-fire"></i> {{ $t('menu.productData.items.heat_therapy') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/cryotherapy"><i class="fa fa-snowflake"></i> {{ $t('menu.productData.items.cryotherapy') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/magnetotherapy"><i class="fa fa-magnet"></i> {{ $t('menu.productData.items.magnetotherapy') }} <i class="fa fa-chevron-right"></i></a>
            </div>
            <div class="column">
              <h3>{{ $t('menu.productData.categories.sport_gymnastics') }}</h3>
              <hr class="category-divider">
              <a href="/products/training-equipment"><i class="fa fa-dumbbell"></i> {{ $t('menu.productData.items.training_equipment') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/rehabilitation-balls"><i class="fa fa-basketball-ball"></i> {{ $t('menu.productData.items.rehabilitation_balls') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/resistance-bands"><i class="fa fa-elastic"></i> {{ $t('menu.productData.items.resistance_bands') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/balance-boards"><i class="fa fa-surfing"></i> {{ $t('menu.productData.items.balance_boards') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/gymnastics-mats"><i class="fa fa-th-large"></i> {{ $t('menu.productData.items.gymnastics_mats') }} <i class="fa fa-chevron-right"></i></a>
            </div>
          </div>
          <div class="row">
            <div class="column">
              <h3>{{ $t('menu.productData.categories.therapy_beds') }}</h3>
              <hr class="category-divider">
              <a href="/products/adjustable-beds"><i class="fa fa-bed"></i> {{ $t('menu.productData.items.adjustable_beds') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/massage-tables"><i class="fa fa-table"></i> {{ $t('menu.productData.items.massage_tables') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/examination-beds"><i class="fa fa-procedures"></i> {{ $t('menu.productData.items.examination_beds') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/hydrotherapy-beds"><i class="fa fa-water"></i> {{ $t('menu.productData.items.hydrotherapy_beds') }} <i class="fa fa-chevron-right"></i></a>
            </div>
            <div class="column">
              <h3>{{ $t('menu.productData.categories.practice_supplies') }}</h3>
              <hr class="category-divider">
              <a href="/products/medical-instruments"><i class="fa fa-stethoscope"></i> {{ $t('menu.productData.items.medical_instruments') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/diagnostic-equipment"><i class="fa fa-heartbeat"></i> {{ $t('menu.productData.items.diagnostic_equipment') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/disposables"><i class="fa fa-syringe"></i> {{ $t('menu.productData.items.disposables') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/furniture"><i class="fa fa-chair"></i> {{ $t('menu.productData.items.furniture') }} <i class="fa fa-chevron-right"></i></a>
            </div>
            <div class="column">
              <h3>{{ $t('menu.productData.categories.cardio') }}</h3>
              <hr class="category-divider">
              <a href="/products/ecg-machines"><i class="fa fa-heartbeat"></i> {{ $t('menu.productData.items.ecg_machines') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/blood-pressure-monitors"><i class="fa fa-heartbeat"></i> {{ $t('menu.productData.items.blood_pressure_monitors') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/stress-test-systems"><i class="fa fa-heartbeat"></i> {{ $t('menu.productData.items.stress_test_systems') }} <i class="fa fa-chevron-right"></i></a>
              <hr>
              <a href="/products/holter-monitors"><i class="fa fa-heartbeat"></i> {{ $t('menu.productData.items.holter_monitors') }} <i class="fa fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      
      <a href="/about">{{ $t('menu.about') }}</a>
      <a href="/contact">{{ $t('menu.contact') }}</a>
      <a href="/blog">{{ $t('menu.blog') }}</a>
      <a href="/faq">{{ $t('menu.faq') }}</a>
    </div>
    
    <!-- Sélecteur de langue -->
    <div class="language-selector">
      <select v-model="selectedLanguage" @change="changeLanguage">
        <option value="de">{{ $t('language.de') }}</option>
        <option value="en">{{ $t('language.en') }}</option>
        <option value="fr">{{ $t('language.fr') }}</option>
      </select>
    </div>
  </div>
</template>

<script>
export default {
  name: 'MegaMenu',
  data() {
    return {
      showDropdown: false,
      showProductsDropdown: false,
      selectedLanguage: this.$i18n.locale || 'de'
    }
  },
  methods: {
    changeLanguage() {
      this.$i18n.locale = this.selectedLanguage;
      // Vous pouvez aussi sauvegarder la préférence de langue dans localStorage
      localStorage.setItem('userLanguage', this.selectedLanguage);
    }
  },
  mounted() {
    // Récupérer la langue sauvegardée si elle existe
    const savedLanguage = localStorage.getItem('userLanguage');
    if (savedLanguage) {
      this.selectedLanguage = savedLanguage;
      this.$i18n.locale = savedLanguage;
    }
  }
}
</script>

<style scoped>
* {
  box-sizing: border-box;
}

.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 20px;
}
.title-container {
  flex: 0 0 auto;
  min-width: 0;
}

.app-title {
  font-size: 1.25rem;
  font-weight: 600;
  color: white !important;
  white-space: nowrap;
  padding-right: 16px;
  margin-right: auto;
}

.nav-links {
  display: flex;
  flex-grow: 1;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
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
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: rgb(9, 113, 182);
}

.dropdown-content {
  position: absolute;
  background-color: #f9f9f9;
  width: 80%; /* Réduit de 100% à 80% */
  left: 10%; /* Centré avec 10% de marge à gauche */
  right: 10%; /* Centré avec 10% de marge à droite */
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  max-width: 1200px; /* Largeur maximale pour les très grands écrans */
  margin: 0 auto; /* Centrage supplémentaire */
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
.column a {
  float: none;
  color: #333;
  padding: 10px 16px;
  text-decoration: none;
  display: flex; /* Garder flex pour l'alignement */
  align-items: center; /* Alignement vertical */
  text-align: left;
  transition: background-color 0.3s;
  position: relative; /* Pour positionnement relatif */
}

.column a i:not(.fa-chevron-right) {
  margin-right: 10px; /* Espace après l'icône principale */
  min-width: 20px; /* Largeur fixe pour l'alignement */
  text-align: center;
}

.column a i.fa-chevron-right {
  position: absolute; /* Position absolue par rapport à l'élément parent */
  right: 16px; /* Alignement à droite avec le même padding que le texte */
  color: #666;
  font-size: 12px;
}

/* Pour s'assurer que le texte ne passe pas sous la flèche */
.column a span {
  flex-grow: 1;
  padding-right: 20px; /* Espace pour la flèche */
}

/* Ajouter ceci pour mieux aligner les icônes et le texte */
.column a i:first-child {
  margin-right: 10px;
  width: 20px; /* Largeur fixe pour aligner verticalement */
  text-align: center;
}

.column a:hover {
  background-color: #ddd;
  color: rgb(9, 113, 182);
}

.column a i {
  margin-right: 8px;
  color: rgb(9, 113, 182);
}

.column a i.fa-chevron-right {
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

.language-selector select {
  padding: 8px 12px;
  border-radius: 4px;
  border: none;
  background-color: #f9f9f9;
  color: #333;
  font-size: 14px;
}


/* Responsive layout */
/* Pour les écrans plus petits, ajustements supplémentaires */
@media screen and (max-width: 960px) {
  .dropdown-content {
    width: 90%;
    left: 5%;
    right: 5%;
  }
}

@media screen and (max-width: 600px) {
  .dropdown-content {
    width: 95%;
    left: 2.5%;
    right: 2.5%;
  }
  
  .column {
    padding: 5px;
  }
}


@media screen and (max-width: 960px) {
  .navbar {
    flex-direction: column;
    padding: 10px;
  }
  
  .app-title {
    margin-bottom: 10px;
    margin-right: 0;
  }
  
  .nav-links {
    width: 100%;
    flex-wrap: wrap;
    justify-content: center;
  }
  
  .column {
    width: 50%;
  }
  
  .language-selector {
    margin-top: 10px;
  }
}

@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
  
  .navbar a, .dropdown .dropbtn {
    padding: 10px 12px;
    font-size: 14px;
  }
}
</style>