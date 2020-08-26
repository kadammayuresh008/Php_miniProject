<html> 
<title>
fibonnaci program
</title>
<body>
<?php
echo "hello world!!!!<br/>";
echo "My first php program<br/>";
function fibo($num){
  echo("The first ".$num." number fibonnaci series is: ");
  echo("<br/>");
  $t0=1;
  $t1=1;
  echo "$t0 ";
  echo "$t1 ";
  for($i=0;$i<$num-2;$i++)
  {
    $t2=$t1+$t0;
    echo "$t2 ";
    $t0=$t1;
    $t1=$t2;
  }
  echo("<br/>");
}
$arr=array(6,8,9,10);
foreach($arr as $value)
{
  fibo($value);
}
echo("<br/>");
?>
</body>
</html>
