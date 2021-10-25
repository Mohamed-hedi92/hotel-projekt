<!doctype html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Royal Hotel</title>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/webshim/1.12.4/shims/styles/shim.css">
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="navbar.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="jquery/validate/jquery.validate.js"> </script>
    <script src="jquery/validate/additional-methods.js"> </script>
    <script src="jquery/validate/localization/messages_de.js"> </script>
    <script src="lib/js/kontakt.js"> </script>

    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
    <!-- polyfiller file to detect and load polyfills -->
    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
    <script>
    webshims.setOptions('waitReady', false);
    webshims.setOptions('forms-ext', {
        types: 'date'
    });
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
            <li id="logo_top" class="logo "> <img id="logo" src="Images/logo1.png" alt="logo"></li>
            <li class="active item"> <a title="Startseite" href="index.php">Startseite</a> </li>

            <li class="item"> <a href="uberuns.php">Über Hamamet</a> </li>





            <li class="item"> <a href="fotos.php">Fotos</a> </li>

            <li class="item"> <a href="kontakt.php">Kontakt</a> </li>

            <li class="item"> <a href="services.php">Buchen</a> </li>


            <li class="item button"> <a href="login.php">einloggen</a> </li>
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </nav>

    <div class="header-img">
    </div>

    <main>

        <article>
            <h2>Herzlich willkommen bei Royal Hammamet</h2>

            <p>Willkommen in unserem Hotel, einem Ort der Ruhe und des Wohlbefindens.</p>
            <p> Dieses himmlische Hotel befindet sich am Mittelmeerstrand von Yasmine Hammamet,
                neben dem Yachthafen und in der Nähe von Sehenswürdigkeiten.</p>
            <p> Die Medina von Hammamet ist etwa 30 Minuten entfernt. Gäste dieses herrlichen Resorts können in einem
                der
                vier Außenpools schwimmen,
                sich im Loungebereich sonnen, an der Snackbar am Pool etwas trinken oder den Sandstrand genießen. Es ist
                ein
                ideales Urlaubsziel für Familien.</p>
            <p> Das Hotel bietet viele Aktivitäten für Erwachsene und Kinder.</p>
            <p> Das Hotel bietet viele Aktivitäten für Sportbegeisterte und die schönen Golfplätze Yasmine und Citrus
                sind
                leicht zu erreichen.</p>
            <p> Das hoteleigene Spa bietet eine breite Palette an Behandlungen und Massagen. Der Komplex verfügt über
                vier
                Restaurants und zwei Snackbars,</p>
            <p> in denen Sie regionale Spezialitäten probieren, die besten mediterranen Meeresfrüchte,
                köstliche italienische Küche oder einen Drink am Meer genießen können.</p>

            <h4> Unsere Leistungen </h4>

            <div class="container flex col-100">
                <article>

                    <div id="indextext1" class="col-25">

                        <h5>Öffnungszeiten des Restaurants</h5>


                        <p>Von Dienstagabend bis Samstag und Sonntagmittag

                            Es ist wichtig, für den Abend zu reservieren.

                            Wir begrüßen unsere Kunden von 12.00 bis 13.30 Uhr und von 19.30 bis 20.30 Uhr.</p>

                    </div>

                    <div class="col-25">

                        <figure>
                            <img id="indeximg1" src="images/room1.jpg" alt="zimmer" width="500">
                            <figcaption> Zimmer </figcaption>
                        </figure>
                    </div>


                    <div class="col-25">
                        <figure>
                            <img id="indeximg2" src="images/conf1.jpg" alt="zimmer" width="500">
                            <figcaption> Konferenzen </figcaption>
                        </figure>
                    </div>
                </article>
            </div>

            <div class="container flex col-100">
                <article>

                    <div id="indextext" class="col-25">

                    </div>

                    <div class="col-25">

                        <figure>
                            <img id="indeximg3" src="images/reatau2.jpg" alt="zimmer" width="500">
                            <figcaption> Dessert</figcaption>
                        </figure>
                    </div>


                    <div class="col-25">
                        <figure>
                            <img id="indeximg4" src="images/bluebay.jpg" alt="zimmer" width="500">
                            <figcaption>SPA </figcaption>
                        </figure>
                    </div>
                </article>

            </div>

        </article>


    </main>
    <!-- <div class="clear">&nbsp;</div>
     -->



    <footer>
        <ul class="menu">
            <li class=" "> <a href="impressum.php">Impressum</a> </li>

            <li class=""><a href="mailto:service@royalhamamet.de">Email : service@royalhamamet.de</a></li>
            <li class=" "> <a href="datenschutz.php">Datenschutzerklärung</a> </li>
        </ul>
    </footer>



</body>

</html>