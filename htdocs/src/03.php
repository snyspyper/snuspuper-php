<?php require_once "header.php" ?>
<button>
    <a href="02.php">Previous Lvl</a>
</button>
<button>
    <a href="04.php">Next Lvl</a>
</button>

<h2>Константы</h2>

<h3>Определение:</h3>
<p>
    <pre><?php
        define("FOO", "bar");
        define("BAR", 12);
    ?>
    <font color="magenta">define</font>(<font color="orange">"FOO"</font>, <font color="orange">"bar"</font>);
    <font color="magenta">define</font>(<font color="orange">"BAR"</font>, <font color="orange">12</font>);
    </pre>
    Теперь у нас есть две константы: <font color="#5555aa"> FOO </font> со значением <font color="orange"> bar </font> и <font color="#5555aa"> BAR </font> со значением <font color="orange"> 12 </font>.
</p>

<hr>

<h3>Предопределённые константы</h3>
<p>
<font size="3">
<ol type="square">
    <li><font color="#5555aa">PHP_VERSION</font> (<font color="green">string</font>) Текущая версия PHP в виде строки в формате <font color="orange">"major.minor.release[extra]"</font>(прим. 5.2.7-extra). Текущая версия <font color="#dd11aa"><?= PHP_VERSION; ?></font></li>
    <li><font color="#5555aa">PHP_MAJOR_VERSION</font> (<font color="green">int</font>) Текущая "основная" (major) версия PHP в виде целого числа.</li>
    <li><font color="#5555aa">PHP_MINOR_VERSION</font> (<font color="green">int</font>) Текущая "промежуточная" (minor) версия PHP в виде целого числа.</li>
    <li><font color="#5555aa">PHP_RELEASE_VERSION</font> (<font color="green">int</font>) Текущая "релиз"-версия (release) PHP в виде целого числа.</li>
    <li><font color="#5555aa">PHP_VERSION_ID</font> (<font color="green">int</font>) Текущая версия PHP в виде целого числа, её удобно использовать при сравнениях версий(прим 50207).</li>
    <li><font color="#5555aa">PHP_EXTRA_VERSION</font> (<font color="green">string</font>) Текущая "экстра"-версия PHP в виде строки (например, '-extra' для версии "5.2.7-extra").
            Обычно используется в различных дистрибутивах для индикации версий пакетов.</li>
    <li><font color="#5555aa">PHP_ZTS</font> (<font color="green">int</font>)</li>
    <li><font color="#5555aa">PHP_DEBUG</font> (<font color="green">int</font>)</li>
    <li><font color="#5555aa">PHP_MAXPATHLEN</font> (<font color="green">int</font>) Максимальная длина файловых имён (включая путь), поддерживаемая данной сборкой PHP.</li>
    <li><font color="#5555aa">PHP_OS</font> (<font color="green">string</font>) Операционная система, под которую собирался PHP.</li>
    <li><font color="#5555aa">PHP_OS_FAMILY</font> (<font color="green">string</font>) Семейство операционных систем, для которых собран PHP.
            Любая из 'Windows', 'BSD', 'Darwin', 'Solaris', 'Linux' или 'unknown'.</li>
    <li><font color="#5555aa">PHP_SAPI</font> (<font color="green">string</font>) API сервера (Server API) данной сборки PHP. Смотрите также <font color="magenta">php_sapi_name()</font>.</li>
    <li><font color="#5555aa">PHP_EOL</font> (<font color="green">string</font>) Корректный символ конца строки, используемый на данной платформе.</li>
    <li><font color="#5555aa">PHP_INT_MAX</font> (<font color="green">int</font>) Максимальное целое число, поддерживаемое данной сборкой PHP.
            Обычно это <font color="green">int</font>(<font color="orange">2147483647</font>) в 32-битных системах и <font color="green">int</font>(<font color="orange">9223372036854775807</font>)
            в 64-битных. Доступно с PHP 5.0.5 Обычно, <font color="#5555aa">PHP_INT_MIN</font> === ~<font color="#5555aa">PHP_INT_MAX</font>.</li>
    <li><font color="#5555aa">PHP_INT_MIN</font> (<font color="green">int</font>) Минимальное целое число, поддерживаемое данной сборкой PHP.
            Обычно это <font color="green">int</font>(<font color="orange">-2147483648</font>) в 32-битных системах и <font color="green">int</font>(<font color="orange">-9223372036854775808</font>) в 64-битных.</li>
    <li><font color="#5555aa">PHP_INT_SIZE</font> (<font color="green">int</font>) Размер целого числа в байтах в текущей сборке PHP.</li>
    <li><font color="#5555aa">PHP_FLOAT_DIG</font> (<font color="green">int</font>) Количество десятичных цифр, которые могут быть округлены в <font color="green">float</font> и обратно без потери точности.</li>
    <li><font color="#5555aa">PHP_FLOAT_EPSILON</font> (f<font color="green">loat</font>) Наименьшее положительное число x, такое, что x + 1.0 != 1.0.</li>
    <li><font color="#5555aa">PHP_FLOAT_MIN</font> (<font color="green">float</font>) Наименьшее возможное положительное число типа <font color="green">float</font>.
            Если вам нужно наименьшее возможное отрицательное число типа <font color="green">float</font>, используйте - <font color="#5555aa">PHP_FLOAT_MAX</font>.</li>
    <li><font color="#5555aa">PHP_FLOAT_MAX</font> (<font color="green">float</font>) Максимальное возможное число типа <font color="green">float</font>.</li>
    <li><font color="#5555aa">DEFAULT_INCLUDE_PATH</font> (<font color="green">string</font>) <font color="#5555aa">_INSTALL_DIR</font> (<font color="green">string</font>)</li>
    <li><font color="#5555aa">PEAR_EXTENSION_DIR </font>(<font color="green">string</font>) <font color="#5555aa">EXTENSION_DIR</font> (<font color="green">string</font>)</li>
    <li><font color="#5555aa">PHP_BINDIR</font> (<font color="green">string</font>) Значение --bindir было установлено при настройке. В Windows это значение --with-prefix было установлено при настройке.</li>
    <li><font color="#5555aa">PHP_BINARY</font> (<font color="green">string</font>) Указывает путь к исполняемым файлам PHP во время выполнения скрипта.</li> 
    <li><font color="#5555aa">PHP_MANDIR</font> (<font color="green">string</font>) Указывает путь установки страниц документации man. Доступно с PHP 5.3.7.</li> 
    <li><font color="#5555aa">PHP_LIBDIR</font> (<font color="green">string</font>)</li> 
    <li><font color="#5555aa">DATADIR</font> (<font color="green">string</font>)</li> 
    <li><font color="#5555aa">SYSCONFDIR</font> (<font color="green">string</font>)</li> 
    <li><font color="#5555aa">LOCALSTATEDIR</font> (<font color="green">string</font>)</li> 
    <li><font color="#5555aa">CONFIG_FILE_PATH</font> (<font color="green">string</font>)</li> 
    <li><font color="#5555aa">CONFIG_FILE_SCAN_DIR</font> (<font color="green">string</font>)</li>
    <li><font color="#5555aa">SHLIB_SUFFIX</font> (<font color="green">string</font>) Суффикс, используемый для динамически линкуемых библиотек, таких как "so" (для большинства Unix-систем) или "dll" (Windows).</li>
    <li><font color="#5555aa">FD_SETSIZE</font> (<font color="green">string</font>) Максимальное количество файловых дескрипторов для системных вызовов.</li>
