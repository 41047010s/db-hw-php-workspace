<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>註冊</title>
    <link rel="stylesheet" href="signup.css">
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
                <p class="signup_page_title">註冊</p>
            </nav>
        </div>

        <?php
        session_start();
        include "conn.php";
        ?>

        <div>
            <form action="dosignup.php" method="post">
                <div class="sign_up_box">
                    <br />
                    <p>建立您的帳號</p>
                    
                    <p>　　姓名：<input type="text" class="only_underline" name="name" required="required" /></p>

                    <p>電子郵件：<input type="email" class="only_underline" name="email" required="required"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" /></p>

                    <p>　　密碼：<input type="password" class="only_underline" name="password" required="required"
                            id="InputPassword" /></p>

                    <p>確認密碼：<input type="password" class="only_underline" name="ConfirmPassword" required="required"
                            id="ConfirmPassword" oninput="setCustomValidity('');"
                            onchange="if(document.getElementById('InputPassword').value != document.getElementById('ConfirmPassword').value){setCustomValidity('密碼不吻合');}" />
                    </p>
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo "<p><font color='#FF0000'>{$_SESSION['msg']}</font></p>";
                    }
                    else
                    {
                        echo "<br>";
                    }
                    session_unset();
                    ?>
                    <button class="register_button" type="submit">註冊</button>
                </div>
            </form>
        </div>

    </div>
</body>

</html>