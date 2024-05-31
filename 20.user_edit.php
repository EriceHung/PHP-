<?php

    # 關閉錯誤報告
    error_reporting(0);
    
    # 開啟 session
    session_start();
    
    # 檢查使用者是否已登入，若未登入則重定向至登入頁面
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {   
        # 建立資料庫連結
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        # 使用 POST 方法接收表單資料，並更新資料庫中對應 id 的使用者密碼
        if (!mysqli_query($conn, "update user set pwd='{$_POST['pwd']}' where id='{$_POST['id']}'")) {
            # 若更新失敗，顯示錯誤訊息，並在三秒後回到使用者管理頁面
            echo "修改錯誤";
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        } else {
            # 若更新成功，顯示成功訊息，並在三秒後回到使用者管理頁面
            echo "修改成功，三秒後回到網頁";
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }
    }

?>
