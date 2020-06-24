<?php
// menghitung jumlah anggota koperasi
$countmurid=mysqli_query($conn, "SELECT * FROM murid");
$count=mysqli_num_rows($countmurid);

?>

<h4>Selamat Datang Admin</h4><br>
<div class="col-12 col-sm-6 col-lg-6 col-xl-6">
          <div class="card bg-success shadow-success">
            <div class="card-body p-4">
              <div class="media">
              <div class="media-body text-left">
                <div class="text-white"><span class="count"><?= $count;?></span></div>
    			<div class="text-white">Jumlah Murid Terdaftar</div>
              </div>
              <div class="align-self-center w-icon"><i class="icon-user text-white" style="font-size: 44px;"></i></div>
            </div>
            </div>
          </div>
        </div>






<body>
   <div class="container">    
    <br>
  <!-- Tombol untuk menampilkan modal-->
  <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Buka Modal</button>
 
  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">Save changes</button>
        </div>
      </div>
    </div>
  </div>
   </div>
</body>


                       



