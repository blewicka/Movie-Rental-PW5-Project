<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>Movie Rental PW5 Project</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="js/jquery.js"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="?site=home">Home</a>
					<li>
								<a href="?site=allfilms&nrsite=0">All films</a>
					</li>
					<?php session_start();
					if (isset($_SESSION['user_name'])){
						echo '<li>
								<a href="?site=myborrow&status=1">My borrowed films</a>
							</li>
							<li>
								<a href="?site=myborrow&status=0">My orderd films</a>
							</li>'; 
						}
					if ($_SESSION['user_name'] == "admin") {
						echo '<li>
							<a href="?site=addfilm">Add film</a>
							<a href="?site=allorders&nrsite=0">All orders</a>
						</li>';
						}
					?>
					
				</li>
						
					
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-1">
						<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
					</div>
					<div class="col-lg-8">
						<?php include("underpages/login.php");?>
					</div>
				</div>
				<div class="row">
						<?php 
						if (isset($_GET['site'])) 
							include sprintf('underpages/%s.php', $_GET['site']);
						else
							include sprintf('underpages/home.php');
						?>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
