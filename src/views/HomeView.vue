<template>
  <div class="home-view">
    <HeroBanner />
    <ServicesSection />
    <BrandsSection />
    <ShopHome />
    <Testimonials />
    <FAQ />
    <DomainsSection />
    <StandardsSection />
    <ContactCTA />
  </div>
</template>

<script>
import HeroBanner from './home/HeroBanner.vue'
import ServicesSection from './home/ServicesSection.vue'
import BrandsSection from './home/BrandsSection.vue'
import DomainsSection from './home/DomainsSection.vue'
import StandardsSection from './home/StandardsSection.vue'
import Testimonials from './home/Testimonials.vue'
import FAQ from './home/FAQ.vue'
import ContactCTA from './home/ContactCTA.vue'
import ShopHome from './home/ShopHome.vue'

export default {
  name: 'HomeView',
  components: {
    HeroBanner,
    ServicesSection,
    BrandsSection,
    DomainsSection,
    StandardsSection,
    Testimonials,
    FAQ,
    ContactCTA,
    ShopHome
  }
}
</script>

<style>
/* Global styles that should be applied to all components */
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
  box-sizing: border-box;
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

@media (max-width: 768px) {
  .section-title h2::before,
  .section-title h2::after {
    width: 60px;
  }
  
  .section-title h2::before {
    left: -70px;
  }
  
  .section-title h2::after {
    right: -70px;
  }
}

@media (max-width: 480px) {
  .section-title h2 {
    font-size: 1.5rem;
    padding: 0 40px;
  }
  
  .section-title h2::before,
  .section-title h2::after {
    width: 30px;
  }
  
  .section-title h2::before {
    left: -40px;
  }
  
  .section-title h2::after {
    right: -40px;
  }
}
</style>