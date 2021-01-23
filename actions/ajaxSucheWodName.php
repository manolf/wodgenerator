<?php
// Verbindung
$server = "localhost";
$benutzername = "root";
$passwort = "";
$datenbank = "xmas";

// Server Verbindung herstellen
$conn = mysqli_connect($server, $benutzername, $passwort, $datenbank) or
    die("Keine Verbindung moeglich");

// Datenbank Verbidung
// mysqli_select_db($datenbank) or
// die ("Die Datenbank existiert nicht");

$tabelle = "wod";

if ($_POST["suchbegriff"]) {
    // Mysql Abfrage wird gespeichert mit den Notwendigen Parameter
    // $sql = "SELECT * FROM ".$tabelle." WHERE wodName LIKE ('%".mysql_real_escape_string(utf8_decode($_POST["suchbegriff"]))."%')";

    $sql = "SELECT * FROM " . $tabelle . " WHERE wodName LIKE ('%" . mysqli_real_escape_string($conn, utf8_decode($_POST["suchbegriff"])) . "%')";

    // Mysql Abfrage wird durchgeführt
    $result = mysqli_query($conn, $sql);

    // Suchbegriff wird ausgegeben
    echo "Sie suchten nach: " . $_POST["suchbegriff"] . "<br/><br/>";
    echo "<div class='container_genwod'>";

    // Ergebnis wird ausgegeben mit Zeilenumbruch
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
    echo "</div>";
}
?>

<!-- 

			echo "<br>Workout-Name: ";
			echo utf8_encode($row->wodName);
			echo "<br>Dauer in Minuten: ";
			echo utf8_encode($row->durationInMinutes);
			echo "<br> category: ";
			echo utf8_encode($row->difficulty);


			echo "<br/>";		 -->