<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 19.05.2022
// Summary  : Gets the information about a news, checks the values, and adds the entry
//*********************************************************

$loginMessage = false; // Default value

// Include the database and call class
include_once("DBAccess.php");
$db = new DBAccess();
include_once ("admiCheck.php");

$title= $_POST['title'];
$information= $_POST['information'];


//Informs the user the entry has been added
echo "<body onLoad=\"alert('Cette nouvelle à été ajoutée.')\">";

//Updates entry
$db ->addNews($title,$information);
//goes back to the index page
echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
