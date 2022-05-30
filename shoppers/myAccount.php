<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 17.05.2022
// Summary  : This page displays the information of the current user.
//*********************************************************

// Include Database
include_once ("DBAccess.php");
include_once ("head.php");
include_once ("header.php");
?>
    <html>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Voici vos informations</h2>
                </div>
                <div class="col-md-7">
                    <form name="editPassword.php" action="editPassword.php" method="post">
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">


                                <br>
                                <table style="width:100%">
                                    <tr>
                                        <th>Données</th>
                                        <th>Valeurs</th>
                                    </tr>
                                    <?php
                                    //Call class
                                    $db = new DBAccess();

                                    $pseudo = $_SESSION['pseudo'];

                                    //Research all user's information
                                    $user = $db->getUserAllInformation($pseudo);



                                    //Display all user's values
                                    foreach ($user as $information)

                                        echo"
                                                <tr>
                                                    <td>Prénom</td>
                                                    <td>$information[firstname]</td>
                                                </tr>
                                                <tr>
                                                    <td>Nom</td>
                                                    <td>$information[surname]</td>
                                                </tr>
                                                <tr>
                                                    <td>Pseudo</td>
                                                    <td>$information[pseudo]</td>
                                                </tr>                                                    
                                                <tr>
                                                    <td>Numéro de téléphone</td>
                                                    <td>$information[phoneNumber]</td>
                                                </tr>                                                    
                                                <tr>
                                                    <td>Email</td>
                                                    <td>$information[email]</td>
                                                </tr>
                                                                                    
                                                <tr>
                                                    <td><!-- password is hidden -->
                                                <td><input type=\"hidden\" value=\"$information[password]\" name=\"pasword\"></td></td>
                                                    <!-- id entry -->
                            
                                                </tr>
                                                ";
                                    if(2==2)
                                    {
                                        echo"
                                                <tr>
                                                    <td>Equipe</td>
                                                    <td>$information[name]</td>
                                                </tr>                                    
                                                
                                     ";
                                    }
                                    else
                                    {
                                        echo"
                                                <tr>
                                                    <td>Equipe</td>
                                                    <td><buton> Entrainer une équipe</buton></td>
                                                </tr>                                    
                                                
                                     ";
                                    }

                                    ?>
                                    <form name="chooseATeam.php" action="chooseATeam.php" method="post">
                                        <div class="form-group row">
                                            <a onclick href="chooseATeam.php" class="btn btn-primary btn-lg btn-block">choisir une équipe</a>
                                        </div>


                                </table>
                                <div class="form-group row">
                                    <a onclick href="editPassword.php" class="btn btn-primary btn-lg btn-block">Changez votre mot de passe</a>
                                </div>
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
    </html>
<?php
// Includes header and menu
include_once("footer.php");
?>