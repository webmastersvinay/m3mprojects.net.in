<?php
$project = 'M3M Tee Point';

$hostname = "Localhost";
$username = "trumptow_seo";
$password = "Time2020";
$dbname = "trumptow_100acress_responses";
$usertable = "website_responses";

$con = mysqli_connect($hostname, $username, $password, $dbname);

$name = $_POST['Name'];
$mobile = $_POST['Mobile'];
$email = $_POST['Email'];

if(empty($name)){
	die("Invalid Access");
}
else{

$res = "INSERT INTO `website_responses` (`name`,`mobile`,`email`,`project`) VALUES ('$name','$mobile','$email','$project')";
$sql = mysqli_query($con, $res);


mysqli_close($con);


$subject = $project; 
$emailadd = 'query@aadharhomes.com'; 
$url = 'index.html'; 
$req = '1'; 

$text = "Results from form:\n\n"; 
$space = ' ';
$line = '
';
foreach ($_POST as $key => $value)
{
if ($req == '1')
{
if ($value == '')
{echo "$key is empty";die;}
}
$j = strlen($key);
if ($j >= 20)
{echo "Name of form element $key cannot be longer than 20 characters";die;}
$j = 20 - $j;
for ($i = 1; $i <= $j; $i++)
{$space .= ' ';}
$value = str_replace('\n', "$line", $value);
$conc = "{$key}:$space{$value}$line";
$text .= $conc;
$space = ' ';
}
mail($emailadd, $subject, $text, 'From: '.$emailadd.'');
}
?>
