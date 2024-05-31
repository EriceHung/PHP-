<?php
    # 開啟 session
    session_start();

    # 清除 session 中的 id
    unset($_SESSION["id"]);

    # 顯示登出成功訊息
    echo "登出成功....";

    # 使用 meta 標籤進行網頁重定向，3 秒後跳轉到登入頁面
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
?>
