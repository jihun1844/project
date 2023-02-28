<?php
$connect = mysqli_connect('localhost', 'root', '', 'test') or die("connect failed");
$number = $_GET['number'];

$query = "select name from board where number = $number";
$result = $connect->query($query);
$rows = mysqli_fetch_assoc($result);

$userid = $rows['name'];

session_start();

$URL = "./board.php";
?>

<?php
if (!isset($_SESSION['md_id'])) {
?> <script>
        alert("권한이 없습니다.");
        location.replace("<?php echo $URL ?>");
    </script>

<?php } else if ($_SESSION['md_id'] == $userid) {
    $query1 = "delete from board where number = $number";
    $result1 = $connect->query($query1); ?>
    <script>
        alert("게시글이 삭제되었습니다.");
        location.replace("<?php echo $URL ?>");
    </script>

<?php } else { ?>
    <script>
        alert("권한이 없습니다.");
        location.replace("<?php echo $URL ?>");
    </script>
<?php }
?>