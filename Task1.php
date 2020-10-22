<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">PHP(</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Task1.php">Lab1<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Task2.php">Lab2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Task3.php">Lab3</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
<head><title>Лабораторна робота 1</title></head> 
<h2>Завдання 1 </h2>
<?php 
$a=-5.69;
$b=9.2;
$res=null;

$res=(sqrt($a+pow($b,2)))/(sin($b)-pow((cos($b)),2)+6*tan(pow($a,2)));
print_r($res)
?>

<h2>Завдання 2</h2>
<h6>Задано натуральне число n. Скласти програму, яка знаходить суму m перших цифр числа n та суму m останніх цифр числа n.</h6>
<h4> 123456</h4>
<h4> m=2</h4>
<?php 
$str = '123456';
$m=2;
for($i = $m, $cnt = strlen($str) - 1, $sum = $str[0]; $i < $cnt; ++$i, $sum += $str[$i]);
for($q = $m+2, $cnt = strlen($str)-1, $sum1 = $str[0]; $q< $cnt; ++$q, $sum1 += $str[$q]);
echo $sum-1;
echo nl2br ("\n");
echo $sum1-1;
echo nl2br ("\n");
?>

<h2>Завдання 3</h2>
<h6>В одновимірному числовому масиві всі додатні числа замінити нулями.</h6>
<h4>0,-6,7,8,-7,9</h4>
<?php 
$arr = array(0,-6,7,8,-7,9);
for($i=0;$i<=count($arr);$i++)
  {
    if($arr["$i"]>0) $arr["$i"]='0';
  }
  print_r($arr);
  echo nl2br ("\n");
?>

<h2>Завдання 4</h2>
<h6>Всі від’ємні елементи масиву MN(8,4) замінити їх квадратами.</h6>
<?php 
$two_dimensional_array = array();
 
for ($c = 0; $c < 8; $c++):
  for ($r = 0; $r < 4; $r++):
    $two_dimensional_array[$c][$r] = rand(-20, 20);
  endfor;
endfor;
 
echo '<pre>';
print_r($two_dimensional_array);
echo '<pre>';

for ($c = 0; $c < 8; $c++):
    for ($r = 0; $r < 4; $r++):
  if($two_dimensional_array[$c][$r] <0)
  $two_dimensional_array[$c][$r]='*';
    endfor;
endfor;

echo '<pre>';
print_r($two_dimensional_array);
echo '<pre>';
?>

<h2>Завдання 5</h2>
<h6>Знайти різницю мінімальних елементів масивів A(7) та B(7).</h6>
<h4>Array 1:[12, 8, 182, 6, 14,77,33] </h4>
<h4>Array 2: [3, 2, 280, 233, 11,99,123] </h4>
<div  style="font-size:25px;">
<?php 

$arr=array();
$arr1 =array();
$min = null;
$min1 = null;
$res=null;
for($i = 0; $i < 10; $i++)
{
 $arr[$i]= rand(-20,20);
}
print_r($arr);
for($i = 0; $i < 10; $i++)
{
 $arr1[$i]= rand(-20,20);
}
print_r($arr1);
for($i = 0; $i < count($arr); $i++)
{
    if($arr[$i] < $min or $min === null)
    {
        $min = $arr[$i];
        
    }
}
for($i = 0; $i < count($arr1); $i++)
{
    if($arr1[$i] < $min1 or $min1 === null)
    {
        $min1 = $arr1[$i];
       
    }
}
$res=$min-$min1;

echo "Min value on first array: $min <br>";
echo "Min value on second array: $min1 <br>";
echo "Resualt : $res <br>";
?>




<h2>Завдання 6</h2>
<h6>Дано послідовність слів. Надрукувати всі слова послідовності,  що зустрічаються у ній один раз. </h6>
<h5>text: Qwe rty rty 123 lll 123</h5>
<div>
<?php 
setlocale(LC_ALL, '');
$text = "Qwe rty rty 123 lll 123 ";

function getUniques($text, $nOrigWords=false)
 {
  $words = preg_split("/([^[:alnum:]]|['-])+/s", $text);
  $nOrigWords = count($words);
  $words = array_unique($words);
  return $words;
}
$uniq = getUniques($text, $nOrig);

echo "New word: ".count($uniq)."<hr>";
echo "words : $words<br>";
echo join(" ", $uniq);

?>

</div>