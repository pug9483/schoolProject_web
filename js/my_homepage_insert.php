<?php
    header('Content-type: text/html; charset=utf-8');
    session_start();
    $userid = $_SESSION["userid"];
    $upload_dir = "../uploads/";
    $upfile_name = $_FILES["upfile"]["name"];
    $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
    $upfile_type = $_FILES["upfile"]["type"];
    $upfile_error = $_FILES["upfile"]["error"];
    $num = $_GET["num"];

    if($upfile_name && !$upfile_error){
        $file = explode(".", $upfile_name);
        $file_name = $file[0];
        $file_ext = $file[1];

        $directory = $upload_dir.$userid;
        if(!file_exists($directory))
            mkdir($directory, 0777, true);

        if(move_uploaded_file($upfile_tmp_name, $directory."/".$num.".".$file_ext)){
            $img_path = $directory."-".$num;
        }
    }
    else{
        $upfile_name = "";
        $upfile_type = "";
    }

    $con = mysqli_connect("localhost", "user1", "12345", "project");
    $sql = "update members set directory='$directory'";
    $sql .= " where id= '$userid'";
    mysqli_query($con, $sql);
    mysqli_close($con);
   
    if ($handle = opendir($directory)){
        while (($entry = readdir($handle)) != false) { 
            $arr = explode('.', $entry);
            $path = $directory.'/'.$entry;
            if($arr[0] == $num){
                echo "<img src='$path'><br />"; 
            }
        } 
    closedir($handle); 
    } 
?>

<script>
    location.href = "my_homepage_list.php";
</script>
