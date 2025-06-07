<template>
  <div class="home-view">
    <h4>Accueil</h4>
    <p>Team Besprechung</p>
    
    <!-- Contenu de démonstration pour tester le défilement -->
    <div v-for="n in 20" :key="n" class="demo-content">
      Paragraphe de démonstration {{ n }}
    </div>
  </div>
</template>

<style scoped>
.home-view {
  padding: 20px;
  max-width: 1200px;
  margin: 0 auto;
}

.demo-content {
  padding: 15px;
  margin: 10px 0;
  background: #f9f9f9;
  border-radius: 4px;
}
</style>