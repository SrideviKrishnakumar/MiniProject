<?php
require_once("nav.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <main>

        <section>
            <article>
                <h1> TIME PASS</h1>

                <p> TimePass Inc. is an NumericAll technology and media services provider and production company headquartered in Luxembourg.
                    TimePass was founded in 2020 by Emile and Sridevi. The company's primary business is its
                    subscription-based streaming service which offers online streaming of a library of films and television series, including those produced in-house. As of Nov 2020, TimePass had over 193 million paid subscriptions worldwide, including 73 million in the United States. It is available worldwide except in the following: mainland China, Syria, North Korea, and Crimea. The company also has offices in France, the United Kingdom, Brazil, the Netherlands, India, Japan, and South Korea.
                    TimePass is a member of the Motion Picture Association. Today, the company produces and distributes content from countries all over the globe.</p>
            </article>
            <article id='list'>
                <input type="text" name="search" id='search' placeholder="SEARCH FOR A MOVIE HERE" class="size">
            </article>
            <div id='result'></div>

            <div id='result1'></div>

            <div id='result2'></div>


        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>
    <script>
        // Wait for the dom to be loaded/ready before executing javascript
        $(function() {

            $('#search').keyup(function(e) {
                // e.preventDefault();

                $.ajax({
                    url: 'search.php',
                    method: 'post',
                    data: {
                        moviename: $('#search').val() // can be used as $(this)
                    }

                }).done(function(result) {
                    // If ajax call worked
                    console.log('SUCCESS : ' + result);
                    $('#result').html(result);
                    //$('#result').append(result);
                }).fail(function(result) {
                    // If AJAX failed
                    console.log('AJAX ERROR');
                });
            });


            $.ajax({
                url: 'categorylist.php',
                method: 'post'

            }).done(function(result1) {
                // If ajax call worked
                console.log('SUCCESS : ' + result1);
                $('#result1').append(result1);

            }).fail(function(result1) {
                // If AJAX failed
                console.log('AJAX ERROR');
            });

            $.ajax({
                url: 'movielist.php',
                method: 'post'

            }).done(function(result2) {
                // If ajax call worked
                console.log('SUCCESS : ' + result1);
                $('#result2').append(result2);

            }).fail(function(result2) {
                // If AJAX failed
                console.log('AJAX ERROR');
            });


        });
    </script>

</body>

</html>