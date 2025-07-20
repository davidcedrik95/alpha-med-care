<template>
  <v-container fluid class="pa-0 bg-grey-lighten-4">
    <!-- Background decorative elements -->
    <div class="decorative-shape shape-1"></div>
    <div class="decorative-shape shape-2"></div>

 
    
      <div class="section-title mt-4">
          <h2>DAS UNTERNEHMEN</h2>
      </div>
      <p class="intro-text mb-8" style="position: relative; z-index: 1; padding: 0 16px; max-width: 900px; margin: 0 auto;">
        Bei Alpha Med Care vereinen wir technologische Innovation mit medizinischer Expertise, 
        um Ihnen ganzheitliche Lösungen für Ihre Geräte zu bieten. Unser junges, dynamisches 
        Team steht für modernste Technik und persönlichen Service.
      </p>

    <v-container class="py-12">
      <v-row align="start" justify="center" class="gap-6">
        <!-- Left column - text content -->
        <v-col cols="12" md="7" class="d-flex flex-column">
          <v-card class="modern-card pa-8 bg-white" elevation="10">
            <div class="section-header">
              <div class="section-tag">UNSERE EXPERTISE</div>
             
              <div class="divider"></div>
            </div>
            
            <div class="text-body text-grey-darken-2">
              <!-- REMARQUE : le paragraphe intro-text initial est retiré d'ici -->

              <div class="features-grid">
                <div class="feature-card" v-for="(feature, index) in features" :key="index">
                  <div class="feature-icon">
                    <v-icon size="28" :color="feature.color">{{ feature.icon }}</v-icon>
                  </div>
                  <div>
                    <h3 class="feature-title">{{ feature.title }}</h3>
                    <p class="feature-description">{{ feature.description }}</p>
                  </div>
                </div>
              </div>
              
              <div class="highlight-card mt-8">
                <div class="quote-icon">
                  <v-icon size="36" color="#1976D2">mdi-format-quote-open</v-icon>
                </div>
                <p class="highlight-text">
                  "Mit über vier Jahren Erfahrung erzielen wir den optimalen Nutzen für Ihr Unternehmen. 
                  Vertrauen Sie sich uns an – wir kümmern uns um Ihre medizinischen Geräte, damit Sie sich 
                  um Ihre Patienten kümmern können."
                </p>
                <div class="signature">
                  <div class="signature-line"></div>
                  <div class="signature-text">Ihr Team von Alpha Med Care</div>
                </div>
              </div>
            </div>
          </v-card>
        </v-col>

        <!-- Right column - image and stats -->
        <v-col cols="12" md="5" class="d-flex flex-column">
          <div class="right-content">
            <div class="logo-container mb-8">
              <v-img
                src="/images/logo.png"
                alt="Logo Alpha Med Care"
                max-height="70"
                contain
                class="logo"
              />
              <div class="logo-subtitle">Medizintechnik & Service</div>
            </div>
            
            <div class="image-container mb-6">
              <v-img
                src="/images/company.png"
                alt="Alpha Med Care"
                height="340"
                cover
                class="main-image"
              />
              <div class="image-overlay">
                <div class="overlay-text">Ihr Partner für medizinische Technik</div>
              </div>
            </div>
            
            <div class="stats-container">
              <div class="stats-title">WARUM UNS KUNDEN VERTRAUEN</div>
              <v-row class="mt-2" justify="center" no-gutters>
                <v-col
                  cols="12"
                  sm="4"
                  class="stat-item"
                  v-for="(stat, index) in stats"
                  :key="index"
                >
                  <div class="stat-card" :style="{ borderColor: stat.color }">
                    <div class="stat-value">{{ stat.value }}</div>
                    <div class="stat-label">{{ stat.label }}</div>
                  </div>
                </v-col>
              </v-row>
            </div>
            
            <div class="cta-container mt-4">
              <!-- Nouveau contenu ajouté ici -->
              <div class="additional-info mt-6">
                <!-- Brochure Card -->
                <v-card class="info-card rounded-lg pa-4 mb-2">
                  <v-row align="center">
                    <v-col cols="3" class="text-center">
                      <v-icon size="48" color="#1976D0">mdi-file-document</v-icon>
                    </v-col>
                    <v-col cols="9">
                      <div class="text-h6 font-weight-bold">Unser Service-Portfolio</div>
                      <div class="text-body-2 mt-1">Laden Sie unsere Broschüre mit allen Dienstleistungen herunter</div>
                      <v-btn 
                        color="#1976D0" 
                        class="mt-2"
                        size="small"
                        rounded="lg"
                        outlined
                      >
                        PDF herunterladen
                        <v-icon right size="small">mdi-download</v-icon>
                      </v-btn>
                    </v-col>
                  </v-row>
                </v-card>
                
                <!-- Certification Card -->
                <v-card class="certification-card rounded-lg pa-4">
                  <div class="d-flex align-center">
                    <v-icon size="32" color="green" class="mr-3">mdi-shield-check</v-icon>
                    <div>
                      <div class="text-subtitle-1 font-weight-bold">Zertifizierte Expertise</div>
                      <div class="text-caption mt-1">ISO 13485 zertifiziert • TÜV geprüft • Medizinprodukteberater</div>
                    </div>
                  </div>
                  <v-divider class="my-3"></v-divider>
                  <div class="d-flex justify-space-around">
                    <v-img src="/images/certifications/dguv-certified.png" max-width="60" contain class="cert-logo"></v-img>
                    <v-img src="/images/certifications/iso-13485.png" max-width="60" contain class="cert-logo"></v-img>
                    <v-img src="/images/certifications/trusted-shops.png" max-width="60" contain class="cert-logo"></v-img>
                    <v-img src="/images/certifications/tuv-certified.png" max-width="60" contain class="cert-logo"></v-img>
                  </div>
                </v-card>
              </div>
            </div>
          </div>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
