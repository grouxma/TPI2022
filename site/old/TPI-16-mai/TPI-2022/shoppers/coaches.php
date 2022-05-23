<?php

///CPNV
///Author : Mathias Groux
///Date :10.05.2022
///Description : This page displays the list of users

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
                    <h2 class="h3 mb-3 text-black">Liste des entraineurs</h2>
                </div>
                <div class="col-md-7">
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="email" class="text-black">Liste des entraineurs</label>
                                <br>
                                <table style="width:100%">
                                    <tr>
                                        <th>Nom</th>
                                        <th>___________</th>
                                        <th>Prénom</th>
                                        <th>id</th>
                                        <th>Actions</th>
                                    </tr>

                                    <?php
                                    //Call class
                                    $db = new DBAccess();

                                    //Research all fields information
                                    $allCoaches = $db->getAllCoaches();

                                    //This line would be great to be added
                                    // <td><a href="#" class="btn btn-primary btn-sm">X</a></td>

                                    //Display all fields values
                                    foreach ($allCoaches as $coach)

                                        echo"
                                    <tr>
                                        <td>$coach[firstname]</td>
                                        <td>___________ </td>
                                        <td>$coach[surname]</td>
                                        <td>$coach[id]</td>  
                                        <th>
                                        <a href=\"detailUser.php?id=$coach[id]\">Détail</a>
</th>
                                        <td></td>       
                                    </tr>                                
                                    ";
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
include_once ("footer-2.php");
?>