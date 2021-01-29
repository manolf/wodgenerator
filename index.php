<?php

// include('./workouts/navbarWod.php');
// include('jumbotron.php');

ob_start();
session_start();
require_once 'config.php';

if (isset($_SESSION["user"])) {
    $res = mysqli_query($conn, "SELECT * FROM users WHERE userId=" . $_SESSION['user']);
    $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
}

if (isset($_SESSION['access_token'])) {
    $res = mysqli_query($conn, "SELECT * FROM users WHERE oauth_uid=" . $_SESSION['id']);
    $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
}

include('navbar.php');

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title> Fit mit Hanno - mit Elfenpower durchs Jahr</title>
    <meta name="copyright" content="Manuela Thamer, Orsolya Veres">
    <meta name="description" content="Der Trainingskalender mit individuellen Workouts je nach Fitnesslevel, Tagesverfassung und Zeitaufwand begleitet von Elf Hanno und Rentier Rudolf">
    <meta name="keywords" content="fitmithanno fitmithanno.fun workout kalender wodgenerator Elf Hanno">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

    <div class=" container my-5 z-depth-1 rounded border">
        <!--Section: Content-->
        <section class="dark-grey-text">

            <div class="row pr-lg-5">
                <div class="col-md-7 mb-4">

                    <div class="view">
                        <img src='./images/rubi_colored.gif' alt="hanno" style="width: 475px; height: 564px" class="img-fluid rounded">
                    </div>

                </div>
                <div class="col-md-5 d-flex align-items-center mb-4">
                    <div>

                        <h3 class="font-weight-bold mb-4"> Willkommen...</i> </h3>



                        <p>..hast du dich je gefragt, was die Nordpolbewohner außerhalb der Weihnachtssaison so treiben? <br>Wir wissen, was Rudi so tut. Aber was machen denn die Elfen? <br><br> <strong>Hanno</strong> hat seine neue Leidenschaft für Sport entdeckt und will jetzt auch unterm Jahr fleißig trainieren, weil: nach Weihnachten ist vor Weihnachten! </p>


                        Um seiner neuen sportlichen Begeisterung den Weg zu ebnen gibt es nun folgende <strong> neue Features </strong> auf unserer Seite:
                        <ul>
                            <li> <a href="./workouts/wod.php">Workoutgenerator</a></li>
                        </ul>

                        Hol dir dein maßgeschneidertes Wod! <br>

                        <!-- <p> Sei dabei und begleite Hanno auf seinem sportlichen Weg durchs Jahr!</p> -->

                        Für eingeloggte UserInnen planen wir außerdem ein
                        <ul>
                            <!-- <li> <a href="./workouts/wod.php">Workoutgenerator</a></li> -->
                            <li><a href="./diary/diary.php">Trainingstagebuch.</a></li>
                        </ul>

                        Dies alles kannst du kostenlos nutzen!

                        <!-- <a href="./registration/login.php" type="button" class="btn btn-primary btn-lg mt-4">LOGIN</a>
 -->


                    </div>
                </div>
            </div>

        </section>
        <!--Section: Content-->
    </div>


    <!-- <div class="container-warning">
        <section>

            <div>
                <img id="licht" src="./img/lichterkette.png" alt="radschlagender Hanno">
            </div>

        </section>
    </div> -->


    <?php
    include('footer.php');
    ?>


</body>

</html>