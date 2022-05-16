<head>
    <title>Учи-мучи гачимучи</title>
</head>

<body leftmargin="50" rightmargin="50" topmargin="20" bottommargin="50">
<font size="+1" face="serif">

<h2>Немного основ синтаксиса</h2>
<p>
    PHP ищет открывающийся тэг php, затем обрабатывает и выполняет содержимое, до закрывающего тега. Потом он просто выводит всё, до следующего <br>
    тега php. Причём(надо посмотреть исходный код страницы):<br>
    <?php $flg = true;?>
    <?php if ($flg):   ?>
        Эта строчка отображается, так как условие истинно <br>
    <?php else:        ?>
        ... а эта отображается, так как условие ложно<br>
    <?php endif;       ?>
    <!-- так эффективнее  -->
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
        $b_int  = [
            [
                "Name"  => "Rina",
                "email" => "aboba@gmogus.sus",
                "bobux" => 420
            ]
        ];
        // $b_int = 12;
        $c_word = "word";

        echo "\r" . gettype($a_bool) . PHP_EOL;

        if (is_string($b_int))
            echo "Это строка";
        elseif (is_int($b_int))
            echo "Это число";
        else
            echo "Не знамо шо це, вывожу данные:" . PHP_EOL;
            echo var_dump($b_int) . PHP_EOL;
        echo PHP_EOL;

        ?>
    </pre>
    Для принудительного приведения типа можно использовать функцию <font color="magenta">settype()</font>.
    <pre>
        <?php
            settype($a_bool, "int");
            echo "Тип переменной a_bool -- " . gettype($a_bool) . "; значение = " . $a_bool . PHP_EOL;
        ?>
    </pre>
</p>

<hr>

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
    <b><pre>ПРИМ:</pre></b>
    <pre>
        <?php
            $a = "0";
            echo "\rТип элемента \"0\"(с кавычками) = " . gettype($a) . ". При переводе в boolean, значение равно ";
            settype($a, "boolean");

            if ($a) echo "YES";
            else echo "Ложь. Что забавно, значение переменной не выводится";
        ?>
    </pre>
</p>

<hr>

<h3>int</h3>
<p>
    Целые числа можно указать как в десятичной системе, так и в 16/8/2-ой.<br>
    Для записи двоичного числа, перед ним ставится <font color="orange">0b</font>, для восьмеричного - <font color="orange">0</font>, шестнадцатеричного - <font color="orange">0x</font>.
    <?php
        $a = array(0xAF, 123, 0b1010001, 017230);
        echo "\rПосмотрите тут код страницы\n";
    ?>
    <table border="4">
    <tr bgcolor="#dddddd" align="center">
        <td> <b> dec </b> </td>
        <td> <b> bin </b> </td>
        <td> <b> oct </b> </td>
        <td> <b> hex </b> </td>
    </tr>
    <tr align="center">
        <td>
            <?php foreach ($a as $key => $value): ?>
                <?= $value; ?><br>
            <?php endforeach;?>
            <?php unset($value); ?>
        </td>

        <td>
            <?php foreach ($a as $key => $value): ?>
                <?= decbin($value); ?><br>
            <?php endforeach;?>
            <?php unset($value); ?>
        </td>

        <td>
            <?php foreach ($a as $key => $value): ?>
                <?= decoct($value); ?><br>
            <?php endforeach;?>
            <?php unset($value); ?>
        </td>

        <td>
            <?php foreach ($a as $key => $value): ?>
                <?= dechex($value); ?><br>
            <?php endforeach;?>
            <?php unset($value); ?>
        </td>
    </tr>
    </table>
    <br>
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

    <?php $x = ["123xxx", "", "dsd", "d1d", "d789"]; ?>
    <table border="4">
        <tr align="center" bgcolor="#dddddd">
            <td><b> Строка </b></td> 
            <td><b> Число </b></td> 
        </tr>
        <tr align="center">
            <td>
                <?php foreach($x as $key => $value): ?>
                    <?= $value; ?><br>
                <?php endforeach; ?>
                <?php unset($value); ?>
            </td> 
            <td>
                <?php foreach($x as $key => $value): ?>
                    <?= (int)$value; ?><br>
                <?php endforeach; ?>
                <?php unset($value); ?>
            </td> 
        </tr>
    </table>
</p>

