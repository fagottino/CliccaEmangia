<?php
include_once './admin/Controller/DrinkController.php';
include_once './admin/Controller/PlateController.php';

$plates = new PlateController();
$allPlate = $plates->getAllPlate(true);

$drink = new DrinkController();
$allDrink = $drink->getAllDrink(true);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="shortcut icon" href="images/star.png" type="favicon/ico" /> -->

        <title>Clicca e Mangia</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/flexslider.css">
        <link rel="stylesheet" href="css/pricing.css">
        <link rel="stylesheet" href="css/main.css">


        <script src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.flexslider.min.js"></script>
        <script type="text/javascript">
            $(window).load(function () {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlsContainer: ".flexslider-container"
                });
            });
        </script>

        <!-- AIzaSyAdk0CtIniOAhy3zoB5J8JPnadKFX4a-Lc Key Api Google-->

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdk0CtIniOAhy3zoB5J8JPnadKFX4a-Lc
        &callback=initMap"></script>
        <script>
            function initialize() {
                var mapCanvas = document.getElementById('map-canvas');
                var mapOptions = {
                    center: new google.maps.LatLng(41.6072166, 14.2654886),
                    zoom: 16,
                    scrollwheel: false,
                    mapTypeId: google.maps.MapTypeId.HYBRID
                }
                var map = new google.maps.Map(mapCanvas, mapOptions)

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(41.6072166, 14.2654886),
                    title: "Clicca&Mangia"
                });

                // To add the marker to the map, call setMap();
                marker.setMap(map);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>


    </head>
    <body data-spy="scroll" data-target="#template-navbar">

        <!--== 4. Navigation ==-->
        <nav id="template-navbar" class="navbar navbar-default custom-navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Food-fair-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img id="logo" src="images/Logo_main.png" class="logo img-responsive">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="Food-fair-toggle">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#about">su di noi</a></li>
                        <li><a href="#pricing">prezzi</a></li>
                        <!--                        <li><a href="#drinks">bevande</a></li>
                                                <li><a href="#plates">piatti</a></li>-->
                        <li><a href="#contact">contatti</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.row -->
        </nav>


        <!--== 5. Header ==-->
        <section id="header-slider" class="owl-carousel">
            <div class="item">
                <div class="container">
                    <div class="header-content">
                        <h1 class="header-title">I MIGLIORI PANINI</h1>
                        <p class="header-sub-title">per riprendere in un colpo le energie perse</p>
                    </div> <!-- /.header-content -->
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <div class="header-content">
                        <h1 class="header-title">I MIGLIORI SNACK</h1>
                        <p class="header-sub-title">fedeli compagni di avventure di stuzzicheria</p>
                    </div> <!-- /.header-content -->
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <div class="header-content text-right pull-right">
                        <h1 class="header-title">I MIGLIORI DRINKS</h1>
                        <p class="header-sub-title">per non restare mai a bocca vuota</p>
                    </div> <!-- /.header-content -->
                </div>
            </div>
        </section>



        <!--== 6. About us ==-->
        <section id="about" class="about">
            <img src="images/icons/about_color.png" class="img-responsive section-icon hidden-sm hidden-xs">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row dis-table">
                        <div class="hidden-xs col-sm-6 section-bg about-bg dis-table-cell">

                        </div>
                        <div class="col-xs-12 col-sm-6 dis-table-cell">
                            <div class="section-content">
                                <h2 class="section-content-title">Su di Noi</h2>
                                <p class="section-content-para">
                                    Clicca e Mangia è un pub specializzato in panini. Il menù è molto vario e comprende panini a base di hamburger, würstel, salsiccie, vari tipi di affettati e combinazioni di questi con salse, formaggi e conserve.
                                    I panini sono molto ricchi e sostituiscono tranquillamente un pasto, e soprattutto sono molto buoni, complice anche un ottimo pane che anche dopo la tostatura rimane morbido e fragrante.                                    
                                </p>
                                <p class="section-content-para">
                                    Effettuiamo anche servizio a domicilio gratuito.
                                    Mettici alla prova per una serata diversa.
                                </p>
                            </div> <!-- /.section-content -->
                        </div>
                    </div> <!-- /.row -->
                </div> <!-- /.container-fluid -->
            </div> <!-- /.wrapper -->
        </section> <!-- /#about -->


        <!--==  7. Afordable Pricing  ==-->
        <section id="pricing" class="pricing">
            <div id="w">
                <div class="pricing-filter">
                    <div class="pricing-filter-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="section-header">
                                        <h2 class="pricing-title">Il nostro menù</h2>
                                        <ul id="filter-list" class="clearfix">
                                            <li class="filter" data-filter="all">Tutti</li>
                                            <li class="filter" data-filter=".plates">Piatti</li>
                                            <li class="filter" data-filter=".drinks">Bevande</li>                           
                                        </ul><!-- @end #filter-list -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contarainer">
                    <div class="row">  
                        <div class="col-md-10 col-md-offset-1" >
                            <ul id="menu-pricing" class="menu-price"> 
                                <?php
                                if ($allPlate->num_rows > 0) {
                                    foreach ($allPlate as $key => $value) {
                                        echo '
                                        <li class = "item plates">
                                        <a href = "#"> 
                                    <img src = "' . substr($value['image'], 1) . '"class = "img_responsive" alt = "Food">                                      
                                    <div class = "menu-desc text-center">                                        
                                        <h3>' . $value['name'] . '</h3 >
                                            <h4>' . $value['description'] . '<h4> 
                                        </div>
                                        </a>
                                        <h3 class = "white">€ ' . $value['price'] . '</h3>
                                        </li>';
                                    }
                                }
                                ?>

                                <?php
                                if ($allDrink->num_rows > 0) {
                                    foreach ($allDrink as $key => $value) {
                                        echo '
                                        <li class = "item drinks">
                                        <a href = "#">
                                    <img src = "' . substr($value['image'], 1) . '" class = "img-responsive" alt = "Drinks" >
                                        <div class = "menu-desc text-center"> 
                                        <h3>' . $value['name'] . '</h3 >
                                            <h4>' . $value['description'] . '<h4> 
                                        </div>
                                        </a>
                                        <h3 class = "white">€' . $value['price'] . ' </h3>
                                        </li>';
                                    }
                                } else {
                                    echo "Non ci sono bevande disponibili";
                                }
                                ?> 
                                </li>
                            </ul>

                        </div>   
                    </div>
                </div>

            </div> 
        </section>


        <!--        == 8. Great Place to enjoy ==
                <section id="drinks" class="great-place-to-enjoy">
                    <img class="img-responsive section-icon hidden-sm hidden-xs" src="images/icons/beer_black.png">
                    <div class="wrapper">
                        <div class="container-fluid">
                            <div class="row dis-table">
                                <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                                    <h2 class="section-title">Great Place to enjoy</h2>
                                </div>
                                <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">
        
                                </div>
                            </div>  /.dis-table 
                        </div>  /.row 
                    </div>  /.wrapper 
                </section>  /#great-place-to-enjoy -->



        <!--==  9. Our Beer  ==-->
