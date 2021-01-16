
<h2>Update Customers</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM customers WHERE id='$_GET[id];'");
$pecah = $ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";

?>

<form method="post">
<div class="form-group">
<label>Name</label>
	    		<input type="text" name="tname_customers"  class="form-control" value="<?php echo $pecah['nama'];?>">
 <label>email</label>
				  <type="text" class="form-control" name="temail_customers"  placeholder="Masukkan Alamat email anda disini"><?=$alamat?></textarea>
<label>wish</label>
          <type="text" class="form-control" name="twish_customers" placeholder="Masukan Alamat rumah anda disini"><?=$wish?></textarea> 	
    </div>
<button> class="btn btn-primary" name="update"Update</button>    
</form>

<?php
if (isset($_POST['update']))
{
  $koneksi->query("UPDATE customers SET tname_customers='$_POST[tname_customers]',
  email='$_POST[temail_customers]', wish='$_POST[twish_customers]' WHERE id='$_GET[id]'");
  echo "<script>alret('data customers telah di update');</script>";
  echo "<script>location='costumers.php?halaman=merk';</script>";
}
?>
 