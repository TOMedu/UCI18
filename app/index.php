<?php
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
    ?>
<!DOCTYPE html>
<html>
    <head>
       <?php include_once("a.php") ?>

        <meta charset="UTF-8">
        <title>Dash | UCI Class of 2018</title>
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
                        <li class="active">
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
					<p><br>Please fill up your profile below. :)</p>
                </section>

                <section class="content">
				<div id="ad"> <!-- adsense block, because why not right? :P -->
<script type="text/javascript"><!--
google_ad_client = "";
/* UCI18 */
google_ad_slot = "";
google_ad_width = 300;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<form action="update.php" method="post">
<table>
<tr><td>Name: </td>
<td><input type="text" value="<?php echo $name; ?>" readonly></td>
</tr>
<tr><td>Major: </td><td>
<select name="major">
<?php
$usermajor = mysql_query("SELECT * FROM uciusers WHERE username='$username'");
if(mysql_num_rows($usermajor)===1){
$userarray = mysql_fetch_assoc($usermajor);
$userschool = $userarray['school'];
$userethn = $userarray['ethn'];
$userres = $userarray['residence'];
$userbio = $userarray['bio'];
$userloc = $userarray['location'];
if($userarray['major']!=""){
echo "<option value='".$userarray['major']."'>".$userarray['major']."</option>";
} else {
echo "<option value=''>--PLEASE SELECT--</option>";
}
}

$majorsq = mysql_query("SELECT * FROM ucimajors");
while($result = mysql_fetch_array($majorsq)){
echo "<option value='".$result['major']."'>".$result['major']."</option>";
} ?>
</select></td></tr>
<tr><td>School: </td><td>
<select name="school">
<?php
if($userschool!=""){
echo "<option value='".$userschool."'>".$userschool."</option>";
} else {
echo "<option value=''>--PLEASE SELECT--</option>";
}
?>
<option value='Claire Trevor School of Arts'>Claire Trevor School of Arts</option>
<option value='School of Biological Sciences'>School of Biological Sciences</option>
<option value='The Paul Merage School of Business'>The Paul Merage School of Business</option>
<option value='School of Education'>School of Education</option>
<option value='School of Humanities'>School of Humanities</option>
<option value='The Henry Samueli School of Engineering'>The Henry Samueli School of Engineering</option>
<option value='Donald Bren School of Information and Computer Sciences'>Donald Bren School of Information and Computer Sciences</option>
<option value='School of Law'>School of Law</option>
<option value='School of Medicine'>School of Medicine</option>
<option value='Program in Nursing Science'>Program in Nursing Science</option>
<option value='Department of Pharmaceutical Sciences'>Department of Pharmaceutical Sciences</option>
<option value='Program in Public Health'>Program in Public Health</option>
<option value='School of Social Ecology'>School of Social Ecology</option>
<option value='School of Social Sciences'>School of Social Sciences</option>
<option value='Undecided/Undeclared'>Undecided/Undeclared</option>
<option value='School of Physical Sciences'>School of Physical Sciences</option>
</select></td></tr>

<tr><td>Residence: </td><td>
<select name="residence">
<?php
if($userres!=""){
echo "<option value='".$userres."'>".$userres."</option>";
} else {
echo "<option value=''>--PLEASE SELECT--</option>";
}
?>
<option value='Middle Earth'>Middle Earth</option>
<option value='Mesa Court'>Mesa Court</option>
<option value='Off Campus'>Off Campus</option>
<option value='Other'>Other</option>


<tr><td>Current Location: </td><td>
<?php
$ip = $_SERVER['REMOTE_ADDR'];
$xml_loc = file_get_contents('http://api.ipinfodb.com/v3/ip-city/?key=XXX&ip='.$ip);
function xmldecode($txt)
{
	$txt2 = explode(";", $txt);
	$txt = $txt2[4];
	$txt = ucwords(strtolower($txt));
    	return $txt;
}
$blah = xmldecode($xml_loc); 
if($userloc!=""){
echo "<input type='text' name='location' placeholder='Where do you live now?' value='".$userloc."'>";
} else { 
echo "<input type='text' name='location' placeholder='Where do you live now?' value='".$blah."'>";
}
?>

<?php if($userbio==""){ echo '
<tr><td>Bio:</td><td>
<textarea name="bio" style="width:550px;height:300px;" placeholder="Your bio. Tell your classmates about yourself. Who are you? What are your interests?"></textarea>
';
} else {
echo ' 
<tr><td>Bio:</td><td>
<textarea id="bio" name="bio" style="width:550px;height:300px;" placeholder="Your bio. Tell your classmates about yourself. Who are you? What are your interests?">'.$userbio.'</textarea>
';
}
?>

</td></tr><tr><td>Ethnicity: </td><td><select name="ethn"> 
<?php
if($userethn!=""){
echo "<option value='".$userethn."'>".$userethn."</option>";
} else {
echo "<option value=''>--PLEASE SELECT--</option>";
}
?>
<option value="Asian">Asian</option>
<option value="Caucasian">Caucasian</option>
<option value="African American">African American</option>
<option value="Hispanic">Hispanic</option>
<option value="Other">Other</option>
</select>
</td></tr><tr><td>
<input type="submit" value="Update"></td><td></td></tr>
</form>       
</table>
<br><br><br>
                 <div class="small-box bg-teal">
                                <div class="inner">
                                    <h3>
                                        Welcome!
                                    </h3>
                                    <p>
                                     Hopefully you guys are excited for school in the fall, I know I am! Check out "Classes" on the left, where you put in the classes you take and meet your classmates!
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