<h3>float/double/real</h3>
<p>
    Данные числа могут быть представлены следующим образом:
    <table border="1" rules="cols">
        <tr bgcolor="#dddddd">
            <td> <b> Записанное значение </b> </td>
            <td> <b> Обработанное php    </b> </td>
        </tr>
        <tr>
            <td> 1.234         </td>
            <td> <?= 1.234; ?> </td>
        </tr>
        <tr>
            <td> 1.2e4         </td>
            <td> <?= 1.2e4; ?> </td>
        </tr>
        <tr>
            <td> 7E-10         </td>
            <td> <?= 7E-10; ?> </td>
        </tr>
    </table>
</p>

<hr>

<h3>string</h3>
<p>
    В строке один символ - 1 байт. PHP поддерживает только 256 различных символов, нет встроенной поддержки юникода.<br>
    Строковый тип реализован в виде массива байт и целого числа, обозначающую длину буфера.<br>

    <a href="https://www.php.net/manual/ru/language.types.string.php#language.types.string.details">
        <img src="../images/see_here.jpg" border="2" vspace="2">
    </a> <br>

    Строки кодируются в той же кодировке, что и сам файл. То есть, если файл кодируется UTF-8, то и строки будут UTF-8.<br>
    Однако, это не будет работать при включённом режиме <b>Zend Multibyte</b>.<br>
    <b>СТРОКИ ТАКЖЕ ИНДЕКСИРУЮТСЯ, ПРИЧЁМ МОЖНО ИСПОЛЬЗОВАТЬ ОТРИЦАТЕЛЬНЫЕ ИНДЕКСЫ. Работает также, как в python</b><br>
    <b>Попытка записи символа за границами строки вызовут ошибку</b><br>
    <pre>
    <?php
        unset($a);
        $a = "Мать мыла раму";
        $b = "Rise and shine";
        //$a[42] = "И";

        echo $a        . PHP_EOL;
        echo $a[1]     . PHP_EOL;
        echo $a[-2]    . PHP_EOL;
        echo $b[2]     . PHP_EOL;
        echo $b[-1] . PHP_EOL;
        var_dump($a);
        var_dump($b);
    ?>
    </pre>
    Судя по всему, такой прикол работает только с латиницей.
</p>
<p>
    Строка может быть определена следующими способами:<br>
    <ul type="disk">
        <li>Одинарными кавычками</li>
        <li>Двойными кавычками</li>
        <li>heredoc</li>
        <li>nowdoc</li>
    </ul>

    Простейший способ определить строку - заключить её в одинарные кавычки. Чтобы в такой строке отобразить кавычку или другой спецсимвол,<br>
    нужно перед ней поставить бэкслеш. Управляющие последовательности для спецсимволов <i>не обрабатываются</i>.
    <pre>
        <?= '\r\nLol'; ?>
    </pre>
</p>
<p>
    <b>Heredoc</b>
</p>
<p>
    Если строка заключена в двойные кавычки, то PHP обрабатывает управляющие последовательности:<br>
    <table border="5">
    <tr>
        <td><b>Последовательность</b></td>
        <td><b>Значение</b></td>
    </tr>
    <tr>
        <td>\n</td>
        <td>новая строка (LF или 0x0A (10) в ASCII)</td>
    </tr>
    <tr>
        <td>\r</td>
        <td>возврат каретки (CR или 0x0D (13) в ASCII)</td>
    </tr>
    <tr>
        <td>\t</td>
        <td>горизонтальная табуляция (HT или 0x09 (9) в ASCII)</td>
    </tr>
    <tr>
        <td>\v</td>
        <td>вертикальная табуляция (VT или 0x0B (11) в ASCII)</td>
    </tr>
    <tr>
        <td>\e</td>
        <td>escape-знак (ESC или 0x1B (27) в ASCII)</td>
    </tr>
    <tr>
        <td>\f</td>
        <td>подача страницы (FF или 0x0C (12) в ASCII)</td>
    </tr>
    <tr>
        <td>\$</td>
        <td>знак доллара</td>
    </tr>
    <tr>
        <td>\"</td>
        <td>двойная кавычка</td>
    </tr>
    <tr>
        <td>\[0-7]{1,3}</td>
        <td>
            последовательность символов, соответствующая регулярному выражению символа в восьмеричной системе счисления,<br>
            который молча переполняется, чтобы поместиться в байт (т.е. "\400" === "\000")
        </td>
    </tr>
    <tr>
        <td>\x[0-9A-Fa-f]{1,2}</td>
        <td>последовательность символов, соответствующая регулярному выражению символа в шестнадцатеричной системе счисления</td>
    </tr>
    <tr>
        <td>\u{[0-9A-Fa-f]+}</td>
        <td>последовательность символов, соответствующая регулярному выражению символа Unicode, которая отображается в строка в представлении UTF-8</td>
    </tr>
    </table>
