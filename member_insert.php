<?php
    $id = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];

    $con = mysqli_connect("localhost", "user1", "12345", "project");

    $sql = "insert into members(id,pass,name) ";
    $sql .= "values('$id', '$pass', '$name')";

    mysqli_query($con, $sql);
    mysqli_close($con);

    echo 
    "<script>
        location.href = 'index.php';
    </script>";
?>