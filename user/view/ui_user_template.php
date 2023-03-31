<h2>Data User</h2>
<a href="user_controller.php?act=add">Buat User</a>
<table>
    <thead>
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Role</th>
            <th>Kode Unit</th>
            <th>Password</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($users as $u){
        ?>
            <tr>
                <td><?php echo $u->nip;?></td>
                <td><?php echo $u->nama;?></td>
                <td><?php echo $u->peran;?></td>
                <td><?php echo $u->kode_unit;?></td>
                <td><?php echo $u->password;?></td>
                <td>
                    <a href="user_controller.php?act=update&nip=<?php echo $u->nip;?>">Edit</a>
                    <a href="user_controller.php?act=delete&nip=<?php echo $u->nip;?>">Hapus</a>
                </td>
            </tr>
        <?php
            }
        ?>
        
    </tbody>
</table>