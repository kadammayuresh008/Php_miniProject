<!DOCTYPE html>
<html> 
<title>
fibonnaci program
</title>
<body align="center" style="background-color:skyblue">
  <div style="margin-left:25%;margin-right:25%">
<h1 style="background-color:blue;padding:20px;border-radius:20px;">The fibonacci-factorail calculator</h1>
<form method="POST"> 
<h3>Enter the number :</h3>
<input type="text" name="num" style="padding: 8px 15px;border-radius: 4px;"><br/>
<br/>
<input type="submit" name="sub" style="padding: 4px 15px;border-radius: 4px;background-color:blue">
</form>
<?php
if(isset($_POST['num']))
{
$num=$_POST["num"];
// FIBONACCI FUNCTION
function fibo($num){
  echo("<h4>The first ".$num." number fibonnaci series is: </h4>");
  echo("<br/>");
  $t0=1;
  $t1=1;
  echo "$t0  ";
  echo "$t1  ";
  for($i=0;$i<$num-2;$i++)
  {
    $t2=$t1+$t0;
    echo "$t2  ";
    $t0=$t1;
    $t1=$t2;
  }
  echo("<br/>");
}
fibo($num);

// FACTORIAL FUNCTION
function fact($num){
  if($num==1)
  {
    return 1;
  }
  else{
  return $num*fact($num-1);
  }
}
$x=fact($num);
echo("<h4>The factorial of ".$num." is:</h4>");
echo($x);
echo("<br/>");
echo("<br/>");
}
?>
<div>
</body>
</html>
