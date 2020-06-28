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
 <h4>Daftar Data Pembayaran Murid Fawwaaz Kiddy Club</h4>
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
                    <th>ID</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>Jenis Kelamin</th>
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
                    <td><?= $row["id_murid"];?></td>
                    <td><?= $row["nama"];?></td>
                    <td><?= $row["tempat_lahir"];?>,<?= $row["tgl_lahir"];?></td>
                    <td><?= $row["jk"];?></td>
                    <td><?= $row["no_hp"];?></td>
                    <td><?= $row["jenjang"];?>, mengikuti kelas <?= $row["kursus"];?></td>
                    
                    <td>
                        <a href="index.php?page=formPembayaranDetail&id_murid=<?= $row["id_murid"];?>">
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
    
</body>

<!-- Mirrored from kvthemes.com/bangodash/color-version/table-data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2019 23:55:19 GMT -->
</html>
