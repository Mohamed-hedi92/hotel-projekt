<?php

$page = "Kontakt";
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

  $vorname = ($_POST['vorname']) ?? '';
  $nachname = ($_POST['nachname']) ?? '';
  $email = $_POST['email'] ?? '';
  $gender = ($_POST['gender']) ?? '';
  $subject = ($_POST['subject']) ?? '';
  $area = ($_POST['area']) ?? '';
  $check = ($_POST['checkname']) ?? '';
  // $staedte = implode(',', $_POST['checkname']);

// echo $staedte;

  if ($vorname === '') {
    $errors['vorname'] = 'PHP!!! Bitte geben Sie Ihren  Ihre vorname ein';
  }
  if ($nachname === '') {
    $errors['nachname'] = 'Bitte geben Sie Ihren  Ihre Nachname ein';
  }

  if ((strpos($email, '@') === false)) {
    $errors['email'] = "Es fehlt ein @ ZEICHEN!";
  }

  if ($email === '') {
    $errors['email'] = 'Bitte geben Sie Ihre E-mail ein';
  }

  if($gender === '') {
    $errors['gender'] = 'Bitte wählen Sie aus was sie sind';
  }
  

  if ($subject === '') {
    $errors['subject'] = 'Bitte wählen Sie ihr Anliegen aus ';
  }
  if ($area === '') {
    $errors['area'] = 'Bitte Schreib mir was';
  }

  if($check === '') {
    $errors['check'] = 'Bitte akzeptieren';
  }

  if (!$errors) {
    $right['right'] = 'Vielen Dank! ' .$email. ' <br>Ihre Nachricht  wurde in unser System eingetragen.';
    $sql = "INSERT INTO `kontakt`(`vorname`,`nachname`,`email`, `gender`,`subject`,`text`,`check`) VALUES ('$vorname', '$nachname','$email', '$gender', '$subject', '$area', '$check')";

    mysqli_query($database, $sql);
  }
}

?>
<div id="position">
<div id ="wrap" class=" flex container ">
  <form action="#"  method="post" >
    <div class="row">
      <div class="col-25">


      <label class="labels required" for="vorname">Vorname:</label>
      </div>
      <div class="col-75">
      <input type="text" name="vorname" id="vorname" required>
      <?php if (isset($errors['vorname'])) : ?>
        <div class="error"><?= $errors['vorname'] ?></div>
      <?php endif; ?>
      <!-- <div class="js_error" id="error_vorname">js!!! Vorname darf nicht leer sein</div> -->
    
      </div>
    </div>
    <div class="row">
      <div class="col-25">
       <label   id="lbl" class="labels required" for="nachname">Nachname:</label>
      </div>
      <div class="col-75">
      <input type="text" name="nachname" id="nachname" required>
      <?php if (isset($errors['vorname'])) : ?>
        <div class="error"><?= $errors['nachname'] ?></div>
      <?php endif; ?>
      <!-- <div class="js_error" id="error_nachname">Nachname darf nicht leer sein</div> -->
     
      </div>
    </div>

    <div class="row">
      <div class="col-25">
    <label   id="lbl1" class="labels required" for="email">E-mail:</label>
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
      
    <label  id="lb2" class="labels required" >Geschlecht:</label>
      </div>
      <div class="col-75">
      <label  id="lb3" for="male">Mänlich
        <input type="radio" name="gender" id="male" value="mänlich" required>
      </label>

      <label   id="lb4" for="female">Weiblich
        <input type="radio" name="gender" id="female" value="weiblich" required>
      </label>


      <label   id="lb5" for="x">
       Anders<input type="radio" name="gender" id="x" value="anders" required>
      </label>
      <?php if (isset($errors['gender'])) : ?>
        <div class="error"><?= $errors['gender'] ?></div>
      <?php endif; ?>
      </div>
      </div>



    <div class="row">
      <div class="col-25">
      <label class="labels required" for="subject">Subject:</label>
      </div>
      <div class="col-75">
        
      <select name="subject" id="subject" required>
        <option value="" disabled selected>--Bitte wählen--</option>
        <option value="Anliegen1">Feedback</option>
        <option value="Anliegen2">Über Buchung</option>
        <option value="Anliegen3">Was anders</option>
      </select>
      <?php if (isset($errors['subject'])) : ?>
        <div class="error"><?= $errors['subject'] ?></div>
      <?php endif; ?>
      </div>
    </div>

    
    <div class="row">
      <div class="col-25">
    <label class="labels required" for="area">Ihre Nachricht</label>
      </div>
      <div class="col-75">
      <textarea name="area" id="area" cols="30" rows="10" required></textarea>
      <?php if (isset($errors['area'])) : ?>
        <div class="error"><?= $errors['area'] ?></div>
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
      <input type="submit" value="Submit">
    </div>
    <?= right_for($right, 'right') ?>
  </form>

  </div>

  </div>


<?php
include "footer.php"
?>