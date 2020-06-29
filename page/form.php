<?php 
$id_murid=$_GET["id_murid"];
// if($_SESSION["login"]==0){
//     echo "
//     <script>
//         document.location.href='index.php?page=user';
//     </script>
//     ";
// }
//query masasiswa berdasarkan id
$murid=query("SELECT * FROM murid WHERE id_murid=$id_murid")[0];
$pembayaran=query("SELECT * FROM pembayaran WHERE id_murid=$id_murid ORDER BY batas_bayar DESC");
$transaksi=query("SELECT * FROM transaksi WHERE id=$id_murid ORDER BY tgl_bayar DESC");

if(isset($_POST["tambahPembayaran"])){
    if(queryAddPembayaran($_POST)>0){
        ?>
            <script>
                alert('data berhasil ditambahkan!!');
                document.location.href='index.php?page=form&id_murid=<?= $id_murid;?>';
            </script>
        <?php
    }else{
        ?>
            <script>
                alert('data gagal ditambahkan!!');
                document.location.href='index.php?page=form&id_murid=<?= $id_murid;?>';
            </script>
        <?php
    }
}

if(isset($_POST["editPembayaran"])){
    if(queryUpdatePembayaran($_POST)>0){
        ?>
            <script>
                alert('data berhasil diupdate!!');
                document.location.href='index.php?page=form&id_murid=<?= $id_murid;?>';
            </script>
        <?php
    }else{
        echo "
        <script>
        alert('data gagal diupdate!!');
            document.location.href='index.php?page=form&id_murid=<?= $id_murid;?>';
        </script>
    ";
    }
}

if(isset($_POST["tambahTransaksi"])){
    if(queryAddTransaksi($_POST)>0){
        ?>
            <script>
                document.location.href='index.php?page=form&id_murid=<?= $id_murid;?>';
            </script>
        <?php
    }else{
        ?>
            <script>
                alert('data gagal ditambahkan');
                document.location.href='index.php?page=form&id_murid=<?= $id_murid;?>';
            </script>
        <?php
    }
}

if(isset($_POST["editTransaksi"])){
    if(queryUpdateTransaksi($_POST)>0){
        ?>
            <script>
                document.location.href='index.php?page=form&id_murid=<?= $id_murid;?>';
            </script>
        <?php
    }else{
        echo "
        <script>
        alert('data gagal diupdate!!');
            document.location.href='index.php?page=form&id_murid=<?= $id_murid;?>';
        </script>
    ";
    }
}

$countPembayaran=query("SELECT * FROM pembayaran WHERE id_murid=$id_murid");
$i=0;
foreach($countPembayaran as $row):
    $i+=$row["jml_bayar"];
endforeach;

$countTransaksi=query("SELECT * FROM transaksi WHERE id=$id_murid");
$u=0;
foreach($countTransaksi as $row):
    $u+=$row["jml_bayar"];
endforeach;

?>

<a href="index.php?page=formPembayaran">
    <button class="btn btn-primary btn-sm">kembali</button>
</a><br><br>

<div class="card">
    <div class="card-header">
        <strong class="card-title mb-3">Penampilan Data Secara Rinci</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <img src="dist/img/<?= $murid["photo"];?>" alt="" style="width:120px; height:auto;">
            </div>
            <div class="col-md-10">
                <table class="table" cellpadding="10" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="row">ID :</th>
                            <td scope="row"><?= $murid["id_murid"];?></td>
                            <th scope="row">Nama Lengkap :</th>
                            <td><?= $murid["nama"];?></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Jenis Kursus :</th>
                            <td><?= $murid["kursus"];?></td>
                            <th scope="row">Jenjang Kursus :</th>
                            <td><?= $murid["jenjang"];?></td>
                        </tr>
                        <tr>
                            <th>Total Pembayaran :</th>
                            <td colspan="3">Rp <?= $i-$u;?>,-</td>
                        </tr>
                    </tbody>
                </table>
            </div>    
        </div>
    </div>


</div><br>


