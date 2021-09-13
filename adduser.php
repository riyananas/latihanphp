<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("location:login.php");
    exit;
}


if( isset($_POST["register"]) ) {

    if( registrasi($_POST) > 0 ) {
        echo "<script>
                alert('User Baru Berhasil ditambahkan!');
                document.location.href = '?view=user';
              </script>";
    } else {
        echo "<script>
                alert('User Baru Gagal ditambahkan!');
                document.location.href = '?view=user';
              </script>";
    }
}
?>
<h1>Tambah User Baru</h1>

<form action="" method="post" enctype="multipart/form-data">
        <label for="username">Username :</label>
        <input type="text" name="username" class="form-control mb-2" autocomplete="off" placeholder="Input Username">
        
        <label for="nama">Nama :</label>
        <input type="text" name="nama" class="form-control mb-2" placeholder="Input Name">
        
        <label for="email">Email :</label>
        <input type="text" name="email" class="form-control mb-2" placeholder="Input Email">
     
        <label for="password">Password :</label>
        <input type="password" name="password" class="form-control mb-2" autocomplete="off" placeholder="Input Password">
      
        <label for="password2" >Konfirmasi Password :</label>
        <input type="password" name="password2" class="form-control mb-2" placeholder="Input Repeat Password"><br>

        <input type="submit" name="register" value="Tambahkan User" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2">
        <input type="reset" name="batal" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mb-2" value="BATAL">
    
</form>