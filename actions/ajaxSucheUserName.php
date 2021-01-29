<?php

require_once '../config.php';
include('funktionen.php');

if ($_POST["suchbegriff"]) {

	$sql = "select * from wod
	inner join users on wod.userId = users.userId
	where users.userName like ('%" . mysqli_real_escape_string($conn, utf8_decode($_POST["suchbegriff"])) . "%')";

	$result = mysqli_query($conn, $sql);

	// Suchbegriff wird ausgegeben
	echo "Suche nach UserName: " . $_POST["suchbegriff"] . "<br/><br/>";
	echo "<div class='container_genwod'>";

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
		$user = $fetch['userName'];
		$cat = getColourDifficulty($difficulty);
		$pic = getWodPicture($equiSetId);
		$pic_style = getWodPictureStyle($equiSetId);
		$stars = getStars($rating);


?>

		<div class="card m-2 text-center" style="width:300px">
			<img class="card-img-top mx-auto" src=<?php echo $pic; ?> alt="category image" style="<?php echo $pic_style; ?>">
			<div class="card-body" style="background-color: <?php echo $cat; ?> ">
				<h4 class="card-title text-dark"><?php echo $name; ?></h4>
				<p class="card-text">Dauer: <?php echo $durationInMinutes; ?> Minuten</p>
				<p class="card-text">Kategorie: <?php echo $difficulty; ?></p>
				<h2><?php echo $stars; ?></h2>
				<p><?php echo $rating; ?> </p>
				<p class="card-text">von user <?php echo $user; ?> </p>
				<a href="../workouts/singleWod.php?wodId=<?php echo $wodId; ?>" class="btn button_bee"> Zum Workout</a>
			</div>
		</div>

<?php

		// $conn->close();
	}
	echo "</div>";
}
?>