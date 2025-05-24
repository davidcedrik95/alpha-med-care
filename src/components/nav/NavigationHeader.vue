<template>
  <header class="top-bar">
    <!-- Barre supérieure (masquée sur mobile) -->
    <div class="top-bar-upper">
      <div class="top-bar-left">
        <span class="hide-on-mobile">
          <i class="fas fa-truck fa-sm" style="margin-right: 5px;"></i>
          {{ $t('header.free_shipping') }}
        </span>
        <span class="hide-on-mobile">
          <i class="fas fa-phone fa-sm" style="margin-right: 5px;"></i>
          {{ $t('header.phone') }}
        </span>
      </div>

      <div class="top-bar-right">
        <span class="hide-on-mobile">
          <i class="fas fa-file-invoice fa-sm" style="margin-right: 5px;"></i>
          {{ $t('header.invoice') }}
        </span>
        <span class="hide-on-mobile">
          <i class="fas fa-headset fa-sm" style="margin-right: 5px;"></i>
          {{ $t('header.consultation') }}
        </span>
      </div>
    </div>
    
    <!-- Barre inférieure -->
    <div class="top-bar-lower">
      <div class="logo-section">
        <div class="logo-container" aria-label="Firmenlogo">
          <a href="/">
            <img src="/images/logo.png" :alt="$t('app.title')" width="160" height="40" loading="lazy" style="border-radius: 5px;"/>
          </a>
        </div>
        <div class="logo-subtext hide-on-mobile">{{ $t('header.logo_subtext') }}</div>
      </div>

      <!-- Barre de recherche desktop -->
      <form class="search-bar desktop-search" role="search" :class="{ 'active': searchExpanded && !isMobile }" @submit.prevent="performSearch">
        <input 
          type="search"
          :placeholder="$t('header.search_placeholder')"
          aria-label="Search field"
          autocomplete="off"
          spellcheck="false"
          ref="searchInput"
          v-model="searchQuery"
          @focus="searchExpanded = true"
          @blur="searchExpanded = false"
          v-if="!isMobile"
        />
        <button type="submit" :aria-label="$t('header.search_placeholder')">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
            <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"/>
          </svg>
        </button>
      </form>

      <!-- Groupe d'icônes droite (mobile) -->
      <div class="mobile-icons-group">
        <!-- Icône de recherche mobile -->
        <button class="mobile-search-icon" @click="toggleSearch" v-if="isMobile">
          <div class="mobile-search-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
              <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"/>
            </svg>
            <span class="link-text">{{ $t('header.search') }}</span>
          </div>
        </button>

        <nav class="top-bar-links" aria-label="Secondary navigation">
          <a href="#" class="link-item" :aria-label="$t('header.wishlist')">
            <svg class="icon" viewBox="0 0 24 24">
              <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 
                       2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09
                       C13.09 3.81 14.76 3 16.5 3
                       19.58 3 22 5.42 22 8.5
                       c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
            </svg>
            <span class="link-text">{{ $t('header.wishlist') }}</span>
          </a>

          <a href="#" class="link-item" :aria-label="$t('header.account')">
            <svg class="icon" viewBox="0 0 24 24">
              <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4
                       -4 1.79-4 4 1.79 4 4 4zm0 2
                       c-2.67 0-8 1.34-8 4v2h16v-2
                       c0-2.66-5.33-4-8-4z"/>
            </svg>
            <span class="link-text">{{ $t('header.account') }}</span>
          </a>

          <a href="#" class="link-item cart-link" :aria-label="$t('header.cart')">
            <svg class="icon" viewBox="0 0 24 24">
              <path d="M7 18c-1.1 0-1.99.9-1.99 2
                       S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2
                       l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96
                       0 1.1.9 2 2 2h12v-2H7.42
                       c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63
                       h7.45c.75 0 1.41-.41 1.75-1.03
                       l3.58-6.49c.08-.14.12-.31.12-.48
                       0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16
                       c-1.1 0-1.99.9-1.99 2s.89 2
                       1.99 2 2-.9 2-2-.9-2-2-2z"/>
            </svg>
            <span class="link-text">{{ $t('header.cart') }}</span>
            <span class="cart-badge" aria-hidden="true">0</span>
          </a>
        </nav>
      </div>
    </div>

    <!-- Barre de recherche mobile (apparaît lors du clic) -->
    <div class="mobile-search-container" v-if="isMobile && searchExpanded">
      <form class="mobile-search-bar" role="search" @submit.prevent="performSearch">
        <input 
          type="search"
          :placeholder="$t('header.search_placeholder')"
          aria-label="Search field"
          autocomplete="off"
          spellcheck="false"
          ref="mobileSearchInput"
          v-model="searchQuery"
        />
        <button type="button" class="close-search" @click="closeSearch" :aria-label="$t('header.close_search')">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg>
        </button>
      </form>
    </div>
  </header>
</template>

<script setup>
import { ref, computed, onMounted, onBeforeUnmount } from 'vue'

const searchQuery = ref('')
const searchExpanded = ref(false)

const isMobile = ref(window.innerWidth <= 768)

function updateIsMobile() {
  isMobile.value = window.innerWidth <= 768
}

// Écouteur resize pour mettre à jour isMobile
onMounted(() => {
  window.addEventListener('resize', updateIsMobile)
})
onBeforeUnmount(() => {
  window.removeEventListener('resize', updateIsMobile)
})

