
<?php

$fileContent = file_get_contents('https://www.delfi.lt/');

$fileContent = str_replace('charset=UTF-8', 'Bebras', $fileContent);

echo $fileContent;





file_put_contents('file.txt', 'Are you done?');

