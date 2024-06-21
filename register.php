<?php

include("database-config_procedural.php");

$output = "";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $gender= $_POST['gender'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $faculty = $_POST['faculty'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $c_pass = $_POST['c_pass'];
    $role = $_POST['role'];
    $error = array();

    if (empty($name)) {
        $error['error'] = "Name is empty";
    } else if (empty($gender)) {
        $error['error'] = "Gender is empty";
    } else if (empty($email )) {
        $error['error'] = "E-mail is empty";
    } else if (empty($telephone)) {
        $error['error'] = "Telephone is empty";
    } else if (empty($faculty)) {
        $error['error'] = "Faculty is empty";
    } else if (empty($uname)) {
        $error['error'] = "Username is empty";
    } else if (empty($pass)) {
        $error['error'] = "Password is empty";
    } else if (empty($c_pass)) {
        $error['error'] = "Confirm Password is empty";
    } else if ($pass != $c_pass) {
        $error['error'] = "Passwords do not match";
    } else if (empty($role)) {
        $error['error'] = "Select a role";
    }

    if (isset($error['error'])) {
        $output .= $error['error'];
    } else {
        $output .= "";
    }

   if (count($error) < 1) {
    // Check if the username already exists
    $usernameExistsQuery = "SELECT username FROM users WHERE username = '$uname'";
    $usernameExistsResult = mysqli_query($conn, $usernameExistsQuery);

    if (mysqli_num_rows($usernameExistsResult) > 0) {
        // Username already exists, handle the error
        $output .= "Username already exists. Please choose a different username.";
    } else {
        // Username is unique, proceed with the insert operation
        $query = "INSERT INTO users (name, gender, email, telephone, faculty, username, password, role) VALUES ('$name', '$gender', '$email', '$telephone', '$faculty', '$uname', '$pass', '$role')";
        $res = mysqli_query($conn, $query);

        if ($res) {
            $output .= "You have successfully registered";
            header("Location: index.php");
            exit();
        } else {
            $output .= "Failed to register";
        }
    }
}

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Counselling Service Management System</title>
</head>
<body>

    <?php include("header.php"); ?>

    <div class="container">
         <body style="background-color:#B0C4DE">
        <div class="col-md-14">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 shadow-sm" style="margin-top:100px;">
                    <form method="post">
                        <h3 class="text-center my-3">Register</h3>
                        <div class="text-center"><?php echo $output; ?></div>

                        <label>Name</label>
                        <input type="text" name="name" class="form-control my-2" placeholder="Enter Name" autocomplete="off">
                        
                        <label>Select Gender</label>
                        <select name="gender" class="form-control my-2">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>

                        <label>Email</label>
                        <input type="text" name="email" class="form-control my-2" placeholder="Enter email" autocomplete="off">

                        <label>Telephone</label>
                        <input type="text" name="telephone" class="form-control my-2" placeholder="Enter Telephone" autocomplete="off">

                        <label>Select Faculty</label>
                        <select name="faculty" class="form-control my-2">
                            <option value="CeDS">CeDS - Centre for Diploma Studies</option>
                            <option value="FTK">FTK - Faculty of Engineering Technology</option>
                            <option value="FAST">
                                FAST - Faculty of Applied Sciences and Technology
                            </option>
                            <option value="FSKTM">
                                FSKTM - Faculty of Computer Science and Information Technology
                            </option>
                            <option value="FPTV">
                                FPTV - Faculty of Technical and Vocational Education
                            </option>
                            <option value="FTMB">
                                FTMB - Faculty of Technology Management and Business
                            </option>
                            <option value="FKMP">
                                FKMP - Faculty of Mechanical and Manufacturing Engineering
                            </option>
                            <option value="FKEE">
                                FKEE - Faculty of Electrical and Electronic Engineering
                            </option>
                            <option value="FKAAS">
                                FKAAS - Faculty of Civil end Environmental Engineering
                            </option>
                            <option value="CGS">
                                CGS - Centre for Graduate Studies
                            </option>
                        </select>

                        <label>Username</label>
                        <input type="uname" name="uname" class="form-control my-2" placeholder="Enter Matrix" autocomplete="off">
                        
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control my-2" placeholder="Enter Password">

                        <label>Confirm Password</label>
                        <input type="password" name="c_pass" class="form-control my-2" placeholder="Enter Confirm Password">

                        <label>Select Role</label>
                        <select name="role" class="form-control my-2">
                            <option value="Student">Student</option>
                        

		<input type="submit" name="register" class="btn btn-success" value="Register">
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="" style="margin-top: 30px;"></div>

</body>
</html>