<?php
//MySqli procedural
// $conn = mysqli_connect("localhost","root","","perpustakaan");
// if(!$conn){
//     die("Koneksi gagal: " . mysqli_connect_error());
// }
// echo "Koneksi berhasil";

//Mysqli OOP
// $conn = new mysqli("localhost","root","","perpustakaan");
// if($conn->connect_error){
//     die("Koneksi gagal: " . $conn->connect_error);
// }
// echo "Koneksi berhasil";

//tes emil

//PDO
try{
    $con = new PDO("mysql:host=localhost;dbname=perpustakaan","root","");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Koneksi berhasil";
    //query data
    $sql = "SELECT * FROM user";
    //buat statement
    $stmt = $con->prepare($sql);
    //eksekusi query
    $stmt->execute();
    //tampilkan data
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($result);

//ubah
}catch(PDOException $e){
    echo "Koneksi gagal: " . $e->getMessage();
}
