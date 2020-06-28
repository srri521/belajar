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
                      <th scope="col" class="serial">Aksi</th>
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
                        <td>
                            <a href="index.php?page=U_pembayaran&id_p=<?= $row["id_p"];?>">
                                <button type="submit" class="btn btn-success btn-sm">edit</button>
                            </a>

                            <a href="" onclick="return confirm('yakin mau menghapus data?')">
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


    <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <strong class="card-title mb-3" id="add">Riwayat Transaksi</strong>
                <a href="index.php?page=add&id_murid=<?= $id_murid;?>&tambah=1#add">
                    <button type="submit" class="btn btn-warning btn-sm">tambah</button>
                </a>
              <div class="table-responsive">
                <table class="table">
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
                    $i=1;
                    foreach($transaksi as $row):
                    ?>
                    <tr>
                        <td class="serial"><?= $i?></td>
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
                            <a href="index.php?page=formPembayaranDetail&bayar=<?= $row["id_t"];?>">
                              <button type="submit" class="btn btn-info btn-sm">bayar</button>
                            </a>
                       
                            <a href="">
                                <button type="submit" class="btn btn-success btn-sm">edit</button>
                            </a>

                            <a href="" onclick="return confirm('yakin mau menghapus data?')">
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
</div><!--End Row-->


















 