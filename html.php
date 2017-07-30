<?php
    $_HTML_HEADER = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Your City Your Guide</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="css/css(3)" rel="stylesheet" type="text/css">
        <!-- Theme CSS -->
        <link href="css/agency.min.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    </head>

    <body id="page-top" class="index">

        <!-- Navigation -->
        <nav id="mainNav" style="background-color:#54dece" class="navbar navbar-default navbar-custom navbar-fixed-top affix">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span> Menu <span class="glyphicon glyphicon-align-justify"></span>
                            </button>

                            <a class="navbar-brand page-scroll" href="index.html" style="font-family: "Roboto Slab", serif; color:#fff;">Your City Your Guide</a>
                    </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="https://blackrockdigital.github.io/startbootstrap-agency/#page-top"></a>
                        </li>
                        <li class="">
                            <a class="page-scroll" href="scene_list.php?lang='.$_GET['lang'].'">Attractions</a>
                        </li>
                        <li class="">
                            <a class="page-scroll" href="scene_map.php?lang='.$_GET['lang'].'">Map</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="bg-light-gray" style="padding-bottom:0px">
            <br>
            <br>

        </section>
    ';

    $_HTML_FOOTER = '
    <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span class="copyright">Copyright © Your City Your Guide 2017</span>
                    </div>
                </div>
            </div>
    </footer>';

    $_JS = '
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Theme JavaScript --> <!-- ??? -->
        <script src="js/agency.min.js"></script>
    ';
    
    $_HTML_END = '
        </body>
    </html>
    ';



    