<!--        <section id="beer" class="beer">
            <img class="img-responsive section-icon hidden-sm hidden-xs" src="images/icons/beer_color.png">
            <div class="container-fluid">
                <div class="row dis-table">
                    <div class="hidden-xs col-sm-6 dis-table-cell section-bg">

                    </div>

                    <div class="col-xs-12 col-sm-6 dis-table-cell">
                        <div class="section-content">
                            <h2 class="section-content-title">Our Beer</h2>
                            <div class="section-description">
                                <p class="section-content-para">
                                    Astronomy compels the soul to look upward, and leads us from this world to another. 
                                    Curious that we spend more time congratulating people who have succeeded than 
                                    encouraging people who have not. As we got further and further away, it [the Earth] 
                                    diminished in size.
                                </p>
                                <p class="section-content-para">
                                    beautiful, warm, living object looked so fragile, so delicate, that if you touched 
                                    it with a finger it would crumble and fall apart. Seeing this has to change a man. 
                                    Where ignorance lurks, so too do the frontiers of discovery and imagination.
                                    Astronomy compels the soul to look upward, and leads us from this world to another. 
                                    Curious that we spend more time congratulating people who have succeeded 
                                    than encouraging people who have not. As we got further and further away,
                                    it [the Earth] diminished in size.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->



        <!--== 10. Our Breakfast Menu ==-->
