<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];

    $nama=$_POST['nama'];
    $keterangan=$_POST['keterangan'];
    $harga=$_POST['harga'];
    $jumlah=$_POST['jumlah'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE tbproduct SET nama_produk='$nama',keterangan='$keterangan',harga='$harga',jumlah='$jumlah' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM tbproduct WHERE id=$id");

while($produk = mysqli_fetch_array($result))
{
    $nama = $produk['nama_produk'];
    $keterangan = $produk['keterangan'];
    $harga = $produk['harga'];
    $jumlah = $produk['jumlah'];
}
?>
<html>
<head>  
    <title>Edit Product</title>

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
        <h1>Pengeditan Data Obat</h1>

        <form name="update_user" method="post" action="edit.php">
            <table border="0">
                <tr> 
                    <th>Nama Produk</th>
                    <td><input type="text" name="nama" placeholder="Nama produk" value=<?php echo $nama;?>></td>
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
                    <td><input type="number" name="harga" placeholder="Harga per produk" value=<?php echo $harga;?>></td>
                </tr>
                <tr> 
                    <th>Jumlah Produk</th>
                    <td><input type="number" name="jumlah" placeholder="Jumlah stock" value=<?php echo $jumlah;?>></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                    <td class="submit"><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>

    </div>

</body>
</html>