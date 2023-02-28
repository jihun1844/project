<?php
$connect = mysqli_connect("localhost", "root", "", "test") or die("fail");

$id = $_POST['name'];                   //Writer        
$title = $_POST['title'];               //Title
$content = $_POST['content']; 
date_default_timezone_set('Asia/Seoul');          
$date = date('Y-m-d H:i:s');            //Date

$URL = './board.php';                   //return URL


$query = "INSERT INTO board ( title, content, date, name) 
        values('$title', '$content', '$date','$id')";


$result = $connect->query($query);
if ($result) {
?> <script>
        alert("<?php echo "게시글이 등록되었습니다." ?>");
        location.replace("<?php echo $URL ?>");
    </script>
<?php
} else {
    echo "게시글 등록에 실패하였습니다.";
}

mysqli_close($connect);
?>