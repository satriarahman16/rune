<?php
if(!defined('BASE_PATH')){
    require_once '../koneksi.php';
}
//abstraksi dari tabel user
class Aset{
    public $id_aset;
    public $kode_barang;
    public $nama_barang;
    public $nup;
    public $kode_unit;
    public $status_validasi;
    public $alamat;
    public $lat_long;
    public $status_penggunaan;
    public $kondisi;
    public $luas_rn;


    public function __construct($id_aset,$kode_barang,$nama_barang,$nup,$kode_unit,
                                $status_validasi,
                                $alamat,$lat_long,$status_penggunaan,$kondisi,$luas_rn){
        $this->id_aset = $id_aset;
        $this->kode_barang = $kode_barang;
        $this->nama_barang = $nama_barang;
        $this->nup = $nup;
        $this->kode_unit = $kode_unit;
        $this->status_validasi = $status_validasi;
        $this->alamat = $alamat;
        $this->lat_long = $lat_long; 
        $this->status_penggunaan = $status_penggunaan;
        $this->kondisi = $kondisi;
        $this->luas_rn = $luas_rn;
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
        $sql = "SELECT * FROM t_aset 
                LEFT JOIN t_rn_detail ON t_rn_detail.id_aset=t_aset.id_aset
                LEFT JOIN r_validasi ON r_validasi.id_validasi=t_aset.id_validasi 
                WHERE LEFT(t_aset.kode_barang,1)='3'";
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
            $aset = new Aset($r['id_aset'],$r['kode_barang'],$r['nama_barang'],$r['nup'],$r['kode_unit'],
                             $r['status_validasi'],
                             $r['alamat'],$r['lat_long'],$r['status_penggunaan'],$r['kondisi'],$r['luas_rn']);
            //simpan dalam array of user
            $asets[] = $aset;
        }
        return $asets;
    }
    // method untuk insert user, dengan satu paramerter, $user_baru adalah objek dari kelas user 
    

    // method untuk update user
    public function updateAset($id_aset,$validasi_baru){
        //buat objek koneksi
        $this->getConnection();
        //sql
        $sql = "UPDATE t_aset SET id_validasi=:id_validasi WHERE id_aset=:id_aset";
        //prepared stattemnet
        $stmt = $this->conn->prepare($sql);
        //bind param
        $stmt->bindParam(':id_aset',$id_aset->id_aset);
        $stmt->bindParam(':id_validasi',$id_aset->id_validasi);
        //eksekusi query
        // print_r($user_baru->kode_unit);
        $stmt->execute();

}
    // method untuk delete user
    
    // method untuk get user by id
    public function getAsetById($id_aset){
        $this->getConnection();
        //buat query untuk select all
        $sql = "SELECT * FROM t_aset 
                LEFT JOIN t_rn_detail ON t_rn_detail.id_aset=t_aset.id_aset
                LEFT JOIN r_validasi ON r_validasi.id_validasi=t_aset.id_validasi
                WHERE t_aset.id_aset=:id";
        //prepare statement
        $stmt = $this->conn->prepare($sql);
        // bind param
        $stmt->bindParam(':id',$id_aset);
        //execute statement
        $stmt->execute();
        //fetch data
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // cek apakah ada user dengan id yg dimaksud
        
        if(isset($result['id_aset'])){
            //create obj user
            $aset = new Aset($result['id_aset'],$result['kode_barang'],$result['nama_barang'],$result['nup'],$result['kode_unit'],
                             $result['status_validasi'],
                             $result['alamat'],$result['lat_long'],$result['status_penggunaan'],$result['kondisi'],$result['luas_rn']);
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
    $sql = "SELECT * FROM t_aset 
            LEFT JOIN t_rn_detail ON t_rn_detail.id_aset=t_aset.id_aset
            LEFT JOIN r_validasi ON r_validasi.id_validasi=t_aset.id_validasi
            WHERE LEFT(t_aset.kode_barang,1)='3' AND ($searchQuery)";
    
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
        $aset = new Aset($r['id_aset'],$r['kode_barang'],$r['nama_barang'],$r['nup'],$r['kode_unit'],
                         $r['status_validasi'],
                         $r['alamat'],$r['lat_long'],$r['status_penggunaan'],$r['kondisi'],$r['luas_rn']
                        );
        //simpan dalam array of user
        $asets[] = $aset;
    }
    return $asets;
}
}



?>