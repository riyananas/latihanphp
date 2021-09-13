<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("location:login.php");
    exit;
}

?>
<div class="d-sm-flex align-items-center justify-content-between mb-1">
	<a href="?view=adduser" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2 btn-right"><i class="fas fa-plus fa-sm text-white-50"></i> Add User</a>
	<h1 class="h3 mb-0 text-gray-800">Data User</h1>
	<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm mb-2 btn-right"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
<table class="table table-bordered table-striped" cellpadding="10" cellspacing="0">
<tr class="table table-secondary">
	<th>No.</th>
	<th>Username</th>
	<th>Nama</th>
	<th>Email</th>
	<th colspan="2">Aksi</th>
</tr>
<?php $i = 1; ?>
	<?php foreach( $user as $row ) : ?>
<tr>
	<td><?= $i ?></td>
	<td><?= $row["username"]; ?></td>
	<td><?= $row["nama"]; ?></td>
	<td><?= $row["email"]; ?></td>
	<td>
		<a href="?view=edituser&id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin merubah data User?');"><input type="submit" name="simpan" value="EDIT" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mb-2 btn-left"></a>
	</td>
	<td>
		<a href="?view=hapususer&id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin menghapus data User?');"><input type="submit" name="hapususer" value="HAPUS" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mb-2 btn-right"></a>
	</td>
</tr>
<?php $i++; ?>
	<?php endforeach; ?>
</table>