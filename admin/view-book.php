<?php

    require '../database/connect.php';
    $sql = "SELECT * FROM books_data ORDER BY title ASC";
    $result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/admin-css/view-book.css">
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
                <a class="first" href="admin-home.php">Dashboard</a>
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
            <div class="container">
                <div class="book-layout">
                    <div class="head">
                        <p>Books List</p>
                        <a href="dashboard.php"><i class="fa-solid fa-xmark"></i></a>
                    </div>
                    <input type="text" id="live_search" autocomplete="off" placeholder="Search ...">
                    <div class="books" id="search_result">
                        <ul>
                            <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <form method="POST" action="book-details.php">
                                    <button>
                                        <li>
                                            <?php echo '<img src="img/'.$row['cover'].'" style="width: 101px; height: 189px;">'?>
                                            <p style="font-weight: bold;">Title: <span style="font-weight: 100;"><?php echo $row['title']?></span></p>
                                            <p style="font-weight: bold;">Author: <span style="font-weight: 100;"><?php echo $row['author']?></span></p>
                                            <p style="font-weight: bold;">ISBN: <span style="font-weight: 100;"><?php echo $row['isbn']?></span></p>
                                            <input type="hidden" name="isbn" value="<?php echo $row['isbn']?>"> 
                                        </li>
                                    </button>
                                </form>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#live_search").keyup(function(){
                var input = $(this).val();
                //alert(input);
                    $.ajax({
                        url:"livesearch.php",
                        method:"POST",
                        data:{input:input},

                        success:function(data){
                            $("#search_result").html(data);
                        }
                    })
            });
        });
    </script>
</body>
</html>