function toggleSearch() {
  searchExpanded.value = !searchExpanded.value
  if (searchExpanded.value) {
    nextTick(() => {
      const input = isMobile.value ? mobileSearchInput.value : searchInput.value
      input?.focus()
    })
  }
}

function closeSearch() {
  searchExpanded.value = false
  searchQuery.value = ''
}

// Refs inputs
const searchInput = ref(null)
const mobileSearchInput = ref(null)

function performSearch() {
  if (!searchQuery.value.trim()) return
  // Exemple: redirection ou action de recherche
  alert(`Recherche lancée: ${searchQuery.value}`)
  searchQuery.value = ''
  searchExpanded.value = false
}
</script>

<style scoped>
.top-bar {
  font-family: Arial, sans-serif;
  color: #444;
  user-select: none;
}

/* Barre supérieure */
.top-bar-upper {
  display: flex;
  justify-content: space-between;
  background: #f7f7f7;
  padding: 0.4rem 1rem;
  font-size: 0.85rem;
  color: #666;
}

.top-bar-left, .top-bar-right {
  display: flex;
  gap: 1rem;
  align-items: center;
}

/* Masquer sur mobile */
.hide-on-mobile {
  display: inline-block;
}

@media (max-width: 768px) {
  .hide-on-mobile {
    display: none;
  }
}

/* Barre inférieure */
.top-bar-lower {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0.6rem 1rem;
  background: #fff;
  border-bottom: 1px solid #ddd;
}

.logo-section {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

.logo-container img {
  max-height: 40px;
  border-radius: 5px;
}

.logo-subtext {
  font-size: 0.8rem;
  color: #777;
  margin-top: 2px;
}

/* Barre de recherche desktop */
.search-bar {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  max-width: 350px;
  transition: max-width 0.3s ease;
}

.search-bar input[type="search"] {
  flex-grow: 1;
  padding: 0.35rem 0.5rem;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 0.9rem;
  outline-offset: 2px;
  outline-color: #999;
}

.search-bar input[type="search"]:focus {
  outline-color: #0078d7;
  border-color: #0078d7;
}

.search-bar button {
  border: none;
  background: none;
  cursor: pointer;
  color: #666;
  padding: 0;
}

.search-bar button:hover {
  color: #0078d7;
}

/* Cacher la recherche desktop sur mobile */
@media (max-width: 768px) {
  .desktop-search {
    display: none;
  }
}

/* Groupe icônes mobile */
.mobile-icons-group {
  display: flex;
  align-items: center;
  gap: 1rem;
}

/* Liens de navigation (icônes + texte) */
.top-bar-links {
  display: flex;
  gap: 1rem;
  align-items: center;
}

/* Agrandir les icônes à droite */
.top-bar-links .link-item .icon {
  width: 28px;    /* augmenter largeur */
  height: 28px;   /* augmenter hauteur */
  margin-bottom: 6px; /* un peu plus d’espace sous l’icône */
}

/* Centrer et espacer correctement le texte sous l’icône */
.top-bar-links .link-item .link-text {
  display: block;
  font-size: 0.75rem; /* augmenter un peu la taille du texte */
  line-height: 1.2;
  text-align: center;
  white-space: nowrap; /* éviter que le texte se casse sur plusieurs lignes */
}


.link-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  font-size: 0.65rem;
  color: #555;
  text-decoration: none;
  position: relative;
  width: 48px;
  height: 48px;
  justify-content: center;
}

.link-item:hover,
.link-item:focus-visible {
  color: #0078d7;
}

.link-item .icon {
  fill: currentColor;
  width: 20px;
  height: 20px;
  margin-bottom: 2px;
}

/* Texte sous les icônes */
.link-text {
  display: block;
  font-size: 0.6rem;
  line-height: 1;
}

/* Badge sur le panier */
.cart-badge {
  position: absolute;
  top: 4px;
  right: 8px;
  background: #e74c3c;
  color: white;
  border-radius: 12px;
  font-size: 0.6rem;
  padding: 0 5px;
  pointer-events: none;
}

/* Icône recherche mobile */
.mobile-search-icon {
  background: none;
  border: none;
  cursor: pointer;
  color: #555;
  font-size: 1rem;
  display: flex;
  align-items: center;
  gap: 4px;
  padding: 4px 6px;
  border-radius: 4px;
  user-select: none;
}

.mobile-search-icon:hover,
.mobile-search-icon:focus-visible {
  color: #0078d7;
}

.mobile-search-wrapper {
  display: flex;
  align-items: center;
}

.mobile-search-wrapper svg {
  width: 20px;
  height: 20px;
  fill: currentColor;
}

.mobile-search-wrapper .link-text {
  font-size: 0.85rem;
  font-weight: 600;
}

/* Barre de recherche mobile */
.mobile-search-container {
  padding: 0.5rem 1rem;
  background: white;
  border-bottom: 1px solid #ddd;
}

.mobile-search-bar {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.mobile-search-bar input[type="search"] {
  flex-grow: 1;
  padding: 0.4rem 0.5rem;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 4px;
  outline-offset: 2px;
  outline-color: #999;
}

.mobile-search-bar input[type="search"]:focus {
  outline-color: #0078d7;
  border-color: #0078d7;
}

.close-search {
  background: none;
  border: none;
  cursor: pointer;
  padding: 0;
  color: #555;
  width: 32px;
  height: 32px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 4px;
  user-select: none;
}

.close-search:hover,
.close-search:focus-visible {
  color: #0078d7;
}

.close-search svg {
  width: 18px;
  height: 18px;
}
</style>
