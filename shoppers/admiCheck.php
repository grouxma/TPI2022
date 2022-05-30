<?php

include_once ("DBAccess.php");
session_start();
$db = new DBAccess();


//Verifies if the user is logged
if(!isset($_SESSION['pseudo']))
{
    // If not, he/she will be redirected
    echo "<body onLoad=\"alert('Vous n\'avez pas les droits d\'afficher la page')\">";
    echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
}

else
{
    //Checks if the user is an admin
    $pseudo = $_SESSION['pseudo'];

    // Research all users value
    $admin = $db->getAdminRight($pseudo);

    //If not, the user is redirected
    if ($admin["admin"] !=1)
    {
        // Confirm Message for the verification
        echo "<body onLoad=\"alert('Vous n\'avez pas les droits d\'afficher la page')\">";
        echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
    }
}
?>