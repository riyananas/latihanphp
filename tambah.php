<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("location:login.php");
    exit;
}


// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {

	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('Produk berhasil ditambahkan!');
				document.location.href = '?view=produk';
			</script>
		";
	}else {
		echo "
			<script>
				alert('Produk gagal ditambahkan!');
				document.location.href = '?view=tambah';
			</script>
		";
	}
}
?>

<h1>Tambah Produk</h1>
<form action="" method="post" enctype="multipart/form-data">
	<label for ="kode_produk">Kode Produk </label>
	<input type="text" name="kode_produk" id="kode_produk" class="form-control mb-2" required>
	<label for ="nama_produk">Nama Produk </label>
	<input type="text" name="nama_produk" id="nama_produk" class="form-control mb-2" required>
	<label for ="paket_produk mb-2">Paket Produk </label>
	<input type="text" name="paket_produk" id="paket_produk" class="form-control mb-2" required>
	<label for ="deskripsi">Deskripsi </label>
	<textarea name="deskripsi" id="deskripsi" cols="100" rows="15" class="form-control mb-2 ckeditor"></textarea>
	<label for ="harga">Harga </label>
	<input type="number" name="harga" id="harga" class="form-control mb-2" required>
	<label for ="gambar">Photo Produk </label>
	<input type="file" name="gambar" id="gambar" class="form-control mb-2" required>
	<br>
	<input type="submit" name="submit" value="SIMPAN" class="btn btn-primary"> 
	<input type="reset" name="batal" value="BATAL" class="btn btn-danger">
</form>