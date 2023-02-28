<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <style>
        .title{
            color: aliceblue;
            background-color: rgba(0, 0, 0, 0.1);
        }
        .content{
            background-color: rgba(0, 0, 0, 0.1);
            color: aliceblue;
        }
        body{
            background-size: cover;
            background: url("https://cdn.pixabay.com/photo/2022/12/26/13/43/ship-7679100_1280.jpg");
            background-repeat: no-repeat;
            background-size: 100%;
}
        .line{
            margin-left: 28%;
        }
        .input{
            margin-left: 90%;
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
    session_start();
    $URL = "./login.php";
    if (!isset($_SESSION['md_id'])) {
    ?>

        <script>
            alert("로그인이 필요합니다.");
            location.replace("<?php echo $URL ?>");
        </script>
    <?php
    }
    ?>
    <form method="post" action="write_server.php">
        
        <table class="line" style="padding-top:50px" style = "align:center;" width=auto style="border=0;" cellpadding=2>
            <tr>
                <td style="height:40; float:center; background-color:#3C3C3C">
                    <p style="font-size:25px; text-align:center; color:white; margin-top:15px; margin-bottom:15px"><b>게시글 작성하기</b></p>
                </td>
            </tr>
            <tr>
                <td background-color=white>
                    <table class="table2">
                        <tr>
                            <td>작성자</td>
                            <td><input type="hidden" name="name" value="<?= $_SESSION['md_id'] ?>"><?= $_SESSION['md_id'] ?></td>
                        </tr>

                        <tr>
                            <td>제목</td>
                            <td><input type="text" name="title" class="title" size=75></td>
                        </tr>

                        <tr>
                            <td>내용</td>
                            <td><textarea name="content" class="content" cols=80 rows=30 ></textarea></td>
                        </tr>

                        
                    </table>

                    <div>
                        <input style="height:26px; width:47px; font-size:16px center;" class="input" type="submit" value="작성">
                    </div>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>