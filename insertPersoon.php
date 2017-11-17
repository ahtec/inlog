<?php
session_start();
?>

<html>
    <head>
        <title>Invoeren persoon</title>  
        <link rel = "stylesheet" type = "text/css" href="deCss.css">  
        
    </head>
    <h2> Invoeren persoon</h2>
    <hr>

    <?php
    require_once 'versleutel.php';
    require_once 'loginGegevens.php';
//print_r( $_SESSION);
    $naamPersoon = $_SESSION['naam'];
    $wwPersoon   = $_SESSION['ww'];

    echo "<div>  Hallo $naamPersoon ";
    ?>

    <table><tr> <td>
                <form name="personenForm" action="stoorPersoon.php" onsubmit="return validate(this) method="POST"" >
                    <?php
                    echo "<tr> <td> Naam           </td> <td>  <input type=text name=naam value= $naamPersoon >  </td>";
                    echo "<tr> <td> wachtwoord     </td> <td>  <input type=text name=ww value=" . $wwPersoon . ">  </td>";
                    ?>
                    <tr> <td> Adres          </td> <td>  <input type="text" name="adres" ></td>
                    <tr> <td> Woonplaats     </td> <td>  <input type="text" name="woonplaats" ></td>
                    <tr> <td>   
                            <input type="radio" name="gender" value="male" checked> Male <br>
                            <input type="radio" name="gender" value="female">       Female<br>
                        </td>
                    <br>
                    <input type="submit" value="bewaar persoon" id=naambestaatalKnop">
                </form> 
    </table>


</div>









<!--header("Location: index.php?errorTxt=$errorTxt ");-->

</html>
