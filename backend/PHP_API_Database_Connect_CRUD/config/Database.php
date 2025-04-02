<?php
class database
{
    private $dbHost = 'localhost';
    private $dbName = 'crud_api_db';
    private $dbUser = 'crud_api_usr';
    private $dbPassword = 'Geheim1';
    private $conn;

    public function Connect()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO('mysql:host=' 
                          . $this->dbHost 
                          . ';dbname=' . $this->dbName
                        , $this->dbUser
                        , $this->dbPassword);
           //1st parameter: 'mysql:host=localhost;phprestapi_db'
           //2nd parameter: 'phprestapi_usr'
           //3rd parameter: 'Geheim1'
            $this->conn->setAttribute(PDO::ATTR_ERRMODE
                                ,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $this->conn;
    }
}
?>