<?php
// Jika terdapat parameter 'message' dengan nilai 'success', maka tampilkan pesan
if(isset($_GET['message']) && $_GET['message'] == 'success') {
    echo "<p style='text-align: center; background-color: #a5d6a7; padding: 10px;'>Data anda berhasil disimpan!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa</title>
    <link rel="stylesheet" type="text/css" href="css/detail.css">
     <style>
        /* CSS untuk mengatur ukuran foto */
        .foto-siswa {
            max-width: 200px;
            height: 200px;
        }
    </style>
    <a href="index.php">Kembali ke utama</a>
    

<div class="container">
    <!-- Kode untuk menampilkan detail siswa -->
    <?php
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "ukkppdbimam");

    // Periksa koneksi
    if (!$conn) {
        die("Tidak bisa terhubung dengan database: " . mysqli_connect_error());
    }

    // Periksa apakah parameter ID siswa diberikan
    if(isset($_GET['id'])) {
        // ID siswa dari parameter URL
        $siswa_id = $_GET['id'];

        // Query untuk mengambil data siswa dari database
        $query = "SELECT * FROM tblpendaftaran WHERE id = $siswa_id";
        $result = mysqli_query($conn, $query);

        // Periksa apakah query berhasil dieksekusi dan data siswa ditemukan
        if($result && mysqli_num_rows($result) > 0) {
            // Ambil data siswa dari hasil query
            $siswa = mysqli_fetch_assoc($result);

            // Tampilkan detail siswa
            echo "<h2>Detail Siswa</h2>";
            echo "<p>Nama: {$siswa['Nama']}</p>";
            echo "<p>Tempat, Tanggal Lahir: {$siswa['TempatTanggalLahir']}</p>";
            echo "<p>Alamat: {$siswa['Alamat']}</p>";
            echo "<p>Email: {$siswa['Email']}</p>";
            echo "<p>No. Telepon: {$siswa['NoHP']}</p>";
            echo "<p>Asal SMP: {$siswa['AsalSMP']}</p>";
            echo "<p>Nama Ayah: {$siswa['NamaAyah']}</p>";
            echo "<p>Nama Ibu: {$siswa['NamaIbu']}</p>";
            echo "<p>Penghasilan Orang Tua: {$siswa['PenghasilanOrTu']}</p>";
           echo "<p><img src='uploads/{$siswa['UploadFoto']}' alt='Foto Siswa' style='width: 200px; height: 200px;'></p>";

        } else {
            echo "<p>Data siswa tidak ditemukan.</p>";
        }
    } else {
        echo "<p>ID siswa tidak diberikan.</p>";
    }

    // Tutup koneksi
    mysqli_close($conn);
    ?>
</div>
<button class="print" onclick="window.print()">Print Disini</button>

</body>
</html>
