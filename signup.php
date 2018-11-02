<?php
session_start();

include('includes/config.php');
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if($conn){
     $name = $_POST['name'];
    
     $username= $_POST['email'];
    $password= $_POST['pass'];
     $cpassword= $_POST['re_pass'];
     
     $_SESSION['signupformdata'] = array(
        'name' =>$name,
        'username' =>$username
     );

    $check_name="SELECT `username` FROM registration WHERE username='$username'";
   // $dbpass="SELECT `password` FROM registration WHERE username='$username'";
    $result = mysqli_query($conn,$check_name);
    // $dbpassresult = mysqli_query($conn,$dbpass);

     if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)) {
        if($username == $row['username']){
    echo "<script>alert('Username $username already exits in our database. Please tyr login')</script>";
    echo "<script>window.open('signinfrontend.php','_self')</script>";
    //header("Location:signinfrontend.php");        
}else{
            header("Location:signupfrontend.php");
        }
    }
    }

    elseif($password != $cpassword){
        $_SESSION['signupformdata']['cperror'] = "passwords doesn't match";
        header("Location:signupfrontend.php");
    }
    else{
          $query = "INSERT INTO `registration` (`name`, `username`, `password`, `cpassword`) VALUES ('$name','$username', '$password', '$cpassword')";
          $run1=mysqli_query($conn,$query);

    if($run1){
    echo "<script>window.open('signinfrontend.php','_self')</script>";
    }
    }
   
}
    ?> 