export default {
  name: "CompanySection",
  data() {
    return {
      stats: [
        { value: "4+", label: "Jahre Erfahrung", color: "#1976D2" },
        { value: "360°", label: "Komplettservice", color: "#2196F3" },
        { value: "100%", label: "Kundenzufriedenheit", color: "#42A5F5" },
      ],
      features: [
        { 
          icon: "mdi-account-group", 
          title: "Persönliche Beratung", 
          description: "Unsere Experten entwickeln maßgeschneiderte Konzepte für Ihre medizinischen Geräte – für eine zukunftssichere Nutzung.",
          color: "#1976D2"
        },
        { 
          icon: "mdi-medical-bag", 
          title: "Medizinische Expertise", 
          description: "Von der Anschaffung bis zur Wartung: Wir begleiten Sie bei allen Aspekten Ihrer medizintechnischen Ausstattung.",
          color: "#2196F3"
        },
        { 
          icon: "mdi-tools", 
          title: "Technischer Service", 
          description: "Wartung, STK, MTK und Reparaturen – wir bieten Flexibilität und Expertise vor Ort für Ihre Geräte.",
          color: "#42A5F5"
        },
        { 
          icon: "mdi-chart-line", 
          title: "Nachhaltige Lösungen", 
          description: "Wir optimieren den Lebenszyklus Ihrer Geräte für maximale Wirtschaftlichkeit und Zuverlässigkeit.",
          color: "#64B5F6"
        }
      ]
    };
  },
};
</script>

<style scoped>
/* Global styling */
.bg-grey-lighten-4 {
  background-color: #f8fafc !important;
  position: relative;
  overflow: hidden;
}

/* Decorative background shapes */
.decorative-shape {
  position: absolute;
  border-radius: 50%;
  opacity: 0.05;
  z-index: 0;
}

