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

if(isset($_POST["submit"]))
{
	$month=$_POST['month'];
  	$year=$_POST['year'];
    
        
        

	$addempid="SELECT `empid` from `emp`";
	$conempid=mysqli_query($conn,$addempid);
	$numempid=mysqli_num_rows($conempid);
	//echo $numempid;
	$dupsql="SELECT * from `salary` WHERE `month`='$month' AND `year`='$year' ";
    $duplicate=mysqli_query($conn,$dupsql);
    if(mysqli_num_rows($duplicate)>0)
    {
      echo "<script>
      alert('Data is already submitted');
      location.replace('set_sal.php?');
      </script>";
    }
	else
	{
	if($numempid>0)
	{
  		while($numempid=mysqli_fetch_assoc($conempid))
  		{
    
			$empid=$numempid['empid'];
  			//echo $empid;
  			$sql="INSERT INTO `salary`(`empid`, `month`, `year`) VALUES ('$empid','$month','$year')";
      		$query=mysqli_query($conn,$sql);
      		if($query)
      		{
        		print '';
      		}
  			//$upempid="UPDATE `salary` SET `empid`='$empid' WHERE `month`='$month' AND `year`='$year'";
  			//$connup=mysqli_query($conn,$upempid);
  			//echo "Done";
  

			$add_des="SELECT `desig` FROM `emp` WHERE `empid`='$empid'";
			$add_sql=mysqli_query($conn,$add_des);
			$add_rows=mysqli_num_rows($add_sql);
			if($add_rows>0)
			{
				while($add_rows=mysqli_fetch_assoc($add_sql))
    			{
        			$desig=$add_rows['desig'];
    			}
    			$update="UPDATE `salary` SET `desig`='$desig' WHERE `empid`='$empid'";
    			$conn_desig=mysqli_query($conn,$update);   
			}

	

			$add_basic="SELECT `Basic_salary` FROM `desig` WHERE `dname`='$desig'";
		  	$basic_query=mysqli_query($conn,$add_basic);
		  	$basic_num=mysqli_num_rows($basic_query);
			if($basic_num>0)
			{
  				while($basic_rows=mysqli_fetch_assoc($basic_query))
  				{
    				$basic_sal=$basic_rows['Basic_salary'];
  				}
  				$update_basic="UPDATE `salary` SET `basic_sal`='$basic_sal' WHERE `desig`='$desig' AND `empid`='$empid'";
  				$conn_basic=mysqli_query($conn,$update_basic);
			}
	
		  	//my code snippet starts
			$sql="SELECT `hra`,`da`,`ta`,`ma`,`oa` FROM `allowance` WHERE `allowance_id`=1";
    		$query=mysqli_query($conn,$sql);
	    	$rows=mysqli_num_rows($query);
			if($rows>0)
    		{
    			while($res=mysqli_fetch_assoc($query))
    			{
      				$chra=$res['hra'];
	  				$cta=$res['ta'];
	  				$cda=$res['da'];
	  				$cma=$res['ma'];
	  				$coa=$res['oa'];
				}
	    			$hra_amt=($chra*$basic_sal)/100;
	  				$ta_amt=($cta*$basic_sal)/100;
	  				$da_amt=($cda*$basic_sal)/100;
	  				$ma_amt=($cma*$basic_sal)/100;
	  				$oa_amt=($coa*$basic_sal)/100;
				
	  				$rsql="UPDATE `salary` SET `hra_amt`='$hra_amt',`ta_amt`='$ta_amt',`da_amt`='$da_amt',`ma_amt`='$ma_amt',`oa_amt`='$oa_amt' WHERE `empid`='$empid'";
      				$rrec=mysqli_query($conn,$rsql);
	  				if($rrec)
    				{
						echo "";
					}
	   
			}
       

  			$presentdays="SELECT `present` FROM `attendence_form` WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
  			$conpresent=mysqli_query($conn,$presentdays);
  			$numpresent=mysqli_num_rows($conpresent);
  			$days="SELECT `month_id` FROM `month` WHERE `month_name`='$month'";
  			$conndays=mysqli_query($conn,$days);
  			$nummonth=mysqli_num_rows($conndays);
  			if($nummonth>0)
  			{
    			while($rowsmonth=mysqli_fetch_assoc($conndays))
    			{
     				$month_id=$rowsmonth['month_id'];
    			}
     
    			$daysmonth=cal_days_in_month(CAL_GREGORIAN,$month_id,$year);

    			$total_bas_sal=($numpresent*$basic_sal)/($daysmonth);
    			$uptotalbas="UPDATE `salary` SET `total_bas_sal`='$total_bas_sal' WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
    			$contotalbas=mysqli_query($conn,$uptotalbas);
  			}
		
  			$gross="SELECT * FROM `salary` WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
  			$conn_gross=mysqli_query($conn,$gross);
  			$gross_num=mysqli_num_rows($conn_gross);
  			if($gross_num>0)
  			{
    			while($gross_rows=mysqli_fetch_assoc($conn_gross))
    			{
      				$sal_id=$gross_rows['sal_id'];
      				$hra_amt=$gross_rows['hra_amt'];
      				$ta_amt=$gross_rows['ta_amt'];
      				$da_amt=$gross_rows['da_amt'];
      				$ma_amt=$gross_rows['ma_amt'];
      				$oa_amt=$gross_rows['oa_amt'];
      				$bonus=$gross_rows['bonus'];
      				$total_bas_sal=$gross_rows['total_bas_sal'];
    			}
    			$gross_sal=($hra_amt+$ta_amt+$da_amt+$ma_amt+$oa_amt+$bonus+$total_bas_sal);
    			$update_gross_sal="UPDATE `salary` SET `gross_sal`='$gross_sal' WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
    			$conn_gross_allow=mysqli_query($conn,$update_gross_sal);
  			}
		
					
			$add_pf="SELECT `pf` FROM `deduction` WHERE `deduc_id`=1";
  			$pf_query=mysqli_query($conn,$add_pf);
  			$pf_num=mysqli_num_rows($pf_query);
  			if($pf_num>0)
  			{
    			while($pf_rows=mysqli_fetch_assoc($pf_query))
    			{
      				$pf=$pf_rows['pf'];
    			}
    			$pf_amt=($pf*$basic_sal)/100;
    			$update_pf="UPDATE `salary` SET `pf_amt`='$pf_amt' WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
    			$conn_pf=mysqli_query($conn,$update_pf);   
  			}
	   
    
  			$add_tax="SELECT `tax` FROM `desig` WHERE `dname`='$desig'";
  			$tax_query=mysqli_query($conn,$add_tax);
  			$tax_num=mysqli_num_rows($tax_query);
  			if($tax_num>0)
  			{
    			while($tax_rows=mysqli_fetch_assoc($tax_query))
    			{
      				$ctax=$tax_rows['tax'];
    			}
    			$tax_amt=($ctax*$basic_sal)/100;
    			$update_tax="UPDATE `salary` SET `tax_amt`='$tax_amt' WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
    			$conn_tax=mysqli_query($conn,$update_tax);   
  			}


  			$addabsent="SELECT `present` FROM `attendence_form` WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
  			$conabsent=mysqli_query($conn,$addabsent);
  			$numabsent=mysqli_num_rows($conabsent);
  			$getdays="SELECT `month_id` FROM `month` WHERE `month_name`='$month'";
  			$condays=mysqli_query($conn,$getdays);
  			$numdays=mysqli_num_rows($condays);
  			if($numdays>0)
  			{
    			while($rowsdays=mysqli_fetch_assoc($condays))
    			{
      				$month_id=$rowsdays['month_id'];
    			}
     
    			$totaldays=cal_days_in_month(CAL_GREGORIAN,$month_id,$year);
    			$absent=$totaldays-$numabsent;
    			$upabsent="UPDATE `salary` SET `absent`='$absent' WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
    			$conabsent=mysqli_query($conn,$upabsent);
  			}
    

  			$deduc="SELECT * FROM `salary` WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
  			$conn_deduc=mysqli_query($conn,$deduc);
  			$deduc_num=mysqli_num_rows($conn_deduc);
  			if($deduc_num>0)
  			{
    			while($deduc_rows=mysqli_fetch_assoc($conn_deduc))
    			{
      				//$empid=$deduc_rows['empid'];
      				//$sal_id=$deduc_rows['sal_id'];
      				$pf_amt=$deduc_rows['pf_amt'];
      				$tax_amt=$deduc_rows['tax_amt'];
    			}
    			$total_deduc=$pf_amt+$tax_amt;
    			$update_deduc="UPDATE `salary` SET `total_deduc`='$total_deduc' WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
    			$deduc_conn=mysqli_query($conn,$update_deduc);
  			}
			
			$addbonus="SELECT `rate` FROM `bonus_form` WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
			//echo $empid;
			$conbonus=mysqli_query($conn,$addbonus);
			$numbonus=mysqli_num_rows($conbonus);
			//echo "there is".$numbonus;
			if($numbonus>0)
			{
  				while($numbonus=mysqli_fetch_assoc($conbonus))
  				{
    				$rate=$numbonus['rate'];
					//echo $numbonus['rate'];
  				}
        		$bonus=($basic_sal)*($rate)/100;
        		$upbonus="UPDATE `salary` SET `bonus`='$bonus' WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
        		$upbonuscon=mysqli_query($conn,$upbonus);
			}
			
			$addfixbonus="SELECT `rate` FROM `fixed_bonus` WHERE `month`='$month' AND `year`='$year'";
			//echo $empid;
			$confixbonus=mysqli_query($conn,$addfixbonus);
			$numfixbonus=mysqli_num_rows($confixbonus);
			//echo "there is".$numbonus;
			if($numfixbonus>0)
			{
  				while($numfixbonus=mysqli_fetch_assoc($confixbonus))
  				{
    				$brate=$numfixbonus['rate'];
					//echo $numbonus['rate'];
  				}
        		$fixbonus=($basic_sal)*($brate)/100;
				$addbonuss="SELECT `bonus` FROM `salary` WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
				$conbonuss=mysqli_query($conn,$addbonuss);
				$numbonuss=mysqli_num_rows($conbonuss);
				if($numbonuss>0)
				{
  					while($numbonuss=mysqli_fetch_assoc($conbonuss))
  					{
    					$bonus=$numbonuss['bonus'];
					}
        			//$bonus=($basic_sal)*($rate)/100;
        			//$upbonus="UPDATE `salary` SET `bonus`='$bonus' WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
        			//$upbonuscon=mysqli_query($conn,$upbonus);
					$fixbonus=$fixbonus+$bonus;
        			$upfixbonus="UPDATE `salary` SET `bonus`='$fixbonus' WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
        			$upfixbonuscon=mysqli_query($conn,$upfixbonus);
				}
				
			}
   

  			$net="SELECT * FROM `salary` WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
			//echo $empid;
  			$conn_net=mysqli_query($conn,$net);
  			$net_num=mysqli_num_rows($conn_net);
			//echo " no of col  ".$net_num;

  			if($net_num>0)
  			{
    			while($net_rows=mysqli_fetch_assoc($conn_net))
    			{
      				//$empid=$net_rows['empid'];
      				//$sal_id=$net_rows['sal_id'];
      				$gross_sal=$net_rows['gross_sal'];
      				$total_deduc=$net_rows['total_deduc'];
    			}
    			$net_sal=$gross_sal-$total_deduc;
    			$update_net="UPDATE `salary` SET `net_sal`='$net_sal' WHERE `empid`='$empid' AND `month`='$month' AND `year`='$year'";
    			$net_conn=mysqli_query($conn,$update_net);
  			}
			
			$aosql="ALTER TABLE `salary` ORDER BY `sal_id` ASC";
            $aorec=mysqli_query($conn,$aosql);

  			//else
  			//{
    			//if($net_num==0)
    			//{
      				//$alsql="ALTER `salary` AUTO_INCREMENT=1";
      				//$akrec=mysqli_query($conn,$alsql);
    			//}
  			//}
		}
	}
		header('location:set_sal.php?');
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
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="user_attendence.php">Attendance Form</a><a class="dropdown-item" role="presentation" href="attendence_record.php">Attendance Details</a></div>
                            </li>
                            <li class="nav-item dropdown" style="margin-right: 15px;"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="normal_bonus.php">Set Bonus</a>
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="normal_bonus.php">Normal Bonus</a><a class="dropdown-item" role="presentation" href="fix_bonus.php">Occasional Bonus</a></div>
                            </li>
                            <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Salary</a>
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item active" role="presentation" href="set_sal.php">Calculate Salary</a><a class="dropdown-item" role="presentation" href="sal_details.php">Salary Details</a></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="login-dark" style="background-image: url(&quot;assets/img/laptop2.jpg&quot;);height: 860px;">
                <form class="text-center" method="post" style="background-color: rgba(255,255,255,0.78);padding-top: 20px;padding-bottom: 20px;padding-right: 30px;padding-left: 30px;margin-top: -85px;"><label class="text-left" style="color: rgb(90,92,105);font-size: 20px;font-weight: normal;margin-top: 0px;">Calculate Salary</label>
                    <div class="illustration" style="padding-top: 0px;padding-bottom: 25px;margin-top: -20px;margin-bottom: -20px;"><i class="fas fa-file-invoice-dollar" style="color: rgba(55,55,55,0.77);margin-top: 0px;"></i></div>
                    <div class="form-group"><label style="color: rgb(90,92,105);">Month</label><select class="custom-select" style="color: rgb(90,92,105);" required="" name="month"><option  disabled value = "" selected>~ Select Month ~</option><?php
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
                    <div class="form-group"><label style="color: rgb(90,92,105);">Year</label><select class="custom-select" style="color: rgb(90,92,105);" required="" name="year"><option  disabled value = "" selected>~ Select Year ~</option><?php
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
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submit" style="background-color: rgb(55,55,55);">Calculate</button></div>
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