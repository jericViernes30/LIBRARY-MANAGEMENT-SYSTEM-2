<?php
    include('../database/connect.php');

    if(isset($_POST['submit'])) {
        $bookSelected = $_POST['isbn'];
        $sql = "SELECT * FROM books_data WHERE isbn = '$bookSelected'";
        $result = mysqli_query($con, $sql);
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
                <a class="first nav-item" href="admin-home.php">Dashboard</a>
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
                        <h4>Update book</h4>
                        <a href="admin-home.php"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                    <div class="add-book-form">
                        <?php
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <form method="POST" enctype="multipart/form-data" action="update-book-confirmed.php">
                            <label for="ISBN">ISBN</label><br>
                            <input type="text" name="ISBN" value="<?php echo $row['isbn']; ?>"><br>
                            <label for="title">Title</label><br>
                            <input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
                            <label for="author">Author</label><br>
                            <input type="text" name="author" value="<?php echo $row['author']; ?>"><br>
                            <label for="series">Series</label><br>
                            <input type="text" name="series" value="<?php echo $row['series']; ?>"><br>
                            <label for="series">Description</label><br>
                            <textarea name="description" id="" cols="30" rows="6"><?php echo $row['description']; ?></textarea><br>
                            <div class="bottom">
                                <div class="inside">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>">
                                    <!-- <label for="cover">Cover</label>
                                    <input type="file" name="cover"> -->
                                </div>
                            </div>
                            <input type="submit" name="update" value="Update book">
                        
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>