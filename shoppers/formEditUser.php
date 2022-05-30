<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 19.05.2022
// Summary  : Gets the information about a user, checks the values, and updates the line
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
if (isset($_POST) && (!empty($_POST['id'])) &&(!empty($_POST['firstname'])) && (!empty($_POST['surname']))&& (!empty($_POST['pseudo'])) && (!empty($_POST['phoneNumber']))&&(!empty($_POST['email'])))
{
    // Gets the values
    echo $id = $_POST['id'];
    echo"<br>";
    echo $firstname = $_POST['firstname'];
    echo"<br>";
    echo $surname = $_POST ['surname'];
    echo"<br>";
    echo $pseudo = $_POST ['pseudo'];
    echo"<br>";
    echo $phoneNumber = $_POST['phoneNumber'];
    echo"<br>";
    echo $email = $_POST['email'];
    echo"<br>";



    // Updates the entry and informs the admin
    $db -> updateUser($id,$surname,$firstname,$pseudo,$phoneNumber,$email);
    echo '<body onLoad="alert(\'L\'utilisateur a été mise à jour\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=index.php">';

}
else
{
    echo '<body onLoad="alert(\'Veuillez remplir tous les champs.\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=coaches.php">';
}