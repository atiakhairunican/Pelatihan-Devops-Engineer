<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM tbproduct ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>    
    <title>Homepage</title>

    <style>

        body {
            font: 18px/32px 'helvetica', sans-serif;
        }

        header img {
            width: 150px;
        }

        table {
            margin: 30px auto;
            border-collapse: collapse;
        }

        table tr th, table tr td {
            padding: 3px 10px;
            border: 1px solid #ccc;
        }

        table tr th {
            background-color: lightskyblue;
        }

        table tr td {
            text-align: left;
            background-color: #eee;
        }

        .button a {
            display: inline-block;
            width: 150px;
            padding: 3px 10px;
            background-color: none;
            border-radius: 10px;
            margin-bottom: 30px;
            text-decoration: none;
            color: #aaa;
            border: 2px solid lightskyblue;
            font-weight: bold;
        }

        .button a:hover {
            background-color: lightskyblue;
            font-size: 19px;
            color: white;
        }

        .container {
            width: 1100px;
            text-align: center;
            margin: 50px auto;
            border: 1px solid #ccc;
            background-image: url("9459.jpg");
            background-size: cover;
        }

    </style>

</head>

<body>

    <div class="container">

        <header>
            <h3>Daftar Obat</h3>
            <h1>Apotek Peduli Kasih</h1>
            <img src="apotek.png">
        </header>

        <table>
            <tr>
                <th>Nama Produk</th>
                <th>Keterangan</th>
                <th>Harga</th>
                <th>Jumlah Produk</th>
                <th>Tindakan</th>
            </tr>
            <?php  
            while($produk = mysqli_fetch_array($result)) {         
                echo "<tr>";
                echo "<td>".$produk['nama_produk']."</td>";
                echo "<td>".$produk['keterangan']."</td>";
                echo "<td>".$produk['harga']."</td>";
                echo "<td>".$produk['jumlah']."</td>";
                echo "<td><a href='edit.php?id=$produk[id]'>Edit</a> | <a href='delete.php?id=$produk[id]'>Delete</a></td></tr>";        
            }
            ?>
            </table>

        <div class="button">
            <a href="add.php">Tambah Stock</a>
        </div>

    </div>

</body>
</html>