<h2> Tambah Buku </h2>

<form method="post" enctype="multipart/from-data">
    
    <div class= "from-group">
        <label>id_customers</label>
        <input type="text" class="form-control" name="id_customers">
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="tname_customers">
    </div>
    <div> class="form-group">
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
    <div>
        <label> email</label>
        <input type="number" class="form-control" name="temail_customers">
    </div>
    <button class="btn btn-primary" name ="save">Save</button>
</form>
<?php
if (isset($_POST['save']))
{
$koneksi->query("INSERT INTO cutomers
(id_customers, name_customers, email_customers, wish_customers)
VALUES('$_POST[id_customers]', '$_POST[name]', '$_POST[email]','$_POST[wish]')");
    
    echo "<div class='alret alret-info'>Data berhasil ditambahkan</div>";
    echo "<meta http-equiv='refresh' content='1;url=customers.php?halaman=Merk'>";
}
?>