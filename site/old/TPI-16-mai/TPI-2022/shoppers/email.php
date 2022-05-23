<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 11.05.2022
// Summary  : This page is meant to send an email to the user
//*********************************************************

if($_GET['user'] == "sendEmail" && $_GET['password'] == "W1rele$$"){
    require('./class/dbConnection.php');
    $dbConn = new dbConnection();

    $cert1Week = $dbConn->getAllCertificates1Weeks();
    $cert1Month = $dbConn->getAllCertificates1Month();
    $employes = $dbConn->getAllEmployes();

    $subject = "Certificats à mettre à jour";
    $HTMLstart ="<html>
			<head>
				<title>Titre de la page</title>
			</head>
			<body>";
    $HTMLend = "</body>
			</html>";
    $HTMLendTable = "</table>";

    foreach($employes as $employe)
    {
        $messageFinal = "";
        $message1Month = "";
        $message1Week = "";
        $message2Month = "";
        $message3Month = "";
        if($employe['useNickname'] != "sysadmin")
        {
            $to = $employe['useEmail'];
            $cert3Month = $dbConn->getAllCertificates3Month($employe['idUser']);
            $cert2Month = $dbConn->getAllCertificates2Month($employe['idUser']);

            if(count($cert1Week) != 0){
                $message1Week = "
				<h1>Voici le titre</h1>
				<table>
					<tr>
						<th>Donnée 1</th>
						<th>Donnée 2&emsp;</th>
						<th>Donnée 3&emsp;</th>

					</tr>";
                foreach ($cert1Week as $certificate1W) {
                    $message1Week = $message1Week."
					<tr>
						<td>" . $certificate1W['cerClientSiteName'] . "&emsp;</td>
						<td>" . $certificate1W['cerDate'] . "&emsp;</td>
						<td>" . $certificate1W['useNickname'] . "&emsp;</td>

					</tr>";
                }
                $message1Week = $message1Week.$HTMLendTable;
            }

            if(count($cert1Month) != 0){
                $message1Month ="
				<h1>Voici les certificats qui vont expirer dans 1 mois</h1>
				<table>
					<tr>
						<th>Site client&emsp;</th>
						<th>Date d'expiration&emsp;</th>
						<th>Technicien&emsp;</th>
						<th>Personne de contact&emsp;</th>
						<th>Numero du contact</th>
					</tr>";

                foreach ($cert1Month as $certificate1M) {
                    $message1Month = $message1Month."
					<tr>
						<td>" . $certificate1M['cerClientSiteName'] . "&emsp;</td>
						<td>" . $certificate1M['cerDate'] . "&emsp;</td>
						<td>" . $certificate1M['useNickname'] . "&emsp;</td>
						<td>" . $certificate1M['certClientContactName'] . "&emsp;</td>
						<td>" . $certificate1M['certClientContactPhone'] . "</td>
					</tr>";
                }
                $message1Month = $message1Month.$HTMLendTable;
            }

            if(count($cert2Month) != 0) {
                $message2Month ="
				<h1>Voici les certificats qui vont expirer dans 2 mois</h1>
				<table>
					<tr>
						<th>Site client&emsp;</th>
						<th>Date d'expiration&emsp;</th>
						<th>Technicien&emsp;</th>
						<th>Personne de contact&emsp;</th>
						<th>Numero du contact</th>
					</tr>";
                foreach ($cert2Month as $certificate2M) {
                    $message2Month = $message2Month."
					<tr>
						<td>" . $certificate2M['cerClientSiteName'] . "&emsp;</td>
						<td>" . $certificate2M['cerDate'] . "&emsp;</td>
						<td>" . $certificate2M['useNickname'] . "&emsp;</td>
						<td>" . $certificate2M['certClientContactName'] . "&emsp;</td>
						<td>" . $certificate2M['certClientContactPhone'] . ";</td>
					</tr>";
                }
                $message2Month = $message2Month.$HTMLendTable;
            }

            if(count($cert3Month) != 0) {
                $message3Month ="
				<h1>Voici les certificats qui vont expirer dans 3 mois</h1>
				<table>
					<tr>
						<th>Site client&emsp;</th>
						<th>Date d'expiration&emsp;</th>
						<th>Technicien&emsp;</th>
						<th>Personne de contact&emsp;</th>
						<th>Numero du contact</th>
					</tr>";
                foreach ($cert3Month as $certificate3M) {
                    $message3Month = $message3Month."
					<tr>
						<td>" . $certificate3M['cerClientSiteName'] . "&emsp;</td>
						<td>" . $certificate3M['cerDate'] . "&emsp;</td>
						<td>" . $certificate3M['useNickname'] . "&emsp;</td>
						<td>" . $certificate3M['certClientContactName'] . "&emsp;</td>
						<td>" . $certificate3M['certClientContactPhone'] . "</td>
					</tr>";
                }
                $message3Month = $message3Month.$HTMLendTable;
            }

            $messageFinal = $HTMLstart.$message1Week.$message1Month.$message2Month.$message3Month.$HTMLend;


            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: admin@mocsa.ch' . "\r\n";
            $headers .= 'Cc: colin.brand@ascom.com';

            if($messageFinal != $HTMLstart.$HTMLend){
                mail($to, $subject, $messageFinal, $headers);
            }
        }
    }
}
?>
