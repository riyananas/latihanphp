<?php
	$content = "
	<html> 
	<body>
		<table class="table table-bordered table-striped" cellpadding="10" cellspacing="0">
			<tr class="table table-secondary">
				<th>No.</th>
				<th>Kode Produk</th>
				<th>Nama Produk</th>
				<th>Paket Produk</th>
				<th>Harga</th>
				<th>Photo Produk</th>
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
			</tr>
			<?php $i++; ?>
				<?php endforeach; ?>
		</table>
	</body>
	</html>
	";

	require_once "./mpdf_v8.0.3-master/vendor/autoload.php";
	$mpdf = new \Mpdf\Mpdf();
	$mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
	$mpdf->WriteHTML($content);
	$mpdf->Output();
?>