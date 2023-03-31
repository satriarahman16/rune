<?php
class Connection{
    public $conn;
    public function __construct(){
        $this->createConnection();
    }

    public function createConnection(){
        $dbhost = $_ENV['dbhost'];
        $dbname = $_ENV['dbname'];
        $dbuser = $_ENV['dbuser'];
        $dbpass = $_ENV['dbpass'];
        try{
            $this->conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Koneksi gagal: " . $e->getMessage();
        }
    }

    public function getConnection(){
        return $this->conn;
    }
}
?>