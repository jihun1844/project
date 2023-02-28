<!DOCTYPE html>
<html lang="kr">

<head>
    <meta charset='utf-8'>
    <style>
        body{
            background-size: cover;
            background: url("https://cdn.pixabay.com/photo/2022/12/26/13/43/ship-7679100_1280.jpg");
            background-repeat: no-repeat;
            background-size: 100%;
}
        .join{
            font-size: 25px;
        }
        .home{
            margin-left: 5%;
            font-size: 25px;
        }
        .line{
            margin-left: 23%;
        }
        table {
            border-top: 1px solid #444444;
            border-collapse: collapse;
        }

        tr {
            border-bottom: 1px solid #444444;
            padding: 10px;
        }

        td {
            border-bottom: 1px solid #efefef;
            padding: 10px;
        }

        table .even {
            background:  rgba(0, 0, 0, 0.3);
        }

        .text {
            text-align: center;
            padding-top: 20px;
            color: #000000
        }

        .text:hover {
            text-decoration: underline;
        }

        a:link {
            color: #57A0EE;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
<?php
        session_start();
        if(isset($_SESSION['md_id'])){ ?>
          <a href="./logout.php" class="join">로그아웃</a>
        
        <?php }
            else{ ?>
              <a href="./login.php" class="join">로그인 하러가기</a>
            <?php } ?> 
    <a href="./index.php" class="home">홈 화면으로 돌아가기</a>
    <?php
    $connect = mysqli_connect('localhost', 'root', '', 'test') or die("connect failed");
    $query = "select * from board order by number desc";    //역순 출력
    $result = mysqli_query($connect, $query);
    //$result = $connect->query($query);
    $total = mysqli_num_rows($result);  //result set의 총 레코드(행) 수 반환
    ?>
    <p style="font-size:25px; text-align:center;"><b>게시판</b></p>
    <div style = "margin:auto;">
        

    
    <table class="line" style = "text-align:center;">
        <thead style = "text-align:center;">
            <tr>
                <td width="50" style = "align:center;">번호</td>
                <td width="500" style = "align:center;">제목</td>
                <td width="100" style = "align:center;">작성자</td>
                <td width="200" style = "align:center;">날짜</td>
                <!-- <td width="50" style = "align:center;">조회수</td> -->
            </tr>
        </thead>

        <tbody>
            <?php
            while ($rows = mysqli_fetch_assoc($result)) { //result set에서 레코드(행)를 1개씩 리턴
                if ($total % 2 == 0) {
            ?>
                    <tr class="even">
                        <!--배경색 진하게-->
                    <?php } else {
                    ?>
                    <tr>
                        <!--배경색 그냥-->
                    <?php } ?>
                    <td width="50" style = "align:center;"><?php echo $total ?></td>
                    <td width="500" style = "align:center;">
                    <!-- 글 페이지로 넘어가기 -->
                        <a href="read.php?number=<?php echo $rows['number'] ?>">
                        <?php echo $rows['title'] ?>
                    </td>
                    <td width="100" style = "align:center;"><?php echo $rows['name'] ?></td>
                    <td width="200" style = "align:center;"><?php echo $rows['date'] ?></td>
                    
                    </tr>
                <?php
                $total--;
            }
                ?>
        </tbody>
    </table>
    </div>
    <div class=text>
        <button style="cursor: hand" onClick="location.href='./write.php'">글쓰기</button>
    </div>
</body>

</html>
 