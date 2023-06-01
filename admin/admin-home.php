<?php
    include ('../database/connect.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = $_POST['school-id'];
        $sql = "SELECT * FROM admin_data WHERE school_id = '$user'";
        $query = mysqli_query($con, $sql);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/admin-css/admin-home.css">
    <script src="https://kit.fontawesome.com/5bf9be4e76.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home | LMS</title>
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
                <a class="second" href="manage-accounts.php">Manage Accounts</a>
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
                <a class="fourth" href="delete-book.php">Delete books</a>
            </div>
            <div class="dashboard">
                <div class="dashboard-contents">
                    <div class="number-of-books center">
                        <div class="title">NUMBER OF BOOKS</div>
                        <a href="view-book.php">
                            <div class="value">
                                <?php
                                        $totalBooks = "SELECT COUNT(*) as books FROM books_data";
                                        $result = mysqli_query($con, $totalBooks);

                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        $totalBooks = $row["books"];
                                    } else {
                                        $totalBooks = 0;
                                    }
                                    echo $totalBooks;
                                ?>
                            </div>
                        </a>
                    </div>
                    <div class="number-of-students  center">
                        <div class="title">NUMBER OF STUDENTS</div>
                            <a href="view-book.php">
                                <div class="value">
                                    <?php
                                            $totalStudents = "SELECT COUNT(*) as total FROM students_data";
                                            $result = mysqli_query($con, $totalStudents);

                                        if ($result) {
                                            $row = mysqli_fetch_assoc($result);
                                            $totalStudents = $row["total"];
                                        } else {
                                            $totalStudents = 0;
                                        }
                                        echo $totalStudents;
                                    ?>
                                </div>
                            </a>
                        </div>
                    <div class="number-of-faculty  center">
                        <div class="title">NUMBER OF FACULTY</div>
                        <div class="value">0</div>
                    </div>
                    <div class="number-of-borrowers  center">
                        <div class="title">NUMBER OF BORROWERS</div>
                        <div class="value">0</div>
                    </div>
                    <div class="issued-books  center">
                        <div class="title">ISSUED BOOKS</div>
                        <div class="value-table">
                            <table>
                                <tr>
                                    <th>Name</th>
                                    <th>Book to borrow</th>
                                    <th>Request date</th>
                                </tr>
                                <tr>
                                    <td>John Smith</td>
                                    <td>The Great Gatsby</td>
                                    <td>May 15, 2023</td>
                                </tr>
                                <tr>
                                    <td>Emma Brown</td>
                                    <td>Pride and Prejudice</td>
                                    <td>April 20, 2023</td>
                                </tr>
                                <tr>
                                    <td>David Lee</td>
                                    <td>To Kill a Mockingbird</td>
                                    <td>June 1, 2023</td>
                            </tr>
                            </table>
                        </div>
                    </div>
                    <!-- <div class="returned-books  center">
                        <div class="title">RETURNED BOOKS</div>
                        <div class="value">0</div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>