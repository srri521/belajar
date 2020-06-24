<?php
require 'function.php';

$id=$_GET["id"];

if(queryDeleteMurid($id)>0){
    ?>
    <script>
        document.location.href='../index.php?page=formMurid&id=<?= $id;?>';
    </script>
    <?php
}