<!--        <section id="plates" class="breakfast">
            <img class="img-responsive section-icon hidden-sm hidden-xs" src="images/icons/bread_black.png">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row dis-table">
                        <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                            <h2 class="section-title">Our Breakfast Menu</h2>
                        </div>
                        <div class="col-xs-6 col-sm-6 dis-table-cell section-bg">

                        </div>
                    </div>  /.dis-table 
                </div>  /.row 
            </div>  /.wrapper 
        </section>  /#breakfast -->



        <!--== 11. Our Bread ==-->
<!--        <section id="bread" class="bread">
            <img class="img-responsive section-icon hidden-sm hidden-xs" src="images/icons/bread_color.png">
            <div class="container-fluid">
                <div class="row dis-table">
                    <div class="hidden-xs col-sm-6 dis-table-cell section-bg">

                    </div>
                    <div class="col-xs-12 col-sm-6 dis-table-cell">
                        <div class="section-content">
                            <h2 class="section-content-title">
                                Our Bread
                            </h2>
                            <div class="section-description">
                                <p class="section-content-para">
                                    Astronomy compels the soul to look upward, and leads us from this world to another.  
                                    Curious that we spend more time congratulating people who have succeeded than 
                                    encouraging people who have not. As we got further and further away, it [the Earth] 
                                    diminished in size.
                                </p>
                                <p class="section-content-para">
                                    beautiful, warm, living object looked so fragile, so delicate, that if you touched 
                                    it with a finger it would crumble and fall apart. Seeing this has to change a man. 
                                    Where ignorance lurks, so too do the frontiers of discovery and imagination.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->








        <!--== 13. Menu List ==----------------------------------------------------------------------------------------->
