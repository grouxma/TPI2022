<?php


//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 11.05.2022
// Summary  : This page displays the values of a specific user.
//            and lets change the information
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
                    <h2 class="h3 mb-3 text-black">Vous pouvez changer les valeurs ici.</h2>
                </div>
                <div class="col-md-7">

                    <form action="formEditUser.php" method="post">
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
                                    $id = $_POST['id'];


                                    // Research all teacher value
                                    $coachAllValues = $db->getUserAllValues($id);

                                    foreach ($coachAllValues as $coachValue) {
                                        echo "
                                                            <tr>
                                                                <td>Prénom</td>
                                                                <td><input class=\"form-control\" type=\"text\" name=\"firstname\" value=\"$coachValue[firstname]\"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nom de famille</td>
                                                                <td><input class=\"form-control\" type=\"text\" name=\"surname\" value=\"$coachValue[surname]\"></td>
                                                            </tr>                                                    
                                                            <tr>
                                                                <td>Pseudo</td>
                                                                <td><input class=\"form-control\" type=\"text\" name=\"pseudo\" value=\"$coachValue[pseudo]\"></td>
                                                            </tr>                                                    
                                                            <tr>
                                                                <td>Numéro de téléphone</td>
                                                                <td><input class=\"form-control\" type=\"text\" name=\"phoneNumber\" value=\"$coachValue[phoneNumber]\"></td>
                                                            </tr>                                                    
                                                            <tr>

                                                                <td>Email</td>
                                                                <td><input class=\"form-control\" type=\"text\" name=\"email\" value=\"$coachValue[email]\"></td>
                                                            </tr>                                                    
                                                            <tr>
                                                            <td><!-- id entry -->
                                                                <input type=\"hidden\" value=\"$id\" name=\"id\"></td>
                                                            </tr>  
   
                      
                                                        ";

                                    }

                                    ?>
                                </table>
                            </section>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Changez les valeurs">
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