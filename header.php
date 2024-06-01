<?php
    require_once("auth.php");
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="/css/hw1.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" type="image/png" href="/images/favicon.png">
    <script src="/js/hw1.js" defer></script>
    <?php if (isset($extra_js)) {
    foreach($extra_js as $ejs) {
        if(isset($ejs["type"]) && $ejs["type"] === "module") {
            $type='type="module"';
        }
        else{
            $type='';
        }

            echo '<script ' . $type . ' src="/js/' . $ejs["file"] . '" defer></script>';
        }
    } ?>
  </head>
  <body>
    <header>
      <nav id="navtop">
        <div id="logo_and_links">
          <a id="menu">
            <img src="/images/bars-solid.svg" data-state="open" />
          </a>
          <div class="logo"><a class="has-primary-color is-bold" href="/">ἀθλητική</a></div>
          <ul class="links">
            <?php
                if(check_session()) {
                    echo '<li>
                            <a href="/profile/">Profilo</a>
                          </li>';
                } else {
                    echo '<li>
                            <a href="#">Funzioni</a>
                          </li>
                          <li>
                            <a href="#">Sfide</a>
                          </li>
                          <li>
                            <a href="#">Abbonati</a>
                          </li>';
                }
            ?>
          </ul>
        </div>
        <?php
            if(check_session()) {
                echo '<a class="button" href="/logout/">Logout</a>';
            } else {
                echo '<a class="button" href="/login/">Accedi</a>';
            }
        ?>
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
