<?php 
 $page = "services";
 require 'bootstrap.php';
 include "header.php";
?>



<?php

//------------------------------------------------------
// Datenbank loginjs

$database = mysqli_connect('localhost', 'root', '', 'cmw', 3306);
mysqli_set_charset($database, 'utf8mb4');

if (mysqli_connect_errno()) {
  trigger_error('DB ERORR:' . mysqli_connect_error(), E_USER_ERROR);
}

//------------------------------------------------------------
$errors = [];
$right = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

 
  
  $email = $_POST['email'] ?? '';
  $subject= ($_POST['subject']) ?? '';
  $anreise = ($_POST['datum']) ?? '';
  $abreise = ($_POST['datumab']) ?? '';
  $zimmer = ($_POST['zimmer']) ?? '';
  $erwachsene = ($_POST['erwachsene']) ?? '';
  $kinder = ($_POST['kinder']) ?? '';
  $check = ($_POST['checkname']) ?? '';
 
  if ((strpos($email, '@') === false)) {
    $errors['email'] = "Es fehlt ein @ ZEICHEN!";
  }

  if ($email === '') {
    $errors['email'] = 'Bitte geben Sie Ihre E-mail ein';
  }

  if ($subject === '') {
    $errors['subject'] = 'Bitte geben Sie die Kategorie ein';
  }



  if($anreise === '') {
    $errors['datum'] = 'Bitte wählen Sie eine Datum  aus ';
  }
  if($abreise === '') {
    $errors['datumab'] = 'Bitte wählen Sie eine Datum  aus ';
  }
  

  if ($zimmer === '') {
    $errors['zimmer'] = 'Bitte wählen Sie ein Zimmer aus ';
  }
  if ($erwachsene === '') {
    $errors['erwachsene'] = 'Bitte Schreiben Sie vie viele Erwachsene ';
  }
  if ($kinder=== '') {
    $errors['kinder'] = 'Bitte Schreiben Sie vie viele Kinder haben Sie ';
  }

  if($check === '') {
    $errors['check'] = 'Bitte akzeptieren';
  }

  if (!$errors) {
    $right['right'] = 'Vielen Dank! ' .$email. '<br>Ihre Buchung  wurde in unser System eingetragen.';
    $sql = "INSERT INTO `buchung`(`email`,`kategorie`,`anreise`, `abreise`,`zimmer`,`erwachsene`,`kinder`,`check`)
     VALUES ('$email', '$subject','$anreise', '$abreise', '$zimmer', '$erwachsene','$kinder','$check')";

    mysqli_query($database, $sql);
  }
}

?>

<div id="position2">
<div   id ="wrap" class="flex" >
<article >
  <h4> Kontaktieren Sie uns </h4>

