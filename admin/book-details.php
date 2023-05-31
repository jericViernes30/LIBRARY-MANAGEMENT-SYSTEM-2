<?php
    require '../database/connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $clicked = $_POST['isbn'];
        $sql = "SELECT * FROM books_data WHERE isbn = '$clicked'";
        $result = mysqli_query($con, $sql);
    }
    // } elseif ($_SERVER['REQUEST_METHOD'] =='POST' && )
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/admin-css/book-details.css">
    <script src="https://kit.fontawesome.com/5bf9be4e76.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Book | LMS
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
                <a class="third selected" href="view-book.php">View books</a>
                <a class="fourth" href="delete-book.php">Delete books</a>
            </div>
            <div class="book-details-container">
                <div class="book-details">
                    <div class="head">
                        <p>Book Details</p>
                        <a href="view-book.php"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                    <div class="form">
                        <?php
                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <form method="POST" action="update-book-selected.php">
                                <?php echo '<img src="../img/'.$row['cover'].'">'?>
                                <p style="font-weight: bold;">ISBN: <span style="font-weight: 200;"><?php echo $row['isbn'];?></span></p>
                                <p style="font-weight: bold;">Title: <span style="font-weight: 200;"><?php echo $row['title'];?></span></p>
                                <p style="font-weight: bold;">Author: <span style="font-weight: 200;"><?php echo $row['author'];?></span></p>
                                <p style="font-weight: bold;">Series: <span style="font-weight: 200;"><?php echo $row['series'];?></span></p>
                                <p style="font-weight: bold;">Description: <span style="font-weight: 200;"><?php echo $row['description'];?></span></p>
                                <input type="hidden" name="isbn" value="<?php echo $row['isbn'] ?>">
                                <input type="submit" name="submit" value="Update">
                            </form>
                                <form action="delete-book.php" method="POST">
                                <input type="hidden" name="isbn" value="<?php echo $row['isbn']; ?>">
                                <input type="submit" name="delete" value="Delete">
                                </form>
                        <?php
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

