<?php
    require_once("../../auth.php");

    if(!check_session()) {
        header("Location: /");
        exit;
    }

    $title = "ἀθλητική (athletikḗ) - Nuova Attività";
    $extra_js = [
        ["file" => "activities.js", "type" => ""]
    ];
    require_once("../../header.php");
?>
<section id="core">
  <div id="activities_container">
    <div class="title">Nuova Attività</div>
    <div id="form_container">
      <div class="data">
        <form action="">
          <div>
            <label for="name">Titolo: </label>
            <input type="text" name="name" />
            <p class="error text-small"></p>
          </div>
          <div>
            <label for="sport">Sport: </label>
            <select name="sport">
            </select>
            <p class="error text-small"></p>
          </div>
          <div>
            <label for="performance">Performance: </label>
            <input type="input" name="performance" />
            <p class="error text-small"></p>
          </div>
          <div>
            <label for="description">Descrizione: </label>
            <textarea type="text" name="description" rows="5"></textarea>
            <p class="error text-small"></p>
          </div>
          <input type="submit" name="submit_button" value="Salva">
        </form>
      </div>
    </div>
  </div>
</section>

<?php require_once("../../footer.php") ?>
