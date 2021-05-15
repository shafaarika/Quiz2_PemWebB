<?php
    require_once "_config.php";

    if(isset($_POST['login'])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $konpassword = $_POST["konpassword"];
        if (empty($username) || empty($password) || empty($konpassword)){
            if(empty($username)) {
            $messagefailed = "Please enter username !";
            } else if(empty($password)) {
            $messagefailed = "Please enter password !";
            } else{
            $messagefailed = "Please enter confirm password !";
            }
        }  else if ($password != $konpassword){
            $messagefailed = "Password and confirm password are out of sync !";
        } else{
            $data = mysqli_query($db,"SELECT * FROM login WHERE username = '$username'");
            
            if(mysqli_num_rows($data) === 1){
                $row1 = mysqli_fetch_assoc($data);

                if($row1['password'] != $password){
                    $messagefailed = "Incorrect password";
                } else if(empty($messagefailed)){
                    $_SESSION['session_username'] = $username;
                    $_SESSION['session_password'] = $password;
                    if(isset($_POST['remember'])){
                        setcookie("cookie_username",$username, time() + (60 * 60 * 24 * 14),"/");
                        setcookie("cookie_password",$password, time() + (60 * 60 * 24 * 14),"/");
                    }
                    header("location:home.php");
                }
            } else {
                $messagefailed = "Username not available";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container col-md-3 card mt-3">
        <h2 class="alert bg-dark text-white text-center mt-3">Login</h3>
        <form action="" method="POST">
            <div class="form-group">
                <label for="">Username</label><br>
                <input type="text" name="username" class="form-control" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="">Password</label><br>
                <input type="password" name="password" class="form-control" placeholder="Enter password">
            </div>
            <div class="form-group">
                <label for="">Confirmation Password</label><br>
                <input type="password" name="konpassword" class="form-control" placeholder="Enter confirm password">
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember" id="remember">
                <label for="">Remember Me</label>
            </div>
            <?php if (!empty($messagefailed)){ ?> 
                <div class="alert alert-danger">
                    <?= $messagefailed; ?>
                </div>
            <?php }?>
            <div class="form-group">
                <button type="submit" name="login" class="btn bg-dark text-white">Login</button>
                <button type="reset" class="btn btn-danger ml-2">Reset</button>
            </div>
        </form>
    </div>
</body>
</html>