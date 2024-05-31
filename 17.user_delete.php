<?php
    # 關閉錯誤報告
    error_reporting(0);
    
    # 開啟 session
    session_start();
    
    # 檢查使用者是否已登入，若未登入則重定向至登入頁面
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
    }
    else {
        # 建立資料庫連結
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        # 刪除資料SQL命令：delete from 表格名稱 where 條件
        $sql = "delete from user where id='{$_GET["id"]}'";
        
        #echo $sql;

        # 執行SQL命令，檢查是否執行成功
        if (!mysqli_query($conn, $sql)) {
            echo "使用者刪除錯誤";
        } else {
            echo "使用者刪除成功";
        }
        
        # 三秒鐘後重定向到18.user.php頁面
        echo "<meta http-equiv=REFRESH content='3; url=18.user.php'>";
    }
?>
