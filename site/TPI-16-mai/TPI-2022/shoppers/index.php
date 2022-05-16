<?php

//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 04.05.2022
// Summary  : This page welcomes the user on the site
//*********************************************************

// Include Database
include_once ("DBAccess.php");
include_once("header.php");
include_once("head.php");
?>
<!DOCTYPE html>
<html lang="fr">
  <body>
  <div class="site-wrap">
    <div class="site-blocks-cover" style="background-image: url(images/hero_1.jpg);" data-aos="fade">
      <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
          <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
            <h1 class="mb-2">Vous voyez les terrains de foot ? <i class="icon-heart" aria-hidden="true"></i></h1>
              <h2>moi non plus</h2>
            <div class="intro-text text-center text-md-left">
                <?php
                // If session value is empty or not and define index message
                if( !isset($_SESSION['pseudo']))
                {
                echo "Bienvenue à vous";
                }
                else
                {
                print "Bienvenue : $_SESSION[pseudo]";
                }
                ?>
              <p class="mb-4"> texte A </p>
              <p>
                <a href="#" class="btn btn-sm btn-primary">Shop Now</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include_once ("footer-1.php");
  include_once ("script.php");
  ?>
  </body>
</html>