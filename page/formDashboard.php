<?php

// menghitung jumlah anggota koperasi
$countuser=mysqli_query($conn, "SELECT * FROM user WHERE role='User'");
$count=mysqli_num_rows($countuser);

$countPrivat=mysqli_query($conn, "SELECT * FROM transaksi  
    JOIN user on transaksi.id_user = user.id_user
    JOIN pembayaran on transaksi.id_p = pembayaran.id_p
    WHERE transaksi.id_user=user.id_user AND kategori='Privat'

    ");
$countP=mysqli_num_rows($countPrivat);

$countKelBel=mysqli_query($conn, "SELECT * FROM transaksi  
    JOIN user on transaksi.id_user = user.id_user
    JOIN pembayaran on transaksi.id_p = pembayaran.id_p
    WHERE transaksi.id_user=user.id_user AND kategori='Kelompok Belajar'
    ");
$countKB=mysqli_num_rows($countKelBel);

$countLunas=mysqli_query($conn, "SELECT * FROM transaksi  
    WHERE status='Lunas'

    ");
$countL=mysqli_num_rows($countLunas);

$countBelun=mysqli_query($conn, "SELECT * FROM transaksi  
    WHERE  status='Belum Lunas'
    ");
$countBL=mysqli_num_rows($countBelun);

?>



<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.com/bizadmin/demo/main/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 May 2019 00:06:57 GMT -->

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="dist/mycss.css">
    <link rel="stylesheet" href="dist/bootstrap.min.css">
</head>


<h4>Selamat Datang Admin</h4><br>
 
      <div class="row mt-4">
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card gradient-scooter">
            <div class="card-body p-4">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white"><span class="count"><?= $count;?></h4>
                <span class="text-white">Jumlah Murid</span>
              </div>
              <div class="align-self-center w-icon"><i class="icon-user text-white" ></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card gradient-bloody">
            <div class="card-body p-4">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white"><span class="count"><?= $countL;?></h4>
                <span class="text-white">Lunas</span>
              </div>
              <div class="align-self-center w-icon"><i class="icon-wallet text-white" ></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card gradient-quepal">
            <div class="card-body p-4">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white"><span class="count"><?= $countBL;?></h4>
                <span class="text-white">Belum Lunas</span>
              </div>
              <div class="align-self-center w-icon"><i class="icon-pie-chart text-white" ></i></div>
            </div>
            </div>
          </div>
        </div>



        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card gradient-meridian">
            <div class="card-body p-4">
              <div class="media">
                <div class="media-body text-left">
                  <div id="carousel-2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                      <h4 class="text-white"><span class="count"><?= $countP;?></h4>
                      <span class="text-white">Privat</span>
                    </div>
                    <div class="carousel-item">
                      <h4 class="text-white"><span class="count"><?= $countKB;?></h4>
                      <span class="text-white">Kelompok Belajar</span>     
                    </div>
                    </div>
                  </div>
                 </div>
              <div class="align-self-center w-icon"><i class="icon-user text-white" ></i></div>
            </div>

            </div>
          </div>
        </div>

        

<br><br>
<!-- image -->
<div class="col-lg-12">
            <div class="card-header text-uppercase" style="text-align: center;">Profil Fawwaaz Kiddy Club</div>
             <div class="card-body">
               <div id="carousel-2" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="dist/img/media/2.jpg" alt="First slide" >
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="dist/img/media/4.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="dist/img/media/7.jpg" alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carousel-2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carousel-2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
             </div>
          </div>
       
      </div><!--End Row-->






</body>
</html>