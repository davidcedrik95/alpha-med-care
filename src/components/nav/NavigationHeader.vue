<template>
  <header class="top-bar">
    <!-- Top bar (hidden on mobile) -->
    <div class="top-bar-upper">
        <div class="top-bar-left">
          <span class="hide-on-mobile">
            <i class="mdi mdi-truck"></i> {{ $t('header.free_shipping') }}
          </span>
          <span class="hide-on-mobile price-info">
            <i class="mdi mdi-currency-eur"></i> {{ $t('header.prices_incl_vat') }}
            <span class="tooltip">{{ $t('header.prices_incl_vat_tooltip') }}</span>
          </span>
          <span class="hide-on-mobile">
            <i class="mdi mdi-phone"></i> {{ $t('header.phone_label') }}: {{ $t('header.phone') }}
          </span>
        </div>
        <div class="top-bar-right">
          <span class="hide-on-mobile">
            <i class="mdi mdi-file-document"></i> {{ $t('header.invoice') }}
          </span>
          <span class="hide-on-mobile">
            <i class="mdi mdi-headset"></i> {{ $t('header.consultation') }}
          </span>
        </div>
    </div>

    <!-- Bottom bar -->
    <div class="top-bar-lower">
      <div class="logo-section">
        <a href="/" class="logo-link" :aria-label="$t('app.title')">
          <img src="/images/logo.png" :alt="$t('app.title')" />
        </a>
        <div class="logo-subtext hide-on-mobile">{{ $t('header.logo_subtext') }}</div>
      </div>

      <!-- Desktop search -->
      <form 
        class="search-bar desktop-search" 
        role="search" 
        :class="{ 'active': searchExpanded && !isMobile }" 
        @submit.prevent="performSearch"
      >
        <input 
          type="search"
          :placeholder="$t('header.search_placeholder')"
          :aria-label="$t('header.search_placeholder')"
          autocomplete="off"
          spellcheck="false"
          v-model="searchQuery"
          @focus="searchExpanded = true"
          @blur="searchExpanded = false"
          v-if="!isMobile"
        />
        <button type="submit" :aria-label="$t('header.search')">
          <i class="mdi mdi-magnify"></i>
        </button>
      </form>

      <!-- Icons -->
      <nav class="top-bar-links" :aria-label="$t('menu.categories.sales')">
        <!-- Wishlist link -->
      <a href="#" class="link-item" 
        :aria-label="$t('header.wishlist')" 
        @click.prevent="toggleWishlist">
        <i class="mdi mdi-heart"></i>
        <span class="link-text hide-on-mobile">{{ $t('header.wishlist') }}</span>
        <span class="wishlist-badge" aria-hidden="true" v-if="wishlistStore.items.length > 0">
          {{ wishlistStore.items.length }}
        </span>
      </a>

        <div class="account-dropdown">
          <button class="link-item" @click="toggleAccountMenu" :aria-label="$t('header.account')" aria-haspopup="true" :aria-expanded="accountMenuOpen">
            <i class="mdi mdi-account"></i>
            <span class="link-text hide-on-mobile">{{ $t('header.account') }}</span>
          </button>
          
          <div class="dropdown-menu" v-if="accountMenuOpen" @click.stop>
            <div class="mobile-menu-header">
              <h4 class="account-title">{{ $t('account.title') }}</h4>
              <hr>
              <button class="close-menu" @click="closeAccountMenu" :aria-label="$t('menu.close')">
                <i class="mdi mdi-close"></i>
              </button>
            </div>
            
            <div class="login-section">
              <button class="login-button">{{ $t('account.login') }}</button>
              <div class="register-text">
                {{ $t('account.or') }} <u @click="navigateToRegister">{{ $t('account.register') }}</u>
              </div>
            </div>
             <hr>
            <div class="mobile-menu-content">
              <a href="#" class="dropdown-item">
                <i class="mdi mdi-view-dashboard"></i> 
                <span>{{ $t('account.overview') }}</span>
              </a>
              <a href="#" class="dropdown-item">
                <i class="mdi mdi-account-details"></i> 
                <span>{{ $t('account.profile') }}</span>
              </a>
              <a href="#" class="dropdown-item">
                <i class="mdi mdi-map-marker"></i> 
                <span>{{ $t('account.addresses') }}</span>
              </a>
              <a href="#" class="dropdown-item">
                <i class="mdi mdi-credit-card"></i> 
                <span>{{ $t('account.payment_methods') }}</span>
              </a>
              <a href="#" class="dropdown-item">
                <i class="mdi mdi-package-variant"></i> 
                <span>{{ $t('account.orders') }}</span>
              </a>
            </div>
          </div>
        </div>

        <!-- Cart link -->
        <a href="#" class="link-item cart-link" 
          :aria-label="$t('header.cart')" 
          @click.prevent="toggleCart">
          <i class="mdi mdi-cart"></i>
          <span class="link-text hide-on-mobile">{{ $t('header.cart') }}</span>
          <span class="cart-badge" aria-hidden="true">{{ cartItems.length }}</span>
        </a>
  
        <!-- Cart component -->
        <SideCart />
      </nav>

      <!-- Mobile search icon -->
      <button class="mobile-search-icon" @click="toggleSearch" v-if="isMobile" :aria-label="$t('header.search')">
        <i class="mdi mdi-magnify"></i>
      </button>
    </div>

    <!-- Barre de recherche mobile améliorée -->
    <div class="mobile-search-container" v-if="isMobile && searchExpanded">
      <div class="mobile-search-header">
        <button 
          class="back-button"
          @click="closeSearch"
          :aria-label="$t('menu.close')"
        >
          <i class="mdi mdi-arrow-left"></i>
        </button>
        <form 
          class="mobile-search-bar" 
          role="search" 
          @submit.prevent="performSearch"
        >
          <input 
            type="search"
            class="mobile-search-input"
            :placeholder="$t('header.search_placeholder')"
            :aria-label="$t('header.search_placeholder')"
            autocomplete="off"
            spellcheck="false"
            v-model="searchQuery"
            ref="mobileSearchInput"
          />
          <button 
            v-if="searchQuery" 
            type="button" 
            class="clear-search" 
            @click="clearSearch"
            :aria-label="$t('header.clear_search')"
          >
            <i class="mdi mdi-close"></i>
          </button>
        </form>
        <button 
          type="submit" 
          class="search-submit"
          :aria-label="$t('header.search')"
          @click="performSearch"
          :disabled="!searchQuery.trim()"
        >
          <i class="mdi mdi-magnify"></i>
        </button>
      </div>

      <!-- Suggestions de recherche -->
      <div class="search-suggestions" v-if="searchSuggestions.length > 0">
        <div 
          v-for="(suggestion, index) in searchSuggestions" 
          :key="index"
          class="suggestion-item"
          @click="selectSuggestion(suggestion)"
        >
          {{ suggestion }}
        </div>
      </div>
    </div>

    <!-- Wishlist component -->
    <SideWishlist />
  </header>
