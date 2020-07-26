<?php
require 'function.php';

$id_p=$_GET["id_p"];


if(queryDeletePembayaran($id_p)>0){
    ?>
    <script>
    	alert ('data pembayaran berhasil duhapus!');
        document.location.href='../index.php?page=formPembayaran';
    </script>
    <?php
}
