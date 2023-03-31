<?php
session_start();
if(!isset($_SESSION['uname']) && !isset($_SESSION['pass']))
{
    echo $_SESSION['uname'];
    header("Location: portal.php");
}

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'sal_mgt');
  if($conn){
    print "";
}
if(isset($_GET['id']))
{
$id=base64_decode($_GET['id']);
$sql="SELECT * FROM `emp` WHERE `id`='$id'";
$res=mysqli_query($conn,$sql);
$rows=mysqli_num_rows($res);
if($rows>0)
{
while($fres = mysqli_fetch_assoc($res))
{
    $id=$fres['id'];
    $empid=$fres['empid'];
    $fname=$fres['fname'];
    $add=$fres['add'];
    $gender=$fres['gender'];
    $email=$fres['email'];
    $cont=$fres['cont'];
    $dob=$fres['dob'];
    $doj=$fres['doj'];
    $desig=$fres['desig'];
    $pass=$fres['pass'];
}
}
}
if(isset($_POST["submit"]))
{
    $fname=$_POST['fname'];
    $add=$_POST['add'];
	$gender=$_POST['gender'];
    $email=$_POST['email'];
    $cont=$_POST['cont'];
    $dob=$_POST['dob'];
    $doj=$_POST['doj'];
    $desig=$_POST['desig'];
    $pass=$_POST['pass'];

  
 $sql="UPDATE `emp` SET `fname`='$fname',`add`='$add',`gender`='$gender',`email`='$email',`cont`=$cont,`dob`='$dob',`doj`='$doj',`desig`='$desig',`pass`='$pass' WHERE `id`=$id";
 $query=mysqli_query($conn,$sql);

 $dsql="SELECT `did` FROM `desig` WHERE `dname`='$desig'";
  $drec=mysqli_query($conn,$dsql);
  $drows=mysqli_num_rows($drec);
  if($drows>0)
  {
    while($dres=mysqli_fetch_assoc($drec))
    {
      $did=$dres['did'];
    }
    $rsql="UPDATE `emp` SET `did`='$did' WHERE `desig`='$desig'";
    $rrec=mysqli_query($conn,$rsql);
  }

  $fsql="SELECT * FROM `emp`";
  $rec=mysqli_query($conn,$fsql);
  $num_rows=mysqli_num_rows($rec);
  if($num_rows>0)
  {
  while($res=mysqli_fetch_assoc($rec))
    {
      $t=$res['id'];
    }
    $temp="EMP"."$t";
    $empid="$temp"."$did";
    $usql="UPDATE `emp` SET `empid`='$empid' WHERE `id`='$t'";
    $urec=mysqli_query($conn,$usql);
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
  
  	function confd(str)
	{
		if(confirm("Are you sure?"))
		{
			location.replace(str);	
		}
	}
    function allowNumbersOnly(e) 
	{
    	var code = (e.which) ? e.which : e.keyCode;
    	if (code > 31 && (code < 48 || code > 57)) 
		{
        	e.preventDefault();
    	}
	}


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
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="user_attendence.php">Attendance Form</a><a class="dropdown-item" role="presentation" href="attendence_record.php">Attendance Details</a></div>
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
            <div class="login-dark" style="background-image: url(&quot;assets/img/laptop2.jpg&quot;);height: 1252px;">
                <form class="text-center" method="post" style="background-color: rgba(255,255,255,0.78);padding-top: 20px;padding-bottom: 20px;padding-right: 30px;padding-left: 30px;"><label class="text-left" style="color: rgb(90,92,105);font-size: 20px;font-weight: normal;margin-top: 0px;">Edit Employee</label>
                    <div class="illustration" style="padding-top: 0px;padding-bottom: 25px;margin-top: -20px;margin-bottom: -20px;"><i class="fas fa-user" style="color: rgba(55,55,55,0.77);margin-top: 0px;"></i></div>
                    
					<div class="form-group"><label style="color: rgb(90,92,105);">Full Name</label><input class="form-control" type="text" name="fname" value="<?php echo $fname;?>" placeholder="Enter Full Name" required="" style="color: rgb(90,92,105);"></div>
                    <div class="form-group"><label style="color: rgb(90,92,105);">Address</label><input class="form-control" type="text" name="add" value="<?php echo $add;?>" placeholder="Enter Address" required="" style="color: rgb(90,92,105);"></div>
                    <div class="form-group"><label style="color: rgb(90,92,105);">Gender</label><select class="custom-select" style="color: rgb(90,92,105);" required=""         name="gender" ><option  disabled value = "" selected>~ Select Gender ~</option><option value="Male">Male</option><option value="Female">Female</option><option value="Other">Other</option></select></div>
                    <div
                        class="form-group"><label style="color: rgb(90,92,105);">E-mail</label><input class="form-control" type="text" name="email" value="<?php echo $email;?>" placeholder="Enter E-mail" required="" style="color: rgb(90,92,105);"></div>
            <div class="form-group"><label style="color: rgb(90,92,105);">Contact No.</label><input class="form-control" type="text" name="cont" value="<?php echo $cont;?>" placeholder="Enter Contact No." required="" style="color: rgb(90,92,105);" maxlength="10" size="10" onKeyPress="allowNumbersOnly(event)" ></div>
            <div class="form-group"><label style="color: rgb(90,92,105);">Date Of Birth</label><input class="form-control" type="date" name="dob" value="<?php echo $dob;?>" style="color: rgb(90,92,105);" required=""></div>
            <div class="form-group"><label style="color: rgb(90,92,105);">Date Of Joining</label><input class="form-control" type="date" name="doj" value="<?php echo $doj;?>"  style="color: rgb(90,92,105);" required=""></div>
            <div class="form-group"><label style="color: rgb(90,92,105);">Designation</label><select class="custom-select" style="color: rgb(90,92,105);" required="" name="desig"><option  disabled value = "" selected>~ Select Designation ~</option><?php
                  $tsql="SELECT `dname` FROM `desig`";
                  $trec=mysqli_query($conn,$tsql);
                  while($trows=mysqli_fetch_array($trec)){
                  ?>
                  <option value="<?php echo $trows['dname']?>">
                  <?php echo $trows['dname']?>
                  </option>
                  <?php
                  }
                  ?></select></div>
            <div class="form-group"><label style="color: rgb(90,92,105);">Password</label><input class="form-control" type="password" name="pass" value="<?php echo $pass;?>"  placeholder="Enter Password" style="color: rgb(90,92,105);" required=""></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submit" style="background-color: rgb(55,55,55);">Edit Details</button></div>
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