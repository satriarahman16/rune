<?php
if(!defined('BASE_PATH')){
    require_once '../koneksi.php';
}
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
    public $aset;
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
        //create array of user
        $asets = array();
        foreach($result as $r){
            //buat object user untuk tiap row data
            $aset = new Aset($r['id'],$r['kode_barang'],$r['nama_barang'],$r['nup'],$r['kode_unit'],);
            //simpan dalam array of user
            $asets[] = $aset;
        }
        return $asets;
    }
    // method untuk insert user, dengan satu paramerter, $user_baru adalah objek dari kelas user 
    public function insertAset($aset_baru){
        //buat objek koneksi
        $this->getConnection();
        //sql
        $sql = "INSERT INTO aset(kode_barang,nama_barang,nup,kode_unit) values(:kode_barang,:nama_barang,:nup,:kode_unit,:kode_unit)";
        //prepared stattemnet
        $stmt = $this->conn->prepare($sql);
        //bind param
        $stmt->bindParam(':kode_barang',$aset_baru->kode_barang);
        $stmt->bindParam(':nama_barang',$aset_baru->nama_barang);
        $stmt->bindParam(':nup',$aset_baru->nup);
        $stmt->bindParam(':kode_unit',$aset_baru->kode_unit);
        //eksekusi query
        // print_r($user_baru->kode_unit);
        $stmt->execute();
        
    }
    // method untuk update user
    public function updateAset($nip,$aset_baru){
            //buat objek koneksi
            $this->getConnection();
            //sql
            $sql = "UPDATE aset SET kode_barang=:kode_barang, nama_barang=:nama_barang, nup=:nup, kode_unit=:kode_unit WHERE id=:id";
            //prepared stattemnet
            $stmt = $this->conn->prepare($sql);
            //bind param
            $stmt->bindParam(':kode_barang',$aset_baru->kode_barang);
            $stmt->bindParam(':nama_barang',$aset_baru->nama_barang);
            $stmt->bindParam(':nup',$aset_baru->nup);
            $stmt->bindParam(':kode_unit',$aset_baru->kode_unit);
            $stmt->bindParam(':id',$id);
            //eksekusi query
            // print_r($user_baru->kode_unit);
            $stmt->execute();

    }
    // method untuk delete user
    public function deleteAset($id_dihapus){
        //buat objek koneksi
        $conn = new Connection();
        //sql
        $sql = "DELETE FROM aset WHERE id=:id";
        try{
            //prepared stattemnet
            $stmt = $conn->getConnection()->prepare($sql);
            //bind param
            $stmt->bindParam(':id',$id_dihapus);
            $stmt->execute();
            return true;
        }catch(Exception $e){
            echo 'gagal hapus data';
            return false;
        }
        

    }    
    // method untuk get user by id
    public function getAsetById($id){
        $this->getConnection();
        //buat query untuk select all
        $sql = "SELECT * FROM aset WHERE id=:id";
        //prepare statement
        $stmt = $this->conn->prepare($sql);
        // bind param
        $stmt->bindParam(':id',$id);
        //execute statement
        $stmt->execute();
        //fetch data
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // cek apakah ada user dengan id yg dimaksud
        
        if(isset($result['id'])){
            //create obj user
            $aset = new Aset($result['id'],$result['kode_barang'],$result['nama_barang'],$result['nup'],$result['kode_unit']);
            return $aset;
        }else{
            return null;
        } 
    }
    
//method untuk mencari user dengan kriteria tertentu
public function findAset($criteria){
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
    $sql = "SELECT * FROM aset WHERE $searchQuery";
    
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
    $asets = array();
    foreach($result as $r){
        //buat object user untuk tiap row data
        $aset = new Aset($r['id'],$r['kode_barang'],$r['nama_barang'],$r['nup'],$r['kode_unit']);
        //simpan dalam array of user
        $asets[] = $aset;
    }
    return $asets;
}
}



?>