<template>
  <div>
    <!-- Titre principal -->
    <div class="page-title">
      <h1>Unser Fachkundiges Team</h1>
      <p>Erfahren Sie mehr über die Experten hinter unserem medizintechnischen Service</p>
    </div>

    <!-- Section Équipe -->
    <div class="container">
      <section class="team-section">
        <div class="section-title">
          <h2>Unser Team</h2>
        </div>
        <div class="team-grid">
          <div v-for="member in team" :key="member.name" class="team-card">
            <div class="team-image-container">
              <img :src="member.image" :alt="member.name" class="team-image" />
            </div>
            <div class="team-content">
              <h3>{{ member.name }}</h3>
              <span class="position">{{ member.position }}</span>
            </div>
          </div>
        </div>
      </section>
    </div>

   
  </div>
</template>

<script setup>
const team = [
  {
    name: 'Dr. Anna Müller',
    position: 'Leitende Ingenieurin',
    image: 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=600&q=80'
  },
  {
    name: 'Markus Vogel',
    position: 'Kalibrierungsspezialist',
    image: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80'
  },
  {
    name: 'Sarah Hoffmann',
    position: 'Service & Wartung',
    image: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80'
  },
  {
    name: 'Thomas Weber',
    position: 'Installationsleiter',
    image: 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=600&q=80'
  }
]
</script>

<style scoped>
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');

body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: linear-gradient(135deg, #1a2a6c, #b21f1f, #1a2a6c);
  color: #333;
}

.page-title {
  text-align: center;
  margin: 40px 0;
  color: #2c3e50;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.page-title h1 {
  font-size: 2.8rem;
}

.page-title p {
  font-size: 1.2rem;
  max-width: 700px;
  margin: auto;
  line-height: 1.6;
}

/* Container & Section */
.container {
  max-width: 1200px;
  margin: auto;
  padding: 30px;
  background: rgba(255, 255, 255, 0.95);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.section-title {
  text-align: center;
  margin-bottom: 40px;
}

.section-title h2 {
  font-size: 2.2rem;
  position: relative;
  display: inline-block;
  padding: 0 30px;
  color: #2c3e50;
}

.section-title h2::before,
.section-title h2::after {
  content: '';
  position: absolute;
  top: 50%;
  width: 80px;
  height: 3px;
  background: linear-gradient(to right, #3498db, #2c3e50);
}

.section-title h2::before {
  left: -90px;
}

.section-title h2::after {
  right: -90px;
}

/* Team Cards */
.team-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 20px;
}

.team-card {
  display: flex;
  flex-direction: column;
  border-radius: 10px;
  border: 1px solid #eaeaea;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
  transition: 0.3s;
  overflow: hidden;
  background: #fff;
  padding-bottom: 10px;
}

.team-image-container {
  width: 100%;
  aspect-ratio: 5/3; /* Uniformise toutes les images */
  overflow: hidden;
  background-color: #fff;
  
}

.team-image {
  width: 100%;
  height: 100%;
  object-fit: cover; /* Remplit le conteneur sans déformation */
  object-position: center;
  transition: transform 0.4s ease;
}

.team-card:hover .team-image {
  transform: scale(1.05);
}

.team-content {
  padding: 12px;
  text-align: center;
}

.team-content h3 {
  font-size: 1.5rem;
  margin-bottom: 6px;
}

.position {
  color: #3498db;
  font-weight: 600;
  display: block;
  padding-bottom: 6px;
  border-bottom: 1px solid #eee;
}

/* Footer */
footer {
  background: rgba(0, 0, 0, 0.8);
  color: #fff;
  padding: 40px 20px 20px;
  margin-top: 60px;
  border-radius: 15px 15px 0 0;
}

.footer-container {
  max-width: 1200px;
  margin: auto;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 30px;
}

.footer-column h3 {
  font-size: 1.4rem;
  margin-bottom: 20px;
  position: relative;
}

.footer-column h3::after {
  content: '';
  position: absolute;
  bottom: -5px;
  left: 0;
  width: 50px;
  height: 3px;
  background: #3498db;
}

.footer-column p {
  color: #ccc;
  line-height: 1.6;
}

.contact-info {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.contact-item {
  display: flex;
  align-items: flex-start;
  gap: 10px;
}

.contact-item i {
  color: #3498db;
}

.mini-member {
  margin-bottom: 15px;
  color: #eee;
  line-height: 1.4;
}

.mini-position {
  display: block;
  font-size: 0.9rem;
  color: #aaa;
}

.copyright {
  text-align: center;
  margin-top: 30px;
  padding-top: 20px;
  border-top: 1px solid #444;
  font-size: 0.9rem;
  color: #aaa;
}

/* Responsive */
@media (max-width: 768px) {
  .section-title h2 {
    font-size: 1.8rem;
  }

  .section-title h2::before,
  .section-title h2::after {
    width: 40px;
  }
}

@media (max-width: 576px) {
  .section-title h2::before,
  .section-title h2::after {
    display: none;
  }

  .page-title h1 {
    font-size: 2.2rem;
  }
}

</style>
