<?php
    $login=false;
    $notUserlogin=false;
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        include 'partials/_dbconnect.php';
        $userid=$_POST["userid"];
        $password=$_POST["password"];
        $sql="SELECT * FROM `user` WHERE `userid`='$userid' AND `password`='$password'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num==1){
            $login=true;
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['userid']=$userid;
            header("location:homepage.php");
        }
        else {
            $notUserlogin=true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Login page</title>
</head>
<body>
        <form class="login-form" action="index.php" method="post">
        <?php
        if($notUserlogin)
        {
            echo '<div class="alert">
            <center>Wrong User ID or Password</center>
          </div>';
        }
        ?>
        <div class="form">
        <center>
        <div class="title">Welcome</div>
        <div class="subtitle">Login to your account</div>
        </center>
        <div class="input-container ic1">
            <input type="text" class="input" name="userid" id="userid" placeholder=" " required>
            <div class="cut"></div>
            <label for="userid" class="placeholder">USER ID</label>  
        </div>
        <div class="input-container ic2">
            <input type="password" class="input" name="password" id="password" placeholder=" " required>   
            <div class="cut"></div>
            <label for="password" class="placeholder">PASSWORD</label>
        </div>
            <a href="forgotPassword.php" class="fpw">Forgot Password?</a>
            <button class="submit" type="submit" >LOGIN</button><br><br>
            <center><p class="subtitle">OR</p><center>
            <a href="createUser.php" class="register">Register Here</a>
        </div>
        </form>
</body>
</html>
