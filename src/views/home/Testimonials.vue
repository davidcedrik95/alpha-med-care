<template>
  <!-- Testimonials Section -->
  <section class="testimonials-section">
    <div class="container">
      <div class="section-title">
        <h2>Was unsere Kunden sagen</h2>
      </div>
      <div class="testimonials-wrapper">
        <div class="testimonials-container">
          <div class="testimonials-track" ref="track" :style="trackStyle">
            <div class="testimonial" 
                 v-for="(testimonial, index) in testimonials" 
                 :key="index">
              <div class="testimonial-content">
                <div class="rating-stars">
                  <i v-for="star in 5" :key="star" 
                     class="mdi" 
                     :class="getStarClass(star, testimonial.rating)"
                     :style="{ color: star <= testimonial.rating || (star - 0.5 <= testimonial.rating) ? '#FFD700' : '#ddd' }"></i>
                </div>
                <p class="full-quote">"{{ testimonial.quote }}"</p>
                <div class="testimonial-author">
                  <span>{{ testimonial.city }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="testimonial-controls">
          <button class="carousel-button prev" @click="prevTestimonial" :disabled="currentTestimonialIndex === 0">
            <i class="mdi mdi-chevron-left"></i>
          </button>
          <button class="carousel-button next" @click="nextTestimonial" :disabled="currentTestimonialIndex >= maxTestimonials">
            <i class="mdi mdi-chevron-right"></i>
          </button>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'TestimonialsSection',
  data() {
    return {
      currentTestimonialIndex: 0,
      testimonialWidth: 350,
      testimonials: [
        {
          quote: "Ausgezeichneter Service - unsere Geräte dank Alpha-Med-Care immer einsatzbereit. Hocheffiziente Techniker.",
          city: "Heidelberg",
          rating: 5
        },
        {
          quote: "Schnell, kompetent und zuverlässig. Der perfekte Partner für unsere Praxis.",
          city: "München",
          rating: 4.5
        },
        {
          quote: "Präzise Kalibrierung unserer Ergometer. Einwandfreie Ergebnisse und Dokumentation.",
          city: "Berlin",
          rating: 5
        },
        {
          quote: "Vorbeugende Wartung auf höchstem Niveau. Probleme werden frühzeitig erkannt.",
          city: "Hamburg",
          rating: 4.5
        },
        {
          quote: "Praktische Schulungen für unser Team. Klare Unterlagen und kompetente Trainer.",
          city: "Stuttgart",
          rating: 5
        },
        {
          quote: "Notdienst reagierte innerhalb von 2 Stunden bei kritischem Defekt. Unbezahlbar!",
          city: "Köln",
          rating: 5
        }
      ]
    }
  },
  computed: {
    maxTestimonials() {
      return Math.max(0, this.testimonials.length - this.visibleTestimonials);
    },
    visibleTestimonials() {
      return window.innerWidth < 768 ? 1 : window.innerWidth < 1024 ? 2 : 3;
    },
    trackStyle() {
      return {
        transform: `translateX(-${this.currentTestimonialIndex * (100 / this.visibleTestimonials)}%)`,
        transition: 'transform 0.5s ease'
      };
    }
  },
  methods: {
    nextTestimonial() {
      if (this.currentTestimonialIndex < this.maxTestimonials) {
        this.currentTestimonialIndex++;
      }
    },
    prevTestimonial() {
      if (this.currentTestimonialIndex > 0) {
        this.currentTestimonialIndex--;
      }
    },
    getStarClass(star, rating) {
      if (star <= rating) return 'mdi-star';
      if (star - 0.5 <= rating) return 'mdi-star-half-full';
      return 'mdi-star-outline';
    },
    handleResize() {
      if (this.currentTestimonialIndex > this.maxTestimonials) {
        this.currentTestimonialIndex = Math.max(0, this.maxTestimonials);
      }
    }
  },
  mounted() {
    window.addEventListener('resize', this.handleResize);
  },
  beforeDestroy() {
    window.removeEventListener('resize', this.handleResize);
  }
}
</script>

<style scoped>
.testimonials-section {
  padding: 80px 0;
  background-color: #fff;
}

.testimonials-wrapper {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

.testimonials-container {
  overflow: hidden;
  padding: 0 15px;
  margin-bottom: 20px;
}

.testimonials-track {
  display: flex;
  transition: transform 0.5s ease;
}

.testimonial {
  flex: 0 0 calc(100% / 3);
  padding: 0 15px;
  box-sizing: border-box;
}

.testimonial-content {
  background: white;
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  height: 100%;
  min-height: 250px;
  display: flex;
  flex-direction: column;
}

.rating-stars {
  margin-bottom: 15px;
  font-size: 1.2rem;
  display: flex;
  justify-content: center;
  gap: 3px;
}

.full-quote {
  margin-bottom: 15px;
  text-align: center;
  color: #555;
  font-style: italic;
  line-height: 1.6;
  flex-grow: 1;
}

.testimonial-author {
  display: flex;
  flex-direction: column;
  text-align: center;
  margin-top: 15px;
  font-style: italic;
  color: #666;
  font-size: 0.9rem;
}

.testimonial-controls {
  display: flex;
  justify-content: center;
  gap: 40px;
  margin-top: 20px;
}

.carousel-button {
  position: relative;
  top: auto;
  transform: none;
  background: #0056b3;
  color: white;
  border: none;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.3s ease;
}

.carousel-button:hover:not(:disabled) {
  background: #003d7a;
  transform: scale(1.1);
}

.carousel-button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}


.section-title {
  margin-bottom: 50px;
  text-align: center;
  position: relative;
}

.section-title h2 {
  color: #333;
  font-size: 2rem;
  font-weight: 700;
  display: inline-block;
  padding: 0 80px;
  position: relative;
  background-color: #fff;
}

.section-title h2::before,
.section-title h2::after {
  content: '';
  position: absolute;
  top: 50%;
  width: 150px;
  height: 2px;
  background-color: #0056b3;
}

.section-title h2::before {
  left: -150px;
}

.section-title h2::after {
  right: -150px;
}

/* Responsive Styles */
@media (max-width: 1024px) {
  .testimonial {
    flex: 0 0 50%;
  }
}

@media (max-width: 768px) {
  .testimonial {
    flex: 0 0 100%;
  }
  
  .testimonial-controls {
    gap: 40px;
  }
  
  .carousel-button {
    width: 36px;
    height: 36px;
  }
}
</style>