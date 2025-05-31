<template>
  <footer class="social-footer">
    <div class="social-links">
      <v-btn 
        icon 
        variant="text" 
        aria-label="Facebook"
        class="social-icon"
        color="white"
      >
        <v-icon size="24">mdi-facebook</v-icon>
      </v-btn>
      <v-btn 
        icon 
        variant="text" 
        aria-label="Twitter"
        class="social-icon"
        color="white"
      >
        <v-icon size="24">mdi-twitter</v-icon>
      </v-btn>
      <v-btn 
        icon 
        variant="text" 
        aria-label="LinkedIn"
        class="social-icon"
        color="white"
      >
        <v-icon size="24">mdi-linkedin</v-icon>
      </v-btn>
      <v-btn 
        icon 
        variant="text" 
        aria-label="YouTube"
        class="social-icon"
        color="white"
      >
        <v-icon size="24">mdi-youtube</v-icon>
      </v-btn>
    </div>
    <div class="copyright">
        © {{ new Date().getFullYear() }} {{ $t('company.name') }}. {{ $t('company.copyright') }}
    </div>
  </footer>
</template>

<script setup>
import { useI18n } from 'vue-i18n'
const { t } = useI18n()
</script>

<style scoped>
.social-footer {
  padding: 20px 0 12px;
  background: rgba(13, 43, 107, 0.9);
  text-align: center;
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  width: 100%;
  position: fixed;
  bottom: 0;
  left: 0;
  z-index: 100;
}

.social-links {
  display: flex;
  justify-content: center;
  gap: 20px;
  margin-bottom: 12px;
}

.social-icon {
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  width: 36px;
  height: 36px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.1);
}

.social-icon:hover {
  transform: translateY(-2px) scale(1.1);
  background: rgba(255, 255, 255, 0.2);
}

.social-icon .v-icon {
  font-size: 20px;
  color: white;
  filter: drop-shadow(0 2px 3px rgba(0, 0, 0, 0.2));
}

.copyright {
  font-size: 0.75rem;
  color: rgba(255, 255, 255, 0.6);
  margin-top: 8px;
  letter-spacing: 0.3px;
}

@media (max-width: 599px) {
  .social-footer {
    padding: 15px 0 10px;
  }
  
  .social-links {
    gap: 16px;
  }

  .social-icon {
    width: 32px;
    height: 32px;
  }

  .social-icon .v-icon {
    font-size: 18px;
  }
}
</style>