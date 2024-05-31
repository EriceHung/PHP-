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

    # 新增資料SQL命令：insert into 表格名稱(欄位1,欄位2) values(欄位1的值,欄位2的值)
    $sql = "insert into user(id, pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";

    #echo $sql;

    # 執行SQL命令，檢查是否執行成功
    if (!mysqli_query($conn, $sql)) {
        echo "新增命令錯誤";
    }
    else {
        echo "新增使用者成功，三秒鐘後回到網頁";
        echo "<meta http-equiv=REFRESH content='3; url=18.user.php'>";
    }
}
?>
