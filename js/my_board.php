<?php
    if(isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
?>

<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8">
		<title>서울 둘레길</title>
		<link rel="stylesheet" href="./css/index.css">
	</head>
	<body> 
		</style>
		<header>
			<?php include "header.php";?>
		</header>

        <section>
<?php
 if($userid){ //개인 아이디의 게시글 볼 수 있기.
?>

<?php 
    }else{
        echo("<script> 
        window.alert('로그인하세요')
        history.go(-1)
        </script>
        ");
    }
?>
        </section>

	</body>
</html>
