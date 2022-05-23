<?php

///CPNV
///Auteur :             Mathias Groux
///Date :               04.05.2022
///Description :        This page includes the database link and all the SQL requests in functions.
///

class DBAccess
{
    // DB information
    const LOGIN = 'root';
    const PWD = 'root';
    const DB_NAME = 'db_fields';
    const HOST = 'localhost';

    // DB connector
    private $dbConnect;

    /**
     * Name : dbConnect
     * Summary : DB PDO connection
     * Param : -
     * Return : -
     */
    private function dbConnect()
    {
        // Connexion to db_nickname
        $this->dbConnect = new PDO('mysql:dbname='.self::DB_NAME.';host='.self::HOST, self::LOGIN, self::PWD, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    } // End dbConnect()

    /**
     * Name : dbUnconnect
     * Summary : DB PDO disconnection
     * Param : -
     * Return : -
     */
    private function dbUnconnect()
    {
        // Connection destroy
        unset($this->dbConnect);

    } // End dbUnconnect()


    /**
     * Name : executeSqlRequest
     * Summary : Request function and execute request
     * Param : $sql = request
     * Return : $data = request result
     */
    private function executeSqlRequest($sql)
    {
        // $dbConnect reception
        $this->dbConnect();

        // prepare
        $request = $this->dbConnect->prepare($sql);

        // Request executed
        $request->execute();

        // Attributed thee request all database
        $datas = $request->fetchAll(PDO::FETCH_ASSOC);

        // Empty $request to memory
        $request->closeCursor();

        // Stop the db connection
        $this->dbUnconnect();

        // Return private information
        return($datas);
    } // End executeSqlRequest()



    /**
     * Name : getUser
     * Summary : Find the user in the database
     * Param : $name = login
     * Return : $sql = request return user and password
     */
    public function getUser($pseudo)
    {
        // sql request

        $sql = "SELECT pseudo,password FROM db_fields.users WHERE pseudo = '$pseudo'";

        // Execute request
        return $this->executeSqlRequest($sql)[0];

    } // End getUser()


    public function getUserAllInformation($pseudo)
    {
        // sql request
        $sql = "SELECT users.surname,users.firstname,users.pseudo,users.phoneNumber,users.email,users.password,teams.name FROM db_fields.users LEFT JOIN teams ON users.id = teams.id_users WHERE pseudo = '$pseudo'";

        // Execute request
        return $this->executeSqlRequest($sql);

    } // End getUser()


    public function getAllFields()
    {
        $sql = "SELECT `id`,`name`,`width`,`length` FROM `fields`";

        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function getAllTeams()
    {
        $sql = "SELECT `team.id`,`team.name`,`town.name` FROM `teams` LEFT JOIN ON town WHERE teams.id= ";

        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function getAllCoaches()
    {
        $sql = "SELECT `id`,`surname`, `firstname`,`email` FROM `users`";

        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function getAllTNews()
    {
        $sql = "SELECT `id`,`title`,`date` FROM `news`";

        // Execute request
        return $this->executeSqlRequest($sql);
    }

    public function addUser($surname,$firstname,$pseudo,$phoneNumber,$email,$password)
    {
        $sql = "INSERT INTO `users` (id, surname, firstname,pseudo, phoneNumber, email, password, admin) VALUES (NULL, '$surname', '$firstname', '$pseudo','$phoneNumber', '$email', '$password', 0)";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function getUserAllValues($id)
    {
        // sql request
        $sql = "SELECT users.id as userID, surname,firstname,pseudo,phoneNumber,email,password,admin,adminActivated, teams.id as teamID, teams.name AS teamName FROM users LEFT JOIN teams ON users.id = teams.id_users WHERE users.id = $id";
        // Execute request
        return $this->executeSqlRequest($sql);
    }

    public function updatePassword($pseudo,$newPassword)
    {
        // sql request
        $sql ="UPDATE `users` SET `password` = '$newPassword' WHERE pseudo = $pseudo";

        // Execute request
        return $this->executeSqlRequest($sql);
    }

    public function getAdminRight($pseudo)
    {
        $sql = "SELECT admin FROM `users` WHERE pseudo = '$pseudo'";
        // Execute request
        return $this->executeSqlRequest($sql)[0];
    }

    public function getActivatedRight($pseudo)
    {
        $sql = "SELECT adminActivated,userActivated FROM `users` WHERE pseudo = '$pseudo'";

        // Execute request
        return $this->executeSqlRequest($sql)[0];

    }

    public function checkEmail($email)
    {

        echo $sql = "SELECT email,adminActivated FROM `users` WHERE email = '$email'";
        // Execute request
        return $this->executeSqlRequest($sql);
    }


    public function addUserFromAdmin($email)
    {
        echo $sql="INSERT INTO `users` (`id`, `surname`, `firstname`, `pseudo`, `phoneNumber`, `email`, `password`, `admin`, `userActivated`, `adminActivated`) VALUES (NULL, '', '', '', '', '$email', '', '0', '0', '1')";
        // Execute request
        return $this->executeSqlRequest($sql);
    }

    public function getUserforPassword($pseudo)
    {
        // sql request

        echo $sql = "SELECT password FROM db_fields.users WHERE pseudo = '$pseudo'";

        // Execute request
        return $this->executeSqlRequest($sql)[0];

    } // End getUser()


    public function GetFieldsList()
    {
        // sql request
        $sql = "SELECT name FROM fields";

        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function getAllTeamList()
    {
        // sql request
        $sql = "SELECT name FROM teams";

        // Execute request
        return $this->executeSqlRequest($sql);
    }

    public function hasTeam($pseudo)
    {
        // sql request
        $sql="SELECT teams.id FROM teams WHERE id_users =(SELECT id FROM users WHERE pseudo='$pseudo')";


        // Execute request
        return $this->executeSqlRequest($sql)[0];
    }

    public function hasTeam2($pseudo)
    {
        // sql request
        $sql="SELECT fields.name FROM fieds WHERE id_users =(SELECT id FROM users WHERE pseudo='$pseudo')";


        // Execute request
        return $this->executeSqlRequest($sql)[0];


        /*SELECT * FROM `fields`
INNER JOIN `towns` ON fields.id_towns=towns.id
INNER JOIN  `teams` ON towns.id=teams.id_towns
WHERE `teams.id_users` =1;*/

    }





}


