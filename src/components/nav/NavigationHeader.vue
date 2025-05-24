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
      <form class="search-bar desktop-search" role="search" :class="{ 'active': searchExpanded }">
        <input 
          type="search"
          :placeholder="$t('header.search_placeholder')"
          aria-label="Search field"
          autocomplete="off"
          spellcheck="false"
          ref="searchInput"
          v-model="searchQuery"
        />
        <!-- Dans le formulaire de recherche desktop -->
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
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg>
        </button>
      </form>
    </div>
  </header>
</template>

<script setup>
import { useI18n } from 'vue-i18n'
import { ref, onMounted, onBeforeUnmount, nextTick } from 'vue'

const { t } = useI18n()

const searchQuery = ref('')
const searchExpanded = ref(false)
const isMobile = ref(false)
const searchInput = ref(null)
const mobileSearchInput = ref(null)

const checkMobile = () => {
  isMobile.value = window.innerWidth <= 768
}

const toggleSearch = () => {
  searchExpanded.value = !searchExpanded.value
  if (searchExpanded.value) {
    nextTick(() => {
      mobileSearchInput.value.focus()
    })
  }
}

const closeSearch = () => {
  searchExpanded.value = false
  searchQuery.value = ''
}

const performSearch = () => {
  if (searchQuery.value.trim()) {
    // Effectuer la recherche ici
    console.log('Recherche:', searchQuery.value)
    closeSearch()
  }
}

onMounted(() => {
  checkMobile()
  window.addEventListener('resize', checkMobile)
})

onBeforeUnmount(() => {
  window.removeEventListener('resize', checkMobile)
})
</script>

<style scoped>
.top-bar {
  --primary-color: #005b96;
  --secondary-color: #b3e0ff;
  --text-color: white;
  --hover-color: #ffffff;
  --search-bg: white;
  --search-text: #003366;
  --dropdown-bg: white;
  --dropdown-text: #003366;
  --badge-color: #e63946;
  --logo-subtext-color: #e6f2ff;
  
  background-color: var(--primary-color);
  color: var(--text-color);
  padding: 0.625rem 1.25rem;
  font-family: 'Inter', system-ui, -apple-system, sans-serif;
  display: flex;
  flex-direction: column;
  gap: 0.625rem;
  position: sticky;
  top: 0;
  z-index: 1000;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.top-bar-upper {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  font-size: 14px;
}

.top-bar-left, .top-bar-right {
  display: flex;
  gap: 1.25rem;
}

.top-bar-right {
  justify-content: flex-end;
}

.top-bar-lower {
  display: flex;
  justify-content: center; /* Modifié pour centrer les éléments */
  align-items: center;
  flex-wrap: wrap;
  gap: 1rem;
  position: relative;
  width: 100%; /* Assure que le conteneur prend toute la largeur */
}
.logo-section {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  flex-shrink: 0;
  margin-right: 1rem;
  order: 0; /* Logo à gauche */
}

.logo-container img {
  height: 2.5rem;
  width: auto;
  object-fit: contain;
  border-radius: 5px;
}

.logo-subtext {
  font-size: 0.8rem;
  color: var(--logo-subtext-color);
  font-weight: 500;
  white-space: nowrap;
}

/* Barre de recherche desktop */
.desktop-search {
  flex: 1 1 auto;
  min-width: 12rem;
  max-width: 32rem;
  margin: 0 auto; /* Modifié pour centrer */
  position: relative;
  display: flex;
  order: 1; /* Ajouté pour assurer le bon ordre dans le flux flex */
}
.desktop-search input {
  width: 100%;
  padding: 0.5rem 2.5rem 0.5rem 1rem;
  font-size: 0.9rem;
  border: 1px solid var(--search-bg);
  background-color: var(--search-bg);
  color: var(--search-text);
  border-radius: 0.25rem;
  outline: none;
  transition: box-shadow 0.3s ease;
}

.desktop-search input:focus {
  box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.3);
}

.desktop-search button {
  position: absolute;
  right: 0.5rem;
  top: 50%;
  transform: translateY(-50%);
  background: none;
  border: none;
  color: var(--primary-color);
  cursor: pointer;
  padding: 0.25rem;
}

/* Groupe d'icônes mobile */
.mobile-icons-group {
  display: flex;
  align-items: center;
  margin-left: auto;
  gap: 0.5rem;
  order: 2; /* Icônes à droite */
}

/* Icône de recherche mobile */
.mobile-search-icon {
  display: none;
  background: none;
  border: none;
  color: var(--secondary-color);
  padding: 0.5rem;
  cursor: pointer;
  transition: transform 0.2s ease;
}

