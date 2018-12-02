<?php 
  ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="view/backend/images/logotlu.jpg" type="image/ico" />

    <title>Giáo viên</title>

    <!-- Bootstrap -->
    <link href="public/backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="public/backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="public/backend/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="public/backend/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="public/backend/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="public/backend/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="public/backend/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="public/backend/build/css/custom.min.css" rel="stylesheet">
    <script src="public/backend/vendors/jquery/dist/jquery.min.js"></script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><img src="view/backend/images/logotlu.jpg" style="width: 40px; border-radius: 50%;"> <span>Giáo viên</span></a>
            </div>

            <div class="clearfix"></div>
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="dashboard.php"><i class="fa fa-home"></i>Dashboard </a></li>
                  

                  <li><a href="giaovien.php?controller=dangkidetai"><i class="fa fa-edit"></i> Đăng ký đề tài </a></li>
                  <li><a href="giaovien.php?controller=detaidathuchien"><i class="fa fa-edit"></i> Các đề tài đã thực hiện </a></li>
                  <li><a href="giaovien.php?controller=detaithamkhao"><i class="fa fa-edit"></i> Đề tài tham khảo </a></li>
                  <li><a href="giaovien.php?controller=baocaotiendo"><i class="fa fa-edit"></i> Báo cáo tiến độ </a></li>
                  
                  <li><a href="giaovien.php?controller=xemhoidongnghiemthu"><i class="fa fa-desktop"></i> Hội đồng nghiệm thu đề tài </a></li>
                    
                  <li><a href="giaovien.php?controller=phieuchamdetai"><i class="fa fa-edit"></i> Kết quả đề tài </a></li>
                  
                
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
               <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="admin.php?controller=logout">
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
                    <img src="view/backend/images/user_icon.png" alt=""><?=$_SESSION["SS_USER"]->c_email ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="giaovien.php?controller=profile"> Profile</a></li>
                    <li><a href="admin.php?controller=logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
          <div class="container">
            <?php 
              //kiem tra duong dan cua file controller co ton tai khong, neu ton tai thi load MVC
              if(file_exists($file_controller))
                include $file_controller;
             ?>
          </div>
        <!-- /page content -->
         <footer>
          <div class="pull-right">
      
          </div>
          <div class="clearfix"></div>
        </footer>
      </div>
    </div>

    <!-- jQuery -->
    
    <!-- Bootstrap -->
    <script src="public/backend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="public/backend/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="public/backend/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="public/backend/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="public/backend/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="public/backend/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="public/backend/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="public/backend/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="public/backend/vendors/Flot/jquery.flot.js"></script>
    <script src="public/backend/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="public/backend/vendors/Flot/jquery.flot.time.js"></script>
    <script src="public/backend/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="public/backend/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="public/backend/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="public/backend/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="public/backend/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="public/backend/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="public/backend/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="public/backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="public/backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="public/backend/vendors/moment/min/moment.min.js"></script>
    <script src="public/backend/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="public/backend/build/js/custom.min.js"></script>

    
  
  </body>
</html>
