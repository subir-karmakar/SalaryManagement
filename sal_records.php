<?php
session_start();
if(empty($_SESSION['empid']) && empty($_SESSION['pass']))
{
    echo $_SESSION['empid'];
    header("Location: user_login.php");
}
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'sal_mgt');

  if($conn){
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
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
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
  <script>
  	var myApp = new function(){
		this.printTable = function(){
			var tab = document.getElementById('dataTable');
			var style = "<style>";
			style = style + "table, th, td {border:solid 1px #ddd;";
			style = style + " text-align: center;}";
			style = style + "</style>"
			var win = window.open('', '', 'height=700,width=700');
			//win.document.write(getHeader());
			win.document.write(style);
			win.document.write(tab.outerHTML);
			win.document.close();
			win.print();
		}
	}
  </script>

<body id="page-top" style="height: 100%;">
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
									$unname=$_SESSION['empid'];
									$unsql="SELECT `fname` FROM `emp` WHERE `empid`='$unname'";
									$unres=mysqli_query($conn,$unsql);
									$unrows=mysqli_num_rows($unres);
									if($unrows>0)
									{
										while($unfres = mysqli_fetch_assoc($unres))
            							{
              								$unm=$unfres['fname'];
										}
										echo $unm;
									}
									 
								 ?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="#" onClick="conf()"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;<b>Logout</b></a></div>
                    </div>
                    </li>
                    </ul>
            </div>
            </nav>
            <h1 style="color: rgb(90,92,105);font-weight: bold;padding-left: 25px;margin-bottom: 0px;background-color: rgba(255,255,255,0.65); font-family: 'Abril Fatface', cursive;">Welcome User&nbsp;<i class="fas fa-smile-beam" style="font-size: 45px;"></i></h1>
            <div class="card shadow" style="margin-right: 12px;margin-left: 12px;margin-bottom: 382px;margin-top: 30px;">
                <div class="card-header py-3" style="height: 68px;">
                    <p class="lead text-center text-primary m-0 font-weight-bold">Salary Records</p>
                </div>
                <div class="card-header py-3">
                    <form method="post"><div></label><label style="margin-right: 4px;">Month<select class="custom-select custom-select-sm" style="width: 110px;margin-right: 8px;margin-left: 6px;" required="" name="month"><option  disabled value = "" selected>~ Select ~</option><?php
                  $tsql="SELECT `month_name` FROM `month`";
                  $trec=mysqli_query($conn,$tsql);
                  while($trows=mysqli_fetch_array($trec)){
                  ?>
                  <option value="<?php echo $trows['month_name']?>">
                  <?php echo $trows['month_name']?>
                  </option>
                  <?php
                  }
                  ?></select></label>
                        <label
                            style="margin-right: 4px;">Year<select class="custom-select custom-select-sm" style="width: 110px;margin-right: 8px;margin-left: 6px;" required="" name="year"><option  disabled value = "" selected>~ Select ~</option><?php
                  $tsql="SELECT `year_name` FROM `year`";
                  $trec=mysqli_query($conn,$tsql);
                  while($trows=mysqli_fetch_array($trec)){
                  ?>
                  <option value="<?php echo $trows['year_name']?>">
                  <?php echo $trows['year_name']?>
                  </option>
                  <?php
                  }
                  ?></select></label><button class="btn btn-primary" type="submit" name="submit" style="margin-right: 20px;">Show</button>
                            
                    </div></form>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-bordered border rounded table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table table-striped table-bordered table-sm dataTable my-0" id="dataTable">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 1%;">SID</th>
                                    <th style="width: 5%;">EMPID</th>
                                    <th style="width: 8%;">MONTH</th>
                                    <th style="width: 5%;">YEAR</th>
                                    <th style="width: 5%;">HRA</th>
                                    <th style="width: 5%;">TA</th>
                                    <th style="width: 5%;">DA</th>
                                    <th style="width: 5%;">MA</th>
                                    <th style="width: 5%;">OA</th>
                                    <th style="width: 5%;">BONUS</th>
                                    <th style="width: 8%;">DESIG</th>
                                    <th style="width: 9%;">BASIC SAL</th>
                                    <th style="width: 9%;">GROSS SAL</th>
                                    <th style="width: 5%;">PF</th>
                                    <th style="width: 5%;">TAX</th>
                                    <th style="width: 5%;">ABSENT DAYS</th>
                                    <th style="width: 10%;">NET SAL</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
            
            if(isset($_GET['empid']) && isset($_POST["submit"]))
            {
                $empid=base64_decode($_GET['empid']);
                $month=$_POST['month'];
          $year=$_POST['year'];
          
          $sear="SELECT * FROM `salary` WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
          $al="ALTER TABLE `salary` ORDER BY `sal_id`";
          $osearch=mysqli_query($conn,$al);
          $result=mysqli_query($conn,$sear);
          $numrows=mysqli_num_rows($result);
          if($numrows>0)
          {
            while($sfres = mysqli_fetch_assoc($result))
            {
              $sal_id=$sfres['sal_id'];
              ?>
                                <tr class="text-center">
                                    <td><?php echo $sfres['sal_id'];?></td>
                                    <td><?php echo $sfres['empid'];?></td>
                                    <td><?php echo $sfres['month'];?></td>
                                    <td><?php echo $sfres['year'];?></td>
                                    <td><?php echo $sfres['hra_amt'];?></td>
                                    <td><?php echo $sfres['ta_amt'];?></td>
                                    <td><?php echo $sfres['da_amt'];?></td>
                                    <td><?php echo $sfres['ma_amt'];?></td>
                                    <td><?php echo $sfres['oa_amt'];?></td>
                                    <td><?php echo $sfres['bonus'];?></td>
                                    <td><?php echo $sfres['desig'];?></td>
                                    <td><?php echo $sfres['basic_sal'];?></td>
                                    <td><?php echo $sfres['gross_sal'];?></td>
                                    <td><?php echo $sfres['pf_amt'];?></td>
                                    <td><?php echo $sfres['tax_amt'];?></td>
                                    <td><?php echo $sfres['absent'];?></td>
                                    <td><?php echo $sfres['net_sal'];?></td>
                                </tr>
								<?php
            }
          }
          else
          {
              if($numrows==0)
              {
             ?>
            <tr class="text-center">
            <td colspan="17"><font size="+4"><i class="fa fa-warning"></i><?php print "No such result found"?></font></td>
            </tr>
              <?php
          } 
        }
		 }
		  ?>
                            </tbody>
                            <!--<tfoot>
                                <tr class="text-center">
                                    <td><strong>SID</strong></td>
                                    <td><strong>EMPID</strong></td>
                                    <td><strong>MONTH</strong></td>
                                    <td><strong>YEAR</strong></td>
                                    <td><strong>HRA</strong></td>
                                    <td><strong>TA</strong></td>
                                    <td><strong>DA</strong></td>
                                    <td><strong>MA</strong></td>
                                    <td><strong>OA</strong></td>
                                    <td><strong>BONUS</strong></td>
                                    <td><strong>DESIG</strong></td>
                                    <td><strong>BASIC SAL</strong></td>
                                    <td><strong>GROSS SAL</strong></td>
                                    <td><strong>PF</strong></td>
                                    <td><strong>TAX</strong></td>
                                    <td><strong>ABSENT DAYS</strong></td>
                                    <td><strong>NET SAL</strong></td>
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
				<p style="margin-right:40px;" align="right"><input type="button" value="Print Slip" onClick="myApp.printTable()"/></p>
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
    <script src="assets/js/theme.js"></script>
</body>

</html>