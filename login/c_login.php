<?php
error_reporting(1);
ob_start(); 
include "koneksi.php";
$amankan=RemoveXSS($_GET);
if ($amankan!="x")
{
  $username=RemoveXSS($_POST['username']);
  $pass=md5($_POST['password']);
  $queryadmin= "SELECT * FROM [WebDashboard].[dbo].[Users] WHERE username='$username' OR name = '$username'AND  password='$pass' ";
  $result = sqlsrv_query($conn, $queryadmin, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET )) OR die(sqlsrv_errors());
  $ketemu=sqlsrv_num_rows($result);
  $Get = sqlsrv_fetch_array($result);
  $Getstatus = $Get['Status'];
  $Getname1 = $Get['name'];
  $Getakses1 = $Get['Akses'];
  if ($ketemu > 0)
      {
        session_start();

        if( $result === false ) {
         die( print_r( sqlsrv_errors(), true));
        }

        // Make the first (and in this case, only) row of the result set available for reading.
        if( sqlsrv_fetch( $result ) === false) {
             die( print_r( sqlsrv_errors(), true));
        }
        $GetUsers = sqlsrv_fetch_array($result);
        $Getusername = $GetUsers['username'];
        $Getname = $GetUsers['name'];
        $Getakses = $GetUsers['Akses'];
        if ($Getstatus = 'Active'){
              if($Getakses = "admin" || $Getakses = "DevAdmin"){
            
                 $_SESSION['name'] = $Getname1 ;
                 $_SESSION['Akses'] = $Getakses1 ;
                 $_SESSION['valid_user'] = true;
				 $Akses = $_SESSION['Akses'];
				 if($Akses == 'forecast'){
					header ('location:../forecast/index.php');
				 }else {
                 header ('location:../dashboard/index.php');
				}
                }else {
                    //header ('location:../forecast/index.php');
                    echo "<script>alert(' Permission denied !');history.go(-1);</script>";
                }
        } else {
            echo "<script>alert(' Your Account is not active, please contact admin to active account !');history.go(-1);</script>";
        }

        
        
  } else  {
        echo "<script>alert(' username dan password tidak sesuai !');history.go(-1);</script>";
        
  }
  
} else{
  session_start();
  session_destroy();
  header('location:index.php');
}   