<?php
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
#db connec & select
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
        <meta charset="UTF-8">
           <?php include_once("a.php") ?>

        <title>Stats | UCI Class of 2018</title>
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
width:120px;
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
                        <li class="">
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
                         <li class="active">
                            <a href="#">
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
					<p><br>Here are some stats about UCI's Class of 2018! <br><br><?php 
					$num = file_get_contents("http://uci.karankanwar.me/counterdata.php");
					echo "The sample size of the data collected below is <b>$num</b> (large percentage have not completed information) out of approx ~4000 yearly entrants to UCI / ~2500 FB group members. More data from previous years can be found <a href='http://www.assessment.uci.edu/undergraduate/documents/NHS_Enrollments_F07_to_F11_000.pdf'>here</a><br><br>";
					echo "<b>Top 3 most popular male names</b><br>";
					$mnameq = mysql_query("SELECT  name, COUNT(*) totalCount
FROM    uciusers
WHERE sex='male' AND chp=0
GROUP   BY SUBSTRING_INDEX(name,' ',1)
ORDER   BY 
	totalCount 	DESC,
	id 			ASC
LIMIT 0,3");
while($mf = mysql_fetch_array($mnameq)){
$mfn = explode(" ",$mf['name']);
echo $mfn[0]."        ";
}
					echo "<br><br><b>Top 3 most popular female names</b><br>";

					$fnameq = mysql_query("SELECT  name, COUNT(*) totalCount
FROM    uciusers
WHERE sex='female' AND chp=0
GROUP   BY SUBSTRING_INDEX(name,' ',1)
ORDER   BY 
	totalCount 	DESC,
	id 			ASC
LIMIT 0,3");
while($nf = mysql_fetch_array($fnameq)){
$ffn = explode(" ",$nf['name']);
echo $ffn[0]."        ";
}
					?>
					</p>

                </section>

                <section class="content">
				<div id="ad">
				<script type="text/javascript"><!--
google_ad_client = "";
/* UCI182 */
google_ad_slot = "";
google_ad_width = 120;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
				 <script type="text/javascript" src="//www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
	
	<!-- NO 1 -->
	    <script type="text/javascript">
      function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
		          ['Sex', 'Frequency'],

<?php
$mainquery = mysql_query("SELECT  sex, COUNT(*) totalCount
FROM    uciusers WHERE chp=0
GROUP   BY sex");
while($row=mysql_fetch_array($mainquery)){
echo "['".ucwords($row['sex'])."', ".$row['totalCount']."],\n";
}
?>
          ['Mixed', 0]
        ]);
      
        // Create and draw the visualization.
        new google.visualization.PieChart(document.getElementById('visualization0')).
            draw(data, {title:"UCI '18 Sex Distribution"});
      }
      

      google.setOnLoadCallback(drawVisualization);
    </script>
    <div id="visualization0" style="width: 900px; height: 400px;"></div>
	
	<!-- NO 1.5 -->
    <script type="text/javascript">
      function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
		          ['Ethnicity', 'Frequency'],

<?php

$mainquery = mysql_query("SELECT  ethn, COUNT(*) totalCount
FROM    uciusers WHERE chp=0
GROUP   BY ethn
LIMIT 1,20");
while($row=mysql_fetch_array($mainquery)){
echo "['".$row['ethn']."', ".$row['totalCount']."],\n";
}
?>
          ['Mixed', 0]
        ]);
      
        // Create and draw the visualization.
        new google.visualization.PieChart(document.getElementById('visualization')).
            draw(data, {title:"UCI '18 Ethnicity Distribution"});
      }
      

      google.setOnLoadCallback(drawVisualization);
    </script>
    <div id="visualization" style="width: 900px; height: 400px;"></div>
	
	<!-- NO 2 -->
	
<script type="text/javascript">
      function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
		          ['School', 'Frequency'],

<?php

$mainquery = mysql_query("SELECT  school, COUNT(*) totalCount
FROM    uciusers WHERE chp=0
GROUP   BY school
LIMIT 1,50");
while($row=mysql_fetch_array($mainquery)){
echo "['".$row['school']."', ".$row['totalCount']."],\n";
}
?>
          ['Mixed', 0]
        ]);
      
        // Create and draw the visualization.
        new google.visualization.PieChart(document.getElementById('visualization2')).
            draw(data, {title:"UCI '18 School Distribution"});
      }
      

      google.setOnLoadCallback(drawVisualization);
    </script>
    <div id="visualization2" style="width: 900px; height: 400px;"></div>
	
	<!-- NO 3 -->
	<script type="text/javascript">
      function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
		          ['Major', 'Frequency'],

<?php

$mainquery = mysql_query("SELECT  major, COUNT(*) totalCount
FROM    uciusers WHERE chp=0
GROUP   BY major
LIMIT 1,600");
while($row=mysql_fetch_array($mainquery)){
echo "['".$row['major']."', ".$row['totalCount']."],\n";
}
?>
          ['Mixed', 0]
        ]);
      
        // Create and draw the visualization.
        new google.visualization.PieChart(document.getElementById('visualization3')).
            draw(data, {title:"UCI '18 Major Distribution"});
      }
      

      google.setOnLoadCallback(drawVisualization);
    </script>
    <div id="visualization3" style="width: 900px; height: 400px;"></div>
	
	<!-- NO 4 -->
	
		<script type="text/javascript">
      function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
		          ['Residence', 'Frequency'],

<?php
$mainquery = mysql_query("SELECT  residence, COUNT(*) totalCount
FROM    uciusers WHERE chp=0
GROUP   BY residence
LIMIT 1,20");
while($row=mysql_fetch_array($mainquery)){
echo "['".$row['residence']."', ".$row['totalCount']."],\n";
}
?>
          ['Mixed', 0]
        ]);
      
        // Create and draw the visualization.
        new google.visualization.PieChart(document.getElementById('visualization4')).
            draw(data, {title:"UCI '18 Residence Distribution"});
      }
      

      google.setOnLoadCallback(drawVisualization);
    </script>
    <div id="visualization4" style="width: 900px; height: 400px;"></div>

<!-- NO 5/6 -->

		<script type="text/javascript">
      function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
		          ['Location', 'Frequency'],

<?php
#db connect & select
$mainquery = mysql_query("SELECT  location, COUNT(*) totalCount
FROM    uciusers WHERE chp=0
GROUP   BY location
LIMIT 1,100");
while($row=mysql_fetch_array($mainquery)){
echo "['".$row['location']."', ".$row['totalCount']."],\n";
}
?>
          ['Mixed', 0]
        ]);
      
        // Create and draw the visualization.
        new google.visualization.PieChart(document.getElementById('visualization5')).
            draw(data, {title:"UCI '18 Location Distribution"});
      }
      

      google.setOnLoadCallback(drawVisualization);
    </script>
    <div id="visualization5" style="width: 900px; height: 400px;"></div>
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