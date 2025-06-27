<template>
  <v-menu offset-y>
    <template v-slot:activator="{ props }">
      <v-btn variant="text" v-bind="props" class="text-none language-btn">
        <img
          :src="`/images/flags/${currentLocale}.png`"
          :alt="$t(`language.${currentLocale}`)"
          width="24"
          height="16"
          loading="lazy"
          class="flag-icon mr-2"
        />
        {{ currentLocale.toUpperCase() }}
        <v-icon right>mdi-chevron-down</v-icon>
      </v-btn>
    </template>
    <v-list class="language-list">
      <v-list-item
        v-for="locale in availableLocales"
        :key="locale"
        @click="changeLocale(locale)"
        class="language-item"
        :class="{ 'active': currentLocale === locale }"
      >
        <template v-slot:prepend>
          <img
            :src="`/images/flags/${locale}.png`"
            :alt="$t(`language.${locale}`)"
            width="24"
            height="16"
            loading="lazy"
            class="flag-icon mr-2"
          />
        </template>
        <v-list-item-title>{{ $t(`language.${locale}`) }}</v-list-item-title>
      </v-list-item>
    </v-list>
  </v-menu>
</template>

<script setup>
import { computed } from 'vue'
import { useI18n } from 'vue-i18n'

const { locale, availableLocales } = useI18n()
const currentLocale = computed(() => locale.value)

const changeLocale = (newLocale) => {
  locale.value = newLocale
  localStorage.setItem('userLocale', newLocale)
}
</script>

<style scoped>
.language-btn {
  font-weight: 500;
  color: white !important;
}

.language-list {
  padding: 8px 0;
  background-color: rgb(9, 113, 182)!important;
  border: 1px solid rgba(255, 255, 255, 0.2);
}

.language-item {
  transition: all 0.2s ease;
  min-height: 40px;
  color: white !important;
}

.language-item:hover {
  background-color: rgba(9, 113, 182, 0.1) !important;
}

.language-item.active {
  background-color: rgba(255, 255, 255, 0.15) !important;
}

.flag-icon {
  border-radius: 2px;
  object-fit: cover;
}
</style>