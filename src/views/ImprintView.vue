<template>
  <v-container class="impressum-container">
    <v-row justify="center">
      <v-col cols="12" md="10" lg="8">
        <v-card class="pa-6" elevation="2">
          <h1 class="text-h4 mb-6 text-primary">Impressum / Haftungsausschluss</h1>
          
          <section class="mb-8">
            <h2 class="text-h6 mb-3 font-weight-bold">Angaben gemäß § 5 TMG:</h2>
            <p class="mb-1">alpha med care GmbH</p>
            <p class="mb-1">Ulrichstraße 11A</p>
            <p class="mb-4">92278 Illschwang</p>
          </section>

          <section class="mb-8">
            <h2 class="text-h6 mb-3 font-weight-bold">Vertreten durch:</h2>
            <p class="mb-4">Herr Benjamin Weiß</p>
          </section>

          <section class="mb-8">
            <h2 class="text-h6 mb-3 font-weight-bold">Kontakt:</h2>
            <p class="mb-1">Telefon: +49-966-618-895-0</p>
            <p class="mb-4">E-Mail: <a href="mailto:kontakt@alpha-med-care.de" class="text-link">kontakt@alpha-med-care.de</a></p>
          </section>

          <section class="mb-8">
            <h2 class="text-h6 mb-3 font-weight-bold">Registereintrag:</h2>
            <p class="mb-1">Eintragung im Handelsregister.</p>
            <p class="mb-1">Registergericht: Amtsgericht Amberg, Oberpfalz</p>
            <p class="mb-4">Registernummer: HRB 5149</p>
          </section>

          <section class="mb-8">
            <h2 class="text-h6 mb-3 font-weight-bold">Umsatzsteuer:</h2>
            <p class="mb-4">
              Umsatzsteuer-Identifikationsnummer gemäß §27 a Umsatzsteuergesetz:<br>
              DE286410285
            </p>
          </section>

          <section class="mb-8">
            <h2 class="text-h6 mb-3 font-weight-bold">Streitschlichtung</h2>
            <p class="mb-2">
              Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit:<br>
              <a href="https://ec.europa.eu/consumers/odr" target="_blank" rel="noopener noreferrer" class="text-link">
                https://ec.europa.eu/consumers/odr
              </a>
            </p>
            <p class="mb-2">Unsere E-Mail-Adresse finden Sie oben im Impressum.</p>
            <p class="mb-4">
              Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer
              Verbraucherschlichtungsstelle teilzunehmen.
            </p>
          </section>

          <section class="mb-8">
            <h2 class="text-h6 mb-3 font-weight-bold">Haftung für Inhalte</h2>
            <p class="mb-4">
              Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den
              allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht
              verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach Umständen
              zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen.
            </p>
            <p class="mb-4">
              Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen
              Gesetzen bleiben hiervon unberührt. Eine diesbezügliche Haftung ist jedoch erst ab dem Zeitpunkt der
              Kenntnis einer konkreten Rechtsverletzung möglich. Bei Bekanntwerden von entsprechenden
              Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.
            </p>
          </section>

          <section class="mb-8">
            <h2 class="text-h6 mb-3 font-weight-bold">Haftung für Links</h2>
            <p class="mb-4">
              Unser Angebot enthält Links zu externen Websites Dritter, auf deren Inhalte wir keinen Einfluss haben.
              Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. Für die Inhalte der
              verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten
              Seiten wurden zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße überprüft. Rechtswidrige
              Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar.
            </p>
            <p class="mb-4">
              Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer
              Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Links
              umgehend entfernen.
            </p>
          </section>

          <section class="mb-4">
            <h2 class="text-h6 mb-3 font-weight-bold">Urheberrecht</h2>
            <p class="mb-4">
              Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen
              Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der
              Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw.
              Erstellers. Downloads und Kopien dieser Seite sind nur für den privaten, nicht kommerziellen Gebrauch
              gestattet.
            </p>
            <p class="mb-4">
              Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter
              beachtet. Insbesondere werden Inhalte Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine
              Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei
              Bekanntwerden von Rechtsverletzungen werden wir derartige Inhalte umgehend entfernen.
            </p>
          </section>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: 'Impressum',
  metaInfo() {
    return {
      title: 'Impressum - alpha med care GmbH'
    }
  }
}
</script>

<style scoped>
.impressum-container {
  padding-top: 40px;
  padding-bottom: 60px;
}

.text-link {
  color: #1976D2;
  text-decoration: none;
}

.text-link:hover {
  text-decoration: underline;
}

section {
  border-bottom: 1px solid #eee;
  padding-bottom: 16px;
}

section:last-child {
  border-bottom: none;
}

.font-weight-bold {
  color: #333;
}

.v-card {
  background-color: #fff;
  border-radius: 8px;
}
</style>