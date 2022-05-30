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
$db = new DBAccess();
include_once ("admiCheck.php");

// Check if values are not empty
if (isset($_POST) && (!empty($_POST['oldPassword'])) && (!empty($_POST['newPassword']) && (!empty($_POST['confirmPassword']))))
{
    // Gets the values
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST ['newPassword'];
    $confirmPassword = $_POST ['confirmPassword'];
    $pseudo = $_SESSION['pseudo'];

    if($newPassword==$confirmPassword)
    {
        // gets the user information from the pseudo
        $data = $db->getUser($pseudo);
        //Secures the password
        $securedPassword =  password_hash($newPassword, PASSWORD_BCRYPT);

        if ($oldPassword == $data['password'])
        {
            // Updates the entry
            $db -> updatePassword($newPassword,$pseudo);

            echo '<body onLoad="alert(\'Votre mot de passe a été mis à jour\')">';
            echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
        }
    }
    else
    {
        echo '<body onLoad="alert(\'Vos mots de passe doivent être identiques.\')">';
        echo '<meta http-equiv="Refresh" content="0;URL=editPassword.php">';
    }
}
else
{
    //Informs the inputs are empty -> displays an error message
    echo '<body onLoad="alert(\'Un champ est vide\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=login.php">';
}