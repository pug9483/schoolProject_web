<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8">
		<title>서울 둘레길</title>
		<link rel="stylesheet" href="./css/index.css?after" type="text/css">
		<link rel="stylesheet" href="./css/member.css?after" type="text/css">
	</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
<?php    
   	$con = mysqli_connect("localhost", "user1", "12345", "project");
    $sql    = "select * from members where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result);

    $pass = $row["pass"];
    $name = $row["name"];

    mysqli_close($con);
?>
	<section>
        <div id="main_content">
      		<div id="join_box">
          	<form  name="member_form" method="post" action="member_modify.php?id=<?=$userid?>">
			    <h2>회원 정보수정</h2>
    		    	<div class="form id">
						<div class="col1">아이디</div>
						<div class="col2"><?=$userid?></div>                 
			       	</div>

					   <div class="form">
						<div class="col1">이름</div>
						<div class="col2"><?=$name?></div>                 
			       	</div>

			       	<div class="form">
				        <div class="col1">비밀번호 변경</div>
				        <div class="col2">
							<input type="password" name="pass" value="<?=$pass?>">
				        </div>                 
			       	</div>
                       
			       	<div class="buttons">
	                	<img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                  		<img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif"
                  			onclick="reset_form()">
	           		</div>
           	</form>
        	</div> <!-- join_box -->
        </div> <!-- main_content -->
	</section> 
    <script src="./js/member_modify.js"></script>
</body>
</html>

