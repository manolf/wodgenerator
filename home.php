<?php
ob_start();
session_start();
require_once 'config.php';

if ((!isset($_SESSION['user'])) && (!isset($_SESSION['access_token']))) {

    header("Location: index.php");
    exit;
}


if (isset($_SESSION["user"])) {
    $res = mysqli_query($conn, "SELECT * FROM users WHERE userId=" . $_SESSION['user']);
    $userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
    // echo "TEST LOGIN <br>";
    // echo     "<h2> Welcome " .  $userRow['userName'] . "</h2>";
    // $userId =  $userRow['userId'];
    // echo "<h3> userId: " .  $userId . "</h3>";
    // echo "<br> Test END";
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
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Welcome <?php echo $userRow['userName']; ?>!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tiny.cloud/1/fyga9b2vms5na1vvgr2ey9wn6ms9d7ucfg44hszp3i61u8ll/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            placeholder: "Beschreibung des Workouts"

        });
    </script>
    <script type="text/javascript" src="calendar.js"></script>

</head>

<body>

    <!-- <h4><a href="./registration/logout.php?logout">logout</a></h4>
    <h4><a href="index.php">index</a></h4>

    <hr> -->

    <h2>Überblicksseite von <?php echo $userRow['userName']; ?>
    </h2>

    <h3 class="text-success">absolvierte Trainings</h3>

    <?php
    // $res2 = mysqli_query($conn, "SELECT wod.wodId, wod.wodName, wod.difficulty, day.dayId
    // From calendar
    // inner join wod on calendar.wodId = wod.wodId
    // inner join users on calendar.userId = users.userId
    // inner join day on calendar.dayId = day.dayId
    // WHERE users.userId = $userId");

    // echo $count = mysqli_num_rows($res2);

    // if ($count != 0) {

    //     echo "table header <br>";
    //     while ($row = mysqli_fetch_assoc($res2)) {
    //         echo "day: " . $row['dayId'] .  " wod: " . $row['wodId'] . " - " . $row['wodName'] .  "<br>";
    //     }
    // }

    ?>

    <hr>


    <hr>
    <h3 class="text-success">Eigenes Workout erstellen</h3>

    <form action="./actions/createWod.php" method="POST">
        <div class="container font-weight-bold">

            <div class="form-group">
                <label for="wodName">Name: </label>
                <input type="text" class="form-control mb-3" name="wodName" placeholder="Name Workout" />

                <label for="equipment" class="mr-3">Equipment: </label>

                <select name='equipment'>

                    <?php

                    $sql2 = "SELECT equSet.equiSetId, e1.equipmentName as equiPart1, equSet.equiPart2,'',''
