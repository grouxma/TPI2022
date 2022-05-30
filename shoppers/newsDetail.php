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
                    <h2 class="h3 mb-3 text-black">Information du terrain</h2>
                </div>
                <div class="col-md-7">
                    <form action="formEditField.php" method="post">
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


                                    $news = $db->getNewsAllValues($id);


                                    foreach ($news as $newsValue)
                                    {
                                        echo "                                                            
                                                            <tr>
                                                                <td>Date</td>
                                                                <td>$newsValue[date]</td>
                                                            </tr>
                                                               <tr>
                                                                <td>Titre</td>
                                                                <td>$newsValue[title]</td>
                                                            </tr>                                                    
                                                            <tr>
                                                                <td>Information</td>
                                                                <td>$newsValue[information]</td>
                                                            </tr>                                                    
                                                        ";
                                        if ($admin['admin'] == 1)
                                        {
                                            echo "
                                                    <tr>
                                                        <a href=\"editNews.php?id=$newsValue[id]\" class=\"btn btn-sm btn-primary\">Changer les valeurs</a>
                                                        </tr>
                                                    ";
                                        }
                                    }
                                    ?>
                                </table>
                            </section>

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