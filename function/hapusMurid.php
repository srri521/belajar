<?php
require 'function.php';

$id_murid=$_GET["id_murid"];

if(queryDeleteMurid($id_murid)>0){
    ?>
    <script>
        document.location.href='../index.php?page=formMurid&id_murid=<?= $id_murid;?>';
    </script>
    <?php
}
