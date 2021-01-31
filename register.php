<?php
require_once "database.php";
$error = "";
$error1 = "";
$error2 = "";
$error3 = "";
$error4 = "";
$error5 = "";
$email = "";
$pass = "";
$passCheck = "";
$fname = "";
$lname = "";
$found = false;
$founde = false;
$foundp = false;
$foundpl = false;
$foundf = false;
$foundl = false;
$foundcheck = false;
if ($conn) {
    $query = "SELECT * FROM users";
    if (isset($_POST["login"])) {
        $error = "";
        $results = mysqli_query($conn, $query);
        $pass = htmlspecialchars(trim($_POST["pass"]));
        $passCheck = htmlspecialchars(trim($_POST["passCheck"]));
        $hashedpass = password_hash($pass, PASSWORD_DEFAULT);
        $email = strip_tags(trim($_POST["email"]));
        $fname = strip_tags(trim($_POST["firstName"]));
        $lname = trim($_POST["lastName"]);


        if ($fname == "") {
            $foundf = true;
        }
        if ($lname == "") {
            $foundl = true;
        }
        if ($pass == "") {
            $foundp = true;
        }
        if (strlen($pass) < 8) {
            $foundpl = true;
        }
        if ($pass != $passCheck) {
            $foundcheck = true;
        }
        if ($email == "") {
            $founde = true;
        } else {
            while ($db_records = mysqli_fetch_assoc($results)) {
                if ($email == $db_records["email"]) {
                    $found = true;
                }
            }
        }
        if ($foundf) {
            $error1 = "Please insert your Firstname.";
        }
        if ($foundl) {
            $error2 = "Please insert your Lastname.";
        }
        if ($founde) {
            $error3 = "Please insert a Email.";
        } else if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error3 = "Please insert a valid Email.";
        }
        if ($foundp) {
            $error4 = "Please insert your Password.";
        }
        if ($foundpl) {
            $error4 = "Password in not long enough.";
        }
        if ($foundcheck) {
            $error5 = "Both Passwords are not the same.";
        }
        if (!$found && !$foundf  && !$foundl && !$founde && !$foundp && !$foundcheck) {
            $query2 = "INSERT INTO users (firstName, lastName, email, password) VALUES ( '" . $fname . "','" . $lname . "','" .  $email . "', '" .  $hashedpass .  "')";
            $results = mysqli_query($conn, $query2);
            header("Location: login.php");
        } else {
            $error = "NO UNIQUE USER";
        }
    }
} else {
    echo "<h1>NOT CONNECTED</h1>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/logister.css">
</head>

<body>
    <h3> </h3>
    <div class="box">
        <h1>REGISTER NEW ACCOUNT</h1>
        <h2 class="alert"><?= $error ?></h2>
        <form action="" method="post">
            <input type="text" name="firstName" value="<?= $fname ?>" placeholder="Firstname">
            <p><?= $error1 ?></p>

            <input type="text" name="lastName" value="<?= $lname ?>" placeholder="Lastname">
            <p><?= $error2 ?></p>

            <input type="email" name="email" value="<?= $email ?>" placeholder="E-Mail Address">
            <p><?= $error3 ?></p>

            <input type="password" name="pass" value="<?= $pass ?>" placeholder="Password">
            <p><?= $error4 ?></p>

            <input type="password" name="passCheck" value="<?= $passCheck ?>" placeholder="Repeat Password">
            <p><?= $error5 ?></p>

            <input type="submit" name="login" value="REGISTER">
        </form>
        <br><br>
        <form action="login.php" method="post">
            <input type="submit" value="Login">
        </form>
    </div>
</body>

</html>