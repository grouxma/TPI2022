
<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 05.05.2022
// Summary  : This page gets the user's information from the registration form on register.php
//*********************************************************

// Session start and login = false
session_start();
// Default value is false
$loginMessage = false;



    // Include the database and call class
    include_once("DBAccess.php");
    $db = new DBAccess();

// Check if values is not empty
if ( isset($_POST)
    &&(!empty($POST['firstname']))
    &&(!empty($POST['lastname']))
    &&(!empty($POST['pseudo']))
    &&(!empty($POST['email']))
    &&(!empty($POST['phoneNumber']))
    &&(!empty($POST['password']))
    &&(!empty($POST['confirmPassword'])))
{
    //Converts value and creates the variables for the tests
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $pseudo = $_POST['pseudo'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    //Both passwords must be identical
    if ($password == $confirmPassword)
    {


        // Create a new entry
        $db -> addUser($surname,$firstname,$pseudo,$phoneNumber,$email,$password);
        echo '<meta http-equiv="Refresh" content="0;URL=index.php">';

    }
    else
    {
        Print "Vos mots de passe doivent être identiques.";
    }

}
else
{
    //Informs the information is not completed
    echo '<body onLoad="alert(\'Pseudo ou mot de passe vide\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=login.php">';
}


