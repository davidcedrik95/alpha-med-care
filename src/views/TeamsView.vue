<template>
  <v-container fluid class="team-section pa-0">
    <div class="decorative-shape shape-1"></div>
    <div class="decorative-shape shape-2"></div>

     <div class="section-title mt-4">
          <h2>UNSERE MITARBEITER</h2>
      </div>
    
    <v-container class="py-12">
      <v-row align="center" justify="center">
        <!-- Colonne info -->
        <v-col cols="12" md="6" class="info-col">
          <v-card class="info-card pa-6 rounded-lg">
            <div class="section-header">
              <div class="section-tag">UNSER TEAM</div>
           
              <div class="accent-divider"></div>
            </div>
            
            <div class="text-body text-grey-darken-3">
              <div class="d-flex align-start mb-6">
                <v-icon color="#1976D0" size="32" class="mr-4 mt-1">mdi-account-group</v-icon>
                <div>
                  <p class="mb-4 feature-text">
                    Denselben hohen Anspruch wie an unser Haus haben wir auch an unsere
                    Mitarbeiter. Deshalb nehmen wir alle regelmäßig an Schulungen und
                    Fortbildungen teil.
                  </p>
                </div>
              </div>
              
              <v-row class="mb-6">
                <v-col cols="12" md="6">
                  <div class="feature-card">
                    <v-icon color="#1976D0" size="26" class="mr-3">mdi-school</v-icon>
                    <div>
                      <h3 class="feature-title">Fortbildung & Expertise</h3>
                      <p>Regelmäßige Schulungen für höchste Fachkompetenz</p>
                    </div>
                  </div>
                </v-col>
                <v-col cols="12" md="6">
                  <div class="feature-card">
                    <v-icon color="#1976D0" size="26" class="mr-3">mdi-head-cog</v-icon>
                    <div>
                      <h3 class="feature-title">Effiziente Lösungen</h3>
                      <p>Schnelle Problemlösungen und optimierte Prozesse</p>
                    </div>
                  </div>
                </v-col>
              </v-row>
              
              <div class="feature-card mb-6">
                <v-icon color="#1976D0" size="26" class="mr-3">mdi-shield-check</v-icon>
                <div>
                  <h3 class="feature-title">Sicherheit & Compliance</h3>
                  <p>Beratung zu gesetzlichen Kontrollen und Sicherheitsstandards</p>
                </div>
              </div>
              
            </div>
          </v-card>
        </v-col>

        <!-- Colonne équipe -->
        <v-col cols="12" md="6" class="team-col">
          <v-row dense>
            <!-- Cedrik -->
            <v-col cols="12" sm="6">
              <v-hover v-slot="{ isHovering, props }">
                <v-card 
                  class="team-card rounded-lg" 
                  v-bind="props"
                  :elevation="isHovering ? 8 : 4"
                >
                  <div class="image-container">
                    <v-img
                      src="../images/teams/cedrik.png"
                      alt="Cedrik David Moukam"
                      height="340"
                      cover
                      class="rounded-t-lg"
                    >
                      <div class="team-overlay" :class="{ 'active': isHovering }">
                        <div class="overlay-content">
                          <div class="text-h6 font-weight-bold">Cedrik David Moukam</div>
                          <div class="text-caption mt-1">IT und Softwareentwickler</div>
                          <div class="d-flex mt-3 justify-center">
                            <v-btn icon size="small" class="social-icon mr-2" color="white">
                              <v-icon size="small">mdi-linkedin</v-icon>
                            </v-btn>
                            <v-btn icon size="small" class="social-icon" color="white">
                              <v-icon size="small">mdi-email</v-icon>
                            </v-btn>
                          </div>
                        </div>
                      </div>
                    </v-img>
                  </div>
                  <div class="text-center py-3 bg-white rounded-b-lg">
                    <div class="text-h6 font-weight-medium">Cedrik David Moukam</div>
                    <div class="text-caption text-grey-darken-1 mt-1">IT und Softwareentwickler</div>
                  </div>
                </v-card>
              </v-hover>
            </v-col>

            <!-- Benjamin -->
            <v-col cols="12" sm="6">
              <v-hover v-slot="{ isHovering, props }">
                <v-card 
                  class="team-card rounded-lg" 
                  v-bind="props"
                  :elevation="isHovering ? 8 : 4"
                >
                  <div class="image-container">
                    <v-img
                      src="../images/teams/benjamin.png"
                      alt="Benjamin Weiss"
                      height="340"
                      cover
                      class="rounded-t-lg"
                    >
                      <div class="team-overlay" :class="{ 'active': isHovering }">
                        <div class="overlay-content">
                          <div class="text-h6 font-weight-bold">Benjamin Weiss</div>
                          <div class="text-caption mt-1">Geschäftsführer</div>
                          <div class="d-flex mt-3 justify-center">
                            <v-btn icon size="small" class="social-icon mr-2" color="white">
                              <v-icon size="small">mdi-linkedin</v-icon>
                            </v-btn>
                            <v-btn icon size="small" class="social-icon" color="white">
                              <v-icon size="small">mdi-email</v-icon>
                            </v-btn>
                          </div>
                        </div>
                      </div>
                    </v-img>
                  </div>
                  <div class="text-center py-3 bg-white rounded-b-lg">
                    <div class="text-h6 font-weight-medium">Benjamin Weiss</div>
                    <div class="text-caption text-grey-darken-1 mt-1">Geschäftsführer</div>
                  </div>
                </v-card>
              </v-hover>
            </v-col>
      
            <!-- CTA Card - Karriere -->
            <v-col cols="12" >
            <!-- Career Card -->
