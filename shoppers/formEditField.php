<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 19.05.2022
// Summary  : Gets the information about a field, checks the values, and updates the line
//*********************************************************

// Session start and login = false
session_start();
$loginMessage = false; // Default value

// Include the database and call class
include_once("DBAccess.php");
$db = new DBAccess();
include_once ("admiCheck.php");

// Check if values is not empty
if ((!empty($_POST['id'])) && (!empty($_POST['name'])) &&(!empty($_POST['width'])) &&(!empty($_POST['length'])) &&(!empty($_POST['town'])))
{
    //Gets the information
    $id= $_POST['id'];
    $name= $_POST['name'];
    $width= $_POST['width'];
    $lenght= $_POST['length'];
    $comment= $_POST['comment'];
    $town= $_POST['town'];

    //Finds the id from the town
    $idTown = $db->getTown($town);

    // Updates the entry
    $db -> updateField($id,$name,$width,$lenght,$comment,$idTown);

    echo '<body onLoad="alert(\'Le terrain a été mis à jour\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=index.php">';

}
else
{
    echo '<body onLoad="alert(\'Veuillez remplir tous les champs.\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=fieldList.php">';
}