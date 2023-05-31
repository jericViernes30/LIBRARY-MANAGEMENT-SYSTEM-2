<?php

    include('../database/connect.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userType = $_POST['user-type'];
        $schoolId = $_POST['school-id'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $department = $_POST['department'];
        $address = $_POST['address'];
        $contactNumber = $_POST['number'];
        $name = $_POST['name'];

        if (!empty($schoolId) && ($userType == 'admin')) {
            $query = "INSERT INTO `admin_data` (`user_type`, `school_id`, `email`, `password`, `department`, `name`,`address`,`contact_number`) VALUES ('$userType', '$schoolId', '$email', '$password', '$department', '$name', ' $address' ,'$contactNumber')";
            mysqli_query($con, $query);
            header("Location: ../index.php");
            die;
        } elseif (!empty($schoolId) && ($userType == 'student')) {
            $query = "INSERT INTO `students_data` (`user_type`, `school_id`, `email`, `password`, `department`, `name`,`address`,`contact_number`) VALUES ('$userType', '$schoolId', '$email', '$password', '$department', '$name', ' $address' ,'$contactNumber')";
            mysqli_query($con, $query);
            header("Location: ../index.php");
        } else {
            echo "<script>alert('Wrong school id or password');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: grid;
            place-items: center;
        }

        .login-container {
            width: 70vw;
            height: 75vh;
            box-shadow:  0 5px 15px 0 rgba(0, 0, 0, 0.8);
            border-radius: 4px;
            display: flex;
        }
        form {
            width: 100%;
            display: flex;
        }
        .login {
            width: 50%;
            height: 100%;
            background-color: #A10035;
            display: flex;
            flex-direction: column;
            color: white;
            padding: 20px 10px;
            border-radius: 4px 0 0 4px;
            overflow: auto;
        }

        .login h1 {
            font-weight: 500;
            text-align: center;
            margin-bottom: 20px;
        }

        .login p {
            text-align: center;
        }

        .login input {
            width: 95%;
            outline: none;
            padding: 10px 4px;
            display: block;
            margin: 0 auto;
        }
        
        .login select {
            width: 95%;
            text-align: center;
            display: block;
            margin: 0 auto;
            padding: 10px 4px;
        }

        .login button {
            width: 50%;
            display: block;
            margin: 0 auto;
            padding: 10px 0;
            cursor: pointer;
            outline: none;
            border: none;
            transition: .3s;
        }

        .login button:hover {
            background-color: #3FA796;
            color: white;
        }

        .login .links {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
        }

        .login .links a {
            text-decoration: none;
            color: white;
            text-transform: uppercase;
            font-size: .8rem;
        }

        .basic-info {
            width: 50%;
            height: 100%;
            background-color: #9ad9e1;
            display: flex;
            flex-direction: column;
            color: black;
            padding: 20px 10px;
            border-radius: 4px 0 0 4px;
            overflow: auto;
        }

        .basic-info h1 {
            font-weight: 500;
            text-align: center;
            margin-bottom: 20px;
        }

        .basic-info p {
            text-align: center;
        }

        .basic-info input {
            width: 95%;
            outline: none;
            padding: 10px 4px;
            display: block;
            margin: 0 auto;
        }

        .basic-info a {
            width: 50%;
            display: block;
            margin: 0 auto;
            padding: 10px 5px;
            cursor: pointer;
            outline: none;
            border: none;
            transition: .3s;
            background: #fff;
            text-decoration: none;
            font-size: smaller;
            text-align: center;
            color: black;
        }

        .basic-info a:hover {
            background-color: #2A0944;
            color: white;
        }
        
        .basic-info select {
            width: 95%;
            text-align: center;
            display: block;
            margin: 0 auto;
            padding: 10px 4px;
        }
    </style>
</head>
<body>
    <div class="login-container">
    <form method="POST">
        <div class="login">
            <h1>Signup</h1>
            <p>User Account Information</p>
                <label for="UserType">User Type:</label>
                <select name="user-type" id="user-type">
                    <option value="admin">Admin</option>
                    <option value="student">Student</option>
                    <option value="faculty">Faculty</option>
                </select><br>
                <label for="ID">School ID</label>
                <input type="text" name="school-id"><br>
                <label for="email">Email</label>
                <input type="email" name="email"><br>
                <label for="Password">Password</label>
                <input type="password" name="password"><br>
                <button value="login" type="submit">Signup</button>
                </div>
        <div class="basic-info">
            <h1>Fill up the form</h1>
            <p>User Basic Information</p>
                <label for="Department">Department</label>
                <select name="department" id="department">
                    <option value="bsit">BSIT</option>
                    <option value="bped">BPED</option>
                    <option value="bscrim">BSCRIM</option>
                </select><br>
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Surname, First name MI."><br>
                <label for="address">Address</label>
                <input type="text" name="address"><br>
                <label for="contact">Contact Number</label>
                <input type="tel" name="number" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" placeholder="Ex. 0997-658-9181"><br>
            <a href='../index.php'>Go to login page</a>
        </div>
        </form>
    </div>
</body>
</html>