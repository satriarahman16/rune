<?php
class Connection{
    public $conn;
    public function __construct(){
        $this->createConnection();
    }

    public function createConnection(){
        try{
            $this->conn = new PDO("mysql:host=localhost;dbname=rune","root","");
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