</template>

<script setup>
import { ref, onMounted, computed, onBeforeUnmount, watch, nextTick } from 'vue'
import { useCartStore } from '@/stores/cart'
import SideCart from './SideCart.vue'
import { useWishlistStore } from '@/stores/wishlist'
import SideWishlist from '@/layouts/SideWishlist.vue'

const wishlistStore = useWishlistStore()

function toggleWishlist() {
  wishlistStore.toggleWishlist()
}

const searchQuery = ref('')
const searchExpanded = ref(false)
const isMobile = ref(window.innerWidth <= 768)
const accountMenuOpen = ref(false)
const mobileSearchInput = ref(null)
const searchSuggestions = ref([])

// Using Pinia store
const cartStore = useCartStore()

const cartItems = computed(() => cartStore.items)
const cartOpen = computed(() => cartStore.cartOpen)

function toggleCart() {
  cartStore.toggleCart()
}

function updateIsMobile() {
  const mobileNow = window.innerWidth <= 768
  if (isMobile.value !== mobileNow) {
    isMobile.value = mobileNow
    if (!mobileNow) {
      searchExpanded.value = false
    }
  }
}

function toggleSearch() {
  searchExpanded.value = !searchExpanded.value
  if (searchExpanded.value) {
    nextTick(() => {
      mobileSearchInput.value.focus()
    })
  }
}

function closeSearch() {
  searchExpanded.value = false
}

function performSearch() {
  if (searchQuery.value.trim() === '') return
  alert(`${$t('header.search')}: ${searchQuery.value}`)
  searchExpanded.value = false
  searchQuery.value = ''
  searchSuggestions.value = []
}

function toggleAccountMenu() {
  accountMenuOpen.value = !accountMenuOpen.value
}

function closeAccountMenu() {
  accountMenuOpen.value = false
}

function navigateToRegister() {
  closeAccountMenu()
}

function clearSearch() {
  searchQuery.value = ''
  searchSuggestions.value = []
  mobileSearchInput.value.focus()
}

function selectSuggestion(suggestion) {
  searchQuery.value = suggestion
  performSearch()
}

watch(searchQuery, async (newVal) => {
  if (newVal.length > 2) {
    // Simuler des suggestions basées sur la recherche
    searchSuggestions.value = await fetchSuggestions(newVal)
  } else {
    searchSuggestions.value = []
  }
})

async function fetchSuggestions(query) {
  // Simulation de suggestions - à remplacer par un appel API réel
  return [
    `${query} téléphone`,
    `${query} portable`,
    `${query} accessoire`,
    `${query} casque`
  ]
}

