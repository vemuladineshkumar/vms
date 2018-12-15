<?php
session_start();

include('../includes/config.php');
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if($conn){
    $name = $_POST['name'];
     $roleid = $_POST['test'];
     $username= $_POST['email'];
    $password= $_POST['pass'];
     $cpassword= $_POST['re_pass'];
     
     $_SESSION['signupformdata'] = array(
        'name' =>$name,
        'username' =>$username
     );

    $check_name="SELECT `email` FROM admin_user WHERE username='$username'";
   // $dbpass="SELECT `password` FROM registration WHERE username='$username'";
    $result = mysqli_query($conn,$check_name);
    // $dbpassresult = mysqli_query($conn,$dbpass);

     if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)) {
        if($username == $row['username']){
    echo "<script>alert('Username $username already exits in our database. Please tyr login')</script>";
    echo "<script>window.open('signin.php','_self')</script>";
    //header("Location:signinfrontend.php");        
}else{
            header("Location:signup.php");
        }
    }
    }

    elseif($password != $cpassword){
        $_SESSION['signupformdata']['cperror'] = "passwords doesn't match";
        header("Location:signup.php");
    }
    else{
          $query = "INSERT INTO `admin_user` (`username`, `password`, `email`) VALUES ('$name','$password', '$username')";
          //$queryuserrole = "INSERT INTO `admin_user_role` (`username`, `password`, `email`) VALUES ('$name','$password', '$username')";
          
          $run1=mysqli_query($conn,$query);
	
          $queryuserid = "SELECT LAST_INSERT_ID() as id";
          $userid=mysqli_query($conn,$queryuserid);
          $userid1 = mysqli_fetch_assoc($userid);
          $queryuserrole = "INSERT INTO `admin_user_role` (`adin_id`, `role_id`) VALUES ($userid1[id],$roleid)";
          $run1=mysqli_query($conn,$queryuserrole);
    if($run1){
    echo "<script>window.open('login.php','_self')</script>";
    }
    }
   
}
    ?> 