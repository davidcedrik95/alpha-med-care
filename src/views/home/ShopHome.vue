<template>
  <section id="shop" class="shop-preview">
    <div class="container">
      <div class="shop-content">
        <div class="shop-text">
          <h2>Online-Shop</h2>
          <p>Qualitätsprodukte für medizinische Einrichtungen</p>
          <ul class="feature-list">
            <li>
              <span class="feature-icon"><i class="fas fa-check"></i></span>
              <span class="feature-text">Professionelle Beratung</span>
            </li>
            <li>
              <span class="feature-icon"><i class="fas fa-check"></i></span>
              <span class="feature-text">Schnelle Lieferung</span>
            </li>
            <li>
              <span class="feature-icon"><i class="fas fa-check"></i></span>
              <span class="feature-text">Kompetenter Service</span>
            </li>
          </ul>
        </div>
        
        <div class="shop-image-carousel">
          <div class="carousel-container">
            <div class="carousel-track" :style="carouselTrackStyle">
              <div class="carousel-slide" v-for="(image, index) in shopImages" :key="index">
                <img :src="image.src" :alt="image.alt" class="carousel-image">
              </div>
            </div>
            <button class="carousel-button prev" @click="prevShopImage">
              <i class="fas fa-chevron-left"></i>
            </button>
            <button class="carousel-button next" @click="nextShopImage">
              <i class="fas fa-chevron-right"></i>
            </button>
            <div class="carousel-indicators">
              <button 
                v-for="(image, index) in shopImages" 
                :key="index" 
                @click="goToShopImage(index)"
                :class="{ active: currentShopImageIndex === index }"
              ></button>
            </div>
          </div>
        </div>
        
        <a href="#" class="btn btn-primary btn-shop mobile-shop-btn">Zum Shop</a>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'ShopHome',
  data() {
    return {
      currentShopImageIndex: 0,
      carouselInterval: null,
      shopImages: [
        {
          src: '/images/shop/products1.png',
          alt: 'Produktauswahl 1'
        },
        {
          src: '/images/shop/products2.png',
          alt: 'Produktauswahl 2'
        },
        {
          src: '/images/shop/products3.png',
          alt: 'Produktauswahl 3'
        },
        {
          src: '/images/shop/products4.png',
          alt: 'Produktauswahl 4'
        },
        {
          src: '/images/shop/products5.png',
          alt: 'Produktauswahl 5'
        },
        {
          src: '/images/shop/products6.png',
          alt: 'Produktauswahl 6'
        }
      ]
    }
  },
  computed: {
    carouselTrackStyle() {
      return {
        transform: `translateX(-${this.currentShopImageIndex * 100}%)`
      }
    }
  },
  methods: {
    nextShopImage() {
      this.currentShopImageIndex = (this.currentShopImageIndex + 1) % this.shopImages.length;
      this.resetCarouselInterval();
    },
    prevShopImage() {
      this.currentShopImageIndex = (this.currentShopImageIndex - 1 + this.shopImages.length) % this.shopImages.length;
      this.resetCarouselInterval();
    },
    goToShopImage(index) {
      this.currentShopImageIndex = index;
      this.resetCarouselInterval();
    },
    startCarousel() {
      this.carouselInterval = setInterval(() => {
        this.nextShopImage();
      }, 5000);
    },
    resetCarouselInterval() {
      clearInterval(this.carouselInterval);
      this.startCarousel();
    }
  },
  mounted() {
    this.startCarousel();
  },
  beforeDestroy() {
    clearInterval(this.carouselInterval);
  }
}
</script>

<style scoped>
/* Styles de base nécessaires */
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
  box-sizing: border-box;
}

.btn {
  display: inline-flex;
  align-items: center;
  padding: 12px 25px;
  border-radius: 8px;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.3s ease;
}

.btn i {
  transition: transform 0.3s ease;
}

.btn-primary {
  background-color: #0056b3;
  color: white;
  box-shadow: 0 4px 15px rgba(0, 86, 179, 0.3);
}

.btn-primary:hover {
  background-color: #004494;
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(0, 86, 179, 0.4);
}

/* Styles spécifiques au composant */
.shop-preview {
  padding: 80px 0;
  background-color: #0056b3;
  color: white;
}

.shop-content {
  display: flex;
  align-items: center;
  gap: 50px;
}

.shop-text {
  flex: 1;
}

.shop-text h2 {
  margin-bottom: 20px;
  font-size: 2rem;
}

.shop-text p {
  margin-bottom: 25px;
  font-size: 1.1rem;
  line-height: 1.6;
}

.feature-list {
  list-style: none;
  padding: 0;
  margin: 0 0 30px 0;
}

.feature-list li {
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 1.1rem;
}

.feature-icon {
  color: #4CAF50;
  min-width: 20px;
  display: inline-flex;
  justify-content: center;
}

.feature-text {
  flex: 1;
}

.btn-shop {
  border: solid 1px #ffff;
}

.shop-image-carousel {
  flex: 1;
  position: relative;
  overflow: hidden;
  border-radius: 8px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
  max-width: 500px;
  margin: 0 auto;
}

.carousel-container {
  position: relative;
  width: 100%;
  height: 350px;
  overflow: hidden;
}

.carousel-track {
  display: flex;
  height: 100%;
  transition: transform 0.5s ease;
}

.carousel-slide {
  flex: 0 0 100%;
  height: 100%;
  box-sizing: border-box;
}

.carousel-image {
  width: 100%;
  height: 100%;
  object-fit: contain;
  object-position: center;
  border-radius: 4px;
}

.carousel-button {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(255, 255, 255, 0.7);
  color: #0056b3;
  border: none;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  z-index: 10;
  transition: all 0.3s ease;
}

.carousel-button:hover {
  background-color: rgba(255, 255, 255, 0.9);
}

.carousel-button.prev {
  left: 15px;
}

.carousel-button.next {
  right: 15px;
}

.carousel-indicators {
  position: absolute;
  bottom: 20px;
  left: 0;
  right: 0;
  display: flex;
  justify-content: center;
  gap: 10px;
  z-index: 10;
}

.carousel-indicators button {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  border: none;
  background-color: rgba(255, 255, 255, 0.5);
  cursor: pointer;
  transition: all 0.3s ease;
  padding: 0;
}

.carousel-indicators button.active {
  background-color: white;
  transform: scale(1.2);
}

.mobile-shop-btn {
  display: none;
}

/* Responsive Styles */
@media (max-width: 768px) {
  .shop-preview {
    padding: 60px 0;
  }
  
  .shop-content {
    flex-direction: column;
    gap: 30px;
  }
  
  .shop-text {
    order: 1;
    text-align: center;
  }
  
  .shop-image-carousel {
    order: 2;
    width: 100%;
    max-width: 100%;
  }
  
  .mobile-shop-btn {
    order: 3;
    display: block;
    margin: 0 auto;
    width: fit-content;
  }
  
  .carousel-container {
    height: 250px;
  }
}

@media (max-width: 480px) {
  .shop-text h2 {
    font-size: 1.8rem;
  }
  
  .shop-text p {
    font-size: 1rem;
  }
  
  .feature-list li {
    font-size: 1rem;
    justify-content: center;
  }
  
  .carousel-container {
    height: 200px;
  }
}
</style>