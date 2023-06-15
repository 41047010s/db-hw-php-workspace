<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
    <link rel="stylesheet" href="log.css">
</head>

<body>
    <div class="box">

        <div class="background">
            <!-- hehe -->
        </div>

        <div>
            <nav class="navbar">
                <!-- <a href="/page/signup.html" target="_self" class="signup_pos"> SIGN UP</a>
                <a href="/page/login.html" target="_self" class="login_pos"> LOG IN</a>
                <a href="/page/search.html" target="_self" class="search_pos">搜尋更多課程評價！</a> -->
                <p class="login_page_title">登入</p>
            </nav>
        </div>

        <?php
        session_start();
        $sn = isset($_GET['serial_no']) ? $_GET['serial_no'] : '';
        echo $sn;
        ?>

        <form action="dologin.php" method="post">
            <div class="log_in_box">
                <input type="hidden" name="serial_no" value="<?php echo $sn; ?>">
                <br><br><br><br><br>
                <p>登入您的帳號</p>
                <br>
                <p>電子郵件：<input type="email" class="only_underline" name="email" required="required"
                         /></p>
                <p>　　密碼：<input type="password" class="only_underline" name="password" required="required" /></p>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo "<p><font color='#FF0000'>{$_SESSION['msg']}</font></p>";
                }
                //session_unset();
                ?>
                <br>
                <button class="login_button" type="submit">登入</button>
                <br>
                <a href='signup.php' target='_self' class='signup_pos'> 沒有帳號嗎? </a>
            </div>
        </form>

    </div>
</body>

</html>