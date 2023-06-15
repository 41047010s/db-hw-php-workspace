<html>

<head>
	<title>Normal Comment</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<style>
	table,
	th,
	td {
		border: 1px solid black;
		border-collapse: collapse;
	}

	th,
	td {
		padding: 5px;
		text-align: left;
	}

	h1 {
		color: darksalmon;
		font-size: 100px;
	}
</style>

<body>


	<!--<h1>Normal Comment</h1>-->
	<div>
		<table style="width:50%" align="center">
			<tr>
				<th>serial_no</th>
				<th>title</th>
				<th>instructor</th>
				<th colspan="2">Action</th>
			</tr>

			<!--<tr><th>post_id</th><th>content</th><th colspan="2">Action</th></tr>
-->



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
			$sql = "SELECT serial_no, title, instructor from course"; // set up your sql query
			$result = $conn->query($sql); // Send SQL Query
			
			if ($result->num_rows > 0) {
				while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td>" . $row["serial_no"] . "</td>";
					echo "<td>" . $row["title"] . "</td>";
					echo "<td>" . $row["instructor"] . "</td>";
					echo "<td><a href=\"courseupdate.php?id=" . $row["serial_no"] . "\">修改</td>";
					echo "<td><a href=\"coursedelete.php?id=" . $row["serial_no"] . "\">刪除</td>";
					echo "</tr>";
				}
			} else {
				echo "0 results";
			}
			?>
		</table>
	</div>
	<p align="center"><a href="courseadd.php">+</a>
	<p>

</body>

</html>