<?php
// kalau udah dipanggi gk dipanggil lagi
require_once BASE_PATH.'/user/model_penghuni.php';
class PenghuniController{
    private $model;
    public function __construct(){
        //buat obj model user
        $this->model = new ModelPenghuni();
    }
    public function action(){
        //ternary operator
        // isset apakah isinya ada 
        $act = isset($_GET['act'])?$_GET['act']:'index';
        // $act = $_GET['act']??'index';
        // route dari aplikasi
        switch($act){
            case 'awal':
                $this->awal();
                break;
            case 'index':
                $this->index();
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
            'field'=>array('id_penghuni','nama','nip','jabatan','pangkat_gol','kode_unit','asal'),
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

        $kumpulanPenghuni= $this->model->findPenghuni($criteria);

        //tampilkan data penghuni dlm bentuk tabel 
        $this->loadView('view/ui_penghuni',array('kumpulanPenghuni'=>$kumpulanPenghuni,'pesan'=>'helo','paramCari'=>$paramCari),'Tabel Penghuni');
    }
    public function awal(){
        //$this->loadView('view/form_login',[],'Ubah User');
        //URL_Helper::redirect('user/user_controller','',null);
        URL_Helper::redirect('user/view/form_login','',null);
        //URL_HELPER::createLink('user/user_controller','index',NULL);
    }


    //action update
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

$penghuniController = new PenghuniController();
$penghuniController->action();

?>