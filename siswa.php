<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>
<body>
    <h1>Data Siswa</h1>

    <!-- Bagian Daftar Siswa -->
    <h2>Daftar Siswa</h2>
    <ul>
        <?php
        // Koneksi ke database
        $koneksi = mysqli_connect("localhost", "root", "", "ukkppdbimam");

        // Query untuk mengambil daftar siswa
        $query = "SELECT * FROM tblpendaftaran";
        $result = mysqli_query($koneksi, $query);

        // Loop untuk menampilkan daftar siswa
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li><a href='siswa.php?id=" . $row['id'] . "'>" . $row['Nama'] . "</a></li>";
        }

        // Tutup koneksi
        mysqli_close($koneksi);
        ?>
    </ul>

    <?php
    // Periksa apakah parameter ID siswa diberikan melalui URL
    if (isset($_GET['id'])) {
        // Koneksi ke database
        $koneksi = mysqli_connect("localhost", "root", "", "ukkppdbimam");

        // Ambil ID siswa dari URL
        $id_siswa = $_GET['id'];

        // Query untuk mengambil data siswa berdasarkan ID
        $query = "SELECT * FROM tblpendaftaran WHERE id = $id_siswa";
        $result = mysqli_query($koneksi, $query);

        // Periksa apakah siswa ditemukan
        if (mysqli_num_rows($result) > 0) {
            $siswa = mysqli_fetch_assoc($result);
            // Tampilkan informasi siswa
            echo "<h2>Detail Siswa</h2>";
            echo "<p>Nama: " . $siswa['Nama'] . "</p>";
            echo "<p>Tempat, Tanggal Lahir: " . $siswa['TempatTanggalLahir'] . "</p>";
            // Tambahkan informasi lainnya sesuai kebutuhan
        } else {
            echo "<p>Siswa tidak ditemukan.</p>";
        }

        // Tutup koneksi
        mysqli_close($koneksi);
    }
    ?>
</body>
</html>
