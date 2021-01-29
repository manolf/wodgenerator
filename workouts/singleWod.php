<?php
ob_start();
session_start();
require_once '../config.php';

if (isset($_SESSION["user"])) {
    $res = mysqli_query($conn, "SELECT * FROM users WHERE userId=" . $_SESSION['user']);
    $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $userId = $_SESSION['user'];
}

if (isset($_SESSION['access_token'])) {
    $res = mysqli_query($conn, "SELECT * FROM users WHERE oauth_uid=" . $_SESSION['id']);
    $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $userId = $userRow['userId'];
}

//NAVBAR
include('../workouts/navbarWod.php');


if ($_GET['wodId']) {
    $wodId = $_GET['wodId'];

    $sql = "SELECT * FROM wod 
    inner join users on users.userId= wod.userId
    WHERE wod.wodId = $wodId 
                    ORDER BY wod.wodId ASC LIMIT 10
    ";

    $result = $conn->query($sql);
    $data = $result->fetch_assoc();



    $count = mysqli_num_rows($result);
    if ($count == 0) {
        // echo "oh nein...";
        "es sieht so aus, als gäbe es kein Wod mit dieser Id";
        header("Location: wod.php");
    }


    $conn->close();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - <?php echo $userRow['userEmail']; ?></title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script src="https://cdn.tiny.cloud/1/fyga9b2vms5na1vvgr2ey9wn6ms9d7ucfg44hszp3i61u8ll/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea2',
            placeholder: "Anzahl Wiederholungen, benötigte Zeit.. "

        });
    </script>
</head>

<body>

    <div class="container_single">

        <!-- <div class="left container my-5 z-depth-1 rounded bg-white">
    
            <section class="dark-grey-text">
                <div class="row pr-lg-5">
                    <div class="col-md-5 mb-4">
                        <div class="view">
                            <img src='../images/hanno.JPG' alt="elfPic" class="mt-4 rounded" style="width:300px;">
                        </div>
                    </div>
                    <div class="col-md-5 d-flex align-items-center mb-4">

                    </div>
                </div>
            </section>
        </div> -->


        <div class=" right container my-5 py-5 z-depth-1">
            <!--Section: Content-->
            <!-- <section class="px-md-5 mx-md-5 dark-grey-text text-center text-lg-right"> -->



            <div class="mx-auto">
                <h2 class="font-weight-bold pb-3 text-dark " Workoutdetails! </h2>

                    <div class="form-group">

                        <h3 class="text-secondary"><?php echo $data['wodName'] ?></h3>

                        <h5 class=''>
                            <?php echo $data['description'] ?>
                            <hr>

                            <?php
                            if ($data['link'] != '') {
                                echo ('Zusätzliche Infos bzw das Wod findest du <a target="_blank" href=' . $data['link'] . ' >hier. </a>');
                            } else {
                                echo " ";
                            }
                            ?>
                        </h5>

                        <h5>Mit diesem Workout tust du folgenden Teilen deines Körpers etwas Gutes:<br><br> <strong> <?php echo $data['trainedParts'] ?> </strong> <br><br>Super, nur weiter so!</h5>

                        <?php
                        if (isset($_SESSION["user"]) || isset($_SESSION["access_token"])) {

                        ?>

                            <hr>
                            <form action='rating.php' method='post'>

                                <label for="description" class="mt-3 text-secondary"> Kommentar zum Workout</label>
                                <textarea class="form-control" id="mytextarea2" rows="3" name="comment"></textarea>

                                <input type="hidden" name="wodId" value="<?php echo $data['wodId']; ?>" />


                                <input class="btn button_bee" type='submit' name="submit" value="Workout in Kalender eintragen" style="width:90%;" />

                            </form>




                        <?php
                        } else {

                            echo "<a class='btn button_bee m-2' href='wod.php' >Workout absolviert</a> ";
                        }

                        ?>

                        <hr>
                        <h5>

                            Dieses Workout wurde für dich von <a href="<?php echo $data['insta'] ?>" target="_blank"><?php echo $data['userName'] ?></a> bereitgestellt. <i class="fa fa-smile-o"></i> Du kannst dich gerne bei ihr/ihm dafür bedanken (oder beschweren)..

                        </h5>


                        </form>
                        <!-- </div> -->
                        <!--Grid column-->
                        <!--Grid column-->
                        <!-- <div class="col-lg-5 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
                <img src=<?php echo $data['icon'] ?> style="width: 300px; height: 300px" alt="">
            </div> -->
                        <!--Grid column-->
                        <!-- </div> -->
                        <!--Grid row-->

                        <!--Section: Content-->


                    </div>

            </div>

        </div>
    </div>

    <?php
    include('../footer.php');
    ?>

</body>

</html>