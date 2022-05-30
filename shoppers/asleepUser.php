<?php


// Include Database
include_once ("DBAccess.php");
include_once ("head.php");
include_once ("Header.php");
include_once "script.php";
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
                    <h2 class="h3 mb-3 text-black">Voulez-vous supprimer cet utilisateur ?  <a href="coaches.php" class="btn btn-sm btn-primary">Retour</a> </h2>



                </div>
                <div class="col-md-7">
                    <!--CHANGER CETTE ACTION QUI PERMETTRA D'ENVOYER CE FORMULAIRE A LA PAGE QUI CONVIENT !!-->
                    <form action="deleteUser.php" method="post">
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
                                    // Research all teacher value
                                    if ($id!="")
                                    {
                                        $coachAllValues = $db->getUserAllValues($id);

                                        foreach ($coachAllValues as $coachValue)
                                        {
                                            echo "
                                                            <tr>
                                                                <td></td>
                                                                
                                                                <td></td>
                                                                <!-- id entry -->
                                                                <td><input type=\"hidden\" value=\"$coachValue[userID]\" name=\"id\"></td>
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
                                                                <td>Email</td>
                                                                <td>$coachValue[email]</td>
                                                            </tr>    
                                                            <tr>
                                                                <td></td>
                                                                
                                                                <td><input type=\"hidden\" value=\"$coachValue[teamID]\" name=\"teamID\"></td>
                                                            </tr>   
                                                            <tr>
                                                                <td>Nom Equipe</td>
                                                                <td>$coachValue[teamName]</td>
                                                            </tr> 
                                                            
                                                        ";
                                            if($coachValue['adminActivated']==1)
                                            {
                                                echo "
                                                        <tr>
                                                            <td>Actif ?</td>
                                                            <td>Activé</td>
                                                            <td><input type=\"hidden\" value=\"$coachValue[adminActivated]\" name=\"adminActivated\"></td>
                                                            
                                                        </tr>
                                            ";
                                            }
                                            else
                                            {
                                                echo "
                                                        <tr>
                                                            <td>Actif ?</td>
                                                            <td>Désactivé</td>
                                                            <td><input type=\"hidden\" value=\"$coachValue[adminActivated]\" name=\"adminActivated\"></td>
                                                        </tr>";
                                            }
                                        }
                                        echo"
                                        <td>
                                        
                                        <a href=\"formDeleteUser.php?id=$id\"><div class=\"button\">Supprimer cet utilisateur</div ></a>
                                        
                                    </td>
                                        ";



                                    }
                                    ?>
                                </table>
                            </section>
                            <!--<div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="submit"  id=$teacher[idTeacher] class="btn btn-primary btn-lg btn-block" value="Supprimer">
                                </div>
                            </div>-->
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