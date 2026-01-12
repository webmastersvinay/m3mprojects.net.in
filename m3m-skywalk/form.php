<?php

$subject = 'https://www.m3mprojects.net.in/m3m-skywalk/ enquiry'; 
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
//Thanking
echo "<script language=\"javascript\" type=\"text/javascript\">
alert('Thank You!  Details Have Been Sent. We will get in touch with you at the earliest.');
window.location = \"http://$_SERVER[HTTP_HOST]\";
</script>
";
?>