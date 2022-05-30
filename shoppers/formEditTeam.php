<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 19.05.2022
// Summary  : Gets the information about a team, checks the values, and updates the line
//*********************************************************

// Session start and login = false
session_start();
$loginMessage = false; // Default value

// Include the database and call class
include_once("DBAccess.php");
$db = new DBAccess();
include_once ("admiCheck.php");

// Check if values is not empty
if ((!empty($_POST['id'])) && (!empty($_POST['name'])) &&(!empty($_POST['town'])))
{
    //Gets the information
    $id= $_POST['id'];
    $name= $_POST['name'];
    $town= $_POST['town'];

    //Finds the id from the town
     $idTown = $db->getTown($town);



    // Updates the entry
    $db -> updateTeam($id,$name,$idTown);
    echo '<body onLoad="alert(\'L\'équipe a été mise à jour\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=index.php">';

}
else
{
    echo '<body onLoad="alert(\'Veuillez remplir tous les champs.\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=fields.php">';
}