<?php
    session_start();
    include('connection.php');
    include('functions.php');

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            // read from database
            $query = "select * from cashier where username = '$user_name' and password = '$password'";

            $result = mysqli_query($con, $query);
            if($result)
            {
                echo "Query successful hai";
                if ($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] == $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: cashierview.php");
                        die;
                    }
                }
            }
            echo "Query galat hai shayad !";
            echo "Wrong username or password!";
        }
        else
        {
            echo "Please enter some valid information!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier-Login</title>
    <link rel="icon" href="title.png" type="image/x-icon">
    <link rel="stylesheet" href="adminlogin.css">
</head>
<body class="pageback">
    <div class="maindiv">
        <img src="gpnpharma.png" alt="image" class="logo">
        <div class="form-box" name="form1">
            <div class="log">
                <center>LOGIN</center>
            </div>
            <form id="admin" class="input-group" method = "POST">
                <input type="text" class="input-field" placeholder="User Name" name = "user_name" id = "user_name" required/>
                <input type="password" class="input-field" placeholder="Enter Password" name = "password" id = "password" required />
                <input type="checkbox" class="check-box"><span>Remember me on this device</span>
                <input id="login-btn" class= "submit-btn" type="submit" value="Login">
                <div class="redirect">
                    <a href = "managerlogin.php">Login as Manager</a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>