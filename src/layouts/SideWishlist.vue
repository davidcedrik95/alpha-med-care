<template>
  <transition name="fade">
    <div 
      class="wishlist-overlay" 
      v-show="wishlistOpen" 
      @click="closeWishlist"
      @keydown.esc="closeWishlist"
    />
  </transition>
  
  <transition name="slide">
    <aside 
      class="wishlist-drawer"
      v-show="wishlistOpen"
      v-if="wishlistOpen"
      aria-modal="true"
      role="dialog"
      aria-labelledby="wishlist-title"
    >
      <div class="wishlist-header">
        <h3 id="wishlist-title">{{ $t('wishlist.title') }}</h3>
        <button 
          class="close-button" 
          @click="closeWishlist" 
          :aria-label="$t('menu.close')"
          ref="closeButton"
        >
          <i class="mdi mdi-close"></i>
        </button>
      </div>
      
      <div class="wishlist-content">
        <div v-if="items.length" class="wishlist-items">
          <div 
            v-for="item in items" 
            :key="item.id"
            class="wishlist-item"
          >
            <img 
              :src="item.image" 
              :alt="item.name" 
              width="70"
              height="70"
              loading="lazy"
              class="item-image"
            />
            
            <div class="item-details">
              <h4 class="item-name">{{ item.name }}</h4>
              <div class="item-price">{{ item.price }} €</div>
            </div>
            
            <div class="item-actions">
              <button 
                @click="moveToCart(item)" 
                class="action-button"
                :aria-label="$t('wishlist.add_to_cart')"
              >
                <i class="mdi mdi-cart-plus"></i>
              </button>
              <button 
                @click="removeItem(item.id)" 
                class="action-button remove"
                :aria-label="$t('wishlist.remove')"
              >
                <i class="mdi mdi-delete"></i>
              </button>
            </div>
          </div>
        </div>
        
        <div v-else class="empty-wishlist">
          <i class="mdi mdi-heart-broken"></i>
          <p>{{ $t('wishlist.empty') }}</p>
        </div>
      </div>
    </aside>
  </transition>
</template>

<script setup>
import { useWishlistStore } from '@/stores/wishlist'
import { useCartStore } from '@/stores/cart'
import { storeToRefs } from 'pinia'
import { ref, watch, nextTick } from 'vue'

const wishlistStore = useWishlistStore()
const cartStore = useCartStore()

const { items, wishlistOpen } = storeToRefs(wishlistStore)
const { closeWishlist, removeFromWishlist } = wishlistStore
const closeButton = ref(null)

// Focus management for accessibility
watch(wishlistOpen, async (open) => {
  if (open) {
    await nextTick()
    closeButton.value?.focus()
  }
})

function removeItem(productId) {
  removeFromWishlist(productId)
}

function moveToCart(product) {
  cartStore.addItem(product)
  removeFromWishlist(product.id)
  closeWishlist()
}
</script>

<style scoped>
/* Transitions */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.slide-enter-active,
.slide-leave-active {
  transition: transform 0.3s ease;
}

.slide-enter-from,
.slide-leave-to {
  transform: translateX(100%);
}

/* Overlay */
.wishlist-overlay {
  position: fixed;
  inset: 0;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 999;
  cursor: pointer;
}

/* Drawer */
.wishlist-drawer {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  width: min(95vw, 380px);
  background-color: white;
  box-shadow: -2px 0 8px rgba(0, 0, 0, 0.2);
  z-index: 1000;
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

.wishlist-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1.25rem;
  border-bottom: 1px solid #eee;
  flex-shrink: 0;
}

.close-button {
  background: none;
  border: none;
  font-size: 1.5rem;
  cursor: pointer;
  padding: 0.25rem;
}

.wishlist-content {
  flex-grow: 1;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
}

/* Wishlist items */
.wishlist-items {
  padding: 1.25rem;
}

.wishlist-item {
  display: grid;
  grid-template-columns: auto 1fr auto;
  gap: 0.75rem;
  padding: 0.75rem 0;
  align-items: center;
  border-bottom: 1px solid #f5f5f5;
}

.item-image {
  width: 70px;
  height: 70px;
  object-fit: contain;
}

.item-details {
  min-width: 0;
}

.item-name {
  margin: 0 0 0.25rem;
  font-size: 0.9rem;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.item-price {
  font-weight: bold;
  color: #e53935;
}

.item-actions {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.action-button {
  background: none;
  border: 1px solid #ddd;
  border-radius: 4px;
  width: 2.25rem;
  height: 2.25rem;
  display: grid;
  place-items: center;
  cursor: pointer;
  transition: 
    background-color 0.2s,
    color 0.2s;
}

.action-button.remove:hover {
  color: #ff3b30;
  border-color: #ffcdd2;
}

/* Empty state */
.empty-wishlist {
  text-align: center;
  padding: 2.5rem 1.25rem;
  color: #999;
  flex-grow: 1;
  display: grid;
  place-content: center;
  gap: 1.25rem;
}

.empty-wishlist .mdi {
  font-size: 3rem;
  color: #e0e0e0;
}

/* Responsive */
@media (max-width: 480px) {
  .wishlist-drawer {
    width: 100vw;
  }
  
  .wishlist-item {
    grid-template-columns: auto 1fr;
    grid-template-areas: 
      "image details"
      "actions actions";
  }
  
  .item-actions {
    grid-area: actions;
    flex-direction: row;
    justify-content: flex-end;
    padding-top: 0.5rem;
  }
}
</style>