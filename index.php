<?php
//definisi absolute path
define('BASE_PATH', dirname(__FILE__));
// echo BASE_PATH;
require_once BASE_PATH.'/config.php';
require_once BASE_PATH.'/koneksi.php';
require_once BASE_PATH.'/utils/url_helper.php';

if(isset($_GET['ajax'])){
    $controller = isset($_GET['mod'])?$_GET['mod']:'user/user_controller';
    include BASE_PATH.'/'.$controller.'.php';
    exit();
}else{
    // include BASE_PATH.'/template/header.php';
    //baca halaman apa yang mau ditampilkan
    $controller = isset($_GET['mod'])?$_GET['mod']:'user/user_controller';
    
    include BASE_PATH.'/'.$controller.'.php';
    // include BASE_PATH.'/template/footer.php';
}



