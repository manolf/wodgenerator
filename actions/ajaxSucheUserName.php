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

if ($_POST["suchbegriff"]) {
	// Mysql Abfrage wird gespeichert mit den Notwendigen Parameter
	// $sql = "SELECT * FROM ".$tabelle." WHERE wodName LIKE ('%".mysql_real_escape_string(utf8_decode($_POST["suchbegriff"]))."%')";

	$sql = "select * from wod
	inner join users on wod.userId = users.userId
	where users.userName like ('%" . mysqli_real_escape_string($conn, utf8_decode($_POST["suchbegriff"])) . "%')";

	// select * from wod
	// inner join users on wod.userId = users.userId
	// where users.userName like 'ors%'
	// or users.userEmail like 'admi%'


	// Mysql Abfrage wird durchgeführt
	$result = mysqli_query($conn, $sql);

	// Suchbegriff wird ausgegeben
	echo "Sie suchten nach: " . $_POST["suchbegriff"] . "<br/><br/>";

	// Ergebnis wird ausgegeben mit Zeilenumbruch
	while ($row = mysqli_fetch_object($result)) {
		echo "<br>Workout-Name: ";
		echo utf8_encode($row->wodName);
		echo "<br>Dauer in Minuten: ";
		echo utf8_encode($row->durationInMinutes);
		echo "<br> category: ";
		echo utf8_encode($row->difficulty);
		echo "<br> workout by: ";
		echo utf8_encode($row->userName);


		echo "<br/>";
	}
}
