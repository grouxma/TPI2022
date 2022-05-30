<?php

///CPNV
///Author : Mathias Groux
///Date :23.05.2022
///Description : This page lets the user add a new town.


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
                    <h2 class="h3 mb-3 text-black">Ajouter une ville</h2>
                </div>
                <div class="col-md-7">
                    <form action="formAddTown.php" method="post">
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">

                                <div class="col-md-6">
                                    <label for="title" class="text-black">Nom<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>


                            <div class="form-group row">
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Ajouter la ville">
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
include_once("footer.php");
?>
</body>
</html>