</p>
<p>
    <b>heredoc</b> и <b>nowdoc</b>(посмотрите код страницы)
    <pre>
    <?php
        $evo = <<<EOD
            СТрока строка строка строка
                                    с еодом
                        еод еод еод
            EOD;
        $ovo = <<<EOT
                Не строка с еодом
            Я еот
        EOT;
        echo "<br>{$evo}<br>{$ovo}";
    ?>
    <?php 
        // Без отступов
        echo <<<END
            a
                b
                c
        \n
        END;

        // С отступами
        echo <<<END
            a
                b
                c
            END;
    ?>
    </pre>
    Закрывающий идентификатор не должен иметь отступ больше, чем у любой строки внутри heredoc'а, иначе выбросится <font color="red">ParseError</font>
    <pre>
        <?php
            echo "\r";
            var_dump($evo, $ovo);
        ?>
    </pre>
</p>
<p>
    Строки изменяемы. Для того, чтобы изменить один символ, надо просто обратится к нему по индексу. Ведь строка в PHP - массив символов.<br>
    Для изменения более одного символа, есть функция <font color="magenta">substr_replace()</font>.<br><br>
    <font color="magenta">substr_replace   </font>(
        <font color="green">string         </font> <font color="orange">$str   </font>, 
        <font color="green">string         </font> <font color="orange">$restr </font>, 
        <font color="green">array </font> | <font color="green"> int </font> <font color="orange">$offset</font>, 
        <font color="green">array | int |null </font> <font color="orange">$length</font> = <font color="green"> null </font>): <font color="green"> string|array </font> <br>

    Заменяет часть строки <font color="orange">$str</font> от <font color="orange">$offset</font> до (необязательно) <font color="orange">$offset + $length</font> строкой <font color="orange">$restr</font>
    <br><br>
    
    <font color="magenta"> substr     </font> (
        <font color="green"> string   </font> <font color="orange"> $str    </font>,
        <font color="green"> int      </font> <font color="orange"> $offset </font>,
        <font color="green"> int      </font> | <font color="green"> null </font> <font color="orange"> $length </font> = <font color="green"> null </font>) : <font color="green"> string </font> <br>

    Возвращает подстроку строки <font color="orange">$str</font>, начинающейся с позиции <font color="orange">$offset</font> и длинной <font color="orange">$length</font>.
    <pre>
    <?php
        $a = "Speech has allowed the communication of ideas\nEnabling human beings to work together, to built the impossible.";
        $b = "Coca-cola forever";

        echo "\rИзначальные строки: \$a = '$a', \$b = '$b'" . PHP_EOL;
        echo "\rsubstr_replace: " . substr_replace($a, $b, 4, 8) . PHP_EOL;
        echo "\rsubstr: " . substr($a, 3, 7) . PHP_EOL;
    ?>
    </pre>
</p>

<hr>

<h3>Числовые строки</h3>
<p>
    В PHP числовой строкой является та, которую можно интерпретировать как ц/ч или число с плавающей точкой.<br>
    <i>Префиксной</i> числовой строкой является та, которая начинается с последовательности чисел и продолжается любыми символами.<br>
    Когда строку необходимо использовать в качестве числа(например, в арифмитических операциях), то происходит следующий алгоритм действий:<br>
    <ol type="1">
        <li>Если строка числовая, представляет число и не превышает максимально возможное для int, то она конвертируется в него, иначе - в float.</li>
        <li>Если строка префиксная числовая, то проверяется уже начало, если ни одно из условий не выполняется, то выводится ошибка <b>E_WARNING</b>.</li>
        <li>Если строка не числовая, то выбрасывается исключение <b>TypeError</b>.</li>
    </ol>
</p>

<hr>

