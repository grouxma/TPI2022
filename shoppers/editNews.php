<?php


//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 17.05.2022
// Summary  : This page lets the user change the news.
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
                    <h2 class="h3 mb-3 text-black">Vous pouvez changer la Nouvelle.</h2>
                </div>
                <div class="col-md-7">
                    <form action="formEditNews.php" method="post">
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

                                    //Test if the user is an admin
                                    $pseudo = $_SESSION['pseudo'];
                                    $admin = $db->getAdminRight($pseudo);

                                    //Seeks the information from the news
                                    $news = $db->getNewsAllValues($id);



                                    foreach ($news as $newsValue)
                                    {
                                        echo "                                                            
                                                            <tr>
                                                                <!-- id entry -->
                                                                <input type=\"hidden\" value=\"$id\" name=\"id\">
                                                                <td>Titre</td>
                                                                <td><input value =\"$newsValue[title]\" \"type=\"text\" class=\"form-control\" id=\"title\" name=\"title\"></td>
                                                            </tr>
                                                               
                                                                <td>Information</td>
                                                                
                                                                <td><input value =\"$newsValue[information]\" \"type=\"text\" class=\"form-control\" id=\"information\" name=\"information\"></td>
                                                            </tr> ";

                                    }




                                    ?>
                                </table>
                            </section>
                            <?php
                            echo "
                                                    <div class=\"col-lg-12\">
                                                    <br>
                                                        <input class=\"btn btn-sm btn-primary\" class=\"button\" id=\"input\" type=\"submit\" value=\"Changer la nouvelle\">
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