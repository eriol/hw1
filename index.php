<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>
      ἀθλητική (athletikḗ) - Il primo network per gli atleti dai tempi di
      Fidippide
    </title>
    <link rel="stylesheet" href="css/hw1.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <script src="js/hw1.js" defer></script>
  </head>
  <body>
    <header>
      <nav id="navtop">
        <div id="logo_and_links">
          <a id="menu">
            <img src="images/bars-solid.svg" data-state="open" />
          </a>
          <div class="logo has-primary-color is-bold">ἀθλητική</div>
          <ul class="links">
            <li>
              <a href="#">Funzioni</a>
            </li>
            <li>
              <a href="#">Sfide</a>
            </li>
            <li>
              <a href="#">Abbonati</a>
            </li>
          </ul>
        </div>
        <a class="button">Accedi</a>
      </nav>
      <section id="menu_panel" class="">
        <nav id="navleft">
          <div id="panel_links">
            <ul class="links text-big">
              <li>
                <a href="#">Home</a>
              </li>
              <li>
                <a href="#">Funzioni</a>
              </li>
              <li>
                <a href="#">Sfide</a>
              </li>
            </ul>
            <hr />
            <ul class="links text-normal">
              <li>
                <a href="#">Abbonati</a>
              </li>
              <li>
                <a href="#">Assistenza</a>
              </li>
            </ul>
            <a class="button button-wide">Accedi</a>
            <a class="button button-wide account_register_email">
              Iscriviti con l'indirizzo email
            </a>
          </div>
        </nav>
      </section>
      <section id="menu_modal" class="hidden"></section>
    </header>

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
            <a class="button button-100 account_register_email">
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

    <footer>
      <div id="footer_container">
        <div class="social">
          <div class="logo has-primary-color is-bold">ἀθλητική</div>
          <div>
            <p class="disclaimer">ἀθλητική protegge i tuoi dati.</p>
            <div id="social_logos">
              <img class="social_logo" src="images/cloud-solid.svg" />
              <img class="social_logo" src="images/mountain-solid.svg" />
              <img class="social_logo" src="images/bolt-solid.svg" />
              <img class="social_logo" src="images/gopuram-solid.svg" />
            </div>
          </div>
        </div>
        <div class="footer_links">
          <ul class="links">
            <li>
              <a href="#">Funzioni</a>
            </li>
            <li>
              <a href="#">Abbonati</a>
            </li>
            <li>
              <a href="#">Sconti per discenti</a>
            </li>
            <li>
              <a href="#">Lavora con noi</a>
            </li>
            <li>
              <a href="#">Informazioni</a>
            </li>
            <li>
              <a href="#">Stampa</a>
            </li>
          </ul>
          <ul class="links">
            <li>
              <a href="#">Percorsi</a>
            </li>
          </ul>
          <ul class="links">
            <li>
              <a href="#">Cosa c'è di nuovo</a>
            </li>
            <li>
              <a href="#">Assistenza</a>
            </li>
            <li>
              <a href="#">Termini</a>
            </li>
          </ul>
          <div class="flex-break"></div>
          <ul class="links">
            <li>
              <a href="#">Non voglio condividere i miei dati!</a>
            </li>
            <li>
              <a href="#">Privacy</a>
            </li>
            <li>
              <a class="has-primary-color" href="#">Accedi</a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
  </body>
</html>
