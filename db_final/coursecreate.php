<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>學生資料庫管理系統</title>
</head>

<body>
<h1 align="center">修改課程資料</h1>
	<form action="doupdate.php?id=<?php echo $_GET['id'];?>" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">

	  	<!-- TODO 
		1. 在 index.php 對某筆資料按下`修改`後，會把該筆資料的內容帶入到 `update.php` 表格上
		2. 新增 `ID` 欄位，且屬性為 `唯讀`
		3. 帶入資料時，在`性別`欄位，若該筆資料為男性，則會自動選擇男性選項，否則為女性

		hint : 在index.php對某筆資料按下`修改`後，會把該筆資料的 `id`帶到 `update.php`，
			用該 id 去資料庫做搜尋，再把搜尋到的資料填入到html表單中。
		
		-->
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

		$id=$_GET["id"];
		$sql="select * from course where serial_no='$id'";
		$result=$conn->query($sql);
		$row=mysqli_fetch_array($result, MYSQLI_ASSOC);

		?>
		<tr>
			<th>serial_no</th>
			<td bgcolor="#FFFFFF"><input type="text" name="serial_no" value="<?php echo $id; ?>" readonly /></td>
		</tr>
        <!--<tr>
		  <th>serial_no</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="serial_no" value="<?php echo $row['serial_no'];?>" /></td>
		</tr>-->
		<tr>
		  <th>course_code</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="course_code" value="<?php echo $row['course_code'];?>" /></td>
		</tr>
        <tr>
		  <th>dept_name</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="dept_name" value="<?php echo $row['dept_name'];?>" /></td>
		</tr>
        <tr>
		  <th>course_level</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="course_level" value="<?php echo $row['course_level'];?>" /></td>
		</tr>
        <tr>
		  <th>title</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="title" value="<?php echo $row['title'];?>" /></td>
		</tr>
        <tr>
		  <th>credits</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="credits" value="<?php echo $row['credits'];?>" /></td>
		</tr>
        <tr>
		  <th>R/S/G</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="R/S/G" value="<?php echo $row['R/S/G'];?>" /></td>
		</tr>
        <tr>
		  <th>full/half</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="full/half" value="<?php echo $row['full/half'];?>" /></td>
		</tr>
        <tr>
		  <th>EMI</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="EMI" value="<?php echo $row['EMI'];?>" /></td>
		</tr>
        <tr>
		  <th>instructor</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="instructor" value="<?php echo $row['instructor'];?>" /></td>
		</tr>
        <tr>
		  <th>time_location</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="time_location" value="<?php echo $row['time_location'];?>" /></td>
		</tr>
		 <!--<tr>
		  <th>學號 <input type="hidden" name="id" value="" /></th>
		  <td bgcolor="#FFFFFF"><input type="text" name="StuNum" value="<?php //echo $row['StuNum'];?>" /></td>
		</tr>
		<tr>
		  <th>密碼</th>
		  <td bgcolor="#FFFFFF"><input type="text" name="passwd" value="<?php //echo $row['passwd'];?>" /></td>
		</tr>
		<tr>
		  <th>性別</th>
			<td bgcolor='#FFFFFF'><input  type='radio' name='gender' value='1' <?php //if ($row['gender']==1) echo 'checked';?>>男 </input> <input type='radio' name='gender' value='0'<?php //if($row['gender']==0)echo 'checked';?>>女 </input>
		<tr>-->
		  <th colspan="2"><input type="submit" value="更新"/></th>
		</tr>


	  </table>
	</form>
</body>
</html>