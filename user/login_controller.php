<?php
// kalau udah dipanggi gk dipanggil lagi
require_once BASE_PATH.'/user/model_user.php';
class LoginController{
    private $model;
    public function __construct(){
        //buat obj model user
        $this->model = new ModelUser();
    }
 
    
    //action index


    public function login(){
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

        $nip = $_GET['nip'];
        $password = $_GET['password'];
        $result = $this->model->getUserByNipPassword($nip, $password);

        if ($result === 1) {
            //$this->loadView('view/ui_user','','Tabel User');
            echo "login berhasil --";
        } else {
            // Jika login gagal, tampilkan pesan error
            echo "Login gagal. Cek kembali nip dan password anda.";
        }
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

        $nip = $_POST['nip'];
        $password = $_POST['password'];
        $result = $this->model->getUserByNipPassword($nip, $password);

        if ($result === 1) {
            $this->loadView('view/ui_user','','Tabel User');
        } else {
            // Jika login gagal, tampilkan pesan error
            echo "Login gagal. Cek kembali nip dan password anda.";
        }
    }
}

$userController = new UserController();
$userController->action();

?>