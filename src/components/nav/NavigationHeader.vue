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

        <a href="#" class="link-item" :aria-label="$t('header.account')">
          <i class="mdi mdi-account"></i>
          <span class="link-text hide-on-mobile">{{ $t('header.account') }}</span>
        </a>

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

// Import des icônes MDI
import { mdiTruck, mdiPhone, mdiFileDocument, mdiHeadset, 
         mdiMagnify, mdiHeart, mdiAccount, mdiCart, mdiClose } from '@mdi/js'

const searchQuery = ref('')
const searchExpanded = ref(false)
const isMobile = ref(window.innerWidth <= 768)

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

onMounted(() => {
  window.addEventListener('resize', updateIsMobile)
})

onBeforeUnmount(() => {
  window.removeEventListener('resize', updateIsMobile)
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
}

.link-item .mdi {
  font-size: 25px;
  margin: 0 0 6px 0;
}

.link-text {
  white-space: normal;
  font-size: 14px;
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
</style>