<?php
// Start the session
session_start();
require_once './versleutel.php';
?>

<html>
    <head>
        <title>ITPH  ingelogd welkom </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <?php
            $welkomstext = "Welkom ";
            $welkomstext .= $_SESSION['naam'];
            $welkomstext .= " met wachtwoord :  ";
            $welkomstext .= ontSleutel($_SESSION['ww']);


            echo "<h2> $welkomstext ";
            
            
            ?>
            <img   src=https://www.itph-facilitycenters.nl/assets/upload/default_logo/logo.png >

        </div>
    </body>
</html>
