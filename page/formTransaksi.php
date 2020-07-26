<?php
$id_user= $_SESSION["id_user"];

$transaksi1=mysqli_query($conn, "SELECT * FROM transaksi  
    JOIN user on transaksi.id_user = user.id_user
    JOIN pembayaran on transaksi.id_p = pembayaran.id_p
    WHERE transaksi.id_user=$id_user AND status='Belum Lunas'

    ");
$transaksi2=mysqli_fetch_array($transaksi1);

$user=mysqli_query($conn, "SELECT * FROM user WHERE id_user=$id_user");




?>



<h4>Status Pembayaran Murid</h4>
<br><br>

<div class="card">

    <div class="card-header">
        <strong class="card-title mb-3">My Profile</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <?php foreach ($user as $row ) :
                            # code...
                       ?>
            <div class="col-md-2">
                <img src="dist/img/<?= $row["photo"];?>" alt="" style="width:120px; height:auto;">
            </div>
            <div class="col-md-10">
                <table class="table" cellpadding="10" cellspacing="0">
                    <thead>
                        
                        <tr>
                            <th scope="row">ID Pendaftaran:</th>
                            <td scope="row"><?= $row["id_user"];?></td>
                            <th scope="row">Nama Lengkap :</th>
                            <td><?= $row["nama"];?></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Jenis Kursus :</th>
                            <td><?= $row["kursus"];?></td>
                            <th scope="row">Jenjang Kursus :</th>
                            <td><?= $row["jenjang"];?></td>
                        </tr>
                        
                    </tbody>
                    <?php  endforeach;  ?>
                </table>
            </div>    
        </div>
    </div>


</div><br>

<!-- kewajiban pembayaran -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6>Kewajiban Pembayaran</h6>
            </div>
            <div class="table-stats order-table ov-h table-responsive">
                <table class="table "> 
                    <thead >
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Pembayaran</th>
                            <th>Status</th>
                            <th>Rupiah</th>
                            <th class="serial">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td><?= $transaksi2["nama"];?></td>
                            <td><?= $transaksi2["ket_pembayaran"];?>-> Kelas <?= $transaksi2["kategori"];?></td>
                            <td>
                                <?php if($transaksi2["status"]=="Belum Lunas"){?>
                                    <span class="badge badge-danger"><?= $transaksi2["status"];?></span>
                                <?php }else{?>
                                    <span class="badge badge-primary"><?= $transaksi2["status"];?></span>
                                <?php }?>
                            </td> 
                            <td>Rp<?= $transaksi2["jml_bayar"];?>,-</td>
                            <td> 
                                <a href="index.php?page=formTransaksiTambah&id_t=<?= $transaksi2["id_t"];?>">
                                <button type="submit" class="btn btn-primary btn-sm">bayar sekarang</button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><br>
    </div>
</div>


<?php 
$trx1=query("SELECT * FROM transaksi  
    JOIN user on transaksi.id_user = user.id_user
    JOIN pembayaran on transaksi.id_p = pembayaran.id_p
    WHERE transaksi.id_user=$id_user AND status='Lunas'

    ");


 ?>

<!-- yang sudah dibayar -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6>Yang Sudah Dibayar</h6>
            </div>
            <div class="table-stats order-table ov-h table-responsive">
                <table class="table "> 
                    <thead >
                        <tr>
                            <th>Tanggal</th>
                            <th>Jenis Pembayaran</th>
                            <th>Status</th>
                            <th>Rupiah</th>
                            
                        </tr>
                    </thead>
                    <?php 
                        foreach ($trx1 as $row ) :
                             # code...
                         ?>
                    <tbody>
                        
                        
                        <tr>
                            <td><?= $row["tgl_bayar"];?></td>
                            <td><?= $row["ket_pembayaran"];?>-> Kelas <?= $row["kategori"];?></td>
                            <td>
                                <?php if($row["status"]=="Belum Lunas"){?>
                                    <span class="badge badge-danger"><?= $row["status"];?></span>
                                <?php }else{?>
                                    <span class="badge badge-primary"><?= $row["status"];?></span>
                                <?php }?>
                            </td> 
                            <td>Rp<?= $row["bayar"];?>,-</td>
                        </tr>

                    </tbody>
                <?php endforeach; ?>
                </table>
            </div>
        </div><br>
    </div>
</div>
