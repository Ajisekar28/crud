<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	
	// Check if a file has been uploaded
	if (isset($_FILES['image'])) {
            // Define target directory where file will be stored
            $target_dir = "uploads/";

            // Get the name of the uploaded file
            $filename = basename($_FILES["image"]["name"]);

            // Define the target path where file will be stored on the server
            $target_file = $target_dir . $filename;

            // Check if file with same name already exists in target directory
            if (file_exists($target_file)) {
                $i = 1;
                $new_filename = pathinfo($filename, PATHINFO_FILENAME);
                while (file_exists($target_dir . $new_filename . "_" . $i . "." . pathinfo($filename, PATHINFO_EXTENSION))) {
                    $i++;
                }
                $filename = $new_filename . "_" . $i . "." . pathinfo($filename, PATHINFO_EXTENSION);
                $target_file = $target_dir . $filename;
            }

            // Check if user uploaded a file
            if (!empty($_FILES["image"]["tmp_name"])) {
                // Move uploaded file to target directory
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // Insert record into database
                    $result = mysqli_query($mysqli, "INSERT INTO users(name,email,password,image) VALUES('$name','$email','$password','$filename')");

                    // Display success message
                    if ($result) {
                        echo "<font color='green'>Data berhasil ditambahkan.</font><br/>";
                        echo "<a href='index.php'>Kembali</a>";
                    } else {
                        echo "<font color='red'>Gagal menambahkan data.</font><br/>";
                    }
                } else {
                    echo "<font color='red'>Maaf ada error ketika mengupload file.</font><br/>";
                }
            } else {
                // If user did not upload a file, use default image
                $result = mysqli_query($mysqli, "INSERT INTO users(name,email,password,image) VALUES('$name','$email','$password','default.jpg')");
                if ($result) {
                    echo "<font color ='green'>Data berhasil ditambahkan.</font><br/>";
                    echo "<a href='index.php'>Kembali</a>";
                } else {
                    echo "<font color='red'>Gagal menambahkan data.</font><br/>";
                }
            }
        } else {
            echo "<font color='red'>Mohon pilih file untuk diupload.</font><br/>";
        }
    }
?>