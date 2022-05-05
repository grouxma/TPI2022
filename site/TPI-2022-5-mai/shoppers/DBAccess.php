<?php

///CPNV
///Auteur : Mathias Groux
///Date :
///Description :
///

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

        // Request recherche
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
    public function getUser($email)
    {
        // sql request
        $sql = "SELECT id,email,password FROM db_fields.users WHERE email = '$email'";

        // Execute request
        return $this->executeSqlRequest($sql)[0];

    } // End getUser()


    public function insertUsert($surname,$firstname,$phoneNumber,$email,$password,$admin)
    {
        echo "____".$sql = "INSERT INTO `db_fields.users`((NULL, surname, firstname, phoneNumber, email, password, admin) VALUES (NULL,$surname, $firstname,$phoneNumber,$email,$password,$admin)";

    }


}


