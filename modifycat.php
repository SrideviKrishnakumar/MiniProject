<?php
require_once "nav.php";
/*if (isset($_POST["add"])) {
    require_once "database.php";
$id = $_POST["id"];
$name = $_POST["name"];
if ($_POST["id"] > 0) {
    $query = "UPDATE categories SET name =$name WHERE id =$id";
    $result = mysqli_query($conn, $query);
    echo $result;
} else {
    $query = "INSERT INTO categories(name) VALUES ($name)";
    $result = mysqli_query($conn, $query);
    echo $result;
}
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/modcat.css">
</head>

<body>
    <header>
        <form action="">
            <select name="categories" id="cat">
                <option value="0">Create new Category</option>
            </select>
            <label for="select">Choose Category</label>

            <input type="submit" id="choose" name="choose" value="Submit">
        </form>
    </header>
    <form id="app" method="post">

    </form>
    <div class="text"></div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="scripts/modifycat.js"></script>
</body>

</html>