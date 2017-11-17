<?php

// Start the session
session_start();

require_once 'versleutel.php';
require_once 'loginGegevens.php';
$returnText = "";

$naam = $_REQUEST['naam'];
$ww = $_REQUEST['ww'];
$ww = verSleutel($ww);


$_SESSION["naam"] = $naam;
$_SESSION["ww"] = $ww;

print_r($_SESSION);
$connectie = new mysqli(DBSERVER, DBUSER, DBPASS, DBASE);
if (!$connectie->connect_error) {
    $sql = sprintf("SELECT * FROM personen WHERE naam = '%s' and ww = '%s'", $naam, $ww);
    echo $sql;
    $result = mysqli_query($connectie, $sql);
    if ($result->num_rows == 0) {
        //user met ww niet gevonden
        // zoeken of naam user voorkomt
        $sql = sprintf("SELECT * FROM personen WHERE naam = '%s' ", $naam);
        $result = mysqli_query($connectie, $sql);
        if ($result->num_rows == 0) {
            $errorTxt = "Naam bestaat niet";
            header("Location: index.php?errorTxt=$errorTxt ");
        } else {
            $errorTxt = "Wachtwoord niet juist";
            header("Location: index.php?errorTxt=$errorTxt ");
        }
    } else {
        header("Location: companyPagina.php");
    }
//    $connectie.close();
} else {
    $returnText = "Connectie error";
    header("Location: index.php?errorTxt=$errorTxt ");
}

