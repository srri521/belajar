<?php

$user=mysqli_query($conn, "SELECT * FROM user WHERE role='User'");
//var_dump($murid);die;
if ( isset($_POST["submit"]) ) {
    //ambil data dari tiap elemen dalam form
    //cek keberhasilan
    if( queryAddMurid($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'index.php?page=tampilPembayaran';
                </script>
            ";
        
    }else{
        echo "
                <script>
                    alert('data gagal ditambahkan!');
                    document.location.href = 'index.php';
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
    <!-- <link rel="stylesheet" href="dist/bootstrap.min.css"> -->
</head>

<!-- Mirrored from kvthemes.com/bangodash/color-version/table-data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2019 23:52:54 GMT -->

 
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Data Murid</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="dataTable table-bordered">
                <thead class="sorting">
                    <tr>
                    <th class="serial">No</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Jenjang kursus</th>
                    <th class="serial">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $i=1;
                foreach($user as $row): ?>
                <tr>
                    <td class="serial"><?= $i?></td>
                    <td><?= $row["nama"];?></td>
                    <td><?= $row["tempat_lahir"];?>,<?= $row["tgl_lahir"];?></td>
                    <td><?= $row["alamat"];?></td>
                    <td><?= $row["no_hp"];?></td>
                    <td><?= $row["jenjang"];?>, mengikuti kelas <?= $row["kursus"];?></td>
                    
                    <td>
                        <a href="index.php?page=formMuridTampil&id_user=<?= $row["id_user"];?>">
                            <button type="submit" class="btn btn-primary btn-sm">detail</button>
                        </a>
                        <a href="index.php?page=editMurid&id_user=<?= $row["id_user"];?>">
                            <button class="btn btn-success btn-sm">edit</button>
                        </a>
                        <a href="function/hapusMurid.php?id_user=<?= $row["id_user"];?>" onclick="return confirm('yakin mau menghapus data?')">
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
      </div><!-- End Row-->
    
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    
</body>


<!-- Mirrored from kvthemes.com/bangodash/color-version/table-data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2019 23:55:19 GMT -->
</html>
