<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 05.05.2022
// Summary  : This page gets the values from editPassword.phh
//            This page checks the information and lets the user change the password
//**********************************************************


// Session start and login = false
session_start();

// Include the database and call class
include_once("DBAccess.php");
$db = new DBAccess();

// Check if values are not empty
if ( isset($_POST) && (!empty($_POST['oldPassword'])) && (!empty($_POST['newPassword']) && (!empty($_POST['confirmPassword'])))) {
    // Values
    echo $oldPassword = $_POST['oldPassword']."<br>";
    echo $newPassword = $_POST ['newPassword']."<br>";
    echo $confirmPassword = $_POST ['confirmPassword']."<br>";
    echo $pseudo = $_SESSION['pseudo']."<br>"."<br>";
    echo $pseudo."<br>"."<br>"."<br>";

    // gets the user information from the pseudo
    echo $data = $db->getUserforPassword($pseudo)."<br>";




    ///////////////////////////////////////////////////////////////////////////////////////
    /// THis line doesn't work !!!
    //echo $data;
    echo $data['password'];

    //Test if the form is not empty -> Displays an error message and refresh the page
    if (empty($data))
    {
        //echo '<body onLoad="alert(\'Une erreur est survenue \')">';
        //echo '<meta http-equiv="Refresh" content="0;URL=editpassword.php">';
        echo "Salut";
    }
    else
    {
        //  if password is correct
        if ($oldPassword == $data['password'])
        {

            // CHANGE THE MOT DE PASSE
            $db->updatePassword($pseudo,$newPassword);
            echo $data['password'];
            // Displays a message to inform the user is logged
            //echo "<body onLoad=\"alert('Votre mot de passe a été changé  $pseudo ')\">";
            //goes back to the index page
            //echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
        }
        else
        {
            //Displays a message error
            //echo '<body onLoad="alert(\'Pseudo ou mot de passe incorrect\')">';
            echo $oldPassword."<br>";
            echo $newPassword."<br>";
            echo $confirmPassword."<br>";
            echo $data['password'];
            //echo '<meta http-equiv="Refresh" content="0;URL=login.php">';
        }
    }
}
else
{
    //Informs the inputs are empty -> displays an error message
    //echo '<body onLoad="alert(\'Pseudo ou mot de passe vide\')">';
    //echo '<meta http-equiv="Refresh" content="0;URL=login.php">';
}