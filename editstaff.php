<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("location:login.php");
    exit;
}

require 'database/functions.php';

// ambil data dari URL
$id = $_GET["id"];

// query data staff berdasarkan id
$stf = query("SELECT * FROM staff WHERE id = $id")[0];

// cek apakah tombol submit sudah di tekan
if( isset($_POST["update"]) ) {

    // cek apakah data berhasil di update
    if( editstaff($_POST) > 0 ) {
        echo "<script>
                alert('Data Staff Berhasil diupdate!');
                document.location.href = '?view=staff';
              </script>";
    } else {
        echo "
            <script>
                alert('Data Staff gagal diupdate!');
                document.location.href = '?view=staff';
            </script>
        ";
    }
}
?>
<h1>Edit Data Staff</h1>
 <input type="hidden" name="id" value="<?= $stf["id"]; ?>">
<form action="" method="post" enctype="multipart/form-data">
        <label for="nama_staff">Nama :</label>
        <input type="text" name="nama_staff" id="nama_staff" value="<?= $stf["nama_staff"]; ?>" class="form-control mb-2" required>
        
        <label for="alamat">Alamat :</label>
        <input type="text" name="alamat" id="alamat" value="<?= $stf["alamat"]; ?>" class="form-control mb-2" required>
        
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" value="<?= $stf["email"]; ?>" class="form-control mb-2" required>
     
        <label for="whatsapp">No.Hp/Whatsapp :</label>
        <input type="number" name="whatsapp" id="whatsapp" value="<?= $stf["whatsapp"]; ?>" class="form-control mb-2" required>
      
        <label for="bagian" >Bagian :</label>
        <input type="text" name="bagian" id="bagian" value="<?= $stf["bagian"]; ?>" class="form-control mb-2" required><br>

        <label for="tglreg" >tgl Registrasi :</label>
        <input type="date" name="tglreg" id="tglreg" value="<?= $stf["tglreg"]; ?>" class="form-control mb-2"><br>

        <input type="submit" name="update" id="update" value="Update Staff" class="btn btn-primary">
        <input type="reset" name="batal" value="BATAL" class="btn btn-danger">
    
</form>