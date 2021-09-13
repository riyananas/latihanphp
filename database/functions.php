<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "latihantoko");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) {
	global $conn;

	$kode_produk = htmlspecialchars($data["kode_produk"]);
	$nama_produk = htmlspecialchars($data["nama_produk"]);
	$paket_produk = htmlspecialchars($data["paket_produk"]);
	$harga = htmlspecialchars($data["harga"]);
	
	$deskripsi = htmlspecialchars($data["deskripsi"]);

	// Upload Gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	//query insert data
	$query = "INSERT INTO produk
				VALUES
			 ('', '$kode_produk', '$nama_produk', '$paket_produk', '$deskripsi', '$harga', '$gambar' )

			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang di upload
	if( $error === 4 ) {
		echo "<script>
				alert('photo Produk Wajib di upload');
			 </script>";
		return false;
	}

	// cek apakah yang di  upload gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('Silahkan Upload Gambar yang Valid');
			 </script>";
		return false;
	} 

	// cek jika ukuran terlalu besar

	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('Ukuran Gambar Terlalu Besar');
			 </script>";
		return false;

	}

	// lolos pengecekan, gambar siap di upload
	//generate nama gambar
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, "img/" . $namaFileBaru);

	return $namaFileBaru;
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM produk WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$nama = stripslashes($data["nama"]);
	$email = strtolower(stripslashes($data["email"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	
	//username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('Username Sudah Terdaftar!');
			  </script>";
		return false;
	}
	// cek apakah konfirmasi password sama dengan password
	if( $password !== $password2 ) {
		echo "<script>

				alert('konfirmasi password tidak sesuai');

			  </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$nama', '$email', '$password')");

	return mysqli_affected_rows($conn);
}

function hapususer($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM user WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function cari($keyword) {
	$query = "SELECT * FROM produk
				WHERE 
			nama_produk LIKE '%$keyword%' OR
			kode_produk LIKE '%$keyword%' OR
			paket_produk LIKE '%$keyword%'
			";
	return query($query);

}

function addstaff($data) {
	global $conn;

	$namaStaff = htmlspecialchars($data["nama_staff"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$email = htmlspecialchars($data["email"]);
	$whatsapp = htmlspecialchars($data["whatsapp"]);
	$bagian = htmlspecialchars($data["bagian"]);
	$tglReg = $data["tglreg"];


	//query insert data
	$query = "INSERT INTO staff
				VALUES
			 ('', '$namaStaff', '$alamat', '$email', '$whatsapp', '$bagian', '$tglReg')

			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function hapusstaff($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM staff WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function editstaff($id) {
	global $conn;

	$id = $data["id"];
	$namaStaff = htmlspecialchars($data["nama_staff"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$email = htmlspecialchars($data["email"]);
	$whatsapp = htmlspecialchars($data["whatsapp"]);
	$bagian = htmlspecialchars($data["bagian"]);
	$tglReg = $data["tglreg"];

	//query Update data
	$query = "UPDATE staff SET
				nama_staff = '$namaStaff',
				alamat = '$alamat',
				email = '$email',
				whatsapp = '$whatsapp',
				bagian = '$bagian',
				tglreg = '$tglReg'
			  WHERE id = $id
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

?>