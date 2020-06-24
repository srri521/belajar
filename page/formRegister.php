<?php 
// session_start();

// if (!isset($_SESSION["login"])) {
// 	header("Location: login.php");
// }
// koneksi dulu
require '../function/function.php';
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

 

	// cek apakah data berhasil ditambahkan atau tdak
	if (queryAddMurid($_POST) > 0) {

		// echo "data berhasil ditambahkan";

		echo "
			<script>
			alert('data berhasil ditambahkan!');
			
			</script>
		";
	} else {
		// echo "data gagal ditambahkan!";

		echo "
			<script>
			alert('data gagal ditambahkan!');
			
			</script>
		";



	}

}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
</head>
<body>


	<h1>Registrasi</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">Email :</label>
				<input type="text" name="nama" id="nama">
			</li>
			<li>
				<label for="tempat_lahir">Password :</label>
				<input type="password" name="tempat_lahir" id="tempat_lahir">
			</li>
		</ul>


		<ul>
			<li>
				<label for="nama">Nama Lengkap :</label>
				<input type="text" name="nama" id="nama">
			</li>
			<li>
				<label for="tempat_lahir">Tempat Lahir :</label>
				<input type="text" name="tempat_lahir" id="tempat_lahir">
			</li>
			<li>
				<label for="tgl_lahir">Tanggal Lahir :</label>
				<input type="date" name="tgl_lahir" id="tgl_lahir">
			</li>
			<li>
				<label for="jk">Jenis Kelamin :
					<input type="radio" name="jk" id="jk" value="laki-laki">laki-laki
					<input type="radio" name="jk" id="jk" value="perempuan">perempuan
				</label>
			</li>
			<li>
				<label for="agama">Agama :</label>
				<input type="text" name="agama" id="agama">
			</li>
			<li>
				<label for="nm_ayah">Nama Ayah :</label>
				<input type="text" name="nm_ayah" id="nm_ayah">
			</li>
			<li>
				<label for="nm_ibu">Nama Ibu :</label>
				<input type="text" name="nm_ibu" id="nm_ibu">
			</li>
			<li>
				<label for="pk_ayah">Pekerjaan Ayah :</label>
				<input type="text" name="pk_ayah" id="pk_ayah">
			</li>
			<li>
				<label for="pk_ibu">Pekerjaan Ibu :</label>
				<input type="text" name="pk_ibu" id="pk_ibu">
			</li>
			<li>
				<label for="alamat">Alamat :</label>
				<input type="text" name="alamat" id="alamat">
			</li>
			<li>
				<label for="no_hp">No Hp :</label>
				<input type="text" name="no_hp" id="no_hp">
			</li>
			<li>
				<label for="jenjang">Jenjang :</label>
					<select name="jenjang" id="jenjang" >
					<option value="tk">tk
				    <option value="sd">sd
				    <option value="smp">smp
				    <option value="smk">smk
				    <option value="umum">umum
					</select>
				
			</li>
			<li>
				<label for="kursus">Jenis Kursus :</label>
				<input type="text" name="kursus" id="kursus">
			</li>
			<li>
				<label for="catatan">Catatan :</label>
				<input type="text" name="catatan" id="catatan">
			</li>
			<li>
				<label for="photo">Pas Photo 3x4 :</label>
				<input type="file" name="photo" id="photo">
			</li>


			<button type="submit" name="submit">Daftar</button>
		</ul>
		

	</form>
</body>
</html>