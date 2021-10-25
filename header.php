
<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Royal Hotel</title>
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="navbar.css">
    <link href="https://fonts.googleapis.com/css?family=Butterfly+Kids|Roboto" rel="stylesheet"> 
    <script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="jquery/validate/jquery.validate.js" > </script>
    <script src="jquery/validate/additional-methods.js" > </script>
    <script src="jquery/validate/localization/messages_de.js" > </script>
    <script src="lib/js/kontakt.js" > </script>

    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>

 
<script>
    $(function() {
    $(".toggle").on("click", function() {
        if ($(".item").hasClass("show")) {
            $(".item").removeClass("show");
        } else {
            $(".item").addClass("show");
        }
    });
});
    </script>

</head>
<body>


    <nav>
      
        <ul class="menu">
            <li  id= "logo_top" class="logo ">  <img id="logo" src="Images/logo1.png" alt="logo"  ></li>
            <li class="<?php echo($page == "index" ? "active item" : "item") ; ?>"> <a  title="Startseite" href="index.php">Startseite</a> </li>
        
            <li class="<?php echo($page == "uberuns" ? "active item" : "item"); ?>"> <a href="uberuns.php">Über Hamamet</a> </li>
          
            
           
            
            <li class="<?php echo($page == "fotos" ? "active item" : "item"); ?>"> <a href="fotos.php">Fotos</a> </li>

            <li class="<?php echo($page == "kontakt" ? "active item" : "item") ; ?>"> <a href="kontakt.php">Kontakt</a> </li>
            
            <li class="<?php echo($page == "services" ? "active item" : "item"); ?>"> <a href="services.php">Buchen</a> </li>
            

            <?php if (auth_id()!= null) : ?>
            <li class="<?php echo($page == "services-admin" ? "active item" : "item"); ?>"> <a href="services-admin.php">Admin Bereich</a> </li>
            <?php endif ; ?>
            <?php if (!auth_id()!= null) : ?>
            <li class="<?php echo($page == "login" ? "active item button" : "item button") ; ?>"> <a href="login.php">einloggen</a> </li>
            <?php endif ; ?>
            <?php if (auth_id()!= null) : ?>
            <li class="item button "><a href="logout.php">Ausloggen</a></li>
            <?php endif ; ?>
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </nav>
    <noscript style="color:red; font-size: 1.2em;">
      <b>&lt;noscript&gt;</b> Um das Benutzererlebnis zu verbessern benötigen Sie aktives JavaScript in Ihrem Browser.
    </noscript>
 
