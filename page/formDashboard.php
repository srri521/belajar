<?php
// menghitung jumlah anggota koperasi
$countmurid=mysqli_query($conn, "SELECT * FROM murid");
$count=mysqli_num_rows($countmurid);

?>
<h4>Selamat Datang Admin</h4><br>

<div class="stat-text"><span class="count"><?= $count;?></span></div>
    <div class="stat-heading">Jumlah Murid Koperasi Terdaftar</div>                       




