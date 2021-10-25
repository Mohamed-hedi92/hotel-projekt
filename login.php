<?php
 
$page = "login";
require 'bootstrap.php';
include "header.php";
?>
<?php


$active_page = 'login';

if (request_is('post')) {

    $email = request('email');
    $password = request('password');

    if ($email === '') {
        $errors['email'] = 'geben Sie bitte Ihre Email Adresse ein.';
    }

    if ($password === '') {
        $errors['password'] = ' Bitte geben Sie Ihr Psswort ein.';
    }

    if (!$errors) {
        $user = db_raw_first(
            "SELECT * FROM `users` WHERE `email` = " . db_prepare($email)
        );

        if (!$user) {
            $errors['email'] = 'Ihre Anmeldeinformationen sind falsch!';
        }
    }

    if (!$errors) {
        if (!password_verify($password, $user['password'])) {
            $errors['email'] = 'Ihre Anmeldeinformationen sind falsch!';
        }
    }

    if (!$errors) {
        login($user);
        redirect(BASE_URL.'services-admin.php');
    }
}


?>
<div  id ="pos3">
<div id="wrap" class="flex container">
<form action="<?= BASE_URL.'login.php' ?>" method="post">
    <div class="form-group">
        <?= error_for($errors, 'email') ?>
        <label for="email">Email </label>
        <input type="text" name="email" id="email" required>
    </div>

    <div class="form-group">
        <?= error_for($errors, 'password') ?>
        <label for="password">Password</label>
        <input type="text" name="password" id="password" required>
    </div>

    <div class="form-group">
        <button type="submit">Login</button>
    </div>



</form>
</div>
</div>
<?php include "footer.php";?>
