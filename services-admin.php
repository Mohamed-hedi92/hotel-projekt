<?php 
$page = "services-admin";
require 'bootstrap.php';
 include "header.php";
?>

<?php
//  require 'bootstrap.php';


$db = mysqli_connect('localhost', 'root', '', 'cmw', 3306);

mysqli_set_charset($db, 'utf8mb4');

if (mysqli_connect_errno()) {
    trigger_error('DB ERROR: ' . mysqli_connect_error(), E_USER_ERROR);
}

$errors = [];
$right=[];
$action = $_POST['action'] ?? '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {





    // update Kategorie
    if ($action === 'update') {
        $buchung_email = $_POST['buchung-email'] ?? '';
        $buchung_kategorie = $_POST['buchung-kategorie'] ?? '';
        $buchung_anreise= $_POST['buchung-anreise'] ?? '';
        $buchung_abreise = $_POST['buchung-abreise'] ?? '';
        $buchung_zimmer = $_POST['buchung-zimmer'] ?? '';
        $buchung_erwachsene = $_POST['buchung-erwachsene'] ?? '';
        $buchung_kinder = $_POST['buchung-kinder'] ?? '';
        $id = (int) ($_POST['id'] ?? '');

        if ($buchung_kategorie === '') {
            $errors['buchung-kategorie'] = ' kategorie darf nicht leer sein.';
        }
        if ($buchung_anreise === '') {
            $errors['buchung-anreise'] = ' anreise darf nicht leer sein.';
        }
        if ($buchung_abreise === '') {
            $errors['buchung-abreise'] = ' abreise darf nicht leer sein.';
        }
        if ($buchung_zimmer === '') {
            $errors['buchung-zimmer'] = ' zimmer darf nicht leer sein.';
        }
        if ($buchung_erwachsene === '') {
            $errors['buchung-erwachsene'] = ' Erwachsene darf nicht leer sein.';
        }
        if ($buchung_kinder === '') {
            $errors['buchung-kinder'] = ' kinder darf nicht leer sein.';
        }
        if ($errors) {
            $action = 'bearbeiten';
        }
        if (!$errors) {
            $right['right'] = 'Vielen Dank! Ihren Änderungen wurden gespeichert.';
        
            $buchung_email = mysqli_escape_string($db, $buchung_email);
            $buchung_kategorie = mysqli_escape_string($db, $buchung_kategorie);
            $buchung_anreise = mysqli_escape_string($db, $buchung_anreise);
            $buchung_abreise = mysqli_escape_string($db, $buchung_abreise);
            $buchung_zimmer = mysqli_escape_string($db, $buchung_zimmer);
            $buchung_erwachsene = mysqli_escape_string($db, $buchung_erwachsene);
            $buchung_kinder = mysqli_escape_string($db, $buchung_kinder);

            

            // $sql = "UPDATE `buchung` SET (`kategorie`,`anreise`, `abreise`,`zimmer`,`erwachsene`,`kinder`)
            //  VALUES ( '$buchung_kategorie','$buchung_anreise', '$buchung_abreise', '$buchung_zimmer', '$buchung_erwachsene', '$buchung_kinder')";
             $sql = "UPDATE  `buchung` SET  `kategorie` = '$buchung_kategorie',`anreise`= '$buchung_anreise', 
              `abreise` = '$buchung_abreise' , `zimmer` ='$buchung_zimmer',`erwachsene`='$buchung_erwachsene', 
              `kinder`= '$buchung_kinder' WHERE `id`= $id ";

           $success = mysqli_query($db, $sql);

              if (mysqli_error($db)) {
              trigger_error('DB ERROR: ' . mysqli_error($db), E_USER_ERROR);
                     }
        }
   
    }





    if ($action === 'löschen') {
        $id = (int) ($_POST['id'] ?? 0);

        $sql = "DELETE FROM `buchung` WHERE `id` = $id";

        mysqli_query($db, $sql);

        if (mysqli_error($db)) {
            trigger_error('DB ERROR: ' . mysqli_error($db), E_USER_ERROR);
        }
    }
}


