<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 05.05.2022
// Summary  : This page gets the values from editPassword.php
//            This page checks the information and lets the user change the password
//*********************************************************
// Session start and login = false
session_start();

// Include the database and call class
include_once("DBAccess.php");
include_once ("admiCheck.php");
$db = new DBAccess();
$id = $_GET['id'];

// Delete Teacher values
$db->deleteUSer($id);



// Confirm message add a true value for the verification
echo "<body onLoad=\"alert('L\'utilisateur a été supprimé')\">";
echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
