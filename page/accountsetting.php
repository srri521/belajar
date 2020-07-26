<?php
    $user=query("SELECT * FROM user");

    
?>

<h4>Menu Pengelolaan User</h4>
<small>Menu ini merupakan menu pengelolaan user yang dapat mengelola dan mengunakan aplikasi.</small>
<br><br>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="table-stats order-table ov-h table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="serial">No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th class="serial">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        foreach($user as $row):
                        ?>
                        <tr>
                            <td class="serial"><?= $i?></td>
                            <td>
                            <img src="dist/img/<?= $row["photo"];?>" alt="" style="width:120px; height:auto;">
                            </td>
                            <td><?= $row["nama"];?></td>
                            <td><?= $row["username"];?></td>
                            <td><?= $row["role"];?></td>
                            
                            <td>
                                <a href="function/hapusUser.php?id_user=<?= $row["id_user"];?>" onclick="return confirm('yakin mau menghapus data?')">
                                    <button class="btn btn-danger btn-sm">hapus</button>
                                </a>
                            </td>    
                        </tr>
                        <?php 
                        $i++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    