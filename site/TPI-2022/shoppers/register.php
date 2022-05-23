<?php

///CPNV
///Author : Mathias Groux
///Date :10.05.2022
///Description : This page lets the user register


// Include Database
include_once ("DBAccess.php");
include_once ("head.php");
?>
<title>s'enregistrer</title>
  <body>
  <div class="site-wrap">
      <?php
      include_once "header.php";
      ?>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Veuillez entrer les informations nécessaires</h2>
          </div>
          <div class="col-md-7">
            <form action="formRegistration-2.php" method="post">
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="firstname" class="text-black">Prénom <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="firstname" name="firstname">
                  </div>
                  <div class="col-md-6">
                    <label for="surname" class="text-black">Nom de famille <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="surname" name="surname">
                  </div>
                    <div class="col-md-6">
                        <label for="pseudo" class="text-black">Pseudo<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo">
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="phoneNumber" class="text-black">Numéro de téléphone <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
                  </div>
                </div>
                  <div class="form-group row">
                      <div class="col-md-12">
                          <label for="password" class="text-black">mot de passe <span class="text-danger">*</span></label>
                          <input type="password" class="form-control" id="password" name="password">
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-md-12">
                          <label for="confirmPassword" class="text-black">Confirmez votre mot de passe <span class="text-danger">*</span></label>
                          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                      </div>
                  </div>
                <div class="form-group row">
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Envoyer">
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
  include_once ("script.php");
  include_once ("footer-2.php");
  ?>
  </body>
</html>