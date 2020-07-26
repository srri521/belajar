<?php
require 'function.php';

$id_t=$_GET["id_t"];

if(queryDeleteTransaksi($id_t)>0){
    ?>
    <script>
    	alert ('data transaksi berhasil duhapus!');
        document.location.href='../index.php?page=formKonfirmasi';
    </script>
    <?php
}
