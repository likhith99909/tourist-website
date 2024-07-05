<?php
    $con = mysqli_connect("localhost","root", "","5H5");
    if(!$con)
    die(mysqli_error($con));
    if(isset($_POST['submit'])) {
        $uname = $_POST['user'];
        $pwd= $_POST['pass'];
        if($uname and $pwd) {
            $res = mysqli_query($con,"select * from user where name='$uname' and pass='$pwd'");
            if(mysqli_num_rows($res)>0) {
                $row = mysqli_fetch_assoc($res);
                    header('Location:locations.html');
                exit;
            }
            else {
                    $res = mysqli_query($con,"select * from user where name='$uname'"); 
                    if(mysqli_num_rows($res)>0) {
                        echo '<center> <h3>Password Mismatch!<h3></center>';
                    }
                    else{
                        echo '<center>User is not available.<br> 
                        <h2>Registration Form</h2>
                        <form method="post">
                        Full Name: <input type="text" name="name"> <br>
                        uname: <input type="text" name="user"><br>
                        Password: <input type="password" name="pass">
                        <br>Retype Password: <input type="password" name="pass1"><br>
                        <input type="submit" name="register" value="Register">
                        </form>
                        </center>';
                        exit;
                    }
            }
        }
    }
    if(isset($_POST['register'])) {
         $uname = $_POST['user'];
        $name = $_POST['name'];
        $pwd = $_POST['pass'];
        $pwd1 = $_POST['pass1'];
        if($uname and $name and $pwd and $pwd1)
        if(strcmp($pwd,$pwd1)!=0) 
            echo "Passwords are not matched!";
        else {
            $res = mysqli_query($con, "insert into user values('$uname', '$pwd')");
            echo 'user successfully registered';
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>DataBase Validation</title>
<style type="text/css">
    /* Reset some default styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Body styles */
body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
 font-family: Arial, sans-serif;
  background-image: url('back.jpg'); /* Replace with the actual path to your image */
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

/* Center alignment for forms */
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

/* Form styles */
form {
  width: 300px;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form h2 {
  margin-bottom: 20px;
}

form input[type="text"],
form input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

form input[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

form input[type="submit"]:hover {
  background-color: #0056b3;
}

/* Additional styles for registration form */
form label {
  font-weight: bold;
}

form .error {
  color: red;
}

/* Additional styles for success messages */
.success {
  margin-top: 10px;
  color: green;
}

</style>
</head>
<body>
    <center>
        <h2>Sign In</h2>
        <form method="post">
             Username: <input type="text" name="user"><br> 
             Password: <input type="password" name="pass"><br> 
             <input type="submit" name="submit" value="Login">
    </form>
    </center>
</body>
</html>