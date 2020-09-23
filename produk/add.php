<html>
<head>
    <title>Add Product</title>

    <style>

        body {
            font: 18px/32px 'helvetica', sans-serif;
        }

        form {
            margin-top: 50px;
        }

        table {
            margin: auto;
            border-collapse: collapse;
        }

        table tr th, table tr td {
            padding: 8px;
            text-align: left;
        }

        table tr td input, table tr td select {
            width: 250px;
            padding: 0.5em 1em 0.5em 0;
            border: none;
            border-bottom: 2px solid lightblue;
            color: #333;
            font-size: 16px;
            background-color: transparent;
        }

        table tr td input:focus, table tr td select:focus {
            border-bottom: 1px solid #3998b3;
            outline: none;
        }

        table tr th {
            padding-right: 50px;
        }

        a {
            display: inline-block;
            text-decoration: none;
            color: #aaa;
        }

        a img {
            width: 30px;
            transform: rotate(180deg);
            padding-top: -20px;
        }

        a:hover {
            font-size: 19px;
            color: black;
        }

        .container {
            width: 1100px;
            text-align: center;
            margin: 50px auto;
            border: 1px solid #ccc;
            padding: 30px;
            background-image: url("26358.jpg");
            background-size: cover;
        }

        .submit {
            text-align: center;
            padding-top: 30px;
        }

        .submit input {
            background-color: lightskyblue;
            border-radius: 10px;
            font-weight: bold;
            padding: 12px 0;
        }

        .submit input:hover {
            cursor: pointer;
            font-size: 17px;
            color: white;
        }

    </style>

</head>

<body>

    <div class="container">
        <a href="index.php">
            <img src="panah.png">
        Go to Home
        </a>
        <br/>

        <h1>Penambahan Stock Obat</h1>
        <form action="add.php" method="post" name="form1">
            <table>
                <tr> 
                    <th>Nama Produk</th>
                    <td><input type="text" name="nama" placeholder="Nama produk"></td>
                </tr>
                <tr> 
                    <th>Keterangan</th>
                    <td>
                        <select name="keterangan" value=<?php echo $keterangan;?>>
                            <option>Vitamin</option>
                            <option>Obat Luar</option>
                            <option>Obat Dalam</option>
                            <option>Kosmetik</option>
                            <option>Alat Kesehatan</option>
                        </select>
                    </td>
                </tr>
                <tr> 
                    <th>Harga</th>
                    <td><input type="number" name="harga" placeholder="Harga per produk"></td>
                </tr>
                <tr> 
                    <th>Jumlah</th>
                    <td><input type="number" name="jumlah" placeholder="Jumlah stock"></td>
                </tr>
                <tr>
                    <td colspan="2" class="submit"><input type="submit" name="Submit" value="Tambah"></td>
                </tr>
            </table>
        </form>

    </div>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama = $_POST['nama'];
        $keterangan = $_POST['keterangan'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO tbproduct(nama_produk,keterangan,harga,jumlah) VALUES('$nama','$keterangan','$harga','$jumlah')");

        // Show message when user added
        echo "User added successfully. <a href='index.php'>Lihat Produk</a>";
    }
    ?>
</body>
</html>