<?php

///CPNV
///Auteur :             Mathias Groux
///Date :               04.05.2022
///Description :        This page includes the database link and all the SQL requests in functions.


class DBAccess
{
    // DB information
    const LOGIN = 'root';
    const PWD = '';
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
        // sql request
        $sql = "SELECT `id`,`name`,`width`,`length` FROM `fields`";

        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function getAllTeams()
    {
        // sql request
        $sql = "SELECT teams.id,teams.name,towns.name AS town FROM teams LEFT JOIN towns on towns.id = teams.id_towns";

        // Execute request
        return $this->executeSqlRequest($sql);
    }

    public function getAllTeamswithoutCoach()
    {
        // sql request
        $sql = "SELECT teams.id_towns,teams.id,teams.name,towns.name AS town FROM teams LEFT JOIN towns on towns.id = teams.id_towns WHERE teams.id_towns IS NULL";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function getAllCoaches()
    {
        // sql request
        $sql = "SELECT `id`,`surname`, `firstname`,`email` FROM `users`";

        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function getAsleepCoaches()
    {
        // sql request
        $sql = "SELECT `id`,`surname`, `firstname`,`email` FROM `users` WHERE adminActivated=0";

        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function getAllTNews()
    {
        // sql request
        $sql = "SELECT `id`,`title`,`date` FROM `news`";

        // Execute request
        return $this->executeSqlRequest($sql);
    }

    public function addUser($surname,$firstname,$pseudo,$phoneNumber,$email,$securedPassword)
    {
        // sql request
        $sql="INSERT INTO `users` (`id`, `surname`, `firstname`, `pseudo`, `phoneNumber`, `email`, `password`, `admin`, `userActivated`, `adminActivated`) VALUES (NULL, '$surname', '$firstname', '$pseudo', '$phoneNumber', '$email', '$securedPassword', '0', '1', '0')";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function activeTheUser($surname,$firstname,$pseudo,$phoneNumber,$email,$securedPassword)
    {
        // sql request
        $sql ="UPDATE `users` SET `surname` = '$surname', `firstname` = '$firstname', `pseudo` = '$pseudo', `phoneNumber` = '$phoneNumber', `password` = '$securedPassword', `userActivated` = '1' WHERE `email` = '$email'";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function wakeNewUser($id)
    {
        // sql request
        $sql="UPDATE `users` SET `adminActivated` = '1' WHERE `users`.`id` = $id";
        // Execute request
        return $this->executeSqlRequest($sql);
    }


    public function getUserAllValues($id)
    {
        // sql request
        $sql = "SELECT users.id as userID, surname,firstname,pseudo,phoneNumber,email, teams.id as teamID, teams.name AS teamName, adminActivated FROM users LEFT JOIN teams ON users.id = teams.id_users WHERE users.id = $id";
        // Execute request
        return $this->executeSqlRequest($sql);
    }

    public function updatePassword($newPassword,$pseudo)
    {
        $sql ="UPDATE `users` SET `password` = '$newPassword' WHERE `users`.`pseudo` = '$pseudo'";
        // Execute request
        return $this->executeSqlRequest($sql);

    }
    public function updateUser($id,$surname,$firstname,$pseudo,$phoneNumber,$email)
    {
        // sql request
        $sql="UPDATE `users` SET `surname` = '$surname', `firstname` = '$firstname', `pseudo` = '$pseudo', `phoneNumber` = '$phoneNumber', `email` = '$email' WHERE `users`.`id` = $id";
        // Execute request
        return $this->executeSqlRequest($sql);
    }

    public function getAdminRight($pseudo)
    {
        // sql request
        $sql = "SELECT admin FROM `users` WHERE pseudo = '$pseudo'";
        // Execute request
        return $this->executeSqlRequest($sql)[0];
    }

    public function getActivatedRight($pseudo)
    {
        // sql request
        $sql = "SELECT adminActivated,userActivated FROM `users` WHERE pseudo = '$pseudo'";
        // Execute request
        return $this->executeSqlRequest($sql)[0];

    }

    public function checkEmail($email)
    {
        // sql request
        $sql = "SELECT email,adminActivated,userActivated FROM `users` WHERE email = '$email'";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function checkTeam($name)
    {
        // sql request
        $sql = "SELECT name FROM `teams` WHERE name = '$name'";
        // Execute request
        return $this->executeSqlRequest($sql);
    }

    public function addUserFromAdmin($email)
    {
        $sql="INSERT INTO `users` (`id`, `surname`, `firstname`, `pseudo`, `phoneNumber`, `email`, `password`, `admin`, `userActivated`, `adminActivated`) VALUES (NULL, '', '', '', '', '$email', '', '0', '0', '1')";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function addTeam($name,$idTown)
    {
        // sql request
        $sql="INSERT INTO `teams` (`id`, `name`, `id_users`, `id_towns`) VALUES (NULL, '$name', NULL, '$idTown')";
        // Execute request
        return $this->executeSqlRequest($sql);

    }

    public function getUserPassword($pseudo)
    {
        // sql request
        $sql = "SELECT password FROM db_fields.users WHERE pseudo = '$pseudo'";
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
        return $this->executeSqlRequest($sql);
    }
    public function getAllFieldsValues($id)
    {
        // sql request
        $sql ="SELECT fields.id, fields.name, fields.width, fields.length, fields.comment, towns.name AS town FROM `fields` LEFT JOIN towns ON towns.id =fields.id_towns WHERE fields.id ='$id'";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function getAllTowns()
    {

        // sql request
        $sql = "SELECT id, name FROM towns";

        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function getNewsAllValues($id)
    {
        // sql request
        $sql ="SELECT news.id, news.date, news.title, news.information FROM `news`WHERE news.id ='$id'";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function updateNews($title,$information,$id)
    {
        $sql = "UPDATE `news` SET `Information` = '$information', `title` = '$title' WHERE `news`.`id` = $id";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function addNews($information,$title)
    {
        //Sql request
        $sql ="INSERT INTO `news` (`id`, `Information`, `date`, `title`) VALUES (NULL, '$information', CURRENT_DATE(), '$title')";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function addTown($name)
    {
        //Sql request
        $sql ="INSERT INTO `towns` (`id`, `name`) VALUES (NULL, '$name')";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function getTeamValues($id)
    {
        //Sql request
        $sql = "SELECT teams.id,teams.name,towns.name AS town FROM teams LEFT JOIN towns on towns.id = teams.id_towns WHERE teams.id='$id';";

        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function getUserFromTeam($id)
    {
        //Sql request
        $sql = "SELECT users.name AS name FROM users RIGHT JOIN teams on users.id = teams.id_users WHERE teams.id='$id'";

        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function updateTeam($id,$name,$town)
    {
        //Sql request
        $sql="UPDATE `teams` SET `name` = '$name', `id_towns` = '$town' WHERE `teams`.`id` = '$id'";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function getTown($town)
    {
        //Sql request
        $sql = "SELECT id FROM db_fields.towns WHERE name = '$town'";
        // Execute request
        return $this->executeSqlRequest($sql)[0]['id'];
    }
    public function addField($name,$width,$length,$comment,$id_towns)
    {
        $sql="INSERT INTO `fields` (`id`, `name`, `width`, `length`, `comment`, `id_towns`) VALUES (NULL, '$name', '$width', '$length', '$comment', '$id_towns')";
        // Execute request
        return $this->executeSqlRequest($sql);
    }

    public function updateField($id,$name,$length,$width,$comment,$idTown)
    {
        //Sql request
        $sql="UPDATE `fields` SET `name` = '$name', `width` = '$width', `length` = '$length', `comment` = '$comment', `id_towns` = '$idTown' WHERE `fields`.`id` = '$id'";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function getTownFromId($id)
    {
        //Sql request
        $sql = "SELECT id,name FROM db_fields.towns WHERE id = '$id'";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function updateTown($id,$name)
    {
        //Sql request
        $sql = "UPDATE `towns` SET `name` = '$name' WHERE `towns`.`id` = $id";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function deleteUSer($id)
    {
        //Sql request
        $sql="DELETE FROM `users` WHERE `users`.`id` = $id";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function trainATeam($idTeam,$idUser)
    {
        $sql="UPDATE `teams` SET `id_users` = '$idUser' WHERE `teams`.`id` = '$idTeam'";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function getUserID($pseudo)
    {
        $sql="SELECT users.id FROM users WHERE users.pseudo='$pseudo'";
        // Execute request
        return $this->executeSqlRequest($sql)[0]['id'];
    }
    public function getFieldId($field)
    {
        $sql="SELECT id FROM fields Where name='$field'";
        // Execute request
        return $this->executeSqlRequest($sql)[0]['id'];
    }
    public function getTeamID($team)
    {
        $sql="SELECT id FROM teams Where name='$team'";
        // Execute request
        return $this->executeSqlRequest($sql)[0]['id'];
    }
    public function createGame($day,$startTime,$endTime,$idLocalTeam,$idVisitorTeam,$idField)
    {
        $sql="INSERT INTO `games` (`id`, `date`, `startTime`, `endTime`, `idLocalTeam`, `idVisitorTeam`, `id_fields`) VALUES (NULL, '$day', '$startTime', '$endTime', '$idLocalTeam', '$idVisitorTeam', '$idField')";
        // Execute request
        return $this->executeSqlRequest($sql);
    }
    public function getTeamFromUser($pseudo)
    {
        $sql="SELECT teams.id FROM teams WHERE id_users =(SELECT id FROM users WHERE pseudo='$pseudo')";
        // Execute request
        return $this->executeSqlRequest($sql)[0]['id'];
    }
}


