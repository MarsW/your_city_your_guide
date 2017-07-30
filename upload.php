<?php
    include('config.php');
    $dbLink=mysqli_connect(DNS, DBuser, DBpw, DBname) or die('Connect Error ('
            .mysqli_connect_errno().')'.mysqli_connect_error());
    mysqli_query($dbLink, 'SET NAMES utf8');

    $scene_sn = $_GET['sn'];

    //檢查上傳檔案是否有錯誤
    if ($_FILES["file"]["error"] > 0) {
        echo "Error Code: ".$_FILES["file"]["error"];
    } else {    
        if(!(empty($_FILES["file"]["name"]))) {
            $new_file_name = time().".mp3";
            move_uploaded_file($_FILES["file"]["tmp_name"], "scene_audio/".$new_file_name);
            $insert_sql = "INSERT INTO `scene_audio` 
                (`scene_sn`, `filename`) 
                VALUES (".$scene_sn.", '".$new_file_name."');";
            if(!mysqli_query($dbLink, $insert_sql)){
                echo "Upload Fail";
                //delete file
            }
            echo "Upload Done as ".$new_file_name;
        }else{
            echo "Upload Fail";
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