onMounted(() => {
  window.addEventListener('resize', updateIsMobile)
  document.addEventListener('click', (e) => {
    if (!e.target.closest('.account-dropdown')) {
      closeAccountMenu()
    }
  })
})

onBeforeUnmount(() => {
  window.removeEventListener('resize', updateIsMobile)
  document.removeEventListener('click', () => {})
})
</script>

<style scoped>
/* Reset basique */
.top-bar {
  width: 100%;
  font-family: "Open Sans", Arial, sans-serif;
  background-color: #fff;
  color: #333;
  user-select: none;
  border-bottom: 1px solid #ddd;
  position: relative;
  z-index: 1100;
}

/* Barre supérieure, cachée sur mobile */
.top-bar-upper {
  display: flex;
  justify-content: space-between;
  padding: 6px 12px;
  font-size: 12px;
  background-color: #d4d1d1be;
  color: #5a5959;
}

.top-bar-left,
.top-bar-right {
  display: flex;
  gap: 20px;
  align-items: center;
}

.hide-on-mobile {
  display: inline-block;
}

@media (max-width: 768px) {
  .top-bar-upper {
    display: none;
  }
  .hide-on-mobile {
    display: none !important;
  }
}

.price-info {
  position: relative;
}

.price-info .tooltip {
  visibility: hidden;
  width: 200px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -100px;
  opacity: 0;
  transition: opacity 0.3s;
}

.price-info:hover .tooltip {
  visibility: visible;
  opacity: 1;
}

/* Barre inférieure */
.top-bar-lower {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 8px 12px;
  background: white;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

/* Logo */
.logo-section {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  max-width: 180px;
}

.logo-link img {
  max-height: 40px;
  width: auto;
  display: block;
}

.logo-subtext {
  font-size: 12px;
  color: #666;
  margin-top: 4px;
}

/* Recherche */
.search-bar {
  position: relative;
  flex-grow: 1;
  max-width: 500px;
  margin: 0 16px;
  display: flex;
  align-items: center;
  border: 1px solid #bbb;
  border-radius: 4px;
  background: #fff;
  transition: box-shadow 0.3s ease;
}

.search-bar input {
  flex-grow: 1;
  border: none;
  padding: 8px 12px;
  font-size: 14px;
  outline-offset: 0;
}

.search-bar input:focus {
  outline: none;
}

.search-bar button {
  border: none;
  background: transparent;
  padding: 8px 12px;
  cursor: pointer;
  color: #666;
  display: flex;
  align-items: center;
  justify-content: center;
}

.search-bar.active {
  box-shadow: 0 0 5px #007bff;
}

/* Liens icônes */
.top-bar-links {
  display: flex;
  gap: 24px;
  align-items: center;
}

.link-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  color: #333;
  text-decoration: none;
  font-size: 14px;
  position: relative;
  background: none;
  border: none;
  cursor: pointer;
}

.link-item .mdi {
  font-size: 25px;
  margin: 0 0 6px 0;
}

.link-text {
  white-space: normal;
  font-size: 14px;
}

/**Login Section */
.login-section {
  padding: 12px 16px;
  text-align: center;
}

.account-title {
  margin: 10px;
  margin-top: 5px;
  color: #333;
}


hr {
  border: none;
  height: 1px;
  background-color: #ccc;
  width: 90%;           /* ↪ réduit la largeur à 60% de l'écran */
  margin: 20px auto;    /* ↪ 20px haut/bas, auto pour centrer horizontalement */
}

.account-header {
  padding: 12px 16px 8px;
  border-bottom: 1px solid #eee;
  margin-bottom: 8px;
}

.account-header h4 {
  margin: 0;
  color: #333;
  font-size: 16px;
  font-weight: 600;
}

.login-button {
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.2s;
}

.login-button:hover {
  background-color: #0069d9;
}

.register-text {
  margin-top: 8px;
  font-size: 13px;
  color: #666;
}

.dropdown-divider {
  height: 1px;
  background-color: #eee;
  margin: 8px 0;
}

.close-menu{
  display: none;
}

.wishlist-badge {
  position: absolute;
  top: -6px;
  right: -6px;
  background-color: #ff3b3b;
  color: white;
  font-size: 11px;
  font-weight: bold;
  padding: 2px 6px;
  border-radius: 50%;
  pointer-events: none;
}

