<?php
require 'function.php';

$id_p=$_GET["id_p"];

if(queryDeletePembayaran($id_p)>0){
    ?>
    <script>
        document.location.href='../index.php?page=formPembayaranDetail&id_p=<?= $id_p;?>';
    </script>
    <?php
}
