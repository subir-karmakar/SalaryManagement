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

if(isset($_GET['delid']))
{
$delid=base64_decode($_GET['delid']);
$dsql="DELETE FROM `emp` WHERE `id`=$delid";
$dcon=mysqli_query($conn,$dsql);

$rsql="ALTER TABLE `emp` AUTO_INCREMENT=1";
$rrec=mysqli_query($conn,$rsql);

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
    <link rel="stylesheet" href="assets/css/Table-with-search-1.css">
    <link rel="stylesheet" href="assets/css/Table-with-search.css">
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
  
  </script>


<body id="page-top" style="height: 100%;padding: 0px;">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper" style="height: 100%;">
            <div id="content" style="background-image: url(&quot;assets/img/laptop2.jpg&quot;);background-position: center;background-size: cover;background-repeat: no-repeat;height: 100%;">
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
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="add_emp.php">Add Employee</a><a class="dropdown-item active" role="presentation" href="emp_details.php">Employee Details</a></div>
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
            <div class="card shadow" style="margin-right: 12px;margin-left: 12px;margin-bottom: 447px;margin-top: 90px;">
                <div class="card-header py-3" style="height: 68px;">
                    <p class="lead text-center text-primary m-0 font-weight-bold">Employee Details</p>
                </div>
                <div class="card-body"><div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="What you looking for?">
</div>
<span class="counter pull-right"></span>
<div class="table-responsive table-bordered border rounded table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
<table class="table table-striped table-bordered results table-sm">
  <thead>
    <tr class="text-center">
      <th style="width: 1%;">ID</th>
      <th style="width: 5%;">EMPID</th>
      <th style="width: 1%;">DID</th>
      <th style="width: 15%;">FULLNAME</th>
      <th style="width: 12%;">ADDRESS</th>
      <th style="width: 5%;">GENDER</th>
      <th style="width: 10%;">EMAIL</th>
      <th style="width: 8%;">CONTACT</th>
      <th style="width: 8%;">DOB</th>
      <th style="width: 8%;">DOJ</th>
      <th style="width: 10%;">DESIGNATION</th>
      <th style="width: 10%;">PASSWORD</th>
      <th style="width: 5%;">EDIT</th>
      <th style="width: 5%;">DELETE</th>
    </tr>
    <tr class="warning no-result text-center">
      <td colspan="14"><font size="+4"><i class="fa fa-warning"></i> No result found</font></td>
    </tr>
  </thead>
  <tbody>
  <?php 
		  $sql="SELECT `id`, `empid`, `did`, `fname`, `add`, `gender`, `email`, `cont`, `dob`, `doj`, `desig`, `pass` FROM `emp`";
          $osql="ALTER TABLE `emp` ORDER BY `id`";
          $orec=mysqli_query($conn,$osql);
          $res=mysqli_query($conn,$sql);
          $rows=mysqli_num_rows($res);
          if($rows>0)
          {
            while($fres = mysqli_fetch_assoc($res))
            {
              $id=$fres['id'];
            
          ?>
    <tr class="text-center">
      <td><?php echo $fres['id'];?></td>
                                    <td><?php echo $fres['empid'];?></td>
                                    <td><?php echo $fres['did'];?></td>
                                    <td><?php echo $fres['fname'];?></td>
                                    <td><?php echo $fres['add'];?></td>
                                    <td><?php echo $fres['gender'];?></td>
                                    <td><?php echo $fres['email'];?></td>
                                    <td><?php echo $fres['cont'];?></td>
                                    <td><?php echo $fres['dob'];?></td>
                                    <td><?php echo $fres['doj'];?></td>
                                    <td><?php echo $fres['desig'];?></td>
                                    <td><?php echo $fres['pass'];?></td>
                                    <td class="text-center"><button class="btn btn-primary" type="button" onClick="location.href='edit.php?id=<?php echo base64_encode($id);?>'"><i class="fa fa-edit" ></i></button></td>
                                    <td class="text-center"><a onclick='confd("emp_details.php?delid=<?php echo base64_encode($id);?>")'><button class="btn btn-danger" type="button"><i class="fas fa-trash"></i></button></a></td>
    </tr>
	 <?php
              }
          }
		  ?>
    
  </tbody>
  <!--<tfoot>
                                <tr class="text-center">
                                    <td><strong>ID</strong></td>
                                    <td><strong>EMPID</strong></td>
                                    <td><strong>DID</strong></td>
                                    <td><strong>FULLNAME</strong></td>
                                    <td><strong>ADDRESS</strong></td>
                                    <td><strong>GENDER</strong></td>
                                    <td><strong>EMAIL</strong></td>
                                    <td><strong>CONTACT</strong></td>
                                    <td><strong>DOB</strong></td>
                                    <td><strong>DOJ</strong></td>
                                    <td><strong>DESIGNATION</strong></td>
                                    <td><strong>PASSWORD</strong></td>
                                    <td><strong>EDIT</strong></td>
                                    <td><strong>DELETE</strong></td>
                                </tr>
                            </tfoot>-->
</table>
</div>
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing Results</p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <footer class="footer-dark" style="padding-top: 28px;padding-bottom: 55px;">
                    <div class="container" style="height: 25px;margin-top: -10px;">
                        <p class="copyright" style="padding: 0px;padding-bottom: 6px;height: 0px;">Smart Endeavour © 2020</p>
                        <hr style="padding: 0px;margin-bottom: 0px;color: rgb(255,255,255);background-color: rgba(255,255,255,0.19);">
                        <p class="copyright" style="height: 0px;padding: 0px;">Rituparna Bhattacharya | Subir Karmakar | Bishal Chanda | Vivek Thapa | Suman Kr. Poudel</p>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/Table-with-search.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>