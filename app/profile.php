<?php
$getuser = $_GET['id'];
  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
  require_once('../../glorbi.com/fb/src/facebook.php');

  $config = array(
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
#db connect & select
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
	$mainquery = mysql_query("SELECT * FROM uciusers WHERE username='$getuser'");
	if(mysql_num_rows($mainquery)!=1){
	//error
	}
	else {
	$row = mysql_fetch_assoc($mainquery);
	$getname = $row['name'];
	$getpic = $row['picture'];
	$sex = $row['sex'];
	$major = $row['major'];
	$school = $row['school'];
	$residence = $row['residence'];
	$bio = $row['bio'];
	$ethn = $row['ethn'];
	$location = $row['location'];
	$flag = $row['chp'];
	if($flag==1){
	$kill = 1;
	}
	}
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
           <?php include_once("a.php") ?>

                <link rel="icon" type="image/png" href="../uci.png" />
        <title><?php if($kill!=1){ echo $getname; } ?> | UCI Class of 2018</title>
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
                        <li class="active">
                            <a href="explore.php">
                                <i class="fa fa-th"></i> <span style="color:#ccc;">Explore</span>
                            </a>
                        </li>
						                         <li>
                            <a href="stats.php">
                                <i class="fa fa-th"></i> <span style="color:#ccc;">Stats</span><small class="badge pull-right bg-blue">cool</small>
                            </a>
                        </li>   
      
                                                											                         <li>
                            <a href="classes.php">
                                <i class="fa fa-th"></i> <span>Classes</span><small class="badge pull-right bg-red">new</small>
                            </a>
                        </li>  
                    </ul>
                </section>
            </aside>
            <aside class="right-side">                
                <section class="content-header"><?php if($kill==1){ echo "<h1>Not Found</h1><br><a href='explore.php'>&laquo; Back</a><style>"; } ?>
				<center><div id="picture">
				<img src="<? echo $getpic; ?>" class="img-circle" />
				</div>
                    <h1>
					<?php
if($getuser=="dearanaaaa" || $getuser=="ettkhaiine"){
	$badge = '<small class="badge bg-blue" style="margin-left:5px;">uci student</small>';
	} 
	else {
	$badge = ""; }
	?>
<a href="http://facebook.com/<?php echo $getuser; ?>" target="_blank"><? echo $getname; ?></a><a href="explore.php?sex=<?php echo $sex; ?>"><small class="badge bg-<?php if($sex=="male") { echo "blue"; } else { echo "orange"; } ?>" style="margin-left:10px;"><? echo $sex; ?></small><?php echo $badge; ?></a>
<br><small style="font-size:10px;font-style:italic;">(clicking the name above will take you to their facebook profile)</small>
                    </h1>
					<div class="callout callout-info">
                                        <h4 style="color:#333">Major & School</h4>
                                        <p><?php echo '<a href="explore.php?major='.$major.'">'.$major.'</a> at <a href="explore.php?school='.$school.'">'.$school.'</a>'; ?></p>
                                    </div>
					<div class="callout callout-warning">
                                        <h4 style="color:#333">Bio</h4>
                                        <p><?php echo nl2br($bio); ?></p>
                                    </div>
					<div class="callout callout-info">
                                        <h4 style="color:#333">Ethnicity & Location</h4>
                                        <p><?php echo '<a href="explore.php?ethn='.$ethn.'">'.$ethn.'</a> living in <a href="explore.php?location='.$location.'">'.$location.'</a>'; ?></p>
                                    </div>
					<div class="callout callout-warning">
                                        <h4 style="color:#333">Planned Residence</h4>
                                        <p><?php echo '<a href="explore.php?ethn='.$residence.'">'.$residence.'</a>'; ?></p>
                                    </div>					
					</center>
                </section>

                <section class="content">

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