<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 04.05.2022
// Summary  : This page diplays the menu on the header to let the user go everywhere on the site
//            Proposals are different depending on the status of the user
//*********************************************************



// Session start and login = false
session_start();
?>

<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                    <div class="site-logo">
                        <!--big logo on the top-->
                        <a href="index.php" class="js-logo-clone">TPI 2022</a>
                    </div>
                </div>

                <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                    <div class="site-top-icons">
                        <ul>

                            <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block">
                <!--<li class="has-children active">
                    <a href="index.php">Sous-menus</a>
                    <ul class="dropdown">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </li>-->

                <!--<li><a href="shop.php">Boutique</a></li>-->


                <!--<li><a href="news.php">News</a></li>-->



                <?php
                //Displays a different menu depending on the user

                $db = new DBAccess();
                //$data = $db->getAdminRight($pseudo);
                if(!isset($_SESSION['pseudo']))
                {
                    echo "<li><a href=\"login.php\">Connexion</a></li>";
                    echo"<li><a href=\"register.php\">S'enregistrer</a></li>";
                }
                else
                {
                    //Name of the user
                    $pseudo = $_SESSION['pseudo'];

                    //Verifies if the user is activated from both parts
                    $activated=$db->getActivatedRight($pseudo);

                    //Checks if the user is an admin
                    $admin = $db->getAdminRight($pseudo);

                    //Find a potential team from the user
                    $hasTeam = $db->hasTeam($pseudo);

                    //If the user has a team, he/she can plan a game
                    if(!empty($hasTeam))
                    {
                        echo"<li><a href=\"createGame.php\">Créer match</a></li>";
                    }


                    if($activated['userActivated']==1 && $activated['adminActivated']==1)
                    {
                        echo "<li><a href=\"myAccount.php\">Mon compte</a></li>";
                        echo"<li><a href=\"news.php\">News</a></li>";
                    }

                    //If the user is an admin, he/she can manage some stuff
                    if($admin['admin']==1)
                    {
                        echo "<li><a href=\"addUser.php\">Ajouter entraîneur</a></li>";
                        echo"<li><a href=\"news.php\">News</a></li>";
                        echo"<li><a href=\"coaches.php\">entraineurs</a></li>";
                        echo"<li><a href=\"fieldList.php\">Terrains</a></li>";
                        echo"<li><a href=\"teams.php\">Equipes</a></li>";

                    }
                    echo "<li><a href=\"logout.php\">Déconnexion</a></li>";

                }
                ?>
            </ul>
        </div>
    </nav>
</header>