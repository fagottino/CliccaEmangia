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
    </head>

    <body class="no-skin">
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
<!--                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
                            <li class="active">Dashboard</li>
                        </ul> /.breadcrumb 

                        <div class="nav-search" id="nav-search">
                            <form class="form-search">
                                <span class="input-icon">
                                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                                </span>
                            </form>
                        </div> /.nav-search 
                    </div>-->

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
                        case 'addDrinks':
                            include 'addDrinks.php';
                        break;
                    }
                    ?>
                    
                </div>
            </div><!-- /.main-content -->

            <?php include('footer.php'); ?>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script src="assets/js/jquery-2.1.4.min.js"></script>

        <!-- <![endif]-->

        <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
        <script type="text/javascript">
                    if ('ontouchstart' in document.documentElement)
                        document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- page specific plugin scripts -->

        <!--[if lte IE 8]>
          <script src="assets/js/excanvas.min.js"></script>
        <![endif]-->

        <?php
            if ($action == "plates") {
        ?>
         <!-- page specific plugin scripts -->
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="assets/js/dataTables.buttons.min.js"></script>
        <script src="assets/js/buttons.flash.min.js"></script>
        <script src="assets/js/buttons.html5.min.js"></script>
        <script src="assets/js/buttons.print.min.js"></script>
        <script src="assets/js/buttons.colVis.min.js"></script>
        <script src="assets/js/dataTables.select.min.js"></script>
        <script src="assets/js/platesTable.js"></script>
        <script src="assets/js/jquery-ui.min.js"></script>
        <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
        <link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
        
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
                                var $overflow = '';
                                var colorbox_params = {
                                        rel: 'colorbox',
                                        reposition:true,
                                        scalePhotos:true,
                                        scrolling:false,
                                        previous:'<i class="ace-icon fa fa-arrow-left"></i>',
                                        next:'<i class="ace-icon fa fa-arrow-right"></i>',
                                        close:'&times;',
                                        current:'{current} di {total}',
                                        maxWidth:'100%',
                                        maxHeight:'100%',
                                        onOpen:function(){
                                                $overflow = document.body.style.overflow;
                                                document.body.style.overflow = 'hidden';
                                        },
                                        onClosed:function(){
                                                document.body.style.overflow = $overflow;
                                        },
                                        onComplete:function(){
                                                $.colorbox.resize();
                                        }
                                };

                                $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
                                $("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner blue fa-spin'></i>");//let's add a custom loading icon

                                $(document).one('ajaxloadstart.page', function(e) {
                                        $('#colorbox, #cboxOverlay').remove();
                           });
                        })
		</script>
		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/colorbox.min.css" />
		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.colorbox.min.js"></script>
        <?php
            } else if ($action == "home" || $action == "") {
        ?>
        <script src="assets/js/jquery-ui.custom.min.js"></script>
        <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="assets/js/jquery.easypiechart.min.js"></script>
        <script src="assets/js/jquery.sparkline.index.min.js"></script>
        <script src="assets/js/jquery.flot.min.js"></script>
        <script src="assets/js/jquery.flot.pie.min.js"></script>
        <script src="assets/js/jquery.flot.resize.min.js"></script>
        <script src="assets/js/homeScript.js"></script>
        <?php
            } else if ($action == "addPlates" || $action == "editPlates") {
        ?>
        <!-- page specific plugin scripts -->
        <script src="assets/js/wizard.min.js"></script>
        <script src="assets/js/jquery.validate.min.js"></script>
        <script src="assets/js/jquery-additional-methods.min.js"></script>
        <script src="assets/js/bootbox.js"></script>
        <script src="assets/js/jquery.maskedinput.min.js"></script>
        <script src="assets/js/select2.min.js"></script>
        <script src="assets/js/addPlatesScript.js"></script>
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>
        <link rel="stylesheet" href="assets/css/chosen.min.css" />
        <script>
            $('#plateImage').ace_file_input({
                no_file:'Nessun file selezionato...',
                btn_choose:'Scegli',
                btn_change:'Cambia',
                droppable:false,
                onchange:null,
                thumbnail:false //| true | large
                //whitelist:'gif|png|jpg|jpeg'
                //blacklist:'exe|php'
                //onchange:''
                //
            });
        </script>
        <?php
            }
        ?>
        
        <!-- ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>
        
        <script>
            $("#btnLogout").on('click', function () {
                $.post("./Controller/UserController.php",
                        {
                            type: "logout"
                        });
                window.location = "./login.php";
            });
            
            function deletes(no) {
                $.post("./Controller/PlateController.php",
                        {
                            id: no,
                            type: "delete"
                        });
                window.location = "./index.php?action=plates";
            }
            
            function deletef(id, name) {
                $("#dialog-confirm").text('Stai cancellando il piatto ' + name + '. Continuare?');
                    $( "#dialog-confirm" ).removeClass('hide').dialog({
                            resizable: false,
                            width: '320',
                            modal: true,
                            title: "Cancellazione di un piatto",
                            title_html: true,
                            buttons: [
                                    {
                                            html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Cancella",
                                            "class" : "btn btn-danger btn-minier",
                                            click: function() {
                                                $.post("./Controller/PlateController.php",
                                                        {
                                                            id: id,
                                                            type: "delete"
                                                        });
                                                window.location = "./index.php?action=plates";
                                                    $( this ).dialog( "close" );
                                            }
                                    }
                                    ,
                                    {
                                            html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Annulla",
                                            "class" : "btn btn-minier",
                                            click: function() {
                                                    $( this ).dialog( "close" );
                                            }
                                    }
                            ]
                    });
            }
</script>
    </body>
</html>
