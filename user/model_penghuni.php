<?php
if(!defined('BASE_PATH')){
    require_once '../koneksi.php';
}
//abstraksi dari tabel user
class Penghuni{
    public $id_penghuni;
    public $nama;
    public $nip;
    public $jabatan;
    public $pangkat_gol;
    public $kode_unit;
    public $asal;

    public function __construct($id_penghuni,$nama,$nip,$jabatan,$pangkat_gol,$kode_unit,$asal){
        $this->id_penghuni = $id_penghuni;
        $this->nama = $nama;
        $this->nip = $nip;
        $this->jabatan = $jabatan;
        $this->pangkat_gol = $pangkat_gol;
        $this->kode_unit = $kode_unit;
        $this->asal = $asal;
    }
    

}
//berisi fungsi" yang berinteraksi dengan data user
class ModelPenghuni{
// private artinya cuma bisa diakses di kelas tersebut 
    private $conn;
    private function getConnection(){
        //kalau sebelumnya belum ada obj koneksi maka buat
        if($this->conn==null){
            $con = new Connection();
            $this->conn = $con->getConnection();
        } 
    }

    public $penghuni;
    //method untuk get all user
    public function getAllPenghuni(){
        //call connection and fetch data
        // $conn = $this->getConnection()
        $this->getConnection();
        //buat query untuk select all
        $sql = "SELECT * FROM t_penghuni";
        //prepare statement
        $stmt = $this->conn->prepare($sql);
        //execute statement
        $stmt->execute();
        //fetch data
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //create array of user
        $kumpulanPenghuni = array();
        foreach($result as $r){
            //buat object user untuk tiap row data
            $penghuni = new Penghuni($r['id_penghuni'],$r['nama'],$r['nip'],$r['jabatan'],$r['pangkat_gol'],$r['kode_unit'],$r['asal']);
            //simpan dalam array of user
            $kumpulanPenghuni[] = $penghuni;
        }
        return $kumpulanPenghuni;
    }

    // method untuk get user by penghuni   
    public function getPenghuniById($id_penghuni){
        $this->getConnection();
        //buat query untuk select all
        $sql = "SELECT * FROM t_penghuni WHERE id_penghuni=:id_penghuni";
        //prepare statement
        $stmt = $this->conn->prepare($sql);
        // bind param
        $stmt->bindParam(':id_penghuni',$id_penghuni);
        //execute statement
        $stmt->execute();
        //fetch data
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // cek apakah ada user dengan id yg dimaksud
        
        if(isset($result['id_penghuni'])){
            //create obj user
            $penghuni = new Penghuni($result['id_penghuni'],$result['nama'],$result['nip'],$result['jabatan'],$result['pangkat_gol'],$result['kode_unit'],$result['asal']);
            return $penghuni;
        }else{
            return null;
        } 
    }
    
//method untuk mencari penghuni dengan kriteria tertentu
    public function findPenghuni($criteria){
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
        $sql = "SELECT * FROM t_penghuni WHERE $searchQuery";
        
        //jika ada parameter sort
        // array('field'=>array('NIK','nama'),'searchvalue'=>'3434','sort'=>'nama DESC')
        if(isset($criteria['sort'])){
            $sql .= 'ORDER BY '.$criteria['sort'];
        }
        //prepare statement
        $stmt = $this->conn->prepare($sql);
        //bind param
        $stmt->bindParam(':searchvalue',$searchvalue);
        //execute statement
        $stmt->execute();
        //fetch data
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //create array of user
        $kumpulanPenghuni = array();
        foreach($result as $r){
            //buat object user untuk tiap row data
            $penghuni = new Penghuni($r['id_penghuni'],$r['nama'],$r['nip'],$r['jabatan'],$r['pangkat_gol'],$r['kode_unit'],$r['asal']);
            //simpan dalam array of user
            $kumpulanPenghuni[] = $penghuni;
        }
        return $kumpulanPenghuni;
    }
    
}
?>