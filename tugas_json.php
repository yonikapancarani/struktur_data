<!DOCTYPE html>
  <html lang="en">
  <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Navbar</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@400;700&display=swap" rel="stylesheet"> 
	<style>
	  * {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	  }
	  body {
		font-family: 'Zen Kaku Gothic New', sans-serif;
		font-size: 16px;
	  }
	  nav {
		background-color: #FFFFFF;
		border-bottom: 1px solid #E7E6E1;
		display: flex;
	  }
	  .nav-item {
		position: relative;
	  }
	  .nav-link {
		display: block;
		padding: 20px 15px;
		margin: 0;
		color: #314E52;
		text-decoration: none;
	  }
	  .nav-link:after {
		content: "";
		display: none;
		height: 2px;
		width: 100%;
		position: absolute;
		bottom: -1px;
		left: 0;
		background-color: #11698E;
	  }
	  .nav-link.active, .nav-link:hover {
		color: #11698E;
	  }
	  .nav-link.active:after, .nav-link:hover:after {
		display: block;
	  }
	  .nav-item:hover .nav-dropdown {
		display: block;
	  }
	  .nav-dropdown {
		position: absolute;
		display: none;
		z-index: 999;
		top: 58px;
		left: 0px;
		width: 200px;
		padding-bottom: 10px;
		border-radius: 3px;
		background-color: #fff;
		border: 1px solid #E8E8E8;
	  }
	  .nav-dropdown a {
		display: block;
		padding: 10px;
		color: #314E52;
		text-decoration: none;
	  }
	  .nav-dropdown a:hover {
		background-color: #F6F6F6;
	  }
	  nav.biru {
		background-color: #325288; /* warna bg navbar */
		border-color: #325288; /* warna bg navbar */
	  }
	  nav.biru .nav-link:after {
		background-color: #F2A154; /* warna border bawah navbar */
	  }
	  nav.biru .nav-link {
		color: #F4EEE8; /* warna teks navbar */
	  }
	</style>
  </head>
  <body>
  <nav>
  <div class="nav-item">
	  <a class="nav-link active" href="index.php">Home</a>
	  <div class="nav-dropdown">
		  <a href="array_barang.php">Selamat datang dan selamat belajar tentang strukur data di PHP</a>
	  </div>
  </div>
  <div class="nav-item">
	  <a class="nav-link" href="">Array</a>
	  <div class="nav-dropdown">
		  <a href="array_barang.php">Data Barang (Statis)</a>
		  <a href="array_barang_dinamis.php?clear=1">Data Barang (Dinamis)</a>
	  </div>
  </div>
  <div class="nav-item">
	  <a class="nav-link" href="kontak.html">Pointer dan Linked List</a>
	  <div class="nav-dropdown">
		  <a href="pointer.php">Pointer</a>
		  <a href="linked_list.php">Linked List</a>
	  </div>
  </div>
  <div class="nav-item">
	  <a href="" class="nav-link">Tree</a>
	  <div class="nav-dropdown">
		  <a href="tree.php">Tree</a>
	  </div>
  </div>
  <div class="nav-item">
	  <a href="" class="nav-link">Pemrograman File</a>
	  <div class="nav-dropdown">
		  <a href="menulis_file.php">Create File</a>
		  <a href="menulis_file02.php">Create File 2</a>
		  <a href="Json.php">Create File Dengan Json</a>
	  </div>
  </div>
  
  <div class="nav-item">
	  <a href="" class="nav-link">Pemrograman Graph</a>
	  <div class="nav-dropdown">
		  <a href="Grafik.php">Grafik 01</a>
	  </div>
  </div>
</nav>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<table>
		<tr>
			<td>Kode Barang</td> 
			<td><input type="type" name="Kode_barang"></td>
		</tr>
		<tr>
			<td>Nama Barang</td> 
			<td><input type="type" name="Nama_barang"></td>
		</tr>
		<tr>
			<td>Harga Barang</td> 
			<td><input type="type" name="Harga_barang"></td>
		</tr>
		<tr>
			<td>Jumlah Beli</td> 
			<td><input type="type" name="Jumlah"></td>
		</tr>
		<tr>
			<td><input type="submit" value="Tambah"></td>
			<td><a href="?clear=1"> <input type="button" value="Bersihkan Data"></a></td>
		</tr>
	</table>
	 
	</form>

   <?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Variable post
       	$data = isset($_SESSION['data']) ? $_SESSION['data'] : []; 
        $Kode_barang = $_POST['Kode_barang'];
        $Nama_barang = $_POST['Nama_barang'];
        $Harga_barang = $_POST['Harga_barang'];
		$Jumlah= $_POST['Jumlah'];        

        array_push($data,array(	'Kode_barang'=>$Kode_barang,
    						   	'Nama_barang'=>$Nama_barang,
    						   	'Harga_barang'=>$Harga_barang,
						   		'Jumlah'=>$Jumlah)
								);
   		$_SESSION['data'] = $data;
   		$x=1;
   		echo "<table border='1'>".
   				"<th>No.</th>".
       			"<th>Kode Barang</th>".
       			"<th>Nama Barang</th>".
       			"<th>Harga Barang</th>".
       			"<th>Jumlah</th>".
       			"<th>Sub.Total</th>";
        foreach ($data as $value){
       	echo "<tr>".
       				"<td>".$x."</td>".
       				"<td>".$value['Kode_barang']."</td>".
       				"<td>".$value['Nama_barang']."</td>".
       				"<td>".number_format($value['Harga_barang'])."</td>".
       				"<td>".number_format($value['Jumlah'])."</td>".
       				"<td>".number_format($value['Jumlah']*$value['Harga_barang'])."</td>".
       			"</tr>";
            $x++;
        }
        echo "</table>";
        
        // Mengkonversi data array kedalam json
		$json = json_encode($data,JSON_PRETTY_PRINT);
		
		// Menyimpan data json kedalam file
		$simpanFile = file_put_contents('penjualan.json',$json);

    }else if (isset($_GET['clear']))
	 
	?>

<?php
    /* </body>
</html>s
suntuk mengabil skrip footer */
    
    /* ===================== */
?>