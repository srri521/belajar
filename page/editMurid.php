<?php 
// if($_SESSION["login"]==0){
//     echo "
//     <script>
//         document.location.href='index.php?page=user';
//     </script>
//     ";
// }
//query murid berdasarkan id
$id_user=$_GET["id_user"];
//query masasiswa berdasarkan id
$user=query("SELECT * FROM user WHERE id_user=$id_user")[0];

if(isset($_POST["editMurid"])){
    //mengecek apakah data telah diubah atau tidak
    if(queryUpdateMurid($_POST)>0){
        ?>
        
            <script>
                alert('Update Profil Berhasil!')
                document.location.href='index.php?page=editMurid&id_user=<?= $user["id_user"];?>';
            </script>
            
        <?php
    }else{
        ?>
        <script>
            alert('Maaf, Update gagal!!');
                document.location.href='index.php?page=editMurid&id_user=<?= $user["id_user"];?>';
        </script>
    <?php
    }
}
?>


    

<!-- <a href="index.php?page=formMurid">
    <button class="btn btn-primary btn-sm">kembali</button>
</a><br><br>
 -->


        

<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
<div class="row">
    <div class="col-md-4">
        <div class="feed-box text-center">
            <section class="card">
                <div class="card-body">
                    <img class="" style="width:150px; height:auto;" alt="" src="dist/img/<?= $user["photo"];?>">
                    <div class="col-12 col-md-9"><input type="file" id="photo" name="photo" class="form-control-file form-control-sm"></div>
                    <br><br>
                    
                    <div class="form-group">
                        <input type="text" id="nama" name="nama" placeholder="masukan nama" class="form-control form-control-sm" value="<?= $user["nama"]?>">
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
                        <input type="hidden" name="id_user" value="<?= $user["id_user"];?>">
                        <input type="hidden" name="gambarLama" value="<?= $user["photo"];?>">

                        <div class="row form-group">
                            <div class="col col-md-2"><label class=" form-control-label">ID</label></div>
                            <input type="number" id="id_user" name="id_user" placeholder="masukan id" class="col-md-10 form-control form-control-sm" value="<?= $user["id_user"]?>">
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-2"><label class=" form-control-label">TTL</label></div>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="tempat lahir" class="col-md-4 form-control form-control-sm" value="<?= $user["tempat_lahir"]?>" autocomplete="off">
                            <input type="date" id="tgl_lahir" name="tgl_lahir" placeholder="tanggal lahir" class="col-md-6 form-control form-control-sm" value="<?= $user["tgl_lahir"]?>">
                        </div>
                    
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="jk" class=" form-control-label">Jenis Kelamin</label></div>
                            <div class="col-md-9">
                                <select name="jk" id="jk" class="form-control-sm form-control">
                                    <option value="0">Pilih </option>
                                    <option value="laki-laki" <?php if($user["jk"]=="laki-laki"){echo "selected";}?>>Laki-laki </option>
                                    <option value="perempuan" <?php if($user["jk"]=="perempuan"){echo "selected";}?>>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-2"><label class=" form-control-label">Agama</label></div>
                            <input type="text" id="agama" name="agama" placeholder="agama" class="col-md-10 form-control form-control-sm" value="<?= $user["agama"]?>" autocomplete="off">
                        </div>

                        <label class=" form-control-label">Nama Orangtua</label>
                        <div class="row form-group">
                            <div class="col col-md-1"><label class=" form-control-label">Ayah</label></div>
                            <input type="text" id="nm_ayah" name="nm_ayah" placeholder="masukan nama ayah" class="col-md-4 form-control form-control-sm" value="<?= $user["nm_ayah"]?>" autocomplete="off">
                            <div class="col col-md-1"><label class=" form-control-label">Ibu</label></div>
                            <input type="text" id="nm_ibu" name="nm_ibu" placeholder="masukan nama ibu" class="col-md-6 form-control form-control-sm" value="<?= $user["nm_ibu"]?>">
                        </div>

                        <label class=" form-control-label">Pekerjaan Orangtua</label>
                        <div class="row form-group">
                            <div class="col col-md-1"><label class=" form-control-label">Ayah</label></div>
                            <input type="text" id="pk_ayah" name="pk_ayah" placeholder="masukan pekerjaan" class="col-md-4 form-control form-control-sm" value="<?= $user["pk_ayah"]?>" autocomplete="off">
                            <div class="col col-md-1"><label class=" form-control-label">Ibu</label></div>
                            <input type="text" id="pk_ibu" name="pk_ibu" placeholder="masukan pekerjaan" class="col-md-6 form-control form-control-sm" value="<?= $user["pk_ibu"]?>">
                        </div>
                    
                        <div class="row form-group">
                            <div class="col col-md-2"><label class=" form-control-label">Alamat</label></div>
                            <input type="text" id="alamat" name="alamat" placeholder="masukan alamat" class="col-md-10 form-control form-control-sm" value="<?= $user["alamat"]?>" autocomplete="off">
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-2"><label class=" form-control-label">No Hp</label></div>
                            <input type="text" id="no_hp" name="no_hp" placeholder="masukan no hp 089655xxxxx" class="col-md-10 form-control form-control-sm" value="<?= $user["no_hp"]?>" autocomplete="off">
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="jenjang" class=" form-control-label">Jenjang Kursus</label></div>
                            <div class="col-md-9">
                                <select name="jenjang" id="jenjang" class="form-control-sm form-control">
                                    <option value="0">Pilih </option>
                                    <option value="tk" <?php if($user["jenjang"]=="tk"){echo "selected";}?>>TKi </option>
                                    <option value="sd" <?php if($user["jenjang"]=="sd"){echo "selected";}?>>SD</option>
                                    <option value="smp" <?php if($user["jenjang"]=="smp"){echo "selected";}?>>SMP</option>
                                    <option value="smk" <?php if($user["jenjang"]=="smk"){echo "selected";}?>>SMK</option>
                                    <option value="umum" <?php if($user["jenjang"]=="umum"){echo "selected";}?>>Umum</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-2"><label class=" form-control-label">Jenis Kursus</label></div>
                            <input type="text" id="kursus" name="kursus" placeholder="masukan nama kursus" class="col-md-10 form-control form-control-sm" value="<?= $user["kursus"]?>" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <div class=""><label class=" form-control-label">Catatan</label></div>
                            <div class=""><textarea name="catatan" id="catatan" rows="9" placeholder="silakan isi pengalaman kursus anda" class="form-control form-control-sm" ><?= $user["catatan"]?></textarea></div>
                        </div>

                        <td>
                            <button  type="submit"  name="editMurid" class="btn btn-success btn-sm"><i class="fa fa-dot-circle-o"></i> save</button>
                        </a>
                        <!-- <a href="index.php?page=formMurid">
                            <button type="reset" class="btn btn-primary btn-sm"><i class="fa fa-ban"></i>close</button>
                        </a> -->
                    </td>
                </div>
            </section>
        </div>
    </div>
</div>
</form>