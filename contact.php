<?php
require_once 'config.php';
include('navbar.php');
// include('jumbotron.php');

ob_start();
// session_start();


?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Contact us!</title>
    <link href="https://fonts.googleapis.com/css2?family=Fahkwang:wght@200&display=swap" rel="stylesheet">
</head>

<body>


    <div class="container-contact z-depth-1">


        <!--Section: Content-->
        <!-- <section class=" "> -->
        <!-- px-md-5 mx-md-5 text-center text-lg-left dark-grey-text -->

        <!--Grid row-->
        <div class="contact-left row ml-2 mt-4">

            <!--Grid column-->
            <div>
                <!-- class="col-lg-5 col-md-12 mb-0 mb-md-0" -->
                <h3 class="font-weight-bold">Redet Tacheles mit uns!</h3>

                <p class="text-muted">Huhu, jetzt seid ihr dran! <br> Wie gefällt euch unsere Seite? <br> Was brennt euch unter den Nägeln? <br><br>Was auch immer: lasst es uns wissen! Ihr könnt uns auch gerne eure eigenen Lieblingsworkouts schicken, dann teilen wir sie mit der Hanno Community :-) </p>

                <p><span class="font-weight-bold mr-2">Email:</span><a href="">feedback@fitmithanno.fun</a></p>

            </div>
            <!--Grid column-->
            <form action="./actions/createMessage.php" method="POST">
                <!--Grid column-->
                <div>
                    <!-- class="col-lg-7 col-md-12 mb-4 mb-md-0" -->


                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6">

                            <!-- Material outline input -->
                            <div class="md-form md-outline mb-0">
                                <input type="text" name="vorname" class="form-control">
                                <label for="vorname">Vorname</label>
                            </div>

                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">

                            <!-- Material outline input -->
                            <div class="md-form md-outline mb-0">
                                <input type="text" name="nachname" class="form-control">
                                <label for="nachname">Nachname</label>
                            </div>

                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!-- Material outline input -->
                    <div class="md-form md-outline mt-3">
                        <input type="email" name="email" class="form-control">
                        <label for="email">E-mail</label>
                    </div>
                    <br>

                    <!-- Material outline input -->
                    <div class="md-form md-outline">
                        <input type="text" name="subject" class="form-control">
                        <label for="subject">Worum gehts?</label>
                    </div>
                    <br>

                    <!--Material textarea-->
                    <div class="md-form md-outline mb-3">
                        <textarea name="message" class="md-textarea form-control" rows="3"></textarea>
                        <label for="message">Leg los - die Zeilen gehören dir!</label>
                    </div>

                    <button type="submit" class="btn ml-0 text-light" style="background-color:rgb(102, 102, 51)">Senden<i class=" fa fa-paper-plane ml-2" "></i></button>

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
</form>

        <!-- </section> -->
        <!--Section: Content-->

        <div class = " contact-right">
                            <img src=" ./images/hanno.png" style="width:452px; height:722px" alt="foto winkender Hanno">
                </div>


        </div>

        <?php
        include('footer.php');
        ?>
</body>

</html>