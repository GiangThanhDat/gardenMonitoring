<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html>
<head>
    <base href="http://localhost/quanlykhuvuongtrenmay/" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="./public/css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="./public/css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="./public/css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="./public/css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="./public/css/nav.css" media="screen" />
    <link href="./public/css/table/demo_page.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"/>
   
    <!-- BEGIN: load jquery -->
    <script src="./public/js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="./public/js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="./public/js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="./public/js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="./public/js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="./public/js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="./public/js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="./public/js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="./public/js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    
    <!-- END: load jquery -->

    <script type="text/javascript" src="./public/js/table/jquery.dataTables.min.js"></script>

    <script src="./public/js/setup.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="./public/img/livelogo.png" alt="Logo" />
				</div>
				<div class="floatleft middle">
					<h1>NIÊN LUẬN CƠ SỞ: DƯƠNG HỒNG DANH - B17TT3</h1>
					<p>QUẢN LÝ KHU VƯỜNG TRÊN MÂY</p>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="./public/img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello Admin</li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="admin/show/khuvuon"><span>Dashboard</span></a> </li>
            </ul>
        </div>
        <div class="clear">
        </div>
    