.mobile-search-icon:active {
  transform: scale(0.9);
}

.mobile-search-icon svg {
  width: 1.5rem;
  height: 1.5rem;
}

/* Barre de recherche mobile */
.mobile-search-container {
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  background: var(--primary-color);
  padding: 0.5rem 1rem;
  z-index: 1001;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.mobile-search-bar {
  display: flex;
  position: relative;
}

/* Styles pour l'icône de recherche mobile avec texte */
/* Modifiez ces styles dans la section <style> */
.mobile-search-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0.25rem;
}

.mobile-search-icon {
  color: var(--secondary-color);
  padding: 0.25rem;
}

.mobile-search-icon .link-text {
  font-size: 0.75rem;
  font-weight: 500;
  color: var(--secondary-color);
  transition: color 0.2s ease;
}

.mobile-search-icon:hover .link-text,
.mobile-search-icon:hover svg {
  color: var(--hover-color);
}

.mobile-search-icon svg {
  width: 1.5rem;
  height: 1.5rem;
  fill: currentColor;
  transition: transform 0.2s ease;
}

.mobile-search-icon:hover svg {
  transform: scale(1.1);
}

@media (max-width: 480px) {
  .mobile-search-icon .link-text {
    display: none;
  }
}

@media (max-width: 480px) {
  .mobile-search-text {
    display: none;
  }
}

.mobile-search-bar input {
  width: 100%;
  padding: 0.75rem 3rem 0.75rem 1rem;
  font-size: 1rem;
  border: 1px solid var(--search-bg);
  background-color: var(--search-bg);
  color: var(--search-text);
  border-radius: 0.25rem;
  outline: none;
}

.close-search {
  position: absolute;
  right: 0.75rem;
  top: 50%;
  transform: translateY(-50%);
  background: none;
  border: none;
  color: var(--primary-color);
  cursor: pointer;
  padding: 0.25rem;
}

.close-search svg {
  width: 1.25rem;
  height: 1.25rem;
}

.hide-on-mobile {
  display: none;
}

.top-bar-links {
  display: flex;
  gap: 1.5rem;
  align-items: center;
}

.link-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  color: var(--secondary-color);
  font-size: 0.75rem;
  text-decoration: none;
  font-weight: 500;
  position: relative;
  transition: color 0.2s ease;
  gap: 0.25rem;
}

.link-item:hover {
  color: var(--hover-color);
}

.icon {
  width: 1.5rem;
  height: 1.5rem;
  fill: currentColor;
  transition: transform 0.2s ease;
}

.link-item:hover .icon {
  transform: scale(1.1);
}

.cart-badge {
  position: absolute;
  top: -0.25rem;
  right: -0.5rem;
  background: var(--badge-color);
  color: white;
  border-radius: 50%;
  font-size: 0.7rem;
  min-width: 1.2rem;
  height: 1.2rem;
  display: flex;
  align-items: center;
  justify-content: center;
  line-height: 1;
  font-weight: bold;
  box-shadow: 0 0 2px rgba(0,0,0,0.3);
}

@media (max-width: 1024px) {
  .top-bar-left,
  .top-bar-right {
    flex: none;
  }
  
  .top-bar-upper {
    flex-wrap: wrap;
    gap: 0.5rem;
  }
}

@media (max-width: 768px) {
  .top-bar {
    padding: 0.5rem;
  }
  
  .top-bar-upper {
    display: none;
  }
  
  .desktop-search {
    display: none;
  }
  
  .mobile-search-icon {
    display: block;
  }
  
  .top-bar-lower {
    flex-wrap: nowrap;
    gap: 0.5rem;
  }
  
  .logo-section {
    margin-right: 0.5rem;
  }
  
  .logo-container img {
    height: 2rem;
  }
  
  .top-bar-links {
    gap: 1rem;
  }
}

@media (min-width: 769px) {
  .hide-on-mobile {
    display: inline;
  }
}

@media (max-width: 480px) {
  .link-text {
    display: none;
  }
  
  .link-item {
    flex-direction: row;
    gap: 0;
  }
  
  .logo-subtext {
    font-size: 0.7rem;
  }
  
  .top-bar-links {
    gap: 0.75rem;
  }
  
  .mobile-icons-group {
    gap: 0.25rem;
  }
}

@media (max-width: 360px) {
  .logo-container img {
    width: 100px;
  }
  
  .mobile-icons-group {
    gap: 0.1rem;
  }
  
  .link-item {
    padding: 0.2rem;
  }
  
  .icon {
    width: 1.2rem;
    height: 1.2rem;
  }
}
</style>