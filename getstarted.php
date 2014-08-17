<?php
  require_once('../glorbi.com/fb/src/facebook.php');

  $config = array(
    'appId' => '', #facebook API ID
    'secret' => '', #facebook API secret
    'allowSignedRequest' => false // optional but should be set to false for non-canvas apps
  );

  $facebook = new Facebook($config);
  $user_id = $facebook->getUser();
    if($user_id) {
      try {

        $user_profile = $facebook->api('/me','GET');
        $username = $user_profile['username'];
        $name = $user_profile['name'];
        $gender = $user_profile['gender'];
        $today = date("Y-m-d");
        $picture = "http://graph.facebook.com/".$username."/picture?width=200&height=200";
        $fb = "http://facebook.com/".$username;
#blanked out mysql connection
#blanked out mysql db selection
        $qcheck = mysql_query("SELECT * FROM uciusers WHERE username='$username'");
        if(mysql_num_rows($qcheck)===0){
		#blanked out db struct below, don't want no sqli!
        mysql_query("INSERT INTO uciusers ( ) VALUES('')") or die(mysql_error());
		        echo '<meta http-equiv="refresh" content="0; url=app/index.php" />';

        }
        else { 
        echo '<meta http-equiv="refresh" content="0; url=app/index.php" />';
        }
      } catch(FacebookApiException $e) {
        $login_url = $facebook->getLoginUrl(); 
        echo '<meta http-equiv="refresh" content="0; url='.$login_url.'" />';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {
      $login_url = $facebook->getLoginUrl();
        echo '<meta http-equiv="refresh" content="0; url='.$login_url.'" />';

    }
$user = $facebook->getUser();
    if ($user) {
    }
    ?>
<!doctype html>
<html>
<head>
<title>Auth | UCI Class of 2018</title>
<link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<style>
html { 
  background: url(bg.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  overflow:hidden;
}
#authorize{
background:url('http://feelgood.glorbi.com/img/authorize.png');
height:67px;width:280px;
background-size:280px 67px;
background-repeat:no-repeat;
opacity:0.8;
left:50%;
margin-left:-140px;
top:50%;
margin-top:-33.5px;
position:absolute;
cursor:pointer;
cursor:pointer;
}
#authorize:hover,#authorize:active{
opacity:1;
}
h1{
font-family:'Arvo';
color:#2c2c2c;}
#content{
position: absolute;
top: 100px;
left: 10%;
width: 80%;
height: 100%;
background-color: #fafafa;
border-radius: 3p
box-shadow: 0 0 20px #333;
text-indent:20px;}
</style>
  <body>

<div id="menu">

</div>
<div id="content">
<h1>Please wait...</h1>
</div>
  </body>
</html>