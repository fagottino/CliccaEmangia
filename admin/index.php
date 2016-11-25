<?php
session_start();

if (empty($_SESSION['user']))
    header("location: ./login.php");

if (isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = 'home';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Clicca e Mangia</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
        <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="assets/js/ace-extra.min.js"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
        <script src="assets/js/function.js"></script>
    </head>

    <body class="no-skin">

        <!--[if !IE]> -->
        <script src="assets/js/jquery-2.1.4.min.js"></script>

        <!--[if IE]>
            <script src="assets/js/jquery-1.11.3.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            if ('ontouchstart' in document.documentElement)
                document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!--[if lte IE 8]>
            <script src="assets/js/excanvas.min.js"></script>
        <![endif]-->
        <!-- ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>

        <?php include 'navbar.php'; ?>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
            try {
                ace.settings.loadState('main-container')
            } catch (e) {
            }
            </script>

            <?php include 'sidebar.php'; ?>

            <div class="main-content">
                <div class="main-content-inner">
                    <?php
                    switch ($action) {
                        case 'home':
                        default:
                            include 'home.php';
                            break;
                        case 'profile':
                            include 'profile.php';
                            break;
                        case 'plates':
                            include 'plates.php';
                            break;
                        case 'addPlates':
                            include 'addPlates.php';
                            break;
                        case 'editPlates':
                            include 'editPlates.php';
                            break;
                        case 'drinks':
                            include 'drinks.php';
                            break;
                        case 'addDrinks':
                            include 'addDrinks.php';
                            break;
                        case 'editDrinks':
                            include 'editDrinks.php';
                            break;
                    }
                    ?>
                </div>
            </div><!-- /.main-content -->

            <?php include('footer.php'); ?>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div>

        <script>
            $("#btnLogout").on('click', function () {
                $.post("./Controller/UserController.php",
                        {
                            type: "logout"
                        });
                window.location = "./login.php";
            });
        </script>
    </body>
</html>
