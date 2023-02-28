<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>

    <style>
        body{
            background-size: cover;
            background: url("https://cdn.pixabay.com/photo/2022/12/26/13/43/ship-7679100_1280.jpg");
            background-repeat: no-repeat;
            background-size: 100%;
}
        .read_table {
            border: 1px solid #444444;
            margin-top: 30px;
            margin-left: 23%;
        }

        .read_title {
            height: 45px;
            font-size: 23.5px;
            text-align: center;
            background-color: #3C3C3C;
            color: white;
            width: 1000px;
        }

        .read_id {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.4);
            width: 30px;
            height: 33px;
        }

        .read_id2 {
            background-color: rgba(0, 0, 0, 0.4);
            width: 60px;
            height: 33px;
            padding-left: 10px;
        }

        .read_hit {
            background-color: #EEEEEE;
            width: 30px;
            text-align: center;
            height: 33px;
        }

        .read_hit2 {
            background-color: white;
            width: 60px;
            height: 33px;
            padding-left: 10px;
        }

        .read_content {
            padding: 20px;
            border-top: 1px solid #444444;
            height: 500px;
            background-color: rgba(0, 30, 40, 0.3);
        }

        .read_btn {
            width: 700px;
            height: 200px;
            text-align: center;
            margin: auto;
            margin-top: 50px;
        }

        .read_btn1 {
            height: 50px;
            width: 100px;
            font-size: 20px;
            text-align: center;
            background-color: white;
            border: 2px solid black;
            border-radius: 10px;
        }

        .read_comment_input {
            width: 700px;
            height: 500px;
            text-align: center;
            margin: auto;
        }

        .read_text3 {
            font-weight: bold;
            float: left;
            margin-left: 20px;
        }

        .read_com_id {
            width: 100px;
        }

        .read_comment {
            width: 500px;
        }
    </style>
</head>

<body>
    <?php
    $connect = mysqli_connect('localhost', 'root', '', 'test');
    $number = $_GET['number'];  // GET 방식 사용
    session_start();
    $query = "select title, content, date, name from board where number = $number";
    $result = $connect->query($query);
    $rows = mysqli_fetch_assoc($result);
    ?>

    <table class="read_table" style = "align:center;">
        <tr>
            <td colspan="4" class="read_title"><?php echo $rows['title'] ?></td>
        </tr>
        <tr>
            <td class="read_id">작성자 <?php echo $number?></td>
            <td class="read_id2"><?php echo $rows['name'] ?></td>
            
        </tr>


        <tr>
            <td colspan="4" class="read_content" valign="top">
                <?php echo $rows['content'] ?></td>
        </tr>
    </table>

    <!-- MODIFY & DELETE 추후 세션처리로 보완 예정 -->
    <div class="read_btn">
        <button class="read_btn1" onclick="location.href='./board.php'">목록</button>&nbsp;&nbsp;

        <?php
        if (isset($_SESSION['user_id']) and $_SESSION['user_id'] == $rows['id'])  ?>
            <button class="read_btn1" onclick="location.href='./modify.php?number=<?= $number ?>'">수정</button>&nbsp;&nbsp;
            <!-- 여기서부터 추가됨 -->
            <button class="read_btn1" a onclick="ask();">삭제</button>

            <script>
                function ask() {
                    if (confirm("게시글을 삭제하시겠습니까?")) {
                        window.location = "./delete.php?number=<?= $number ?>"
                    }
                }
            </script>
        
        <!-- <button class="read_btn1" onclick="location.href='./modify.php'">수정</button>&nbsp;&nbsp;
        <button class="read_btn1" onclick="location.href='./delete.php'">삭제</button> -->
    </div>
</body>

</html>