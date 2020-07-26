<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "ppdb");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


function register($data){
    global $conn;

    $username =  strtolower(stripslashes( $data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $nama = htmlspecialchars($data["nama"]);
    $tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
    $tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
    $jk = htmlspecialchars($data["jk"]);
    $agama = htmlspecialchars($data["agama"]);
    $nm_ayah = htmlspecialchars($data["nm_ayah"]);
    $nm_ibu = htmlspecialchars($data["nm_ibu"]);
    $pk_ayah = htmlspecialchars($data["pk_ayah"]);
    $pk_ibu = htmlspecialchars($data["pk_ibu"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $jenjang = htmlspecialchars($data["jenjang"]);
    $kursus = htmlspecialchars($data["kursus"]);
    $catatan = htmlspecialchars($data["catatan"]);
    

    //cek apakah username telah tersedia atau tidak
    $result=mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('username yang dipilih sudah terdaftar');
            </script>
        ";
        return false;
    }
    //cek konfirmasi password
    if($password!==$password2){
    echo "<script>
            alert('password tidak sesuai');
        </script>";
        return false;   
    }

    //enkripsi password 
    $password= password_hash($password,PASSWORD_DEFAULT);
    //upload gambar
    $photo =upload();
    if(!$photo){
        return false;
    }

    //query insert data
    $query="INSERT INTO user VALUES
            ('','$username','$password', 'user','$nama', '$tempat_lahir', '$tgl_lahir', '$jk', '$agama', '$nm_ayah', '$nm_ibu', '$pk_ayah', '$pk_ibu', '$alamat', '$no_hp', '$jenjang', '$kursus', '$catatan', '$photo')
                ";
     mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function queryAddMurid($data) {
	global $conn;


	// ambil data dari tiap elemen data form
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars($data["password"]);

	$nama = htmlspecialchars($data["nama"]);
	$tempat_lahir = htmlspecialchars($data["tempat_lahir"]);
	$tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
	$jk = htmlspecialchars($data["jk"]);
	$agama = htmlspecialchars($data["agama"]);
	$nm_ayah = htmlspecialchars($data["nm_ayah"]);
	$nm_ibu = htmlspecialchars($data["nm_ibu"]);
	$pk_ayah = htmlspecialchars($data["pk_ayah"]);
	$pk_ibu = htmlspecialchars($data["pk_ibu"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$no_hp = htmlspecialchars($data["no_hp"]);
	$jenjang = htmlspecialchars($data["jenjang"]);
	$kursus = htmlspecialchars($data["kursus"]);
	$catatan = htmlspecialchars($data["catatan"]);
	// $photo = htmlspecialchars($data["photo"]);

$result=mysqli_query($conn, "SELECT user FROM user WHERE username='$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('email yang dipilih sudah terdaftar');
            </script>
        ";
        return false;
    }
    //cek konfirmasi password
    if(!$password){
    echo "<script>
            alert('password tidak sesuai');
        </script>";
        return false;   
    }

    //enkripsi password 
    $password= password_hash($password,PASSWORD_DEFAULT);
    
// upload gambar
	$photo = upload();
	if (!$photo) {
		return false;
	}

	// query insert data
            
	$query="INSERT INTO user VALUES
            ('','username', 'password' 'user','$nama', '$tempat_lahir', '$tgl_lahir', '$jk', '$agama', '$nm_ayah', '$nm_ibu', '$pk_ayah', '$pk_ibu', '$alamat', '$no_hp', '$jenjang', '$kursus', '$catatan', '$photo')
                ";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


function queryAddPembayaran($data) {
	global $conn;

	// ambil data dari tiap elemen data form
	$ket_pembayaran = htmlspecialchars($data["ket_pembayaran"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $jml_bayar = htmlspecialchars($data["jml_bayar"]);
	// query insert data
	$query = "INSERT INTO pembayaran
				VALUES 
				('', '$ket_pembayaran', '$kategori', '$jml_bayar')
				";
	mysqli_query($conn, $query);


	return mysqli_affected_rows($conn);
}

function bayar($data){
    global $conn;
    $id_t=$data["bayar"];
    //query insert data
    $query="UPDATE transaksi SET
                status='Lunas' 
                WHERE id_t=$id_t
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function queryAddTransaksi($data) {
    global $conn;

    // ambil data dari tiap elemen data form
    $id_p = htmlspecialchars($data["id_p"]);
    $id_user = htmlspecialchars($data["id_user"]);

    // query insert data
    $query = "INSERT INTO transaksi
                VALUES 
                ('', '$id_p', '$id_user','','','','Belum Lunas')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function quueryAddTransaksiById($data) {
    global $conn;
    
    $id_t=$data["id_t"];
    $tgl_bayar = htmlspecialchars($data["tgl_bayar"]);
    $bayar = htmlspecialchars($data["bayar"]);
    

    $bkt_bayar = uploadT();
    if (!$bkt_bayar) {
        return false;
    }


    // query insert data
    $query="UPDATE transaksi SET
                tgl_bayar='$tgl_bayar',
                bayar='$bayar',
                bkt_bayar='$bkt_bayar' 
                WHERE id_t=$id_t
                ";
    
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}







function upload() {

    $namaFile = $_FILES['photo']['name'];
    $ukuranFile = $_FILES['photo']['size'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "
            <script>
            alert('pilih gambar terlebih dahulu'); </script>
        ";
        return false;
    }

    //cek apakah yang di upload itu gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
            alert('yang diupload bukan gambar'); </script>
        ";
        return false;
     } 

     // cek jika ukurannya terlalu besar
     if ($ukuranFile > 1000000) {
        echo "
            <script>
            alert('ukuran gambar terlalu besar!'); </script>
        ";
        return false;
     }

     // lolos pengecekan gambar siap di upload
     // generate nama gambar baru
     $namaFileBaru = uniqid();
     $namaFileBaru .= '.';
     $namaFileBaru .= $ekstensiGambar;

     move_uploaded_file($tmpName, 'dist/img/' . $namaFileBaru);
     return $namaFileBaru;


}





function queryUpdateMurid($data){
    global $conn;
    $id_user=$data["id_user"];
    $nama=htmlspecialchars($data["nama"]);
    $tempat_lahir=htmlspecialchars($data["tempat_lahir"]);
    $tgl_lahir=htmlspecialchars($data["tgl_lahir"]);
    $jk=htmlspecialchars($data["jk"]);
    $agama=htmlspecialchars($data["agama"]);
    $nm_ayah=htmlspecialchars($data["nm_ayah"]);
    $nm_ibu=htmlspecialchars($data["nm_ibu"]);
    $pk_ayah=htmlspecialchars($data["pk_ayah"]);
    $pk_ibu=htmlspecialchars($data["pk_ibu"]);
    $alamat=htmlspecialchars($data["alamat"]);
    $no_hp=htmlspecialchars($data["no_hp"]);
    $jenjang=htmlspecialchars($data["jenjang"]);
    $kursus=htmlspecialchars($data["kursus"]);
    $catatan=htmlspecialchars($data["catatan"]);
    $gambarLama=htmlspecialchars($data["gambarLama"]);
    
    //cek apakah gambar lama diupload apa tidak
    
    if($_FILES['photo']['error']===4){
        $photo=$gambarLama;
    }else{
        $photo=upload();
    }


    //query insert data
    $query="UPDATE user SET
                nama='$nama',
                tempat_lahir='$tempat_lahir',
                tgl_lahir='$tgl_lahir',
                jk='$jk',
                agama='$agama',
                nm_ayah='$nm_ayah',
                nm_ibu='$nm_ibu',
                pk_ayah='$pk_ayah',
                pk_ibu='$pk_ibu',
                alamat='$alamat',
                no_hp='$no_hp',
                jenjang='$jenjang',
                kursus='$kursus',
                catatan='$catatan',
                photo='$photo'
                WHERE id_user=$id_user
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function queryUpdateUser($data){
    global $conn;
    $id_user=$data["id_user"];
    $username=htmlspecialchars($data["username"]);
    $password=htmlspecialchars($data["password"]);
    $password2=htmlspecialchars($data["password2"]);

    $result=mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id_user'");
    if(mysqli_num_rows($result)===1)
    {
         //query insert data
        $row=mysqli_fetch_assoc($result);
        
        if(password_verify($password,$row["password"]) ){
            $password2= password_hash($password2,PASSWORD_DEFAULT);
            $query="UPDATE user SET
            username='$username',
            password='$password2'
            
            WHERE id_user=$id_user
            ";
            
            mysqli_query($conn, $query);
        }

    }else{
        echo "
        <script>
            alert('Password lama yang anda masukan salah');
        </script>
        ";
    }

    
    return mysqli_affected_rows($conn);
}


function queryUpdatePembayaran($data) {
    global $conn;

    // ambil data dari tiap elemen data form
    $id_p = $data["id_p"];
    $ket_pembayaran = htmlspecialchars($data["ket_pembayaran"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $jml_bayar = htmlspecialchars($data["jml_bayar"]);
    // query insert data
        $query="UPDATE pembayaran SET
                ket_pembayaran='$ket_pembayaran',
                kategori='$kategori',
                jml_bayar='$jml_bayar'
                WHERE id_p=$id_p
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function queryUpdateTransaksi($data) {
    global $conn;

    // ambil data dari tiap elemen data form
    $id_t = $data["id_t"];
    $status = htmlspecialchars($data["status"]);
    //cek apakah gambar lama diupload apa tidak
    
    
    // query insert data
        $query="UPDATE transaksi SET
                status='$status'
                WHERE id_t=$id_t
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function uploadT() {

    $namaFile = $_FILES['bkt_bayar']['name'];
    $ukuranFile = $_FILES['bkt_bayar']['size'];
    $error = $_FILES['bkt_bayar']['error'];
    $tmpName = $_FILES['bkt_bayar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "
            <script>
            alert('pilih gambar terlebih dahulu'); </script>
        ";
        return false;
    }

    //cek apakah yang di upload itu gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
            alert('yang diupload bukan gambar'); </script>
        ";
        return false;
     } 

     // cek jika ukurannya terlalu besar
     if ($ukuranFile > 1000000) {
        echo "
            <script>
            alert('ukuran gambar terlalu besar!'); </script>
        ";
        return false;
     }

     // lolos pengecekan gambar siap di upload
     // generate nama gambar baru
     $namaFileBaru = uniqid();
     $namaFileBaru .= '.';
     $namaFileBaru .= $ekstensiGambar;

     move_uploaded_file($tmpName, 'dist/img/' . $namaFileBaru);
     return $namaFileBaru;


}



































function queryDeleteUser($id_user){
    global $conn;
    mysqli_query($conn,"DELETE FROM user WHERE id_user=$id_user");    
    return mysqli_affected_rows($conn);
}

function queryDeletePembayaran($id_p){
    global $conn;
    mysqli_query($conn,"DELETE FROM pembayaran WHERE id_p=$id_p");    
    return mysqli_affected_rows($conn);
}

function queryDeleteTransaksi($id_t){
    global $conn;
    mysqli_query($conn,"DELETE FROM transaksi WHERE id_t=$id_t");    
    return mysqli_affected_rows($conn);
}










?>