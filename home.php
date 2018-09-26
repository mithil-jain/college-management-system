<html>
<title>Home</title>
<head>
    <link rel="stylesheet" type="text/css" href="Addons/home.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="Addons/home.ico" />

</head>
<body>

    <div class="header">

        <div class="leftheader">
            <p class="pheader">EduSystem</p>
        </div>

        <div class="rightheader">
            <ul class="mainddheader">
                <li><a id="dropdown" href="#" onclick="#">
                <?php 
                    include 'session.php';
                    echo $_SESSION['name'];
                    // session_end
                ?>
                <i class="fa fa-angle-down"></i></a></li>
            </ul>

            <div id="ddblock" style="display:none">
                <ul class="insideddheader">
                    <li><a href="home.php?page=update.php" >Profile</a></li>
                    <li onclick="needhelp()"><a href="" >Need help?</a></li>
                    <li ><a href="index.php">Logout</a></li>
                </ul>
            </div>
            
            <script type="text/javascript" >
                    function needhelp()
                    {
                        window.alert("mail ur problems at peacock@gmail.com");
                    }
                    
                    $(document).ready(function(){
                       $("#dropdown").click(function(){
                            $("#ddblock").fadeToggle();
                        });
                    });
            </script>
        </div> 
    </div>

    <div class="flex-container">
            <div class="asideleft">
                <ul class="nav">
                    <li><a class="btn <?php if($_GET["page"]==""){echo 'active';}?>" href="home.php">Dashboard</a></li>
                    <li><a class="btn <?php if($_GET["page"]=="notifications.php"){echo 'active';}?>" href="home.php?page=notifications.php">Notifications</a></li>
                    <li><a class="btn <?php if($_GET["page"]=="attendance.php"){echo 'active';}?>" href="home.php?page=attendance.php">Attendance record</a></li>
                    <li><a class="btn <?php if($_GET["page"]=="assign.php"){echo 'active';}?>" href="home.php?page=assign.php">Assignments</a></li>
                    <li><a class="btn <?php if($_GET["page"]=="events.php"){echo 'active';}?>" href="home.php?page=events.php">Events in college</a></li>
                    <li><a class="btn <?php if($_GET["page"]=="list.php"){echo 'active';}?>" href="home.php?page=list.php">Student List</a></li>
                    <li><a class="btn <?php if($_GET["page"]=="timetable.php"){echo 'active';}?>" href="home.php?page=timetable.php">Timetable</a></li>
                    <li><a class="btn <?php if($_GET["page"]=="update.php"){echo 'active';}?>" href="home.php?page=update.php">My profile</a></li>
                </ul>
            </div>

        <div class="maincontent">
            <?php
                if (isset($_GET['page'])&&$_GET['page']!=""){
                    include $_GET['page'];
                }

                else {
                    include 'dashboard.php';
                }
            ?>
        </div>

        <?php

            $user = 'student';
            $pass = 'sakec';
            $db = 'students';

            $conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect to server".$db);

            $get_all = "select * from timetable";
            
            $data = mysqli_query($conn, $get_all) or die("No records found.");

            $row = mysqli_fetch_assoc($data);

            $day = date('l');

            echo '<div class="asideright">
                <div class="iasideright">
                        <p align="center">Time Table for <br>'.$day.' </p>';

                        if ($day=="Sunday" || $day=="Saturday") {
                            echo '<p class="tthead" align="center">Holiday<p>';
                        }
                        else {
                            echo'<table class="asiderighttable" >
                            <tr>
                                <th>Time</th>
                                <th>Subject</th>
                            </tr>';
                            echo '<tr>
                                <td>9.15-10.15</td>
                                <td>'.$row[$day].'</td>
                            </tr>';

                            $row = mysqli_fetch_assoc($data);
                            echo '
                            <tr>
                                <td>10.15-11.15</td>
                                <td>'.$row[$day].'</td>
                            </tr>';
                            $row = mysqli_fetch_assoc($data);
                            echo '
                            <tr>
                                <td>11.15-12.15</td>
                                <td>'.$row[$day].'</td>
                            </tr>';
                            $row = mysqli_fetch_assoc($data);
                            echo '
                            <tr>
                                <td>1.00-2.00</td>
                                <td>'.$row[$day].'</td>
                            </tr>';
                            $row = mysqli_fetch_assoc($data);
                            echo '
                            <tr>
                                <td>2.00-3.00</td>
                                <td>'.$row[$day].'</td>
                            </tr>';
                            $row = mysqli_fetch_assoc($data);
                            echo '
                            <tr>
                                <td>3.00-4.00</td>
                                <td>'.$row[$day].'</td>
                            </tr>';
                            $row = mysqli_fetch_assoc($data);
                            echo '
                            <tr>
                                <td>4.00-5.00</td>
                                <td>'.$row[$day].'</td>
                            </tr>
                    </table>';
                }
                    echo '</div></div>';
            mysqli_close($conn);
        ?>

    </div>

    <!-- <script src="Addons/js.js" type="text/javascript"></script> -->
</body>
</html>