<div class="row">
    <!-- pembayaran -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"> 
                <strong class="card-title mb-3" id="pembayaran">Riwayat Pembayaran</strong>
                <a href="index.php?page=form&id_murid=<?= $id_murid;?>&tambah=1#pembayaran">
                    <button type="submit" class="btn btn-primary btn-sm">tambah pembayaran</button>
                </a>
            </div>
            <div class="card-body">
                <div class="card">
                    <!-- dinamis crud pembayaran -->
                    <?php
                    if(!isset($_GET["tambah"])){                    
                    ?>
                    <div class="table-stats order-table ov-h table-responsive">
                        <table class="table ">
                            <thead class="thead-light shadow-light">
                                <tr>
                                  <th scope="col" class="serial">No</th>
                                  <th scope="col">Ket</th>
                                  <th scope="col">Kategori</th>
                                  <th scope="col">Deadline</th>
                                  <th scope="col">Pembayaran</th>
                                  <th scope="col" class="serial">Aksi</th>
                                </tr>
                              </thead>
                            <tbody>
                                <?php
                                $e=1;
                                foreach($pembayaran as $row):
                                ?>
                                <tr>
                                    <td class="serial"><?= $e?></td>
                                    <td><?= $row["ket_pembayaran"];?></td>
                                    <td><?= $row["kategori"];?></td>
                                    <td><?= $row["batas_bayar"];?></td>
                                    <td>Rp.<?= $row["jml_bayar"];?>,-</td>
                                    <td>
                                        <a href="index.php?page=form&id_murid=<?= $id_murid;?>&tambah=2&id_p=<?= $row["id_p"]?>">
                                            <button type="submit" class="btn btn-success btn-sm">edit</button>
                                        </a>

                                        <a href="function/hapusPembayaran.php?id_p=<?= $row["id_p"]?>&id_murid=<?= $id_murid;?>" onclick="return confirm('yakin mau menghapus data?')">
                                            <button class="btn btn-danger btn-sm">hapus</button>
                                        </a>
                                    </td>    
                                </tr>
                                <?php 
                                $e++;
                                endforeach;?>
                                <tr>
                                    <td>Jumlah Pembayaran</td>
                                    <td> Rp <?= $i;?>,-</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php 
                        ?>
                    </div>
                    <?php
                    }else if($_GET["tambah"]==1){                  
                    ?>
                    <!-- menu tambah Pembayaran -->
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-group">
                            <div class=""><label for="id_murid" class=" form-control-label">ID </label></div>
                            <div class=""><input type="text" id="id_murid" name="id_murid" placeholder="Masukan ID " class="form-control form-control-sm" autocomplete="off" value="<?= $id_murid;?>"></div>
                        </div>

                        <div class="form-group">
                            <div class=""><label for="ket_pembayaran" class=" form-control-label">Keterangan Pembayaran</label></div>
                            <div class=""><input type="text" id="ket_pembayaran" name="ket_pembayaran" class="form-control form-control-sm"></div>
                        </div>

                        <div class="form-group">
                         <div class=""><label for="kategori" class=" form-control-label">Kategori</label></div>
                            <div class="">
                                <select name="kategori" id="kategori" class="form-control-sm form-control">
                                    <option value="0">Pilih </option>
                                    <option value="Kelompok Belajar">Kelompok Belajar </option>
                                    <option value="Privat">Privat</option>
                                </select>
                            </div>
                         </div>


                        <div class="form-group">
                            <div class=""><label for="batas_bayar" class=" form-control-label">Tanggal Batas Pembayaran</label></div>
                            <div class=""><input type="date" id="batas_bayar" name="batas_bayar" class="form-control form-control-sm"><small class="form-text text-muted">bulan-tanggal-tahun</small></div>
                        </div>

                        <div class="form-group">
                            <div class=""><label for="jml_bayar" class=" form-control-label">Masukan Nomilan Uang(Rp)</label></div>
                            <div class=""><input type="number" id="jml_bayar" name="jml_bayar" placeholder="masukan Nominal" class="form-control form-control-sm" autocomplete="off" value=""></div>
                            <small class="form-text text-muted">Masukan nominal dengan satuan Rupiah(Rp).</small>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"  name="tambahPembayaran">
                                <i class="fa fa-dot-circle-o"></i> Tambah
                            </button>

                            <button type="reset" class="btn btn-danger ">
                                <i class="fa fa-ban"></i> Reset
                            </button>
  
                        </div>
                        
                    </form>
                    <div class="card-footer text-center">
                        <a href="index.php?page=form&id_murid=<?= $id_murid;?>#pembayaran">
                            <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-minus-circle"></i>batal</button>
                        </a>   
                    </div>
                    
                    <!-- akhir menu tambah pembayaran -->
                    
                    <?php
                    }else if($_GET["tambah"]==2){
                        $id_p=$_GET["id_p"];
                        $U_Pembayaran=query("SELECT * FROM pembayaran WHERE id_p=$id_p")[0];
                    ?>
                    <!-- menu edit pembayaran -->
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="id_p" value="<?= $U_Pembayaran["id_p"];?>">
                        <div class="form-group">
                            <div class=""><label for="id_murid" class=" form-control-label">ID Murid </label></div>
                            <div class=""><input type="text" id="id_murid" name="id_murid" placeholder="Masukan ID Murid" class="form-control form-control-sm" autocomplete="off" value="<?= $id_murid;?>" disabled></div>
                        </div>

                        <div class="form-group">
                        <div class=""><label for="ket_pembayaran" class=" form-control-label">Keterangan Pembayaran</label></div>
                        <div class=""><input type="text" id="ket_pembayaran" name="ket_pembayaran" placeholder="Masukan Keterangan Pembayaran" class="form-control form-control-sm" autocomplete="off" value="<?= $U_Pembayaran["ket_pembayaran"];?>"></div>
                        </div>

                        <div class="form-group">
                            <div class=""><label for="kategori" class=" form-control-label">Kategori</label></div>
                                <div class="">
                                    <select name="kategori" id="kategori" class="form-control-sm form-control">
                                        <option value="0">Pilih </option>
                                        <option value="Kelompok Belajar" <?php if($U_Pembayaran["kategori"]=="Kelompok Belajar"){echo "selected";}?>>Kelompok Belajar </option>
                                        <option value="Privat" <?php if($U_Pembayaran["kategori"]=="Privat"){echo "selected";}?>>Privat</option>
                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                            <div class=""><label for="batas_bayar" class=" form-control-label">Tanggal Batas Pembayaran</label></div>
                            <div class=""><input type="date" id="batas_bayar" name="batas_bayar" class="form-control form-control-sm" value="<?= $U_Pembayaran["batas_bayar"];?>"><small class="form-text text-muted">bulan-tanggal-tahun</small></div>
                        </div>

                        <div class="form-group">
                            <div class=""><label for="jml_bayar" class=" form-control-label">Masukan Nomilan Uang(Rp)</label></div>
                            <div class=""><input type="number" id="jml_bayar" name="jml_bayar" placeholder="masukan Nominal" class="form-control form-control-sm" autocomplete="off" value="<?= $U_Pembayaran["jml_bayar"];?>"></div>
                            <small class="form-text text-muted">Masukan nominal dengan satuan Rupiah(Rp).</small>
                        </div>
                        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"  name="editPembayaran">
                                <i class="fa fa-dot-circle-o"></i> Edit
                            </button>

                            <button type="reset" class="btn btn-danger ">
                                <i class="fa fa-ban"></i> Reset
                            </button>

                        </div>
                        
                    </form>
                    <div class="card-footer text-center">
                        <a href="index.php?page=form&id_murid=<?= $id_murid;?>#pembayaran">
                            <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-minus-circle"></i>batal</button>
                        </a>   
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- transaksi -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title mb-3" id="transaksi">Riwayat Transaksi</strong>
                <a href="index.php?page=form&id_murid=<?= $id_murid;?>&transaksi=1#transaksi">
                    <button type="submit" class="btn btn-warning btn-sm">tambah</button>
                </a>
            </div>
            <div class="card-body">
                <div class="card">
                    <!-- dinamis transaksi crud -->
                    <?php
                    if(!isset($_GET["transaksi"])){                    
                    ?>
                    <div class="table-stats order-table ov-h table-responsive">
                        <table class="table ">
                            <thead class="thead-light shadow-light">
                                <tr>
                                  <th scope="col" class="serial">No</th>
                                  <th scope="col">Tanggal</th>
                                  <th scope="col">Pembayaran</th>
                                  <th scope="col">Bukti Bayar</th>
                                  <th scope="col">Status</th>
                                  <th scope="col" class="serial">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $f=1;
                                foreach($transaksi as $row):
                                ?>
                                <tr>
                                    <td class="serial"><?= $f?></td>
                                    <td><?= $row["tgl_bayar"];?></td>
                                    <td><?= $row["jml_bayar"];?></td>
                                    <td>
                                    <img src="dist/img/<?= $row["bkt_bayar"];?>" alt="" style="width:80px; height:auto;">
                                    </td>
                                    <td>
                                            <?php if($row["status"]=="belum dibayar"){?>
                                                <span class="badge badge-danger"><?= $row["status"];?></span>
                                            <?php }else{?>
                                                <span class="badge badge-primary"><?= $row["status"];?></span>
                                            <?php }?>
                                    </td>
                                    <td>
                                        <a href="index.php?page=form&id_murid=<?= $id_murid;?>&transaksi=2&id_t=<?= $row["id_t"]?>">
                                            <button type="submit" class="btn btn-success btn-sm">edit</button>
                                        </a>

                                        <a href="function/hapusTransaksi.php?id_t=<?= $row["id_t"]?>&id_murid=<?= $id_murid;?>" onclick="return confirm('yakin mau menghapus data?')">
                                            <button class="btn btn-danger btn-sm">hapus</button>
                                        </a>
                                    </td>    
                                </tr>
                                <?php
                                $f++;
                                endforeach;?>
                                <tr>
                                    <td>Jumlah Transaksi</td>
                                    <td> Rp <?= $u;?>,-</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php 

                        ?>
                    </div>
                    <?php
                    }else if($_GET["transaksi"]==1){                  
                    ?>
                    <!-- menu tambah transaksi -->
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="id_t" value="<?= $U_Transaksi["id_t"];?>">
                        <input type="hidden" name="id_p" value="<?= $U_Transaksi["id_p"];?>">
                        <input type="hidden" name="id" value="<?= $U_Transaksi["id"];?>">
                        <div class="form-group">
                            <div class=""><label for="id_murid" class=" form-control-label">ID Murid</label></div>
                            <div class=""><input type="text" id="id_murid" name="id_murid" placeholder="Masukan ID Murid" class="form-control form-control-sm" autocomplete="off" value="<?= $murid["id_murid"];?>"></div>
                        </div>

                        <div class="form-group">
                            <div class=""><label for="tgl_bayar" class=" form-control-label">Tanggal Transaksi</label></div>
                            <div class=""><input type="date" id="tgl_bayar" name="tgl_bayar" class="form-control form-control-sm"><small class="form-text text-muted">bulan-tanggal-tahun</small></div>
                        </div>

                        <div class="form-group">
                            <div class=""><label for="jml_bayar" class=" form-control-label">Masukan Nomilan Uang(Rp)</label></div>
                            <div class=""><input type="number" id="jml_bayar" name="jml_bayar" placeholder="masukan Nominal" class="form-control form-control-sm" autocomplete="off" value=""></div>
                            <small class="form-text text-muted">Masukan nominal dengan satuan Rupiah(Rp).</small>
                        </div>

                        <div class="form-group">
                            <div class=""><label for="bkt_bayar" class=" form-control-label">Bukti Pembayaran</label></div>
                            <div class=""><input type="file" id="bkt_bayar" name="bkt_bayar" class="form-control form-control-sm"><small class="form-text text-muted">*kirim dalam bentuk gambar(png,jpg,jpeg)</small></div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"  name="tambahTransaksi">
                                <i class="fa fa-dot-circle-o"></i> Tambah
                            </button>

                            <button type="reset" class="btn btn-danger ">
                                <i class="fa fa-ban"></i> Reset
                            </button>
  
                        </div>
                        
                    </form>
                    <div class="card-footer text-center">
                        <a href="index.php?page=form&id_murid=<?= $id_murid;?>#transaksi">
                            <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-minus-circle"></i>batal</button>
                        </a>   
                    </div>

                    
                    <!-- akhir menu tambah transaksi -->
                    
                    <?php
                    }else if($_GET["transaksi"]==2){
                        $id_t=$_GET["id_t"];
                        $U_Transaksi=query("SELECT * FROM transaksi WHERE id_t=$id_t")[0];
                    ?>
                    <!-- menu edit pembayaran -->
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="id_t" value="<?= $U_Transaksi["id_t"];?>">
                        <input type="hidden" name="id_p" value="<?= $U_Transaksi["id_p"];?>">
                        <input type="hidden" name="id" value="<?= $U_Transaksi["id"];?>">
                        <div class="form-group">
                            <div class=""><label for="id_murid" class=" form-control-label">ID Murid</label></div>
                            <div class=""><input type="text" id="id_murid" name="id_murid" placeholder="Masukan ID Murid" class="form-control form-control-sm" autocomplete="off" value="<?= $id_murid;?>" disabled></div>
                            <small class="form-text text-muted">ID Murid diganti apabila diperlukan.</small>
                        </div>

                        <div class="form-group">
                            <div class=""><label for="tgl_bayar" class=" form-control-label">Tanggal Transaksi</label></div>
                            <div class=""><input type="date" id="tgl_bayar" name="tgl_bayar" class="form-control form-control-sm" value="<?= $U_Transaksi["tgl_bayar"];?>"><small class="form-text text-muted">bulan-tanggal-tahun</small></div>
                        </div>

                        <div class="form-group">
                            <div class=""><label for="jml_bayar" class=" form-control-label">Masukan Nomilan Uang(Rp)</label></div>
                            <div class=""><input type="number" id="jml_bayar" name="jml_bayar" placeholder="masukan Nominal" class="form-control form-control-sm" autocomplete="off" value="<?= $U_Transaksi["jml_bayar"];?>"></div>
                            <small class="form-text text-muted">Masukan nominal dengan satuan Rupiah(Rp).</small>
                        </div>

                        <div class="form-group">
                            <div class=""><label for="bkt_bayar" class=" form-control-label">Bukti Pembayaran</label></div><img class="" style="width:150px; height:auto;" alt="" src="dist/img/<?= $U_Transaksi["bkt_bayar"];?>">
                            <div class=""><input type="file" id="bkt_bayar" name="bkt_bayar" class="form-control form-control-sm"><small class="form-text text-muted">*kirim dalam bentuk gambar(png,jpg,jpeg)</small></div>
                        </div> 
                        
                        <div class="form-group">
                            <div class=""><label for="status" class=" form-control-label">Status</label></div>
                            <div class="">
                                <select name="status" id="status" class="form-control-sm form-control">
                                    <option value="0">Pilih </option>
                                    <option value="lunas" <?php if($U_Transaksi["status"]=="lunas"){echo "selected";}?>>lunas </option>
                                    <option value="belum lunas" <?php if($U_Transaksi["status"]=="belum lunas"){echo "selected";}?>>belum lunas</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"  name="editTransaksi">
                                <i class="fa fa-dot-circle-o"></i> Edit
                            </button>

                            <button type="reset" class="btn btn-danger ">
                                <i class="fa fa-ban"></i> Reset
                            </button>

                        </div>
                        
                    </form>
                    <div class="card-footer text-center">
                        <a href="index.php?page=form&id_murid=<?= $id_murid;?>#transaksi">
                            <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-minus-circle"></i>batal</button>
                        </a>   
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
