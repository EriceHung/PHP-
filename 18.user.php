<html>
    <head><title>使用者管理</title></head>
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
            # 顯示使用者管理標題和新增使用者、回佈告欄列表的連結
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";
            
            # 建立資料庫連結
            $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
            
            # 從資料庫查詢所有使用者資料
            $result = mysqli_query($conn, "select * from user");
            
            # 從查詢出來的資料一筆一筆抓出來
            while ($row = mysqli_fetch_array($result)) {
                # 顯示每個使用者的資料和修改、刪除連結
                echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }
            # 結束表格標籤
            echo "</table>";
        }
    ?> 
    </body>
</html>
