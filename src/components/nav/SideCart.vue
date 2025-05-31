<template>
  <div>
    <!-- Overlay avec animation -->
    <transition name="fade">
      <div class="cart-overlay" v-if="open" @click="close"></div>
    </transition>
    
    <!-- Panier latéral avec animation -->
    <transition name="slide">
      <div class="side-cart" v-if="open">
        <div class="cart-header">
          <h3>{{ $t('cart.title') }}</h3>
          <button class="close-cart" @click="close" aria-label="Close cart">
            <i class="mdi mdi-close"></i>
          </button>
        </div>
        
        <div class="cart-content">
          <!-- Coupon de réduction -->
          <div class="coupon-section" v-if="items.length > 0">
            <input 
              type="text" 
              v-model="couponCode" 
              :placeholder="$t('cart.coupon_placeholder')"
              @keyup.enter="applyCoupon"
            >
            <button @click="applyCoupon" :disabled="!couponCode">
              {{ $t('cart.apply') }}
            </button>
            <div class="coupon-message" :class="{ 'error': couponError }">
              {{ couponMessage }}
            </div>
          </div>

          <!-- Liste des articles avec animation -->
          <transition-group name="list" tag="div" class="cart-items" v-if="items.length > 0">
            <div class="cart-item" v-for="item in items" :key="item.id">
              <img :src="item.image" :alt="item.name" class="item-image">
              <div class="item-details">
                <h4>{{ item.name }}</h4>
                <div class="item-price">
                  <span v-if="item.discountedPrice">
                    <del>{{ formatPrice(item.price) }}</del>
                    {{ formatPrice(item.discountedPrice) }}
                  </span>
                  <span v-else>
                    {{ formatPrice(item.price) }}
                  </span>
                </div>
                <div class="item-quantity">
                  <button @click.stop="decreaseQuantity(item)">-</button>
                  <span>{{ item.quantity }}</span>
                  <button @click.stop="increaseQuantity(item)">+</button>
                </div>
              </div>
              <button class="remove-item" @click.stop="removeItem(item)">
                <i class="mdi mdi-delete"></i>
              </button>
            </div>
          </transition-group>
          
          <!-- Panier vide -->
          <div class="empty-cart" v-else>
            <i class="mdi mdi-cart-off"></i>
            <p>{{ $t('cart.empty') }}</p>
            <button class="continue-shopping" @click="close">
              {{ $t('cart.continue_shopping') }}
            </button>
          </div>
        </div>
        
        <div class="cart-footer">
          <!-- Sous-total -->
          <div class="cart-subtotal">
            <span>{{ $t('cart.subtotal') }}</span>
            <span>{{ formatPrice(subtotal) }}</span>
          </div>
          
          <!-- Réduction -->
          <div class="cart-discount" v-if="discount > 0">
            <span>{{ $t('cart.discount') }}</span>
            <span>-{{ formatPrice(discount) }}</span>
          </div>
          
          <!-- Total -->
          <div class="cart-total">
            <span>{{ $t('cart.total') }}</span>
            <span>{{ formatPrice(total) }}</span>
          </div>
          
          <!-- Boutons d'action -->
          <div class="action-buttons">
            <button class="view-cart-button" @click="saveCart">
              {{ $t('cart.save_cart') }}
            </button>
            <button 
              class="checkout-button" 
              :disabled="items.length === 0"
              @click="proceedToCheckout"
            >
              {{ $t('cart.checkout') }}
            </button>
            <button 
              class="request-quote-button" 
              :disabled="items.length === 0"
              @click="requestQuote"
            >
              {{ $t('cart.request_quote') }}
            </button>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script setup>
import { computed, ref, onMounted } from 'vue'
import { useCartStore } from '@/stores/cart'
import { useLocalStorage } from '@vueuse/core'

const cartStore = useCartStore()
const emit = defineEmits(['close', 'proceed-to-checkout', 'request-quote'])

// État local
const couponCode = ref('')
const couponMessage = ref('')
const couponError = ref(false)

// Utilisation du store Pinia
const items = computed(() => cartStore.items)
const open = computed(() => cartStore.cartOpen)

// Sauvegarde locale avec vueuse
const savedCart = useLocalStorage('savedCart', {})

// Calculs
const subtotal = computed(() => cartStore.subtotal)
const discount = computed(() => cartStore.discount)
const total = computed(() => cartStore.total)

// Formatage du prix
function formatPrice(price) {
  return new Intl.NumberFormat('fr-FR', { 
    style: 'currency', 
    currency: 'EUR' 
  }).format(price)
}

