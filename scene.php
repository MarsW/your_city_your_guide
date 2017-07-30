<?php
    include('config.php');
    include('html.php');
    $dbLink=mysqli_connect(DNS, DBuser, DBpw, DBname) or die('Connect Error ('
            .mysqli_connect_errno().')'.mysqli_connect_error());
    mysqli_query($dbLink, 'SET NAMES utf8');

    $scene_sn = $_GET['sn'];
    $lang = $_GET['lang'];
    $name = "";
    $intro = "";
    $img_url="";

    $sql = "SELECT * FROM `scene_intro` WHERE `sn` = ".$scene_sn;
    $result=mysqli_query($dbLink, $sql) or die(mysqli_error($dbLink));
    while ($row=mysqli_fetch_assoc($result)) {
        if($lang=="en"){
            $name = $row['name_en']."<br>";
            $intro = $row['intro_en']."<br>";
        }else{
            $name = $row['name_zh']."<br>";
            $intro = $row['intro_zh']."<br>";
        }
        $img_url = "./scene_intro/".$row['photo'];
    }

    $sql = "SELECT filename,intro,photo FROM `scene_audio` WHERE `scene_sn` = ".$scene_sn;
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
                    <div class="col-md-3" ></div>
            ';
        }
        $music = "scene_audio/".$row['filename'];
        $row_html.='
                    <div class="col-md-2 col-sm-4 portfolio-item2">
                        <a href="" class="portfolio-link" data-toggle="modal" onclick="loadmusic(\''.$music.'\')">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <span class="glyphicon glyphicon-headphones"></span>
                                </div>
                            </div>
                            <img src="scene_audio/'.$row['photo'].'" class="img-responsive" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4>'.$row['intro'].'</h4>
                        </div>
                    </div>
        ';
        if ($count==3){ // row結尾
            $count=0;
            $row_html.='
                    <div class="col-md-3"></div>
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
    echo '
            <section id="scene" class="bg-light-gray" style="padding-bottom:0px">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">'.$name.'</h2>
                            <p class="text-muted">'.$intro.'</p>
                            <img src="'.$img_url.'" width="50%"/>
                        </div>
                    </div>
                    <form action="upload.php?sn='.$scene_sn.'" enctype="multipart/form-data" method="post">
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <center>
                                Want to tell something interest here? : 
                                <input id="file" name="file" type="file">
                                <input id="submit" name="submit" type="submit" value="Start uploading">
                            </center>
                        </div>
                    </div>
                    </form>
                </div>
            
            
    ';
    echo '
            <section class="bg-light-gray" style="padding-bottom:0px">
                <center>
                <div id="music_block" style="display:none">
                    <audio controls id="music">
                        <source id="music_source" src="" type="audio/mpeg"> 
                    </audio>
                </div>
                </center>
            </section>
    ';
    echo $row_html;
    
    echo $_HTML_FOOTER;
    echo '
        <script src="js/music.js"></script>
    ';
    echo $_JS;
    echo $_HTML_END;
    
