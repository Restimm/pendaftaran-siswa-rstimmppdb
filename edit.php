<?php

session_start();

$mysqli = new mysqli("localhost", "root", "", "ukkppdbimam");

if ($mysqli->connect_error) {
  die("Koneksi ke database gagal: " . $mysqli->connect_error);
}

if (!isset($_SESSION['username'])) {
  header("Location: login_admin.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  $id = $_POST["id"];
  $nama = $_POST["nama"];
  $tempat_lahir = $_POST["tempat_lahir"];
  $tanggal_lahir = $_POST["tanggal_lahir"];
  $warga_negara = $_POST["warga_negara"];
  $alamat = $_POST["alamat"];
  $email = $_POST["email"];
  $no_hp = $_POST["no_hp"];
  $asal_smp = $_POST["asal_smp"];
  $nama_ayah = $_POST["nama_ayah"];
  $nama_ibu = $_POST["nama_ibu"];
  $penghasilan_orangtua = $_POST["penghasilan_orangtua"];

  $sql = "UPDATE tblpendaftaran SET nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', warga_negara='$warga_negara', alamat='$alamat', email='$email', no_hp='$no_hp', asal_smp='$asal_smp', nama_ayah='$nama_ayah', nama_ibu='$nama_ibu', penghasilan_orangtua='$penghasilan_orangtua' WHERE id=$id";

  if ($mysqli->query($sql) === TRUE) {
    echo "Data berhasil diperbarui";
    header("Location: homeadmin.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
}

$id = isset($_GET["id"]) ? $_GET["id"] : die("Parameter ID tidak ditemukan");

$sql = "SELECT * FROM tblpendaftaran WHERE id=$id";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {

  $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Data Siswa</title>
</head>
<body>

<div class="container">
  <h2>Update Data Siswa</h2>

  <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label>Nama:</label>
    <input type="text" name="nama" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : ''; ?>">
    <label>Tempat Lahir:</label>
    <input type="text" name="tempat_lahir" value="<?php echo isset($_POST['tempat_lahir']) ? $_POST['tempat_lahir'] : ''; ?>">
    <label>Tanggal Lahir:</label>
    <input type="text" name="tanggal_lahir" value="<?php echo isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : ''; ?>">
    <label>Warga Negara:</label>
    <input type="text" name="warga_negara" value="<?php echo isset($_POST['warga_negara']) ? $_POST['warga_negara'] : ''; ?>">
    <label>Alamat:</label>
    <input type="text" name="alamat" value="<?php echo isset($_POST['alamat']) ? $_POST['alamat'] : ''; ?>">
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
    <label>No. HP:</label>
    <input type="text" name="no_hp" value="<?php echo isset($_POST['no_hp']) ? $_POST['no_hp'] : ''; ?>">
    <label>Asal SMP:</label>
    <input type="text" name="asal_smp" value="<?php echo isset($_POST['asal_smp']) ? $_POST['asal_smp'] : ''; ?>">
    <label>Nama Ayah:</label>
    <input type="text" name="nama_ayah" value="<?php echo isset($_POST['nama_ayah']) ? $_POST['nama_ayah'] : ''; ?>">
    <label>Nama Ibu:</label>
    <input type="text" name="nama_ibu" value="<?php echo isset($_POST['nama_ibu']) ? $_POST['nama_ibu'] : ''; ?>">
    <label>Penghasilan Orang Tua:</label>
    <input type="text" name="penghasilan_orangtua" value="<?php echo isset($_POST['penghasilan_orangtua']) ? $_POST['penghasilan_orangtua'] : ''; ?>">

    <input type="submit" value="Update">
  </form>
</div>

</body>
</html>



<?php
} else {
  echo "Data siswa tidak ditemukan";
}

$mysqli->close();
?>
