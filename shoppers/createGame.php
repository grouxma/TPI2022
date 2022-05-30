<?php


//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 19.05.2022
// Summary  : This page lets the user plan a new game
//*********************************************************

// Include Database
include_once("DBAccess.php");
include_once("head.php");
?>
<title>Ajouter Entraîneur</title>
<body>
<div class="site-wrap">
    <?php
    include_once "header.php";

    $db = new DBAccess();

    ///This part searches if the user has a team.
    /// If the user does't has a team, he is redirected.
    $pseudo = $_SESSION['pseudo'];
    $hasTeam = $db->hasTeam($pseudo);
    if (empty($hasTeam)) {
        echo '<meta http-equiv="Refresh" content="0;URL=index.php">';
    }
    ?>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-3 text-black">Planifier un nouveau match</h2>
                </div>
                <div class="col-md-7">
                    <!--This form suggests the user to write down the information-->
                    <!--This goes to formRegister.php-->
                    <form action="formCreateGame.php" method="post">
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="team" class="text-black">Choississer Votre équipe adverse <span
                                                class="text-danger">*</span></label>
                                    <select class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            name="team">
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">

                                            <!-- Display the db list-->
                                            <?php

                                            // Research all teacher value
                                            $db = new DBAccess();
                                            $allTeams = $db->getAllTeamList();

                                            // Display  teachers values
                                            foreach ($allTeams as $team) {
                                                //echo "<option>$team[name]</option>";
                                                //echo "<option class=\"dropdown-item\">$team[name]\</option>";
                                                echo "<option class\=\"dropdown-item\" >$team[name]</option>";
                                            }
                                            ?>
                                        </div>
                                    </select>
                                    <label for="teams" class="text-black">Jour du match<span
                                                class="text-danger">*</span></label>
                                    <input type="date" id="birthday" name="day">
                                </div>
                            </div>
                            <label for="teams" class="text-black">Choississer une heure de début<span
                                        class="text-danger">*</span></label>
                            <input type="time" id="appt" name="startTime">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="teams" class="text-black">Choisissez une heure de fin<span
                                                class="text-danger">*</span></label>
                                    <input type="time" id="appt" name="endTime">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="selectField" class="text-black">Choississer le terrain <span
                                                class="text-danger">*</span></label>
                                    <select class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            name="field">
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">

                                            <!-- Display the db list-->
                                            <?php

                                            // Research all teacher value
                                            $db = new DBAccess();
                                            $allFields = $db->getFieldsList();

                                            // Display  teachers values
                                            foreach ($allFields as $field) {
                                                echo "<option>$field[name]</option>";
                                            }
                                            ?>
                                        </div>
                                    </select>
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
include_once("script.php");
include_once("footer.php");
?>
</body>
</html>