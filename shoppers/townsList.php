<?php



//********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 09.05.2022
// Summary  : This page displays the fields list and the actions to do with it.
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
                    <h2 class="h3 mb-3 text-black">Liste des Villes</h2>
                </div>
                <div class="col-md-7">
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="email" class="text-black">Liste des villes</label>
                                <br>
                                <table style="width:100%">
                                    <tr>
                                        <th>Nom</th>
                                        <th></th>
                                    </tr>
                                    <?php
                                    //Call class
                                    $db = new DBAccess();

                                    //Checks if the user is an admin
                                    $pseudo = $_SESSION['pseudo'];

                                    //Test if the user is an admin
                                    $admin = $db->getAdminRight($pseudo);


                                    //Research all fields information
                                    $allTowns = $db->getAllTowns();

                                    if($admin['admin']==1)
                                    {
                                        //Display all fields values
                                        foreach ($allTowns as $town)

                                            echo"
                                                    <tr>
                                                        <td>$town[name]</td>
                                                        <th>
                                                            <a href=\"editTown.php?id=$town[id]\">modifier</a>
                                                        </th>       
                                                    </tr>

                                    ";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
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