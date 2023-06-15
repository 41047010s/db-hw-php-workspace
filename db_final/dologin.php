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

$email = $_POST['email'];
$passwd = $_POST['password'];

if ($email && $passwd) {
    $sql = "SELECT * FROM user WHERE email='$email' AND password = '$passwd'";

    $result = $conn->query($sql);

    if ($result->num_rows) {

        $_SESSION['login'] = TRUE;

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $_SESSION['user'] = $row['user_id'];

        // Check roles
        if ($_SESSION['user'] == 1) {
            header('Location: backend.php');
        } else {
            header('Location: user.php');
            $serialNo = isset($_POST['serial_no']) ? $_POST['serial_no'] : '';

            // echo $serialNo;
            if (!empty($serialNo)) {
                // Redirect back to course_detail.php with the 'serial_no' parameter
                header("Location: course_detail.php?serial_no=$serialNo");
            } else {
                // Redirect to a default page if the 'serial_no' parameter is not present
                header("Location:index.php");
            }
        }

    } else {
        $_SESSION['login'] = FALSE;
        $_SESSION['msg'] = '登入失敗，請確認電子郵件及密碼!!';
        header('Location: login.php');
    }
} else {
    $_SESSION['msg'] = '請輸入電子郵件及密碼!!';
    //header('Location: login.html');
}
//session_unset();
?>