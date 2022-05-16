<head>
    <title>Учи-мучи гачимучи</title>
</head>

<body leftmargin="50" rightmargin="50" topmargin="50" bottommargin="50">
<font face="serif" size="+1">
<button>
    <a href="III.php">Previous Lvl</a>
</button>
<button>
    <a href="V.php">Next Lvl</a>
</button>

<h2>Выражение</h2>
Всё что угодно, возвращающее результат<br>
Скалярные значения - значения, которые нельзя разбить на меньшие части, в отличие, например, от массивов.<br>
По сути, любое действие в PHP является выражением. То есть, '$a = 5' уже является само собой выражением, значение которого является 5. <br>
Таким образом, выражение $b = ($a = 5) эквивалентно $a = 5; $b = 5; или $b = $a = 5;

<h3>Инкремент/декремент</h3>
<pre>
<?php
    $x = 0;
    $b = $x++; // то есть, переменная приращивается только после строчки/опреации.
    $a = $x;
    echo "$b, $a" . PHP_EOL;
?>
</pre>

<h3>Операторы</h3>
=== - оператор строго равенства(равно и одного) типа)
!== - не равно или не одного типа
<pre>                                         
<?php
    $one = 4 === "4";
    $two = 4  == "4";
    echo "$one and $two" . PHP_EOL;
?>
</pre>

<h3>Тернарная операция</h3>
<pre>
<?php
    $a = $a > $b ? 50 : 30;
    echo "$a" . PHP_EOL;
?>
</pre>
<button>
    <a href="III.php">Previous Lvl</a>
</button>
<button>
    <a href="V.php">Next Lvl</a>
</button>
