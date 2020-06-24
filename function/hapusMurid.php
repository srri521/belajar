<?php
require 'function.php';

$id=$_GET["id"];
$id_user=$_GET["id_user"];

if(queryDeleteMurid($id)>0){
    ?>
    <script>
        document.location.href='../index.php?page=formMurid&id_user=<?= $id_user;?>';
    </script>
    <?php
}
