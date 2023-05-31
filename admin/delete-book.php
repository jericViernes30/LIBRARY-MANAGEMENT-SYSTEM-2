<?php
    include '../database/connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
        $isbn = $_POST['isbn'];
        if(!empty($isbn)){
            $sql = "DELETE FROM books_data WHERE isbn = '$isbn'";
            mysqli_query($con, $sql);
        } else {
            echo 'Input field is empty!';
        }

    } else
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/admin-css/delete-book.css">
    <script src="https://kit.fontawesome.com/5bf9be4e76.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Book | LMS
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
                <a class="first" href="dashboard.php">Dashboard</a>
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
                <a class="second" href="update-book.php">Update books</a>
                <a class="third" href="view-book.php">View books</a>
                <a class="fourth selected" href="delete-book.php">Delete books</a>
            </div>
            <div class="delete-book-container">
                <div class="delete-book">
                    <div class="head">
                        <p>Delete Book</p>
                        <a href="admin-home.php"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                    <div class="delete">
                        <form method="POST">
                            <label for="isbn" class="label">ISBN</label><br>
                            <input type="text" name="isbn" placeholder="Type here the book ISBN ..." required><br>
                            <a href="#" class="modal-btn">Delete</a>
                            <div class="modal-overlay" id="modal-overlay" style="display: none;">
                                <div class="modal-container">
                                    <P>Are you sure you want to delete this book?</P>
                                    <input type="submit" name="delete" value="Delete">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const show = document.querySelector(".modal-btn")
        const modal = document.getElementById("modal-overlay")

        show.addEventListener('click', () => {
        modal.style.display = "block"
})
    </script>
</body>
</html>