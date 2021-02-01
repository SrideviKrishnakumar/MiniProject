<?php
require_once "database.php";
session_start();
$error = "";
$email = "";
$pass = "";
if ($conn) {
    $query = "SELECT * FROM users";
    if (isset($_POST["login"])) {
        $error = "";
        $results = mysqli_query($conn, $query);
        $pass = htmlspecialchars(trim($_POST["pass"]));
        $email = trim($_POST["email"]);
        $founde = false;
        $foundp = false;
        $foundb = false;
        while ($db_records = mysqli_fetch_assoc($results)) {
            if ($email == $db_records["email"]) {
                $founde = true;
            }
            if (password_verify($pass, $db_records["password"])) {
                $foundp = true;
            }
            if (password_verify($pass, $db_records["password"]) && $email == $db_records["email"]) {
                $foundb = true;
            }
        }



        if (!$founde) {
            $error = "WRONG EMAIL";
        } else if (!$foundp) {
            $error = "WRONG PASSWORD";
        } else if (!$foundb) {
            $error = "PASSWORD AND EMAIL DONT MATCH";
        } else {

            //var_dump($_SESSION);
            $_SESSION["username"] = "";
            $_SESSION['last_activity'] = strtotime("now");
            $query = 'SELECT * FROM users where email="' . $email . '"';
            $results = mysqli_query($conn, $query);
            $db_records = mysqli_fetch_assoc($results);
            $_SESSION["id"] = $db_records["id"];
            $_SESSION["username"] = $db_records["firstName"] . " " . $db_records["lastName"];
            $_SESSION["admin"] = $db_records["admin"];
            header("Location: main.php");
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
    </style>
</head>

<body>
    <h3> </h3>
    <div class="box">
        <h1>LOG IN</h1>
        <h1 class="alert"><?= $error ?></h1>
        <form action="" method="post">
            <input type="email" name="email" value="<?= $email ?>" placeholder="Email">
            <br>
            <input type="password" name="pass" value="<?= $pass ?>" placeholder="Password">
            <br>
            <input type="submit" name="login" value="LOG IN">
        </form>
        <br>
        <br>
        <form action="register.php" method="post">
            <input type="submit" value="Register">
        </form>
    </div>
</body>

</html>