<?php 


$id_user=$_SESSION["id_user"];
// if($_SESSION["login"]==0){
//     echo "
//     <script>
//         document.location.href='index.php?page=user';
//     </script>
//     ";
// }
//query masasiswa berdasarkan id
$user2=mysqli_query($conn, "SELECT * FROM user WHERE id_user=$id_user");
$user= mysqli_fetch_array($user2);
$pembayaran=mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_user=$id_user ORDER BY batas_bayar DESC");
// $pembayaran2= mysqli_fetch_array($pembayaran);
// $pembayaran=query( "SELECT * FROM pembayaran WHERE id_user=$id_user ORDER BY batas_bayar DESC");
// $transaksi=query("SELECT * FROM transaksi WHERE id_t=id_p ORDER BY tgl_bayar DESC");






// $countPembayaran=mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_user=$id_user");
// $i=0;
// // foreach($countPembayaran as $row):
//     $i+=$row["jml_bayar"];
// // endforeach;

// $countTransaksi=mysqli_query($conn, "SELECT * FROM transaksi WHERE id_t=id_p");
// $u=0;
//     $u+=$countTransaksi["jml_bayar"];


?>

<h2 style="text-align: center;">Selamat Datang <?= $_SESSION["nama"]?></h2>
<p style="text-align: center;">Selamat bergabung di Fawwaaz Kiddy Club</p>

<div class="card">

    <div class="card-header">
        <strong class="card-title mb-3"></strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <h5>ID Pendaftaran : <?= $user["id_user"];?></h5>
                <img src="dist/img/<?= $user["photo"];?>" alt="" style="width:120px; height:auto;">
            </div>
            <div class="col-md-10">
                <ul>
                    <h6>Hal-hal yang perlu diperhatikan oleh murid dalam menggunakan Sistem Informasi Lembaga Bimbingan Belajar (SILBB):</h6>
                    <li>Ketika anda berada di halaman ini maka anda sudah menyetujui segala ketentuan yang berada di Fawwaaz Kiddy Club</li>
                    <li>Bagi murid yang sudah melakukan pendaftaran, silakan hubungi pihak lembaga untuk konfirmasi pendaftaran dengan menyebutkan ID Pendaftaran</li>
                    <li>Untuk pembayaran silakan upload pada menu pembayaran</li>
                    <li>Pembayaran akan diupdate setiap bulan pertama pada tanggal pendaftaran</li>
                    <li>Status Pembayaran akan diupdate 24 jam dari waktu pembayaran</li>
                    <li>Jika Status Pembayaran belum di update silakan <a href="https://wa.me/+6282113868479?text=Assalamu'alaikum warahmatullahi wabarakaatuh">Chat Via WhatsApp</a></li>                    
                    <li>Layanan ini berlaku selama anda menjadi murid di Fawwaaz Kiddy Club</li>
                    <li>Jangan lupa sebelum meninggalkan SILBB pastikan logout terlebih dahulu</li>
                    <li>Untuk pembayaran kirim ke <i class="fa fa-bank"></i>No Rekening: 1234567890

                    </li>
                </ul>
            </div>    
        </div>
    </div>


</div><br>
<small>Untuk konfirmasi pendaftaran silakan klik
    <a href="https://wa.me/+6282113868479?text=Assalamu'alaikum warahmatullahi wabarakaatuh">Chat Via WhatsApp</a>
</small>