// Appliquer un coupon
function applyCoupon() {
  if (!couponCode.value) return
  
  cartStore.applyCoupon(couponCode.value)
    .then(message => {
      couponMessage.value = message
      couponError.value = false
    })
    .catch(error => {
      couponMessage.value = error.message
      couponError.value = true
    })
}

// Sauvegarder le panier
function saveCart() {
  cartStore.saveCart()
  couponMessage.value = 'Panier sauvegardé avec succès'
  couponError.value = false
}

// Charger le panier sauvegardé
onMounted(() => {
  if (Object.keys(savedCart.value).length > 0) {
    cartStore.loadSavedCart(savedCart.value)
  }
})

// Méthodes du panier
function close() {
  cartStore.toggleCart(false)
}

function increaseQuantity(item) {
  cartStore.updateQuantity({ id: item.id, quantity: item.quantity + 1 })
}

function decreaseQuantity(item) {
  if (item.quantity > 1) {
    cartStore.updateQuantity({ id: item.id, quantity: item.quantity - 1 })
  } else {
    removeItem(item)
  }
}

function removeItem(item) {
  cartStore.removeItem(item.id)
}

function proceedToCheckout() {
  emit('proceed-to-checkout')
  close()
}

function requestQuote() {
  emit('request-quote')
  close()
}
</script>

<style scoped>/* Animation pour l'overlay */
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}

/* Animation pour le panier */
.slide-enter-active, .slide-leave-active {
  transition: transform 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
}
.slide-enter-from, .slide-leave-to {
  transform: translateX(100%);
}

/* Animation pour les éléments de la liste */
.list-enter-active {
  transition: all 0.4s ease-out;
}
.list-leave-active {
  transition: all 0.3s ease-in;
  position: absolute;
}
.list-enter-from {
  opacity: 0;
  transform: translateX(30px);
}
.list-leave-to {
  opacity: 0;
  transform: translateX(-30px);
}
.list-move {
  transition: transform 0.5s ease;
}

/* Overlay */
.cart-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 999;
  cursor: pointer;
  backdrop-filter: blur(2px);
}

/* Conteneur principal du panier */
.side-cart {
  position: fixed;
  top: 0;
  right: 0;
  width: 100%;
  max-width: 420px;
  height: 100vh;
  background-color: #fff;
  box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
  z-index: 1000;
  display: flex;
  flex-direction: column;
  font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
}

/* En-tête du panier */
.cart-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  border-bottom: 1px solid #eaeaea;
  background-color: #f8f9fa;
}

.cart-header h3 {
  margin: 0;
  font-size: 1.4rem;
  font-weight: 600;
  color: #2c3e50;
}

.close-cart {
  background: none;
  border: none;
  font-size: 1.5rem;
  cursor: pointer;
  color: #7f8c8d;
  transition: color 0.2s;
  padding: 5px;
}

.close-cart:hover {
  color: #e74c3c;
}

/* Contenu du panier */
.cart-content {
  flex: 1;
  overflow-y: auto;
  padding: 0 20px;
  scrollbar-width: thin;
  scrollbar-color: #ddd #f5f5f5;
}

.cart-content::-webkit-scrollbar {
  width: 6px;
}

.cart-content::-webkit-scrollbar-track {
  background: #f5f5f5;
}

.cart-content::-webkit-scrollbar-thumb {
  background-color: #ddd;
  border-radius: 10px;
}

/* Section coupon */
.coupon-section {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin: 20px 0;
  padding: 15px;
  background: #f8f9fa;
  border-radius: 8px;
  border: 1px dashed #dee2e6;
}

.coupon-section input {
  flex: 1;
  min-width: 150px;
  padding: 10px 15px;
  border: 1px solid #ced4da;
  border-radius: 6px;
  font-size: 0.9rem;
  transition: border-color 0.2s;
}

.coupon-section input:focus {
  outline: none;
  border-color: #80bdff;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.coupon-section button {
  padding: 10px 20px;
  background: #343a40;
  color: white;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-weight: 500;
  transition: background-color 0.2s;
}

.coupon-section button:hover:not(:disabled) {
  background: #23272b;
}

.coupon-section button:disabled {
  background: #adb5bd;
  cursor: not-allowed;
}

.coupon-message {
  width: 100%;
  font-size: 0.85rem;
  padding: 5px 0;
  color: #28a745;
  font-weight: 500;
}

.coupon-message.error {
  color: #dc3545;
}

/* Liste des articles */
.cart-items {
  display: flex;
  flex-direction: column;
  gap: 20px;
  margin: 20px 0;
}

