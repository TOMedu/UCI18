<?php
$class = base64_decode($_GET['c']);
$prof = $_POST['prof'];
$location = $_POST['location'];
$time = $_POST['time'];
$description = $_POST['description'];
$code = $_POST['code'];
#db connect & select
        mysql_query("UPDATE uciclassdb SET prof='$prof',location='$location',description='$description',time1='$time',code='$code' WHERE name='$class'");
echo '<meta http-equiv="refresh" content="0; url=http://uci.karankanwar.me/app/classexplorer.php?class='.$class.'" />';

