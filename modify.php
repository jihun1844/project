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
        .main{
            margin-left: 25%;
        }
        .title{
            color: aliceblue;
            background-color: rgba(0, 0, 0, 0.3);
        }
        .content{
            color: aliceblue;
            background-color: rgba(0, 0, 0, 0.3);
        }
        table.table2 {
            border-collapse: separate;
            border-spacing: 1px;
            text-align: left;
            line-height: 1.5;
            border-top: 1px solid #ccc;
            margin: 20px 10px;
        }

        table.table2 tr {
            width: 50px;
            padding: 10px;
            font-weight: bold;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }

        table.table2 td {
            width: 100px;
            padding: 10px;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <?php
    $connect = mysqli_connect('localhost', 'root', '', 'test') or die("connect failed");
    $number = $_GET['number'];
    $query = "select title, content, date, name from board where number = $number";
    $result = mysqli_query($connect, $query);
    $rows = mysqli_fetch_assoc($result);

    $title = $rows['title'];
    $content = $rows['content'];
    $userid = $rows['name'];

    session_start();

    $URL = "./board.php";

    if (!isset($_SESSION['md_id'])) {
    ?> <script>
            alert("권한이 없습니다.");
            location.replace("<?php echo $URL ?>");
        </script>
    <?php   } else if ($_SESSION['md_id'] == $userid) {
    ?>
        <form method="POST" action="modify_action.php?number=<?= $number ?>">
            <table class="main" style="padding-top:50px" style = "align:center;" width=auto cellpadding=2>
                <tr>
                    <td style="height:40; float:center; background-color:#3C3C3C">
                        <p style="font-size:25px; text-align:center; color:white; margin-top:15px; margin-bottom:15px"><b>게시글 수정하기</b></p>
                    </td>
                </tr>
                <tr>
                    <td background-color=white>
                        <table class="table2">
                            <tr>
                                <td>작성자</td>
                                <td><input type="hidden" name="id" value="<?= $_SESSION['md_id'] ?>"><?= $_SESSION['md_id'] ?></td>
                            </tr>

                            <tr>
                                <td>제목</td>
                                <td><input class="title" type=text name=title size=87 value="<?= $title ?>"></td>
                            </tr>

                            <tr>
                                <td>내용</td>
                                <td><textarea class="content" name=content  size=87 cols=75 rows=15><?= $content ?></textarea></td>
                            </tr>

                        </table>

                        <center>
                            <input type="hidden" value="<?= $userid ?>">
                            <input style="height:26px; width:47px; font-size:16px;" type="submit" value="작성">
                        </center>
                    </td>
                </tr>
            </table>
        </form>
    <?php   } else {
    ?> <script>
            alert("알수없는 오류.");
            location.replace("<?php echo $URL ?>");
        </script>
    <?php   }
    ?>
</body>

</html>