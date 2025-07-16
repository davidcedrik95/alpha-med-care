<template>
  <footer class="mobile-footer">
    <div class="footer-sections">
      <div class="footer-section" v-for="section in sections" :key="section.key">
        <button class="section-header" @click="toggleSection(section.key)">
          <h3>{{ section.title }}</h3>
          <span class="toggle-icon">{{ isOpen(section.key) ? '−' : '+' }}</span>
        </button>
        <div class="section-content" v-if="isOpen(section.key)">
          <ul v-if="section.links && section.links.length">
            <li v-for="(link, index) in section.links" :key="index">
              <a :href="link.url" :aria-label="link.text">{{ link.text }}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="mobile-copyright">
      {{ $t('footer.copyright', { year: new Date().getFullYear(), company: companyName }) }}
    </div>
  </footer>
</template>

<script>
import { ref, computed } from 'vue'
import { useI18n } from 'vue-i18n'

export default {
  props: {
    companyName: {
      type: String,
      default: 'alpha med care GmbH'
    },
    initiallyOpen: {
      type: Array,
      default: () => ['information']
    }
  },
  setup(props) {
    const { t } = useI18n()
    const openSections = ref(props.initiallyOpen)

    const sections = computed(() => [
      {
        key: 'company',
        title: t('footer.sections.company.title'),
        links: [
          { text: t('footer.sections.company.about'), url: '/about' },
          { text: t('footer.sections.company.career'), url: '/careers' },
          { text: t('footer.sections.company.news'), url: '/news' },
          { text: t('company.details.locations[0]'), url: '/locations' },
          { text: t('footer.sections.company.partners'), url: '/partners' }
        ]
      },
      {
        key: 'environment',
        title: t('footer.sections.environment.title'),
        links: [
          { text: t('footer.sections.environment.protection'), url: '/umweltschutz' },
          { text: t('footer.sections.environment.recycling'), url: '/recycling' },
          { text: t('footer.sections.environment.sustainability'), url: '/nachhaltigkeit' },
          { text: t('footer.sections.environment.battery_disposal'), url: '/altbatterie-entsorgung' },
          { text: t('footer.sections.environment.co2_neutral'), url: '/co2-neutral' }
        ]
      }
    ])

    const toggleSection = (key) => {
      const index = openSections.value.indexOf(key)
      if (index > -1) {
        openSections.value.splice(index, 1)
      } else {
        openSections.value.push(key)
      }
    }

    const isOpen = (key) => openSections.value.includes(key)

    return {
      sections,
      toggleSection,
      isOpen
    }
  }
}
</script>

<style scoped>
.mobile-footer {
  background-color: #f5f5f5;
  padding: 0 16px 20px;
  font-family: 'Arial', sans-serif;
}

.footer-sections {
  margin-bottom: 24px;
}

.footer-section {
  border-bottom: 1px solid #e0e0e0;
}

.section-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  padding: 16px 0;
  background: none;
  border: none;
  text-align: left;
  cursor: pointer;
  transition: background-color 0.2s;
}

.section-header:hover {
  background-color: rgba(0, 0, 0, 0.03);
}

.section-header h3 {
  margin: 0;
  font-size: 16px;
  font-weight: 600;
  color: #333;
}

.toggle-icon {
  font-size: 20px;
  font-weight: bold;
  color: #666;
}

.section-content {
  padding: 0 0 16px;
  animation: fadeIn 0.3s ease;
}

.section-content ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.section-content li {
  padding: 8px 0;
}

.section-content a {
  color: #555;
  text-decoration: none;
  font-size: 14px;
  display: block;
  padding: 6px 0;
  transition: color 0.2s, transform 0.2s;
}

.section-content a:hover {
  color: #3a7bd5;
  transform: translateX(5px);
}

.mobile-copyright {
  text-align: center;
  padding: 16px 0 0;
  color: #666;
  font-size: 12px;
  border-top: 1px solid #e0e0e0;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-10px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>
