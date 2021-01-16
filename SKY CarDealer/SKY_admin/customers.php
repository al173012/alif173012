<h2>Customers</h2>
<?php

$koneksi = new mysqli("localhost", "root", "", "Car Dealer2");

    if(isset($_POST['bsimpan']))
	{
		
		if($_POST['bsimpan'] == "edit")
		{
			//ini data yg mau diedit
			$edit = mysqli_query($koneksi, "UPDATE Customers set
											 	NO = '$_POST[id_customers]',
											 	Name = '$_POST[tname_customers]',
												email = '$_POST[temail_customers]',
											 	wish = '$_POST[twish_customers]'
											 WHERE id_customers = '$_GET[id]'");
			if($edit) //jika edit/updatenya clear
			{
				echo "<script>alert(your data succesfully saved');document.location='customers.php';</script>";
			}
			else
			{
				echo "<script>alert('your data failed to be saved');document.location='customers.php';</script>";
			}
		}
		else
		{
			//Data disimpan yg baru
			$simpan = mysqli_query($koneksi, "INSERT INTO tCustomers (id_customers, name_customers, email_customers, hope_customers)
										  VALUES ('$_POST[id_ustomers]', 
										  		 '$_POST[tname_customers]', 
										  		 '$_POST[temail_customers]', 
										  		 '$_POST[twish_customers]') ");
			if($simpan) //if save clear
			{
				echo "<script>
						alert('you're data succefully saved');document.location='customers.php';</script>";
			}
			else
			{
				echo "<script>alert('sorry your form failed to save');document.location='customers.php';</script>";
			}
		}


		
	}
   
   //pengujian hpus/edit
	if(isset($_GET[' ']))
	{
		//kalo edit/update data
		if($_GET[' '] == "edit")
		{
			//tampilin data yg bakal diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM Customers WHERE id_customers = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//ketemu, dimasukin kedalam variabel
				$id_customers = $data['id_customers'];
				$Name = $data['name_customers'];
				$email = $data['email_customers'];
				$wish = $data['wish_customers'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//priper delate data
			$hapus = mysqli_query($koneksi, "DELETE FROM Customers WHERE id_customers = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('your'e data has ben deleted');
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
	<link >
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
	    		<input type="text" name="tid_customers" value="<?=@$id_customers?>" class="form-control" placeholder="Masukkan nomor pemesanan disini" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Name</label>
	    		<input type="text" name="tname_customers" value="<?=@$name_customers?>" class="form-control" placeholder="Masukkan nama anda disini" required>
	    	</div>
	    	<div class="form-group">
	    		<label>email</label>
				<textarea class="form-control" name="temail_customers"  placeholder="Masukkan Alamat email anda disini"><?=@$alamat?></textarea>
	    	</div>
	    	<div class="form-group">
	    		<label>wish</label>
				<select class="form-control" name="tjenis_AR">
				<option value="<?=@$wish?>"><?=@your_wish?></option>
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
	    		<th>wish</th>
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
	    			<a href="customers.php?;<?=$data['id_customers']?>" class="btn btn-warning"> Update </a>
	    			<a href="customers.php?;<?=$data['id_customers']?>" 
	    			   onclick="confirm('do you really want to delete it')" class="btn btn-danger"> Delete </a>
	    		</td>
	    	</tr>
	    <?php endwhile; //di end dari perulangan while ?>
	    </table>

	  </div>
	</div>
	<!-- Akhir Card Tabel -->

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>