<h3> Массив </h3>
<p>
    Определение при помощи <font color="magenta"> array() </font> <br>
    <pre>
    array(
        key1 => value1,
        key2 => value2,
        ...
    )

    [
       ...
    ]
    </pre>

    Запятая в конце не обязательна, однако в многострочных она используется, чтобы легче добавлять новые элементы в конец массива. 
    <font color="orange"> key </font> может быть либо типа <font color="green"> int </font>, либо <font color="green"> string </font>. <font color="orange"> value </font> -- любого
    <pre><?php
        $ar = [
            "foo" => "bar",
            "lol" => "kek",
            23    => "fly",
        ];

        var_dump($ar);
    ?></pre>

    С ключом <font color="orange"> key </font> будут сделаны следующие преобразования:
    <ol>
        <li> <font color="green"> string </font>, содержащие <font color="green"> int </font>(кроме тех, которые предвараются знаком +) будут преобразованы в <font color="green"> int </font>. "8" --> 8. "08" -x> 8 , так как оно не является корректным десятичным целым. </li>
        <li> <font color="green"> float </font> также --> в <font color="green"> int </font>, то есть дробная часть будет отброшена. 8.17 --> 8 </li>
        <li> тип <font color="green"> bool </font> --> <font color="green"> int </font>.<font color="orange"> true </font> --> 1 и <font color="orange"> false </font> --> 0 </li>
        <li> <font color="green"> null </font> --> пустой строке. ключ со значением <font color="green"> null </font> --> "" </li>
        <li> если ключем сделать массив или объект, то сгенерится предупреждение:<font color="red"> Illegal offset type </font> </li>
    </ol>

    <pre><?php
        $array = [
            1    => "a",
            "1"  => "b",
            1.5  => "c",
            true => "d",
        ];
        var_dump($array);
    ?></pre>
    Прикол в том, что все ключи преобразуются к 1, значение будет перезаписано на каждый новый элемент и останется только последнее присвоенное значение "d".
    PHP не делает различия между индексированными и ассоциативными массивами.

    <pre><?php
        $array =
        [
            "foo" => "bar",
            "bar" => "foo",
            100   => -100,
            -100  => 100,
        ];
 
        var_dump($array);
    ?></pre>
    Параметр <font color="orange"> key </font> не обязателен. Если он не указан, PHP будет использовать предыдущее наибольшое значение ключа типа <font color="green"> int </font>, увеличенное на 1.

    <pre><?php
        $ar = array("foo", "bar", "hello");
        var_dump($ar);
    ?></pre>

    Можно указать ключ только для некоторых элементов и пропустить для других:
    <pre><?php
        $array = array(
                 "a",
                 "b",
            6 => "c",
                 "d",
        );
 
        var_dump($array);
    ?></pre>

    <h4> Расширенный пример преобразования типов и перезаписи элементов </h4>

    <pre><?php
        $array = [
            1     => 'a',
            '1'   => 'b', // перезапишет 'a'
            1.5   => 'c', // перезапишет 'b'
            -1    => 'd',
            "01"  => 'e',
            true  => 'f', // перезапишет 'c'
            false => 'g',
            ''    => 'h',
            null  => 'i', // перезапишет 'h'
            'j',          // назначен ключ 2
            2     => 'k', // перезапишет 'j'
        ];
        var_dump($array);
    ?></pre>

    <h4> Доступ к элементам массива </h4>
    <pre><?php
        $mom = [
            "foo" => "bar",
            "multi" => [
                "dimensional" => [
                    "a" => "foo"
                ],
            ],    
        ];
 
        var_dump($mom["foo"]);
        var_dump($mom["multi"]["dimensional"]["a"]);
        //$mom["foo"] и $mom{"foo"} однозначны
    ?></pre>

    <h4> Разыменование массива </h4>

    <pre><?php
        function getArray() {
            return array(1, 2, 3);
        }
 
        $secondLife = getArray()[1];
 
        // или так
        list(, $secondElement, $doub) = getArray();
        var_dump($secondLife, $secondElement, $doub);
 
    ?></pre>

    Массив, разыменовывающий скалярное значение, которое не является <font color="green"> string </font>, отдаст <font color="green"> null </font>. С PHP 8.0.0 выдаётся ошибка <font color="red"> E_WARNING </font>.
    <pre><?php
        // $a = 1[0]; -- за такое руки отрывают
        $a = "cock"[0]; // А за это нет
    ?></pre>

    <h4> Создание/модификация массива </h4>

    Существующий массив может быть изменён путём явной установкой значений в него. Кроме того, ключ можно опустить. <br>
    Для изменения определённого значения присваиваем новое значение, используя его ключ. Чтобы удалить пару ключ/значение, надо использовать <font color="magenta"> unset() </font>.

    <pre><?php
        $arr = array(
            5  => 1,
            12 => 2,
        );
    
        $arr[] = 56; //добавит в существующий массив ключ 13 со значением 56
    
        $arr["x"] = 42; // добавит в массив ключ "x" со значением 42
    
        var_dump($arr);
    
        echo PHP_EOL;
        echo "Теперь удалим пару с ключом '5'";
        echo PHP_EOL;
        echo PHP_EOL;
    
        unset($arr[5]); // удалит пару 5 => 1
    
        var_dump($arr);
    
        echo PHP_EOL . "Теперь, удалим массив полностью" . PHP_EOL;
    
        unset($arr);
    ?></pre>

    Однако, стоит ещё учесть, что максимальное целое значение ключа не обязательно существует в массиве в данный момент. Оно могло существовать какое-то время, с тех пор,
    как он был переиндексирован в последний раз.

    <pre><?php
        $lmao = [1, 2, 3, 4, 5];
        echo "Изначальный массив: "; 
        print_r($lmao);
        echo PHP_EOL;
    
        // Теперь удаляем каждый элемент, но сам массив оставляем нетронутым
        foreach ($lmao as $i => $value)
        {
            unset($lmao[$i]);
        }
        echo "Удалили каждый элемент: ";
        print_r($lmao);
        echo PHP_EOL;
    
        // Добавим элемент(однако новый ключ будет 5, вместо 0)
        $lmao[] = 6;
        echo "Добавили новый элемент, однако, новый ключ '5', а не '0': ";
        print_r($lmao);
        echo PHP_EOL;
    
        // Переиндексация:
        $lmao = array_values($lmao);
        $lmao[] = 7;
        echo "При помощи 'array_values($arr)' выполнили переинденсакцию и добавили новый элемент: ";
        print_r($lmao);
        echo PHP_EOL;

    ?></pre>

    То есть, функция <font color="magenta"> unset() </font> удаляет ключи массива но <b>НЕ</b> переиндексирует его.
    А для того, чтобы "удалить и сдвинуть", можно переиндексировать при помощи <font color="magenta"> array_values() </font>.

