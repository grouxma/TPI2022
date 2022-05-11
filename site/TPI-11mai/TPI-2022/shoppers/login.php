<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 04.05.2022
// Summary  : this page displays the form for the connection
//*********************************************************

// Include Database
include_once ("DBAccess.php");
include_once ("head.php");
include_once "header.php";
?>

<body>
<div class="site-wrap">
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Se connecter</h2>
                </div>
                <div class="col-md-7">

                    <form name="formLogin.php" action="formLogin.php" method="post">

                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="pseudo" class="text-black">Pseudo <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="pseudo" name="pseudo">
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="text-black">mot de passe <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Se connecter">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
<?php
include_once ("footer-2.php");
include_once ("script.php");
?>
</div>


</body>
</html>