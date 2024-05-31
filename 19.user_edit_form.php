<html>
    <head><title>修改使用者</title></head>
    <body>
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
        
        # 從資料庫查詢指定 id 的使用者資料
        $result = mysqli_query($conn, "select * from user where id='{$_GET['id']}'");
        
        # 從查詢結果中抓出使用者資料
        $row = mysqli_fetch_array($result);
        
        # 顯示使用者資料編輯表單，並填入現有的資料
        echo "
        <form method=post action=20.user_edit.php>
            <input type=hidden name=id value={$row['id']}>
            帳號：{$row['id']}<br> 
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p>
            <input type=submit value=修改>
        </form>
        ";
    }
    ?>
    </body>
</html>
