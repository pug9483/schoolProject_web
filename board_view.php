<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>서울 둘레길</title>
<link rel="stylesheet"  href="./css/index.css?after" type="text/css">
<link rel="stylesheet"  href="./css/board.css?after" type="text/css">
	<script>
    function check_input()
    {
        if (!document.reply_form.reply_text.value) {
            alert("내용을 입력하세요!");    
            document.reply_form.reply_text.focus();
            return;
        }
        document.reply_form.submit();
    }
    </script>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>
   	<div id="board_box">
	    <h3 class="title">
			게시판 > 내용보기
		</h3>
<?php
	$num  = $_GET["num"];
	$page  = $_GET["page"];

	$con = mysqli_connect("localhost", "user1", "12345", "project");
	$sql = "select * from board where num=$num";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$id      = $row["id"];
	$name      = $row["name"];
	$regist_day = $row["regist_day"];
	$subject    = $row["subject"];
	$content    = $row["content"];
	$file_name    = $row["file_name"];
	$file_type    = $row["file_type"];
	$file_copied  = $row["file_copied"];
	$hit          = $row["hit"];

	$content = str_replace(" ", "&nbsp;", $content);
	$content = str_replace("\n", "<br>", $content);

	$new_hit = $hit + 1;
	$sql = "update board set hit=$new_hit where num=$num";   
	mysqli_query($con, $sql);
?>		
	    <ul id="view_content">
			<li>
				<span class="col1"><b>제목 :</b> <?=$subject?></span>
				<span class="col2"><?=$id?> | <?=$regist_day?></span>
			</li>
			<li>
				<?php
					if($file_name) {
						$real_name = $file_copied;
						$file_path = "./data/".$real_name;
						$file_size = filesize($file_path);

						echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       		<a href='download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
			           	}
				?>
				<?=$content?>
			</li>		
	    </ul>
	    <ul class="buttons">
				<li><button onclick="location.href='board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
				<li><button onclick="location.href='board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
		</ul>
	</div> <!-- board_box -->


	<!-- reply -->
	<div class="reply_comment"> 게시판 > 댓글</div>
	
	<div class="input_reply">
		<form name="reply_form" method = "post" action="reply_board_insert.php?num=<?=$num?>">
		<div class="input_reply_column">
			<textarea name = "reply_text" rows="4" cols="150" placeholder="텍스트 입력"></textarea>
		</div>
		<div class="input_reply_column">
			<input type="button" onclick="check_input();" value="댓글 달기">
		</div>
		</form>
	</div>

	<!-- //게시글 밑에 댓글 달기. -->
    

	<div class = "reply_board">
		<div class="reply_list">
			<div class="reply_list_first">
				<div>아이디</div>
			</div>
			<div>내용</div>
			<div>작성일</div>
		</div>
<?php
	if (isset($_GET["reply_page"]))
		$reply_page = $_GET["reply_page"];
	else
		$reply_page = 1;
	$con = mysqli_connect("localhost", "user1", "12345", "project");
	$sql = "select * from reply where con_num = $num order by idx desc ";
	$result = mysqli_query($con, $sql);
	$reply_total_record = mysqli_num_rows($result);

for ($i=0; $i<$reply_total_record; $i++)
{
	mysqli_data_seek($result, $i);
	$row = mysqli_fetch_array($result);
	$idx         = $row["idx"];
	$id          = $row["id"];
	$content	   = $row["content"];
	$regist_day  = $row["regist_day"];
?>
	<div class="reply_board__row">
		<div class="reply_board__column reply_board__column_first">
			<div><?=$id?></div>
		</div>
		<div class="reply_board__column reply_board__column_second"><?=$content?></div>
		<div class="reply_board__column reply_board__column_third">
			<div><?=$regist_day?></div>
			<div><button onclick="location.href='reply_modify.php?num=<?=$num?>&idx=<?=$idx?>'">삭제</button></div>
		</div>
	</div>
<?php
}
mysqli_close($con);
?>
</div>

</section> 
</body>
</html>
