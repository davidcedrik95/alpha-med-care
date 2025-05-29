<template>
  <header class="top-bar">
    <!-- Barre supérieure (cachée sur mobile) -->
    <div class="top-bar-upper">
      <div class="top-bar-left">
        <span class="hide-on-mobile">
          <i class="mdi mdi-truck"></i> {{ $t('header.free_shipping') }}
        </span>
        <span class="hide-on-mobile">
          <i class="mdi mdi-phone"></i> {{ $t('header.phone') }}
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

    <!-- Barre inférieure -->
    <div class="top-bar-lower">
      <div class="logo-section">
        <a href="/" class="logo-link" aria-label="Logo">
          <img src="/images/logo.png" :alt="$t('app.title')" />
        </a>
        <div class="logo-subtext hide-on-mobile">{{ $t('header.logo_subtext') }}</div>
      </div>

      <!-- Recherche desktop -->
      <form 
        class="search-bar desktop-search" 
        role="search" 
        :class="{ 'active': searchExpanded && !isMobile }" 
        @submit.prevent="performSearch"
      >
        <input 
          type="search"
          :placeholder="$t('header.search_placeholder')"
          aria-label="Search field"
          autocomplete="off"
          spellcheck="false"
          v-model="searchQuery"
          @focus="searchExpanded = true"
          @blur="searchExpanded = false"
          v-if="!isMobile"
        />
        <button type="submit" aria-label="Search">
          <i class="mdi mdi-magnify"></i>
        </button>
      </form>

      <!-- Icônes -->
      <nav class="top-bar-links" aria-label="Secondary navigation">
        <a href="#" class="link-item" :aria-label="$t('header.wishlist')">
          <i class="mdi mdi-heart"></i>
          <span class="link-text hide-on-mobile">{{ $t('header.wishlist') }}</span>
        </a>

        <div class="account-dropdown">
          <button class="link-item" @click="toggleAccountMenu" :aria-label="$t('header.account')" aria-haspopup="true" :aria-expanded="accountMenuOpen">
            <i class="mdi mdi-account"></i>
            <span class="link-text hide-on-mobile">{{ $t('header.account') }}</span>
          </button>
          
          <div class="dropdown-menu" v-if="accountMenuOpen" @click.stop>
            <div class="account-header">
              <h4>Mein Konto</h4>
            </div>
            <div class="login-section">
              <button class="login-button">{{ $t('account.login') }}</button>
              <div class="register-text">
                {{ $t('account.or') }} <u>{{ $t('account.register') }}</u>
              </div>
            </div>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="mdi mdi-view-dashboard"></i> {{ $t('account.overview') }}
            </a>
            <a href="#" class="dropdown-item">
              <i class="mdi mdi-account-details"></i> {{ $t('account.profile') }}
            </a>
            <a href="#" class="dropdown-item">
              <i class="mdi mdi-map-marker"></i> {{ $t('account.addresses') }}
            </a>
            <a href="#" class="dropdown-item">
              <i class="mdi mdi-credit-card"></i> {{ $t('account.payment_methods') }}
            </a>
            <a href="#" class="dropdown-item">
              <i class="mdi mdi-package-variant"></i> {{ $t('account.orders') }}
            </a>
          </div>
        </div>

        <a href="#" class="link-item cart-link" :aria-label="$t('header.cart')">
          <i class="mdi mdi-cart"></i>
          <span class="link-text hide-on-mobile">{{ $t('header.cart') }}</span>
          <span class="cart-badge" aria-hidden="true">0</span>
        </a>
      </nav>

      <!-- Icône de recherche mobile -->
      <button class="mobile-search-icon" @click="toggleSearch" v-if="isMobile" aria-label="Toggle search">
        <i class="mdi mdi-magnify"></i>
      </button>
    </div>

    <!-- Recherche mobile -->
    <div class="mobile-search-container" v-if="isMobile && searchExpanded">
      <form class="mobile-search-bar" role="search" @submit.prevent="performSearch">
        <input 
          type="search"
          :placeholder="$t('header.search_placeholder')"
          aria-label="Search field"
          autocomplete="off"
          spellcheck="false"
          v-model="searchQuery"
          autofocus
        />
        <button type="button" class="close-search" @click="closeSearch" aria-label="Close search">
          <i class="mdi mdi-close"></i>
        </button>
        <button type="submit" aria-label="Search">
          <i class="mdi mdi-magnify"></i>
        </button>
      </form>
    </div>
  </header>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'

const searchQuery = ref('')
const searchExpanded = ref(false)
const isMobile = ref(window.innerWidth <= 768)
const accountMenuOpen = ref(false)

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
}

function closeSearch() {
  searchExpanded.value = false
}

function performSearch() {
  if (searchQuery.value.trim() === '') return
  alert(`Recherche lancée : ${searchQuery.value}`)
  searchExpanded.value = false
  searchQuery.value = ''
}

function toggleAccountMenu() {
  accountMenuOpen.value = !accountMenuOpen.value
}

function closeAccountMenu() {
  accountMenuOpen.value = false
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
  z-index: 1000;
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
  top: 56px;
  left: 0;
  right: 0;
  z-index: 1001;
  background: white;
  padding: 12px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

/* Barre recherche mobile */
.mobile-search-bar {
  display: flex;
  align-items: center;
  gap: 8px;
}

.mobile-search-bar input {
  flex-grow: 1;
  font-size: 16px;
  padding: 8px 12px;
  border: 1px solid #bbb;
  border-radius: 4px;
  outline: none;
}

.mobile-search-bar button {
  border: none;
  background: transparent;
  font-size: 18px;
  cursor: pointer;
  color: #666;
  padding: 4px 8px;
}

.close-search .mdi {
  font-size: 24px;
  color: #999;
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