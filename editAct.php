<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$name = $resultData['name'];
$email = $resultData['email'];
$password = $resultData['password'];
$image = $resultData['image'];
?>
<html>
<head>    
    <title>Edit Data</title>
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    <h1>Edit Data</h1>
    <p>
        <a href="index.php" class ="home-btn">Home</a>
    </p>
    
    <div class = "form">
        <form name="edit" method="post" action="editActionAct.php" enctype="multipart/form-data">
           <div class="name-form">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" value ="<?php echo $name?>" required>
            </div>
            <div class="email-form">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value ="<?php echo $email?>" required>
            </div>
            <div class="password-form">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value ="<?php echo $password?>"required>
            </div>
            <div class="photo-form">
                <label for="image">Foto</label>
                <img src="uploads/<?php echo $image; ?>" width="100" height="100"><br>
                <input type="file" id="image" name="image">
            </div>
            <input type="hidden" name="id" value=<?php echo $id; ?>>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</body>
</html>
