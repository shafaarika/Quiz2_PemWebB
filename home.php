<?php
    session_start();

    if(isset($_POST['logout'])){
        $_SESSION['session_username'] = "";
        $_SESSION['session_password'] = "";
        session_unset();
        session_destroy();
        setcookie("cookie username",$username, time() - (60 * 60 * 24 * 14),"/");
        setcookie("cookie password",$password, time() - (60 * 60 * 24 * 14),"/");
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <form action="" method="post">
        <div class="container card col-md-3 mt-4">
        <h2 class="alert bg-dark text-white text-center mt-3">Home</h3>
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                This is active session and cookie
                <div class="mt-2 pt-2 pb-2 border-top">
                    <h5><b>Session</b></h5>
                    </p><?=($_SESSION['session_username']);?>
                    </p><?=($_SESSION['session_password']);?>
                    <h5 class="mt-3"><b>Cookie</b></h5>
                    </p><?=($_COOKIE['cookie_username']);?>
                    </p><?=($_COOKIE['cookie_password']);?>
                </div>
            </div>
        </div>
        </div>
            
        <div class="container card col-md-3 mt-4">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                Click button bellow to logout
                <div class="mt-2 pt-2 pb-2 border-top">
                    <button type="submit" name="logout" class="btn btn-danger btn-sm">Logout</button>
                </div>
            </div>
        </div>
        </div>
    </form>
</body>
</html>