.cart-item {
  display: flex;
  gap: 15px;
  padding-bottom: 20px;
  border-bottom: 1px solid #f0f0f0;
  position: relative;
}

.item-image {
  width: 90px;
  height: 90px;
  object-fit: contain;
  border: 1px solid #eee;
  border-radius: 4px;
  background: #fff;
  padding: 5px;
}

.item-details {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.item-details h4 {
  margin: 0 0 8px 0;
  font-size: 0.95rem;
  font-weight: 500;
  color: #333;
  line-height: 1.3;
}

.item-price {
  font-weight: 600;
  margin-bottom: 10px;
  color: #2c3e50;
}

.item-price del {
  color: #95a5a6;
  margin-right: 8px;
  font-weight: normal;
}

.item-quantity {
  display: flex;
  align-items: center;
  gap: 10px;
}

.item-quantity button {
  width: 28px;
  height: 28px;
  border: 1px solid #ddd;
  background: white;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 4px;
  font-size: 1rem;
  transition: all 0.2s;
}

.item-quantity button:hover {
  background: #f8f9fa;
  border-color: #adb5bd;
}

.item-quantity span {
  min-width: 20px;
  text-align: center;
  font-weight: 500;
}

.remove-item {
  position: absolute;
  top: 5px;
  right: 0;
  background: none;
  border: none;
  color: #95a5a6;
  cursor: pointer;
  font-size: 1.2rem;
  transition: color 0.2s;
  padding: 5px;
}

.remove-item:hover {
  color: #e74c3c;
}

/* Panier vide */
.empty-cart {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 60%;
  color: #95a5a6;
  text-align: center;
  padding: 0 20px;
}

.empty-cart i {
  font-size: 3.5rem;
  margin-bottom: 20px;
  opacity: 0.7;
}

.empty-cart p {
  font-size: 1.1rem;
  margin-bottom: 25px;
}

.continue-shopping {
  padding: 10px 25px;
  background: #3498db;
  color: white;
  border: none;
  border-radius: 6px;
  font-weight: 500;
  cursor: pointer;
  transition: background-color 0.2s;
}

.continue-shopping:hover {
  background: #2980b9;
}

/* Pied de page du panier */
.cart-footer {
  padding: 20px;
  border-top: 1px solid #eaeaea;
  background: #f8f9fa;
}

.cart-subtotal,
.cart-discount,
.cart-total {
  display: flex;
  justify-content: space-between;
  margin-bottom: 12px;
  font-size: 0.95rem;
}

.cart-subtotal {
  color: #7f8c8d;
}

.cart-discount {
  color: #27ae60;
  font-weight: 500;
}

.cart-total {
  font-size: 1.1rem;
  font-weight: 600;
  color: #2c3e50;
  margin: 20px 0;
  padding-top: 15px;
  border-top: 1px dashed #ddd;
}

/* Boutons d'action */
.action-buttons {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.view-cart-button,
.checkout-button,
.request-quote-button {
  width: 100%;
  padding: 14px;
  border: none;
  border-radius: 6px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.2s;
  font-size: 0.95rem;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
}

.view-cart-button {
  background-color: #ecf0f1;
  color: #34495e;
  border: 1px solid #bdc3c7;
}

.view-cart-button:hover {
  background-color: #dfe6e9;
}

.checkout-button {
  background-color: #27ae60;
  color: white;
}

.checkout-button:hover:not(:disabled) {
  background-color: #219653;
  transform: translateY(-1px);
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.request-quote-button {
  background-color: #3498db;
  color: white;
}

.request-quote-button:hover:not(:disabled) {
  background-color: #2980b9;
  transform: translateY(-1px);
}

.checkout-button:disabled,
.request-quote-button:disabled {
  background-color: #bdc3c7;
  cursor: not-allowed;
  transform: none;
  box-shadow: none;
}

/* Responsive */
@media (max-width: 480px) {
  .side-cart {
    width: 100%;
    max-width: none;
  }
  
  .cart-header {
    padding: 15px;
  }
  
  .cart-content {
    padding: 0 15px;
  }
  
  .cart-item {
    gap: 12px;
  }
  
  .item-image {
    width: 80px;
    height: 80px;
  }
  
  .action-buttons button {
    padding: 12px;
  }
}

/* Effets au survol pour les interactions */
button:not(:disabled) {
  transition: all 0.2s ease;
}

button:active:not(:disabled) {
  transform: translateY(1px);
}

/* Style pour les icônes */
.mdi {
  font-size: inherit;
  vertical-align: middle;
}
</style>