<?php
require 'function.php';

$id_user=$_GET["id_user"];

if(queryDeleteUser($id_user)>0){
    ?>
    <script>
    	alert ('data user berhasil duhapus!');
        document.location.href='../index.php?page=accountsetting&id_user=<?= $id_user;?>';
    </script>
    <?php
}
