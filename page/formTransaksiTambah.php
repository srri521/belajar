<?php 

    $id_t=$_GET["id_t"];
    $Transaksi=query("SELECT * FROM Transaksi WHERE id_t=$id_t")[0];

    if(isset($_POST["uploadG"])){
    if(quueryAddTransaksiById($_POST)>0){
        
        echo "
            <script>
            alert('berhasil');
                document.location.href='index.php?page=formTransaksi';
            </script>
        ";
    }else{
        echo "
            <script>
            alert('gagal');
                
            </script>
        ";
    }
}
    
?>
<body>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-12">
         <h4 class="text-uppercase" style="text-align: center;">Transaksi Pembayaran Kursus</h4>
        </div>
        </div>
     <hr>
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-money"></i>
                   Input Pembayaran
                </h4>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="tgl_bayar">Tanggal Pembayaran</label>
                    <input type="hidden" name="id_t" value="<?= $Transaksi["id_t"];?>">
                   <input type="text" id="tgl_bayar" readonly="readonly" class="form-control" value="<?= date('l, d-m-Y')?>" name="tgl_bayar">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="bayar">Jumlah Pembayaran</label>
                    <input type="number" class="form-control" id="bayar" name="bayar" placeholder="Masukan nominal">
                  </div>
                  <div class="form-group">
                    <label for="bkt_bayar">Bukti Pembayaran</label>
                    <input type="file" class="form-control" id="bkt_bayar" name="bkt_bayar">
                    <small class="text-muted" >*kirim dalam bentuk gambar(png,jpg,jpeg)</small>
                  </div>
                  
                <div class="form-footer">
                  <button type="reset" class="btn btn-dark shadow-dark m-1"><i class="fa fa-times"></i> Reset</button>
                  <button type="submit" class="btn btn-success shadow-success m-1" name="uploadG"><i class="fa fa-check-square-o" ></i> Kirim</button>
                </div>
            </div>
          </div>
        </div>
      </form>
        </div>

        </div>
    </form>
</body>

