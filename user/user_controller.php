<?php
// kalau udah dipanggi gk dipanggil lagi
require_once BASE_PATH.'/user/model_user.php';
class UserController{
    private $model;
    public function __construct(){
        //buat obj model user
        $this->model = new ModelUser();
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
    
    //action index
    public function index(){
        //baca parameter namaCari
        $paramCari = isset($_GET['paramCari'])?$_GET['paramCari']:"";
        $sortParam = isset($_GET['sortParam'])?$_GET['sortParam']:"";
        //get all data user
        // $users = $this->model->getAllUser();
        // $users = $this->model->findUser(array('field'=>'nama','searchvalue'=>"%$paramCari%"));
        $criteria = array(
            'field'=>array('nip','nama','peran','kode_unit','password'),
            'searchvalue'=>"%$paramCari%",
            // 'sort' => 'nama DESC'
        );
        if($sortParam!=""){
            $criteria['sort'] = $sortParam;
        }
        $page = isset($_GET['page'])?$_GET['page']:1;
        //jumlah data per halaman
        $perpage = 2;
        //offset = page * perpage (1->0;2->2;3->4;4->6)
        $offset = ($page-1) * $perpage;

        $criteria['limit'] = $perpage;
        $criteria['offset'] = $offset;

        $users = $this->model->findUser($criteria);

        //tampilkan data user dlm bentuk tabel
        $this->loadView('view/ui_user',array('users'=>$users,'pesan'=>'helo','paramCari'=>$paramCari),'Tabel User');
    }

    //action delete
    public function delete(){
        //baca id yang mau di delete
        $nip_delete = $_GET['nip'];
        $status = $this->model->deleteUser($nip_delete);
        if($status){
            // header('location:user_controller.php');
            URL_Helper::redirect('user/user_controller','index',null);
        }
    }

    //action add
    public function create(){
        //cek apakah menampilkan form atau proses form
        if(isset($_POST['submit'])){
            //proses data
            //validasi dari sisi server
            if($_POST['nip']==""||$_POST['nama']==""||$_POST['peran']==""||$_POST['kode_unit']==""||$_POST['password']==""){
                echo 'DATA INVALID';
            }else{
                $user_baru = new User($_POST['nip'],$_POST['nama'],$_POST['peran'],$_POST['kode_unit'],$_POST['password']);
                //panggil fungsi insertUser
                $this->model->insertUser($user_baru);
                // header('location:user_controller.php');
                URL_Helper::redirect('user/user_controller','index',null);
            }
        }else{
            $this->loadView('view/form_user',[],'Add User');
        }
    }
    //action update
    public function update(){
        //baca parameter id user yang akan diupdate
        $nip_diupdate = $_GET['nip'];
        //get user berdasarkan id
        $user = $this->model->getUserByNip($nip_diupdate);
        if($user==null){
            echo 'user not found';
        }else{
             //cek apakah menampilkan form atau proses form
            if(isset($_POST['submit'])){
                //proses data
                $user_baru = new User($_POST['nip'],$_POST['nama'],$_POST['peran'],$_POST['kode_unit'],$_POST['password']);
                //panggil fungsi updateuser
                $this->model->updateUser($nip_diupdate,$user_baru);
                // header('location:user_controller.php');
                URL_Helper::redirect('user/user_controller','index',null);
            }else{
                $this->loadView('view/form_update',array('user'=>$user),'Ubah User');
            }
        }

    }

    //fungsi untuk load tampilan
    private function loadView($file,$data,$halaman){
        foreach($data as $key => $value){
            //membuat variable yang namanya adalah index dari elemen $data
            $$key = $value;
        }
        $namaModule = 'User';
        $linkModule = 'home';

        include BASE_PATH.'/template/header.php';
        // include BASE_PATH.'/user/view/ui_user.php';
        include BASE_PATH.'/user/'.$file.'.php';
        include BASE_PATH.'/template/footer.php';
    }
}

$userController = new UserController();
$userController->action();

?>