<?php

echo $pseudo = $_POST['pseudo'];
echo $password = $_POST ['password'];


echo"<br>";

echo"<br>";

echo"<br>";

echo"<br>";
echo"<br>";

echo"<br>";
echo"test";



//Test if the user is activated
//$activated=$db->getActivatedRight($pseudo);



// gets the user information from the pseudo
//$data = $db->getUser($pseudo);


echo password_hash($password, PASSWORD_BCRYPT);
//password_hash(string $password, string|int|null $algo, array $options = []): string;
