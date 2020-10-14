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
          <a class="nav-link" href="Task1.php">Lab1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Task2.php">Lab2<span class="sr-only">(current)</span></a>
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
</br>
<head><title>Лабораторна робота 2</title></head> 
<h2>Завдання 1 </h2>
<h6>Гральним картам присвоєні такі порядкові номери в залежності від їх величини: "валет" - 11, "дама" - 12, "король" - 13, "туз" - 14. Порядкові номери інших карт відповідають їх назвам ("сімка", "вісімка" і т. д.). Вам потрібно розробити програму, яка виводить величину карти по заданому номеру, який буде вводити користувач. </h6>
  <form  method="post">
<input type="text" size="2" name="i">
<input type="submit" value="Submut">
</form>
<?php
echo'&#9940';

$i = $_POST ['i'];

switch ($i) {
    case 6:
        echo 'Ваша карта: шість';
        echo'&#9940';
        break;
    case 7:
        echo 'Ваша карта: сім';
        echo'&#9940';
        break;
    case 8:
        echo 'Ваша карта: вісім';
        echo'&#9940';
        break;
    case 9:
        echo 'Ваша карта: дев&acuteять';
        echo'&#9940';
        break;
    case 10:
        echo 'Ваша карта: десять';
        echo'&#9940';
        break;
    case 11:
        echo 'Ваша карта: валет';
        echo'&#9940';
        break;
    case 12:
        echo 'Ваша карта: дама';
        echo'&#9940';
        break;
    case 13:
        echo 'Ваша карта: король';
        echo'&#9940';
        break;
    case 14:
        echo 'Ваша карта: туз<span>&spades;&clubs;&hearts;&diams;</span> козирний';
        echo'&#9940';
        break;
   
    default:
        echo 'Неправильний ввід або карта не вказана';
        break;
}
?>
<h2>Завдання 2</h2>
<h6>Для текстового файлу X1 визначити частоту, з якою зустрічається кожна з букв латинського алфавіту від 'a' до 'z' і цю таблицю частот записати в файл X2. </h6>
<?php
$fname = "f.txt";
$text = file_get_contents($fname);
$fd = fopen("f1.txt", 'w') or die("File don't create");
foreach (count_chars($text, 1) as $i => $val) {
   echo "There were $val instance(s) of \"" , chr($i) , "\" in the string.<br>";
    
}
foreach (count_chars($text, 1) as $i => $val) {
$str="There were $val instance(s) of  chr($i) in the string.<br>";

fwrite($fd,$str);
}
fclose($fd);
?>
<h2>Завдання 3</h2>
<h6>Розрахувати швидкість руху машини і вивести її у зрозумілому людині вигляді. Здійснити можливість виведення в км/год, м/c.
Вихідні дані: Пройдений шлях - S; Час руху - t.
Представити рішення задачі за допомогою однієї функції.
 </h6>
 <form  method="post">
<input type="text" size="2" name="S">
<input type="text" size="2" name="T">
<input type="submit" value="Submit">
</form>
 <?php
$S = $_POST ['S'];
$T = $_POST ['T'];
$V=$S/$T;
$V1=$V*1000/3600;
echo"Speed: $V km/god <br>";
echo"Speed: $V1 m/c";
?>
<h2>Завдання 4</h2>
<h6>Вмістом вхідного файлу є деяка послідовність символів. Потрібно переписати ці символи в вихідний файл, викидаючи при цьому символи, розташовані між дужками (,). Самі дужки також викидаються. Передбачається, що всередині кожної пари дужок немає інших дужок. </h6>
<?php
$fname = "file.txt";
$text = file_get_contents($fname);
$fd = fopen("file1.txt", 'w') or die("File don't create");
echo "$text <br>";
function rrr($text){
  $word = strstr($text, '(', true); 
  $d = strstr($text, ')');
  $d1 = strstr($text, '(');
  $q = str_replace(array(')'),'',trim($d));
  return "$word $q";
  }

echo rrr($text);



fwrite($fd,rrr($text));
fclose($fd);
?>

<h2>Завдання 5</h2>
<h6>Створіть скрипт, який здійснює підрахунок кількості строк в файлах проекту. Скрипт повинен обходити всі вложені каталоги проекту і підраховує кількість строк у файлах проекту з визначеним розширенням. </h6>
<?php
$dir="D:\PHPP\OpenServer\domains\Lab1";
$result = [];

initialize();
calculation($dir);
print_results();

function initialize() {
  global $result;
  foreach (associations() as $type => $assoc) {
    foreach ($assoc as $ext) {
      $result[$type][$ext] = 0;
    }
  }
}

function calculation($dir) {
  foreach (scandir($dir) as $filename) {
    $file = $dir . '/' . $filename;
    // Recursive processing directories.
    if (is_dir($file)) {
      // Exclude current and parent directory.
      if (!in_array($filename, ['.', '..'], TRUE)) {
        calculation($file);
      }
    }
    // Fix for Windows.
    elseif ($filename != 'desktop.ini') {
      counting($file, $filename);
    }
  }
}

function associations() {
  return [
    'Text' => ['txt', 'csv', 'md'],
    'PHP' => ['php'],
    'JavaScript' => ['js', 'coffee'],
    'CSS' => ['css', 'sass', 'scss', 'less'],
    'Images' => ['jpg', 'jpeg', 'gif', 'png', 'ico', 'icon'],
  ];
}

function get_type($filename) {
  $ext = get_extension($filename);
  $type = NULL;
  foreach (associations() as $assoc => $ext_list) {
    if (in_array($ext, $ext_list)) {
      $type = $assoc;
      break;
    }
  }

  return [
    'type' => $type ?: 'Other',
    'ext' => $ext,
  ];
}

function get_extension($filename) {
  if (strpos($filename, '.') !== FALSE) {
    $ext_parts = explode('.', $filename);
    $ext = end($ext_parts);
  }
  else {
    $ext = $filename;
  }
  return strtolower($ext);
}

function counting($file, $filename) {
  global $result;
  $assoc = get_type($filename);
  $type = $assoc['type'];
  $ext = $assoc['ext'];
  if (isset($result[$type])) {
    $result[$type][$ext] += count(file($file));
  }
  else {
    $result['Other'][$ext] = count(file($file));
  }
}

function count_by_type() {
  global $result;
  $count_by_type = [
    'total' => 0,
  ];
  foreach ($result as $type => $sizes) {
    $count_by_type[$type] = 0;
    foreach (array_filter($sizes) as $ext => $size) {
      $count_by_type[$type] += $size;
      $count_by_type['total'] += $size;
    }
  }
  return $count_by_type;
}

function print_results() {
  global $result;
  $count_by_type = count_by_type();

  print 'Total: ' . $count_by_type['total'];
  print '<ul>';
  foreach ($result as $type => $sizes) {
    print '<li>' . $type . ' - ' . $count_by_type[$type] . '<ul>';
    foreach (array_filter($sizes) as $ext => $size) {
      print '<li>' . $ext . ' - ' . $size;
    }
    print '</ul></li>';
  }
  print '</ul>';
}