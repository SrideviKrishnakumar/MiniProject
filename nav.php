<?php
session_start();
if (isset($_POST['logout'])) {
    // session_unset();
    unset($_SESSION);
    header("Location: login.php");
}



$admin = $_SESSION['admin'];
if (isset($_POST['addmovie'])) {

    header("Location: addmovie.php");
}
if (isset($_POST['modifycat'])) {

    header("Location: modifycat.php");
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <nav>
        <ul>

            <li>
                <a href="main.php" class="box">HOME </a>
                <a href="categories.php?page=1" class="box">CATEGORIES </a>
                <!--<a href="insert.php" class='not_visible'>ADD_MOVIES </a> -->
                <form action="" method="post">
                    <input type="submit" name='addmovie' value='ADD MOVIES' <?php

                                                                            if (!$admin) {
                                                                                echo 'disabled =disabled';
                                                                            }  ?>>

                    <input type="submit" name='modifycat' value='MODIFY CATEGORIES' <?php

                                                                                    if (!$admin) {
                                                                                        echo 'disabled =disabled';
                                                                                    }  ?>>
                </form>

            </li>
            <li>
                <!-- <a href="" class="box">Login</a>
                <a href="" class="box">Register</a>  -->
                <form action="" method='POST'>
                    <input type="submit" value="LOGOUT" name='logout'>
                </form>

            </li>

        </ul>
        <hr>
        <hr>
    </nav>
    <!--<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    <script>
        // Wait for the dom to be loaded/ready before executing javascript
        $(function() {

            $('#addmovie').click(function(e) {
                // e.preventDefault();
                header("location : addmovie.php");

                /* $.ajax({
                     url: 'addmovie.php',
                     method: 'post'

                 }).done(function(result) {
                     // If ajax call worked
                     console.log('SUCCESS : ' + result);
                     header("location")
                     //$('#result').html(result);
                     //$('#result').append(result);
                 }).fail(function(result) {
                     // If AJAX failed
                     console.log('AJAX ERROR');
                 }); */
            });
        });
    </script> -->
</body>


</html>