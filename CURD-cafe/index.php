<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php

// --- koneksi ke database
$koneksi = mysqli_connect("localhost","root"," ","crud") or die(mysqli_error());

// --- Fngsi tambah data (Create)
function tambah($koneksi){
	
	if (isset($_POST['btn_simpan'])){
		$id = time();
		$nama_coffe = $_POST['nama_coffe'];
		$tanggal = $_POST['tanggal_cafe'];
		$pengunjung = $_POST['pengunjung_cafe'];
		$hasil = $_POST['hasil_cafe'];
		
		if(!empty($nama_coffe) && !empty($hasil) && !empty($penggunjung) && !empty($hasil_cafe)){
			$sql = "INSERT INTO cafe (id_cafe, nama_coffe, tanggal_cafe, pengunjung_cafe, hasil_cafe) VALUES(".$id.",'".$nama_coffe."','".$hasil."','".$pengunjung."','".$hasil_cafe."')";
			$simpan = mysqli_query($koneksi, $sql);
			if($simpan && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'create'){
					header('location: index.php');
				}
			}
		} else {
			$pesan = "Tidak dapat menyimpan, data belum lengkap!";
		}
	}

	?> 
		<form action="" method="POST">
			<fieldset>
				<legend><h2>Tambah data</h2></legend>
				<label>Nama Coffe <input type="text" name="nama_coffe" /></label> <br>
				<label>Tanggal <input type="date" name="tanggal_cafe" /></label><br>
				<label>Penggujung <input type="number" name="penggunjung_cafe" /> orang</label> <br>
				<label>Hasil <input type="number" name="hasil_cafe" /></label> <br>
				<br>
				<label>
					<input type="submit" name="btn_simpan" value="Simpan"/>
					<input type="reset" name="reset" value="Besihkan"/>
				</label>
				<br>
				<p><?php echo isset($pesan) ? $pesan : "" ?></p>
			</fieldset>
		</form>
	<?php

}
// --- Tutup Fngsi tambah data


// --- Fungsi Baca Data (Read)
function tampil_data($koneksi){
	$sql = "SELECT * FROM crud";
	$query = mysqli_query($koneksi, $sql);
	
	echo "<fieldset>";
	echo "<legend><h2>Data Cafe</h2></legend>";
	
	echo "<table border='1' cellpadding='10'>";
	echo "<tr>
			<th>ID</th>
			<th>Nama Coffe</th>
			<th>Tanggal</th>
			<th>Penggunjung</th>
			<th>Hasil Cafe</th>
			<th>Tindakan</th>
		  </tr>";
	
	while($data = mysqli_fetch_array($query)){
		?>
			<tr>
				<td><?php echo $data['id_cafe']; ?></td>
				<td><?php echo $data['nama_coffe']; ?></td>
				<td><?php echo $data['tanggal_cafe']; ?> date</td>
				<td><?php echo $data['penggunjung_cafe']; ?> orang</td>
				<td><?php echo $data['hasil_cafe']; ?> Rp</td>
				<td>
					<a href="index.php?aksi=update&id=<?php echo $data['id']; ?>&nama=<?php echo $data['nama_coffe']; ?>&hasil=<?php echo $data['tanggal_cafe']; ?>&pengunjung=<?php echo $data['pengunjung_cafe']; ?>&hasil=<?php echo $data['hasil_cafe']; ?>">Ubah</a> |
					<a href="index.php?aksi=delete&id=<?php echo $data['id']; ?>">Hapus</a>
				</td>
			</tr>
		<?php
	}
	echo "</table>";
	echo "</fieldset>";
}
// --- Tutup Fungsi Baca Data (Read)


// --- Fungsi Ubah Data (Update)
function ubah($koneksi){

	// ubah data
	if(isset($_POST['btn_ubah'])){
		$id = $_POST['id_cafe'];
		$nama_coffe = $_POST['nama_coffe'];
		$tanggal = $_POST['tanggal_cafe'];
		$penggunjung = $_POST['penggunjung_cafe'];
		$hasil_cafe = $_POST['hasil_cafe'];
		
		if(!empty($nama_coffe) && !empty($hasil) && !empty($penggunjung) && !empty($hasil_cafe)){
            $perubahan = "nama_coffe='".$nama_coffe."',tanggal_cafe=".$tanggal.",penggunjung_cafe=".$penggunjung.",hasil_cafe='".$hasil_cafe."'";
			$sql_update = "UPDATE cafe SET ".$perubahan." WHERE id=$id";
			$update = mysqli_query($koneksi, $sql_update);
			if($update && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'update'){
					header('location: index.php');
				}
			}
		} else {
			$pesan = "Data tidak lengkap!";
		}
	}
	
	// tampilkan form ubah
	if(isset($_GET['id'])){
		?>
			<a href="index.php"> &laquo; Home</a> | 
			<a href="index.php?aksi=create"> (+) Tambah Data</a>
			<hr>
			
			<form action="" method="POST">
			<fieldset>
				<legend><h2>Ubah data</h2></legend>
				<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"/>
				<label>Nama Coffe <input type="text" name="nama_coffe" value="<?php echo $_GET['nama'] ?>"/></label> <br>
				<label>Tanggal <input type="number" name="tanggal_cafe" value="<?php echo $_GET['tanggal_cafe'] ?>"/> date</label><br>
				<label>Penggunjung <input type="text" name="penggunjung_cafe" value="<?php echo $_GET['penggunjung_cafe'] ?>"/> orang</label> <br>
				<label>Hasil <input type="number" name="hasil_cafe" value="<?php echo $_GET['hasil_cafe'] ?>"/></label> <br>
				<br>
				<label>
					<input type="submit" name="btn_ubah" value="Simpan Perubahan"/> atau <a href="index.php?aksi=delete&id=<?php echo $_GET['id'] ?>"> (x) Hapus data ini</a>!
				</label>
				<br>
				<p><?php echo isset($pesan) ? $pesan : "" ?></p>
				
			</fieldset>
			</form>
		<?php
	}
	
}
// --- Tutup Fungsi Update


// --- Fungsi Delete
function hapus($koneksi){

	if(isset($_GET['id_cafe']) && isset($_GET['aksi'])){
		$id = $_GET['id_cafe'];
		$sql_hapus = "DELETE FROM cafe WHERE id=" . $id;
		$hapus = mysqli_query($koneksi, $sql_hapus);
		
		if($hapus){
			if($_GET['aksi'] == 'delete'){
				header('location: index.php');
			}
		}
	}
	
}
// --- Tutup Fungsi Hapus


// ===================================================================

// --- Program Utama
if (isset($_GET['aksi'])){
	switch($_GET['aksi']){
		case "create":
			echo '<a href="index.php"> &laquo; Home</a>';
			tambah($koneksi);
			break;
		case "read":
			tampil_data($koneksi);
			break;
		case "update":
			ubah($koneksi);
			tampil_data($koneksi);
			break;
		case "delete":
			hapus($koneksi);
			break;
		default:
			echo "<h3>Aksi <i>".$_GET['aksi']."</i> tidaka ada!</h3>";
			tambah($koneksi);
			tampil_data($koneksi);
	}
} else {
	tambah($koneksi);
	tampil_data($koneksi);
}

?>
</body>
</html>