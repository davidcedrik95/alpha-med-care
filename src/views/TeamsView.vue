<template>
  <v-container fluid class="team-section pa-0">
    <v-container class="py-12">
      <v-row align="center" justify="center">
        <!-- Colonne info -->
        <v-col cols="12" md="6" class="info-col">
          <v-card class="info-card pa-6 elevation-0">
            <h2 class="text-h4 font-weight-bold text-blue-darken-4 mb-2">
              <span class="section-title">UNSERE MITARBEITER</span>
            </h2>
            <div class="accent-divider"></div>
            <div class="text-body-1 text-grey-darken-3">
              <p class="mb-4">
                Denselben hohen Anspruch wie an unser Haus haben wir auch an unsere
                Mitarbeiter. Deshalb nehmen wir alle regelmäßig an Schulungen und
                Fortbildungen teil.
              </p>
              <p class="mb-4">
                Wir werden Ihnen mit vollster fachlicher Kompetenz zur Seite stehen
                und so effizient wie möglich sein.
              </p>
              <p class="mb-4">
                Wir beraten Sie gerne zum Ablauf der gesetzlich vorgeschriebenen
                sicherheits- und messtechnischen Kontrollen.
              </p>

              <v-card class="contact-item mt-6 elevation-0">
                <div class="d-flex align-center">
                  <v-icon color="blue-darken-2" class="mr-3">mdi-phone</v-icon>
                  <div>
                    <div class="text-caption text-grey">Rufen Sie uns an:</div>
                    <strong>+49-966-618-895-0</strong>
                  </div>
                </div>
              </v-card>

              <v-card class="contact-item mt-4 elevation-0">
                <div class="d-flex align-center">
                  <v-icon color="blue-darken-2" class="mr-3">mdi-email</v-icon>
                  <div>
                    <div class="text-caption text-grey">Senden Sie uns eine Email:</div>
                    <strong>kontakt@alpha-med-care.de</strong>
                  </div>
                </div>
              </v-card>
            </div>
          </v-card>
        </v-col>

        <!-- Colonne équipe -->
        <v-col cols="12" md="6" class="team-col">
          <v-row dense>
            <!-- Cedrik -->
            <v-col cols="12" sm="6">
              <v-card class="team-card rounded-xl elevation-4">
                <v-img
                  src="./images/teams/cedrik.png"
                  alt="Cedrik David Moukam"
                  height="380"
                  cover
                  class="rounded-xl"
                >
                  <div class="team-overlay">
                    <div class="text-h6 font-weight-bold">Cedrik David Moukam</div>
                    <div class="text-caption mt-1">IT und Softwareentwickler</div>
                    <div class="d-flex mt-3">
                      <v-btn icon size="small" class="mr-2" color="white">
                        <v-icon size="small">mdi-linkedin</v-icon>
                      </v-btn>
                      <v-btn icon size="small" color="white">
                        <v-icon size="small">mdi-email</v-icon>
                      </v-btn>
                    </div>
                  </div>
                </v-img>
                <div class="text-center py-4 font-weight-medium bg-white">
                  <div class="text-h6">Cedrik David Moukam</div>
                  <div class="text-caption text-grey-darken-1 mt-1">IT und Softwareentwickler</div>
                </div>
              </v-card>
            </v-col>

            <!-- Benjamin -->
            <v-col cols="12" sm="6">
              <v-card class="team-card rounded-xl elevation-4">
                <v-img
                  src="./images/teams/benjamin.png"
                  alt="Benjamin Weiss"
                  height="380"
                  cover
                  class="rounded-xl"
                >
                  <div class="team-overlay">
                    <div class="text-h6 font-weight-bold">Benjamin Weiss</div>
                    <div class="text-caption mt-1">Geschäftsführer</div>
                    <div class="d-flex mt-3">
                      <v-btn icon size="small" class="mr-2" color="white">
                        <v-icon size="small">mdi-linkedin</v-icon>
                      </v-btn>
                      <v-btn icon size="small" color="white">
                        <v-icon size="small">mdi-email</v-icon>
                      </v-btn>
                    </div>
                  </div>
                </v-img>
                <div class="text-center py-4 font-weight-medium bg-white">
                  <div class="text-h6">Benjamin Weiss</div>
                  <div class="text-caption text-grey-darken-1 mt-1">Geschäftsführer</div>
                </div>
              </v-card>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>

<script setup>
// Aucune logique nécessaire ici pour l’instant
</script>

<style scoped>
.team-section {
  background: linear-gradient(135deg, #f5f7fa 0%, #e4e7eb 100%);
}

.team-card {
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  overflow: hidden;
  position: relative;
  border: none !important;
}
.team-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1) !important;
}
.team-card .v-img {
  transition: transform 0.5s ease;
}
.team-card:hover .v-img {
  transform: scale(1.05);
}
.team-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: linear-gradient(to top, rgba(13, 71, 161, 0.85) 0%, transparent 100%);
  padding: 80px 16px 16px 16px;
  opacity: 0;
  transition: opacity 0.4s ease;
  color: white;
}
.team-card:hover .team-overlay {
  opacity: 1;
}
.info-card {
  border-radius: 16px !important;
  overflow: hidden;
  position: relative;
  background: linear-gradient(145deg, #ffffff, #f0f4f8);
  box-shadow: 0 10px 30px rgba(13, 71, 161, 0.15) !important;
  border-top: 4px solid #0d47a1 !important;
}
.info-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 4px;
  background: linear-gradient(90deg, #0d47a1, #2196f3);
}
.section-title {
  position: relative;
  display: inline-block;
  padding-bottom: 8px;
}
.section-title::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 60px;
  height: 3px;
  background: #2196f3;
  border-radius: 2px;
}
.contact-item {
  transition: all 0.3s ease;
  border-radius: 8px;
  padding: 12px;
  background-color: #f0f7ff;
}
.contact-item:hover {
  background-color: #e3f2fd;
  transform: translateX(5px);
}
.accent-divider {
  height: 4px;
  background: linear-gradient(90deg, #0d47a1, #2196f3);
  border-radius: 2px;
  width: 100px;
  margin: 16px 0 24px 0;
}
@media (max-width: 960px) {
  .team-col {
    order: 2;
  }
  .info-col {
    order: 1;
    margin-bottom: 40px;
  }
}
</style>
