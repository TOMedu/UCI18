<?php
  require_once('../../glorbi.com/fb/src/facebook.php');

  $config = array(
    'appId' => '',
    'secret' => '',
    'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
  );
  $facebook = new Facebook($config);
  $user_id = $facebook->getUser();
    if($user_id) {
	try {
        $user_profile = $facebook->api('/me','GET');
        $username = $user_profile['username'];
        $name = $user_profile['name'];
		$namearr = explode(" ",$name);
		$firstname = $namearr[0];
        $gender = $user_profile['gender'];
        $today = date("Y-m-d");
        $picture = "http://graph.facebook.com/".$username."/picture?width=200&height=200";
#connection & database selection
        $qcheck = mysql_query("SELECT * FROM uciusers WHERE username='$username'");
        if(mysql_num_rows($qcheck)===0){
        echo '<meta http-equiv="refresh" content="0; url=../index.php" />';
        }
        else { 
        }
      } catch(FacebookApiException $e) {
        $login_url = $facebook->getLoginUrl(); 
        echo '<meta http-equiv="refresh" content="0; url=../index.php" />';
        error_log($e->getType());
        error_log($e->getMessage());
      }  
    } else {

      // No user, print a link for the user to login
      $login_url = $facebook->getLoginUrl();
        echo '<meta http-equiv="refresh" content="0; url=../index.php" />';

    }
$user = $facebook->getUser();
    if (!$user) {
		echo '<meta http-equiv="refresh" content="0; url=../index.php" />';

    }
    ?>
    <?php
                            $q2 = mysql_query("SELECT * FROM uciclasses WHERE username='$username'");
                            if(mysql_num_rows($q2)===1){
                            $classFetchFlag = 1;
                            $class = mysql_fetch_assoc($q2);
                            }
                            

    ?>
<!DOCTYPE html>
<html>
    <head>
   <?php include_once("a.php") ?>


        <meta charset="UTF-8">
        <title>Classes | UCI Class of 2018</title>
        <link rel="icon" type="image/png" href="../uci.png" />
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>

 
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
	<style>
	#ad{
position:absolute;
right:20px;
width:300px;
height:600px;
margin-top:-100px;
<?php