.shape-1 {
  width: 400px;
  height: 400px;
  background: linear-gradient(135deg, #1976D2, #42A5F5);
  top: -150px;
  right: -150px;
}

.shape-2 {
  width: 300px;
  height: 300px;
  background: linear-gradient(135deg, #2196F3, #64B5F6);
  bottom: -100px;
  left: -100px;
  opacity: 0.07;
}

/* Modern card styling */
.modern-card {
  border-radius: 20px !important;
  overflow: hidden;
  position: relative;
  z-index: 1;
  background: linear-gradient(145deg, #ffffff, #dae7f3) !important;
  box-shadow: 
    0 10px 30px rgba(25, 118, 210, 0.1),
    0 6px 10px rgba(25, 118, 210, 0.05) !important;
  border-left: 5px solid #1976D2;
  transition: transform 0.4s ease, box-shadow 0.4s ease;
}

.modern-card:hover {
  transform: translateY(-8px);
  box-shadow: 
    0 15px 40px rgba(25, 118, 210, 0.15),
    0 10px 20px rgba(25, 118, 210, 0.08) !important;
}

/* Section header */
.section-header {
  margin-bottom: 30px;
}

.section-tag {
  background: linear-gradient(90deg, #1976D2, #42A5F5);
  color: white;
  display: inline-block;
  padding: 6px 16px;
  border-radius: 20px;
  font-size: 0.8rem;
  font-weight: 700;
  letter-spacing: 0.05em;
  margin-bottom: 12px;
}

.section-title {
  margin-bottom: 50px;
  text-align: center;
  position: relative;
}

.section-title h2 {
  color: #0d47a1;
  font-size: 2rem;
  font-weight: 700;
  display: inline-block;
  padding: 0 80px;
  position: relative;
  background-color: #fff;
}

.divider {
  height: 4px;
  width: 70px;
  background: linear-gradient(90deg, #1976D2, #64B5F6);
  border-radius: 3px;
  margin-top: 10px;
}

/* Text styling */
.text-body {
  font-size: 1.05rem;
  line-height: 1.7;
  color: #37474F;
}

.intro-text {
  font-size: 1.15rem;
  font-weight: 500;
  color: #263238;
  position: relative;
  padding-left: 24px;
}

.intro-text::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 4px;
  background: linear-gradient(to bottom, #1976D2, #64B5F6);
  border-radius: 4px;
}

/* Features grid */
.features-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 20px;
}

.feature-card {
  background: rgba(227, 242, 253, 0.3);
  border-radius: 16px;
  padding: 20px;
  display: flex;
  align-items: flex-start;
  transition: all 0.3s ease;
  border: 1px solid rgba(25, 118, 210, 0.1);
}

.feature-card:hover {
  background: rgba(227, 242, 253, 0.5);
  transform: translateX(5px);
  box-shadow: 0 5px 15px rgba(25, 118, 210, 0.08);
}

.feature-icon {
  background: white;
  width: 50px;
  height: 50px;
  border-radius: 14px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 16px;
  flex-shrink: 0;
  box-shadow: 0 4px 12px rgba(25, 118, 210, 0.15);
}

.feature-title {
  font-family: "Montserrat", sans-serif;
  font-weight: 700;
  font-size: 1.15rem;
  color: #1565C0;
  margin-bottom: 8px;
}

.feature-description {
  font-size: 0.95rem;
  color: #546E7A;
  line-height: 1.6;
}

/* Highlight card */
.highlight-card {
  background: linear-gradient(120deg, #e3f2fd, #bbdefb);
  border-radius: 16px;
  padding: 30px;
  position: relative;
  overflow: hidden;
  box-shadow: 0 8px 20px rgba(25, 118, 210, 0.1);
}

.highlight-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 8px;
  height: 100%;
  background: linear-gradient(to bottom, #1976D2, #42A5F5);
}

.quote-icon {
  position: absolute;
  top: 20px;
  right: 20px;
  opacity: 0.15;
}

.highlight-text {
  font-style: italic;
  font-weight: 500;
  font-size: 1.1rem;
  color: #0d47a1;
  position: relative;
  z-index: 1;
  line-height: 1.7;
}

.signature {
  margin-top: 20px;
  text-align: right;
}

.signature-line {
  height: 1px;
  background: rgba(25, 118, 210, 0.3);
  margin: 8px 0;
  width: 150px;
  display: inline-block;
}

.signature-text {
  font-weight: 600;
  color: #1976D2;
  font-size: 0.9rem;
}

/* Right column styling */
.right-content {
  position: relative;
  z-index: 1;
}

.logo-container {
  text-align: center;
}

.logo {
  transition: transform 0.3s ease;
}

.logo:hover {
  transform: scale(1.05);
}

.logo-subtitle {
  font-family: "Montserrat", sans-serif;
  font-weight: 600;
  color: #1976D2;
  letter-spacing: 0.05em;
  margin-top: 8px;
  font-size: 1.1rem;
}

.image-container {
  position: relative;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
  transition: transform 0.4s ease;
}

.image-container:hover {
  transform: scale(1.02);
}

.main-image {
  width: 100%;
  display: block;
}

.image-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  background: linear-gradient(to top, rgba(13, 71, 161, 0.7), transparent);
  padding: 20px;
  text-align: center;
}

.overlay-text {
  color: white;
  font-weight: 700;
  font-size: 1.2rem;
  letter-spacing: 0.03em;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* Stats section */
.stats-container {
  background: white;
  border-radius: 16px;
  padding: 24px;
  box-shadow: 0 10px 30px rgba(25, 118, 210, 0.1);
}

.stats-title {
  text-align: center;
  font-weight: 700;
  color: #1565C0;
  letter-spacing: 0.03em;
  text-transform: uppercase;
  font-size: 0.9rem;
  margin-bottom: 10px;
}

.stat-item {
  padding: 8px;
}

.stat-card {
  background: white;
  border-radius: 14px;
  padding: 25px 15px;
  text-align: center;
  box-shadow: 0 5px 20px rgba(25, 118, 210, 0.1);
  transition: all 0.3s ease;
  border-bottom: 4px solid;
}

.stat-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 10px 25px rgba(25, 118, 210, 0.2);
}

.stat-value {
  font-family: "Montserrat", sans-serif;
  font-weight: 800;
  font-size: 1.5rem;
  color: #1565C0;
  margin-bottom: 5px;
  line-height: 1;
}

.stat-label {
  font-weight: 600;
  color: #37474F;
  font-size: 0.70rem;
}



.cta-subtext {
  margin-top: 12px;
  font-size: 0.9rem;
  color: #546E7A;
  font-weight: 500;
}

/* Responsive adjustments */
@media (max-width: 960px) {
  .section-title {
    font-size: 1.8rem;
  }
  
  .feature-card {
    padding: 16px;
  }
  
  .stat-card {
    padding: 20px 10px;
  }
  
  .stat-value {
    font-size: 2rem;
  }
}

@media (max-width: 600px) {
  .section-title {
    font-size: 1.6rem;
    text-align: center;
  }
  
  .divider {
    margin-left: auto;
    margin-right: auto;
  }
  
  .intro-text {
    padding-left: 16px;
    font-size: 1.05rem;
  }
  
  .feature-icon {
    width: 42px;
    height: 42px;
  }
  
  .feature-title {
    font-size: 1.05rem;
  }
  
  .stat-card {
    padding: 18px 8px;
  }
  
  .stat-value {
    font-size: 1.8rem;
  }
  
  .highlight-card {
    padding: 20px;
  }
  
  .cta-button {
    width: 100%;
  }
}
</style>