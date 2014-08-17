<?
#blanked out mysql connect
#blanked out mysql db selection
$data = mysql_query("SELECT * FROM uciusers WHERE chp=0");
$sigs = mysql_num_rows($data);
echo $sigs;
?>