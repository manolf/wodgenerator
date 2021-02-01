<?php
ob_start();
session_start();
require_once '../config.php';

include('../workouts/navbarWod.php');
include('funktionen.php');


if ($_POST) {

    $difficulty = $_POST['difficulty'];
    $durationInMinutes = $_POST['durationInMinutes'];
    $userId = $_SESSION['user'];

    //old: single select
    // $equiSetId = $_POST['equipment'];

    //new: multiselect
    $equiSetId = "";

    // Check if any option is selected 
    if (isset($_POST["equipment"])) {

        // Retrieving each selected option 
        foreach ($_POST['equipment'] as $equipment)
            //print "You selected $equipment<br/>";
            $equiSetId .= $equipment . ",";
    } else {
        echo "Bitte Equipment auswählen!";
    }

    $equiSetId = " in (" . substr_replace($equiSetId, "", -1) . ")";


    echo $sql = "SELECT wod.*, AVG(rating) as 'rating' FROM wod
    left join rating on rating.wodId = wod.wodId
    inner join equset on wod.equiSetId = equset.equiSetId
    WHERE difficulty $difficulty 
    and (wod.equiSetId $equiSetId
    or equiPart1 $equiSetId
    or equiPart2 $equiSetId
    or equiPart3 $equiSetId )
    and durationInMinutes $durationInMinutes
    GROUP BY wod.wodId
    limit 15
    ";

    $result = $conn->query($sql);
    echo $count = mysqli_num_rows($result);

?>


    <div class="container_genwod">

        <?php

        if ($count >= 1) {

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
                $rating = $fetch['rating'];

                if ($rating == "") {
                    $rating = 0.001;
                }
                $cat = getBGColor($difficulty);
                $picData = getPictureData($equiSetId);
                $pic = $picData[0];
                $pic_style = $picData[1];
                $stars = getStars($rating);



        ?>


                <div class="card m-2 text-center" style="width:300px">
                    <img class="card-img-top mx-auto" src=<?php echo $pic; ?> alt="category image" style="<?php echo $pic_style; ?>">
                    <div class="card-body" style="background-color: <?php echo $cat; ?> ">
                        <h4 class="card-title text-dark"><?php echo $name; ?></h4>
                        <p class="card-text">Dauer: <?php echo $durationInMinutes; ?> Minuten</p>
                        <p class="card-text">Kategorie: <?php echo $difficulty; ?></p>
                        <h2><?php echo $stars; ?></h2>
                        <!-- <p><#?php echo $rating; ?> </p> -->
                        <a href="../workouts/wodDetail.php?wodId=<?php echo $wodId; ?>" class="btn button_bee"> Zum Workout</a>

                    </div>
                </div>

            <?php

                // $conn->close();
            }
        } else {

            //echo "nur ein wod";
            $data = $result->fetch_assoc();

            $wodId = $data['wodId'];
            $name = $data['wodName'];
            $equipment = $data['equipment'];
            $equiSetId = $data['equiSetId'];
            $trainedParts = $data['trainedParts'];
            $description = $data['description'];
            $durationInMinutes = $data['durationInMinutes'];
            $difficulty = $data['difficulty'];
            $link = $data['link'];
            $picData = getPictureData($equiSetId);
            $pic = $picData[0];
            $pic_style = $picData[1];
            $cat = getBGColor($difficulty);
            $stars = getStars($rating);



            ?>
            <div class="card m-2 text-center" style="width:300px">
                <img class="card-img-top mx-auto" src=<?php echo $pic; ?> alt="category image" style="<?php echo $pic_style; ?>">
                <div class="card-body bg-<?php echo $cat; ?>">
                    <h4 class="card-title"><?php echo $name; ?></h4>
                    <p class="card-text">Dauer: <?php echo $durationInMinutes; ?> Minuten</p>
                    <p class="card-text">Kategorie: <?php echo $difficulty; ?></p>
                    <p class="card-text">Rating:</p>
                    <a href="../workouts/wodDetail.php?wodId=<?php echo $wodId; ?>" class="btn btn-primary"> Zum Workout</a>
                </div>
            </div>

        <?php
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