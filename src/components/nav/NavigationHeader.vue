<template>
  <header class="top-bar">
    <!-- Obere Zeile: Allgemeine Informationen -->
    <div class="top-bar-upper">
      <!-- Linker Teil -->
      <div class="top-bar-left">
        <span>
          <i class="fas fa-truck fa-sm" style="margin-right: 5px;"></i>
          {{ $t('header.free_shipping') }}
        </span>
        <span>
          <i class="fas fa-phone fa-sm" style="margin-right: 5px;"></i>
          {{ $t('header.phone') }}
        </span>
      </div>

      <!-- Rechter Teil -->
      <div class="top-bar-right">
        <span>
          <i class="fas fa-file-invoice fa-sm" style="margin-right: 5px;"></i>
          {{ $t('header.invoice') }}
        </span>
        <span>
          <i class="fas fa-headset fa-sm" style="margin-right: 5px;"></i>
          {{ $t('header.consultation') }}
        </span>
      </div>
    </div>
    
    <!-- Untere Zeile: Logo, Suche, Icons -->
    <div class="top-bar-lower">
      <div class="logo-section">
        <div class="logo-container" aria-label="Firmenlogo">
          <a href="/">
            <img src="/images/logo.png" :alt="$t('app.title')" width="160" height="40" loading="lazy" />
          </a>
        </div>
        <div class="logo-subtext">{{ $t('header.logo_subtext') }}</div>
      </div>

      <form class="search-bar" role="search">
        <input 
          type="search"
          :placeholder="$t('header.search_placeholder')"
          aria-label="Search field"
          autocomplete="off"
          spellcheck="false"
        />
        <button type="submit" :aria-label="$t('header.search_placeholder')">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <circle cx="11" cy="11" r="8" />
            <line x1="21" y1="21" x2="16.65" y2="16.65" />
          </svg>
        </button>
      </form>

      <nav class="top-bar-links" aria-label="Secondary navigation">
        <a href="#" class="link-item" :aria-label="$t('header.wishlist')">
          <svg class="icon" viewBox="0 0 24 24">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 
                     2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09
                     C13.09 3.81 14.76 3 16.5 3
                     19.58 3 22 5.42 22 8.5
                     c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
          </svg>
          <span>{{ $t('header.wishlist') }}</span>
        </a>

        <a href="#" class="link-item" :aria-label="$t('header.account')">
          <svg class="icon" viewBox="0 0 24 24">
            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4
                     -4 1.79-4 4 1.79 4 4 4zm0 2
                     c-2.67 0-8 1.34-8 4v2h16v-2
                     c0-2.66-5.33-4-8-4z"/>
          </svg>
          <span>{{ $t('header.account') }}</span>
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
          <span>{{ $t('header.cart') }}</span>
          <span class="cart-badge" aria-hidden="true">0</span>
        </a>
      </nav>
    </div>
  </header>
</template>

<script setup>
import { useI18n } from 'vue-i18n'

const { t } = useI18n()
</script>


<style scoped>
.top-bar {
  --primary-color: #005b96; /* Bleu médical plus profond */
  --secondary-color: #b3e0ff; /* Bleu clair pour les éléments secondaires */
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

.info-icon {
  width: 1rem;
  height: 1rem;
  margin-right: 0.3rem;
  vertical-align: middle;
}

.top-bar-upper {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  font-size: 14px;
}

.top-bar-left {
  display: flex;
  gap: 1.25rem;
  justify-content: flex-start;
  flex: 1;
}

.top-bar-right {
  display: flex;
  gap: 1.25rem;
  justify-content: flex-end;
  flex: 1;
}

.top-bar-lower {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 1rem;
}

.logo-section {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  flex-shrink: 0;
  margin-right: 1rem;
}

.logo-container {
  margin-bottom: 0.25rem;
}

.logo-container img {
  height: 2.5rem;
  width: auto;
  object-fit: contain;
}

.logo-subtext {
  font-size: 0.8rem;
  color: var(--logo-subtext-color);
  font-weight: 500;
  white-space: nowrap;
}

.search-bar {
  flex: 1 1 auto;
  min-width: 12rem;
  max-width: 32rem;
  margin: 0 1rem;
  position: relative;
  display: flex;
}

.search-bar input {
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

.search-bar input:focus {
  box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.3);
}

.search-bar button {
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
    flex-direction: column;
    gap: 0.5rem;
  }
  
  .top-bar-lower {
    flex-direction: column;
    align-items: stretch;
    gap: 1rem;
  }
  
  .logo-section {
    margin: 0 auto;
    align-items: center;
  }
  
  .search-bar {
    margin: 0;
    width: 100%;
  }
  
  .top-bar-links {
    justify-content: space-around;
    gap: 1rem;
    padding: 0.5rem 0;
  }
}

@media (max-width: 480px) {
  .top-bar-infos span,
  .top-bar-extra span {
    font-size: 0.75rem;
  }
  
  .info-icon {
    width: 0.8rem;
    height: 0.8rem;
  }

  .link-item span {
    display: none;
  }
  
  .link-item {
    flex-direction: row;
  }
  
  .logo-subtext {
    font-size: 0.7rem;
  }
}
</style>