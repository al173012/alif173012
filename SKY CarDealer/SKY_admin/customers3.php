<?php
	//ini Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "Car Dealer2";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	//ini kalo tombol save diklik tar muncul apa hayooo
	if(isset($_POST['bsimpan']))
	{
		//ntar dia diedit ato disimpen baru? ini kodingannya
		if($_POST['bsimpan'] == "edit")
		{
			//ini data yg mau diedit
			$edit = mysqli_query($koneksi, "UPDATE  Customers set
                                                     NO = '$_POST[no]',
                                                    Name = '$_POST[tname_customers]',
                                                     email = '$_POST[temail_customers]',
                                                    telephone = '$_POST[ttelephone_customers]'
											 WHERE id_customers = '$_GET[id]'
										   ");
			if($edit) //kalo edit/updatenya berhasil yuhuuu
			{
				echo "<script>
						alert('Yosha! Edit data sukses!');
						document.location='customer.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Yah, edit datanya gagal nih');
						document.location='customer.php';
				     </script>";
			}
		}
		else
		{
			//Data bakal disimpen yg baru
			$simpan = mysqli_query($koneksi, "INSERT INTO tCustomers (id_customers, name_customers, email_customers, telephone_customers)
            VALUES ('$_POST[id_ustomers]', 
                     '$_POST[tname]', 
                     '$_POST[temail_customers]', 
                     '$_POST[ttelephone]') 
										 ");
			if($simpan) //kalo simpen sukses
			{
				echo "<script>
						alert('Yuhuu! Simpan data sukses >_<');
						document.location='customer.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Walah walah, simpan datanya gagal');
						document.location='customer.php';
				     </script>";
			}
		}


		
	}


	//diuji dulu, bisa gak diedit/ update sama apus? makanya klik
	if(isset($_GET['hal']))
	{
		//kalo edit/update data
		if($_GET['hal'] == "edit")
		{
			//terus tampilin data yg bakal diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM tCustomers WHERE id_customer = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//kalo datanya ketemu, ntar dimasukin kedalam variabel, gangerti juga si wkwk intinya gitu
				$vid_customers = $data['id_customers'];
				$vName = $data['name_customers'];
				$vemail = $data['email_customers'];
				$vtelephone = $data['telephone'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//oke priper tu apus data
			$hapus = mysqli_query($koneksi, "DELETE FROM tCustomers WHERE id_customers = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Oke, data sudah dihapus ya ^_^');
						document.location='customers.php';
				     </script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>SKY Car Dealer2</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <h1 class="text-center">SKY Car Dealer2</h1>
	<h2 class="text-center">SKY coorp</h2>

	<!-- Awal Card Form -->
	<div class="card mt-3">
	  <div class="card-header bg-primary text-white">
	    Form Customers
	  </div>
      <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>id_customers</label>
	    		<input type="text" name="tid_customers" value="<?=@$vid_customers?>" class="form-control" placeholder="Masukkan nomor pemesanan disini" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Name</label>
	    		<input type="text" name="tname_customers" value="<?=@$vname_customers?>" class="form-control" placeholder="Masukkan nama anda disini" required>
	    	</div>
	    	<div class="form-group">
	    		<label>email</label>
	    		<textarea class="form-control" name="temail_customers"  placeholder="Masukkan email anda disini"><?=@$valamat?></textarea>
	    	</div>
	    	<div class="form-group">
	    		<label>telephone</label>
				<select class="form-control" name="tjenis_AR">
	    			<option value="<?=@$vjns_pemesanan?>"><?=@$vjns_pemesanan?></option>
	    			<option value="Hyundai Palaside">Hyundai Palaside</option>
	    			<option value="Hyundai Tucson">Hyundai Tucson</option>
	    			<option value="Mercedes-Benz C 200">Mercedes-Benz C 200</option>
					<option value="Tesla Model X 2021">Tesla Model X 2021</option>
	    			<option value="Toyota New Alphard">Toyota New Alphard</option>
	    		</select>
	    			</div>

	    	<button type="submit" class="btn btn-success" name="bsimpan">Save</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Reset</button>

	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->

	<!-- Awal Card Tabel -->
	<div class="card mt-3">
	  <div class="card-header bg-success text-white">
	   Customers
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
            <th>No.</th>
	    		<th>id_customers</th>
	    		<th>Name</th>
	    		<th>email</th>
	    		<th>telephone</th>
	    		<th>Action</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from Customers order by id_customers desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$no++;?></td>
	    		<td><?=$data['id_customers']?></td>
	    		<td><?=$data['name_customers']?></td>
	    		<td><?=$data['email_customers']?></td>
	    		<td><?=$data['wish_customers']?></td>
	    		<td>
	    			<a href="customers.php?hal=edit&id=<?=$data['id_customers']?>" class="btn btn-warning"> Update </a>
	    			<a href="customers.php?hal=hapus&id=<?=$data['id_customers']?>" 
	    			   onclick="confirm('do you really want to delete it')" class="btn btn-danger"> Delete </a>
	    		</td>
	    	</tr>
	    <?php endwhile; //di end dari perulangan while huhuu ?>
	    </table>

	  </div>
	</div>
	<!-- Akhir Card Tabel -->

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>