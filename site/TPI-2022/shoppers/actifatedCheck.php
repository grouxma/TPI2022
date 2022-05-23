<?php
include_once ("DBAccess.php");

session_start();
$db = new DBAccess();

if(!isset($_SESSION['pseudo']))
{
    // Confirm Message for the verification
    echo "<body onLoad=\"alert('Vous n\'avez pas les droits d\'afficher la page')\">";
    echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
}
else
{
    $pseudo = $_SESSION['pseudo'];
    // Research all users value

    $admin = $db->getActivatedRight($pseudo);

    if ($admin["admin"] !=1)
    {
        // Confirm Message for the verification
        echo "<body onLoad=\"alert('Vous n\'avez pas les droits d\'afficher la page')\">";
        echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
    }
}
?>