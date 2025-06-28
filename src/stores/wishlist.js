import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useWishlistStore = defineStore('wishlist', () => {
  const items = ref([])
  const wishlistOpen = ref(false)

  function toggleWishlist() {
    wishlistOpen.value = !wishlistOpen.value
  }

  function closeWishlist() {
    wishlistOpen.value = false
  }

  function addToWishlist(product) {
    const existingItem = items.value.find(item => item.id === product.id)
    if (!existingItem) {
      items.value.push({ ...product })
    }
  }

  function removeFromWishlist(productId) {
    items.value = items.value.filter(item => item.id !== productId)
  }

  return {
    items,
    wishlistOpen,
    toggleWishlist,
    closeWishlist,
    addToWishlist,
    removeFromWishlist
  }
})