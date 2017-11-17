<?php
session_start();
?>



<?php
require_once 'versleutel.php';
require_once 'loginGegevens.php';
require_once 'objectPersoon.php';


$naam       = $_REQUEST['naam'];
$ww         = $_REQUEST['ww'];
$ww         = verSleutel($ww);
$adres      = $_REQUEST['adres'];
$woonplaats = $_REQUEST['woonplaats'];
$gender     = $_REQUEST['gender'];

$Persoon       = new persoon();
$serializeData = serialize($Persoon);

$connectie = new mysqli(DBSERVER, DBUSER, DBPASS, DBASE);
if (!$connectie->connect_error) {
    $sql = sprintf("SELECT * FROM personen  WHERE naam = '%s' ", $naam);
//    echo $sql;
    $result = mysqli_query($connectie, $sql);
    if ($result->num_rows == 0) {

        $query = "INSERT INTO `personen` (`naam`, `ww`, `adres`, `woonplaats`, `gender`,`objectPersoon`)"
        . " VALUES ( '$naam', '$ww','$adres', '$woonplaats','$gender' , '$serializeData' )";
//        echo $query;
        $result = $connectie->query($query);

    }
                
}
$_SESSION['naam'] = $naam;
$_SESSION['ww'] = ontsleutel($ww);

header("Location: index.php");


?>