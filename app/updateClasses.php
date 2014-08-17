<?php
		#db structs on this page in UPDATE & insert queries blanked, dont want no sqli!
$username = $_GET['un'];
$class1 = $_POST['class1'];
$class2 = $_POST['class2'];
$class3 = $_POST['class3'];
$class4 = $_POST['class4'];
$class5 = $_POST['class5'];
$class6 = $_POST['class6'];
$class7 = $_POST['class7'];
$class8 = $_POST['class8'];
#need more user data
$userdata = file_get_contents("http://uci.karankanwar.me/app/userapi.php?un=".$username);
$user = explode('@@@@@',$userdata);
$name = $user[1];
$sex = $user[2];
$pic = $user[3];
$major = $user[5];
$school = $user[6];
$residence = $user[7];
$flag = $user[8];
$ethn = $user[9];
$location = $user[10];
#db connect & select
        $qcheck = mysql_query("SELECT * FROM uciclasses WHERE username='$username'");
        $bio = mysql_real_escape_string($user[4]);

        if(mysql_num_rows($qcheck)===0){
		#db struct blanked dont want no sqli
        mysql_query("INSERT INTO uciclasses() VALUES()") or die(mysql_error());
        }
        else {
        mysql_query("UPDATE uciclasses SET ...") or die(mysql_error());
        }
         $q2check = mysql_query("SELECT * FROM uciclassdb WHERE name='$class1'");
        if(mysql_num_rows($q2check)===0){
        mysql_query("INSERT INTO uciclassdb ()
VALUES ('' ,  '$class1',  '',  '',  '',  '',  '',  '',  '',  '')");
}
         $q3check = mysql_query("SELECT * FROM uciclassdb WHERE name='$class2'");
        if(mysql_num_rows($q3check)===0){
        mysql_query("INSERT INTO uciclassdb ()
VALUES ('' ,  '$class2',  '',  '',  '',  '',  '',  '',  '',  '')");
}
         $q4check = mysql_query("SELECT * FROM uciclassdb WHERE name='$class3'");
        if(mysql_num_rows($q4check)===0){
        mysql_query("INSERT INTO uciclassdb ()
VALUES ('' ,  '$class3',  '',  '',  '',  '',  '',  '',  '',  '')");
}
         $q5check = mysql_query("SELECT * FROM uciclassdb WHERE name='$class4'");
        if(mysql_num_rows($q5check)===0){
        mysql_query("INSERT INTO uciclassdb ()
VALUES ('' ,  '$class4',  '',  '',  '',  '',  '',  '',  '',  '')");
}
         $q6check = mysql_query("SELECT * FROM uciclassdb WHERE name='$class5'");
        if(mysql_num_rows($q6check)===0){
        mysql_query("INSERT INTO uciclassdb ()
VALUES ('' ,  '$class5',  '',  '',  '',  '',  '',  '',  '',  '')");
}
         $q7check = mysql_query("SELECT * FROM uciclassdb WHERE name='$class6'");
        if(mysql_num_rows($q7check)===0){
        mysql_query("INSERT INTO uciclassdb ()
VALUES ('' ,  '$class6',  '',  '',  '',  '',  '',  '',  '',  '')");
}
         $q8check = mysql_query("SELECT * FROM uciclassdb WHERE name='$class7'");
        if(mysql_num_rows($q8check)===0){
        mysql_query("INSERT INTO uciclassdb ()
VALUES ('' ,  '$class7',  '',  '',  '',  '',  '',  '',  '',  '')");
}

         $q9check = mysql_query("SELECT * FROM uciclassdb WHERE name='$class8'");
        if(mysql_num_rows($q9check)===0){
        mysql_query("INSERT INTO uciclassdb ()
VALUES ('' ,  '$class8',  '',  '',  '',  '',  '',  '',  '',  '')");
}
echo '
<script type="text/javascript">
window.location = "http://uci.karankanwar.me/app/classes.php"
</script>
'; 