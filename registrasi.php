<?php

// session_start();
require 'function/function.php';
if(isset($_POST["register"])){
    if(register($_POST)>0){
        echo "
        <script>
            document.location.href='login.php';
        </script>
    ";
    
    }else{
        echo "
        <script>
        alert ('user baru gagal dibuat');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from kvthemes.com/bangodash/color-version/authentication-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2019 23:56:23 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Sistem Informasi Lembaga Bimbingan Belajar</title>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body>
 <!-- Start wrapper-->
 <div class="container">
 <div id="wrapper">
	<div class="card card-primary mx-auto my-5 animated bounceInDown col-9 mt-4 ">
		<div class="card-header">
			  <div class="card-title text-uppercase text-center pb-2">Registrasi Pendaftaran Kursus</div>
			 </div>
		<div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="form-row">
                        	<div class="form-group col-4">
                                <div class=""><label for="username" class=" form-control-label">Username</label></div>
                                <div class=""><input type="text" id="username" name="username" placeholder="masukan username" class="form-control form-control-rounded" autocomplete="off"></div>
                                <small>contoh : fawwaz@gmail.com</small>
                            </div>
                            <div class="form-group col-4">
                                <div class=""><label for="password" class=" form-control-label">Password</label></div>
                                <div class=""><input type="password" id="password" name="password" placeholder="masukan password" class="form-control form-control-rounded"></div>
                            </div>
                            <div class="form-group col-4">
                                <div class=""><label for="password2" class=" form-control-label">Konfirmasi Password</label></div>
                                <div class=""><input type="password" id="password2" name="password2" placeholder="konfirmasi password" class="form-control form-control-rounded"></div>
                            </div>


                            <div class="form-group col-4">
                                <div class=""><label for="nama" class=" form-control-label">Nama</label></div>
                                <div class=""><input type="text" id="nama" name="nama" placeholder="masukan nama" class="form-control form-control-rounded" autocomplete="off"></div>
                            </div>
                             <div class="form-group col-4">
                                <div class=""><label for="tempat_lahir" class=" form-control-label">Tempat Lahir</label></div>
                                <div class=""><input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="masukan tempat lahir" class="form-control form-control-rounded" autocomplete="off"></div>
                            </div>
                            <div class="form-group col-4">
                                <div class=""><label for="tgl_lahir" class=" form-control-label">Tanggal Lahir</label></div>
                                <div class=""><input type="date" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control form-control-rounded"><small class="form-text text-muted">tanggal-bulan-tahun</small></div>
                            </div>

                            <div class="form-group col-4">
                                <div class=""><label for="jk" class=" form-control-label">Jenis Kelamin</label></div>
                                <div class="">
                                    <select name="jk" id="jk" class="form-control-rounded form-control">
                                        <option value="0">Pilih </option>
                                        <option value="laki-laki">Laki-laki </option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            
                           
                            <div class="form-group col-4">
                                <div class=""><label for="agama" class=" form-control-label">Agama</label></div>
                                <div class=""><input type="text" id="agama" name="agama" placeholder="masukan agama" class="form-control form-control-rounded" autocomplete="off"></div>
                            </div> 

                                                
                            <div class="form-group col-6">
                            	<h6>Nama Orangtua</h6>
                                <div class=""><label for="nm_ayah" class=" form-control-label">Ayah</label></div>
                                <div class=""><input type="text" id="nm_ayah" name="nm_ayah" placeholder="masukan nama ayah" class="form-control form-control-rounded" autocomplete="off"></div>

                                <div class=""><label for="nm_ibu" class=" form-control-label">Ibu</label></div>
                                <div class=""><input type="text" id="nm_ibu" name="nm_ibu" placeholder="masukan nama ibu" class="form-control form-control-rounded" autocomplete="off"></div>
                            </div>

                            <div class="form-group col-6">
                            	<h6>Pekerjaan Orangtua</h6>
                                <div class=""><label for="pk_ayah" class=" form-control-label">Ayah</label></div>
                                <div class=""><input type="text" id="pk_ayah" name="pk_ayah" placeholder="masukan pekerjaan ayah" class="form-control form-control-rounded" autocomplete="off"></div>

                                <div class=""><label for="pk_ibu" class=" form-control-label">Ibu</label></div>
                                <div class=""><input type="text" id="pk_ibu" name="pk_ibu" placeholder="masukan pekerjaan ibu" class="form-control form-control-rounded" autocomplete="off"></div>
                            </div>

                            <div class="form-group col-4">
                                <div class=""><label for="alamat" class=" form-control-label">Alamat</label></div>
                                <div class=""><textarea name="alamat" id="alamat" rows="2" placeholder="masukan alamat anda" class="form-control form-control-sm"></textarea></div>
                            </div>
                            <div class="form-group col-4">
                                <div class=""><label for="no_hp" class=" form-control-label">No Hp</label></div>
                                <div class=""><input type="text" id="no_hp" name="no_hp" placeholder="masukan no handphone" class="form-control form-control-rounded" autocomplete="off"></div>
                            </div>    
                            <div class="form-group col-4">
                                <div class=""><label for="jenjang" class=" form-control-label">Jenjang Kursus</label></div>
                                <div class="">
                                    <select name="jenjang" id="jenjang" class="form-control-rounded form-control">
                                        <option value="0">Pilih </option>
                                        <option value="tk">TK </option>
                                        <option value="sd">SD</option>
                                        <option value="smp">SMP</option>
                                        <option value="smk">SMK</option>
                                        <option value="umum">Umum</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group col-4">
                                <div class=""><label for="kursus" class=" form-control-label">Jenis Kursus</label></div>
                                <div class=""><input type="text" id="kursus" name="kursus" placeholder="jenis kursus yang diikuti" class="form-control form-control-rounded" autocomplete="off"></div>
                            </div>
                            <div class="form-group col-12">
                                <div class=""><label for="catatan" class=" form-control-label">Catatan</label></div>
                                <div class=""><textarea name="catatan" id="catatan" rows="2" placeholder="kursus yang pernah diikuti sebelumnya" class="form-control form-control-sm"></textarea></div>
                            </div>


                            <div class="row form-group col-12">
                                <div class="col col-md-3"><label for="pboto" class=" form-control-label">Pas Photo 3x4</label></div>
                                <div class="col-12 col-md-9"><input type="file" id="pboto" name="photo" class="form-control-file form-control-sm"></div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
                            
                        </div>
                        <small class=""> Sudah punya akun? <a href="login.php">login</a>.</small>
                    </form>
                </div>
                  </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  </div>
  
</body>

<!-- Mirrored from kvthemes.com/bangodash/color-version/authentication-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2019 23:56:23 GMT -->
</html>
