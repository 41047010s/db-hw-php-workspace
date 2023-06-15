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

if (isset($_POST['course_code']) &&isset($_POST['dept_name']) &&isset($_POST['course_level']) &&isset($_POST['title']) &&isset($_POST['credits']) &&isset($_POST['R/S/G']) &&isset($_POST['full/half']) && isset($_POST['EMI']) && isset($_POST['instructor']) && isset($_POST['time_location'])) {
	$course_code = $_POST['course_code'];
	$dept_name = $_POST['dept_name'];
	$course_level = $_POST['course_level'];
	$title = $_POST['title'];
	$credits = $_POST['credits'];
	$R = $_POST['R/S/G'];
	$full = $_POST['full/half'];
	$EMI = $_POST['EMI'];
	$instructor = $_POST['instructor'];
	$time_location = $_POST['time_location'];
	
	
	$id = $_GET['id'];
	
	$update_sql = "UPDATE course set course_code='$course_code', dept_name='$dept_name', course_level='$course_level', title='$title', credits='$credits', R/S/G='$R', full/half='$full', EMI='$EMI', instructor='$instructor', time_location='$time_location' where serial_no='$id'"; // TODO
	
	if ($conn->query($update_sql) === TRUE) {
		echo "修改成功!!<br> <a href='coursemanage.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
	}
	
}else{
	echo "資料不完全";
}
				
?>