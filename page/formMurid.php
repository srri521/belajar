<?php
$murid=query("SELECT * FROM murid");
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

<!-- Mirrored from kvthemes.com/bangodash/color-version/table-data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2019 23:52:54 GMT -->
<head>
 
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Data Murid</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
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
                foreach($murid as $row): ?>
                <tr>
                    <td class="serial"><?= $i?></td>
                    <td><?= $row["nama"];?></td>
                    <td><?= $row["tempat_lahir"];?>,<?= $row["tgl_lahir"];?></td>
                    <td><?= $row["alamat"];?></td>
                    <td><?= $row["no_hp"];?></td>
                    <td><?= $row["jenjang"];?>, mengikuti kelas <?= $row["kursus"];?></td>
                    
                    <td>
                        <a href="index.php?page=editAnggota&id_anggota=<?= $row["id_anggota"];?>">
                            <button type="submit" class="btn btn-success btn-sm">edit</button>
                        </a>

                        <a href="function/hapusMurid.php?id=<?= $row["id"]?>&id_user=<?= $id_user;?>" onclick="return confirm('yakin mau menghapus data?')">
                            <button class="btn btn-danger btn-sm">hapus</button>
                        </a>
                        <a href="index.php?page=tampilAnggota&id_anggota=<?= $row["id_anggota"];?>">
                            <button type="submit" class="btn btn-primary btn-sm">detail</button>
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
    
    <script>
     $(document).ready(function() {
      //Default data table
       $('#default-datatable').DataTable();


       var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
      } );

    </script>
    
</body>

<!-- Mirrored from kvthemes.com/bangodash/color-version/table-data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2019 23:55:19 GMT -->
</html>
