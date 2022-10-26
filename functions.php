<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['addmovie'])) {
  
  //insert object-oriented
  $servername = "localhost";
  $username = "ctyrholm";
  $password = "I2N1qlfUtljZ9ZUH";
  $dbname = "ctyrholm";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO movies (movie_title, movie_genre)
    VALUES ('{$_POST['movie_title']}', '{$_POST['movie_genre']}')";
 
    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "movieadded";
        header("Location: index.php");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();

} else {
    echo 'You do not have permission to access page.';
}


?>