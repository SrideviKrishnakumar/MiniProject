<?php


if (!empty($_POST['moviename'])) {
    trim($_POST['moviename']);
    $searchString = $_POST['moviename'];
    $conn = mysqli_connect('localhost', 'root', '', 'miniproject');
    $query = "SELECT * FROM movies WHERE title LIKE '%$searchString%'";

    // executes query
    $results = mysqli_query($conn, $query);
    while ($db_record = mysqli_fetch_assoc($results)) {

        echo '<div class="movie">';
        echo 'MovieTitle:   ' . $db_record['title']  . '<br>';
        echo 'Year of Release :   ' . $db_record['releaseYear'] . '<br>';
        echo "<img src='" . $db_record['poster'] . "' alt=''>" . '<br>';
        echo "</div>";
    }
    /*if (mysqli_num_rows($results) != 0) {
        echo '<h2 class = "green"> found some movies </h2>';
    } else {
        echo '<h2 class="red"> cannot find movies </h2>';
    }*/
}