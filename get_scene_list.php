<?php
    include('config.php');
    include('html.php');
    $dbLink=mysqli_connect(DNS, DBuser, DBpw, DBname) or die('Connect Error ('
            .mysqli_connect_errno().')'.mysqli_connect_error());
    mysqli_query($dbLink, 'SET NAMES utf8');

    $lang = $_GET['lang'];

    $sql = "SELECT * FROM `scene_intro`";
    $result=mysqli_query($dbLink, $sql) or die(mysqli_error($dbLink));

    $points = array();
    while ($row=mysqli_fetch_assoc($result)) {
        $coordinate = explode(',',$row['gps']);
        $lat = floatval($coordinate[0]);
        $lng = floatval($coordinate[1]);
        if($lang=="en"){
            $name = $row['name_en'];
            $url = 'scene.php?lang=en&sn='.$row['sn'];
        }else{
            $name = $row['name_zh'];
            $url = 'scene.php?lang=zh&sn='.$row['sn'];
        }
        $points[]=[$name, $lat, $lng, $url, $row['photo']];
    }
    echo json_encode($points);
