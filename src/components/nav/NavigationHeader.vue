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
        <button class="mobile-search-icon" @click="toggleSearch" v-if="isMobile" aria-label="Toggle search">
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
          autofocus
        />
        <button type="button" class="close-search" @click="closeSearch" :aria-label="$t('header.close_search')">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg>
        </button>
        <button type="submit" :aria-label="$t('header.search_placeholder')">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"/>
          </svg>
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
      searchQuery.value = ''
    }
  }
}

onMounted(() => {
  window.addEventListener('resize', updateIsMobile)
})
onBeforeUnmount(() => {
  window.removeEventListener('resize', updateIsMobile)
})

const searchInput = ref(null)
const mobileSearchInput = ref(null)

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
  nextTick(() => {
    const btn = document.querySelector('.mobile-search-icon')
    btn?.focus()
  })
}

function performSearch() {
  if (!searchQuery.value.trim()) return
  alert(`Recherche lancée: ${searchQuery.value}`)
  searchQuery.value = ''
  searchExpanded.value = false
}
</script>

<style scoped>
.top-bar {
  background-color: #f2f2f2;
  border-bottom: 1px solid #ccc;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #333;
}

/* Barre supérieure */
.top-bar-upper {
  display: flex;
  justify-content: space-between;
  font-size: 0.875rem;
  padding: 0.2rem 1rem;
  background-color: #ddd;
}

.top-bar-left,
.top-bar-right {
  display: flex;
  gap: 1.2rem;
  align-items: center;
}

.hide-on-mobile {
  display: inline-block;
}

/* Barre inférieure */
.top-bar-lower {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0.5rem 1rem;
}

.logo-section {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.logo-subtext {
  font-size: 0.85rem;
  color: #666;
}

/* Recherche desktop */
.search-bar {
  display: flex;
  align-items: center;
  gap: 0.4rem;
  border: 1px solid #ccc;
  border-radius: 20px;
  padding: 0.2rem 0.8rem;
  transition: box-shadow 0.3s ease;
  background-color: white;
  min-width: 180px;
}

.search-bar input {
  border: none;
  outline: none;
  font-size: 0.9rem;
  width: 200px;
  padding: 0.3rem 0.4rem;
}

.search-bar button {
  background: none;
  border: none;
  cursor: pointer;
  padding: 0.3rem;
  color: #555;
}

.search-bar.active {
  box-shadow: 0 0 6px #0078d4;
}

.desktop-search {
  display: flex;
}

/* Icônes de droite */
.mobile-icons-group {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.top-bar-links {
  display: flex;
  gap: 1rem;
  align-items: center;
}

.link-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  color: #333;
  font-size: 0.75rem;
  text-decoration: none;
  cursor: pointer;
}

.link-item:hover,
.link-item:focus {
  color: #0078d4;
  outline: none;
}

.icon {
  width: 22px;
  height: 22px;
  fill: #555;
  margin-bottom: 2px;
}

.cart-link {
  position: relative;
}

.cart-badge {
  position: absolute;
  top: -6px;
  right: -10px;
  background: #ff3333;
  color: white;
  font-size: 0.7rem;
  padding: 2px 6px;
  border-radius: 12px;
  font-weight: bold;
  pointer-events: none;
}

/* Bouton recherche mobile */
.mobile-search-icon {
  background: none;
  border: none;
  cursor: pointer;
  color: #333;
  font-size: 1rem;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.mobile-search-wrapper svg {
  fill: currentColor;
}

.link-text {
  margin-top: 2px;
}

/* Barre de recherche mobile */
.mobile-search-container {
  background-color: #f9f9f9;
  padding: 0.4rem 1rem;
  border-top: 1px solid #ccc;
  animation: slideDown 0.3s ease forwards;
}

@keyframes slideDown {
  from { opacity: 0; transform: translateY(-10px); }
  to { opacity: 1; transform: translateY(0); }
}

.mobile-search-bar {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  border: 1px solid #aaa;
  border-radius: 20px;
  padding: 0.2rem 0.6rem;
  background-color: white;
}

.mobile-search-bar input {
  border: none;
  outline: none;
  flex-grow: 1;
  font-size: 1rem;
  padding: 0.4rem;
}

.mobile-search-bar button {
  background: none;
  border: none;
  cursor: pointer;
  padding: 0.3rem;
  color: #555;
}

.close-search svg {
  stroke: #333;
  stroke-width: 2;
}

/* Responsive */
@media (max-width: 768px) {
  .top-bar-upper {
    display: none;
  }

  .hide-on-mobile {
    display: none !important;
  }

  .desktop-search {
    display: none;
  }

  .mobile-icons-group {
    gap: 0.8rem;
  }
}
</style>
