
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>서울 둘레길</title>
    <link rel="stylesheet" href="./css/index.css?after" type="text/css">
    <link rel="stylesheet" href="./css/my_homepage.css?after" type="text/css">
  
</head>
    <body>
    <header>
        <?php include "header.php";?>
    </header>  
    <section>
<?php
    $num = $_GET["num"];
    $userid = $_SESSION["userid"];
    $con = mysqli_connect("localhost","user1", "12345", "project");
    $sql = "select * from members where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $directory = $row["directory"];
    mysqli_close($con);
   
    if (is_dir($directory) && $handle = opendir($directory)){
        while (($entry = readdir($handle)) != false) { 
            $arr = explode('.', $entry);
            $path = $directory.'/'.$entry;
            if($arr[0] == $num){
                closedir($handle); 
               echo (
               "<script>
                    location.href = 'my_homepage_board.php?num=$num';
                </script>");
                exit;
            }
        } 
    } 
?>

        <div class="my_homepage_box">
            <h3 class="my_homepage_title">스탬프 사진 저장</h3>
            <?php $num = $_GET["num"]?>
            <form  name="my_homepage_form" method="post" action="my_homepage_insert.php?num=<?=$num?>" enctype="multipart/form-data">
                <div class="my_homepage_content">
                    <div>이미지를 드래그하세요</div>
                </div>
                <div class="buttons">
                    <div>첨부파일 <input type="file" id="file" name = "upfile"></div>
                    <button type="button" onclick="check_input()">완료</button>
                </div>
            </form>
        </div> 
    </section> 
    <script>
        function check_input(){
            if(!document.my_homepage_form.upfile.value){
                alert("사진을 넣으세요");
                document.board_form.content.focus();
                return;
            }
            document.my_homepage_form.submit();
        }
    </script>
    
    <script>
        (function() {
            var $file = document.getElementById("file")
            var dropZone = document.querySelector(".my_homepage_content")
            var toggleClass = function(className) {
                console.log("current event: " + className)
                var list = ["dragenter", "dragleave", "dragover", "drop"]
                for (var i = 0; i < list.length; i++) {
                    if (className === list[i]) {
                        dropZone.classList.add("my_homepage_content-" + list[i])
                    } else {
                        dropZone.classList.remove("my_homepage_content-" + list[i])
                    }
                }
            }
            
            var showFiles = function(files) {
                dropZone.innerHTML = ""
                for(var i = 0, len = files.length; i < len; i++) {
                    dropZone.innerHTML += "<p>" + files[i].name + "</p>"
                }
            }

            var selectFile = function(files) {
                $file.files = files
                showFiles($file.files)
                
            }
            
            $file.addEventListener("change", function(e) {
                showFiles(e.target.files)
            })

            dropZone.addEventListener("dragenter", function(e) {
                e.stopPropagation()
                e.preventDefault()

                toggleClass("dragenter")

            })

            dropZone.addEventListener("dragleave", function(e) {
                e.stopPropagation()
                e.preventDefault()

                toggleClass("dragleave")

            })

            dropZone.addEventListener("dragover", function(e) {
                e.stopPropagation()
                e.preventDefault()

                toggleClass("dragover")

            })

            dropZone.addEventListener("drop", function(e) {
                e.preventDefault()
                toggleClass("drop")
                var files = e.dataTransfer && e.dataTransfer.files
                console.log(files)
                if (files != null) {
                    if (files.length < 1) {
                        alert("폴더 업로드 불가")
                        return
                    }
                    selectFile(files)
                } else {
                    alert("ERROR")
                }
            })
        })();
    </script>
</body>
</html>