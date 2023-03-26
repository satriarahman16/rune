<?php

include "koneksi.php";

class User{
    public $nip;
    public $nama;
    public $role;
    public $kode_unit;
    public $password;

    public function __construct($nip,$nama,$role,$kode_unit,$password){
        $this->nip = $nip;
        $this->nama = $nama;
        $this->role = $role;
        $this->kode_unit = $kode_unit;
        $this->password = $password; 
    }
    

}

class ModelUser{
    public $user;
    //method untuk get all user
    public function getAllUser(){
        //call connection and fetch data
        $conn = new Connection();
        //buat query untuk select all
        $sql = "SELECT * FROM user";
        //prepare statement
        $stmt = $conn->getConnection()->prepare($sql);
        //execute statement
        $stmt->execute();
        //fetch data
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //create array of user
        $users = array();
        foreach($result as $r){
            //buat object user untuk tiap row data
            $user = new User($r['nip'],$r['nama'],$r['role'],$r['kode_unit'],$r['password'],);
            //simpan dalam array of user
            $users[] = $user;
        }
        return $users;
    }
    // method untuk insert user
    // method untuk update user
    // method untuk delete user
    // method untuk get user by id
}



?>