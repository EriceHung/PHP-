  # 隱藏錯誤報告
    error_reporting(0);
    
    # 開始 session
    session_start();
    
    # 如果未登入，則提示請先登入並在3秒後重定向至登入頁面
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
    }
    else{   
        # 連接資料庫
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        # 更新佈告資料
        if (!mysqli_query($conn, "update bulletin set title='{$_POST['title']}',content='{$_POST['content']}',time='{$_POST['time']}',type={$_POST['type']} where bid='{$_POST['bid']}'")){
            echo "修改錯誤";
            echo "<meta http-equiv=REFRESH content='3; url=11.bulletin.php'>";
        }else{
            echo "修改成功，三秒後回到佈告欄列表";
            echo "<meta http-equiv=REFRESH content='3; url=11.bulletin.php'>";
        }
    }

?>
