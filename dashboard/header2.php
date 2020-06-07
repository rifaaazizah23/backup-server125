<?php 
error_reporting(0);
ob_start();
session_start();
$_SESSION['name'];
$Akses = $_SESSION['Akses'];
if($_SESSION['valid_user']!=true){
    header('location:../index.php');
}
else {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard Capacity Managament Huawei</title>
	<link rel="shortcut icon" href="../images/huawei.png">
    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
		<!-- LEAFLET -->
  <script src="../js/leaflet/leaflet.js"></script>
  <link rel="stylesheet" href="../css/leaflet/MarkerCluster.css" />
  <link rel="stylesheet" href="../css/leaflet/MarkerCluster.Default.css" />
  <link rel="stylesheet" href="../css/leaflet/leaflet.css" />
  <link rel="stylesheet" href="Control.FullScreen.css" />
  <script src="Control.FullScreen.js"></script>
  <script src="../js/leaflet/dist/leaflet.js"></script> 
  <script src="../js/leaflet/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
  <script src="../js/leaflet/dist/leaflet.markercluster.js"></script>
  <link rel="stylesheet" href="../css/leaflet/dist/MarkerCluster.css" />
  <link rel="stylesheet" href="../css/leaflet/dist/MarkerCluster.Default.css" />
  <script type="text/javascript" src="../js/leaflet/leaflet-search.min.js"></script>
  <link rel="stylesheet" href="../css/leaflet/leaflet-search.min.css">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../index.php" class="site_title"><img src="../images/huawei2.png" style="height : 45px ; width : 45px"><span>  Huawei Service</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
               <!--  <img src="images/img.jpg" alt="..." class="img-circle profile_img"> -->
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['name'] ;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">  
				 <h3>Home </h3>  
                <ul class="nav side-menu">
				  <li><a><i class="fa fa-pie-chart"></i> Core <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a>PS Core Nation<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="http://10.17.6.126/dashboard/Core/NationDaily.php">Daily</a>
                            </li>
                            <li><a href="http://10.17.6.126/dashboard/Core/NationWeekly.php">Weekly</a>
                            </li>
                          </ul>
                        </li>
						<li><a>PS Core Pool<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="http://10.17.6.126/dashboard/Core/PoolDaily.php">Daily</a>
                            </li>
                            <li><a href="http://10.17.6.126/dashboard/Core/PoolWeekly.php">Weekly</a>
                            </li>
                          </ul>
                        </li>
						<li><a href="http://10.17.6.125/dashboard/Core/CScore.php">CS Core</a>                    
						</li>
						
                    </ul>
				  </li>
				  <li><a><i class="fa fa-desktop"></i> Live Capacity Monitoring <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../Monitoring/3GCongestion.php">3G Congesttion Capacity</a></li>
                      <li><a href="../Monitoring/4GPRBCU.php">4G PRB & CU Capacity</a></li>
                      <li><a href="../Monitoring/BSC.php">BSC & RNC Capacity</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Radio Capacity <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a>2G<span class="fa fa-chevron-down"></span></a>
					  <ul class="nav child_menu">
                            <li><a href="../RadioCapacity/2GHourly.php">Hourly</a>
                            </li>
                            <li><a href="../RadioCapacity/2GDaily.php">Daily</a>
                            </li>
                          </ul>
                      </li>
                      <li><a href="../RadioCapacity/3GCapacity.php">3G</a></li>
                      <li><a href="../RadioCapacity/4GCapacity.php">4G</a></li>
                    </ul>
                  </li>
				  <li><a><i class="fa fa-bar-chart-o"></i> Tower Productivity <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a>2G<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="../TowerProductivity/GranTowerTrafficErlang.php">GranTowerTrafficErlang</a>
                            </li>
                            <li><a href="../TowerProductivity/GranTowerTotalPayloadGB.php">GranTowerTotalPayloadGB</a>
                            </li>
                          </ul>
                        </li>
						<li><a>3G<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="../TowerProductivity/3GNationwideSummary.php">3G Nationwide (Summary)</a>
                            </li>
                            <li><a href="../TowerProductivity/3GRegionSummary.php">3G Region (Summary)</a>
                            </li>
                            <li><a href="../TowerProductivity/3GNationwidePayload.php">3G Nationwide (Payload)</a>
                            </li>
                            <li><a href="../TowerProductivity/3GRegionPayload.php">3G Region (Payload)</a>
                            </li>
                          </ul>
                        </li>
						<li><a>4G<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="../TowerProductivity/4GNationwideSummary.php">4G Nationwide (Summary)</a>
                            </li>
                            <li><a href="../TowerProductivity/4GRegionSummary.php">4G Region (Summary)</a>
                            </li>
                            <li><a href="../TowerProductivity/4GNationwidePayload.php">4G Nationwide (Payload)</a>
                            </li>
                            <li><a href="../TowerProductivity/4GRegionPayload.php">4G Region (Payload)</a>
                            </li>
                          </ul>
                        </li>
						<li><a href="../TowerProductivity/LowPayload4G.php">Low Payload 4G</a></li>
                    </ul>
				  </li>
				  <li><a><i class="fa fa-table"></i> Transport <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a>Potensial Site Impact<span class="fa fa-chevron-down"></span></a>
						  <ul class="nav child_menu">
							<li><a href="http://10.17.6.126/dashboard/Transport/3GPDTNumber.php">3G </a>
							</li>
							<li><a href="http://10.17.6.126/dashboard/Transport/4GPDTNumber.php">4G </a>
							</li>
						  </ul>
						</li>
                      <li><a>IPPM <span class="fa fa-chevron-down"></span></a>
							<ul class="nav child_menu">
							  <li><a href="http://10.17.6.126/dashboard/Transport/IPPMDaily.php">3G Daily</a></li>
							  <li><a href="http://10.17.6.126/dashboard/Transport/IPPMWeekly.php">3G Weekly</a></li>
							</ul>
						</li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
			  <h3> Data Capman </h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-table"  aria-hidden="true"></i> Show Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a>3G<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="../ShowData/3GCellDay.php">3G Cell Day</a>
                            </li>
                            <li><a href="../ShowData/3GSiteDayCE.php">3G Site Day CE</a>
                            </li>
                            <li><a href="../ShowData/3GSiteDayCEM.php">3G Site Day CEM</a>
                            </li>
                            <li><a href="../ShowData/3GSiteNetBH.php">3G Site NetBH</a>
                            </li>
                          </ul>
                        </li>
                      <li><a>4G<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="../ShowData/4GCellDay.php">4G Cell Day</a>
                            </li>
                            <li><a href="../ShowData/4GSiteDayCEM.php">4G Site Day CEM</a>
                            </li>
                            <li><a href="../ShowData/4GSiteNetBH.php">4G Site NetBH</a>
                            </li>
                          </ul>
                        </li>
                    </ul>
                  </li>
                  
                 
                </ul>
              </div>
			  
			  <div class="menu_section">
			  <h3> E2E Report</h3>
                <ul class="nav side-menu">
                  <li><a href="../CapmanReport/3GDailyReport.php"><i class="fa fa-bar-chart-o"></i>3G Daily Report</a>                    
                  </li>
                  <li><a href="../CapmanReport/3GWeeklyReport.php"><i class="fa fa-bar-chart-o"></i>3G Weekly Report</a>                    
                  </li>
                  <li><a href="../CapmanReport/4GWeeklyReport.php"><i class="fa fa-bar-chart-o"></i>4G Weekly Report</a>                    
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons 
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION['name'] ;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="../../index.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
       <!-- /top navigation -->
<?php
}
?>