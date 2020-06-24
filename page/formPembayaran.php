<?php
$pembayaran=query("SELECT * FROM pembayaran");
//var_dump($pembayaran);die;
if ( isset($_POST["submit"]) ) {
    //ambil data dari tiap elemen dalam form
    //cek keberhasilan
    if( queryAddPembayaran($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'index.php?page=tampilPembayaran';
                </script>
            ";
        
    }else{
        echo "
                <script>
                    alert('data gagal ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
    }
    
}

?> 




 <h4>Daftar Data Pembayaran Murid Fawwaaz Kiddy Club</h4>
  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tampilModalTambah">
        tambah Data
        </button>
 <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Keseluruhan yang harus dibayar </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th class="serial">No</th>
                    <th>ID</th>
                    <th>Keterangan Pembayaran</th>
                    <th>Kategori</th>
                    <th>Jumlah Pembayaran</th>
                    <th class="serial">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                foreach($pembayaran as $row): ?>
                <tr>
                    <td class="serial"><?= $i?></td>
                    <td><?= $row["id"];?></td>
                    <td><?= $row["ket_pembayaran"];?></td>
                    <td><?= $row["kategori"];?></td>
                    <td><?= $row["jml_bayar"];?></td>
                    <td>
                        <a href="index.php?page=editAnggota&id_anggota=<?= $row["id"];?>">
                            <button type="submit" class="btn btn-success btn-sm">edit</button>
                        </a>

                        <a href="function/hapus.php?id=<?= $row["id"];?>" onclick="return confirm('yakin mau menghapus data?')">
                            <button class="btn btn-danger btn-sm">hapus</button>
                        </a>
                        <a href="index.php?page=tampilAnggota&id_anggota=<?= $row["id"];?>">
                            <button type="submit" class="btn btn-primary btn-sm">kirim</button>
                        </a>
                    </td>    
                </tr>
                <?php 
                $i++;
                endforeach;?>
            </tbody>
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->


