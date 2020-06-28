<?php
//  if($_SESSION["login"]==0){
//     echo "
//     <script>
//         document.location.href='index.php?page=user';
//     </script>
//     ";
// }
$id_p=$_GET["id_p"];
//query berdasarkan id
$pembayaran2=query("SELECT * FROM pembayaran WHERE id_p=$id_p")[0];

if(isset($_POST["editPembayaran"])){
    //mengecek apakah data telah diubah atau tidak
    if(queryUpdatePembayaran($_POST)>0){
        echo "
            <script>
            alert ('berhasil');
                document.location.href='index.php?page=formPembayaranDetail';
            }
            </script>
        ";
    }else{
        echo "
        <script>
        alert ('gagal');
            document.location.href='index.php?page=formPembayaranDetail';
        </script>
    ";
    }
}

 ?>


 <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <strong>Edit Pembayaran</strong>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="id_p" value="<?= $pembayaran2["id_p"];?>">
                    <div class="form-group">
                        <div class=""><label for="ket_pembayaran" class=" form-control-label">Keterangan Pembayaran</label></div>
                        <div class=""><input type="text" id="ket_pembayaran" name="ket_pembayaran" placeholder="Masukan ID Nasabah" class="form-control form-control-sm" autocomplete="off" value="<?= $pembayaran2["ket_pembayaran"];?>"></div>
                    </div>

                    <div class="form-group">
                        <div class=""><label for="kategori" class=" form-control-label">Kategori</label></div>
                            <div class="">
                                <select name="kategori" id="kategori" class="form-control-sm form-control">
                                    <option value="0">Pilih </option>
                                    <option value="Kelompok Belajar" <?php if($pembayaran2["kategori"]=="Kelompok Belajar"){echo "selected";}?>>Kelompok Belajar </option>
                                    <option value="Privat" <?php if($pembayaran2["kategori"]=="Privat"){echo "selected";}?>>Privat</option>
                                </select>
                            </div>
                    </div>

                    <div class="form-group">
                        <div class=""><label for="batas_bayar" class="form-control-label">Batak waktu pembayaran</label></div>
                        <div class=""><input type="date" id="batas_bayar" name="batas_bayar" class="form-control form-control-sm" value="<?= $pembayaran2["batas_bayar"];?>"><small class="form-text text-muted">bulan-tanggal-tahun</small></div>
                    </div>

                    <div class="form-group">
                        <div class=""><label for="jml_bayar" class="form-control-label">Jumlah yang harus dibayar</label></div>
                        <div class=""><input type="number" id="jml_bayar" name="jml_bayar" class="form-control form-control-sm" value="<?= $pembayaran2["jml_bayar"];?>"></div>
                    </div>

                        <td>                    
                        <button type="submit" class="btn btn-primary"  name="editPembayaran">
                            <i class="fa fa-dot-circle-o"></i> Edit
                        </button>

                        <button  type="reset" class="btn btn-danger ">
                            <a href="index.php?page=formPembayaranDetail"></a>
                            <i class="fa fa-ban"></i> Close
                        </button>
                        </td>
                   
                    
                </form>
            </div>
        </div>
    </div>
</div>
