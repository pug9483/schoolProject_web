<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8">
		<title>서울 둘레길</title>
		<link rel="stylesheet" href="./css/index.css?after" type="text/css">
		<link rel="stylesheet" href="./css/my_homepage.css?after" type="text/css">
	</head>
	<body> 
		</style>
		<header>
			<?php include "header.php";?>
		</header>
		<section>
<?php
    if(!isset($_SESSION["userid"])){
        echo("
            <script>
                window.alert('로그인이 필요한 서비스입니다.');
                location.href = 'index.php';
            </script>
        ");
    }
?>
<?php
	
	function check($flag){
		$userid = $_SESSION["userid"];
		$con = mysqli_connect("localhost","user1", "12345", "project");
		$sql = "select * from members where id='$userid'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$directory = $row["directory"];
		mysqli_close($con);
		//크기가 29인 boolean 배열
	
		if (is_dir($directory) && $handle = opendir($directory)){
			echo "<div class = 'stamp_numbering'>";
			while (($entry = readdir($handle)) != false) { 
				if($entry != '.' && $entry != '..'){
					$arr = explode('.', $entry);
					$flag[$arr[0]] = true;
				}
			} 
			echo("</div>");
		} 
		return $flag;
	}
?>
	<div class = "title">
		<div class="title__column">
			<h1>이미지를 클릭하여 사진을 등록해보세요</h1>
		</div>
		<div class="title__column">
			<div class="title__column__col1">
				<div>완주</div>
				<div></div>
			</div>
			<div class="title__column__col2">
				<div>미완주</div>
				<div></div>
			</div>
		</div>
	</div>
<?php
	$flag = array(false,false,false,false,false,false,false,false,false,false,
	false,false,false,false,false,false,false,false,false,
	false,false,false,false,false,false,false,false,false,false);
	$flag = check($flag);
	$num = 1;

	echo("
		<div class='stamps'>
	");
	for($y=0; $y<4; $y++){
		echo("<div class='stamps__row'>");
		for($x=0; $x<7; $x++){
			echo("
				<a href='my_homepage_form.php?num=$num'>
					<div class='stamps__row__stamp'>
			");
			if($flag[$num]){
				echo "<img style = 'border : 3px solid red' src='img/red-{$num}.png'>";
			}
			else{
				echo "<img src='img/green-{$num}.png'>";
			}
			echo("
				</div>
			</a>"
			);
			$num++;
		}
		echo "</div>";
	}
?>
	</div>
	
		</section> 
	</body>
</html>