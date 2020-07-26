<?php
$transaksi2=query("SELECT 
    pembayaran.ket_pembayaran,
    pembayaran.kategori,
    pembayaran.jml_bayar,
    user.nama,  
    transaksi.id_t,
    transaksi.id_p,
    transaksi.id_user,
    transaksi.tgl_bayar,
    transaksi.bayar,
    transaksi.bkt_bayar,
    transaksi.status,
    pembayaran.id_p,
    user.id_user 
FROM pembayaran,user,transaksi
WHERE  pembayaran.id_p=transaksi.id_p  AND user.id_user=transaksi.id_user");



$pembayaran= query("SELECT * FROM pembayaran");
$user=query("SELECT * FROM user WHERE role='User'");



if(isset($_POST["tambahTransaksi"])){
    if(queryAddTransaksi($_POST)>0){
        
        echo "
            <script>
            alert('Transaksi Berhasil ditambahkan!!');
                document.location.href='index.php?page=formKonfirmasi';
            </script>
        ";
    }else{
        echo "
            <script>
            alert('Transaksi gagal ditambahkan!!');
                document.location.href='index.php?page=formKonfirmasi';
            </script>
        ";
    }
}

if(isset($_POST["editTransaksi"])){
    if(queryUpdateTransaksi($_POST)>0){
        ?>
            <script>
                alert('Update berhasil!!');
                document.location.href='index.php?page=formKonfirmasi';
            </script>
        <?php
    }else{
        echo "
        <script>
        alert('Update gagal!!');
                document.location.href='index.php?page=formKonfirmasi';
            </script>
    ";
    }
}

if(isset($_GET["bayar"])){
    if(bayar($_GET)>0){
        ?>
            <script>
                document.location.href='index.php?page=formKonfirmasi';
            </script>
        <?php
    }else{
        echo "
        <script>
            document.location.href='index.php?page=formKonfirmasi';
        </script>
    ";
    }
}

?>



<h4>Data Transaksi Pembayaran User</h4>
<br><br>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="dist/mycss.css">
    <!-- <link rel="stylesheet" href="dist/bootstrap.min.css"> -->
</head>

<!-- table -->
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <button  class="btn btn-outline-info shadow-info waves-effect waves-light m-1" data-toggle="modal" data-target="#tampilModalTambah">
                tambah transaksi
                </button>
            </div>
            <div class="table-stats order-table ov-h table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th>Nama</th>
                            <th>Ket</th>
                            <th>Tanggal Transaksi</th>
                            <th>Bukti Bayar</th>
                            <th>Status</th>
                            <th class="serial">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $k=1;
                        foreach($transaksi2 as $row):
                        ?>
                        <tr>
                            <td class="serial"><?= $k?></td>
                            <td><?= $row["nama"];?></td>
                            <td><?= $row["ket_pembayaran"];?><br> Kelas <?= $row["kategori"];?><br>Rp.<?= $row["jml_bayar"];?>,-
                                

                            </td>
                            <td><?= $row["tgl_bayar"];?></td>
                            <td>
                            <img src="dist/img/<?= $row["bkt_bayar"];?>" alt="" style="width:100px; height:auto;"><br>
                            Rp. <?= $row["bayar"];?>,-
                            </td>
                            <td>
                                <?php if($row["status"]=="Belum Lunas"){?>
                                    <span class="badge badge-danger"><?= $row["status"];?></span>
                                <?php }else{?>
                                    <span class="badge badge-primary"><?= $row["status"];?></span>
                                <?php }?>
                            </td>
                            <td>

                                <a href="index.php?page=formKonfirmasi&bayar=<?= $row["id_t"];?>">
                                    <button type="submit" class="btn btn-info btn-sm">byr</button>
                                </a>
                                <a href="index.php?page=formKonfirmasi&id_t=<?= $row["id_t"];?>">
                                    <button type="submit" class="btn btn-success btn-sm">edt</button>
                                </a>
                                <a href="function/hapusTransaksi.php?id_t=<?= $row["id_t"];?>" onclick="return confirm('yakin mau menghapus data?')">
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                </a>
                            </td>    
                        </tr>
                        <?php 
                        $k++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- edit -->
    <?php 
    if(isset($_GET["id_t"])){
    $id_t=$_GET["id_t"];
    $transaksi=query("SELECT * FROM transaksi WHERE id_t=$id_t")[0];

    ?>
    <div class="col-md-2">
        <div class="card">
            <div class="card-header">
                <strong>Edit Data</strong>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="id_t" value="<?= $transaksi["id_t"];?>">
                    <!-- <input type="hidden" name="gambar2" value="<?= $transaksi["bkt_bayar"];?>"> -->

                    <!-- <div class="form-group">
                        <div class=""><label for="id_p" class=" form-control-label">Ket</label></div>
                            <div class="">
                                <select name="id_p" id="id_p" class="form-control-sm form-control">
                                    <option value="0">Pilih</option>
                                    <?php foreach($pembayaran as $row): ?>
                                    <option value="<?= $row["id_p"];?>"><?= $row["ket_pembayaran"];?>-><?= $row["kategori"];?> </option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                    </div>
 -->
                   <!--  <div class="form-group">
                        <div class=""><label for="tgl_bayar" class=" form-control-label">Tanggal Transaksi</label></div>
                        <div class=""><input type="date" id="tgl_bayar" name="tgl_bayar" placeholder="" class="form-control form-control-sm" value="<?= $transaksi["tgl_bayar"];?>"></div>
                    </div> -->

                    <!-- <div class="form-group">
                        <div class=""><label for="bkt_bayar" class="form-control-label">Bukti Pembayaran</label></div>
                        <img class="" style="width:80px; height:auto;" alt="" src="dist/img/<?= $transaksi["bkt_bayar"];?>">
                        <div class=""><input type="file" id="bkt_bayar" name="bkt_bayar" class="form-control form-control-sm" ><small class="form-text text-muted">*file dalam bentuk gambar(png,jpg,jpeg)</small></div>
                    </div> -->

                    <div class="form-group">
                        <div class=""><label for="status" class=" form-control-label">Status</label></div>
                        <div class="">
                            <select name="status" id="status" class="form-control-sm form-control">
                                <option value="0">Pilih </option>
                                <option value="Lunas" <?php if($transaksi["status"]=="Lunas"){echo "selected";}?>>Lunas </option>
                                <option value="Belum Lunas" <?php if($transaksi["status"]=="Belum Lunas"){echo "selected";}?>>Belum Lunas</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary btn-sm"  name="editTransaksi">
                            <i class="fa fa-dot-circle-o"></i> 
                        </button>

                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> 
                        </button>

                    </div>
                    
                </form>
                <div class="card-footer text-center">
                        <a href="index.php?page=formKonfirmasi">
                            <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-minus-circle"></i>batal</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</div>



<!-- modal tambah -->
<div class="modal fade" id="tampilModalTambah" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <!-- awal data -->
                    <div class="card">
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        

                    <div class="form-group">
                        <div class=""><label for="id_p" class=" form-control-label">Ket</label></div>
                            <div class="">
                                <select name="id_p" id="id_p" class="form-control-sm form-control">
                                    <option value="0">Pilih</option>
                                    <?php foreach($pembayaran as $row): ?>
                                    <option value="<?= $row["id_p"];?>"><?= $row["id_p"];?>.<?= $row["ket_pembayaran"];?>-><?= $row["kategori"];?> </option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                    </div>

                    <div class="form-group">
                        <div class=""><label for="id_user" class=" form-control-label">Nama Murid</label></div>
                            <div class="">
                                <select name="id_user" id="id_user" class="form-control-sm form-control">
                                    <option value="0">Pilih Nama</option>
                                    <?php foreach($user as $row): ?>
                                    <option value="<?= $row["id_user"];?>"><?= $row["id_user"];?>.<?= $row["nama"];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                    </div>

                   <!--  <div class="form-group">
                        <div class=""><label for="tgl_bayar" class=" form-control-label">Tanggal Transaksi</label></div>
                        <div class=""><input type="date" id="tgl_bayar" name="tgl_bayar" placeholder="" class="form-control form-control-sm" placeholder=""></div>
                    </div>

                    <div class="form-group">
                        <div class=""><label for="bkt_bayar" class="form-control-label">Bukti Pembayaran</label></div>
                        <div class=""><input type="file" id="bkt_bayar" name="bkt_bayar" class="form-control form-control-sm" ><small class="form-text text-muted">*file dalam bentuk gambar(png,jpg,jpeg)</small></div>
                    </div>
                    -->            
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm" name="tambahTransaksi">
                                        <i class="fa fa-dot-circle-o "></i> Submit
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                </div>

                            </form>
                        </div>
                        
                    </div>
                    <!-- akhir data -->
                </div>
            </div>
        </div>
    </div>
</div>
    

