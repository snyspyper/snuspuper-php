<head>
    <title>Учи-мучи гачимучи</title>
</head>
<body leftmargin="50" rightmargin="50" topmargin="20">
<font size="+1" face="serif">
<h2>if</h2>



<h2>switch</h2>
Тут в коде можно поменять число
<?php
//echo "Введите ц/ч: ";
//fscanf(STDIN, "%d\n", $num);
$num = 0;
switch ($num)
{
    case 0:
        echo "ZERO";
        break;
    case 1:
        echo "No one";
        break;
    case 2:
        echo "Second Life";
        break;
    case 3:
        echo "ACTO TRHEE FREEZO";
        break;
    default:
        echo "NO";
        break;
}
echo PHP_EOL;
echo "<br>";
?>


<h2>циклы(for, foreach, while)</h2>
<pre>
    <?php
    for ($i = 0; $i <= 100; $i++)
    {
        echo (string)$i . " ";
    
        if ($i % 10 == 0)
        {
            echo PHP_EOL;
        }
    }
    echo "<br>" . PHP_EOL;

    echo "Foreach работает только с массивами и объектами. Иначе генерит ошибку";
    echo PHP_EOL;
    echo PHP_EOL;
    echo "Для того, чтобы изменять массив внутри цикла, надо поставить &.";
    echo PHP_EOL;
    echo "Однако, после этого надо разорвать ссылку, так как она остаётся <br>после окончания цикла. Для этого надо использовать конструкцию unset(\$value)";
    echo PHP_EOL;
    echo PHP_EOL;

    $arr = array(1, 2, 3, 4, 5);

    foreach ($arr as &$value)
    {
        $value *= 20;
    }
    var_dump($arr);
    echo PHP_EOL;

    foreach ($arr as $key => $value)
    {
        echo "{$key} => {$value} ";
        print_r($arr);
    }

    ?>

</pre>

<h2>Базовые алгоритмы: сортровка, поиск минимума и максимума, циклический сдвиг</h2>
<?php

?>
</font>
</body>
