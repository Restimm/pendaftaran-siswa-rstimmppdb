<html>
<head>
	<title>Register Page</title>
	<link rel="stylesheet" type="text/css" href="css/regis.css">
</head>
<body>

	<div class="login-container">
		<h1>SMK NEGERI 1 AIR PUTIH</h1>
		<h2 class="title-login">Formulir Pendaftaran</h2>
		<form action="function.php?op=register" method="post" enctype="multipart/form-data">

			<label class="label-login">Nama</label>
			<input type="text" name="nama" class="input-login">

			<label class="label-login">Tempat, Tanggal Lahir</label>
			<input type="text" name="ttl" class="input-login">

			<label class="label-login">Warga Negara</label>
			<input type="text" name="warganegara" class="input-login">

			<label class="label-login">Alamat</label>
			<input type="text" name="alamat" class="input-login">

			<label class="label-login">Email</label>
			<input type="text" name="email" class="input-login">

			<label class="label-login">No. Telp</label>
			<input type="text" name="nohp" class="input-login">

			<label class="label-login">Asal SMP</label>
			<input type="text" name="asalsmp" class="input-login">

			<label class="label-login">Nama Ayah</label>
			<input type="text" name="namaayah" class="input-login">

			<label class="label-login">Nama Ibu</label>
			<input type="text" name="namaibu" class="input-login">

			<label class="label-login">Penghasilan Orang Tua</label>
			<input type="text" name="penghasilanortu" class="input-login">

			<label class="label-login">Upload Foto</label>
			<input class="login-foto" type="file" name="uploadfoto">

			<button>Daftar</button>
			<a href="index.php">Kembali</a>

		</form>
	</div>

</body>
</html>