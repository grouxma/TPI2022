<?php


//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 05.05.2022
// Summary  : This page gets the information from register.php and creates a new user
//*********************************************************

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



    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Ajouter nouvel entraîneur</h2>
                </div>
                <div class="col-md-7">
                    <!--This form suggests the user to write down the information-->
                    <!--This goes to formRegister.php-->
                    <form action="formAdminRegister.php" method="post">
                        <div class="p-3 p-lg-5 border">

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="confirmEmail" class="text-black">Confirmez l'email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="confirmEmail" name="confirmEmail" placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Ajouter">
                                    <?php
                                    //I would like to add a button to ask the user to confirm the registration
                                    /*
                                     * //Informs the inputs are empty -> displays an error message
                                    echo '<body onLoad="alert(\'Pseudo ou mot de passe vide\')">';
                                    echo '<meta http-equiv="Refresh" content="0;URL=login.php">';
                                     */
                                    ?>
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