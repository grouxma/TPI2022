<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 19.05.2022
// Summary  : Gets the information about a user, checks the values, and actives the user
//*********************************************************

// Session start and login = false
session_start();
$loginMessage = false; // Default value

// Include the database and call class
include_once("DBAccess.php");
$db = new DBAccess();
include_once ("admiCheck.php");

// Check if values is not empty
// Check if values are not empty
if (isset($_POST) && (!empty($_POST['id'])))
{
    // Gets the values
    $id = $_POST['id'];
    //Actives the user
    $db = $db->wakeNewUser($id);



    echo '<body onLoad="alert(\'L\'utilisateur a été activé.\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=index.php">';

}
else
{
    echo '<body onLoad="alert(\'une erreur s\'est produite.\')">';
    //echo '<meta http-equiv="Refresh" content="0;URL=coaches.php">';
}