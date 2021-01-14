<?php
include('navbarWod.php');
// include('jumbotron.php');
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title> Workouts - Überblick</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fahkwang:wght@200&display=swap" rel="stylesheet">
</head>

<body>

    <div class=" container my-5 z-depth-1 rounded border">
        <!--Section: Content-->
        <section class="dark-grey-text">

            <div>
                <!-- <div class="col-md-7 mb-4">

                    <div class="view">
                        <img src='./images/hanno.JPG' alt="hanno" style="width: 475px; height: 564px" class="img-fluid rounded">
                    </div>

                </div> -->
                <div>
                    <div>

                        <h3 class="font-weight-bold mb-4"> Nun wird es sportlich..</i> </h3>

                        <br>
                        <p>Hier nun ein Überblick, was du alles machen kannst: </p>
                        <h3>Workout wählen</h3>
                        <p>Du hast Zugriff auf alle Workouts der Datenbank. Mit dem Workoutfilter kannst du nach folgenden Kriterien filtern: </p>


                        <li> <strong>Zeitdauer:</strong> Hier ist alles möglich zwischen extrakurz und zeitfüllend</li>
                        <li> <strong>Level</strong> Hier gibt es die Kategorien easy, moderat, fortgeschritten und crossfit</li>
                        <li> <strong>Equipment</strong> Du hast Lust auf ein bestimmtes Trainingsgerät wie Kettlebell, Hantel, Springschnur, etc..</li>
                        <li> <strong>Mitglied</strong> Du möchtest workouts eines bestimmten Members filtern?</li>
                        </ul>

                        <br><br>

                        <h3>Eigene Workouts erstellen</h3>
                        <p>Hier kannst du deine eigenen Workouts eintragen und speichern!</p>

                        <br><br>

                        <h3> Ranglisten erstellen, Matching mit FreundInnen</h3>

                        <p>Fordere deine FreundInnen heraus, ein Workout zu absolvieren!</p>
                        <p>Teile deinen Kalender mit ihnen, um sie anzuspornen! </p>

                        <h3>Workouts raten</h3>
                        <p>Hier kannst du Feedback geben, wie dir ein Workout gefallen hat:

                        <ul>Verteile Sterne:
                            <li> <strong>4 Sterne:</strong> Mein neues Lieblingsworkout!</li>
                            <li> <strong>3 Sterne:</strong> gefällt dir!</li>
                            <li> <strong>3 Sterne:</strong> nicht so ganz meins..</li>
                            <li> <strong>1 Stern:</strong> NEVER AGAIN!</li>
                        </ul>

                        Außerdem hast du noch ein Feedbackfeld, um genau anzubringen, was dir gefällt bzw nicht gefällt:
                        War es zu anstrengend? <br>
                        Passt es besser in eine andere Kategorie? <br>

                        </p>


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


    <?php include('../footer.php'); ?>


</body>

</html>