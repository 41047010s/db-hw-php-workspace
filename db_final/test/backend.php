<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<html>
<head>
	<title>Normal Comment</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<style>
	table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
	}
	th, td {
	padding: 5px;
	text-align: left;    
	}
	h1{
		color: darksalmon; 
		font-size: 100px;
	}
</style>
<body>
	
	<!--<h1>Normal Comment</h1>-->
	<div>
	<table style="width:50%" align="center">
		<tr><th>post_id</th><th>content</th><th colspan="2">Action</th></tr>
		

		

		<!-- hint: 用這段php code 讀取資料庫的資料-->

		<?php
		
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
				
			// ******** update your personal settings ******** 
			$sql = "SELECT post_id, content from post";	// set up your sql query
			$result = $conn->query($sql);	// Send SQL Query

			if ($result->num_rows > 0) {	
				while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
					echo "<tr>";
					echo "<td>".$row["post_id"]."</td>";
					echo "<td>".$row["content"]."</td>";
					//echo "<td>".$row["StuNum"]."</td>";
					//echo "<td><a href=\"update.php?id=".$row["post_id"]."\">修改</td>";
					echo "<td><a href=\"delete.php?id=".$row["post_id"]."\">刪除</td>";
					echo "</tr>";
				}
				} else {
					echo "0 results";
				}

		?>
		
	</table></div>
	<!--<p align="center"><a href="create.html">新增資料</a><p>-->

</body>
	
</html>


				
		