<?php
session_start();
require_once './versleutel.php';
?>

<html>
    <head>
        <title>ITPH  ingelogd welkom </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
#welkom {
text-align: center;
border: 3px solid green;                
}
            
        </style>
        
    </head>
    <body>
        <div id="welkom">
            <img   src=https://www.caict.nl/uploads/nieuws/logo-itph-academy.jpg   width="100% "> 
            <?php
            $welkomstext = "Welkom ";
            $welkomstext .= $_SESSION['naam'];
            $welkomstext .= " met wachtwoord :  ";
            $welkomstext .= $_SESSION['ww'];
            echo "<h2> $welkomstext ";
            ?>

        </div>
    </body>
</html>
