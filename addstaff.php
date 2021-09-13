<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("location:login.php");
    exit;
}


if( isset($_POST["submit"]) ) {

    if( addstaff($_POST) > 0 ) {
        echo "<script>
                alert('Staff Baru Berhasil ditambahkan!');
                document.location.href = '?view=staff';
              </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<h1>Tambah Staff Baru</h1>

<form action="" method="post" enctype="multipart/form-data">
        <label for="nama_staff">Nama :</label>
        <input type="text" name="nama_staff" id="nama_staff" class="form-control mb-2" placeholder="Input Nama Staff Baru" required>
        
        <label for="alamat">Alamat :</label>
        <textarea name="alamat" id="alamat" class="form-control mb-2" placeholder="Input Alamat Staff Baru" cols="50" rows="5" size="20" required></textarea>
        
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" class="form-control mb-2" placeholder="exp : emailstaff@example.com" required>
     
        <label for="whatsapp">No.Hp/Whatsapp :</label>
        <input type="number" name="whatsapp" id="whatsapp" class="form-control mb-2" placeholder="exp : 0821-1234-5678" required>
      
        <label for="bagian" >Bagian :</label>
        <input type="text" name="bagian" id="bagian" class="form-control mb-2" placeholder="exp : Marketing" required><br>

        <label for="tglreg" >tgl Registrasi :</label>
        <input type="date" name="tglreg" id="tglreg" class="form-control mb-2" required><br>

        <input type="submit" name="submit" value="Tambahkan Staff" class="btn btn-primary">
        <input type="reset" name="batal" value="BATAL" class="btn btn-danger">
    
</form>