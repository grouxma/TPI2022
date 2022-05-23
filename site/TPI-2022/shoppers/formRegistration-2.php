
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

/*
echo $surname = $_POST['surname']."<br>";
echo $firstname = $_POST['firstname']."<br>";
echo $pseudo = $_POST['pseudo']."<br>";
echo $phoneNumber = $_POST['phoneNumber']."<br>";
echo $email = $_POST['email']."<br>";
echo $password = $_POST['password']."<br>";
echo $confirmPassword = $_POST['confirmPassword']."<br>";
*/



// Check if values are not empty
if (!empty($POST['firstname'])
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

    $securedPaword ="";
    //Both passwords must be identical
    if ($password == $confirmPassword)
    {
        //Then, the Web site asks the database if the user already exists
        $data = $db->checkEmail($email);

        //Then, the Web site asks the database if the user already exists
        if(!empty($data))
        {
            $db -> addUser($surname,$firstname,$pseudo,$phoneNumber,$email,$securedPaword);
        }


        echo $securedPaword =  password_hash($password, PASSWORD_BCRYPT);




        $algo = "";
        //This function hash the password the insert a secured string on the Database
        //echo $securedPaword = password_hash(string $password, string|int|null PASSWORD_BCRYPT, array $options = []): string;
        //echo string password_hash(string $password, string $algo, array $options = [])

        // Create a new entry
        //$db -> addUser($surname,$firstname,$pseudo,$phoneNumber,$email,$securedPaword);
        //echo '<meta http-equiv="Refresh" content="0;URL=index.php">';

    }
    else
    {
        Print "Vos mots de passe doivent être identiques.";
    }

}
else
{
    //Informs the information is not completed
    echo '<body onLoad="alert(\'Des informations sont manquantes\')">';
    //echo '<meta http-equiv="Refresh" content="0;URL=register.php">';
}


