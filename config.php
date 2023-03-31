<?php
//nama database
$dbname = "rune";
//user database
$dbuser = 'root';
//password database
$dbpass = '';
//host database
$dbhost = 'localhost';
//base url
$base_url = "http://localhost/rumah_negara/rune/";

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

