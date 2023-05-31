<?php
    
    include '../database/connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $title = $_POST['title'];
        $ISBN = $_POST['ISBN'];
        $author = $_POST['author'];
        $series = $_POST['series'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];

        $sql = "UPDATE `books_data` SET `isbn` = '$ISBN', `title` = '$title', `author` = '$author', `series` = '$series', `description` = '$description', `quantity` = '$quantity' WHERE isbn = '$ISBN'";
        mysqli_query($con, $sql);
        header('Location: view-book.php');
        die;
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
    <title>Update Book | LMS
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
                <a class="first nav-item" href="dashboard.php">Dashboard</a>
                <a class="second" href="">Manage Accounts</a>
                <a class="third" href="">Issue Books</a>
                <a class="fourth" href="">Issued/Returned</a>
                <a class="fifth" href="">Profile</a>
                <a class="sixth" href="">Settings</a>
            </div>
        </div>
        <div class="main">
            <div class="links">
                <a class="first" href="add-book.php">Add books</a>
                <a class="second selected" href="update-book.php">Update books</a>
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
                        <form method="POST">
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
                                </div>
                            </div>
                            <input type="submit" name="submit" value="Update book">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>