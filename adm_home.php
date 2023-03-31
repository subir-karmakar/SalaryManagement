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
  if($conn)
  {
    print "";
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
    <div id="wrapper" style="height: 980px;">
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
                            <li class="nav-item" role="presentation" style="margin-right: 15px;margin-left: -12px;"><a class="nav-link active" href="adm_home.php">Home</a></li>
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
            <div class="container-fluid" style="margin-top: 144px;padding-top: 15px;background-color: rgba(255,255,255,0.43);">
                <div class="d-sm-flex justify-content-between align-items-center mb-4" style="margin-top: 0px;">
                    <h1 class="text-dark mb-0" style="font-size: 50px;font-weight: bold;">Welcome<i class="fas fa-smile-beam" style="font-size: 80px;padding-left: 13px;"></i></h1>
                </div>
                <div class="d-sm-flex justify-content-between align-items-center mb-4" style="margin-bottom: 24px;">
                    <h1 class="text-dark mb-0" style="font-size: 60px;font-family: 'Abril Fatface', cursive;letter-spacing: 24px;font-weight: normal;font-style: normal;margin-top: -20px;">ADMIN</h1>
                </div>
                <div class="d-sm-flex justify-content-between align-items-center mb-4" style="margin-bottom: 24px;">
                    <h1 class="text-dark mb-0" style="font-size: 60px;font-family: 'Abril Fatface', cursive;letter-spacing: 24px;font-weight: normal;font-style: normal;"></h1>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="footer-dark" style="height: 100px;padding-top: 32px;padding-bottom: 32px;">
        <footer>
            <div class="container" style="height: 25px;margin-top: -10px;">
                <p class="copyright" style="padding: 0px;padding-bottom: 6px;height: 0px;">Smart Endeavour © 2020</p>
                <hr style="padding: 0px;margin-bottom: 0px;color: rgb(255,255,255);background-color: rgba(255,255,255,0.19);">
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