<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "ukkppdbimam");

if (!$conn) {
    die("TIDAK BISA KONEKSI: " . mysqli_connect_error());
}

$op = $_GET['op'];

if($op == "in"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbllogin WHERE username=? AND password=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header('location:homeadmin.php');
    } else {
        echo "<script>
                alert('Username atau Password anda salah!');
                document.location.href = 'login_admin.php';
              </script>";
        exit();
    }
} elseif($op == "out"){
    unset($_SESSION['username']);
    unset($_SESSION['Level']);
    header('location:login_admin.php');
}

if($op == "register"){
    $nama = $_POST['nama'];
    $ttl = $_POST['ttl'];
    $warganegara = $_POST['warganegara'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $asalsmp = $_POST['asalsmp'];
    $namaayah = $_POST['namaayah'];
    $namaibu = $_POST['namaibu'];
    $penghasilanortu = $_POST['penghasilanortu'];
    
    $uploadfoto = $_FILES['uploadfoto']['name'];
    $targetDir = "uploads/";
    $targetPath = $targetDir . basename($uploadfoto);
    move_uploaded_file($_FILES['uploadfoto']['tmp_name'], $targetPath);

    $sql = "INSERT INTO tblpendaftaran (Nama, TempatTanggalLahir, WargaNegara, Alamat, Email, NoHP, AsalSMP, NamaAyah, NamaIbu, PenghasilanOrTu, UploadFoto) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssssssss", $nama, $ttl, $warganegara, $alamat, $email, $nohp, $asalsmp, $namaayah, $namaibu, $penghasilanortu, $uploadfoto);
    
    if (mysqli_stmt_execute($stmt)) {
    // Dapatkan ID siswa yang baru saja disimpan
    $newlyInsertedId = mysqli_insert_id($conn);

    // Redirect pengguna ke halaman detail dengan menyertakan pesan
    header('Location: detail.php?id=' . $newlyInsertedId . '&message=success');
    exit();
} else {
    // Jika gagal, tampilkan pesan error
    echo "<script>
            alert('Data anda gagal ditambahkan!,Mungkin ada yang error " . mysqli_error($conn) . "');
            document.location.href = 'register.php';
          </script>";
    exit();
}

}
