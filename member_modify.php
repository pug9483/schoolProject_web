<?php
    $id = $_GET["id"];

    $pass = $_POST["pass"];
    $nickname = $_POST["nickname"];
    
    $con = mysqli_connect("localhost", "user1", "12345", "project");
    $sql = "update members set pass='$pass', nickname='$nickname'";
    $sql .= " where id='$id'";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>

   
