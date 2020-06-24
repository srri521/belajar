<?php 
require '../function/function.php';

if (isset($_POST["submit"])) {

  if (queryAddTransaksi($_POST) > 0) {
    echo "
      <script>
      alert('data berhasil dikirim!');
      
      </script>
    ";
  } else {
    echo "
      <script>
      alert('data gagal dikirim!');
      
      </script>
    ";
  }

}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Transaksi Pembayaran</title>
</head>
<body>
  <h1>Transaksi Pembayaran</h1>

  <form action="" method="post" enctype="multipart/form-data">

    <ul>
      <li>
        <label for="bkt_bayar">Masukan Bukti Pembayaran :</label>
        <input type="file" name="bkt_bayar" id="bkt_bayar" >
      </li>
      <li>
        <label for="bkt_bayar">Masukan Bukti Pembayaran :</label>
        <input type="file" name="bkt_bayar" id="bkt_bayar" >
      </li>
          <h5 >kirim dalam bentuk gambar</h5>
      <button type="submit" name="submit">Kirim</button>
    </ul>
    

  </form>
</body>
</html>