<?php
    header('Content-type: text/html; charset=utf-8');
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
?>		
    <div id="top">
        <div class="top__column">
            <a href="index.php"><h1>서울 둘레길</h1></a>
        </div>
<?php
    if(!$userid) {
?>                
        <div class="top__column">
            <li><a href="member_form.php">회원 가입</a> </li>
            <li><a href="login_form.php">로그인</a></li>
        </div>
    </div>
<?php
    } else {
        $logged = $userid;
?>  
        <div class = "top__logged">
            <li><?='['.$logged."]님"?> </li>
            <li><a href="member_modify_form.php">정보 수정</a></li>
            <li><a href="logout.php">로그아웃</a> </li>
        </div>
    </div>

<?php
    }
?>

<div class="menu">
    <div><a href = "tour.php">둘레길 안내</a></div>
    <div><a href = "board_list.php">같이가기</a></div>
    <div><a href = "my_homepage_list.php">내 스탬프 보기</a></div>
</div>

