<?php
// Cek apakah form login telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simpan username dan password dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah username dan password benar
    if ($username === 'username' && $password === 'password') {
        // Redirect ke halaman index.php
        header('Location: index.php');
        exit;
    } else if($username === 'username') {
        // Jika password salah, tampilkan pesan error
        $error = 'Password salah';
    } else if($password === 'password') {
        // Jika username salah, tampilkan pesan error
        $error = 'Username salah';
    } else {
    	$error = 'Username dan Paswword salah';
    }


}
?>
<?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <h1>Login</h1>

    

    <div class = "form">
    	<form method="post">
	        <div class = "user-form">
	            <label for="username">Username</label>
	            <input type="text" id="username" name="username" required>
	        </div>

	        <div class = "pass-form">
	            <label for="password">Password</label>
	            <input type="password" id="password" name="password" required>
	        </div>

	        <button type="submit">Login</button>
    	</form>
	</div>
</body>
</html>
