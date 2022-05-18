
<?php


// Session start and login = false
session_start();
$loginMessage = false; // Default value

// Include the database and call class
include_once("DBAccess.php");
$db = new DBAccess();


$surname = $_POST['surname'];
$firstname = $_POST['firstname'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

//Compare the passwords
if ($password == $confirmPassword)
{

// Convert value

    // Create new entry
    $db -> addUser($surname,$firstname,$phoneNumber,$email,$password);
    echo '<meta http-equiv="Refresh" content="0;URL=index.php">';

}
else
{
    Print "Vos mots de passe doivent être identiques.";
}
