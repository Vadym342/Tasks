<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Task1.php">Lab1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Task2.php">Lab2</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Task3.php">Lab3<span class="sr-only">(current)</span></a>
              </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>


     <h6>4.	У HTML формі користувач вводить в чотири різні поля: прізвище, ім'я, вік і e-mail. Після натискання клавіші кнопки ГОТОВО створюється об'єкт користувача, з методом, який вносить ці дані в поле об'єкту і далі виводить їх використовуючи другий метод класу користувача. </h6>
<form method='post'>
 <input type="text" name="Name" minlength="1" size="40" maxlength="35" value="Name:">
 </br>
 <input type="text" name="Surname" minlength="1" size="40" maxlength="35" value="Surname:">
 </br>
 <input type="text" name="Email" minlength="1" size="40" maxlength="35" value="Email:">
 </br>
 <input type="text" name="Age" minlength="1" size="40" maxlength="35" value="Age:">
 </br>
 <input type='submit' name="Submit" value='Send'>
</form>
<?php 

class User
{
public $name;
public $surname;
public $email;
public $age;

public function filll($Name,$Surname,$Email,$Age)
{
$this->name=$Name;
$this->surname=$Surname;
$this->email=$Email;
$this->age=$Age;
}
public function printt()
{
echo "$this->name <br>";
echo "$this->surname <br>";
echo "$this->email <br>";
echo "$this->age <br>";
}

}
$User=new User;
$Name=$_POST['Name'];
$Surname=$_POST['Surname'];
$Email=$_POST['Email'];
$Age=$_POST['Age'];
$User->filll($Name,$Surname,$Email,$Age);
$User->printt();
?>






<h6>Необхідно реалізувати метод (функцію), яка згенерує HTML сторінку по заданих параметрах. На вхід подається двовимірний масив такого вигляду </h6>


      <?php

function renderTable(int $row, int $col, string $width, string $height, array $styles): string {

    $isSquare = $row === $col;
    $amountCell = $row * $col;
    $cellStyles = [];

    foreach ($styles as &$style) {
        $cells = array_flip(array_map('intval', explode(',' , $style['cells'])));
        unset($style['cells']);

        // find out the cells for vertical skip
        $rowSpanData = [];
        $skipRow = [];
        foreach ($cells as $cellNumber => $noNeedValue) {
            $rowSpanCounter = 1;
            for ($counterRow = 1, $counterRowCell = $row + $cellNumber; $counterRow < $row; $counterRow++, $counterRowCell += $row) {
                if (isset($cells[$counterRowCell])) {
                    $rowSpanData[$cellNumber] = ++$rowSpanCounter;
                    $skipRow[$counterRowCell] = true;
                }
            }

        }

        // find out the cells for the horizontal skip and add the vertical skip
        $colSpanCellNumber = null;
        $colSpanCounter = 1;

        foreach ($cells as $cellNumber => $noNeedValue) {
            $cellStyles[$cellNumber] = $style;
            $cellStyles[$cellNumber]['needSkip'] = true;
            if (isset($cells[$cellNumber + 1])) {
                $colSpanCounter++;
                if ($colSpanCellNumber === null) {
                    $colSpanCellNumber = $cellNumber;
                }

                if (!isset($skipRow[$cellNumber + 1])) {
                    $skipRow[$cellNumber + 1] = true;
                }
            } else {
                $colSpanCounter = 1;
                $colSpanCellNumber = null;
            }

            if (!isset($skipRow[$cellNumber])) {
                if ($colSpanCounter > 1) {
                    $cellStyles[$colSpanCellNumber]['colSpan'] = $colSpanCounter;
                    $cellStyles[$colSpanCellNumber]['needSkip'] = false;
                }

                if (isset($rowSpanData[$cellNumber])) {
                    $cellStyles[$cellNumber]['rowSpan'] = $rowSpanData[$cellNumber];
                    $cellStyles[$cellNumber]['needSkip'] = false;

                }
            }
        }
    }

    unset($style);

    //print table
    $tr = [];

    $countCell = 1;

    for ($indexRow = 1; $indexRow <= $row; $indexRow++) {
        $td = [];
        for ($indexCol = 1; $indexCol <= $col; $indexCol++) {
            $tdStyle = '';
            $needSkip = false;
            if (isset($cellStyles[$countCell])) {
                $needSkip = $cellStyles[$countCell]['needSkip'];
                $cellStyle = $cellStyles[$countCell];
                $tdStyle = sprintf(
                    ' style="color:%s; background-color: %s;" valign="%s" align="%s"%s%s',
                    $cellStyle['color'],
                    $cellStyle['bgcolor'],
                    $cellStyle['valign'],
                    $cellStyle['align'],
                    isset($cellStyle['colSpan']) ? " colspan=\"{$cellStyle['colSpan']}\"" : '',
                    isset($cellStyle['rowSpan']) ? " rowspan=\"{$cellStyle['rowSpan']}\"" : ''
                );
            }

            if (!$needSkip) {
                $td[] = sprintf('<td%s>%s</td>', $tdStyle, $countCell);
            }
            $countCell++;
        }

        $tr[] = sprintf('<tr>%s</tr>', implode('', $td));
    }

    $table = sprintf(
        '<table width="%s" height="%s" border="3">%s</table>',
        $width,
        $height,
        implode('', $tr)
    );

    return $table;
}

$styles1 = [
    [
        'text'    => 'Текст червоного кольору в клітинках 1, 2, 4 и 5',
        'cells'   => '1,2,4,5',
        'align'   => 'center',
        'valign'  => 'center',
        'color'   => 'FF0000',
        'bgcolor' => '0099FF',
    ],
    [
        'text'    => 'Текст зеленого цвета',
        'cells'   => '8,9',
        'align'   => 'right',
        'valign'  => 'bottom',
        'color'   => '00FF00',
        'bgcolor' => 'FFFFFF',
    ],
];

echo renderTable(3, 3, 300, 300, $styles1);

$styles = [
    [
        'text'    => 'Текст красного цвета в колонках 2 и 5',
        'cells'   => '2,5',
        'align'   => 'center',
        'valign'  => 'center',
        'color'   => 'FF0000',
        'bgcolor' => '0099FF',
    ],
];

echo renderTable(3, 3, 300, 300, $styles);


?>

</body>
</html>