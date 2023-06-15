<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>個人資料</title>
    <link rel="stylesheet" href="userInfo.css">
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
            <!-- hehe -->
        </div>

        <div>
            <nav class="navbar">
                <p class="login_page_title">個人資料</p>
                <a href="../index.php" target="_self" class="return_indexpage_pos">回到首頁</a>
            </nav>
        </div>

        <!-- Align? -->
        <div class="info_box">
            <br><br>
            <p>個人資料</p>
            <br>
            <?php
            $id = $_SESSION['user'];

            $userInfo_sql = "SELECT * FROM user WHERE user_id='$id'"; // set up your sql query
            $result = $conn->query($userInfo_sql); // Send SQL Query
            
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                echo "<p> name: " . $row['name'] . "<p>
                      <p>email: " . $row["email"] . "<p>
                      <p>posts: " . $row["num_of_posts"] . "<p>";
            } else {
                echo "Invalid request";
            }

            ?>
            <br>
        </div>

    </div>
</body>

</html>