<!DOCTYPE html>
<html>

<head>
    <title>Course Detail</title>
    <link rel="stylesheet" type="text/css" href="rating.css">
    <script src="post.js"></script>
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
} ?>

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

        <div class="main_php_display_box">
            <?php
            if (isset($_GET['serial_no'])) {
                $serialNo = $_GET['serial_no'];

                $sql = "SELECT * FROM course WHERE serial_no = '$serialNo';"; // Set up your SQL query
            
                $result = $conn->query($sql); // Send SQL Query
            
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    echo "
                    <div class='title_part'>
                        <p>" . $row['title'] . "</p>
                    </div>
                    <div class='info_part'>
                        <div class='info_part_second_title'>
                            <p class='size_3vh'>Course Info</p>
                        </div>
                        <div class='sep2_1' >
                            <div><p class='info_content'>Instructor: " . $row['instructor'] . "</p></div>
                            <div><p class='info_content'>Department: " . $row['dept_name'] . "</p></div>
                        </div>
                        <div class='sep2_1'>
                            <div><p class='info_content'>Course Code: " . $row['course_code'] . "</p></div>
                            <div><p class='info_content'>Credits: " . $row['credits'] . "</p></div>
                        </div>
                        <div class='sep2_1'>
                            <div><p class='info_content'>EMI: " . $row['EMI'] . "</p></div>
                            <div><p class='info_content'>Full/Half: " . $row['fullhalf'] . "</p></div>
                        </div>
                        <div class='sep2_1'>
                            <div><p class='info_content'>R/S/G: " . $row['RSG'] . "</p></div>
                            <div><p class='info_content'>Time Location: " . $row['time_location'] . "</p></div>
                        </div>
                    </div>
                    ";

                    //echo $_SESSION['login'];
                    $login = $_SESSION['login'];
                    if ($login == TRUE) {
                        echo "
                        <a href='#' onclick='showCommentWindow(" . $row['serial_no'] . ")'>
                            <h3>Post a comment: " . $row['serial_no'] . "</h3>
                        </a>";
                    } else {
                        echo "
                        <a href='login.php?serial_no=" . $row['serial_no'] . "'>
                            <h3>Login in to post!</h3>
                        </a>";
                    }


                    echo "<h1>Posts:</h1>";

                    $postsql = "SELECT content , easiness , loading , usefulness FROM post where serial_no = '$serialNo' ORDER BY post_time DESC;
                    ";
                    $postresult = $conn->query($postsql);

                    if ($postresult->num_rows > 0) { //get average ratings of post
                        $total_easiness = 0;
                        $total_loading = 0;
                        $total_usefulness = 0;
                        while ($postrow = mysqli_fetch_array($postresult, MYSQLI_ASSOC)) {
                            $easiness = $postrow['easiness'];
                            $loading = $postrow['loading'];
                            $usefulness = $postrow['usefulness'];
                            $total_easiness += $easiness;
                            $total_loading += $loading;
                            $total_usefulness += $usefulness;
                        }
                        $avg_easiness = round( $total_easiness / $postresult->num_rows , 1);
                        $avg_loading =  round($total_loading / $postresult->num_rows, 1);
                        $avg_usefulness = round($total_usefulness / $postresult->num_rows,1);
                        echo "<div class='three_point'>";
                        echo "<div class='div_E'>";
                        echo "<p> Easiness: " . $avg_easiness . "</p>";
                        echo "</div>";
                        echo "<div class='div_L'>";
                        echo "<p bgcolor='green'> Loading: " . $avg_loading . "</p>";
                        echo "</div>";
                        echo "<div class='div_U'>";
                        echo "<p> Usefulness: " . $avg_usefulness . "</p>";
                        echo "</div>";
                        echo "</div>";
                    } else {
                        echo "<div class='three_point'>";
                        echo "<div class='div_E'>";
                        echo "<p> Easiness: --</p>";
                        echo "</div>";
                        echo "<div class='div_L'>";
                        echo "<p bgcolor='green'> Loading: --</p>";
                        echo "</div>";
                        echo "<div class='div_U'>";
                        echo "<p> Usefulness: --</p>";
                        echo "</div>";
                        echo "</div>";
                    }

                    $postresult = $conn->query($postsql);
                    $count = 0;
                    while ($postrow = mysqli_fetch_array($postresult, MYSQLI_ASSOC)) {
                        $count++;
                        if ($count % 2 == 1) {
                            echo "<div class='post_odd'>";
                        } else {
                            echo "<div class='post_even'>";
                        }

                        $easiness = $postrow['easiness'];
                        $loading = $postrow['loading'];
                        $usefulness = $postrow['usefulness'];
                        echo "<p> Easiness: " . $easiness . " Loading: " . $loading . " Usefulness: " . $usefulness . "</p>";
                        echo "<p> Comment: " . $postrow['content'] . "</p>";

                        echo "</div>";
                        echo "<div class='bot_line'></div>";
                    }


                } else {
                    echo "Course not found";
                }
            } else {
                echo "Invalid request";
            }


            ?>
        </div>

    </div>
</body>

</html>