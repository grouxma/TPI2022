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
?>

<!DOCTYPE html>
<html lang="fr">
<body>
<div class="site-wrap">
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Vous pouvez changer votre mot de passe ici.</h2>
                </div>
                <div class="col-md-7">
                    <form action="formEditPassword.php" method="post">
                        <div class="p-3 p-lg-5 border">
                            <section>
                                <table style="width:100%">
                                    <tr>
                                        <th>Données</th>
                                        <th>Valeurs</th>
                                    </tr>


                                    <tr>
                                        <td>Votre ancien mot de passe</td>
                                        <td><input type="password" class="form-control" id="oldPassword" name="oldPassword"></td>

                                    </tr>
                                    <tr>
                                        <td>Votre nouveau mot de passe</td>
                                        <td><input type="password" class="form-control" id="newPassword" name="newPassword"></td>

                                    </tr>
                                    <tr>
                                        <td>Entrez à nouveau votre mot de passe</td>
                                        <td><input type="password" class="form-control" id="confirmPassword" name="confirmPassword"></td>

                                    </tr>


                                    <!-- Display the db list-->
                                    <?php

                                    // Call class
                                    //$db = new DBAccess();
                                    //$pseudo = $_SESSION['pseudo'];
                                    //echo $pseudo;
                                    //Research all user's information
                                    //$user = $db->getUser($pseudo);
                                    //

                                    //foreach ($user as $value) {
                                        /*echo "
                                                            <tr>
                                                                <td>Votre ancien mot de passe</td>
                                                                <td><input class=\"form-control\" type=\"password\" name=\"oldPassword\"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Votre nouveau mot de passe</td>
                                                                <td><input class=\"form-control\" type=\"password\" name=\"newPassword\"></td>
                                                            </tr>                                                    
                                                            <tr>
                                                                <td>Entrez à nouveau votre mot de passe</td>
                                                                <td><input class=\"form-control\" type=\"password\" name=\"confirmPassword\"></td>
                                                            </tr>   
                                                                                                             
                                                              ";


                                    }*/

                                    ?>
                                </table>
                            </section>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="changer le mode de passe">
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