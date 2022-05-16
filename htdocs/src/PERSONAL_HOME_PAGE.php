<head>
    <title>Учи-мучи гачимучи</title>
</head>

<body leftmargin="50" rightmargin="50" topmargin="20">
<font size="+1" face="serif">

<h2>Немного основ синтаксиса</h2>
<p>
    PHP ищет открывающийся тэг php, затем обрабатывает и выполняет содержимое, до закрывающего тега. Потом он просто выводит всё, до следующего <br>
    тега php. Причём(надо посмотреть исходный код страницы):<br>
    <?php $flg = false;?>
    <?php if ($flg):   ?>
        Эта строчка отображается, так как условие истинно <br>
    <?php else:        ?>
        Эта строчка отображается в противном случае <br>
    <?php endif;       ?>
    <!-- так эффективнее  --!>
</p>
<p>
    Так же, последний php-тег стоит опускать, например, при использовании <u>include</u> или <u>require</u>... Я не знаю, зачем это.
</p>


<h2>Типы</h2>
<p>
    PHP поддерживает десять типов:
    <ul type="disk">
        <li> <b>Скалярные:</b> <ul>
            <li>bool</li>
            <li>int</li>
            <li>float</li>
            <li>string</li> </ul>
        </li>
        <li> <b>Смешанные</b> <ul>
            <li>array</li>
            <li>object</li>
            <li>callable</li>
            <li>iterable</li> </ul>
        </li>
        <li> <b>Специальные</b> <ul>
            <li>resource</li>
            <li>NULL</li> </ul>
        </li>
    </ul>
    Чтобы проверить тип и значение какого-либо выражения, нужно использовать <font color="magenta">var_dump()</font>, чтобы вывести только тип - <font color="magenta">gettype()</font>,<br>
    А чтобы проверить на определённый тип - <font color="magenta">is_type</font></br>
    <pre>
        <?php
        $a_bool = true;
        $b_int  = 13;
        $c_word = "word";

        echo "\r" . gettype($a_bool) . PHP_EOL;

        if (is_string($b_int))
            echo "Это строка";
        elseif (is_int($b_int))
            echo "Это число";
        else
            echo "Не знамо шо це";
        echo PHP_EOL;

        ?>
    </pre>
    Для принудительного приведения типа можно использовать функцию <font color="magenta">settype()</font>.
</p>

<h3>bool</h3>
<p>
    Поддерживает два значения: <font color="green">true</font> и <font color="green">false</font>. Причем, эти значения <i>не</i> регистрозависимые.<br>
    При преобразовании в bool, следующие значения рассматриваются как <font color="green">false</font>:<br>
    <ul type="disk">
        <li><font color="orange">0</font> и <font color="orange">-0</font></li>
        <li><font color="orange">0.0</font> и <font color="orange">-0.0</font></li>
        <li>пустая строка или <font color="orange">"0"</font></li>
        <li>массив без элементов</li>
        <li><font color="orange">NULL</font></li>
        <li>Объекты SimpleXML, не имеющих ни дочерних элементов, ни атрибутов</li>
    </ul>

    Все остальные значения рассматриваются как <font color="green">true</font>.
</p>

<h3>int</h3>
<p>
    Целые числа можно указать как в десятичной системе, так и в 16/8/2-ой.<br>
    Для записи двоичного числа, перед ним ставится <font color="orange">0b</font>, для восьмеричного - <font color="orange">0</font>, шестнадцатеричного - <font color="orange">0x</font>.
    <pre>
        <?php
        $a = array(0xAF, 123, 0b1010001, 017230);
        echo "\rПосмотрите тут код страницы\n";
        foreach($a as $key => $value)
        {
            echo "{$value}" . PHP_EOL;
        }

        ?>
    </pre>
    Начиная с PHP 7.4.0, ц/ч литералы могут поддерживать знак <font color="orange"><b>_</b></font> для наглядного обозначения.
</p>
<p>
    Также, если произойдёт переполнение числа, то оно сконвертируется в <font color="magenta">float</font>.<br>
    В PHP нет оператора целочисленного деления, результат операции <font color="orange">5/2</font> будет типа <font color="orange">float(2.5)</font>.<br>
    Для ц/ч деления есть функция <font color="magenta">intdiv()</font>.
</p>
<p>
    <font color="green">false</font> преобразуется в <font color="orange">0</font>.<br>
    <font color="green">true</font> - <font color="orange">1</font>.<br>
    <font color="green">NaN</font> и <font color="green">Infinity</font> становятся равным нулю.<br>
    Если строка не пустая и в ней содержится само число или оно хотя бы является ведущим<br>
    (<font color="orange">"1234"</font>, <font color="orange">"123z"</font>), то оно преобразуется в то же число. Иначе, значение будет нулём.
    <pre>
        <?php
        $x = 
        [
            (int)"123xxx",
            (int)"",
            (int)"dsd",
            (int)"d1d",
            (int)"d789"
        ];
        echo "\r";
        var_dump($x);
        ?>
    </pre>
</p>

<h3>float/double/real</h3>
<p>
    Данные числа могут быть представлены следующим образом(посмотрите код страницы):
    <pre>
        <?php
        $a_fl = 1.234;
        $b_fl = 1.2e4;
        $c_fl = 7E-10;
        echo "\r{$a_fl}\t{$b_fl}\t{$c_fl}\t\n\r";
        var_dump($a_fl, $b_fl, $c_fl);
        ?>
    </pre>
</p>

<h3>string</h3>
<p>
В строке один символ - 1 байт. PHP поддерживает только 256 различных символов, нет встроенной поддержки юникода.<br>
Строковый тип реализован в виде массива байт и целого числа, обозначающую длину буфера.<br>
Строки кодируются в той же кодировке, что и сам файл. То есть, если файл кодируется UTF-8, то и строки будут UTF-8.<br>
Однако, это не будет работать при включённом режиме Zend Multibyte.
</p>

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
