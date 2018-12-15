<?php
session_start();

include('../includes/config.php');
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$roles="SELECT * FROM admin_roles";
$result = mysqli_query($conn,$roles);
$row = array();
if (mysqli_num_rows($result) > 0) {
    //select

    while($row1 = mysqli_fetch_assoc($result)) {
       array_push($row,$row1);
        }
    }
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- Font Icon -->
    <link rel="stylesheet" href="../fonts/material-icon/css/material-design-iconic-font.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Main css -->
    <link rel="stylesheet" href="../css/style.css">
       
</head>
<body>
<section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="/vms/admin/sigup_handular.php">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" value="<?php if(!empty($_SESSION['signupformdata']['name'])){ echo $_SESSION['signupformdata']['name']; unset($_SESSION['signupformdata']['name']);} ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"  value="<?php if(!empty($_SESSION['signupformdata']['username'])){ echo $_SESSION['signupformdata']['username']; unset($_SESSION['signupformdata']['username']);} ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required />
                                <span id='message' style="color:red"><?php if(!empty($_SESSION['signupformdata']['cperror'])){ echo $_SESSION['signupformdata']['cperror']; unset($_SESSION['signupformdata']['cperror']);} ?></span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required/>
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <select data-placeholder="Begin typing a name to filter..." multiple class="chosen-select" name="test">
                               <?php foreach($row as $adminroles){
                                ?>
                                <option value="<?php echo $adminroles['role_id']; ?>"><?php echo $adminroles['role_name']; ?></option>
                               <?php } ?>
                            </select>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                            
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="../images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="/vms/admin/signin.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
       
        
</body>

</html>
    
