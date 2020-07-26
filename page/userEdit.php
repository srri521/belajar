<?php


 $id_user=$_SESSION["id_user"];
    // $user=query("SELECT murid.nama, user.id, user.email, user.password, user.role, murid.photo, murid.id
    // FROM murid,user
    // WHERE murid.id=user.id;");

    // $murid=query("SELECT * FROM murid");
    //query masasiswa berdasarkan id
    $user2=query("SELECT * FROM user WHERE id_user=$id_user")[0];
    // //edit
    if(isset($_POST["editUser"])){
        //mengecek apakah data telah diubah atau tidak
        if(queryUpdateUser($_POST)>0){
            echo "
                <script>
                    alert('Data berhasil Diperbaharui!!');
                    document.location.href='index.php?page=formDashboard';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data gagal Diperbaharui!!');
                    //document.location.href='index.php?page=formDashboard';
                </script>
            ";
        }
    }
?>
<body>
 <!-- Start wrapper-->
 <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
 <div id="wrapper">
    <div class="card card-primary card-authentication1 mx-auto my-5 animated bounceInDown">
        <div class="card-body">
         <div class="card-content p-2">
          <div class="card-title text-uppercase text-center pb-2">Change Password</div>
            <form>
              <div class="form-group">
                 <input type="hidden" name="id_user" value="<?= $user2["id_user"];?>">
                        <div class=""><label for="username" class=" form-control-label">Email</label></div>
                        <div class=""><input type="text" id="username" name="username" placeholder="masukan email" class="form-control form-control-sm" autocomplete="off" value="<?= $user2["username"];?>"></div>
                    </div>
                    <div class="form-group">
                        <div class=""><label for="password" class=" form-control-label">Password Lama</label></div>
                        <div class=""><input type="password" id="password" name="password" placeholder="masukan password lama" class="form-control form-control-sm"></div>
                    </div>
                    <div class="form-group">
                        <div class=""><label for="password2" class=" form-control-label">Password Baru</label></div>
                        <div class=""><input type="password" id="password2" name="password2" placeholder="konfirmasi password baru" class="form-control form-control-sm"></div>
                    </div>

                    <td>
                        <a href="index.php?page=formDashboard">
                            <button type="submit" name="editUser" class="btn btn-danger btn-sm"><i class="fa fa-dot-circle-o"></i> Save
                            </button>
                        </a>
                        <a href="">
                            <button type="reset" class="btn btn-success btn-sm"><i class="fa fa-ban"></i> Reset</button>
                        </a>
                    </td>
             </form>
           </div>
          </div>
         </div>
     </div>
 </form>



