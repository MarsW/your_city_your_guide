<?php
    include('config.php');
    include('html.php');
    $dbLink=mysqli_connect(DNS, DBuser, DBpw, DBname) or die('Connect Error ('
            .mysqli_connect_errno().')'.mysqli_connect_error());
    mysqli_query($dbLink, 'SET NAMES utf8');

    $scene_sn = $_GET['sn'];
    $lang = $_GET['lang'];

    $sql = "SELECT * FROM `scene_intro`";
    $result=mysqli_query($dbLink, $sql) or die(mysqli_error($dbLink));

    $count = 0;
    $row_html = '
        <section id="portfolio" class="bg-light-gray" style="padding-bottom:0px">
            <div class="container">
    ';
    while ($row=mysqli_fetch_assoc($result)) {
        $count += 1;
        if ($count==1){
            $row_html.='
                <div class="row">
            ';
        }

        $name = "";
        $url = "";
        $img_url = "./scene_intro/".$row['photo'];
        if($lang=="en"){
            $name = $row['name_en']."<br>";
            $url = "scene.php?lang=en&sn=".$row['sn'];
        }else{
            $name = $row['name_zh']."<br>";
            $url = "scene.php?lang=zh&sn=".$row['sn'];
        }
        $tmp = explode(",", $row['gps']); 
        $lat = $tmp[0];
        $lon = $tmp[1];

        $row_html.='
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <a href="'.$url.'" target="_blank" class="portfolio-link" data-toggle="modal">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <span class="glyphicon glyphicon-headphones"></span>
                                </div>
                            </div>
                            <img src="'.$img_url.'" class="img-responsive" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4>'.$name.'</h4>
                            <p class="text-muted scene_distance" lat="'.$lat.'" lon="'.$lon.'">Distance:  km</p>
                        </div>
                    </div>
        ';
        if ($count==3){ // row結尾
            $count=0;
            $row_html.='
                </div>
            ';
        }
    }
    // if ($count!=0){
    //     //補二
    //     $row_html.='
    //             <div class="col-md-2 col-sm-4"></div>
    //             <div class="col-md-2 col-sm-4"></div>
    //         ';
    //     $row_html.='
    //             <div class="col-md-3"></div>
    //             </div>
    //         ';
    // }
    // else if($count==2){
    //     //補一
    //     $row_html.='
    //             <div class="col-md-2 col-sm-4"></div>
    //         ';
    //     $row_html.='
    //             <div class="col-md-3"></div>
    //             </div>
    //         ';
    // }

    // Generate HTML
    echo $_HTML_HEADER;
    $title = "";
    if ($lang=="en"){
        $title="Scenes List";
    }else{
        $title="景點列表";
    }
    echo '
            <section id="scene_map" class="bg-light-gray" style="padding-bottom:0px">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">'.$title.'</h2>
                            <p id="alert" class="text-muted"></p>
                            <input id="lat" value="25.0453549" style="display:none"><br>
                            <input id="lon" value="121.5289202" style="display:none"><br>
                            <div id="googleMap" style="display:none"></div>
                        </div>
                    </div>
                </div>
            </section>
    ';

    echo $row_html;
    echo $_HTML_FOOTER;
    echo '
        <input id="lang" value="'.$_GET['lang'].'" style="display:none"><br>
        <script src="js/nearby.js"></script>
        <script src="js/gmap.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMYG-0HFkbh0ylNVrhfqyNpm_gqvh0xU4&callback=myMap"></script>
    ';
    echo $_JS;
    echo $_HTML_END;
    
