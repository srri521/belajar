<?php
require 'function.php';

$id_p=$_GET["id_p"];
$id_murid=$_GET["id_murid"];

if(queryDeletePembayaran($id_p)>0){
    ?>
    <script>
        document.location.href='../index.php?page=form&id_murid=<?= $id_murid;?>';
    </script>
    <?php
}
