<?php
$location = $_GET['location'];
$residence = $_GET['residence'];
$ethn = $_GET['ethn'];
$major = $_GET['major'];
$sex = $_GET['sex'];
$school = $_GET['school'];
$sortby = $_GET['sortby'];
$search = $_GET['q'];
$forcebio = $_GET['forcebio'];

  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
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
#connection & db selection
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
	if($username=="karan.kanwar"){
	$getq = $_GET['dbq'];
	}
    ?>
<!DOCTYPE html>
<html>
    <head>
       <?php include_once("a.php") ?>

        <meta charset="UTF-8">
        <title>Explore | UCI Class of 2018</title>
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
                            <p>Hello, <a href="profile.php?id=<?php echo $username; ?>"><?php echo $firstname; ?></a></p>

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
                            <a href="#">
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
                <section class="content-header">
                    <h1>
Welcome, <?echo $firstname; ?>
                    </h1>
                </section>

                <section class="content">
			    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
<?php


if($location!=""){
$mainquery = mysql_query("SELECT * FROM uciusers WHERE location='$location' AND chp=0 ORDER BY RAND()");
}
else if($residence!=""){
$mainquery = mysql_query("SELECT * FROM uciusers WHERE residence='$residence' AND chp=0 ORDER BY RAND()");
}
else if($ethn!=""){
$mainquery = mysql_query("SELECT * FROM uciusers WHERE ethn='$ethn' AND chp=0 ORDER BY RAND()");
}
else if($major!=""){
$mainquery = mysql_query("SELECT * FROM uciusers WHERE major='$major' AND chp=0 ORDER BY RAND()");
}
else if($school!=""){
$mainquery = mysql_query("SELECT * FROM uciusers WHERE school='$school' AND chp=0 ORDER BY RAND()");
}
else if($sex!=""){
$mainquery = mysql_query("SELECT * FROM uciusers WHERE sex='$sex' AND chp=0 ORDER BY RAND()");
}
else if($search!=""){
$mainquery = mysql_query("SELECT * FROM uciusers WHERE name LIKE '%$search%' AND chp=0 ORDER BY RAND()");
}
else if($sortby!=""){
$mainquery = mysql_query("SELECT * FROM uciusers WHERE chp=0 ORDER BY $sortby DESC");
}
else if($forcebio!=""){
$mainquery = mysql_query("SELECT * FROM uciusers WHERE bio IS NOT NULL AND TRIM(bio) <> ''");
}
else if($getq!=""){
$mainquery = mysql_query($getq);
}
else {
$mainquery = mysql_query("SELECT * FROM uciusers WHERE chp=0 ORDER BY RAND()");
}

$selected = mysql_num_rows($mainquery);
$total = file_get_contents("http://uci.karankanwar.me/counterdata.php");
?>
                                                   <h3 class="box-title">Explore your class! #UCI18 <small><? echo $selected."/".$total; ?> anteaters selected, <a href="explore.php">back to all</a></small></h3>
                                    <div class="box-tools">
                                        <div class="input-group"><form style="margin-left: 40px;margin-top:5px;">
                                            <input type="text" class="form-control input-sm pull-right" name="q" style="width: 150px;" placeholder="Search by name"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button></form>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
											<th>DP</th>
                                            <th><a href="explore.php?sortby=name">Name</a></th>
                                            <th><a href="explore.php?sortby=sex">Sex</a></th>
                                            <th><a href="explore.php?sortby=location">Location</a></th>
                                            <th><a href="explore.php?sortby=major">Major</a></th>
                                            <th><a href="explore.php?sortby=school">School</a></th>
                                            <th><a href="explore.php?sortby=residence">Residence</a></th>											
											<th><a href="explore.php?sortby=ethn">Ethnicity</a></th>
                                        </tr>										
<?php
while($row=mysql_fetch_array($mainquery)){
if($row['username']=="dearanaaaa" || $row['username']=="ettkhaiine"){
	$badge = '<small class="badge bg-blue" style="margin-left:5px;">uci</small>';
	} 
	else {
	$badge = ""; }
	echo '						
                                        <tr>
											<td><img src="'.$row['picture'].'" class="img-circle" alt="User Image" style="width:50px" /></td>
                                            <td><a href="profile.php?id='.$row['username'].'">'.$row['name'].$badge.'</td>';
											if($row['sex']=='male'){
											echo '<td><a href="explore.php?sex='.$row['sex'].'"><span class="label label-primary">'.$row['sex'].'</span></a></td>';
												} 
												else { 
												echo '<td><a href="explore.php?sex='.$row['sex'].'"><span class="label label-warning">'.$row['sex'].'</span></a></td>';
												}
                                          echo '  <td><a href="explore.php?location='.$row['location'].'">'.$row['location'].'</a></td>
                                            <td><a href="explore.php?major='.$row['major'].'">'.$row['major'].'</a></td>';
											
											if($row['school']=='Donald Bren School of Information and Computer Sciences'){
												echo '<td><a href="explore.php?school='.$row['school'].'">Donald Bren School of ICS</a></td>'; 
												} 
												else { 
													echo '<td><a href="explore.php?school='.$row['school'].'">'.$row['school'].'</a></td>'; 
												}
											if($row['residence']=='Middle Earth'){
 											echo '<td><a href="explore.php?residence=Middle Earth"><span class="label label-primary">'.$row['residence'].'</span></a></td>'; 
											} 
											elseif($row['residence']=="Mesa Court") { 
												echo '<td><a href="explore.php?residence=Mesa Court"><span class="label label-warning">'.$row['residence'].'</span></a></td>';
											}
											else {
												echo '<td><a href="explore.php?residence='.$row['residence'].'">'.$row['residence'].'</a></td>';
											}
											echo '<td><a href="explore.php?ethn='.$row['ethn'].'"><span class="label label-warning">'.$row['ethn'].'</span></a></td>
                                        </tr>
                                        <tr>'; } ?>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                 <div class="small-box bg-teal">
                                <div class="inner">
                                    <h3>
                                        ?
                                    </h3>
                                    <p>
                                       Click anything in the table, it should filter down to the selected category! :) Click the headers to sort by that column. 
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-alarm-outline"></i>
                                </div>
                             
                            </div>
                        </div>

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