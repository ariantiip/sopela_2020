<?php
// KONEKSI SERVER
$koneksi = mysqli_connect("localhost", "root", "", "arianti");
if (!$koneksi) {
	die("<br>" . "koneksi database GAGAL !!!");
} // else {echo "berhasil konek";}

// FUNCTION TAMBAH
function masukan($data)
{
	global $koneksi;
	// ambil data dari form
	$nama = htmlspecialchars($data['nama']);
	$email = htmlspecialchars($data['email']);
	$masukan = htmlspecialchars($data['masukan']);

	// Membuat query SQL untuk menyimpan data ke database
	$sql = "INSERT INTO sopela (nama, email, masukan) 
				VALUES ('$nama', '$email', '$masukan')";
	mysqli_query($koneksi, $sql);

	return mysqli_affected_rows($koneksi);
}

// CEK BUTTON KIRIM SUDAH DIKLIK/BELUM
if (isset($_POST["kirim"])) {
	if (masukan($_POST) > 0) {
		echo "
		<script>
			alert('masukan berhasil dikirim');
			document.location.href = 'kontak.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('masukan gagal dikirim');
			document.location.href = 'kontak.php';
		</script>
		";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>sopela kontak</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<header>
	<h2>Sopela</h2>
	<nav class="nav">
		<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="Kontak.php" class="active">Kontak</a></li>
			<li><a href="about.html">Tentang Kami</a></li>
		</ul>
	</nav>
</header>

<body>
	<div class="kontak">
		<div class="container">
			<form method="post" action="">
				<h3 style="text-align: center; margin: 0;">Kontak</h3>
				<label for="nama">Nama</label>
				<input type="text" id="nama" name="nama" placeholder="nama kamu.." required>
				<label for="email">E-mail</label>
				<input type="text" id="email" name="email" placeholder="e-mail kamu.." required>
				<label for="masukan">Masukan</label>
				<textarea id="masukan" name="masukan" placeholder="tulis masukan.." required style="height:80px"></textarea>
				<input type="submit" value="kirim" name="kirim">
			</form>
		</div>
	</div>

	<footer>copyright@2020</footer>
</body>

</html>