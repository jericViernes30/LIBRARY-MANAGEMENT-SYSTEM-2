<?php
    include('../database/connect.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $ISBN = mysqli_real_escape_string($con, $_POST['ISBN']);
        $author = mysqli_real_escape_string($con, $_POST['author']);
        $series = mysqli_real_escape_string($con, $_POST['series']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $quantity = mysqli_real_escape_string($con, $_POST['quantity']);


        $targetDir = "img/";
        $cover = basename($_FILES["cover"]["name"]);
        $targetFilePath = $targetDir . $cover;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        $allowTypes = array('jpg','png','jpeg','gif','pdf');

        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($_FILES["cover"]["tmp_name"], $targetFilePath)){
                $sql = "INSERT INTO `books_data` (`isbn`, `title`, `author`, `series`, `description`, `quantity`, `cover`) VALUES ('$ISBN', '$title', '$author', '$series', '$description',  '$quantity', '$cover')";
                mysqli_query($con, $sql);
                header('Location: add-book.php');
                die;
            }
        } else {
            echo 'ERROR ADDING OF BOOK';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/admin-css/add-book.css">
    <script src="https://kit.fontawesome.com/5bf9be4e76.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book | LMS
    </title>
</head>
<body>
    <div class="header">
        <h1>Library Management System</h1>
    </div>
    <div class="content">
        <div class="sidebar">
            <div class="icon">
                <h1><i class="fa-solid fa-book-open-reader"></i></h1>
                <h4>LMS</h4>
            </div>
            <hr>
            <div class="side-links">
                <a class="first selected" href="admin-home.php">Dashboard</a>
                <a class="second" href="">Manage Accounts</a>
                <a class="third" href="">Issue Books</a>
                <a class="fourth" href="">Issued/Returned</a>
                <a class="fifth" href="">Profile</a>
                <a class="sixth" href="">Settings</a>
            </div>
        </div>
        <div class="main">
            <div class="links">
                <a class="first selected" href="add-book.php">Add books</a>
                <a class="second" href="update-book.php">Update books</a>
                <a class="third" href="view-book.php">View books</a>
                <a class="fourth" href="delete-book.php">Delete books</a>
            </div>
            <div class="container">
                <div class="add-book-container">
                    <div class="head">
                        <h4>Add book</h4>
                        <a href="admin-home.php"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                    <div class="add-book-form">
                        <form method="POST" enctype="multipart/form-data" action="">
                            <label for="ISBN">ISBN</label><br>
                            <input type="text" name="ISBN"><br>
                            <label for="title">Title</label><br>
                            <input type="text" name="title"><br>
                            <label for="author">Author</label><br>
                            <input type="text" name="author"><br>
                            <label for="series">Series</label><br>
                            <input type="text" name="series"><br>
                            <label for="series">Description</label><br>
                            <textarea name="description" id="" cols="30" rows="6"></textarea><br>
                            <div class="bottom">
                                <div class="inside">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity">
                                    <label for="cover">Cover</label>
                                    <input type="file" name="cover">
                                </div>
                            </div>
                            <input type="submit" name="submit" value="Add book">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>