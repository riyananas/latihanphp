<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("location:login.php");
    exit;
}

$team = query("SELECT * FROM team");

// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {

	// cek apakah data berhasil di tambahkan atau tidak
	if( addteam($_POST) > 0 ) {
		echo "
			<script>
				alert('Staff berhasil ditambahkan!');
				document.location.href = '?view=staff';
			</script>
		";
	}else {
		echo "
			<script>
				alert('Staff gagal ditambahkan!');
				document.location.href = '?view=addstaff';
			</script>
		";
	}
}
?>
<div class="d-sm-flex align-items-center justify-content-between mb-1">
	<a href="?view=addstaff" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2 btn-right"><i class="fas fa-plus fa-sm text-white-50"></i> Add Staff</a>
	<h1 class="h3 mb-0 text-gray-800">Data Staff</h1>
	<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm mb-2 btn-right"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
<table class="table table-bordered table-striped" cellpadding="10" cellspacing="0">
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Email</th>
		<th>No.hp/whatsapp</th>
		<th>Bagian</th>
		<th>Tgl Registrasi</th>
		<th colspan="2">Aksi</th>
	</tr>
	<?php $i = 1; ?>
	<?php foreach( $staff as $row ) : ?>
	<tr>
		<td><?= $i ?></td>
		<td><?= $row["nama_staff"]; ?></td>
		<td><?= $row["alamat"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["whatsapp"]; ?></td>
		<td><?= $row["bagian"]; ?></td>
		<td><?= $row["tglreg"]; ?></td>
		<td>
			<a href="?view=editstaff&id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin merubah data Staff?');"><input type="submit" name="simpan" value="EDIT" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm mb-2 btn-left"></a> 
		</td>
		<td>
			<a href="?view=hapusstaff&id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin menghapus data Staff?');"><input type="submit" name="hapusstaff" value="HAPUS" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mb-2 btn-right">
		</td>
	</tr>
	<?php $i++; ?>
		<?php endforeach; ?>
</table>