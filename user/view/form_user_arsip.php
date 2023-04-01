<!-- <?php
    // print_r($_POST);
    // cek, apakah ada data yang dikirimkan, atau form yg baru dibuka
    // include 'model_user.php';
    // if($_POST){
    //     echo "ada data yang akan diisi";
    //     // siapkan data yang akan diisi
    //     $user_baru = new User($_POST['nip'],$_POST['nama'],$_POST['peran'],$_POST['kode_unit'],$_POST['password']);
    //     //isi data ke datbase
    //     // buat objek model user
    //     $model = new ModelUser();
    //     // panggil fungsi insertuser
    //     $model->insertUser($user_baru);
    //     header('location:ui_user.php');
    // }else{
    //     echo"form baru dibuka";
    // }
?> -->


<form method ="POST"action="">
    <table>
        <!-- nip -->
        <tr>
            <td>nip</td>
            <td>
                <input type="text" name="nip"/>
            </td>
        <!-- nama -->
        <tr>
            <td>nama</td>
            <td>
                <input type="text" name="nama"/>
            </td>
        </tr>
        <!-- peran -->
        <tr>
            <td>peran</td>
            <td>
                <input type="text" name="peran"/>
            </td>
        </tr>
        <tr>
            <td>kode_unit</td>
            <td>
                <input type="text" name="kode_unit"/>
            </td>
        </tr>
        <tr>
            <td>password</td>
            <td>
                <input type="password" name="password"/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" values="SIMPAN"/>
            </td>
        </tr>        
    </table>
</form>