<template>
  <div class="about-view" style="display: flex; height: 100vh;">
    <!-- Navigation verticale à gauche -->
    <nav
      style="
        width: 220px;
        background-color: #f5f7fa;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        gap: 16px;
      "
    >
      <button
        :class="['nav-btn', { 'active-btn': activeSection === 'entreprise' }]"
        @click="activeSection = 'entreprise'"
      >
        <span class="btn-number">1</span>
        <span class="btn-text">Über uns</span>
      </button>

      <button
        :class="['nav-btn', { 'active-btn': activeSection === 'team' }]"
        @click="activeSection = 'team'"
      >
        <span class="btn-number">2</span>
        <span class="btn-text">Team</span>
      </button>
    </nav>

    <!-- Contenu principal à droite -->
    <main style="flex-grow: 1; overflow-y: auto; padding: 30px;">
      <!-- Hero Section commune -->
      <section
        class="hero-pattern w-full text-white flex flex-col justify-center items-center relative mb-8"
        style="height: 300px; border-radius: 8px;"
      >
        <h1 style="font-weight: 700; font-size: 2.5rem; text-shadow: 0 2px 6px rgba(0,0,0,0.5);">
          Alpha Med Care
        </h1>
      </section>

      <!-- Section dynamique -->
      <EntrepriseSection v-if="activeSection === 'entreprise'" />
      <TeamsView v-else />
    </main>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import EntrepriseSection from '@/views/EntrepriseSection.vue';
import TeamsView from '@/views/TeamsView.vue';

const activeSection = ref('entreprise'); // Affiche EntrepriseSection par défaut
</script>

<style scoped>
.hero-pattern {
  background: linear-gradient(
      rgba(127, 197, 235, 0.8),
      rgba(13, 74, 106, 0.8)
    ),
    url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?ixlib=rb-4.0.3&auto=format&fit=crop&w=1500&q=80');
  background-size: cover;
  background-position: center;
}

.nav-btn {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 16px;
  border: none;
  background: none;
  cursor: pointer;
  border-radius: 6px;
  transition: background-color 0.3s ease;
  font-size: 1rem;
  color: #334155; /* gris foncé */
}

.nav-btn:hover {
  background-color: #e0e7ff;
}

.nav-btn:focus {
  outline: none;
  background-color: #c7d2fe;
}

.btn-number {
  width: 36px;
  height: 36px;
  background-color: #0d4a6a;
  color: white;
  font-weight: 700;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 6px;
  font-size: 1.1rem;
  user-select: none;
}

.active-btn {
  background-color: #dbeafe;
  color: #0d4a6a;
  font-weight: 700;
  border-left: 4px solid #0d4a6a;
}
</style>
