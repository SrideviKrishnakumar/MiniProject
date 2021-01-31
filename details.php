<?php
require_once("database.php");
require_once("nav.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/details.css">
</head>

<body>
    <Section>
        <?php
        $id = $_GET["id"];
        $query = "SELECT * FROM movies INNER JOIN categories ON categories.id =movies.category_id where movies.id = $id";
        $query2 = "SELECT firstName, lastName FROM `actors` inner join movie_actors on movie_actors.actors_id = actors.id inner JOIN movies ON movie_actors.movie_id = movies.id where movies.id = $id";
        $result = mysqli_query($conn, $query);
        $result2 = mysqli_query($conn, $query2);
        $db_records = mysqli_fetch_assoc($result);
        echo "<div class='left'>";
        echo '<img src="' . $db_records["poster"] . '" alt="">';
        echo '<p>Released the year ' . $db_records["releaseYear"] . '</p>';
        echo '</div>';
        echo '<div class="right">';
        echo '<div class="flex">';
        echo '<a href="' . $db_records["moviePath"] . '">' . $db_records["title"] . '</a>';
        echo '<p>' . $db_records["name"] . '</p>';
        echo "</div>";
        echo '<p>' . $db_records["description"] . '</p>';
        echo '<h2>Actors and actresses</h2>';
        echo '<ul>';
        while ($db_records2 = mysqli_fetch_assoc($result2)) {
            echo '<li>' . $db_records2["firstName"] . ' ' . $db_records2["lastName"] . '</li>';
        }
        echo '<p>Moviepath: ' . $db_records["moviePath"] . '</p>';
        echo '</div>';


        ?>
        </ul>
    </Section>
</body>

</html>