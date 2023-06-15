<?php
include "conn.php";

if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id = $_GET['id'];

if (isset($id)) {
    $delete_sql = "DELETE FROM course where '$id'=serial_no"; // TODO

	if ($conn->query($delete_sql) === TRUE) {
        echo "<a href='coursemanage.php'>返回主頁</a>";
    }else{
        echo "刪除失敗!";
	}

}else{
	echo "資料不完全";
}
				
?>