<!--        <section id="menu-list" class="menu-list">
            <div class="container">
                <div class="row menu">
                    <div class="col-md-9 col-md-offset-1 col-sm-10">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12"> 
                                <div class="row">       
                                    <div class="menu-catagory">
                                        <h2>Drinks</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="menu-item">
        <?php
        if ($allDrink->num_rows > 0) {
            foreach ($allDrink as $key => $value) {
                echo ' 
                                        <h3 class= "menu-title">' . $value['name'] . '</h3 >
                                            <p class="menu-about">' . $value['description'] . '</p>
                                         <div class="menu-system">
                                            <div class="half">
                                                <p class="per-head">
                                                    <span><i class="fa fa-user"></i></span>1:1</p>
                                            </div>
                                            <div class="half"> 
                                                <p class = "price">€' . $value['price'] . '</p>
                                            </div>
                                        </div>';
            }
        }
        ?> 
                                    </div>
                                </div> 
                            </div>

                            <div class="col-md-4 col-sm-6 col-xs-12">  col-md-3 col-sm-6 col-xs-12  
                                <div class="row">
                                    <div class="menu-catagory">
                                        <h2>Food</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="menu-item">
        <?php
        if ($allPlate->num_rows > 0) {
            foreach ($allPlate as $key => $value) {
                echo '
                                        <h3 class= "menu-title">' . $value['name'] . '</h3>
                                            <p class="menu-about">' . $value['description'] . '</p>
                                         <div class="menu-system">
                                            <div class="half">
                                                <p class="per-head">
                                                    <span><i class="fa fa-user"></i></span>1:1</p>
                                            </div>
                                            <div class="half"> <p class = "price">€' . $value['price'] . '</p>
                                            </div>
                                        </div>';
            }
        }
        ?> 
                                    </div>
                                </div>
                            </div>
                        </div>

                       <div id="moreMenuContent"></div>
                        <div class="text-center">
                            <a id="loadMenuContent" class="btn btn-middle hidden-sm hidden-xs">Load More 
                                
                                
                                
                                  <span class="caret"></span></a> 
                        </div>
                    </div>
                </div>
            </div>
        </section>-->








        <section id="contact" class="contact">
            <div class="container-fluid color-bg">
                <div class="row dis-table">
                    <div class="hidden-xs col-sm-6 dis-table-cell">
                        <h2 class="section-title">Puoi trovarci qui</h2>
                    </div>
                    <div class="col-xs-6 col-sm-6 dis-table-cell">
                        <div class="section-content">
                            <p>In The Middle of Nowhere 69 </p>
                            <p> Pesche Italy </p>
                            <p>+39 1234 567890 </p>
                            <p>example@GGmail.com </p>
                        </div>
                    </div>
                </div>
                <div class="social-media">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <ul class="center-block">
                                <li><a href="#" class="fb"></a></li>
                                <li><a href="#" class="twit"></a></li>
                                <li><a href="#" class="g-plus"></a></li>
                                <li><a href="#" class="link"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container-fluid">
            <div class="row">
                <div id="map-canvas"></div>
            </div>
        </div>
        <section class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                        <div class="row">
                            <!--<form class="contact-form" method="post" action="contact.php">-->
                            <form class="contact-form" method="post" action="">
                                <div class="form-group">
                                    <h1 class="section-content">Contattaci</h1>    
                                </div> 
                                <div class="col-md-6 col-sm-6"> 
                                    <div class="form-group">
                                        <input  name="name" type="text" class="form-control" id="name" required="required" placeholder="  Nome">
                                    </div>
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" id="email" required="required" placeholder="  Email">
                                    </div>
                                    <div class="form-group">
                                        <input name="subject" type="text" class="form-control" id="subject" required="required" placeholder="  Oggetto">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <textarea name="message" type="text" class="form-control" id="message" rows="7" required="required" placeholder="  Messaggio"></textarea>
                                </div>
                                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                                    <div class="text-center">
                                        <button type="submit" id="submitEmail" name="submitEmail" class="btn btn-send">Invia </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="copyright text-center">
                            <p>
                                &copy; Copyright, 2016 <a href="#">Clicca&Mangia.</a> Theme by <a href=" "  target="_blank">Fagedo</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.min.js" ></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="js/jquery.hoverdir.js"></script>
        <script type="text/javascript" src="js/jQuery.scrollSpeed.js"></script>
        <script src="js/script.js"></script>


<!--        <div id="responseEmail" style="display:none">-->
        <div id="responseEmail">
            Messaggio inviato &#128512; &#128512; &#128512;<br />
            Grazie per averci scritto. Ti risponderemo al più presto.
        </div>

        <script type="text/javascript">
            document.getElementById("submitEmail").onclick = function() {
                
            var name = $('#name').val();
            var email = $('#email').val();
            var subject = $('#subject').val();
            var message = $('#message').val();
                
            if (name == "" || name == "Nome") {
                alert("Riempi il campo \"Nome\"");
                $( "#name" ).focus();
            } else if (email == "" || email == "Email") {
                alert("Riempi il campo \"Email\"");
                $( "#email" ).focus();
            } else if (subject == "" || subject == "Oggetto") {
                alert("Riempi il campo \"Oggetto\"");
                $( "#subject" ).focus();
            } else if (message == "" || message == "Messaggio") {
                alert("Scrivi un messaggio prima di inviare");
                $( "#message" ).focus();
            } else {
                $.post("./contact.php",
                        {
                            name: $('#name').val(),
                            email: $('#email').val(),
                            subject: $('#subject').val(),
                            message: $('#message').val()
                        },
                        function (response) {
                            if (response) {
                                $("#responseEmail").removeAttr("style");
                            } else {
                                $("#responseEmail").val("Errore nell'invio della mail.");
                                $("#responseEmail").removeAttr("style");
                            }
                        });
                return false;
                }
            };
            
            $( window ).scroll(function() {
                $("#responseEmail").css( "display", "none" );
              });
        </script>
    </body>
</html>