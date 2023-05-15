<?php
//untuk menghubungkan dengan koneksi databasse
require_once("dbConnection.php");

//untuk mengurutkan hasil berdasarkan id
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id ASC");
?>

<html>
<head>	
	<link rel="stylesheet" href="css/style.css">

	<title>Index</title>
</head>

<body>
	<div class="header">
		<p>
			<a href="login.php">Keluar</a>
		</p>
		<h2>Data anggota</h2>
		<p>
			<a href="add.php">Tambah Data</a>
		</p>
	</div>
	<div class ="container">
		<table border =1 width='80%' border=0>
			<tr bgcolor='#DDDDDD'>
				<td>Nama</td>
				<td>Email</td>
				<td>Password</td>
				<td>Foto</td>
				<td>Aksi</td>
			</tr>
			<?php
			//untuk mengambil data dari database array
			while ($res = mysqli_fetch_assoc($result)) :?>
				<tr>
					<td><?=$res["name"]?></td>
					<td><?=$res["email"]?></td>
					<td><?=md5($res["password"])?></td>
					<td><img src="uploads/<?php echo $res["image"]?>" alt="" style='width:100px; height:100px;'></td>
					<td><a href="editAct.php?id=<?php echo $res['id']; ?>">Edit</a> | 
						<a href="delete.php?id=<?php echo $res['id']; ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a> | 
						<a href="detail.php?id=<?php echo $res['id']; ?>">Detail</a></td>
				</tr>
			<?php endwhile;?>
    </div>
</body>
</html>
