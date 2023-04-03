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
        $act = isset($_GET['act'])?$_GET['act']:'awal';
        // $act = $_GET['act']??'index';
        // route dari aplikasi
        switch($act){
            case 'awal':
                $this->awal();
                break;
            case 'login':
                $this->login();
                break;
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
    public function awal(){
        //$this->loadView('view/form_login',[],'Ubah User');
        //URL_Helper::redirect('user/user_controller','',null);
        URL_Helper::redirect('user/view/form_login','',null);
        //URL_HELPER::createLink('user/user_controller','index',NULL);
    }

    public function login(){

        $nip = $_POST['nip'];
        $password = $_POST['password'];
        $result = $this->model->getUserByNipPassword($nip, $password);
     
        if ($result) {
            URL_Helper::redirect('user/user_controller','index',null);
            // echo "login berhasil";
        } else {
            // URL_Helper::redirect('user/view/form_update','index',null);
            //$this->loadView('view/form_login','','');
            // Jika login gagal, tampilkan pesan error
            $message = "User atau Password Salah";
            echo "<script type='text/javascript'>alert('$message');";
            echo "window.location.href = 'http://localhost/rumah_negara/rune/';</script>";
            // $message = "User atau Password Salah";
            // echo $message;
            // header('Refresh: 2; url=http://localhost/rumah_negara/rune/');
            // sleep(3);
            // header("location: http://localhost/rumah_negara/rune/");
            // URL_Helper::redirect('user/view/form_login','',null);
            // echo "Login gagal. Cek kembali nip dan password anda.";
        }
    }
        /*
        //baca parameter namaCari
        $paramCari = isset($_GET['paramCari'])?$_GET['paramCari']:"";

        //get all data user
        // $users = $this->model->getAllUser();
        // $users = $this->model->findUser(array('field'=>'nama','searchvalue'=>"%$paramCari%"));
        $criteria = array(
            'field'=>array('nip','nama','peran','kode_unit','password'),
            'searchvalue'=>"%$paramCari%",
            // 'sort' => 'nama DESC'
        );

        $page = isset($_GET['page'])?$_GET['page']:1;
        //jumlah data per halaman
        $perpage = 2;
        //offset = page * perpage (1->0;2->2;3->4;4->6)
        $offset = ($page-1) * $perpage;

        $criteria['limit'] = $perpage;
        $criteria['offset'] = $offset;
*/

        
/*
        $nip = $_GET['nip'];
        $password = $_GET['password'];
        $result = $this->model->getUserByNipPassword($nip, $password);
       
    if(isset($result['nip']) && password_verify($password, $result['password'])){
        // Jika data username dan password benar, buat objek user dan tampilkan halaman tampilan
        //$user = new User($result['nip'],$result['nama'],$result['peran'],$result['kode_unit'],$result['password']);
        $this->loadView('view/ui_user',array('users'=>$users,'pesan'=>'helo','paramCari'=>$paramCari),'Tabel User');
    }else{
        // Jika data username dan password salah, tampilkan pesan error
        $this->loadView('view/ui_login','','')->showError("Username atau password salah");
    }
    
        // $username = $_POST['username'];
        // mysql_num_rows($sql);
        // $query = mysql_query("select * from admin where username='$username' and password='$password'");
        $nip = $_POST['nip'];
        $password = $_POST['password'];
        $user = $this->model->getUserByNipPassword($nip, $password);
        if ($user) {
            //$this->view->displayLoginSuccess($nip);
            $this->loadView('view/ui_user',array('users'=>$users,'pesan'=>'helo','paramCari'=>$paramCari),'Tabel User');
        } else {
            $this->view->displayLoginError();
        }
        //tampilkan data user dlm bentuk tabel
        */
//   }


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
            if(isset($_POST['submit_update'])){
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

        include BASE_PATH.'/user/view/header.php';
        // include BASE_PATH.'/user/view/ui_user.php';
        include BASE_PATH.'/user/'.$file.'.php';
        include BASE_PATH.'/user/view/footer.php';
    }

    public function cobalogin($nip, $password){

        $nip = $_GET['nip'];
        $password = $_GET['password'];
        $result = $this->model->getUserByNipPassword($nip, $password);

        if($result == null){
            echo 'user not found';
        }else{
        if(isset($_POST['login'])){
            URL_Helper::redirect('user/user_controller','index',null);
        }else {
            echo "Login gagal.";
            }
            
        }
    }


        // $nip_diupdate = $_GET['nip'];
        // //get user berdasarkan id
        // $user = $this->model->getUserByNip($nip_diupdate);
        // if($user==null){
        //     echo 'user not found';
        // }else{
        //      //cek apakah menampilkan form atau proses form
        //     if(isset($_POST['submit_update'])){
        //         //proses data
        //         $user_baru = new User($_POST['nip'],$_POST['nama'],$_POST['peran'],$_POST['kode_unit'],$_POST['password']);
        //         //panggil fungsi updateuser
        //         $this->model->updateUser($nip_diupdate,$user_baru);
        //         // header('location:user_controller.php');
        //         URL_Helper::redirect('user/user_controller','index',null);
        //     }else{
        //         $this->loadView('view/form_update',array('user'=>$user),'Ubah User');
        //     }
        // }















        // $nip = $_POST['nip'];
        // $password = $_POST['password'];
        // $result = $this->model->getUserByNipPassword($nip, $password);

        // if ($result === 1) {
        //     $this->loadView('view/ui_user','','Tabel User');
        // } else {
        //     // Jika login gagal, tampilkan pesan error
        //     echo "Login gagal. Cek kembali nip dan password anda.";
        // }




    
}

$userController = new UserController();
$userController->action();

?>