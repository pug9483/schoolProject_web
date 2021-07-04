<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8">
		<title>서울 둘레길</title>
		<link rel="stylesheet" href="./css/index.css?after" type="text/css">
	</head>
	<body> 
		<header>
			<?php include "header.php";?>
		</header>

		<section>
		<div id="main_content">
      		<div id="login_box">
	    		<div id="login_title">
		    		<span>로그인</span>
	    		</div>
	    		<div id="login_form">
          		<form  name="login_form" method="post" action="login.php">		       	
                  	<ul>
						<li><input type="text" name="id" placeholder="아이디" ></li>
						<li><input type="password" id="pass" name="pass" placeholder="비밀번호" ></li> <!-- pass -->
                  	</ul>
                  	<div id="login_btn">
                      	<a href="#"><img src="./img/login.png" onclick="check_input()"></a>
                  	</div>		    	
           		</form>
        		</div> <!-- login_form -->
    		</div> <!-- login_box -->
        </div>
		</section> 

		<script src="./js/login.js"></script>
	</body>
</html>
