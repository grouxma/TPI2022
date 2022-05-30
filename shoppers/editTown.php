<?php


//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 17.05.2022
// Summary  : This page lets the user change the team.
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
                    <h2 class="h3 mb-3 text-black">Vous pouvez changer la ville.</h2>
                </div>
                <div class="col-md-7">
                    <form action="formEditTown.php" method="post">
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
                                    //Defines variables from GET method
                                    $id = $_GET['id'];

                                    //Tests if the user is an admin
                                    $pseudo = $_SESSION['pseudo'];
                                    $admin = $db->getAdminRight($pseudo);

                                    //Gets the value from the field
                                    $town = $db->getTownFromId($id);

                                    foreach ($town as $townValue)
                                    {
                                        echo "                                                            
                                                            <tr>
                                                                <!-- id entry -->
                                                                   
                                                                <input type=\"hidden\" value=\"$id\" name=\"id\"></td>
                                                                <td>Nom de la ville</td>
                                                                <td><input value =\"$townValue[name]\" type=\"text\" class=\"form-control\" id=\"name\" name=\"name\"></td>
                                                            </tr>

                                                           
                                                            ";
                                    }
                                    ?>
                                </table>
                            </section>
                            <?php
                            echo "
                                                    <div class=\"col-lg-12\">
                                                    <br>
                                                        <a href=\"formEditTown.php\" class=\"btn btn-sm btn-primary\">Modifier la ville</a>
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