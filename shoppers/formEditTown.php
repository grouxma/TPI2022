<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 19.05.2022
// Summary  : Gets the information about a town, checks the values, and updates the line
//*********************************************************

// Session start and login = false
session_start();
$loginMessage = false; // Default value

// Include the database and call class
include_once("DBAccess.php");
$db = new DBAccess();
include_once ("admiCheck.php");

echo $id= $_GET['id'];
echo $name= $_POST['name'];

// Check if values is not empty
if ((!empty($_POST['id'])) && (!empty($_POST['name'])))
{
    //Gets the information
    $id= $_POST['id'];
    $name= $_POST['name'];

    // Updates the entry
    $db -> updateTown($id,$name);

    echo '<body onLoad="alert(\'La ville a été mise à jour\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
}
else
{
    echo '<body onLoad="alert(\'Veuillez remplir tous les champs.\')">';
    //echo '<meta http-equiv="Refresh" content="0;URL=townsList.php">';
}