<?php
session_start();
include("database-config_procedural.php");

$output = "";

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];

    if (empty($uname) || empty($pass) || empty($role)) {
        $output = "Please fill in all fields.";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ? AND role = ?");
        if ($stmt) {
            $stmt->bind_param("sss", $uname, $pass, $role);
            $stmt->execute();
            $res = $stmt->get_result();

            if ($res->num_rows == 1) {
                $_SESSION['username'] = $uname;
                $_SESSION['role'] = $role;

                if ($role == "Student") {
                    header("Location: home.php");
                    exit();
                } elseif ($role == "Admin") {
                    header("Location: dashboard.php");
                    exit();
                }
            } else {
                $output = "Invalid credentials. Please try again.";
            }

            $stmt->close();
        } else {
            $output = "Database query failed: " . $conn->error;
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Counselling Service Management System</title>
    <style>
        body {
            background-color: red;
        }
    </style>
</head>
<body>
    <?php include("header.php"); ?>

    <div class="container">
        <div class="col-md-12">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 shadow-sm" style="margin-top:100px;">
                    <form method="post">
                        <h3 class="text-center my-3">Login</h3>
                        <div class="text-center"><?php echo $output; ?></div>
                        <label>Username</label>
                        <input type="text" name="uname" class="form-control my-2" placeholder="Enter Matrix" autocomplete="off">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control my-2" placeholder="Enter Password">
                        <label>Login As</label>
                        <select name="role" class="form-control my-2">
                            <option value="Student">Student</option>
                            <option value="Admin">Admin</option>
                        </select>
                        <input type="submit" name="login" class="btn btn-success" value="Login">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
