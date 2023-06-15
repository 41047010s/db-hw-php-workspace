<?php

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

//echo $_POST['name'];

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $userName = $_POST['name'];
    $email = $_POST['email'];
    $passwd = $_POST['password'];

    //echo $userName, $email, $passwd;
    $insert_sql = "INSERT INTO user(name, email, password) VALUE ('$userName', '$email', '$passwd')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "註冊成功!!";//<br> <a href='index.html'>返回主頁</a>";
    } else {
        echo $conn->error;
        echo "<h2 align='center'<font color='antiquew
        ith'>註冊失敗!!</font></h2>";
    }
} else {
    echo "資料不完全";
}
?>