<?php
//********************************************************
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

// Check if values are not empty
if (isset($_POST) && (!empty($_POST['surname'])) && (!empty($_POST['firstname'])) && (!empty($_POST['pseudo'])) && (!empty($_POST['phoneNumber'])) && (!empty($_POST['email'])) && (!empty($_POST['password'])) && (!empty($_POST['confirmPassword']))) {
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

        //Then, the Web site asks the database if the user already exists
        $data = $db->checkEmail($email);

        //Then, the Web site asks the database if the user already exists
        if (empty($data))
        {
            //Secures the password
            $securedPassword = password_hash($password, PASSWORD_BCRYPT);

            //Adds the user
            $db->addUser($surname, $firstname, $pseudo, $phoneNumber, $email, $securedPassword);
            echo '<body onLoad="alert(\'Votre demande de compte a été enregistrée.\')">';
            echo '<meta http-equiv="Refresh" content="0;URL=index.php">';

        }
        else
        {
            if (!empty(array_filter($data, static function ($row) {
                return $row['userActivated'] == 1;
            })))
            {
                //This account already exists
                echo '<body onLoad="alert(\'Ce compte existe déjà\')">';
                echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
            }
            else
            {
                if (!empty(array_filter($data, static function ($row) {
                    return $row['adminActivated'] == 1;
                })))
                {
                    //Secures the password
                    $securedPassword = password_hash($password, PASSWORD_BCRYPT);

                    //Adds the user
                    //updates the user to get his account activated
                    $db->activeTheUser($surname, $firstname, $pseudo, $phoneNumber, $email, $securedPassword);
                    echo"<br>";

                    //Informs the user the registration is completed
                    echo '<body onLoad="alert(\'Votre compte est reconnu et a été ajouté\')">';
                    echo '<meta http-equiv="Refresh" content="0;URL=register.php">';

                    //Sends an email to the new activated user.
                    $mailContent = "Merci beaucoup. Votre mail a été reconnu, et votre compte est actif.";
                    $subject = "Activation de votre compte";
                    $headers = 'From: mathias.groux@cpnv.ch' . "\r\n";

                    //Sends the email.
                    mail($email, $subject, $mailContent, $headers);
                }
            }
        }
    } else
    {
        //Informs the the passwords are not the same
        echo '<body onLoad="alert(\'Les mots de passe doivent être identiques.\')">';
        //echo '<meta http-equiv="Refresh" content="0;URL=register.php">';
    }
} else {
    //Informs the information is not completed
    echo '<body onLoad="alert(\'Des informations sont manquantes\')">';
    //echo '<meta http-equiv="Refresh" content="0;URL=register.php">';
}