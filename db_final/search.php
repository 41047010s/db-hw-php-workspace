<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="search.css">
</head>

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
?>

<body>
  <div class="box">

    <div class="background">
      <!-- this div is for background -->
    </div>

    <div class="this_class_is_for_nav_bar">
      <nav class="navbar">
        <?php
        if ($_SESSION['login']) {
          echo "<a href='userInfo.php' target='_self' class='signup_pos'> PROFILE </a>";
          echo "<a href='logout.php' target='_self' class='login_pos'> LOG OUT </a>";
        } else {
          echo "<a href='signup.php' target='_self' class='signup_pos'> SIGN UP</a>";
          echo "<a href='login.php' target='_self' class='login_pos'> LOG IN</a>";
        }
        ?>
        <a href="../index.php" target="_self" class="return_indexpage_pos">回到首頁</a>
      </nav>
    </div>

    <div class="main_display_box">
      <form action="dosearch.php" method="post" align=>
        <table class="table_box">
          <tr>
            <th>Search by coursename</th>
            <td><input type="text" name="search_course" class="boarder_test" /></td>
          </tr><!-- 以課程名稱搜尋 -->
          <tr>
            <th>Search by instructor name</th>
            <td bgcolor="white"><input type="text" name="search_name" class="boarder_test" /></td>
          </tr><!-- 以老師名稱搜尋 -->

          <tr>
            <th>EMI</th>
            <td bgcolor="white"><input type="radio" name="search_emi" value='是'>
              yes
              <input type="radio" name="search_emi" value='0'>
              no
            </td>
          </tr> <!-- 是否為EMI -->

          <tr>
            <th><label for="search_dept">Select Department:</label></th>
            <td>
              <select name="search_dept" id="search_dept">
                <option value=""></option>

                <?php
                $sql = "SELECT dept_name FROM department";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $deptName = $row['dept_name'];
                    echo "<option value='$deptName'>$deptName</option>";
                  }
                } else {
                  echo "<option value=''>No departments found</option>";
                }
                ?>
              </select>
            </td>
          </tr> <!-- select from department -->

          <tr>
            <th><label for="search_day">Select Day:</label></th>
            <td bgcolor="white">
              <select name="search_day" id="search_day">
                <option value=""></option>
                <option value="一">一</option>
                <option value="二">二</option>
                <option value="三">三</option>
                <option value="四">四</option>
                <option value="五">五</option>
              </select>
            </td>
          </tr> <!-- search_day -->

          <tr>
            <th><label for="search_time1">Select time1:</label></th>
            <td bgcolor="white">
              <select name="search_time1" id="search_time1">
                <option value=""></option>
                <?php
                for ($i = 1; $i <= 9; $i++) {
                  echo "<option value=\"$i\">$i</option>";
                }
                ?>
              </select>
            </td>
          </tr> <!-- search_time1 -->

          <tr>
            <th><label for="search_time2">Select time2:</label></th>
            <td bgcolor="white">
              <select name="search_time2" id="search_time1">
                <option value=""></option>
                <?php
                for ($i = 1; $i <= 9; $i++) {
                  echo "<option value=\"$i\">$i</option>";
                }
                ?>
              </select>
            </td>
          </tr> <!-- search_time2 -->
        </table>
        <div align="center">
          <br><br>
          <input type="submit" value="search">
          <div>
      </form>
    </div>

  </div>

</body>

</html>