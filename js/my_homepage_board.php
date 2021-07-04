<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>서울 둘레길</title>
<link rel="stylesheet"  href="./css/index.css?after" type="text/css">
<link rel="stylesheet"  href="./css/board.css?after" type="text/css">
<link rel="stylesheet"  href="./css/my_homepage.css?after" type="text/css">

</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
   	<div class="my_homepage_box">
        <div class = "photo">
<?php
$num = $_GET["num"];
$userid = $_SESSION["userid"];
$con = mysqli_connect("localhost","user1", "12345", "project");
$sql = "select * from members where id='$userid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$directory = $row["directory"];
mysqli_close($con);

if ($handle = opendir($directory)){
    while (($entry = readdir($handle)) != false) { 
        $arr = explode('.', $entry);
        $path = $directory.'/'.$entry;
        if($arr[0] == $num){
            echo "<img src='$path'>"; 
        }
    } 
} 
?>
    </div>
	    <ul class="my_homepage_buttons">
				<li><button onclick="location.href='my_homepage_modify.php?num=<?=$num?>'">수정</button></li>
				<li><button onclick="location.href='my_homepage_delete.php?num=<?=$num?>'">삭제</button></li>
		</ul>
	</div> <!-- board_box -->

</section> 
</body>
</html>
