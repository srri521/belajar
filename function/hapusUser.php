<?php
require 'function.php';

$id=$_GET["id"];

if(queryDeleteUser($id)>0){
    ?>
    <script>
        document.location.href='../index.php?page=accountsetting&id=<?= $id;?>';
    </script>
    <?php
}
