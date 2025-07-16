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
              src="/images/pruefung-medizinprodukte.png"
              alt="Prüfung Medizinprodukte"
              class="main-image mb-2 pruefung-image"
              contain
              :height="imageMaxHeight + 'px'"
              style="max-width: 100%; object-fit: cover;"
            />
          </div>
        </v-col>

        <!-- Colonne texte -->
        <v-col cols="12" md="7" class="d-flex justify-center">
          <v-card ref="cardRef" class="modern-card pa-5 bg-white">
            <h2 class="section-title mb-5">DIE PRÜFUNG</h2>
            <div class="text-body text-grey-darken-2">
              <p class="mb-4">
                Die <strong>sicherheitstechnische Kontrolle (STK)</strong>, sowie die <strong>messtechnische Kontrolle (MTK)</strong>, liegen dem <strong>Medizinproduktegesetz (MPG)</strong> und der <strong>Medizinprodukte-Betreiberverordnung (MPBetreibV)</strong> zu Grunde.
              </p>
              <p class="mb-4">
                Wir als <strong>Service-Techniker</strong> und <strong>Medizinprodukteberater</strong> sind ebenfalls jährlichen Fortbildungen verpflichtet. So nehmen wir an zahlreichen Herstellerschulungen teil, und schließen diese mit Erfolg ab, wie unsere zahlreichen Zertifikate belegen.
              </p>
              <p class="mb-4">
                So ist sichergestellt, dass wir den technischen Herausforderungen stetig gewachsen sind.
              </p>
              <p class="mt-6 font-weight-bold text-primary">
                ... wir kümmern uns, als Ihr Partner für Medizinprodukte, um fachgerechte Prüfung Ihrer Geräte.
              </p>
            </div>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
export default {
  name: "PruefungMedizinprodukte",
  data() {
    return {
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
.pruefung-image {
  max-width: 100%;
  border-radius: 12px;
  box-shadow: 0 14px 40px rgba(0, 0, 0, 0.1);
}

@media (max-width: 600px) {
  .section-title {
    font-size: 1.4rem !important;
    text-align: center;
  }
  .text-body {
    font-size: 0.95rem;
  }
  .modern-card {
    padding: 24px !important;
  }
}
</style>
