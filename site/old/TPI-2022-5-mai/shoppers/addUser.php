<?php

///CPNV
///Auteur : Mathias Groux
///Date :
///Description :

// Include Database
include_once ("DBAccess.php");
include_once ("head.php");
?>
<title>Ajouter Entraîneur</title>
<body>

<div class="site-wrap">
    <?php
    include_once "header.php";
    ?>

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.php">Page A</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Page B</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Ajouter nouvel entraîneur</h2>
                </div>
                <div class="col-md-7">

                    <form action="formRegister.php" method="post">

                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="firstname" class="text-black">Prénom <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="firstname" name="firstname">
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname" class="text-black">Nom de famille <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lastname" name="lastname">
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