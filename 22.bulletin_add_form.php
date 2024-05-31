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
        echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <!-- 新增佈告的表單 -->
                <form method=post action=23.bulletin_add.php>
                    標    題：<input type=text name=title><br> <!-- 標題欄位 -->
                    內    容：<br><textarea name=content rows=20 cols=20></textarea><br> <!-- 內容欄位 -->
                    佈告類型：<input type=radio name=type value=1>系上公告 <!-- 佈告類型選項 -->
                            <input type=radio name=type value=2>獲獎資訊
                            <input type=radio name=type value=3>徵才資訊<br>
                    發布時間：<input type=date name=time><p></p> <!-- 發布時間欄位 -->
                    <input type=submit value=新增佈告> <input type=reset value=清除> <!-- 提交與清除按鈕 -->
                </form>
            </body>
        </html>
        ";
    }
?>
