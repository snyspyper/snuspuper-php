<?php
$dirlist = scandir($_SERVER["DOCUMENT_ROOT"] . "/src");

?>
<html>
  <head>
    <title>Kek</title>
  </head>
  <body>
      <?php foreach ($dirlist as $key => $value): ?>
        <a href="<?= '/src/' . $value; ?>"><?= $value ?></a><br>
      <?php endforeach; ?>
  <body>
</html>
