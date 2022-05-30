<?php


// Include Database
include_once ("DBAccess.php");
include_once ("head.php");
include_once ("Header.php");
include_once "script.php";
?>


<!DOCTYPE html>
<html lang="fr">
<body>
<div class="site-wrap">
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Information du terrain</h2>
                </div>
                <div class="col-md-7">
                    <!--CHANGER CETTE ACTION QUI PERMETTRA D'ENVOYER CE FORMULAIRE A LA PAGE QUI CONVIENT !!-->
                    <form action="formEditField.php" method="post">
                        <div class="p-3 p-lg-5 border">
                            <section>
                                <table style="width:100%">
                                    <tr>
                                        <th>Données</th>
                                        <th>Valeurs</th>
                                    </tr>
                                    <!-- Display the db list-->
                                    <?php

                                    // Call class
                                    $db = new DBAccess();
                                    //Define variables from GET method
                                    $id = $_GET['id'];

                                    //Test if the user is an admin
                                    $pseudo = $_SESSION['pseudo'];
                                    $admin = $db->getAdminRight($pseudo);


                                        $field = $db->getAllFieldsValues($id);


                                        foreach ($field as $fieldValue)
                                        {
                                            echo "                                                            
                                                            <tr>
                                                                <td>Nom</td>
                                                                <td>$fieldValue[name]</td>
                                                            </tr>
                                                               <tr>
                                                                <td>Longueur</td>
                                                                <td>$fieldValue[width]</td>
                                                            </tr>                                                    
                                                            <tr>
                                                                <td>Largeur</td>
                                                                <td>$fieldValue[length]</td>
                                                            </tr>                                                    
                                                            <tr>
                                                                <td>Ville</td>
                                                                <td>$fieldValue[town]</td>
                                                            </tr>
                                                                                                                
                                                            <tr>
                                                                <td>Commentaire</td>
                                                                <td>$fieldValue[comment]</td>
                                                        ";
                                            if ($admin['admin'] == 1)
                                            {
                                                echo "
                                                    <div class=\"col-lg-12\">
                                                        <a href=\"editField.php?id=$fieldValue[id]\" class=\"btn btn-sm btn-primary\">Changer les valeurs</a>
                                                    </div>";
                                            }
                                        }
                                    ?>
                                </table>
                            </section>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "footer.php";

?>
</body>
</html>