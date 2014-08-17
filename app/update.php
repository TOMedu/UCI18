<?php
  // Remember to copy files from the SDK's src/ directory to a
  // directory in your application on the server, such as php-sdk/
  require_once('../../glorbi.com/fb/src/facebook.php');

  $config = array(
#fb appid & secret
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
	
$major = $_POST['major'];
$school = $_POST['school'];
$residence = $_POST['residence'];
$bio = mysql_real_escape_string($_POST['bio']);
$ethn = $_POST['ethn'];
$location = $_POST['location'];
 if($user!=""){
#db connect & select
mysql_query("UPDATE uciusers SET major='$major', school='$school', residence='$residence', bio='$bio',ethn='$ethn', location='$location' WHERE username='$username'");
		echo '<meta http-equiv="refresh" content="0; url=index.php" />';
}
?>