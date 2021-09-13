<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("location:login.php");
    exit;
}

$produk = query("SELECT * FROM produk");

?>
<form action="" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="d-sm-flex align-items-center justify-content-between">
        <input type="text" name="keyword" size="30" autofocus placeholder="Masukan Keyword Pencarian..." autocomplete="off" id="keyword" class="form-control bg-light mt-2 mb-2 border-1 small form-inline" aria-label="Search" aria-describedby="basic-addon2">
    </div>
</form>
<hr>
    <!-- Page Heading -->
 	<div class="d-sm-flex align-items-center justify-content-between mb-2">
 		<a href="?view=tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2 btn-right"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Produk</a>
		<h1 class="h3 mb-0 text-gray-800">Data Produk</h1>
		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm mb-2 btn-right"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
	</div>
	<div id="container">
		<table class="table table-bordered table-striped" cellpadding="10" cellspacing="0">
			<tr class="table table-secondary">
				<th>No.</th>
				<th>Kode Produk</th>
				<th>Nama Produk</th>
				<th>Paket Produk</th>
				<th>Harga</th>
				<th>Photo Produk</th>
				<th colspan="2">Aksi</th>
			</tr>
			<?php $i = 1; ?>
				<?php foreach( $produk as $row ) : ?>
			<tr>
				<td><?= $i ?></td>
				<td><?= $row["kode_produk"]; ?></td>
				<td><?= $row["nama_produk"]; ?></td>
				<td><?= $row["paket_produk"]; ?></td>
				<td>Rp. <?= $row["harga"]; ?></td>
				<td><img src="img/<?= $row["gambar"]; ?>" width="150"></td>
				<td class="aksi">
					<a href="?view=edit&id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin merubah data Produk?');"><input type="submit" name="simpan" value="EDIT" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mb-2 btn-left"></a>
				</td>
				<td>
					<a href="?view=hapus&id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin menghapus data Produk?');"><input type="submit" name="hapus" value="HAPUS" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mb-2 btn-right"></a>
				</td>
			</tr>
			<?php $i++; ?>
				<?php endforeach; ?>
		</table>
	</div>