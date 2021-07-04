<?php
    header('Content-type: text/html; charset=utf-8');
    session_start();
    $userid = $_SESSION["userid"];
    $upload_dir = "../uploads/";
    $directory = $upload_dir.$userid;
    $num = $_GET["num"];
    if ($handle = opendir($directory)){
        while (($entry = readdir($handle)) != false) { 
            if($entry == "." || $entry == '..') continue;
            $arr = explode('.', $entry);
            $path = $directory."/".$entry;
            if($arr[0] == $num){
                unlink($path);
            }
        } 
    closedir($handle); 
    } 
?>

<script>
    location.href = "my_homepage_list.php";
</script>
