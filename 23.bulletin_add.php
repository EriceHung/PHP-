<?php
    # 隱藏錯誤報告
    error_reporting(0);
    
    # 開始 session
    session_start();
    
    # 如果未登入，則提示請先登入並在3秒後重定向至登入頁面
    if (!$_SESSION["id"]) {
        echo "請先登入";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {
        # 建立與資料庫的連接
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        # 構建 SQL 插入語句
        $sql="insert into bulletin(title, content, type, time) 
        values('{$_POST['title']}','{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')";
        
        # 執行 SQL 插入命令
        if (!mysqli_query($conn, $sql)){
            echo "新增命令錯誤";
        }
        else {
            echo "新增佈告成功，三秒後回到網頁";
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }
?>
