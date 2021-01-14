<?php
include('navbar.php');
// include('jumbotron.php');

// ob_start();
// session_start();
// require_once 'config.php';


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title> Fit mit Hanno - mit Elfenpower durchs Jahr</title>
    <meta name="copyright" content="Manuela Thamer, Orsolya Veres">
    <meta name="description" content="Der Trainingskalender mit individuellen Workouts je nach Fitnesslevel, Tagesverfassung und Zeitaufwand begleitet von Elf Hanno und Rentier Rudolf">
    <meta name="keywords" content="fitmithanno fitmithanno.fun workout kalender wodgenerator Elf Hanno">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fahkwang:wght@200&display=swap" rel="stylesheet"> -->
</head>

<body>

    <div class=" container my-5 z-depth-1 rounded border">
        <!--Section: Content-->
        <section class="dark-grey-text">

            <div class="row pr-lg-5">
                <div class="col-md-7 mb-4">

                    <div class="view">
                        <img src='./images/hanno.JPG' alt="hanno" style="width: 475px; height: 564px" class="img-fluid rounded">
                    </div>

                </div>
                <div class="col-md-5 d-flex align-items-center mb-4">
                    <div>

                        <h3 class="font-weight-bold mb-4"> Willkommen...</i> </h3>

                        <br>

                        <p>..hast du dich je gefragt, was die Elfen außerhalb der Weihnachtssaison so treiben? <br><br>So ganz genau werden wir es wohl nie erfahren - aber zumindest einer unter ihnen lässt uns ein bisschen daran Anteil haben: <strong>Hanno</strong> hat sich dazu entschlossen, auch übers Jahr fleißig zu trainieren, um seinen Platz bei der Weihnachtsbrigade zu sichern! </p>

                        <br>
                        Um seiner neuen sportlichen Begeisterung den Weg zu ebnen gibt es nun folgende <strong> neue Features </strong> auf unserer Seite:
                        <ul>

                            <li> <a href="./workouts/wod.php">Workoutgenerator</a></li>
                            <li><a href="./diary/diary.php">Trainingstagebuch</a></li>
                        </ul>

                        Diese kannst du kostenlos als eingeloggter User nutzen.<br>
                        <a href="./registration/login.php" type="button" class="btn btn-primary btn-lg mt-4">LOGIN</a>

                        <!-- <p> Sei dabei und begleite Hanno auf seinem sportlichen Weg durchs Jahr!</p> -->




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