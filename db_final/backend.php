<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後台管理</title>
    <link rel="stylesheet" href="log.css"> <!-- css check -->
</head>

<?php
session_start();
include "conn.php";

// set up char set
if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<body>
    <div class="box">

        <div class="background">
        </div>

        <div>
            <nav class="navbar">
                <p class="login_page_title">後台管理</p>
                <a href="../index.php" target="_self" class="return_indexpage_pos">回到首頁</a>
                <a href='logout.php' target='_self' class='login_pos'>LOG OUT</a>
            </nav>
        </div>

        <!-- Align? -->
        <div class="log_in_box">
            <br><br>
            <p>後台管理</p>
            <br>
            <a href="coursemanage.php" target="_self" class="signup_pos"> 課程管理</a>
            <a href="postmanage.php" target="_self" class="signup_pos"> 留言管理</a>
            <br>
        </div>

    </div>
</body>

</html>