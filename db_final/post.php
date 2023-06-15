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

$id = $_GET['id'];
$serial_no = $_GET['serial_no'];

//time 
$postTime = $_POST['post_time'];
$postdateTime = date('Y-m-d H:i:s', strtotime($postTime));
//$postdateTime = gmdate('Y-m-d', $postTime);
echo "postdateTime".$postdateTime."<br>";


//get the number of posts
$user = $_SESSION['user'];
$sql = "SELECT num_of_posts FROM user WHERE user_id = '$user'";
$result = $conn->query($sql);

if ($result) {
	$row = $result->fetch_assoc();
	$num_of_posts = $row['num_of_posts'];
} else {
	echo "Error executing query: " . $conn->error;
}
echo "num_of_posts".$num_of_posts."<br>";

if (isset($_POST['rate_easiness']) || isset($_POST['rate_loading']) || isset($_POST['rate_helpfulness']) || isset($_POST['content'])) {
	$easiness = $_POST['rate_easiness'];
	$loading = $_POST['rate_loading'];
	$usefulness = $_POST['rate_helpfulness'];
	$content = $_POST['content'];
	$serialNo = $_POST['serial_no'];
	$postid = "$user"."_"."$num_of_posts";

	$insert_sql = "insert into post( post_id , content, easiness, loading, usefulness, serial_no,user_id , post_time) values( '$postid', '$content', '$easiness', '$loading', '$usefulness', '$serialNo','$user' , '$postdateTime')";	// TODO
	
	$previousPageURL = "course_detail.php?serial_no=" . $serialNo . "#";
	if ($conn->query($insert_sql) === TRUE) {
		
		//update number of posts
		$num_of_posts = $num_of_posts + 1;
		$update_sql = "update user set num_of_posts = '$num_of_posts' where user_id = '$user'";
		$conn->query($update_sql);
		//$previousPageURL = "course_detail.php?serial_no=" . $serialNo . "#";
		echo "新增成功!!<br> <a href='$previousPageURL'>返回上頁</a>";
	} else {
		echo $conn->error;
		echo "<h2 align='center'><font color='antiquewith'>新增失敗!!<a href='$previousPageURL'></font></h2>";
		//echo "<h2 align='center'><font color='antiquewith'>返回上頁!!<a href='$previousPageURL'></font></h2>";

	}

} else {
	echo "資料不完全";
}

?>