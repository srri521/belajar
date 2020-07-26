<?php

$pembayaran=mysqli_query($conn, "SELECT * FROM pembayaran");


if(isset($_POST["tambahPembayaran"])){
    if(queryAddPembayaran($_POST)>0){
        ?>
            <script>
                alert('data berhasil ditambahkan!!');
                document.location.href='index.php?page=formPembayaran';
            </script>
        <?php
    }else{
        ?>
            <script>
                alert('data gagal ditambahkan!!');
                document.location.href='index.php?page=formPembayaran';
            </script>
        <?php
    }
}

if(isset($_POST["editPembayaran"])){
    if(queryUpdatePembayaran($_POST)>0){
        ?>
            <script>
                alert('data berhasil diupdate!!');
                document.location.href='index.php?page=formPembayaran';
            </script>
        <?php
    }else{
        echo "
        <script>
        alert('data gagal diupdate!!');
            document.location.href='index.php?page=formPembayaran';
        </script>
    ";
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="dist/mycss.css">
    <link rel="stylesheet" href="dist/bootstrap.min.css">
</head>
 <h4>Daftar Data Pembayaran</h4>
 <button type="button" class="btn btn-outline-primary btn-round shadow-primary waves-effect waves-light m-1" data-toggle="modal" data-target="#PembayaranModal">
              tambah data
            </button>
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Daftar pembayaran</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                    <th class="serial">No</th>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Nominal</th>
                    <th class="serial">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $i=1;
                foreach($pembayaran as $row): ?>
                <tr>
                    <td class="serial"><?= $i?></td>
                    <td><?= $row["id_p"];?></td>
                    <td><?= $row["ket_pembayaran"];?></td>
                    <td><?= $row["kategori"];?></td>
                    <td>Rp. <?= $row["jml_bayar"];?> ,-</td>
                    
                    <td>
                        <a href="index.php?page=formPembayaran&id_p=<?= $row["id_p"];?>">
                            <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                        </a>
                        <a href="function/hapusPembayaran.php?id_p=<?= $row["id_p"];?>" onclick="return confirm('yakin mau menghapus data?')">
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        </a>
                    </td>    
                </tr>
                <?php 
                $i++;
                endforeach;?>
                    </tbody>
            </table>
            </div>
            </div>
          </div>
        </div>

        <!-- edit -->

    <?php if(isset($_GET["id_p"])){
    $id_p=$_GET["id_p"];
    $pembayaran2=query("SELECT * FROM pembayaran WHERE id_p=$id_p")[0];
    ?>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <strong>Edit Data</strong>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="id_p" value="<?= $pembayaran2["id_p"];?>">
                    
                    <div class="form-group">
                        <div class=""><label for="ket_pembayaran" class=" form-control-label">Judul</label></div>
                        <div class=""><input type="text" id="ket_pembayaran" name="ket_pembayaran" placeholder="Keterangan Pembayaran" class="form-control form-control-sm"  value="<?= $pembayaran2["ket_pembayaran"];?>"></div>
                    </div>

                    <div class="form-group">
                        <div class=""><label for="kategori" class=" form-control-label">Kategori</label></div>
                        <div class="">
                            <select name="kategori" id="kategori" class="form-control-sm form-control">
                                <option value="0">Pilih </option>
                                <option value="Privat" <?php if($pembayaran2["kategori"]=="Privat"){echo "selected";}?>>Privat </option>
                                <option value="Kelompok Belajar" <?php if($pembayaran2["kategori"]=="Kelompok Belajar"){echo "selected";}?>>Kelompok Belajar</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class=""><label for="jml_bayar" class=" form-control-label">Judul</label></div>
                        <div class=""><input type="number" id="jml_bayar" name="jml_bayar" placeholder="Masukan Nominal" class="form-control form-control-sm"  value="<?= $pembayaran2["jml_bayar"];?>"></div>
                    </div>
                    
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary btn-sm"  name="editPembayaran">
                            <i class="fa fa-dot-circle-o"></i> Edit
                        </button>

                        <button type="reset" class="btn btn-danger btn-sm ">
                            <i class="fa fa-ban"></i> Reset
                        </button>

                    </div>
                    
                </form>
                <div class="card-footer text-center">
                        <a href="index.php?page=formPembayaran">
                            <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-minus-circle"></i>batal</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
    <?php }?>

      </div><!-- End Row-->
    </div>
    <!-- End container-fluid-->
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->  
</body>
<!-- Mirrored from kvthemes.com/bangodash/color-version/table-data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2019 23:55:19 GMT -->
</html>


<!-- Modal Pembayaran-->
<div class="modal fade" id="PembayaranModal" tabindex="-1" role="dialog" aria-labelledby="PembayaranModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PembayaranModalLabel">Tambah Data Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-money"></i>
                   Input Pembayaran
                </h4>
              <form action="" method="post" enctype="multipart/form-data">

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="ket_pembayaran">Judul</label>
                   <input type="text" id="ket_pembayaran" class="form-control" name="ket_pembayaran" placeholder="keterangan pembayaran">
                  </div>

                  <div class="form-group col-4">
                    <div class=""><label for="kategori" class=" form-control-label">Kategori</label></div>
                        <div class="">
                            <select name="kategori" id="kategori" class="form-control-rounded form-control">
                                <option value="0">Pilih </option>
                                <option value="Privat">Privat</option>
                                <option value="Kelompok Belajar">Kelompok Belajar</option>
                            </select>
                        </div>
                    </div>


                  <div class="form-group">
                    <label for="jml_bayar">Jumlah Pembayaran</label>
                    <input type="number" class="form-control" id="jml_bayar" name="jml_bayar" placeholder="Masukan Nominal">
                    <small class="text-muted" ></small>
                  </div>
                   
            </div>
          </div>
        </div>
         </div>
      </div>
    </div>
 
      <div class="modal-footer">
        <button type="button" class="btn btn-dark shadow-dark m-1" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success shadow-success m-1" name="tambahPembayaran">Tambah</button>
      </div>
       </form>
        </div>
    </div>
    </div>
</div>


