<?php
require '../database/functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM produk
			WHERE 
		nama_produk LIKE '%$keyword%' OR
		kode_produk LIKE '%$keyword%' OR
		paket_produk LIKE '%$keyword%'
		";
$produk = query($query);
				
?>

	<table class="table table-bordered table-striped" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Kode Produk</th>
			<th>Nama Produk</th>
			<th>Paket Produk</th>
			<th>Harga</th>
			<th>Photo Produk</th>
			<th>Aksi</th>
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
			<td><a href="?view=edit&id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin merubah data Produk?');"><input type="submit" name="simpan" value="EDIT" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm mb-2 btn-left"></a>  <a href="?view=hapus&id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin menghapus data Produk?');"><input type="submit" name="hapus" value="HAPUS" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mb-2 btn-right"></a>
			</tr>
		<?php $i++; ?>
			<?php endforeach; ?>
	</table>