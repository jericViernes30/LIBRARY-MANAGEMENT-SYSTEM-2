<?php

    include '../database/connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    } else {
        echo 'ERROR UPLOADING';
    }