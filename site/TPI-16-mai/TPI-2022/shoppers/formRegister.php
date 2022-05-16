<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 04.05.2022
// Summary  : Check the information and register the user if he's allowed to
//*********************************************************
// Modification : -
// Date   : -
// Author : -
// Reason : -
//*********************************************************



/////////////// TO DELETE ////////////////////////////////

// Session start and login = false
session_start();
$loginMessage = false; // Default value

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
    // Users login
    $data = $db->getUser($pseudo);

    if (empty($data))
    {
        echo '<body onLoad="alert(\'Pseudo ou mot de passe incorrect-1\')">';

        echo '<meta http-equiv="Refresh" content="0;URL=login.php">';
    }
    else
    {
        // Password is correct
        if ($password == $data['password'])
        {
            // Session information
            $_SESSION['pseudo'] = $pseudo;

            // loginMessage add a true value for the verification
            echo "<body onLoad=\"alert('Bienvenue  $pseudo ')\">";
            echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
        }
        else
        {
            echo '<body onLoad="alert(\'Pseudo ou mot de passe incorrect-2\')">';
            //echo '<meta http-equiv="Refresh" content="0;URL=login.php">';
        }
    }
}
else
{
    echo '<body onLoad="alert(\'Pseudo ou mot de passe vide\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=login.php">';
}