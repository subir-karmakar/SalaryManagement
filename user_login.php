<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'sal_mgt');
  if($conn){
    print "";
}

session_start();
if(isset($_POST["submit"]))
{
    $_SESSION['empid']=$_POST['empid'];
    $_SESSION['pass']=$_POST['pass'];
    $empid=$_SESSION['empid'];
    $pass=$_SESSION['pass'];

    $query="SELECT * FROM `emp` WHERE `empid`='$empid' and `pass`='$pass'";
    $res=mysqli_query($conn,$query);
    $rows=mysqli_num_rows($res);
    if($rows==1)
    {
      $empid=base64_encode($empid);
      echo"<script>
      location.replace('sal_records.php?empid=$empid');
      </script>";
    }
    else{
      echo "<script>
      alert('Invalid User ID and Password');
	  location.replace('user_login.php?');
      </script>";
    }
    
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>~Salary Management System~</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">-->
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body id="page-top" style="height: 100%;">
    <div id="wrapper" style="height: 69px;">
        <div class="d-flex flex-column" id="content-wrapper" style="height: 580px;">
            <div id="content" style="background-image: url(&quot;assets/img/laptop2.jpg&quot;);background-position: center;background-size: cover;background-repeat: no-repeat;">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top" style="margin: 0px;margin-bottom: 24px;padding-bottom: 8px;color: rgb(222,222,222);">
                    <div class="container-fluid">
                        <header>
                            <div>
                                <h1 style="background-color: none;margin-bottom: 0px;padding-top: 8px;padding-bottom: 0px;font-size: 24px;letter-spacing: 2px;line-height: 32px;font-weight: bold;">Smart Endeavour</h1>
                                <h1 style="background-color: none;margin-bottom: 0px;padding-top: 0px;padding-bottom: 10px;font-size: 16px;letter-spacing: 1px;font-style: italic;font-family: 'Abril Fatface', cursive;">Salary Management System</h1>
                            </div>
                        </header>
                    </div>
                </nav>
            </div>
            <div class="bg-whitef sticky-footer"></div>
        </div>
    </div>
    <div class="login-dark" style="background-image: url(&quot;assets/img/laptop2.jpg&quot;);background-repeat: no-repeat;background-size: cover;background-position: center;height: 911px;">
        <div class="text-right" style="padding-top: 20px;"><a class="btn btn-dark" role="button" style="margin-right: 20px;" href="portal.php"><i class="fa fa-arrow-circle-left" style="margin-right: 5px;"></i>Go Back</a></div>
        <h1 class="text-center" style="padding-top: 35px;padding-bottom: 0px;color: rgb(255,255,255);font-size: 48px;font-weight: bold;line-height: 36px;font-style: normal;font-family: 'Abril Fatface', cursive;margin-bottom: 8px;margin-top: -8px;">Welcome</h1>
        <form class="text-center" method="post" style="background-color: rgba(255,255,255,0.78);padding-top: 20px;padding-bottom: 20px;padding-right: 30px;width: 300px;padding-left: 30px;margin-top: -98px;"><label class="text-left" style="color: rgb(90,92,105);font-size: 20px;font-weight: normal;margin-top: 0px;">User Login</label>
            <div class="illustration" style="padding-top: 0px;padding-bottom: 10px;margin-top: -20px;margin-bottom: -20px;"><i class="fas fa-user" style="color: rgba(55,55,55,0.77);margin-top: 0px;"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="empid" placeholder="Enter User ID" required="" style="color: rgb(90,92,105);"></div>
            <div class="form-group"><input class="form-control" type="password" name="pass" placeholder="Enter Password" style="color: rgb(90,92,105);" required=""></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submit" style="background-color: rgb(55,55,55);">Log In</button></div>
        </form>
    </div>
    <div class="footer-dark" style="height: 100px;padding-top: 32px;padding-bottom: 32px;">
        <footer>
            <div class="container" style="height: 25px;margin-top: -10px;">
                <p class="copyright" style="padding: 0px;padding-bottom: 6px;height: 0px;">Smart Endeavour © 2020</p>
                <hr style="padding: 0px;margin-bottom: 0px;background-color: rgba(255,255,255,0.19);">
                <p class="copyright" style="height: 0px;padding: 0px;">Rituparna Bhattacharya | Subir Karmakar | Bishal Chanda | Vivek Thapa | Suman Kr. Poudel</p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>