<?php
    require_once("auth.php");

    if(check_session()) {
        header("Location: /home/");
        exit;
    }

    $title = "ἀθλητική (athletikḗ) - Il primo network per gli atleti dai tempi di Fidippide";
    require_once("header.php");
?>

  <article id="home">
    <section id="desktop">
      <div id="desktop_container">
        <div class="left_column"></div>
        <div class="center_column">
          <h2>Cadi sette volte, rialzati otto.</h2>
          <p>
            Il primo network per gli atleti dai tempi di
            <span class="fidippide" data-name="Filippide">Fidippide</span>.
            Tieni traccia dei tuoi progressi e fai il tifo!
          </p>
          <p>
            Sei già in ἀθλητική?
            <a class="has-primary-color is-bold" href="#">Accedi</a>
          </p>
          <a class="button button-100 account_register_email" href="/register/">
            Iscriviti con l'indirizzo email
          </a>
          <p class="disclaimer">
            Registrandoti ad ἀθλητική, accetti di consacrare i tuoi figli alla
            dea Nike. Leggi i nostri <a href="#">termini di servizio</a>.
          </p>
        </div>
        <div class="right_column"></div>
      </div>
      <div class="external_apis">
        <div class="athletes">
          <div class="info"></div>
          <div class="photo"></div>
        </div>
        <div class="deities"></div>
      </div>
    </section>

    <section id="mobile">
      <div class="header">
        <div id="overlay">
          <h1>Il primo network per gli atleti dai tempi di Fidippide.</h1>

          <a class="button orange_button">Iscriviti con l'indirizzo email</a>
          <p>Esplora</p>
          <img class="arrow" src="images/arrow-down-solid.svg" />
        </div>
      </div>
      <div id="who">
        <h2>CHI SIAMO</h2>
        <p class="description">
          Se sei un appassionato dell'attività fisica,
          <strong><em>ἀθλητική</em></strong> è la piattaforma perfetta per te!
          Il nostro sito web è progettato per arricchire la tua esperienza
          sportiva e connetterti con milioni di atleti provenienti da ogni
          angolo del mondo. Siamo il social network ideale per coloro che
          amano mettersi alla prova e raggiungere nuovi obiettivi. Unisciti a
          noi oggi stesso e diventa parte della nostra comunità dedicata al
          fitness e al benessere.
        </p>
        <div class="wrestling"></div>
      </div>
      <div id="features">
        <h2>Funzioni di ἀθλητική</h2>
        <a id="features-explore" class="button-round">ESPLORA</a>
      </div>
      <div id="features-more" class="hidden"></div>
      <div id="subscription">
        <h2>Abbonati a ἀθλητική</h2>
        <a id="subscription-explore" class="button-round">ESPLORA</a>
      </div>
      <div id="subscription-more" class="hidden">
        <div class="is-bold">Solo 5 dracme al mese!</div>
      </div>
    </section>
  </article>

<?php require_once("footer.php") ?>
