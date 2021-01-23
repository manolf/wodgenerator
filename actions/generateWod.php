<?php
ob_start();
session_start();
require_once '../config.php';

include('../workouts/navbarWod.php');


if ($_POST) {

    $difficulty = $_POST['difficulty'];
    $durationInMinutes = $_POST['durationInMinutes'];
    $equiSetId = $_POST['equipment'];
    $userId = $_SESSION['user'];


    echo $sql = "SELECT * FROM wod 
    WHERE difficulty $difficulty 
    and wod.equiSetId = $equiSetId
    and durationInMinutes $durationInMinutes 
     ORDER BY wod.wodId ASC LIMIT 11
    ";




    $result = $conn->query($sql);
    $data = $result->fetch_assoc();

    echo $count = mysqli_num_rows($result);

?>


    <div class="container_genwod">
        <!-- <div class="container row row-cols-md-2 row-cols-sm-3 row-cols-lg-4 row-col-xs-1 mx-auto"> -->

        <?php


        while ($fetch = mysqli_fetch_array($result)) {

            $wodId = $fetch['wodId'];
            $name = $fetch['wodName'];
            $equipment = $fetch['equipment'];
            $equiSetId = $fetch['equiSetId'];
            $trainedParts = $fetch['trainedParts'];
            $description = $fetch['description'];
            $durationInMinutes = $fetch['durationInMinutes'];
            $difficulty = $fetch['difficulty'];
            $link = $fetch['link'];
            $pic = '../images/icon/elefant.jpg';
            $cat = 'secondary';

            switch ($difficulty) {
                case 'easy':
                    $cat = 'success';
                    break;
                case 'intermediate':
                    $cat = 'warning';
                    break;
                case 'hard':
                    $cat = 'danger';
                    break;
                case 'crossfit':
                    $cat = 'primary';
                    break;
                default:
                    $cat = 'secondary';
            }

            switch ($equiSetId) {
                case 1:
                    $pic = '../images/icon/jumping-jacks.png';
                    $pic_style = "width: 158px; height: 195px";
                    break;
                case 2:
                    $pic = '../images/icon/pull-up.png';
                    break;
                case 3:
                    $pic = '../images/icon/boxjump.png';
                    break;
                case 4:
                    $pic = '../images/icon/ringrows.png';
                    break;
                case 5:
                    $pic = '../images/icon/kb_clean.png';
                    break;
                case 6:
                    $pic = '../images/icon/snatch.png';
                    break;
                case 7:
                    $pic = '../images/icon/ringrows.png';
                    break;
                case 8:
                    $pic = '../images/icon/deadlift.png';
                    break;
                case 9:
                    $pic = '../images/icon/wallballshot.png';
                    break;
                case 10:
                    $pic = '../images/icon/DU.png';
                    break;
                default:
                    $pic = '../images/icon/pig.jpg';
                    $pic_style = "width: 200px, height:200px";
            }

        ?>
            <div class="card m-2 text-center" style="width:300px">
                <img class="card-img-top mx-auto" src=<?php echo $pic; ?> alt="category image" style="<?php echo $pic_style; ?>">
                <div class="card-body bg-<?php echo $cat; ?>">
                    <h4 class="card-title"><?php echo $name; ?></h4>
                    <p class="card-text">Dauer: <?php echo $durationInMinutes; ?> Minuten</p>
                    <p class="card-text">Kategorie: <?php echo $difficulty; ?></p>
                    <p class="card-text">Rating:</p>
                    <a href="../workouts/singleWod.php?wodId=<?php echo $wodId; ?>" class="btn btn-primary"> Zum Workout</a>
                </div>
            </div>

        <?php

            // $conn->close();
        }

        ?>

    </div>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Welcome - <?php echo $userRow['userEmail']; ?></title>
        <link rel="stylesheet" href="../style.css">
    </head>

    <body style="background: white">




    <?php


    // Free result set
    mysqli_free_result($result);
    // Close connection
    mysqli_close($conn);
}
    ?>


    <script>
        var x = document.getElementById('workout');
        x.setAttribute("tabindex", 1);
        x.focus()
    </script>

    </body>

    </html>