/* USER-AGENTS
================================================== */
function check_user_agent ( $type = NULL ) {
        $user_agent = strtolower ( $_SERVER['HTTP_USER_AGENT'] );
        if ( $type == 'bot' ) {
                // matches popular bots
                if ( preg_match ( "/googlebot|adsbot|yahooseeker|yahoobot|msnbot|watchmouse|pingdom\.com|feedfetcher-google/", $user_agent ) ) {
                        return true;
                        // watchmouse|pingdom\.com are "uptime services"
                }
        } else if ( $type == 'browser' ) {
                // matches core browser types
                if ( preg_match ( "/mozilla\/|opera\//", $user_agent ) ) {
                        return true;
                }
        } else if ( $type == 'mobile' ) {
                // matches popular mobile devices that have small screens and/or touch inputs
                // mobile devices have regional trends; some of these will have varying popularity in Europe, Asia, and America
                // detailed demographics are unknown, and South America, the Pacific Islands, and Africa trends might not be represented, here
                if ( preg_match ( "/phone|iphone|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent ) ) {
                        // these are the most common
                        return true;
                } else if ( preg_match ( "/mobile|pda;|avantgo|eudoraweb|minimo|netfront|brew|teleca|lg;|lge |wap;| wap /", $user_agent ) ) {
                        return true;
                }
        }
        return false;
}
$ismobile = check_user_agent('mobile');
if($ismobile) {
echo "display:none;}#bio{width:260px;}";
} else { echo "}"; }
?>
</style>
    <body class="skin-black">
        <header class="header">
            <a href="index.php" class="logo" style="font-family:'Arvo';">
UCI '18            </a>
            <nav class="navbar navbar-static-top" role="navigation">
               

                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                              <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $name; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo $picture; ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <? echo $firstname; ?>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="profile.php?id=<?php echo $username; ?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                    <?php
                                    $params = array( 'next' => 'http://uci.karankanwar.me' );

$logout = $facebook->getLogoutUrl($params); // $params is optional
?>
                                        <a href="<?php echo $logout; ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="left-side sidebar-offcanvas">                
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $picture; ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello,  <a href="profile.php?id=<?php echo $username; ?>"><?php echo $firstname; ?></a></p>

                            <a href="#">You're awesome!</a>
                        </div>
                    </div>
                     <ul class="sidebar-menu">
                        <li>
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i> <span>Update Your Profile</span>
                            </a>
                        </li>
                        <li>
						<?php
						$total = file_get_contents("http://uci.karankanwar.me/counterdata.php");
						if($total>=150){
						echo '<a href="explore.php">
                                <i class="fa fa-th"></i> <span style="color:#ccc;">Explore</span>
                            </a>'; }
							else {
													echo '<a href="#">
                                <i class="fa fa-th"></i> <span style="color:#ccc;">Explore</span><small class="badge pull-right bg-grey">locked till 200 signups</small>
                            </a>';
							}
							?>
                        </li>
												                         <li>
                            <a href="stats.php">
                                <i class="fa fa-th"></i> <span style="color:#ccc;">Stats</span><small class="badge pull-right bg-blue">cool</small>
                            </a>
                        </li>  
											                         <li class="active">
                            <a href="classes.php">
                                <i class="fa fa-th"></i> <span>Classes</span><small class="badge pull-right bg-red">new</small>
                            </a>
                        </li>  
                    </ul>
                </section>
            </aside>
            <aside class="right-side">                
                <section class="content-header">
                    <h1>
Welcome, <?echo $firstname; ?>
                    </h1>
					<p><br>Please fill up your class list below. :)</p>
                </section>

                <section class="content">
				<div id="ad">
<script type="text/javascript"><!--
/* UCI18 */
google_ad_width = 300;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<div class="small-box bg-teal" style="width:70%!important;">
                                <div class="inner">
                                    <h3>
                                       Come back later too!
                                    </h3>
                                    <p>
                                     I only just announced this, and a lot of you haven't filled it in, so come back soon when more people have filled out their class lists, so you can start to get to know your classmates :-)
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-alarm-outline"></i>
                                </div>
                        </div>
                        <?php

                        ?>
                        <b>Please enter your classes as they appear on WebReg, e.g. <i>MATH 2A LEC F</i></b><br><br>
<form action="updateClasses.php?un=<?php echo $username; ?>" method="post">
<table>
<tr><td>CLASS 1: </td>
<td><input type="text" value="<?php echo $class['class1']; ?>" name="class1"></td>
<td>e.g. <i>MATH 2A LEC F</i></td>
</tr>
<tr><td>CLASS 2: </td>
<td><input type="text" value="<?php echo $class['class2']; ?>" name="class2"></td>
<td>e.g. <i>MATH 2A DIS 61</i></td>
</tr>
<tr><td>CLASS 3: </td>
<td><input type="text" value="<?php echo $class['class3']; ?>" name="class3"></td>
<td>e.g. <i>I&C SCI 31 LAB 7</i></td>
</tr>
<tr><td>CLASS 4: </td>
<td><input type="text" value="<?php echo $class['class4']; ?>" name="class4"></td>
</tr>
<tr><td>CLASS 5: </td>
<td><input type="text" value="<?php echo $class['class5']; ?>" name="class5"></td>
</tr>
<tr><td>CLASS 6: </td>
<td><input type="text" value="<?php echo $class['class6']; ?>" name="class6"></td>
</tr>
<tr><td>CLASS 7: </td>
<td><input type="text" value="<?php echo $class['class7']; ?>" name="class7"></td>
</tr>
<tr><td>CLASS 8: </td>
<td><input type="text" value="<?php echo $class['class8']; ?>" name="class8"></td>
</tr>
<tr><td>
<input type="submit" value="Update"></td><td></td></tr>
</form>       
</table>
<?php
if($classFetchFlag==1){
echo "<br><b>My Classes:</b><br>";
echo "<a href='classexplorer.php?class=".$class['class1']."'>".$class['class1']."</a><br>";
echo "<a href='classexplorer.php?class=".$class['class2']."'>".$class['class2']."</a><br>";
echo "<a href='classexplorer.php?class=".$class['class3']."'>".$class['class3']."</a><br>";
echo "<a href='classexplorer.php?class=".$class['class4']."'>".$class['class4']."</a><br>";
echo "<a href='classexplorer.php?class=".$class['class5']."'>".$class['class5']."</a><br>";
echo "<a href='classexplorer.php?class=".$class['class6']."'>".$class['class6']."</a><br>";
echo "<a href='classexplorer.php?class=".$class['class7']."'>".$class['class7']."</a><br>";
echo "<a href='classexplorer.php?class=".$class['class8']."'>".$class['class8']."</a><br>";
}
else {
echo "<br><b>Links to explore your class will appear here when you have finished filling out and update the form above</b><br>";
}
?>
<br><br><br>
                 

                </section><!-- /.content --> 
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
<style>
div.no-print{
display:none;}
</style>
    </body>
</html>