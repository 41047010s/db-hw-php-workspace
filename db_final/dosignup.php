<?php
session_start();
include "conn.php";

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

    // check duplicated username
    $check_sql = "SELECT * FROM user WHERE email='$email'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        $_SESSION['msg'] = "此電子郵件已註冊過帳號";
        // Back to homepage
        header('Location: signup.php');
        exit();
    }

    //echo $userName, $email, $passwd;
    $insert_sql = "INSERT INTO user(name, email, password) VALUE ('$userName', '$email', '$passwd')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "註冊成功!!";
        // Back to homepage
        echo "<a href='index.php'>返回主頁</a>";
    } else {
        $_SESSION['msg'] = "註冊失敗";
        header("Location: signup.php");
    }
} else {
    echo "資料不完全";
}

?>