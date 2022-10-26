<!--"Action","Comedy","Kids and Family", "Drama","Fantasy","Horror","Mystery","Romance","Thriller","Western"
MariaDB user ctyrholm@opal12.opalstack.com is I2N1qlfUtljZ9ZUH-->


<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Movies</title>
</head>

<body>

    <div class = "container">
        <div class = "row">
            <div class = "col-md-12">
                <h1>Movies</H1>
                <?php
                if (isset($_SESSION['message'])) {
                    echo '<div class="alert alert-success">
                    <strong>Success!</strong> Movie Added.
                  </div>';

                  unset($_SESSION['message']);
                }
                ?>
                <form action = "functions.php" method = "POST">
                    Title <input type = "text" name = "movie_title" required><br>
                    Genre <select name = "movie_genre" required><br>
                    <?php
                    $genres = array("Action","Comedy","Kids and Family", "Drama","Fantasy","Horror","Mystery","Romance","Thriller","Western");

                    foreach($genres as $genre) {
                        echo '<option value = "'.$genre.'">'.$genre.'</option>';
                    }
                    ?>
                    </select><br><br>

                    <button type = "submit" name = "addmovie">Add Movie</button><br><br>
                </form>
                <table class = "table table-striped table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Genre</th>
                    </tr>
                    <?php
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

                        $sql = "SELECT * FROM movies";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                    ?>
                             <tr>
                                <td><?=$row['movie_id']?></td>
                                <td><?=$row['movie_title']?></td>
                                <td><?=$row['movie_genre']?></td>
                            </tr>
                    <?php
                        }
                        } else {
                        echo "0 results";
                        }
                        $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>