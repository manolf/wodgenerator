<?php
ob_start();
session_start();
require_once '../config.php';

// // if session is not set this will redirect to login page
// if (!isset($_SESSION['admin']) && !isset($_SESSION['user']) && !isset($_SESSION['superadmin'])) {
//     header("Location: index.php");
//     exit;
// }
// if (isset($_SESSION["user"])) {
//     header("Location: home.php");
//     exit;
// }
// // select logged-in users details

// if (isset($_SESSION["admin"])) {

//     $res = mysqli_query($conn, "SELECT * FROM users WHERE userId=" . $_SESSION['admin']);
//     $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
// }

// if (isset($_SESSION["superadmin"])) {

//     $res = mysqli_query($conn, "SELECT * FROM users WHERE userId=" . $_SESSION['superadmin']);
//     $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

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
    <title>Welcome - <?php echo $userRow['userEmail']; ?></title>
    <link rel="stylesheet" type="text/css" href="../style.css">
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
                <h2 class="font-weight-bold pb-3 " Workoutdetails! </h2>

                    <div class="form-group">

                        <h3 class="text-success"><?php echo $data['wodName'] ?></h3>

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

                        <form action='wod.php' method='post'>
                            <!-- <h5>Hurra, ich habe es geschafft!
                  </h5> -->
                            <input class='btn btn-outline-danger m-2' type='submit' name='insertWod' value='Workout absolviert' />

                            <input type="hidden" name="wodId" value="<?php echo $data['wodId'] ?>" />
                            <input type="hidden" name="dayId" value="<?php echo $data2['dayId'] ?>" />
                            <!-- <p><?php echo $data2['dayId'] ?></p> -->
                        </form>
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



</body>

</html>