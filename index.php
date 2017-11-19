<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ITPH inlog</title>
        <link rel = "stylesheet" type = "text/css" href="deCss.css">  
        <script>

            function inloggenValidate(form) {
                fail = inloggenValidateNaam(form.naam.value)
                fail += inloggenValidateWW(form.ww.value)

                if (fail == "")
                    return true
                else {
                    alert(fail);
                    return false
                }
            }

            function inloggenValidateNaam(field)
            {
                var pattern = new RegExp(/[()~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/); //unacceptable chars
                if (pattern.test(field)) {
                    return ("Gebruik alleen alpha en numerieke characters");
                }
                if (field == "") {
                    return "Naam mag niet leeg zijn\n";
                }
                return "";
            }

            function inloggenValidateWW(field)
            {
                if (field == "") {
                    return "Vul wachtwoord in  ";
                }
                return "";
            }

        </script>
    </head>
    <body>
        <?php
        if (isset($_REQUEST)) {
//            echo "<br>sadfds".$_REQUEST['errorText'];;
            if (isset($_REQUEST['errorTxt'])) {
                $errorTxt = $_REQUEST['errorTxt'];
                echo "<p id=naamBestaatNiet>";
                echo "<h2> " . $errorTxt . "</h2> ";
                echo "</p>";
                if ($errorTxt == "Naam bestaat niet") {
                    echo "<button id=naambestaatalKnop onclick=javascript:document.location='insertPersoon.php'; >  Voeg ".$_SESSION['naam']." toe   </button>";
                }
            }
        }

        ?>

        <form   action="checkPersoonExist.php" onsubmit="return inloggenValidate(this)"   method="POST">
            <table>
<?php
if ( isset($_SESSION['naam']) ) {
    echo "<tr> <td>  uw user login naam </td> <td>  <input type=text name=naam   id=naam value=".$_SESSION['naam'] .">    </td>  </tr>";
}  else {
    echo "<tr> <td>  uw user login naam </td> <td>  <input type=text name=naam   id=naam     </td> </tr> ";
}

if ( isset($_SESSION['ww']) ) {
    echo "<tr> <td>  uw  wachtwoord   </td> <td>    <input type=password name=ww id=ww  value=" .$_SESSION['ww']   .">    </td> </tr>";
} else {
    echo "<tr> <td>  uw  wachtwoord   </td> <td>    <input type=password name=ww  id=ww       </td> </tr>";
}
?>
            <tr> <td>     </td> <td>    <input type=submit   value=Login id="loginKnop">   </td> </tr>
            </table>

        </form>

    </body>
</html>
