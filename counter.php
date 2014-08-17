<html>
<head><script src="http://code.jquery.com/jquery-1.6.4.min.js" type="text/javascript"></script>
<title>Counter | UCI '18</title>
<link rel="icon" type="image/png" href="uci.png" />
<style>
@font-face{font-family:'MyriadProSemibold';src:url('http://glorbi.com/assets/font/myriad/myriadpro-semibold_opentype-webfont.eot');src:url('http://glorbi.com/assets/font/myriad/myriadpro-semibold_opentype-webfont.eot?#iefix')format('embedded-opentype'),url('http://glorbi.com/assets/font/myriad/myriadpro-semibold_opentype-webfont.woff')format('woff'),url('http://glorbi.com/assets/font/myriad/myriadpro-semibold_opentype-webfont.ttf')format('truetype'),url('http://glorbi.com/assets/font/myriad/myriadpro-semibold_opentype-webfont.svg#MyriadProSemibold')format('svg');font-weight:normal;font-style:normal;}
h1{font-family:'MyriadProSemibold';text-shadow: 0 0 2px #333;text-align: center;letter-spacing: -3px;}
#sr{margin-top:-80px;font-family:tahoma,'lucida grande';text-shadow: 0 0 1px #333;}
h1{font-size: 180px;margin-top: 10%;}
h2{font-size:50px;font-family:'MyriadProSemibold';text-shadow: 0 0 2px #333;}
a{color:#000;text-decoration:none;}
</style>
<center>
<h1><div id="counter"></div></h1><div id="sr">Signups Received <small>(updates in real time, no need to keep refreshing!)</small></div><br><br>
<h2>Tweet with #UCI18</h2>
<h2><a href="index.php">&laquo; Signup</a></h2>
<script>
function check(){
$('#counter').load('counterdata.php', function() {
});
}
$(document).ready(function(){
check();
setInterval("check()",30000);
});
</script>