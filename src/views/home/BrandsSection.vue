<template>
  <section class="brands-section">
    <div class="container">
      <div class="section-title">
        <h2>Markenpartner</h2>
      </div>
      <div class="brands-grid">
        <a v-for="brand in featuredBrands" :key="brand.name" :href="brand.url" target="_blank" rel="noopener">
          <img :src="brand.logo" :alt="brand.name" class="brand-logo">
        </a>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'BrandsSection',
  data() {
    return {
      featuredBrands: [
        { name: 'ERGO-FIT', logo: '/images/partners/ergo-fit-logo.png', url: 'https://www.ergo-fit.de/de/' },
        { name: 'amer-sports', logo: '/images/partners/amer-sports-logo.png', url: 'https://www.amersports.com/' },
        { name: 'ergoline', logo: '/images/partners/ergoline-logo.png', url: 'https://www.ergoline.com/de/' },
        { name: 'FREI AG', logo: '/images/partners/frei-ag-logo.png', url: 'https://www.frei-ag.de/' },
        { name: 'hp-cosmos', logo: '/images/partners/hp-cosmos-logo.png', url: 'https://www.hpcosmos.com/' },
        { name: 'star-trac', logo: '/images/partners/star-trac-logo.png', url: 'https://www.motomed.com/' }
      ]
    }
  }
}
</script>

<style scoped>
.brands-section {
  padding: 80px 0;
  text-align: center;
  background-color: #f9f9f9;
}

.brands-grid {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  gap: 30px;
  align-items: center;
  max-width: 1000px;
  margin: 0 auto;
}

.brand-logo {
  max-width: 60%;
  height: auto;
  max-height: 80px;
  filter: grayscale(100%);
  opacity: 0.7;
  transition: all 0.3s ease;
}

.brand-logo:hover {
  filter: grayscale(0);
  opacity: 1;
}

@media (max-width: 768px) {
  .brands-grid {
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
  }
}

@media (max-width: 480px) {
  .brands-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}
</style>