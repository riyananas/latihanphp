<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("location:login.php");
    exit;
}


$id = $_GET['id'];

if( hapususer($id) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = '?view=user';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = '?view=user';
		</script>
	";
}