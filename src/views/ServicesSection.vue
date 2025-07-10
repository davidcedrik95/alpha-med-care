<template>
  <v-container fluid class="pa-0 bg-grey-lighten-4">
    <v-container class="py-12">
      <v-row align="start" justify="center" class="gap-4">
        <!-- Colonne image -->
        <v-col cols="12" md="5" class="d-flex flex-column">
          <div class="left-content">
            <v-img
              src="/images/logo.png"
              alt="Alpha Med Care Logo"
              height="70"
              contain
              class="mb-5"
            />
            <v-img
              src="/images/service-vor-ort.png"
              alt="Service Vor Ort"
              class="main-image mb-2"
              cover
              :height="imageMaxHeight + 'px'"
            />
          </div>
        </v-col>

        <!-- Colonne texte -->
        <v-col cols="12" md="7" class="d-flex justify-center">
          <v-card ref="cardRef" class="modern-card pa-5 bg-white">
            <h2 class="section-title mb-5">UNSER SERVICE ... FÜR SIE VOR ORT</h2>
            <div class="text-body text-grey-darken-2">
              <div class="feature-item mb-4" v-for="(service, i) in services" :key="i">
                <div class="feature-icon small">
                  <v-icon color="#1565C0" size="20">mdi-wrench</v-icon>
                </div>
                <div>{{ service }}</div>
              </div>

              <p class="mt-6 mb-4">
                alpha med care kümmert sich darum, dass Ihre Wartungsintervalle pünktlich eingehalten werden und Ihr Equipment stets nach Norm geprüft und gewartet ist, siehe auch die Rubrik Wartungsvertrag.
              </p>

              <div class="highlight-text mt-6">
                <p class="mb-2 font-weight-medium">Formulare herunterladen:</p>
                <ul class="pl-4">
                  <li class="mb-2">
                    <a href="/downloads/serviceanforderung.pdf" target="_blank" class="text-primary font-weight-bold">
                      SERVICEANFORDERUNG (PDF)
                    </a>
                  </li>
                  <li>
                    <a href="/downloads/installationsservice.pdf" target="_blank" class="text-primary font-weight-bold">
                      INSTALLATIONSSERVICE (PDF)
                    </a>
                  </li>
                </ul>
                <p class="mt-2 text-caption text-grey">Acrobat Reader erforderlich</p>
              </div>
            </div>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
export default {
  name: "ServiceVorOrt",
  data() {
    return {
      services: [
        "Instandsetzung / Reparatur",
        "Wartung / Messung / Kalibrieren / MTK-Abgleich",
        "Ersatzteile",
        "Installation / Umzug",
        "Gebrauchtgerätehandel",
      ],
      imageMaxHeight: null,
    };
  },
  mounted() {
    this.setImageHeight();
    window.addEventListener("resize", this.setImageHeight);
  },
  beforeUnmount() {
    window.removeEventListener("resize", this.setImageHeight);
  },
  methods: {
    setImageHeight() {
      const card = this.$refs.cardRef;
      if (card && card.$el) {
        const cardHeight = card.$el.offsetHeight;
        this.imageMaxHeight = cardHeight - 100;
      }
    },
  },
};
</script>

<style scoped>
/* Réutilisation des styles précédents */
.left-content {
  width: 100%;
}
.main-image {
  width: 100%;
  border-radius: 12px;
  box-shadow: 0 14px 40px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}
.main-image:hover {
  transform: scale(1.03);
}
.modern-card {
  border-radius: 12px !important;
  box-shadow: 0 14px 40px rgba(0, 0, 0, 0.1) !important;
  border-top: 5px solid #1976D2;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  position: relative;
}
.modern-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 18px 44px rgba(0, 0, 0, 0.15) !important;
}
.section-title {
  font-family: "Montserrat", sans-serif;
  font-weight: 700;
  font-size: 1.6rem;
  letter-spacing: 0.7px;
  color: #1565C0;
  padding-bottom: 14px;
  position: relative;
  margin-bottom: 1.8rem;
}
.section-title::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 70px;
  height: 4px;
  background: linear-gradient(90deg, #1976D2, #64B5F6);
  border-radius: 3px;
}
.text-body {
  font-size: 1.1rem;
  line-height: 1.65;
  color: #37474F;
}
.feature-item {
  display: flex;
  align-items: flex-start;
  font-size: 1rem;
}
.feature-icon.small {
  background: #E3F2FD;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 16px;
  flex-shrink: 0;
  color: #1565C0;
}
.highlight-text {
  background: linear-gradient(120deg, #E3F2FD, #BBDEFB);
  border-left: 5px solid #1976D2;
  padding: 20px;
  border-radius: 0 12px 12px 0;
  font-size: 0.9rem;
  box-shadow: 0 6px 14px rgba(0, 0, 0, 0.07);
  max-width: 480px;
  margin-left: 0;
  margin-right: auto;
  position: relative;
}
.highlight-text::before {
  content: '"';
  position: absolute;
  top: -14px;
  left: 16px;
  font-size: 48px;
  color: #1976D2;
  opacity: 0.15;
  font-family: serif;
}
@media (max-width: 600px) {
  .section-title {
    font-size: 1.4rem !important;
    text-align: center;
  }
  .text-body {
    font-size: 0.9rem;
  }
  .highlight-text {
    padding: 14px;
    font-size: 0.8rem;
  }
  .feature-icon.small {
    width: 28px;
    height: 28px;
  }
  .modern-card {
    padding: 24px !important;
  }
}
</style>
