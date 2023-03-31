<?php
// kalau udah dipanggi gk dipanggil lagi
require_once 'model_aset.php';
class AsetController{
    private $model;
    public function __construct(){
        //buat obj model aset
        $this->model = new ModelAset();
    }
    public function action(){
        //ternary operator
        // isset apakah isinya ada 
        $act = isset($_GET['act'])?$_GET['act']:'index';
        // $act = $_GET['act']??'index';
        // route dari aplikasi
        switch($act){
            case 'index':
                $this->index();
                break;
            case 'add':
                $this->create();
                // include 'form_user.php';
                break;
            case 'delete':
                $this->delete();
                break;
            case 'update':
                $this->update();
                break;
            default:
                $this->index();
            }
        }
    

    public function index(){
        // get all aset data
        $asets = $this->model->getAllAset();
        // tampilkan data aset dalam bentuk tabel
        $this->loadView('view/tabel_aset',array('aset'=>$asets,'pesan'=>'helo'));
    }

    // action delete
    public function delete(){
        $nip_delete = $_GET['nip'];
        $status = $this->model->deleteUser($nip_delete);
        if ($status){
            header('location:user_controller.php');
        }
    }

    //action add
    public function create(){
        //cek apakah menampilkan form atau proses form
        if(isset($_POST['submit'])){
            // proses data
            $user_baru = new User($_POST['nip'],$_POST['nama'],$_POST['peran'],$_POST['kode_unit'],$_POST['password']);
            // panggil fungsi insertuser
            $this->model->insertUser($user_baru);
            header('location:user_controller.php');
        }else{
            //arraynya kosong
            $this->loadView('view/form_user',array());
        }
        
    }
    //action update
    public function update(){
        $nip_diupdate = $_GET['nip'];
        // get user berdasarkan nsapi_request_headers
        $user = $this->model->getUserByNip($nip_diupdate);
        if($user==null){
            echo 'user not found';
        }else{
            if(isset($_POST['submit'])){
                // proses data
                $user_baru = new User($_POST['nip'],$_POST['nama'],$_POST['peran'],$_POST['kode_unit'],$_POST['password']);
                // panggil fungsi updateuser
                $this->model->updateUser($nip_diupdate,$user_baru);
                header('location:user_controller.php');
            }else{
                //sebelumnya include 'view/form_update.php'
                $this->loadView('view/form_update',array('user'=>$user));
                }
            }
        }



    //fungsi untuk load tampilan
    private function loadView($file,$data){
        foreach($data as $key => $value){
            $$key = $value;
        }
        // include '..template/header.php';
        include $file.'.php';
        
    }
}

$asetController = new AsetController();
$asetController->action();

?>