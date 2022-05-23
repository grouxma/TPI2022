<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 05.05.2022
// Summary  : This page gets the information from login.php
//            Asks the model if the information are correct
//            and creates the session
//*********************************************************


// Session start and login = false
session_start();
$loginMessage = false; // Default value

// Include the database and call class
include_once("DBAccess.php");
$db = new DBAccess();

// Check if values is not empty
if ( isset($_POST) && (!empty($_POST['pseudo'])) && (!empty($_POST['password'])))
{

    // Values
    $pseudo = $_POST['pseudo'];
    $password = $_POST ['password'];

    //Test if the user is activated
    $activated=$db->getActivatedRight($pseudo);



    // gets the user information from the pseudo
    $data = $db->getUser($pseudo);


    //Checks if the user is activated
    if ($activated['userActivated']==1 && $activated['adminActivated']==1)
    {

        //Test if the form is not empty -> Displays an error message and refresh the page
        if (empty($data))
        {
            echo '<body onLoad="alert(\'Pseudo ou mot de passe incorrect\')">';
            echo '<meta http-equiv="Refresh" content="0;URL=login.php">';
        }
        else
        {
            //  if password is correct
            if ($password == $data['password'])
            {
                // Session information
                $_SESSION['pseudo'] = $pseudo;

                // Displays a message to inform the user is logged
                echo "<body onLoad=\"alert('Bienvenue  $pseudo ')\">";
                //goes back to the index page
                echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
            }
            else
            {
                //Displays a message error
                echo '<body onLoad="alert(\'Pseudo ou mot de passe incorrect\')">';
                echo '<meta http-equiv="Refresh" content="0;URL=login.php">';
            }
        }
    }
    else
    {
        //Displays a message error
        echo '<body onLoad="alert(\'Votre compte n\'est pas actif\')">';
        echo '<meta http-equiv="Refresh" content="0;URL=login.php">';

    }
}
else
{
    //Informs the inputs are empty -> displays an error message
    echo '<body onLoad="alert(\'Pseudo ou mot de passe vide\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=login.php">';
}