<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 11.05.2022
// Summary  : This page is meant to send an email to the user
//*********************************************************
include_once ("admiCheck.php");
if($_GET['user'] == "sendEmail" && $_GET['password'] == "W1rele$$"){
    require('./class/dbAccess.php');
    $db = new DBAccess();

    $to= $_POST['email'];
    $subject = "Confirmation d'inscritpion à la gestion des terrains de foot";
    $message ="Votre mail a été reconnu dans notre base de données, et nous vous remercions de votre inscription.\r\n Votre compte est maintenant actif";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: bookfoot.mycpnv.ch' . "\r\n";
            $headers .= 'Cc: mathias.groux@cpnv.ch';


                mail($to, $subject, $message , $headers);



}
?>
