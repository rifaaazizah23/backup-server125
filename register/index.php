<html>
<head>
	<title>Register Web-Dev</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../assetsLogin/images/huawei.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assetsLogin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assetsLogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assetsLogin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../assetsLogin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assetsLogin/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assetsLogin/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assetsLogin/css/main.css">
<!--===============================================================================================-->
</head>

<body>
		<?php
		$serverName = "10.17.6.125"; //serverName\instanceName
		$connectionInfo1 = array("UID"=>"web-dev", "PWD"=>"Password*1");
		$conn = sqlsrv_connect( $serverName, $connectionInfo1);
		if( $conn ) {
			 echo "";
		}else{
			 echo "Connection could not be established.<br />";
			 echo
			 die( print_r( sqlsrv_errors(), true));
		}
		if(isset($_POST['register'])){
			$username 		 = $_POST['username'];
			$password		 = $_POST['password'];
			$password_conf	 = $_POST['password_conf'];
			$name			 = $_POST['name'];
			if ($password == $password_conf) {
					$query = "INSERT INTO [WebDashboard].[dbo].[Users] (username,password,name,Akses,Status) VALUES ('$username','".md5($password)."','$name','NoAccess','NotActive')" ;
					$insert = sqlsrv_query($conn,$query, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
					if($insert){
						echo '<div class="alert alert-success alert-dismissable">Register Sukses</div>';
					}else{
						echo '<div class="alert alert-success alert-dismissable">Register Sukses</div>';			}
				}else {
					echo '<div class="alert alert-success alert-dismissable">Password Tidak Sama</div>';
					}	
			}
		?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			
			
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../assetsLogin/images/huawei.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" enctype='multipart/form-data' action="index.php" method="post">
					<span class="login100-form-title">
						Form Register 
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text"  placeholder="Email"  name="username" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text"  placeholder="Nama"  name="name" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password_conf" placeholder="Ulangi Password" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" value="register" name="register">
							Register
						</button>
					</div>

					<div class="text-center p-t-12">
						
					</div>

					<div class="text-center p-t-136">
						<a class="txt2">
							Powered by CAPACITY MANAGEMENT <br>PT. Huawei Service 2018
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="../assetsLogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../assetsLogin/vendor/bootstrap/js/popper.js"></script>
	<script src="../assetsLogin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../assetsLogin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../assetsLogin/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="../assetsLogin/js/main.js"></script>

</body>
</html>