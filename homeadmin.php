<?php
// Mulai sesi
session_start();

// Cek apakah user sudah login
if(!isset($_SESSION['username'])){
    // Redirect ke halaman login jika belum login
    header("Location:login_admin.php");
    exit(); // Pastikan untuk keluar dari skrip setelah melakukan redirect
}
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/homeadmin.css">
    <title>News Portal</title>
</head>
<body>
    <header>
        <div class="logo">SMK NEGERI 1 AIR PUTIH</div>
        <nav>
            <ul>
                <li><a href="function.php?op=out">keluar</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="user-info">
            <p>Welcome, <?= $_SESSION['username'] ?></p>
        </div>

        <table border="1" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Warga Negara</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Asal SMP</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Penghasilan Orang Tua</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Buat koneksi ke database
                $koneksi = mysqli_connect("localhost", "root", "", "ukkppdbimam");

                // Periksa koneksi
                if (mysqli_connect_errno()) {
                    echo "Koneksi database gagal: " . mysqli_connect_error();
                    exit();
                }

                // Lakukan query untuk mengambil data dari tabel tblpendaftaran
                $query = "SELECT * FROM tblpendaftaran";
                $result = mysqli_query($koneksi, $query);

                // Iterasi melalui hasil query
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['Nama'] ?></td>
                        <td><?= $row['TempatTanggalLahir'] ?></td>
                        <td><?= $row['WargaNegara'] ?></td>
                        <td><?= $row['Alamat'] ?></td>
                        <td><?= $row['Email'] ?></td>
                        <td><?= $row['NoHP'] ?></td>
                        <td><?= $row['AsalSMP'] ?></td>
                        <td><?= $row['NamaAyah'] ?></td>
                        <td><?= $row['NamaIbu'] ?></td>
                        <td><?= $row['PenghasilanOrTu'] ?></td>
                       <td>
    <img src="uploads/<?= $row['UploadFoto'] ?>" alt="Foto" style="max-width: 100px; height: 100px;">
</td>
<td>
    
    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
</td>

                    </tr>
                <?php
                }

                // Tutup koneksi
                mysqli_close($koneksi);
                ?>
            </tbody>
        </table>

    </main>

    
</body>
</html>
