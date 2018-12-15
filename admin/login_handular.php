<?php
session_start();
include('../includes/config.php');

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$name = mysqli_escape_string($conn,$_POST['your_name']);
$password = mysqli_escape_string($conn,$_POST['your_pass']);

$sql ="SELECT `email` FROM admin_user WHERE email='$name'";
$pass ="SELECT `password` FROM admin_user WHERE email='$name'";
$userid ="SELECT `s_no`,`name`,`username` FROM registration WHERE username='$name'";

$_SESSION['signinformdata'] = array(
    'name' =>$name
 );

if($conn){
    $result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 0) {
		//select
        echo "<script>alert('Username $name is not registered. Please tyr signup')</script>";
        echo "<script>window.open('signup.php','_self')</script>";
         }
        
    
    $respass = mysqli_query($conn, $pass);
         if (mysqli_num_rows($respass) > 0) {
             //select
             while($row1 = mysqli_fetch_assoc($respass)) {
              if($password == $row1['password']){
                $userdata = mysqli_query($conn, $userid);
                if (mysqli_num_rows($userdata) > 0) {
                    //select
                    while($usersessiondata = mysqli_fetch_assoc($userdata)) {
                        $_SESSION['userdata'] = array(
                            'name' =>$usersessiondata['name'],
                            'id' => $usersessiondata['s_no'],
                            'username' => $usersessiondata['username']
                         ); 
                        }
                    }  
                 header("Location:admindashboard.php");
              }
              else{
                $_SESSION['signinformdata']['cperror'] = "Invalid Credentials!!";
                header("Location:login.php");
              }
            }
        }
		
        mysqli_close($conn);
    }
?>