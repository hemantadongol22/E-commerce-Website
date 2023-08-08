<?php
class DatabaseConnection
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $servername = "localhost";
        $dbname = "ecom";
        $user = "root";
        $pass = getenv('');

        $this->conn = mysqli_connect($servername, $user, $pass, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}



// Use the $connection object to perform database operations
