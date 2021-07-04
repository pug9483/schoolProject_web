<?php 
    header('Content-type: text/html; charset=utf-8');
    session_start();
    $con_num = $_GET["num"];
    $idx = $_GET["idx"];
    
    $con = mysqli_connect("localhost", "user1", "12345", "project");
    $sql = "select id from reply where idx=$idx && con_num=$con_num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $userid = $row["id"];

    if($_SESSION["userid"] == $userid){
        $sql = "delete from reply where idx=$idx && con_num = $con_num";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        echo(
        "<script>
            window.alert('삭제되었습니다.')
            window.history.back();
        </script>");
    }
    else{
        echo(
        "<script>
            window.alert('아이디가 일치하지 않습니다.')
            history.back()
        </script>");
    }
?>