<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 04.05.2022
// Summary  : Check the information and register the user if he's allowed to
//*********************************************************


// Session start and login = false
session_start();
$loginMessage = false; // Default value

// Include the database and call class
include_once("DBAccess.php");
$db = new DBAccess();
include_once ("admiCheck.php");

// Check if values is not empty
if ( isset($_POST) && (!empty($_POST['email'])) && (!empty($_POST['confirmEmail'])))
{
    // receives the information from addUSer
    $email = $_POST['email'];
    $confirmEmail = $_POST['confirmEmail'];

        // Checks if the email and the "confirmEmail" are the same
        if($email == $confirmEmail)
        {
            //Checks if the mail already exists
            //Gets the user information from the pseudo
            $data = $db->checkEmail($email);
            if(empty($data))
            {
                //Adds the new entry with just the mail, the admin right = 0, and the adminActivated=0

                // Create a new entry
                $db -> addUserFromAdmin($email);
                echo '<body onLoad="alert(\'Cet utilisateur a été ajouté aux entraîneurs\')">';
                echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
            }
            else
            {
                //Informs that the email already exists
                echo '<body onLoad="alert(\'Ce mail est déjà utilisé pour un utilisateur.\')">';
                echo '<meta http-equiv="Refresh" content="0;URL=addUser.php">';

            }

        }
        else
        {
            echo '<body onLoad="alert(\'Les deux champs doivent être identiques.\')">';
            echo '<meta http-equiv="Refresh" content="0;URL=addUser.php">';
        }
}
else
{
    echo '<body onLoad="alert(\'Veuillez remplir tous les champs.\')">';
    echo '//<meta http-equiv="Refresh" content="0;URL=addUser.php">';
}