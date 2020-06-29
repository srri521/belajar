<?php
require 'function.php';

$id_t=$_GET["id_t"];
$id_murid=$_GET["id_murid"];

if(queryDeleteTransaksi($id_t)>0){
    ?>
    <script>
        document.location.href='../index.php?page=form&id_murid=<?= $id_murid;?>';
    </script>
    <?php
}
