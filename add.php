<!DOCTYPE html>
<html>
<head>
	<title>Add User Data</title>
	<link rel="stylesheet" href="css/style1.css">
</head>
<body>
	<h1>Tambah User Data</h1>
	<p><a href="index.php" class="home-btn">Home</a></p>
	<div class="form">
		<form name="add" method="post" action="addAction.php" enctype="multipart/form-data">
			<div class="name-form">
				<label for="name">Nama</label>
				<input type="text" id="name" name="name" required>
			</div>
			<div class="email-form">
				<label for="email">Email</label>
				<input type="email" id="email" name="email" required>
			</div>
			<div class="password-form">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" required>
			</div>
			<div class="photo-form">
				<label for="image">Foto</label>
				<input type="file" id="image" name="image">
			</div>
			<button type="submit" name="add">Tambah</button>
		</form>
	</div>
</body>
</html>