<v-card class="career-card rounded-lg pa-4">
  <div class="d-flex align-center">
    <v-icon size="32" color="#1976D2" class="mr-3">mdi-briefcase</v-icon>
    <div>
      <div class="text-subtitle-1 font-weight-bold">Karriere bei uns</div>
      <div class="text-caption mt-1">Entdecken Sie spannende Karrieremöglichkeiten bei Alpha Med Care</div>
    </div>
  </div>
  <v-divider class="my-3"></v-divider>
  <div class="text-center">
    <v-btn 
      color="#1976D2" 
      class="mt-2" 
      rounded="lg" 
      variant="outlined"
      href="/karriere"
    >
      Jetzt bewerben
      <v-icon end>mdi-arrow-right</v-icon>
    </v-btn>
  </div>
</v-card>

          </v-col>
             
          </v-row>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
export default {
  name: "TeamSection",
};
</script>

<style scoped>
.team-section {
  background: linear-gradient(135deg, #f5f7fa 0%, #e4e7eb 100%);
  position: relative;
  overflow: hidden;
}

/* Decorative shapes */
.decorative-shape {
  position: absolute;
  border-radius: 50%;
  opacity: 0.05;
  z-index: 0;
}

.shape-1 {
  width: 350px;
  height: 350px;
  background: linear-gradient(135deg, #1976D2, #42A5F5);
  top: -120px;
  right: -120px;
}

.shape-2 {
  width: 250px;
  height: 250px;
  background: linear-gradient(135deg, #2196F3, #64B5F6);
  bottom: -100px;
  left: -100px;
  opacity: 0.07;
}

/* Info card styling */
.info-card {
  background: linear-gradient(145deg, #ffffff, #f8fafc) !important;
  box-shadow: 0 8px 25px rgba(25, 118, 210, 0.1) !important;
  border-top: 4px solid #1976D2 !important;
  transition: transform 0.3s ease;
  height: 100%;
}

.info-card:hover {
  transform: translateY(-4px);
}

.section-header {
  margin-bottom: 20px;
}

.section-tag {
  background: linear-gradient(90deg, #1976D2, #42A5F5);
  color: white;
  display: inline-block;
  padding: 6px 16px;
  border-radius: 16px;
  font-size: 0.8rem;
  font-weight: 700;
  letter-spacing: 0.03em;
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


.accent-divider {
  height: 4px;
  width: 70px;
  background: linear-gradient(90deg, #1976D2, #64B5F6);
  border-radius: 3px;
  margin: 8px 0 16px 0;
}

.text-body {
  font-size: 1rem;
  line-height: 1.65;
  color: #37474F;
}

/* Feature cards */
.feature-card {
  display: flex;
  align-items: flex-start;
  padding: 16px;
  border-radius: 14px;
  background: rgba(227, 242, 253, 0.3);
  transition: all 0.3s ease;
  border: 1px solid rgba(25, 118, 210, 0.1);
  height: 100%;
  margin-bottom: 12px;
}

.feature-card:hover {
  background: rgba(227, 242, 253, 0.5);
  transform: translateX(3px);
}

.feature-title {
  font-family: "Montserrat", sans-serif;
  font-weight: 600;
  font-size: 1.1rem;
  color: #1565C0;
  margin-bottom: 6px;
}

.feature-text {
  font-size: 1.05rem;
  line-height: 1.7;
}

/* Contact section */
.contact-section {
  border-top: 1px solid #e0e0e0;
  padding-top: 20px;
}

.contact-title {
  font-family: "Montserrat", sans-serif;
  font-weight: 600;
  color: #0d47a1;
  font-size: 1.3rem;
  margin-bottom: 16px;
}

.contact-item {
  border-radius: 14px !important;
  background: rgba(227, 242, 253, 0.4) !important;
  transition: all 0.3s ease;
  border-left: 3px solid #1976D2 !important;
  height: 100%;
}

.contact-item:hover {
  transform: translateY(-3px);
  background: rgba(227, 242, 253, 0.7) !important;
}

.contact-icon {
  background: white;
  width: 46px;
  height: 46px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 3px 8px rgba(25, 118, 210, 0.15);
}

/* Team cards */
.team-card {
  transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  overflow: hidden;
  position: relative;
  border: none !important;
  margin-bottom: 16px;
}

.team-card:hover {
  transform: translateY(-8px);
}

.image-container {
  overflow: hidden;
  border-radius: 14px 14px 0 0;
}

.team-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 0;
  background: linear-gradient(to top, rgba(13, 71, 161, 0.9) 0%, transparent 100%);
  padding: 0 16px;
  opacity: 0;
  transition: all 0.3s ease;
  color: white;
  display: flex;
  align-items: flex-end;
}

.team-overlay.active {
  height: 100%;
  opacity: 1;
  padding: 80px 16px 20px 16px;
}

.overlay-content {
  transform: translateY(15px);
  transition: transform 0.3s ease;
  opacity: 0;
}

.team-overlay.active .overlay-content {
  transform: translateY(0);
  opacity: 1;
}

.social-icon {
  background: rgba(255, 255, 255, 0.2) !important;
  transition: all 0.2s ease;
  width: 34px;
  height: 34px;
}

.social-icon:hover {
  background: rgba(255, 255, 255, 0.3) !important;
  transform: translateY(-3px);
}


.cta-button {
  font-weight: 600;
  letter-spacing: 0.02em;
  text-transform: none;
  height: 48px;
  padding: 0 24px;
  font-size: 1rem;
  box-shadow: 0 4px 12px rgba(25, 118, 210, 0.2) !important;
  transition: all 0.2s ease;
}

.cta-button:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 16px rgba(25, 118, 210, 0.3) !important;
}

/* Nouveaux éléments ajoutés */
.certification-card {
  background: white;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08) !important;
  border-left: 4px solid #4CAF50;
  transition: all 0.3s ease;
}

.certification-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1) !important;
}

.cert-logo {
  filter: grayscale(100%);
  opacity: 0.7;
  transition: all 0.3s ease;
}

.cert-logo:hover {
  filter: grayscale(0);
  opacity: 1;
  transform: scale(1.05);
}

.image-cta-card {
  overflow: hidden;
  box-shadow: 0 8px 24px rgba(13, 71, 161, 0.2) !important;
  transition: transform 0.3s ease;
}

.image-cta-card:hover {
  transform: translateY(-4px);
}

.image-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 100%);
  border-radius: 14px;
  z-index: 1;
}

.cta-content {
  text-shadow: 0 1px 3px rgba(0,0,0,0.5);
}

/* Responsive adjustments */
@media (max-width: 960px) {
  .team-col {
    order: 2;
  }
  .info-col {
    order: 1;
    margin-bottom: 32px;
  }
  
  .section-title {
    font-size: 1.6rem;
  }
  
  .feature-card {
    padding: 14px;
  }
}

@media (max-width: 600px) {
  .section-title {
    font-size: 1.4rem;
  }
  
  .team-overlay.active {
    padding: 60px 12px 16px 12px;
  }
  
  .contact-icon {
    width: 40px;
    height: 40px;
  }
  
  .cta-button {
    height: 44px;
    padding: 0 20px;
  }
}
</style>