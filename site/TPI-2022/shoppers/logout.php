<?php
//*********************************************************
// Company  : CPNV
// Author   : Mathias Groux
// Date     : 10.05.2022
// Summary  : This page disconects the user
//*********************************************************



// Call sestion
session_start();

// Erase the session tab
session_unset();

// Destroy section to logout
session_destroy();

// Redirect index.php
echo '<meta http-equiv="Refresh" content="0;URL=index.php">';