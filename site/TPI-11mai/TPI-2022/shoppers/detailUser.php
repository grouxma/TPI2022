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
                    <h2 class="h3 mb-3 text-black">Information de l'entraineur</h2>
                </div>
                <div class="col-md-7">
                    <!--CHANGER CETTE ACTION QUI PERMETTRA D'ENVOYER CE FORMULAIRE A LA PAGE QUI CONVIENT !!-->
                    <form action="modifyUser.php" method="post">
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
                                    echo $id;

                                    // Research all teacher value
                                    if ($id!="")
                                    {
                                        $coachAllValues = $db->getUserAllValues($id);

                                        foreach ($coachAllValues as $coachValue)
                                        {
                                            echo "
                                                            <tr>
                                                                <td>ID</td>
                                                                <td>$coachValue[userID]</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Prénom</td>
                                                                <td>$coachValue[firstname]</td>
                                                            </tr>
                                                               <tr>
                                                                <td>Nom</td>
                                                                <td>$coachValue[surname]</td>
                                                            </tr>                                                    
                                                            <tr>
                                                                <td>Pseudo</td>
                                                                <td>$coachValue[pseudo]</td>
                                                            </tr>                                                    
                                                            <tr>
                                                                <td>Numéro de téléphone</td>
                                                                <td>$coachValue[phoneNumber]</td>
                                                            </tr>
                                                                                                                
                                                            <tr>
                                                                <td>email</td>
                                                                <td>$coachValue[email]</td>
                                                            </tr>  
                                                                <td>Mot de passe ??????</td>
                                                                <td>$coachValue[password]</td>
                                                            </tr>                                                    
                                                            <tr>
                                                                <td>admin</td>
                                                                <td>$coachValue[admin]</td>
                                                            </tr>                                                   
                                                            <tr>
                                                                <td>Actif ?</td>
                                                                <td>$coachValue[activated]</td>
                                                            </tr>    
                                                            <tr>
                                                                <td>Equipe ???????</td>
                                                                <td>$coachValue[teamID]</td>
                                                            </tr>    
                                                        ";
                                        }

                                    }





                                    ?>
                                    <!--
                                    <label for="c_lname" class="text-black">NPA <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="postCode" name="postCode">
                                </div>
                                    -->
                                </table>
                            </section>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Changez vos valeurs">
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
include_once "footer-2.php";

?>
</body>
</html>