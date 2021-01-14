<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>



    <nav class="navbar sticky-top navbar navbar-expand-sm navbar-dark" style="background-color: rgb(102, 102, 51)">

        <button class="navbar-toggler navbar-toggler-left btn-lg" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="container-nav collapse navbar-collapse" id="navbarTogglerDemo02">

            <div class="navbar-left">
                <img class="icon border" src="../images/icon/rudolf_glasses.png" />

            </div>

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="../index.php">home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="../workouts/wod.php">workouts</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="../diary/diary.php">tagebuch</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="../team.php">team</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="../contact.php">kontakt</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" role="button" href="https://www.instagram.com/elf.hanno/" target="_blank" style="color:white"><i class="fa fa-instagram"></i></a>
                </li>


            </ul>

            <div class="navbar-right">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link " href="../registration/login.php">login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../registration/register.php">signup</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="../registration/logout.php?logout">logout</a>
                    </li>

                    <div class="image">
                        <!-- <?php echo $userRow['userName']; ?> -->
                        <img class="icon" src="../images/icon/<?php echo $userRow['foto']; ?>" />
                    </div>
                </ul>
            </div>

        </div>

    </nav>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>



</html>