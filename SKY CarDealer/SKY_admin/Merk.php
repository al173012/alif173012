<h2>SKY Car Dealer2</h2>
<?php
	$koneksi = new mysqli("localhost", "root", "", "Car Dealer2");
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>Merk</th>
            <th>Price Merk</th>
            <th>Weight Merk</th>
            <th>Description Merk</th>
        </tr>
    </thead>
        <tbody>
            <?php $nomor=1; ?>
            <?php $ambil=$koneksi->query("SELECT * FROM Merk"); ?>
            <?php while($pecah = $ambil->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah['name_mek']; ?></td>
                    <td><?php echo $pecah['price_merk']; ?></td>
                    <td><?php echo $pecah['weight_merk']; ?></td>
                    <td><?php echo $pecah['description_merk']; ?></td>
                    <td>
                    </td>
                </tr>
                <?php $nomor++; ?>

                <?php } ?>

        </tbody>
</table>


