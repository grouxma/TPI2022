<?php

//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 17.05.2022
// Summary  : This page lets the user add a new field.
//*********************************************************


// Include Database
include_once ("DBAccess.php");
include_once ("head.php");
include_once ("header.php");
?>

<!DOCTYPE html>
<html lang="fr">
<body>
<div class="site-wrap">
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Vous pouvez ajouter un terrain ici.</h2>
                </div>
                <div class="col-md-7">
                    <form action="formAddField.php" method="post">
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
                                    //Test if the user is an admin
                                    $pseudo = $_SESSION['pseudo'];
                                    $admin = $db->getAdminRight($pseudo);
                                        echo "                                                            
                                                            <tr>
                                                                
                                                                <td>Nom<span class=\"text-danger\">*</span></td>
                                                                <td><input  \"type=\"text\" class=\"form-control\" id=\"name\" name=\"name\"></td>
                                                            </tr>
                                                               <tr>
                                                                <td>Longueur<span class=\"text-danger\">*</span></td>
                                                                
                                                                <td><input  \"type=\"text\" class=\"form-control\" id=\"name\" name=\"length\"></td>
                                                            </tr>                                                    
                                                            <tr>
                                                                <td>Largeur<span class=\"text-danger\">*</span></td>
                                                                
                                                                <td><input  \"type=\"text\" class=\"form-control\" id=\"name\" name=\"width\"></td>
                                                            </tr>                                                    
                                           
                                                            <tr>
                                                                <td>Commentaire</td>
                                                                <td><input  \"type=\"text\" class=\"form-control\" id=\"name\" name=\"comment\"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ville<span class=\"text-danger\">*</span>
                                                                </tr>
                                                            <tr>
                                    <td>
                                        <select class=\"btn btn-secondary btn-sm dropdown-toggle\" name=\"id_towns\" size=\"1\">";

                                        // Research all teacher value
                                        $allTowns = $db->getAllTowns();

                                        // Display  teachers values
                                        foreach ($allTowns as $town)
                                        {
                                            print "<option class=\"dropdown-item\">$town[name]</option>";
                                        }
                                        print " </select></td></tr>";
                                    ?>

                                </table>
                            </section>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <br>
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Ajouter">
                                </div>
                            </div>
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