<?php


$conn = mysqli_connect('localhost', 'root', '', 'miniproject', 3307);
$query = "SELECT * FROM movies ORDER BY id DESC LIMIT 4";

// executes query
$results = mysqli_query($conn, $query);
echo '<br>';
while ($db_record = mysqli_fetch_assoc($results)) {
    echo '<div id=lastmovie>';
    echo '<div class="movie1">';
    echo '<img src="' . $db_record['poster'] . '" alt="">';
    echo "</div>";
    echo  '<br><a href="">' . $db_record['title'] . '</a>';
    echo '</div>';
}
/*if (mysqli_num_rows($results) != 0) {
    echo '<h2 class = "green"> found some movies </h2>';
} else {
    echo '<h2 class="red"> cannot find movies </h2>';
}*/