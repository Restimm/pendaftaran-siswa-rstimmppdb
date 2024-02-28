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
    $query = "SELECT Nama, TempatTanggalLahir, UploadFoto FROM tblpendaftaran WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $siswa_id);
    
    // Periksa apakah query berhasil dieksekusi
    if(mysqli_stmt_execute($stmt)) {
        // Ikatan hasil query ke variabel
        mysqli_stmt_bind_result($stmt, $nama, $ttl, $foto);

        // Periksa apakah data siswa ditemukan
        if(mysqli_stmt_fetch($stmt)) {
            // Tampilkan detail siswa
            echo "<h2>Detail Siswa</h2>";
            echo "<p>Nama: $nama</p>";
            echo "<p>Tempat, Tanggal Lahir: $ttl</p>";
            echo "<p><img src='uploads/$foto' alt='Foto Siswa'></p>";
        } else {
            echo "<p>Data siswa tidak ditemukan untuk ID: $siswa_id.</p>";
        }
    } else {
        echo "<p>Gagal mengeksekusi query.</p>";
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
} else {
    echo "<p>ID siswa tidak diberikan.</p>";
}

// Tutup koneksi
mysqli_close($conn);
?>
