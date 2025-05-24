<template>
  <header class="top-bar">
    <!-- Barre supérieure (cachée sur mobile) -->
    <div class="top-bar-upper">
      <div class="top-bar-left">
        <span class="hide-on-mobile">
          <i class="fas fa-truck fa-sm"></i> {{ $t('header.free_shipping') }}
        </span>
        <span class="hide-on-mobile">
          <i class="fas fa-phone fa-sm"></i> {{ $t('header.phone') }}
        </span>
      </div>
      <div class="top-bar-right">
        <span class="hide-on-mobile">
          <i class="fas fa-file-invoice fa-sm"></i> {{ $t('header.invoice') }}
        </span>
        <span class="hide-on-mobile">
          <i class="fas fa-headset fa-sm"></i> {{ $t('header.consultation') }}
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
          <!-- Icône loupe -->
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
            <path d="M10 18a7.952 7.952 0 004.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0118 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zM10 4c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"/>
          </svg>
        </button>
      </form>

      <!-- Groupe d'icônes (mobile et desktop) -->
      <nav class="top-bar-links" aria-label="Secondary navigation">
        <a href="#" class="link-item" :aria-label="$t('header.wishlist')">
          <svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
          <span class="link-text hide-on-mobile">{{ $t('header.wishlist') }}</span>
        </a>

        <a href="#" class="link-item" :aria-label="$t('header.account')">
          <svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
          <span class="link-text hide-on-mobile">{{ $t('header.account') }}</span>
        </a>

        <a href="#" class="link-item cart-link" :aria-label="$t('header.cart')">
          <svg class="icon" viewBox="0 0 24 24" fill="currentColor"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
          <span class="link-text hide-on-mobile">{{ $t('header.cart') }}</span>
          <span class="cart-badge" aria-hidden="true">0</span>
        </a>
      </nav>

      <!-- Icône de recherche mobile -->
      <button class="mobile-search-icon" @click="toggleSearch" v-if="isMobile" aria-label="Toggle search">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
          <path d="M10 18a7.952 7.952 0 004.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0118 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zM10 4c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"/>
        </svg>
      </button>
    </div>

    <!-- Recherche mobile (apparait en overlay) -->
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
          ✕
        </button>
        <button type="submit" aria-label="Search">
          🔍
        </button>
      </form>
    </div>
  </header>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, nextTick } from 'vue'

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
}

/* Barre supérieure, cachée sur mobile */
.top-bar-upper {
  display: flex;
  justify-content: space-between;
  padding: 6px 12px;
  font-size: 12px;
  background-color: #f7f7f7;
  color: #666;
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
/* Pour les icônes de droite sur desktop */
.top-bar-links {
  display: flex;
  gap: 24px;
  align-items: center;
}

/* Chaque lien devient un bloc avec texte en dessous de l’icône */
.link-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  color: #333;
  text-decoration: none;
  font-size: 14px;
  position: relative;
}

/* On agrandit les icônes pour desktop */
.link-item .icon {
  width: 25px;   /* taille augmentée */
  height: 25px;
  margin: 0 0 6px 0; /* espace entre icône et texte */
  fill: currentColor;
}

/* Texte sous l’icône */
.link-text {
  white-space: normal;
  font-size: 14px;
}

/* En mobile on revient à l’ancien style avec texte caché */
@media (max-width: 768px) {
  .link-item {
    flex-direction: row;
    align-items: center;
  }
  .link-item .icon {
    width: 20px;
    height: 20px;
    margin: 0 6px 0 0;
  }
  .link-text {
    display: none;
  }
}


.link-item:hover {
  color: #007bff;
}

.icon {
  width: 20px;
  height: 20px;
  margin-right: 6px;
  fill: currentColor;
}

/* Texte à côté des icônes caché sur mobile */
.link-text {
  white-space: nowrap;
}

@media (max-width: 768px) {
  .link-text {
    display: none;
  }
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
  top: 56px; /* juste sous le header */
  left: 0;
  right: 0;
  background: white;
  padding: 12px;
  border-bottom: 1px solid #ddd;
  z-index: 9999;
  box-shadow: 0 2px 6px rgb(0 0 0 / 0.15);
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

.close-search {
  font-weight: bold;
  font-size: 24px;
  color: #999;
}
</style>