FROM equSet
inner join equipment e1 on equSet.equiPart1 = e1.equipmentId
WHERE  ! COALESCE(equiPart2,'')
UNION 
SELECT equSet.equiSetId, e1.equipmentName as equiPart1,  e2.equipmentName as equiPart2, '',''
from equSet
inner join equipment e1 on equSet.equiPart1 = e1.equipmentId
inner join equipment e2 on equSet.equiPart2 = e2.equipmentId
WHERE  ! COALESCE(equiPart3,'')
UNION 
SELECT equSet.equiSetId, e1.equipmentName as equiPart1,  e2.equipmentName as equiPart2, e3.equipmentName as equiPart3,''
from equSet
inner join equipment e1 on equSet.equiPart1 = e1.equipmentId
inner join equipment e2 on equSet.equiPart2 = e2.equipmentId
inner join equipment e3 on equSet.equiPart3 = e3.equipmentId  
WHERE  ! COALESCE(equiPart4,'')
UNION 
SELECT equSet.equiSetId, e1.equipmentName as equiPart1,  e2.equipmentName as equiPart2, e3.equipmentName as equiPart3,  e4.equipmentName as equiPart4
from equSet
inner join equipment e1 on equSet.equiPart1 = e1.equipmentId
inner join equipment e2 on equSet.equiPart2 = e2.equipmentId
inner join equipment e3 on equSet.equiPart3 = e3.equipmentId
inner join equipment e4 on equSet.equiPart4 = e4.equipmentId
WHERE  ! COALESCE(equiPart5,'')
ORDER BY `equiSetId` ASC";


                    $result2 = mysqli_query($conn, $sql2);
                    $count = mysqli_num_rows($result2);

                    echo "<option> ----Equipment wählen ----- </option>";
                    while ($row = mysqli_fetch_array($result2)) {

                        echo $equiSetId = $row['equiSetId'];
                        echo $e1 = $row['equiPart1'];
                        $e2 = $row['equiPart2'];
                        $e3 = $row['equiPart3'];
                        $e4 = $row['equiPart4'];



                        echo "<option value= $equiSetId name= 'equipment' class='form-control'> $equiSetId $e1 $e2 $e3 $e4</option>";
                    }
                    echo "</select>";



                    ?>
                </select><br><br>



                <label for="trainedParts">Muskelgruppen: </label>
                <input type="text" class="form-control mb-3" name="trainedParts" placeholder="Trained parts.. zum bsp: Bauchmuskel, Rücken, Oberschenkel.." />

                <label for="durationInMinutes">Dauer in Min: </label>
                <input type="text" class="form-control mb-3" name="durationInMinutes" placeholder="Dauer des Workouts in Min" />

                <label for="difficulty">Level: </label> <br>
                <select name="difficulty" id="level" class="mb-3">
                    <option> ---- Schwierigkeitsgrad ----- </option>
                    <option value="1" name='difficulty' class='form-control'> easy</option>
                    <option value="2" name='difficulty' class='form-control'> intermediate</option>
                    <option value="3" name='difficulty' class='form-control'> hard</option>
                    <option value="4" name='difficulty' class='form-control'> crossfit</option>
                    <option value="5" name='difficulty' class='form-control'> hanni</option>
                    <option value="6" name='difficulty' class='form-control'> later</option>
                </select>

                <br>

                <!-- <label for="points">Punkte: </label>
                <input type="text" class="form-control mb-3" name="points" placeholder="Punkte... zwischen 0 und 30" /> -->

                <label for="link">Link: </label>
                <input type="text" class="form-control mb-3" name="link" placeholder="eventuell: Link Youtube etc." />


                <label for="description" class="mt-3"> Beschreibung Workout</label>
                <textarea class="form-control" id="mytextarea" rows="10" name="description" placeholder="Description"></textarea>

                <!-- <input type="hidden" name="userId" value="<?php echo $data['wodId'] ?>" /> -->

                <input class="form-control btn btn-outline-success mt-3 mb-3" type="submit" name="submit" value="Add Workout" />

            </div>


        </div>



    </form>

    <hr>

    <h3>Absolviertes Workout in Kalender eintragen</h3>

    <table border=1 id='calendar'>
        <tr style='visibility:collapse;' hidden>
            <td colspan=7 id='date_memory'>---</td>
        </tr>
        <tr>
            <td class='calendar_head'><a class='calendar_link' href='javascript:prevMonth()'> &laquo;</a></td>
            <td colspan=5 class='calendar_head_month' id='calendar_month'>
                ---</td>
            <td class='calendar_head'><a class='calendar_link' href='javascript:nextMonth()'> &raquo;</a></td>
        </tr>
        <tr>
            <td class='calendar_day'>Mo</td>
            <td class='calendar_day'>Di</td>
            <td class='calendar_day'>Mi</td>
            <td class='calendar_day'>Do</td>
            <td class='calendar_day'>Fr</td>
            <td class='calendar_day'>Sa</td>
            <td class='calendar_day'>So</td>
        </tr>
        <tr>
            <td class='calendar_entry' id='calendar_entry_1'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_2'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_3'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_4'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_5'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_6'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_7'>-x-</td>
        </tr>
        <tr>
            <td class='calendar_entry' id='calendar_entry_8'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_9'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_10'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_11'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_12'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_13'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_14'>-x-</td>
        </tr>
        <tr>
            <td class='calendar_entry' id='calendar_entry_15'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_16'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_17'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_18'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_19'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_20'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_21'>-x-</td>
        </tr>
        <tr>
            <td class='calendar_entry' id='calendar_entry_22'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_23'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_24'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_25'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_26'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_27'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_28'>-x-</td>
        </tr>
        <tr>
            <td class='calendar_entry' id='calendar_entry_29'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_30'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_31'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_32'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_33'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_34'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_35'>-x-</td>
        </tr>
        <tr>
            <td class='calendar_entry' id='calendar_entry_36'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_37'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_38'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_39'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_40'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_41'>-x-</td>
            <td class='calendar_entry' id='calendar_entry_42'>-x-</td>
        </tr>
    </table>
    <br />
    <br />
    <form id='myform'>
        <input id='datum' size=30 />
    </form>



    <hr>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php
    include('footer.php');
    ?>

    <script type='text/javascript'>
        iniCalendar();

        /*0 = wie bisher, Datum wird in die Box geschrieben*/
        setReturnModus(1);
        /*1 = neu, Eventtext wird in die Box geschrieben
        Das event muss in der calendar.js in der Function
        getEventtext definiert werden.*/
        //setReturnModus(1);
    </script>



</body>

</html>