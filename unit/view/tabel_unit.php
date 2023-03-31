<h2>Data Aset</h2>
<a href="aset_controller.php?act=add">Buat Aset</a>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>kode_barang</th>
            <th>nama_barang</th>
            <th>nup</th>
            <th>kode_unit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($aset as $u){
        ?>
            <tr>
                <td><?php echo $u->id;?></td>
                <td><?php echo $u->kode_barang;?></td>
                <td><?php echo $u->nama_barang;?></td>
                <td><?php echo $u->nup;?></td>
                <td><?php echo $u->kode_unit;?></td>
                <td>
                    <a href="aset_controller.php?act=update&nip=<?php echo $u->id;?>">Edit</a>
                    <a href="aset_controller.php?act=delete&nip=<?php echo $u->id;?>">Hapus</a>
                </td>
            </tr>
        <?php
            }
        ?>
        
    </tbody>
</table>