/* Styles spécifiques mobile */
@media (max-width: 768px) {

  hr {
   display: none;
  }

  .dropdown-menu {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    border-radius: 0;
    box-shadow: none;
    padding: 0;
    overflow-y: auto;
    background: #f8f9fa;
    animation: slideIn 0.3s ease-out;
  }

  .mobile-menu-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px;
    background: white;
    border-bottom: 1px solid #eee;
    position: sticky;
    top: 0;
    z-index: 10;
  }

  .mobile-menu-header h4 {
    margin: 0;
    font-size: 18px;
    color: #333;
  }

  .close-menu {
    display: block; /* affiché en bloc */
    background: none;
    border: none;
    font-size: 24px;
    color: #666;
    padding: 0;
    cursor: pointer;
  }

  .login-section {
    padding: 20px 16px;
    background: white;
    margin: 8px 0;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
  }

  .login-button {
    padding: 12px;
    font-size: 16px;
  }

  .register-text {
    font-size: 14px;
    margin-top: 12px;
  }

  .mobile-menu-content {
    padding: 8px 0;
    background: white;
    margin-top: 8px;
  }

  .dropdown-item {
    padding: 16px;
    font-size: 16px;
    border-bottom: 1px solid #f0f0f0;
  }

  .dropdown-item .mdi {
    font-size: 24px;
    width: 32px;
  }

  @keyframes slideIn {
    from {
      transform: translateX(100%);
    }
    to {
      transform: translateX(0);
    }
  }
}


@media (max-width: 768px) {
  .link-item {
    flex-direction: row;
    align-items: center;
  }
  .link-item .mdi {
    font-size: 20px;
    margin: 0 6px 0 0;
  }
  .link-text {
    display: none;
  }
}

.link-item:hover {
  color: #007bff;
}

/* Badge du panier */
.cart-badge {
  position: absolute;
  top: -6px;
  right: -6px;
  background-color: #ff3b3b;
  color: white;
  font-size: 11px;
  font-weight: bold;
  padding: 2px 6px;
  border-radius: 50%;
  pointer-events: none;
}

/* Recherche mobile */
.mobile-search-icon {
  background: none;
  border: none;
  cursor: pointer;
  padding: 6px;
  color: #333;
  display: none;
}

@media (max-width: 768px) {
  .mobile-search-icon {
    display: inline-flex;
  }

  .desktop-search {
    display: none;
  }
}

/* Conteneur recherche mobile en overlay */
.mobile-search-container {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 2000;
  background: white;
  display: flex;
  flex-direction: column;
  animation: slideIn 0.3s ease-out;
}

.mobile-search-header {
  display: flex;
  align-items: center;
  padding: 12px 8px;
  border-bottom: 1px solid #eee;
  background: white;
  box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.back-button {
  border: none;
  background: none;
  padding: 8px;
  margin-right: 8px;
  font-size: 24px;
  color: #333;
  cursor: pointer;
}

.mobile-search-bar {
  flex: 1;
  position: relative;
  display: flex;
}

.mobile-search-input {
  width: 100%;
  padding: 12px 36px 12px 16px;
  font-size: 16px;
  border: 1px solid #ddd;
  border-radius: 24px;
  outline: none;
  box-shadow: 0 1px 2px rgba(0,0,0,0.05);
}

.clear-search {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  background: none;
  border: none;
  color: #999;
  padding: 4px;
  font-size: 18px;
  cursor: pointer;
}

.search-submit {
  border: none;
  background: none;
  padding: 8px 12px;
  font-size: 24px;
  color: #007bff;
  cursor: pointer;
  margin-left: 8px;
}

.search-submit:disabled {
  color: #ccc;
  cursor: not-allowed;
}

/* Suggestions de recherche */
.search-suggestions {
  flex: 1;
  overflow-y: auto;
  padding: 12px;
}

.suggestion-item {
  padding: 14px 16px;
  border-bottom: 1px solid #f0f0f0;
  font-size: 16px;
  cursor: pointer;
  transition: background 0.2s;
}

.suggestion-item:last-child {
  border-bottom: none;
}

.suggestion-item:hover {
  background-color: #f9f9f9;
}

/* Animation d'entrée */
@keyframes slideIn {
  from {
    transform: translateY(20px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

/* Menu déroulant compte */
.account-dropdown {
  position: relative;
  display: inline-block;
  
}

.dropdown-menu {
  position: absolute;
  right: 0;
  top: 100%;
  background: white;
  min-width: 220px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  border-radius: 4px;
  padding: 8px 0;
  z-index: 100;
  margin-top: 4px;
  animation: fadeIn 0.2s ease-out;
}

.dropdown-item {
  display: flex;
  align-items: center;
  padding: 10px 16px;
  color: #333;
  text-decoration: none;
  font-size: 14px;
  gap: 10px;
  transition: all 0.2s;
}

.dropdown-item:hover {
  background-color: #f5f5f5;
  color: #007bff;
}

.dropdown-item .mdi {
  font-size: 20px;
  width: 24px;
  text-align: center;
}

/* Pour les mobiles */
@media (max-width: 768px) {
  .dropdown-menu {
    position: fixed;
    top: 56px;
    left: 0;
    right: 0;
    width: 100%;
    border-radius: 0;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  }
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>