</p>

<h4>Что можно/нельзя делать с массивами</h3>
<p>
    <pre>$foo[bar]</pre> неверно, так как в этом случае [bar] -- неопределённая константа. Конечно, оно может сработать, так как PHP преобразует голую строку с её значением.
    Однако, если где-то будет определена константа bar, то ключом будет её значение.
</p>

<h4>Сравнение массивов</h4>
<p> Массивы можно сравнивать при момощи функции <font color="magenta"> array_diff() </font> и оператора массивов. </p>
</pre>

<hr>

<h3>Итерируемые</h3>
<p>
    Это псевдотип, принимающий любой массив или объект. Используется в цикле <font color="magenta"> foreach </font>, можно использовать с <font color="magenta"> yeld from </font> в генераторах.<br>
    Он может использоваться, как тип параметра указания, что функция принимает набор значений, но форма ей не важна, пока будет использоваться цикл <font color="magenta"> foreach </font>.
    <pre><?php
        function foo(iterable $iterable) {
            foreach($iterable as $value)
                echo "{$value} ";

        }
        
        function bar(int $x): iterable {
            $arr = [];
            for($i = 1; $i <= $x; $i++)
                array_push($arr, $i**2);
            return $arr;
        }

        echo "\r";
        foo(array(1, 2, 3, 4, 5, "A", "b", "o", "b", "a", "!", "!"));
        echo PHP_EOL;
        var_dump(bar(4));
    ?></pre>
</p>

<hr>

<h3>resource</h3>
<p>
    Специальная переменная, содержащая ссылку на внешний ресурс. Они создаются и используются специальными функциями.<br>
    Данный тип содержит специальные указатели на открытые файлы, соединения с базой данных, области изображения, и тому подобное.<br>
    Преобразовать этот тип никак нельзя.<br>
    <a href="https://www.php.net/manual/ru/resource.php">Все типы ресурсов</a><br>
</p>

<hr>

<h3>NULL</h3>
<p>
    Специальное значение, не имеющее значения :D. Переменная считается <font color="green"> null </font>, если:
    <ul type="disk">
        <li>ей была присвоена константа <font color="green"> null </font></li>
        <li>не было присвоено никакого значения</li>
        <li>была удалена при помощи <font color="magenta"> unset() </font></li>
    </ul>
</p>

<hr>

<!--
<h3>Функции обратного вызова(callback)</h3>
<p>
    Такие функции могут быть объявлены типом <b>callable</b>.<br>
    Некоторые функции... Я пока-что не понимаю, что это.
</p>
-->
<button><a href="02.php">Next Lvl</a></button>
</body>
