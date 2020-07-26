<?php 

$id_user=$_GET["id_user"];
// if($_SESSION["login"]==0){
//     echo "
//     <script>
//         document.location.href='index.php?page=user';
//     </script>
//     ";
// }
//query murid berdasarkan id
$user2=query("SELECT * FROM user WHERE id_user=$id_user")[0];
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
                      <img src="dist/img/<?= $user2["photo"];?>" class="card-img-top" alt="">
                      <div class="card-body">
                        <h5 class="card-title"><?= $user2["nama"]?></h5>
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
                                <td scope="row"><?= $user2["id_user"];?></td>
                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                <th scope="row">Tempat, Tanggal Lahir</th>
                                <td><?= $user2["tempat_lahir"];?>, <?= $user2["tgl_lahir"];?><br>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Jenis Kelamin</th>
                                <td><?= $user2["jk"];?></td>
                            </tr>
                            <tr>
                                <th scope="row">Agama</th>
                                <td><?= $user2["agama"];?></td>
                            </tr>
                             
                             <th scope="row">Nama Orangtua  :</th>
                            <tr>
                                <p><th scope="row">Ayah</th></p>
                                <td><?= $user2["nm_ayah"];?></td>
                            </tr>
                            <tr>
                                <p><th scope="row">Ibu</th></p>
                                <td><?= $user2["nm_ibu"];?></td>
                            </tr>

                            <th scope="row">Pekerjaan Orangtua  :</th>
                            <tr>
                                <p><th scope="row">Ayah</th></p>
                                <td><?= $user2["pk_ayah"];?></td>
                            </tr>
                            <tr>
                                <p><th scope="row">Ibu</th></p>
                                <td><?= $user2["pk_ibu"];?></td>
                            </tr>

                            <tr>
                                <th scope="row">Alamat</th>
                                <td><?= $user2["alamat"];?></td>
                            </tr>
                            <tr>
                                <th scope="row">No Hp</th>
                                <td><?= $user2["no_hp"];?></td>
                            </tr>
                            <tr>
                                <th scope="row">Jenjang Kursus</th>
                                <td><?= $user2["jenjang"];?></td>
                            </tr>
                            <tr>
                                <th scope="row">Jenis Kursus yang diikuti</th>
                                <td><?= $user2["kursus"];?></td>
                            </tr>
                            <tr>
                                <th scope="row">Catatan :</th>
                                <td><?= $user2["catatan"];?></td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>