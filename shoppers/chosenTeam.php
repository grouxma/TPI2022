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
?>

<!DOCTYPE html>
<html lang="fr">
<body>
<div class="site-wrap">
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Voulez-vous entraîner cette équipe ?</h2>
                </div>
                <div class="col-md-7">
                    <form action="formChosenTeam.php" method="post">
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
                                    $team = $db->getTeamValues($id);

                                    foreach ($team as $teamVale) {
                                        echo "                                                            
                                                            <tr>
                                                                <!-- id entry -->
                                                                <input type=\"hidden\" value=\"$id\" name=\"id\">
                                                                <td>Nom</td>
                                                                <td>$teamVale[name]</td>
                                                            </tr>

                                                            <tr>
                                                                <td>Ville</td>
                                                                <td>$teamVale[town]</td>
                                                            </tr>
                                                            <tr>
                                                            <td></td>
</tr>";
                                    }
                                    ?>
                                </table>
                            </section>
                            <?php
                            echo "
                                                          <br>
                                                    <div class=\"form-group row\">
                                            <a onclick href=\"formChosenTeam.php?id=$id\" class=\"btn btn-sm btn-primary\">Entrainer cette équipe</a>
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