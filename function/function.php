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

	 move_uploaded_file($tmpName, '../dist/img/' . $namaFileBaru);
	 return $namaFileBaru;


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












































function queryDeleteMurid($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM murid WHERE id=$id");    
    return mysqli_affected_rows($conn);
}












?>