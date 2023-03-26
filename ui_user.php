<?php
    include "model_user.php";
    $model = new ModelUser();
    $user = $model->getAllUser();

?>

<table>
    <thead>
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Role</th>
            <th>Kode Unit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($user as $u){
        ?>
            <tr>
                <td><?php echo $u->nip;?></td>
                <td><?php echo $u->nama;?></td>
                <td><?php echo $u->role;?></td>
                <td><?php echo $u->kode_unit;?></td>
                <td>
                    <a href="">Edit</a>
                    <a href="">Hapus</a>
                </td>
            </tr>
        <?php
            }
        ?>
        
    </tbody>
</table>