</ol>
    Далее идут константы ошибок, их много, поэтому их нет в моём документе.<br>
</font>
    Текущая версия PHP: <b> <?= PHP_VERSION;?> </b>
</p>

<hr>

<h3>Магические константы</h3>
Они меняют своё значение в зависимости от контекста. Например, <b>__LINE__</b> зависит от строки в скрипте, на которую указывает эта константа.
<font face="monospace" color="white">
<table border="1" bgcolor="#292529" bordercolor="#eeddee">
    <tr>
        <th><font color="#eeddee">__LINE__</font></th>
        <th><font color="#eeddee">Текущий номер строки</font></th>
    </tr>
    <tr>
        <th><font color="#eeddee">__FILE__</font></th>
        <th><font color="#eeddee">Полный путь и имя текущего файла с развёрнутыми симлинками.<br>Если используется внутри подключаемого файла, то возвращается имя данного файла</font></th>
    </tr>
    <tr>
        <th><font color="#eeddee">__DIR__</font></th>
        <th><font color="#eeddee">Директория файла. Возвращаемое имя директории не оканчивается на слеш, за исключением корневой директории.</font></th>
    </tr>
    <tr>
        <th><font color="#eeddee">__FUNCTION__</font></th>
        <th><font color="#eeddee">Имя функции или {closure} в случае анонимной функции</font></th>
    </tr>
    <tr>
        <th><font color="#eeddee">__CLASS__</font></th>
        <th><font color="#eeddee">Имя класса. Это имя содержит названия имён, в котором класс был объявлен(например, Foo\Bar)</font></th>
    </tr>
    <tr>
        <th><font color="#eeddee">__TRAIT__</font></th>
        <th><font color="#eeddee">Имя трейта. Содержит пространства имён, в котором трейт был объявлен</font></th>
    </tr>
    <tr>
        <th><font color="#eeddee">__METHOD__</font></th>
        <th><font color="#eeddee">Имя текущего класса</font></th>
    </tr>
    <tr>
        <th><font color="#eeddee">__NAMESPACE__</font></th>
        <th><font color="#eeddee">Имя текущего пространства имён</font></th>
    </tr>
    <tr>
        <th><font color="#eeddee">Classname::class</font></th>
        <th><font color="#eeddee">Полное имя класса</font></th>
    </tr>
</table>
<button>
    <a href="02.php">Previous Lvl</a>
</button>
<button>
    <a href="04.php">Next Lvl</a>
</button>

</font>