<div class="container">
  <form action="#"  method="post">
  
    

    <div class="row">
      <div class="col-25">
    <label id="lbl9" class="labels required" for="email">E-mail:</label>
    </div>
    <div class="col-75">
      <input type="text" name="email" id="email" required>
      <?php if (isset($errors['email'])) : ?>
        <div class="error"><?= $errors['email'] ?></div>
      <?php endif; ?>
      </div>
    </div>


   



    <div class="row">
      <div class="col-25">
      <label class="labels required" for="subject">Kategorie:</label>
      </div>
      <div class="col-75">
        
      <select name="subject" id="subject" required>
        <option value="" disabled selected>--Bitte wählen--</option>
        <option value="einzelzimmer">Luxus Zimmer</option>
        <option value="einzelzimmer">Einzelzimmer</option>
        <option value="doppelzimmer">Superior Zimmer Meerblick</option>
        
      </select>
      <?php if (isset($errors['subject'])) : ?>
        <div class="error"><?= $errors['subject'] ?></div>
      <?php endif; ?>
      </div>
    </div>

    
    <div class="row">
      <div class="col-25">
    <label class="labels required" for="datum">Anreise</label>
      </div>
      <div class="col-75">
      <input  type="date" name="datum" id="datum"  required></input>
      <?php if (isset($errors['datum'])) : ?>
        <div class="error"><?= $errors['datum'] ?></div>
      <?php endif; ?>
      </div>
      </div>
      <div class="row">
      <div class="col-25">
    <label class="labels required" for="datumab">Abreise</label>
      </div>
      <div class="col-75">
      <input  type="date" name="datumab" id="datumab" required></input>
      <?php if (isset($errors['datumab'])) : ?>
        <div class="error"><?= $errors['datumab'] ?></div>
      <?php endif; ?>
      </div>
      </div>
  


      <div class="row">
      <div class="col-25">
    <label class="labels required" for="zimmer">Zimmer:</label>
    </div>
    <div class="col-75">
      <input type="number" min="1"  max="10" step="1" name="zimmer" id="zimmer" required>
      <?php if (isset($errors['zimmer'])) : ?>
        <div class="error"><?= $errors['zimmer'] ?></div>
      <?php endif; ?>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
    <label class="labels required" for="erwachsene">Erwachsene:</label>
    </div>
    <div class="col-75">
      <input type="number" min="1"  max="10" step="1" name="erwachsene" id="erwachsene" required>
      <?php if (isset($errors['erwachsene'])) : ?>
        <div class="error"><?= $errors['erwachsene'] ?></div>
      <?php endif; ?>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
    <label class="labels required" for="kinder">Kinder:</label>
    </div>
    <div class="col-75">
      <input type="number" min="0"  max="10" step="1" name="kinder" id="kinder" required>
      <?php if (isset($errors['kinder'])) : ?>
        <div class="error"><?= $errors['kinder'] ?></div>
      <?php endif; ?>
      </div>
    </div>


    <div class="row">
      <div class="col-25">
    
  <label for="check">AGB akzeptieren</label>

      </div>
      <div class="col-75">
      <input type="checkbox" id="check" name="checkname" value="AGB" required>
  <?php if (isset($errors['check'])) : ?>
        <div class="error"><?= $errors['check'] ?></div>
      <?php endif; ?>
  </div>
  </div>



    <div class="row">
      <input type="submit" value="buchen">
    </div>

    <?= right_for($right, 'right') ?>
  </form>

  </div>





</article>
<article >
 <h4> Unsere Zimmer </h4>
<div class="cssSlider">
 
    <!-- die inputs um den Slider zu Steuern -->
    <input type="radio" name="slider" id="slide01" checked="checked">
    <input type="radio" name="slider" id="slide02">
    <input type="radio" name="slider" id="slide03">
    <input type="radio" name="slider" id="slide04">
 
    <!-- die einzelnen Slides, hier als Liste angelegt -->
    <ul class="sliderElements">
        <li>
            <figure>
                <img id="img-1" src="images/zimmerLuxe.jpg" alt="" width="1200" height="400">
                <figcaption>Luxus Zimmer</figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <img id="img-2" src="images/einzelzimmer.jpg" alt="" width="1200" height="400">
                <figcaption>Einzelzimmer</figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <img id="img-3" src="images/doppeltzimmer.jpg" alt="" width="1200" height="400">
                <figcaption>Superior-Zimmer Meerblick</figcaption>
            </figure>
        </li>
        <li>
            <figure>
                <img id="img-4" src="images/superiorzimmer.jpg" alt="" width="1200" height="400">
                <figcaption>Superior-Zimmer Meerblick</figcaption>
            </figure>
        </li>
    </ul>
 
    <!-- Eine Steuerung -->
    <ul class="sliderControls">
        <li><label for="slide01">1</label></li>
        <li><label for="slide02">2</label></li>
        <li><label for="slide03">3</label></li>
        <li><label for="slide04">4</label></li>
    </ul>
</div>

</article>
</div>
</div>
<?php 
include "footer.php"
?>