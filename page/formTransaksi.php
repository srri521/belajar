<?php 


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
  <form action="" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-lg-6">
 <h4 class="text-uppercase" style="text-align: center;">Transaksi Pembayaran Kursus</h4>
</div>
</div>
     <hr>
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <form>
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-money"></i>
                   Input Pembayaran
                </h4>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="tgl_bayar">Tanggal Pembayaran</label>
                   <input type="" id="tgl_bayar" readonly="readonly" class="form-control" value="<?= date('l, d-m-Y')?>">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="jml_bayar">Jumlah Pembayaran</label>
                    <input type="number" class="form-control" id="jml_bayar">
                  </div>
                  <div class="form-group">
                    <label for="bkt_bayar">Bukti Pembayaran</label>
                    <input type="file" class="form-control" id="bkt_bayar">
                    <small class="text-muted" >*kirim dalam bentuk gambar(png,jpg,jpeg)</small>
                  </div>
                  
                <div class="form-footer">
                  <button type="cancel" class="btn btn-dark shadow-dark m-1"><i class="fa fa-times"></i> Cancel</button>
                  <button type="kirim" class="btn btn-success shadow-success m-1"><i class="fa fa-check-square-o"></i> Kirim</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</form>
</body>
</html>




















  </form>
</body>
</html>