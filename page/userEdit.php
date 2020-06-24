<?php
 // $id=$_GET["id"];
    // $user=query("SELECT murid.nama, user.id, user.email, user.password, user.role, murid.photo, murid.id
    // FROM murid,user
    // WHERE murid.id=user.id;");

    // $murid=query("SELECT * FROM murid");
    //query masasiswa berdasarkan id
    // $user2=query("SELECT * FROM user WHERE id=$id")[0];
    // //edit
    // if(isset($_POST["edit_user"])){
    //     //mengecek apakah data telah diubah atau tidak
    //     if(editUser($_POST)>0){
    //         echo "
    //             <script>
    //                 alert('Data berhasil Diperbaharui!!');
    //                 document.location.href='index.php?page=formDashboard';
    //             </script>
    //         ";
    //     }else{
    //         echo "
    //             <script>
    //                 alert('Data gagal Diperbaharui!!');
    //                 //document.location.href='index.php?page=formDashboard';
    //             </script>
    //         ";
    //     }
    // }
?>
<body>
 <!-- Start wrapper-->
 <div id="wrapper">
    <div class="card card-primary card-authentication1 mx-auto my-5 animated bounceInDown">
        <div class="card-body">
         <div class="card-content p-2">
          <div class="card-title text-uppercase text-center pb-2">Update Profil</div>
            <form>
              <div class="form-group">
                        <div class=""><label for="email" class=" form-control-label">Email</label></div>
                        <div class=""><input type="text" id="email" name="email" placeholder="masukan email" class="form-control form-control-sm" autocomplete="off" value="<?= $user2["email"];?>"></div>
                    </div>
                    <div class="form-group">
                        <div class=""><label for="password" class=" form-control-label">Password Lama</label></div>
                        <div class=""><input type="password" id="password" name="password" placeholder="masukan password lama" class="form-control form-control-sm"></div>
                    </div>
                    <div class="form-group">
                        <div class=""><label for="password2" class=" form-control-label">Password Baru</label></div>
                        <div class=""><input type="password" id="password2" name="password2" placeholder="konfirmasi password baru" class="form-control form-control-sm"></div>
                    </div>

                    <div class="form-group">
                        <div class=""><label for="role" class=" form-control-label">Level</label></div>
                        <div class="">
                            <select name="role" id="role" class="form-control-sm form-control">
                                <option value="0">Pilih Level</option>
                                <option value="admin" <?php if($user2["role"]=="admin"){echo "selected";}?>>Admin</option>
                                <option value="user" <?php if($user2["role"]=="user"){echo "selected";}?>>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="edit_user">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger ">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
             </form>
           </div>
          </div>
         </div>



