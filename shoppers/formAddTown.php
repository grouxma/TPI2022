<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 19.05.2022
// Summary  : Gets the information about a news, checks the values, and adds the entry
//*********************************************************

include_once ("admiCheck.php");
// Session start and login = false
session_start();
$loginMessage = false; // Default value

// Include the database and call class
include_once("DBAccess.php");
$db = new DBAccess();
include_once ("admiCheck.php");

$name= $_POST['name'];


//Updates entry
$db ->addTown($name);

// Displays a message to inform the town has been added
echo "<body onLoad=\"alert('La ville a été ajoutée')\">";

//goes back to the index page
echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
