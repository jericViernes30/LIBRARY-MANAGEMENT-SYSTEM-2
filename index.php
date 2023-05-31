<?php 

session_start();

	include("database/connect.php");
	include("admin/function.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        $userType = $_POST['user-type'];
		$schoolID = $_POST['school-id'];
		$password = $_POST['password'];
		if(!empty($schoolID) && !empty($password) && $userType === 'admin')
		{
			$query = "SELECT * FROM `admin_data` WHERE school_id = '$schoolID' limit 1";
			$result = mysqli_query($con, $query);
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data_admin = mysqli_fetch_assoc($result);
					if($user_data_admin['password'] === $password)
					{
						$_SESSION['school-id'] = $user_data_admin['school-id'];
						header("Location: admin/admin-home.php");
						die;
					}
				}
			}
			echo "<script>alert('Wrong school id or password');</script>";
		} elseif (!empty($schoolID) && !empty($password) && $userType === 'student')
		{
			$query = "SELECT * FROM `students_data` WHERE school_id = '$schoolID' limit 1";
			$result = mysqli_query($con, $query);
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data_student = mysqli_fetch_assoc($result);
					if($user_data_student['password'] === $password)
					{  
						$_SESSION['school-id'] = $user_data_student['school-id'];
						header("Location: admin/student-home.php");
						die;
					}
				}
			}
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
    <link rel="stylesheet" href="css/admin-css/index.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <div class="login">
            <h1>Log in to your account</h1>
			
            <form method="POST">
                <label for="UserType">User Type:</label><br>
                <select name="user-type" id="user-type">
                    <option value="admin">Admin</option>
                    <option value="student">Student</option>
                    <option value="faculty">Faculty</option>
                </select><br>
                <label for="ID">School ID</label><br>
                <input type="text" name="school-id"><br>
                <label for="Password">Password</label><br>
                <input type="password" name="password"><br>
                <button value="login" type="submit">Login</button>
            </form>

            <div class="links">
                <a href="#">Forgot Password?</a>
                <a href="admin/signup.php">Signup</a>
            </div>
        </div>
        <div class="hero">
            <img src="img/cloud-based-library.jpg" alt="Hero">
        </div>
    </div>
</body>
</html>