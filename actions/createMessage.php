<?php
ob_start();
session_start();
include('../workouts/navbarWod.php');
// include('jumbotron.php');
require_once '../config.php';

if ($_POST) {

    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    $sql = "INSERT into messages (vorname, nachname, email, subject, message)  values ('$vorname', '$nachname','$email', '$subject','$message')";

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../style.css">
        <title>Feedback</title>
    </head>

    <body>

    </body>


    </html>


<?php


    if ($conn->query($sql) === TRUE) {
        echo "<div class= 'text-dark pt-2 pb-2'>";
        echo "<p><center><b>Vielen Dank für deine Message!</b></center></p>";
        echo "<p><center><b><Wir haben dein Feedback erhalten</b></center></p>";
        // header("refresh:2; url=../home.php");

        echo " <center><img src='../images/rudolf.png' alt='rudi'style='width:276px; height:463px' ></center>";
        echo "<br><br><center><a href='../home.php'><button type='button' class='btn btn-outline-success'>keine Ursache!</button></a></center>";
        echo "</div>";

        echo "</div>";
    } else {
        echo "Error " . $sql . ' ' . $conn->connect_error;
    }

    include('../footer.php');
    $conn->close();
}

?>