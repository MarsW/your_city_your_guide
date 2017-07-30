<?php
    include('html.php');
    // Generate HTML
    echo $_HTML_HEADER;
    $title = "";
    $lang = $_GET['lang'];
    if ($lang=="en"){
        $title="Scenes Map";
    }else{
        $title="景點地圖";
    }
    echo '
            <section id="scene_map" class="bg-light-gray" style="padding-bottom:0px">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">'.$title.'</h2>
                            <p id="alert" class="text-muted"></p>
                            <input id="lat" value="" style="display:none"><br>
                            <input id="lon" value="" style="display:none"><br>
                            <div id="googleMap" style="width:100%;height:400px;"></div>
                        </div>
                    </div>
                </div>
            </section>
    ';

    echo $_HTML_FOOTER;
    
    echo '
        <input id="lang" value="'.$_GET['lang'].'" style="display:none"><br>
        <script src="js/nearby.js"></script>
        <script src="js/gmap.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMYG-0HFkbh0ylNVrhfqyNpm_gqvh0xU4&callback=myMap"></script>
    ';
    echo $_JS;
    echo $_HTML_END;
    
