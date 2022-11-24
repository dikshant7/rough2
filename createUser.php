<?php
    $s=false;
    $pno=false;
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        include 'partials/_dbconnect.php';
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $age=$_POST['age'];
        $gender =$_POST['gender'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $city=$_POST['city'];
        $balance=$_POST['balance'];
        $password=$_POST['password'];
        $check="SELECT * FROM `user` WHERE `phone`='$phone'";
        $r=mysqli_query($conn,$check);
        $numc=mysqli_num_rows($r);
        if($numc==0)
        {
        //$sql ="INSERT INTO `DshHNFZcBN`. `user` ( `userid`,`firstname`, `lastname`, `age`, `gender`, `phone`, `email`, `city`,`date`) VALUES ( NULL,'$firstname', '$lastname', '$age', '$gender', '$phone', '$email', '$city', CURRENT_TIMESTAMP); "; 
        $sql="INSERT INTO `user` (`userid`, `firstname`, `lastname`, `age`, `gender`, `phone`, `email`, `city`, `date`,`balance`, `password`) VALUES (NULL,'$firstname', '$lastname', '$age', '$gender', '$phone', '$email', '$city', CURRENT_TIMESTAMP,'$balance', '$password');" ;
        $result=mysqli_query($conn,$sql);
        if($result){
            $s=true;
            $s1="SELECT * FROM `user` WHERE `phone`='$phone'";
            $result1=mysqli_query($conn,$s1);
            $row = mysqli_fetch_assoc($result1);
            $userid= $row['userid'] ;//user id of user
        }
    }
    else{
        $pno=true;
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/createUser.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <?php
        if($s)
        {
            echo '
            Account Created Succesfully,
            Your User Id is&nbsp&nbsp';echo '<b>' .$userid.'</b>';
            echo '&nbsp&nbsp<a href=index.php >Click here to login</a>'; 
        }
    ?>
    <div class="title">Registration</div>
    <div class="content">
    <form class="createUserform" method="post">
    <div class="user-details">
        <?php
        if($pno)
        {
            echo"phone number already exists";
        }
        ?>
        <div class="input-box">
            <span class="details">First Name</span>
            <input class="input" type="text" name="firstname" id="firstname" placeholder="Enter your first name" required>
        </div>
        <div class="input-box">
            <span class="details">Last Name</span>
            <input class="input" type="text" name="lastname" id="lastname" placeholder="Enter your last name"  required>
        </div>
        <div class="input-box">
            <span class="details">Age</span>
            <input class="input" type="age" name="age" id="age" placeholder="Enter your age" required>
        </div>
        <div class="input-box">
            <span class="details">Gender</span>
            <input class="input" type="gender" name="gender" id="gender" placeholder="Enter your gender" required>
        </div>
         <div class="input-box">
             <span class="details">Phone</span>
            <input class="input" type="phone" name="phone" id="phone" placeholder="Enter 10 digit phone number" required>
        </div>
        <div class="input-box">
            <span class="details">E-Mail</span>
            <input class="input" type="email" name="email" id="email" placeholder="Enter your email" required>   
        </div>
        <div class="input-box">
            <span class="details">City</span>
            <input class="input" type="city" name="city" id="city" placeholder="Enter your city" required>
        </div>
        <div class="input-box">
            <span class="details">Balance</span>
            <input class="input" type="balance" name="balance" id="balance" placeholder="Enter your balance (less than 1 crore)" required>
        </div>
        <div class="input-box">
            <span class="details">Password</span>
            <input class="input" type="password" name="password" id="password" placeholder="Enter your password" required> 
        </div>
       <button class="submit" type="submit">SUBMIT</button>
    </div>
    </form>
</div>
</div>
</body>
</html>





