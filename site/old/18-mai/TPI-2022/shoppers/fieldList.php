<?php




///CPNV
///Author : Mathias Groux
///Date :
///Description :

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
                    <h2 class="h3 mb-3 text-black">Liste des terrains</h2>
                </div>

                <div class="col-md-7">
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="email" class="text-black">Liste des terrains</label>
                                <br>
                                <table style="width:100%">
                                    <tr>
                                        <th>nom</th>
                                        <th>largeur</th>
                                        <th>longueur</th>
                                    </tr>



                                        <?php
                                        //Call class
                                        $db = new DBAccess();

                                        //Research all fields information
                                        $allFields = $db->getAllFields();

                                        //Display all fields values
                                        foreach ($allFields as $field)

                                            echo"
                                    <tr>
                                        <td>$field[name]</td>
                                        <td>$field[width]</td>
                                        <td>$field[length]</td>
                                        <td>$field[id]</td>
                                        
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