<template>
  <!-- FAQ Section Mobile Optimisé -->
  <section class="faq-section">
    <div class="container">
      <div class="section-title">
        <h2>Häufige Fragen</h2>
      </div>
      <div class="faq-container">
        <div class="faq-item" 
             v-for="(faq, index) in faqs" 
             :key="index"
             :class="{ active: activeFaqIndex === index }"
             @click="toggleFaq(index)">
          <div class="faq-question">
            <h3>{{ faq.question }}</h3>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="faq-answer">
            <p>{{ faq.answer }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'FAQSection',
  data() {
    return {
      activeFaqIndex: null,
      faqs: [
        { 
          question: 'Wie oft müssen medizinische Geräte geprüft werden?', 
          answer: 'Die Prüffrequenz hängt vom Gerätetyp und den gesetzlichen Vorgaben ab. In der Regel sind jährliche Prüfungen erforderlich, bei hochriskanten Geräten können kürzere Intervalle notwendig sein. Wir beraten Sie gerne zu den für Ihre Geräte geltenden Vorschriften.' 
        },
        { 
          question: 'Welche Geräte können Sie kalibrieren?', 
          answer: 'Wir kalibrieren eine Vielzahl medizinischer Geräte, einschließlich Ergometer, Blutdruckmessgeräte, Thermometer und andere diagnostische Geräte gemäß den Herstellerangaben und medizinischen Standards. Unser Team ist für die Kalibrierung aller gängigen medizinischen Trainings- und Therapiegeräte zertifiziert.' 
        },
        { 
          question: 'Bieten Sie Notdienst für defekte Geräte an?', 
          answer: 'Ja, wir bieten einen 24/7 Notdienst für kritische medizinische Geräte an, um Ausfallzeiten zu minimieren und die Patientensicherheit zu gewährleisten. Unser Notdienst ist innerhalb von maximal 4 Stunden vor Ort, in dringenden Fällen auch schneller.' 
        },
        { 
          question: 'Können Sie uns bei der Schulung unseres Personals unterstützen?', 
          answer: 'Absolut. Wir bieten maßgeschneiderte Schulungen für medizinisches Personal im Umgang mit verschiedenen Geräten an, einschließlich Sicherheitsunterweisungen und Bedienungstrainings. Die Schulungen können bei Ihnen vor Ort oder in unseren Schulungsräumen stattfinden.' 
        }
      ]
    }
  },
  methods: {
    toggleFaq(index) {
      this.activeFaqIndex = this.activeFaqIndex === index ? null : index;
    }
  }
}
</script>

<style scoped>
/* FAQ SECTION */
.faq-section {
  padding: 80px 0;
  background-color: #f8f9fa;
}

.faq-container {
  max-width: 800px;
  margin: 0 auto;
}

.faq-item {
  margin-bottom: 15px;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  background-color: white;
  transition: all 0.3s ease;
}

.faq-item.active {
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.faq-question {
  padding: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  cursor: pointer;
  transition: all 0.3s ease;
}

.faq-question:hover {
  background-color: #f1f5ff;
}

.faq-question h3 {
  margin: 0;
  font-size: 1.1rem;
  color: #0056b3;
  font-weight: 600;
  flex: 1;
}

.faq-question i {
  color: #0056b3;
  transition: transform 0.3s ease;
  margin-left: 15px;
}

.faq-answer {
  padding: 0 20px;
  max-height: 0;
  overflow: hidden;
  transition: all 0.3s ease;
}

.faq-item.active .faq-answer {
  padding: 0 20px 20px 20px;
  max-height: 500px;
}

.faq-item.active .faq-question i {
  transform: rotate(180deg);
}

.faq-answer p {
  padding: 0 0 20px 0;
  margin: 0;
  color: #555;
  line-height: 1.6;
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
@media (max-width: 768px) {
  .faq-section {
    padding: 60px 0;
  }
  
  .faq-question h3 {
    font-size: 1rem;
  }
  
  .faq-question {
    padding: 15px;
  align-items: flex-start;
  gap: 10px;
  }
  
  .faq-answer p {
    font-size: 0.9rem;
  }
}

@media (max-width: 480px) {
  .faq-section {
    padding: 40px 0;
  }
  
  .faq-item {
    margin-bottom: 10px;
  }
}
</style>