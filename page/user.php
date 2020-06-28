
<?php
$id_murid=$_SESSION["id_murid"];
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

if(isset($_GET["bayar"])){
    if(bayar($_GET)>0){
        ?>
            <script>
                document.location.href='index.php?page=formPembayaranDetail';
            </script>
        <?php
    }else{
        echo "
        <script>
            document.location.href='index.php?page=formPembayaranDetail';
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
                            <th scope="row">Status:</th>
                            <span class="badge badge-danger"><?= $transaksi["status"];?></span>
                        </tr>
                    </tbody>
                </table>
            </div>    
        </div>
    </div>


</div><br>




<div class="row">
 <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <strong class="card-title mb-3" id="add">Riwayat Pembayaran</strong>
                <a href="index.php?page=add&id_murid=<?= $id_murid;?>&tambah=1#add">
                    <button type="submit" class="btn btn-primary btn-sm">tambah</button>
                </a>
              <div class="table-responsive">
                <table class="table">
                  <thead class="thead-light shadow-light">
                    <tr>
                      <th scope="col" class="serial">No</th>
                      <th scope="col">Ket</th>
                      <th scope="col">Kategori</th>
                      <th scope="col">Deadline</th>
                      <th scope="col">Pembayaran</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    foreach($pembayaran as $row):
                    ?>
                    <tr>
                        <td class="serial"><?= $i?></td>
                        <td><?= $row["ket_pembayaran"];?></td>
                        <td><?= $row["kategori"];?></td>
                        <td><?= $row["batas_bayar"];?></td>
                        <td>Rp.<?= $row["jml_bayar"];?>,-</td>    
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

