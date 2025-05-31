// src/stores/cart.ts
import { defineStore } from 'pinia'
import { ref, computed } from 'vue'

export const useCartStore = defineStore('cart', () => {
  // État
  const items = ref<CartItem[]>([])
  const cartOpen = ref(false)
  const discount = ref(0)
  const discountCode = ref('')

  // Getters
  const subtotal = computed(() => 
    items.value.reduce((sum, item) => sum + (item.price * item.quantity), 0)
  )

  const total = computed(() => subtotal.value - discount.value)

  // Actions
  function toggleCart(open?: boolean) {
    cartOpen.value = open !== undefined ? open : !cartOpen.value
  }

  function addItem(item: CartItem) {
    const existing = items.value.find(i => i.id === item.id)
    if (existing) {
      existing.quantity += item.quantity
    } else {
      items.value.push({ ...item })
    }
  }

  function updateQuantity({ id, quantity }: { id: string; quantity: number }) {
    const item = items.value.find(i => i.id === id)
    if (item) item.quantity = quantity
  }

  function removeItem(id: string) {
    items.value = items.value.filter(item => item.id !== id)
  }

  function applyCoupon(code: string) {
    // Implémentez votre logique de coupon ici
    return new Promise((resolve, reject) => {
      if (code === 'REMISE10') {
        discount.value = subtotal.value * 0.1
        discountCode.value = code
        resolve('Coupon appliqué avec succès')
      } else {
        reject(new Error('Code coupon invalide'))
      }
    })
  }

  return {
    items,
    cartOpen,
    subtotal,
    discount,
    total,
    toggleCart,
    addItem,
    updateQuantity,
    removeItem,
    applyCoupon
  }
})

interface CartItem {
  id: string
  name: string
  price: number
  quantity: number
  image: string
  discountedPrice?: number
}