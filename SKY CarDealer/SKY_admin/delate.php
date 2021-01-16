
<?php
include "koneksi.php";
 
  $idh = $_GET["id_customers"];
 
  // query sql
  $sql = "DELETE FROM Customers WHERE id_customers='$idh'";
  $query = mysqli_query($koneksi, $sql) or die (mysqli_error());
 
  if($query){
    echo "Data berhasil di Hapus!";
  } else {
    echo "Error :".$sql."<br>".mysqli_error($koneksi);
  }
 
  mysqli_close($koneksi);
?>
