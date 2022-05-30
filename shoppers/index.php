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
              <?php

              if(isset($_SESSION['pseudo']))
              {
                  echo"<h1 class=\"mb-2\">Bienvenue</i></h1>"."<br>";
                  echo"<h2 class=\"mb-2\">$_SESSION[pseudo]</i></h2>"."<br>";
              }
              else
              {
                  echo"<h1 class=\"mb-2\">Bienvenue à vous</i></h1>"."<br>";
              }
              ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include_once("footer.php");
  include_once ("script.php");
  ?>
  </body>
</html>