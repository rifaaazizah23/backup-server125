<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard Capacity Managament Huawei</title>

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
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><img src="../images/huawei.png" style="height : 45px ; width : 45px"><span>  Huawei Service</span></a>
            
			</div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
               <!--  <img src="images/img.jpg" alt="..." class="img-circle profile_img"> -->
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
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
                        <li><a>Nation<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="NationDaily.php">Daily</a>
                            </li>
                            <li><a href="NationWeekly.php">Weekly</a>
                            </li>
                          </ul>
                        </li>
						<li><a>Pool<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="PoolDaily.php">Daily</a>
                            </li>
                            <li><a href="PoolWeekly">Weekly</a>
                            </li>
                          </ul>
                        </li>
                    </ul>
				  </li>
				  <li><a><i class="fa fa-map-marker"></i> Live Capacity Monitoring <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../Monitoring/TowerInfo.php">Tower Info Capacity</a></li>
                      <li><a href="../Monitoring/3GCongestion.php">3G Congesttion Capacity</a></li>
                      <li><a href="../Monitoring/4GPRBCU.php">4G PRB & CU Capacity</a></li>
                      <li><a href="../Monitoring/BSC.php">BSC & RNC Capacity</a></li>
                    </ul>
                  </li>
				  <li><a href="../404.php"><i class="fa fa-bar-chart-o"></i> NQI Kabupaten</a>                    
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Radio Capacity <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../RadioCapacity/404.php">2G</a></li>
                      <li><a href="../RadioCapacity/404.php">3G</a></li>
                      <li><a href="../RadioCapacity/404.php">4G</a></li>
                    </ul>
                  </li>
				  <li><a><i class="fa fa-bar-chart-o"></i> Tower Productivity <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a>2G<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="../TowerProductivity/404.php">GranTowerTrafficErlang</a>
                            </li>
                            <li><a href="../TowerProductivity/404.php">GranTowerTotalPayloadGB</a>
                            </li>
                          </ul>
                        </li>
						<li><a>3G<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="../TowerProductivity/404.php">3G Nationwide (Summary)</a>
                            </li>
                            <li><a href="../TowerProductivity/404.php">3G Region (Summary)</a>
                            </li>
                            <li><a href="../TowerProductivity/404.php">3G Nationwide (Payload)</a>
                            </li>
                            <li><a href="../TowerProductivity/404.php">3G Region (Payload)</a>
                            </li>
                          </ul>
                        </li>
						<li><a>4G<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="../TowerProductivity/404.php">4G Nationwide (Summary)</a>
                            </li>
                            <li><a href="../TowerProductivity/404.php">4G Region (Summary)</a>
                            </li>
                            <li><a href="../TowerProductivity/404.php">4G Nationwide (Payload)</a>
                            </li>
                            <li><a href="../TowerProductivity/404.php">4G Region (Payload)</a>
                            </li>
                          </ul>
                        </li>
                    </ul>
				  </li>
				  <li><a><i class="fa fa-table"></i> Transport <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../Transport/404.php">SiteImpact</a></li>
                      <li><a href="../Transport/404.php">3G </a></li>
                      <li><a href="../Transport/404.php">4G </a></li>
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
                            <li><a href="../ShowData/404.php">3G Cell Day</a>
                            </li>
                            <li><a href="../ShowData/404.php">3G Site Day CE</a>
                            </li>
                            <li><a href="../ShowData/404.php">3G Site Day CEM</a>
                            </li>
                            <li><a href="../ShowData/404.php">3G Site NetBH</a>
                            </li>
                          </ul>
                        </li>
                      <li><a>4G<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="../ShowData/404.php">4G Cell Day</a>
                            </li>
                            <li><a href="../ShowData/404.php">4G Site Day CEM</a>
                            </li>
                            <li><a href="../ShowData/404.php">4G Site NetBH</a>
                            </li>
                          </ul>
                        </li>
                    </ul>
                  </li>
                  
                 
                </ul>
              </div>
			  
			  <div class="menu_section">
			  <h3> Capman Report</h3>
                <ul class="nav side-menu">
                  <li><a href="../CapmanReport/404.php"><i class="fa fa-bar-chart-o"></i>3G Daily Report</a>                    
                  </li>
                  <li><a href="../CapmanReport/404.php"><i class="fa fa-bar-chart-o"></i>3G Weekly Report</a>                    
                  </li>
                  <li><a href="../CapmanReport/404.php"><i class="fa fa-bar-chart-o"></i>4G Weekly Report</a>                    
                  </li>
                </ul>
              </div>
			  
			  <div class="menu_section">
			  <h3> NQI Tower</h3>
                <ul class="nav side-menu">
                  <li><a href="../NQITower/404.php"><i class="fa fa-map-marker"></i>3G </a>                    
                  </li>
                  <li><a href="../NQITower/404.php"><i class="fa fa-map-marker"></i>4G</a>                    
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
                    John Doe
                  </a>
                  
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
