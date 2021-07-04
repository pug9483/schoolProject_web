<?php
    header('Content-type: text/html; charset=utf-8');
    session_start();
    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $con = mysqli_connect("localhost", "user1", "12345", "project");
    $sql = "select * from board where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $userid = $row["id"];
    $copied_name = $row["file_copied"];


    if($_SESSION["userid"] == $userid){
      if ($copied_name){
        $file_path = "./data/".$copied_name;
        unlink($file_path);
        }

        $sql = "delete from board where num = $num";
        mysqli_query($con, $sql);
        mysqli_close($con);

        echo "
          <script>
              window.alert('삭제되었습니다.')
              location.href = 'board_list.php?page=$page';
          </script>
        ";
    }
    else{
      echo(
        "<script>
            window.alert('아이디가 일치하지 않습니다.')
            history.back()
        </script>");
    }
?>