// Read
// TODO: ORDER BY ... date / alpha

$sql = "SELECT * FROM `buchung`";

$result = mysqli_query($db, $sql);
$buchungen = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (mysqli_error($db)) {
    trigger_error('DB ERROR: ' . mysqli_error($db), E_USER_ERROR);
}

mysqli_free_result($result);

mysqli_close($db);
////////////////////////////////////////////////////////
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buchungen</title>
    <style>
    .alert {
        color: red;
    }
    </style>
</head>

<body>
    <article>
        <h1>Buchungen</h1>

    </article>

    <ul id="ul-admin">
        <?php foreach ($buchungen as $buchung) : ?>
        <li>
            <?php if ($action === 'bearbeiten' && $buchung['id'] === ($_POST['id'] ?? 0)) : ?>

            <div id="wrap" class=" flexleft container">
                <form action="" method="post" style="display: block">
                    <input type="hidden" name="id" value="<?= $buchung['id'] ?>">
                    <?php if (isset($errors['buchung-email'])) : ?>
                    <div class="alert"><?= $errors['buchung-email'] ?></div>
                    <?php endif; ?>



                    <span id="spanstyle"> <?= htmlspecialchars($buchung['email']) ?> </span>

                    <?php if (isset($errors['buchung-kategorie'])) : ?>
                    <div class="alert"><?= $errors['buchung-kategorie'] ?></div>
                    <?php endif; ?>
                    <div class="">
                        <table class="">
                    <tr>
                        <td  id="just1" class="redspan" style="font-weight:bold">Kategorie </td>

                        <td>
                        <select id="inputstyle2" type="text" name="buchung-kategorie"
                                value="<?= htmlspecialchars($buchung['kategorie']) ?>" id="buchung-kategorie"> 
                                        <option value="Luxus Zimmer">Luxus Zimmer</option>
                                          <option value="Einzelzimmer">Einzelzimmer"</option>
                                             <option value="Doppelzimmer">doppelzimmer</option>
                                                 <option value="Superior Zimmer">Superior Zimmer</option>
                        </select>
                       </td>
                       
                    </tr>
                    <?php if (isset($errors['buchung-anreise'])) : ?>
                    <div class="alert"><?= $errors['buchung-anreise'] ?></div>
                    <?php endif; ?>
                    <tr>
                        <td  id="just2" class="redspan" style="font-weight:bold">Anreise</td>
                        
                            <td> <input id="inputstyle3" type="date" name="buchung-anreise"
                                    value="<?= htmlspecialchars($buchung['anreise']) ?>" id="buchung-anreise"> </td>

                    </tr>
                    <?php if (isset($errors['buchung-abreise'])) : ?>
                    <div class="alert"><?= $errors['buchung-abreise'] ?></div>
                    <?php endif; ?>
                    <tr>
                        <td  id="just3" class="redspan" style="font-weight:bold">Abreise</td>
                        <td> <input id="inputstyle4" type="date" name="buchung-abreise"
                                value="<?= htmlspecialchars($buchung['abreise']) ?>" id="buchung-abreise"> </td>
                    </tr>
                    <?php if (isset($errors['buchung-zimmer'])) : ?>
                    <div class="alert"><?= $errors['buchung-zimmer'] ?></div>
                    <?php endif; ?>
                    <tr>
                        <td id="just4" class="redspan" style="font-weight:bold">Zimmer</td>
                        <td> <input id="inputstyle5" type="number" name="buchung-zimmer"
                                value="<?= htmlspecialchars($buchung['zimmer']) ?>" id="buchung-zimmer"> </td>
                    </tr>

                    <?php if (isset($errors['buchung-erwachsene'])) : ?>
                    <div class="alert"><?= $errors['buchung-erwachsene'] ?></div>
                    <?php endif; ?>
                    <tr>
                        <td  id="just5" class="redspan" style="font-weight:bold">Erwachsene</td>
                        <td> <input id="inputstyle6" type="number" name="buchung-erwachsene"
                                value="<?= htmlspecialchars($buchung['erwachsene']) ?>" id="buchung-erwachsene">
                        </td>
                    </tr>
                    <?php if (isset($errors['buchung-kinder'])) : ?>
                    <div class="alert"><?= $errors['buchung-kinder'] ?></div>
                    <?php endif; ?>

                    <tr>
                        <td  id="just6" class="redspan" style="font-weight:bold">Kinder</td>
                        <td> <input id="inputstyle1" type="number" name="buchung-kinder"
                                value="<?= htmlspecialchars($buchung['kinder']) ?>" id="buchung-kinder"> </td>
                    </tr>

                    <tr>
                        <td><button id="btn1" name="action" value="cancel" type="submit">zurück</button> </td>
                        <td><button id="btn2" name="action" value="update" type="submit">speichern</button> </td>
                    </tr>
                  
                    </table>
                </form>
            </div>

            <?php else : ?>
            <div id="wrap" class=" flexleft container">
                <span><?= htmlspecialchars($buchung['email']) ?></span> <br>
                <form action="" method="post" style="display: inline-block">
                    <input type="hidden" name="id" value="<?= $buchung['id'] ?>">
                    <input name="action" value="löschen" type="submit"></input>
                    <input name="action" value="bearbeiten" type="submit"></input>
                  
                   
                    
                </form>
               
            </div>

            <?php endif; ?>
        </li>
        <?php endforeach; ?>

        <?= right_for($right, 'right') ?>
    </ul>





    <?php

