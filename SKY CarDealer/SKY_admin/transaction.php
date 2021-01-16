<?php
    $koneksi = new mysqli("localhost", "root", "", "Car Dealer2");
?>

<h2>transaction</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Name Customers</th>
            <th>Date Transaction</th>
            <th>Amount Transaction</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $ambil=$koneksi->query("SELECT * FROM transaction JOIN customers ON transaction
        id_customers=customers.id_customers"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td>x</td>
            <td><?php echo $pecah['name_customers']; ?></td>
            <td><?php echo $pecah['date_transaction']; ?></td>
            <td><?php echo $pecah['amount_transaction']; ?></td>
            <td>
                <a href="" class="btn btn-info">detail</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>   