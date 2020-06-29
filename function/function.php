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




function queryAddMurid($data) {
	global $conn;


	// ambil data dari tiap elemen data form
	$email = htmlspecialchars($data["email"]);
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

$result=mysqli_query($conn, "SELECT email FROM user WHERE email='$email'");
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
	$query2="INSERT INTO user VALUES
            ('','$email','$password')
            ";
            
	$query = "INSERT INTO murid
				VALUES 
				('', '$nama', '$tempat_lahir', '$tgl_lahir', '$jk', '$agama', '$nm_ayah', '$nm_ibu', '$pk_ayah', '$pk_ibu', '$alamat', '$no_hp', '$jenjang', '$kursus', '$catatan', '$photo')
				";
	mysqli_query($conn, $query);
    mysqli_query($conn,$query2);
	return mysqli_affected_rows($conn);
}


function queryAddPembayaran($data) {
	global $conn;

	// ambil data dari tiap elemen data form
    $id_murid = htmlspecialchars($data["id_murid"]);
	$ket_pembayaran = htmlspecialchars($data["ket_pembayaran"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $batas_bayar = htmlspecialchars($data["batas_bayar"]);
    $jml_bayar = htmlspecialchars($data["jml_bayar"]);
	// query insert data
	$query = "INSERT INTO pembayaran
				VALUES 
				('', '$id_murid', '$ket_pembayaran', '$kategori', '$batas_bayar', '$jml_bayar')
				";
	mysqli_query($conn, $query);


	return mysqli_affected_rows($conn);
}

function bayar($data){
    global $conn;
    $id_t=$data["bayar"];
    //query insert data
    $query="UPDATE transaksi SET
                status='lunas' 
                WHERE id_t=$id_t
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function queryAddTransaksi($data) {
    global $conn;

    // ambil data dari tiap elemen data form
    $id_p = htmlspecialchars($data["id_p"]);
    $id = htmlspecialchars($data["id"]);
    $tgl_bayar = htmlspecialchars($data["tgl_bayar"]);
    $jml_bayar = htmlspecialchars($data["jml_bayar"]);


    // upload gambar
    $bkt_bayar = uploadT();
    if (!$bkt_bayar) {
        return false;
    }
    // query insert data
    $query = "INSERT INTO transaksi
                VALUES 
                ('', '$id_p', '$id', '$tgl_bayar', '$jml_bayar', '$bkt_bayar')
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
    $id_murid=$data["id_murid"];
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
    $query="UPDATE murid SET
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
                WHERE id_murid=$id_murid
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function queryUpdateUser($data){
    global $conn;
    $id=$data["id"];
    $email=htmlspecialchars($data["email"]);
    $password=htmlspecialchars($data["password"]);
    $password2=htmlspecialchars($data["password2"]);
    $role=htmlspecialchars($data["role"]);

    $result=mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");
    if(mysqli_num_rows($result)===1)
    {
         //query insert data
        $row=mysqli_fetch_assoc($result);
        
        if(password_verify($password,$row["password"]) ){
            $password2= password_hash($password2,PASSWORD_DEFAULT);
            $query="UPDATE user SET
            email='$email',
            password='$password2',
            role='$role',
            WHERE id=$id
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
    $id_p = htmlspecialchars($data["id_p"]);
    $ket_pembayaran = htmlspecialchars($data["ket_pembayaran"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $batas_bayar = htmlspecialchars($data["batas_bayar"]);
    $jml_bayar = htmlspecialchars($data["jml_bayar"]);
    // query insert data
        $query="UPDATE pembayaran SET
                ket_pembayaran='$ket_pembayaran',
                kategori='$kategori',
                batas_bayar='$batas_bayar',
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
    $id_p = htmlspecialchars($data["id_p"]);
    $id = htmlspecialchars($data["id"]);
    $tgl_bayar = htmlspecialchars($data["tgl_bayar"]);
    $jml_bayar = htmlspecialchars($data["jml_bayar"]);
    $gambar2=htmlspecialchars($data["gambar2"]);
    $status = htmlspecialchars($data["status"]);
    //cek apakah gambar lama diupload apa tidak
    
    if($_FILES['bkt_bayar']['error']===4){
        $bkt_bayar=$gambar2;
    }else{
        $bkt_bayar=uploadT();
    }
    // query insert data
        $query="UPDATE transaksi SET
                id_p='$id_p',
                id='$id',
                tgl_bayar='$tgl_bayar',
                jml_bayar='$jml_bayar',
                bkt_bayar='$bkt_bayar',
                status='$status'
                WHERE id_t='$id_t'
                ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}




































function queryDeleteMurid($id_murid){
    global $conn;
    mysqli_query($conn,"DELETE FROM murid WHERE id_murid=$id_murid");    
    return mysqli_affected_rows($conn);
}

function queryDeleteUser($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM user WHERE id=$id");    
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