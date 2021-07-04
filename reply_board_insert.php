<?php
    session_start();
    if(isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";

    if(!$userid){
        echo("
        <script> 
            alert('댓글 작성은 로그인이 필요합니다!');
            history.go(-1);
        </script>");
        exit;
    }
    
    $con_num = $_GET["num"];
    $id = $userid;
    $content = $_POST["reply_text"];
    $regist_day = date("Y-m-d");
    $content = htmlspecialchars($content, ENT_QUOTES);

    $con = mysqli_connect("localhost", "user1", "12345", "project");
    $sql = "select * from reply where con_num=$con_num";
    $result = mysqli_query($con, $sql);
    if(!$result) $idx = 1;
    else{
        $idx = mysqli_num_rows($result)+1;
    }

    $sql = "insert into reply (idx, con_num, id, content, regist_day) ";
    $sql .= "values('$idx', '$con_num', '$id', '$content', '$regist_day')";
    mysqli_query($con, $sql);
    mysqli_close($con);

?>
<script>
    window.history.back();
</script>