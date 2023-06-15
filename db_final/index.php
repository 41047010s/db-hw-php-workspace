<?php
    session_start();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁</title>
    <link rel="stylesheet" href="style.css">
</head>
<body><?php
    session_start();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box">

        <div class="background">
        </div>

        <div >
            <nav class="navbar">
                <?php
                if ($_SESSION['login'])
                {
                    echo "<a href='userInfo.php' target='_self' class='signup_pos'> PROFILE </a>";
                    echo "<a href='logout.php' target='_self' class='login_pos'> LOG OUT </a>";
                }
                else{
                    echo "<a href='signup.php' target='_self' class='signup_pos'> SIGN UP</a>";
                    echo "<a href='login.php' target='_self' class='login_pos'> LOG IN</a>";
                }
                ?>
                
                <a href="search.php" target="_self" class="search_pos">搜尋更多課程評價！</a>
            </nav>
        </div>
        

        <div class="pp">
            <p>最新評價📢📢</p>            
        </div>


        <div class="first_post_div">
        <?php       
            //include "conn.php";        
             //******** update your personal settings ******** 
             $servername = "140.122.184.125:3307";
             $username = "team14";
             $password = "kQVYoJa7S0NIXlCN";
             $dbname = "team14";
             //Connecting to and selecting a MySQL database
             $conn = new mysqli($servername, $username, $password, $dbname);
            if (!$conn->set_charset("utf8")) {
                printf("Error loading character set utf8: %s\n", $conn->error);
                exit();
            }
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            
            $sql = "SELECT * FROM post , course , user where course.serial_no = post.serial_no and user.user_id = post.user_id ORDER BY post_time DESC LIMIT 1";
            $result = $conn->query($sql);
            echo $result->num_rows;
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $user_id = $row['user_id'];
                $title = $row['course.title'];
                $post_time = $row['post_time'];
                $title = $row['title'];
                $post_id = $row['post_id'];
                $post_content = $row['content'];
                
                echo "<p>$post_time</p>";
                echo "<p>$user_id</p>";
                echo "<p class= 'post_title'>$title</p>";
                echo "<p class='id'>$post_id</p>";
                echo "<p class='content'>$post_content</p>";

            } else {
                echo "<p class= 'post_title'>No posts found</p>";
            }
        ?> 
        
            
            <p class="post_article">This is article 1</p>
            
        </div>

        <div class="second_post_div">
            <p class="post_title">This is title 2</p>
            <p class="post_article">This ia article 2</p>
        </div>

    </div>
</body>
</html>
    <div class="box">

        <div class="background">
        </div>

        <div >
            <nav class="navbar">
                <?php
                if ($_SESSION['login'])
                {
                    echo "<a href='userInfo.php' target='_self' class='signup_pos'> PROFILE </a>";
                    echo "<a href='logout.php' target='_self' class='login_pos'> LOG OUT </a>";
                }
                else{
                    echo "<a href='signup.php' target='_self' class='signup_pos'> SIGN UP</a>";
                    echo "<a href='login.php' target='_self' class='login_pos'> LOG IN</a>";
                }
                ?>
                
                <a href="search.php" target="_self" class="search_pos">搜尋更多課程評價！</a>
            </nav>
        </div>
        

        <div class="pp">
            <p>最新評價📢📢</p>            
        </div>


        <div class="first_post_div">
        <?php       
            //include "conn.php";        
             //******** update your personal settings ******** 
             $servername = "140.122.184.125:3307";
             $username = "team14";
             $password = "kQVYoJa7S0NIXlCN";
             $dbname = "team14";
             //Connecting to and selecting a MySQL database
             $conn = new mysqli($servername, $username, $password, $dbname);
            if (!$conn->set_charset("utf8")) {
                printf("Error loading character set utf8: %s\n", $conn->error);
                exit();
            }
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            
            $sql = "SELECT * FROM post , course , user where course.serial_no = post.serial_no and user.user_id = post.user_id ORDER BY post_time DESC LIMIT 1";
            $result = $conn->query($sql);
            echo $result->num_rows;
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $user_id = $row['user_id'];
                $title = $row['course.title'];
                $post_time = $row['post_time'];
                $title = $row['title'];
                $post_id = $row['post_id'];
                $post_content = $row['content'];
                
                echo "<p>$post_time</p>";
                echo "<p>$user_id</p>";
                echo "<p class= 'post_title'>$title</p>";
                echo "<p class='id'>$post_id</p>";
                echo "<p class='content'>$post_content</p>";

            } else {
                echo "<p class= 'post_title'>No posts found</p>";
            }
        ?> 
        
            
            <p class="post_article">This is article 1</p>
            
        </div>

        <div class="second_post_div">
            <p class="post_title">This is title 2</p>
            <p class="post_article">This ia article 2</p>
        </div>

    </div>
</body>
</html>