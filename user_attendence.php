<?php
session_start();
if(!isset($_SESSION['uname']) && !isset($_SESSION['pass']))
{
    echo $_SESSION['uname'];
    header("Location: admin_login.php");
}
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'sal_mgt');

  if($conn){
    print "";
}

if(isset($_POST["submit"]))
{
    $empid=$_POST['empid'];
    $timein=$_POST['timein'];
    $timeout=$_POST['timeout'];
    $date=$_POST['date'];
    $month=$_POST['month'];
    $year=$_POST['year'];
    $present=$_POST['present'];
    

    $dupsql="SELECT * from `attendence_form` WHERE `empid`='$empid' AND `date`='$date' AND `month`='$month' AND `year`='$year'";
    $duplicate=mysqli_query($conn,$dupsql);
    if(mysqli_num_rows($duplicate)>0)
    {
      echo "<script>
      alert('Attendence is already submitted');
      location.replace('user_attendence.php?');
      </script>";
    }
    else{
      $sql="INSERT INTO `attendence_form`(`empid`, `timein`, `timeout`, `date`, `month`, `year`, `present`) VALUES ('$empid','$timein','$timeout','$date','$month','$year','$present')";
    $query=mysqli_query($conn,$sql);
    if($query)
    {
      $empid=base64_encode($empid);
        echo"<script>
					location.replace('user_attendence.php?');
			</script>";
    }
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
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>
<script>
  	function conf()
	{
		if(confirm("Are you sure?"))
		{
			location.replace('logout.php');	
		}
	}
  </script>


<body id="page-top" style="height: 100%;">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper" style="height: 100%;">
            <div id="content" style="background-image: url(&quot;assets/img/laptop2.jpg&quot;);background-position: center;background-size: cover;background-repeat: no-repeat;">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top" style="margin: 0px;margin-bottom: 24px;padding-bottom: 8px;color: rgb(222,222,222);">
                    <div class="container-fluid">
                        <header>
                            <div>
                                <h1 style="background-color: none;margin-bottom: 0px;padding-top: 8px;padding-bottom: 0px;font-size: 24px;letter-spacing: 2px;line-height: 32px;font-weight: bold;">Smart Endeavour</h1>
                                <h1 style="background-color: none;margin-bottom: 0px;padding-top: 0px;padding-bottom: 10px;font-size: 16px;letter-spacing: 1px;font-style: italic;font-family: 'Abril Fatface', cursive;">Salary Management System</h1>
                            </div>
                        </header>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php
									echo $_SESSION['loguser']; 
								 ?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="#" onClick="conf()"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;<b>Logout</b></a></div>
                    </div>
                    </li>
                    </ul>
            </div>
            </nav>
            <nav class="navbar navbar-light navbar-expand-md text-center border rounded-0 shadow-lg navigation-clean" style="padding-top: 5px;margin-top: -24px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;margin-right: 0px;margin-bottom: 0px;">
                <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse text-center" id="navcol-1">
                        <ul class="nav navbar-nav text-center mx-auto" style="margin: 0px;margin-left: 0px;width:100%;padding: 0px;padding-right: 0px;padding-left: 0px;">
                            <li class="nav-item" role="presentation" style="margin-right: 15px;margin-left: -12px;"><a class="nav-link" href="adm_home.php">Home</a></li>
                            <li class="nav-item dropdown" style="margin-right: 15px;"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Employee</a>
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="add_emp.php">Add Employee</a><a class="dropdown-item" role="presentation" href="emp_details.php">Employee Details</a></div>
                            </li>
                            <li class="nav-item" role="presentation" style="margin-right: 15px;"><a class="nav-link" href="add_desig.php">Add Designation</a></li>
                            <li class="nav-item" role="presentation" style="margin-right: 15px;"><a class="nav-link" href="set_allow.php">Set Allowances</a></li>
                            <li class="nav-item" role="presentation" style="margin-right: 15px;"><a class="nav-link" href="set_deduc.php">Set Deductions</a></li>
                            <li class="nav-item dropdown" style="margin-right: 15px;"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Attendance</a>
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item active" role="presentation" href="user_attendence.php">Attendance Form</a><a class="dropdown-item" role="presentation" href="attendence_record.php">Attendance Details</a></div>
                            </li>
                            <li class="nav-item dropdown" style="margin-right: 15px;"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="normal_bonus.php">Set Bonus</a>
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="normal_bonus.php">Normal Bonus</a><a class="dropdown-item" role="presentation" href="fix_bonus.php">Occasional Bonus</a></div>
                            </li>
                            <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Salary</a>
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="set_sal.php">Calculate Salary</a><a class="dropdown-item" role="presentation" href="sal_details.php">Salary Details</a></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="login-dark" style="background-image: url(&quot;assets/img/laptop2.jpg&quot;);height: 1020px;">
                <form class="text-center" method="post" style="background-color: rgba(255,255,255,0.78);padding-bottom: 20px;padding-right: 30px;padding-left: 30px;margin-top: 0px;padding-top: 20px;"><label class="text-left" style="color: rgb(90,92,105);font-size: 20px;font-weight: normal;margin-top: 0px;">Attendance Form</label>
                    <div class="illustration" style="padding-top: 0px;padding-bottom: 25px;margin-top: -20px;margin-bottom: -20px;"><i class="fas fa-file-signature" style="color: rgba(55,55,55,0.77);margin-top: 0px;"></i></div>
                    <div class="form-group"><label style="color: rgb(90,92,105);">EMP ID</label><select class="custom-select" style="color: rgb(90,92,105);" name="empid" required=""><option  disabled value = "" selected>~ Select EMP ID ~</option><?php
                  $esql="SELECT `empid` FROM `emp`";
                  $erec=mysqli_query($conn,$esql);
                  while($erows=mysqli_fetch_array($erec)){
                  ?>
                  <option value="<?php echo $erows['empid']?>">
                  <?php echo $erows['empid']?>
                  </option>
                  <?php
                  }
                  ?></select></div>
                    <div class="form-group"><label style="color: rgb(90,92,105);">Time In</label><input class="form-control" type="time" style="color: rgb(90,92,105);" name="timein" required=""></div>
                    <div class="form-group"><label style="color: rgb(90,92,105);">Time Out</label><input class="form-control" type="time" style="color: rgb(90,92,105);" name="timeout" required=""></div>
                    <div class="form-group"><label style="color: rgb(90,92,105);">Date</label><select class="custom-select" style="color: rgb(90,92,105);" name="date" required=""><option  disabled value = "" selected>~ Select Date ~</option><?php
                  $tsql="SELECT `date` FROM `date`";
                  $trec=mysqli_query($conn,$tsql);
                  while($trows=mysqli_fetch_array($trec)){
                  ?>
                  <option value="<?php echo $trows['date']?>">
                  <?php echo $trows['date']?>
                  </option>
                  <?php
                  }
                  ?></select></div>
                    <div class="form-group"><label style="color: rgb(90,92,105);">Month</label><select class="custom-select" style="color: rgb(90,92,105);" name="month" required=""><option  disabled value = "" selected>~ Select Month ~</option><?php
                  $tsql="SELECT `month_name` FROM `month`";
                  $trec=mysqli_query($conn,$tsql);
                  while($trows=mysqli_fetch_array($trec)){
                  ?>
                  <option value="<?php echo $trows['month_name']?>">
                  <?php echo $trows['month_name']?>
                  </option>
                  <?php
                  }
                  ?></select></div>
                    <div class="form-group"><label style="color: rgb(90,92,105);">Year</label><select class="custom-select" style="color: rgb(90,92,105);" name="year" required=""><option  disabled value = "" selected>~ Select Year ~</option><?php
                  $tsql="SELECT `year_name` FROM `year`";
                  $trec=mysqli_query($conn,$tsql);
                  while($trows=mysqli_fetch_array($trec)){
                  ?>
                  <option value="<?php echo $trows['year_name']?>">
                  <?php echo $trows['year_name']?>
                  </option>
                  <?php
                  }
                  ?></select></div>
                    <div class="form-group"><label style="color: rgb(90,92,105);">Present</label><select class="custom-select" style="color: rgb(90,92,105);" name="present" required=""><option  disabled value = "" selected>~ Select Option ~</option><option value="YES">YES</option>
                  <option value="NO">NO</option></select></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submit" style="background-color: rgb(55,55,55);">Submit Attendance</button></div>
                </form>
            </div>
            <footer class="footer-dark" style="margin-top: 0px;padding-top: 28px;padding-bottom: 55px;">
                <div class="container" style="height: 25px;margin-top: -10px;">
                    <p class="copyright" style="padding: 0px;padding-bottom: 6px;height: 0px;">Smart Endeavour © 2020</p>
                    <hr style="padding: 0px;margin-bottom: 0px;color: rgb(255,255,255);background-color: rgba(255,255,255,0.19);">
                    <p class="copyright" style="height: 0px;padding: 0px;">Rituparna Bhattacharya | Subir Karmakar | Bishal Chanda | Vivek Thapa | Suman Kr. Poudel</p>
                </div>
            </footer>
        </div>
    </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>