<?php
    # 隱藏錯誤報告
    error_reporting(0);
    
    # 開始 session
    session_start();
    
    # 如果未登入，則提示請先登入並在3秒後重定向至登入頁面
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        # 連接資料庫
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        # 建立 SQL 刪除佈告的命令
        $sql="delete from bulletin where bid='{$_GET["bid"]}'";
        
        # 執行 SQL 刪除命令並檢查是否成功
        if (!mysqli_query($conn,$sql)){
            echo "佈告刪除錯誤";
        }else{
            echo "佈告刪除成功";
        }
        
        # 重定向至佈告列表頁面並在3秒後刷新
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }
?>
