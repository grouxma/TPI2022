<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 19.05.2022
// Summary  : Gets the information about a team, checks the values, and add a team
//*********************************************************

// Session start and login = false
session_start();
$loginMessage = false; // Default value

// Include the database and call class
include_once("DBAccess.php");
$db = new DBAccess();
include_once ("admiCheck.php");

// Check if values is not empty
if ( (!empty($_POST['name'])) &&(!empty($_POST['town'])))
{
    //Gets the information
    $name= $_POST['name'];
    $town= $_POST['town'];

    //Finds the id from the town
    $idTown = $db->getTown($town);

    //checks if the team already exists
    $data = $db->checkTeam($name);
    if(empty($data))
    {
        // adds the entry
        $db -> addTeam($name,$idTown);
        echo '<body onLoad="alert(\'L\'équipe a été ajoutée\')">';
        echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
    }
    else
    {
        echo '<body onLoad="alert(\'Cette équipe existe déjà.\')">';
        //echo '<meta http-equiv="Refresh" content="0;URL=AddTeam.php">';
    }
}
else
{
    echo '<body onLoad="alert(\'Veuillez remplir tous les champs.\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=AddTeam.php">';
}