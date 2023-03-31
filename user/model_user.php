<?php
if(!defined('BASE_PATH')){
    require_once '../koneksi.php';
}
//abstraksi dari tabel user
class User{
    public $nip;
    public $nama;
    public $peran;
    public $kode_unit;
    public $password;

    public function __construct($nip,$nama,$peran,$kode_unit,$password){
        $this->nip = $nip;
        $this->nama = $nama;
        $this->peran = $peran;
        $this->kode_unit = $kode_unit;
        $this->password = $password; 
    }
    

}
//berisi fungsi" yang berinteraksi dengan data user
class ModelUser{
// private artinya cuma bisa diakses di kelas tersebut 
    private $conn;
    private function getConnection(){
        //kalau sebelumnya belum ada obj koneksi maka buat
        if($this->conn==null){
            $con = new Connection();
            $this->conn = $con->getConnection();
        } 
    }
    public $user;
    //method untuk get all user
    public function getAllUser(){
        //call connection and fetch data
        // $conn = $this->getConnection()
        $this->getConnection();
        //buat query untuk select all
        $sql = "SELECT * FROM users";
        //prepare statement
        $stmt = $this->conn->prepare($sql);
        //execute statement
        $stmt->execute();
        //fetch data
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //create array of user
        $users = array();
        foreach($result as $r){
            //buat object user untuk tiap row data
            $user = new User($r['nip'],$r['nama'],$r['peran'],$r['kode_unit'],$r['password'],);
            //simpan dalam array of user
            $users[] = $user;
        }
        return $users;
    }
    // method untuk insert user, dengan satu paramerter, $user_baru adalah objek dari kelas user 
    public function insertUser($user_baru){
        //buat objek koneksi
        $this->getConnection();
        //sql
        $sql = "INSERT INTO users(nip,nama,peran,kode_unit,`password`) values(:nip,:nama,:peran,:kode_unit,:pwd)";
        //prepared stattemnet
        $stmt = $this->conn->prepare($sql);
        //bind param
        $stmt->bindParam(':nip',$user_baru->nip);
        $stmt->bindParam(':nama',$user_baru->nama);
        $stmt->bindParam(':peran',$user_baru->peran);
        $stmt->bindParam(':kode_unit',$user_baru->kode_unit);
        $stmt->bindParam(':pwd',$user_baru->password);
        //eksekusi query
        // print_r($user_baru->kode_unit);
        $stmt->execute();
        
    }
    // method untuk update user
    public function updateUser($nip,$user_baru){
            //buat objek koneksi
            $this->getConnection();
            //sql
            $sql = "UPDATE users SET nama=:nama, peran=:peran, kode_unit=:kode_unit WHERE nip=:nip";
            //prepared stattemnet
            $stmt = $this->conn->prepare($sql);
            //bind param
            $stmt->bindParam(':nip',$user_baru->nip);
            $stmt->bindParam(':nama',$user_baru->nama);
            $stmt->bindParam(':peran',$user_baru->peran);
            $stmt->bindParam(':kode_unit',$user_baru->kode_unit);
            $stmt->bindParam(':kode_unit',$user_baru->password);
            //eksekusi query
            // print_r($user_baru->kode_unit);
            $stmt->execute();

    }
    // method untuk delete user
    public function deleteUser($nip_dihapus){
        //buat objek koneksi
        $conn = new Connection();
        //sql
        $sql = "DELETE FROM users WHERE nip=:nip";
        try{
            //prepared stattemnet
            $stmt = $conn->getConnection()->prepare($sql);
            //bind param
            $stmt->bindParam(':nip',$nip_dihapus);
            $stmt->execute();
            return true;
        }catch(Exception $e){
            echo 'gagal hapus data';
            return false;
        }
        

    }    
    // method untuk get user by id
    public function getUserByNip($nip){
        $this->getConnection();
        //buat query untuk select all
        $sql = "SELECT * FROM users WHERE nip=:nip";
        //prepare statement
        $stmt = $this->conn->prepare($sql);
        // bind param
        $stmt->bindParam(':nip',$nip);
        //execute statement
        $stmt->execute();
        //fetch data
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // cek apakah ada user dengan id yg dimaksud
        
        if(isset($result['nip'])){
            //create obj user
            $user = new User($result['nip'],$result['nama'],$result['peran'],$result['kode_unit'],$result['password']);
            return $user;
        }else{
            return null;
        } 
    }
    
//method untuk mencari user dengan kriteria tertentu
public function findUser($criteria){
    //criteria berupa array contoh: array('field'=>'NIK','searchvalue'=>'3434')
    //jika filed berupa array contoh: array('field'=>array('NIK','nama'),'searchvalue'=>'3434')
    $searchQuery = "";
    if(is_array($criteria['field'])){
        $fields = $criteria['field'];
        for($i=0;$i<count($fields);$i++){
            $searchQuery .= $fields[$i]." LIKE :searchvalue ";
            if($i<count($fields)-1){
                $searchQuery .= 'OR ';
            }
        }
        // foreach($fields as $f){
        //     $searchQuery .= $f." LIKE :searchvalue OR ";
        // }
    }else{
        $field = $criteria['field'];
        $searchQuery = $field." LIKE :searchvalue ";
    }
    $searchvalue = $criteria['searchvalue'];
    //call connection and fetch data
    $this->getConnection();
    //buat query untuk select all
    // $sql = "SELECT * FROM user WHERE $field like :searchvalue ";
    $sql = "SELECT * FROM users WHERE $searchQuery";
    
    //jika ada parameter sort
    // array('field'=>array('NIK','nama'),'searchvalue'=>'3434','sort'=>'nama DESC')
    if(isset($criteria['sort'])){
        $sql .= 'ORDER BY '.$criteria['sort'];
    }
    //baca criteria limit, offset
    // if(isset($criteria['limit']) && isset($criteria['offset'])){
    //     $sql .= ' limit '.$criteria['limit'].' offset '.$criteria['offset'];
    // }

    // prepare statement
    $stmt = $this->conn->prepare($sql);
    //bind param
    $stmt->bindParam(':searchvalue',$searchvalue);
    //execute statement
    $stmt->execute();
    //fetch data
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //create array of user
    $users = array();
    foreach($result as $r){
        //buat object user untuk tiap row data
        $user = new User($r['nip'],$r['nama'],$r['peran'],$r['kode_unit'],$r['password']);
        //simpan dalam array of user
        $users[] = $user;
    }
    return $users;
}
}



?>