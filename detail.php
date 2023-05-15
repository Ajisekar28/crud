<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_GET['id'])) {
    // Get the ID parameter from the URL
    $id = $_GET['id'];

    // Fetch the data from the database
    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

    while($user_data = mysqli_fetch_array($result)) {
        // Get the user's data
        $name = $user_data['name'];
        $email = $user_data['email'];
        $password = $user_data['password'];
        $image = $user_data['image'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detail</title>
	<link rel="stylesheet" href="css/style2.css">
</head>
<body>
	<h2 class ="Header">Detail User</h2>

	<div class = "container">
		<div class = "leftCon">
			<p><img src='uploads/<?php echo $image ?>' alt='Foto' width='200'></p>
		</div>
		<div class = "rightCon">
			<p class ="detail"><?php echo $name ?></p>
			<p class ="detail"><?php echo $email ?></p>
			<p class ="detail"><?php echo md5($password) ?></p>
			<a href="index.php">kembali</a>
		</div>
	</div>
	

</body>
</html>
