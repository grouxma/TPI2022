<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 19.05.2022
// Summary  : Gets the information about a news, checks the values, and updates the entry
//*********************************************************

// Session start and login = false
session_start();
$loginMessage = false; // Default value

// Include the database and call class
include_once("DBAccess.php");
$db = new DBAccess();
include_once ("admiCheck.php");

$id= $_POST['id'];
$title= $_POST['title'];
$information= $_POST['information'];

// Displays a message to inform the user is logged
echo "<body onLoad=\"alert('Les informations ont été mises à jour')\">";

    //Updates entry
$db ->updateNews($title,$information,$id);
//goes back to the index page
echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
