<?php


//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 17.05.2022
// Summary  : This page lets the user change the password.
//*********************************************************


// Include Database
include_once ("DBAccess.php");
include_once ("head.php");
include_once ("header.php");
include_once ("admiCheck.php");
?>

<!DOCTYPE html>
<html lang="fr">
<body>
<div class="site-wrap">
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Vous pouvez changer le terrain.</h2>
                </div>
                <div class="col-md-7">
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


                                    //get the value from the field
                                    $field = $db->getAllFieldsValues($id);


                                    foreach ($field as $fieldValue)
                                    {
                                        echo "                                                            
                                                            <tr>
                                                                <!-- id entry -->
                                                                <input type=\"hidden\" value=\"$id\" name=\"id\">
                                                                <td>Nom</td>
                                                                <td><input value =\"$fieldValue[name]\" \"type=\"text\" class=\"form-control\" id=\"name\" name=\"name\"></td>
                                                            </tr>
                                                               <tr>
                                                                <td>Longueur</td>
                                                                
                                                                <td><input value =\"$fieldValue[length]\" \"type=\"text\" class=\"form-control\" id=\"name\" name=\"length\"></td>
                                                            </tr>                                                    
                                                            <tr>
                                                                <td>Largeur</td>
                                                                
                                                                <td><input value =\"$fieldValue[width]\" \"type=\"text\" class=\"form-control\" id=\"name\" name=\"width\"></td>
                                                            </tr>                                                    
                                           
                                                            <tr>
                                                                <td>Commentaire</td>
                                                                <td><input value =\"$fieldValue[comment]\" \"type=\"text\" class=\"form-control\" id=\"name\" name=\"comment\"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ville
                                                                </tr>
                                                            <tr>
                                    <td>
                                        <select class=\"btn btn-secondary btn-sm dropdown-toggle\" name=\"town\" size=\"1\">";

                                        // Research all teacher value
                                        $allTowns = $db->getAllTowns();

                                        // Display  teachers values
                                        foreach ($allTowns as $town)
                                        {
                                            print "<option class=\"dropdown-item\">$town[name]</option>";
                                        }
                                        print " </select></td></tr>";
                                    }




                                    ?>
                                </table>
                            </section>
                            <?php
                            echo "
                                                    <div class=\"col-lg-12\">
                                                    <br>
                                                        
                                                        <input class=\"btn btn-sm btn-primary\" id=\"input\" type=\"submit\" value =\"Changer les valeur\">
                                                    </div>";
                            ?>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

include_once "script.php";
?>
</body>
</html>