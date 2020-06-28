<?php 
$id_murid=$_GET["id_murid"];
// if($_SESSION["login"]==0){
//     echo "
//     <script>
//         document.location.href='index.php?page=user';
//     </script>
//     ";
// }
//query murid berdasarkan id
$murid2=query("SELECT * FROM murid WHERE id_murid=$id_murid")[0];
?>

<a href="index.php?page=formMurid">
    <button class="btn btn-primary btn-sm">kembali</button>
</a><br><br>

<div class="row">
    <div class="col-md-4">
        <div class="feed-box text-center">
            <section class="card">
                <div class="card-body">
                    <div class="card" style="width: 18rem;">
                      <img src="dist/img/<?= $murid2["photo"];?>" class="card-img-top" alt="">
                      <div class="card-body">
                        <h5 class="card-title"><?= $murid2["nama"]?></h5>
                      </div>
                    </div>
                </div>
            </section>
        </div>
    </div>



    <div class="col-md-8">
        <div class="feed-box ">
            <section class="card">
                <div class="card-body">
                    <div class="card-header">
                        <strong class="card-title" style="font-size: 25px; font-family: bold;">Rincian Data Murid</strong>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="row">ID</th>
                                <td scope="row"><?= $murid2["id_murid"];?></td>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <th scope="row">Tempat, Tanggal Lahir</th>
                                <td><?= $murid2["tempat_lahir"];?>, <?= $murid2["tgl_lahir"];?><br>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Jenis Kelamin</th>
                                <td><?= $murid2["jk"];?></td>
                            </tr>
                            <tr>
                                <th scope="row">Agama</th>
                                <td><?= $murid2["agama"];?></td>
                            </tr>
                             
                             <th scope="row">Nama Orangtua  :</th>
                            <tr>
                                <p><th scope="row">Ayah</th></p>
                                <td><?= $murid2["nm_ayah"];?></td>
                            </tr>
                            <tr>
                                <p><th scope="row">Ibu</th></p>
                                <td><?= $murid2["nm_ibu"];?></td>
                            </tr>

                            <th scope="row">Pekerjaan Orangtua  :</th>
                            <tr>
                                <p><th scope="row">Ayah</th></p>
                                <td><?= $murid2["pk_ayah"];?></td>
                            </tr>
                            <tr>
                                <p><th scope="row">Ibu</th></p>
                                <td><?= $murid2["pk_ibu"];?></td>
                            </tr>

                            <tr>
                                <th scope="row">Alamat</th>
                                <td><?= $murid2["alamat"];?></td>
                            </tr>
                            <tr>
                                <th scope="row">No Hp</th>
                                <td><?= $murid2["no_hp"];?></td>
                            </tr>
                            <tr>
                                <th scope="row">Jenjang Kursus</th>
                                <td><?= $murid2["jenjang"];?></td>
                            </tr>
                            <tr>
                                <th scope="row">Jenis Kursus yang diikuti</th>
                                <td><?= $murid2["kursus"];?></td>
                            </tr>
                            <tr>
                                <th scope="row">Catatan :</th>
                                <td><?= $murid2["catatan"];?></td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>