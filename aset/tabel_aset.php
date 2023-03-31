<?php
require_once "../koneksi.php";
//abstraksi dari tabel user
class Aset{
    public $id;
    public $kode_barang;
    public $nama_barang;
    public $nup;
    public $kode_unit;

    public function __construct($id,$kode_barang,$nama_barang,$nup,$kode_unit){
        $this->id = $id;
        $this->kode_barang = $kode_barang;
        $this->nama_barang = $nama_barang;
        $this->nup = $nup;
        $this->kode_unit = $kode_unit; 
    }
    

}
//berisi fungsi" yang berinteraksi dengan data user
class ModelAset{
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
    public function getAllAset(){
        //call connection and fetch data
        // $conn = $this->getConnection()
        $this->getConnection();
        //buat query untuk select all
        $sql = "SELECT * FROM aset";
        //prepare statement
        $stmt = $this->conn->prepare($sql);
        //execute statement
        $stmt->execute();
        //fetch data
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //create array of aset
        $asets = array();
        foreach($result as $r){
            //buat object aset untuk tiap row data
            $aset = new Aset($r['id'],$r['kode_barang'],$r['nama_barang'],$r['nup'],$r['kode_unit'],);
            //simpan dalam array of aset
            $asets[] = $aset;
        }
        return $asets;
    }
    // method untuk insert user, dengan satu paramerter, $user_baru adalah objek dari kelas user 
    public function insertAset($aset_baru){
        //buat objek koneksi
        $this->getConnection();
        //sql
        $sql = "INSERT INTO aset(id,kode_barang,nama_barang,nup,kode_unit) values(:id,:kode_barang,:nama_barang,:nup,:kode_unit)";
        //prepared stattemnet
        $stmt = $this->conn->prepare($sql);
        //bind param
        $stmt->bindParam(':id',$aset_baru->id);
        $stmt->bindParam(':kode_barang',$aset_baru->kode_barang);
        $stmt->bindParam(':nama_barang',$aset_baru->nama_barang);
        $stmt->bindParam(':nup',$aset_baru->nup);
        $stmt->bindParam(':kode_unit',$aset_baru->kode_unit);
        //eksekusi query
        // print_r($user_baru->kode_unit);
        $stmt->execute();
        
    }
    // method untuk update user
    public function updateUser($id,$aset_baru){
            //buat objek koneksi
            $this->getConnection();
            //sql
            $sql = "UPDATE aset SET nama=:nama, peran=:peran, kode_unit=:kode_unit WHERE nip=:nip";
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
    
}



?>