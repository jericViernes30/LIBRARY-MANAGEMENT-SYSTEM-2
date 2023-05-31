<?php
function check_login_admin($con)
{

	if(isset($_SESSION['school_id']))
	{

		$id = $_SESSION['school_id'];

		$query = "SELECT * FROM `admin_data` WHERE `school_id` = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data_admin = mysqli_fetch_assoc($result);
			return $user_data_admin;
		}
	}
	//redirect to login
	header("index.php");
	die;

}

function check_login_student($con)
{

	if(isset($_SESSION['school_id']))
	{

		$id = $_SESSION['school_id'];

		$query = "SELECT * FROM `student` WHERE `school_id` = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data_student = mysqli_fetch_assoc($result);
			return $user_data_student;
		}
	}
	//redirect to login
	header("index.php");
	die;

}