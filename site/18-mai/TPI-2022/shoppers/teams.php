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
                    <h2 class="h3 mb-3 text-black">Liste des équipes</h2>
                </div>

                <div class="col-md-7">
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="email" class="text-black">Liste des équipes</label>
                                <br>
                                <table style="width:100%">
                                    <tr>
                                        <th>nom</th>
                                        <th>Actions</th>

                                    </tr>

                                        <?php
                                        //Call class
                                        $db = new DBAccess();

                                        //Research all fields information
                                        $allTeams = $db->getAllTeams();

                                        //This line would be great to be added
                                        // <td><a href="#" class="btn btn-primary btn-sm">X</a></td>

                                        //Display all fields values
                                        foreach ($allTeams as $team)

                                            echo"
                                    <tr>
                                        <td>$team[name]</td>
                                        <td>___________ </td>
                                        <td>$team[id]</td>   
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