<?php
//nama database
$dbname = "kelompok5";
//user database
$dbuser = 'userkelompok5';
//password database
$dbpass = 'passkelompok5';
//host database
$dbhost = 'localhost';
//base url
//$base_url = "http://localhost/rumah_negara/rune/";
//$base_url = "";
$base_url = "../rune-main/";

$_ENV['DEV'] = getenv('DEV');

if($_ENV['DEV']){
    $_ENV['dbhost'] = $dbhost;
    $_ENV['dbname'] = $dbname;
    $_ENV['dbuser'] = $dbuser;
    $_ENV['dbpass'] = $dbpass;
    $_ENV['base_url'] = $base_url;
}else{
    $_ENV['dbhost'] = $dbhost;
    $_ENV['dbname'] = $dbname;
    $_ENV['dbuser'] = $dbuser;
    $_ENV['dbpass'] = $dbpass;
    $_ENV['base_url'] = $base_url;
}

