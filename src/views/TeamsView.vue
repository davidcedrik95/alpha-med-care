<template>
  <v-container fluid class="pa-0 bg-grey-lighten-4">
    <v-container class="py-10">
      <v-row align="center" justify="center">
        <!-- Deux cartes avec images à gauche -->
        <v-col cols="12" md="6">
          <v-row dense>
            <!-- Cedrik Card -->
            <v-col cols="6">
              <v-card class="rounded-lg elevation-3 pa-2">
                <v-img
                  src="/images/teams/cedrik.png"
                  alt="Cedrik David Moukam"
                  height="340"
                  cover
                  style="object-position: top center;"
                  class="rounded"
                />
                <div class="text-center mt-3 font-weight-medium">
                  Cedrik David Moukam<br />
                  <span class="text-caption text-grey-darken-1">IT und Softwareentwickler</span>
                </div>
              </v-card>
            </v-col>

            <!-- Benjamin Card -->
            <v-col cols="6">
              <v-card class="rounded-lg elevation-3 pa-2">
                <v-img
                  src="/images/teams/benjamin.png"
                  alt="Benjamin Weiss"
                  height="340"
                  cover
                  style="object-position: top center;"
                  class="rounded"
                />
                <div class="text-center mt-3 font-weight-medium">
                  Benjamin Weiss<br />
                  <span class="text-caption text-grey-darken-1">Geschäftsführer</span>
                </div>
              </v-card>
            </v-col>
          </v-row>
        </v-col>

        <!-- Texte à droite -->
        <v-col cols="12" md="6">
          <v-card class="pa-6 elevation-6 bg-white">
            <h2 class="text-h5 font-weight-bold text-blue-darken-4 mb-4">
              UNSERE MITARBEITER
            </h2>
            <v-divider class="mb-4" color="blue"></v-divider>
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
              <p class="mb-4">
                📞 Rufen Sie uns an: <strong>+49-966-618-895-0</strong><br />
                📧 oder senden Sie uns eine Email: <strong>kontakt@alpha-med-care.de</strong>
              </p>
            </div>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>