$temps=db_raw_select('SELECT * FROM buchung  ORDER BY anreise');
// $temps2=db_raw_select('SELECT * FROM buchung WHERE anreise = "'.$anreise.' " ');

$sql1=  "SELECT * FROM `kontakt` ";
$sql =  "SELECT * FROM `buchung` ";
$infos = db_raw_select ($sql);
$infos1= db_raw_select ($sql1);


?>
    <div class="pos">
        <table class="table">
            <thead>
                <tr>
                    <th>email</th>
                    <th>kategorie</th>
                    <th>anreise</th>
                    <th>abreise</th>
                    <th>zimmer</th>
                    <th>erwachsene</th>
                    <th>kinder</th>
                </tr>
            </thead>
            <?php foreach($infos as $info):?>
            <tbody>
                <tr>
                    <td data-label="email"><?=$info['email'];?></td>
                    <td data-label="kategorie"><?=$info['kategorie'];?></td>
                    <td data-label="anreise"><?=$info['anreise'];?></td>
                    <td data-label="abreise"><?=$info['abreise'];?></td>
                    <td data-label="zimmer"><?=$info['zimmer'];?></td>
                    <td data-label="erwachsene"><?=$info['erwachsene'];?></td>
                    <td data-label="kinder"><?=$info['kinder'];?></td>

                </tr>
                <?php endforeach;?>

            </tbody>
        </table>
    </div>
    <article>
    <h4> Kontakt Nachrichten </h4>
    <div class="pos">
        <table class="table">
            <thead>
                <tr>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Text</th>
                    <th>gender</th>
                  
                </tr>
            </thead>
            <?php foreach($infos1 as $info):?>
            <tbody>
                <tr>
                    <td data-label="vorname"><?=$info['vorname'];?></td>
                    <td data-label="nachname"><?=$info['nachname'];?></td>
                    <td data-label="email"><?=$info['email'];?></td>
                    <td data-label="subject"><?=$info['subject'];?></td>
                    <td data-label="text"><?=$info['text'];?></td>
                    <td data-label="gender"><?=$info['gender'];?></td>
                  

                </tr>
                <?php endforeach;?>

            </tbody>
        </table>
    </div>
            </article>



</body>

</html>

<?php include "footer.php";?>