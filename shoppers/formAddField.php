<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 04.05.2022
// Summary  : Check the information and register the user if he's allowed to
//*********************************************************

include_once ("admiCheck.php");
$loginMessage = false; // Default value


// Include the database and call class
include_once("DBAccess.php");
$db = new DBAccess();
//checks if the user is an admin
include_once ("admiCheck.php");

// Check if values is not empty
if ((!empty($_POST['id_towns'])) && (!empty($_POST['name'])) &&(!empty($_POST['width'])) &&(!empty($_POST['length'])))
{
    echo $name=$_POST['name'];
    echo $length=$_POST['length'];
    echo $width=$_POST['width'];
    echo $comment=$_POST['comment'];
    echo $town=$_POST['id_towns'];


    //Finds the id from the town
    $id_towns = $db->getTown($town);

    //Adds the new fields in the database
    $db->addField($name,$width,$length,$comment,$id_towns);
    //Informs the user
    echo '<body onLoad="alert(\'Le terrain a été ajouté.\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
}
else
{
    //Error message
    echo '<body onLoad="alert(\'Veuillez remplir tous les champs.\')">';
    echo '<meta http-equiv="Refresh" content="0;URL=addField.php">';
}