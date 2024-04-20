<?php
include("head.php");
$document = 'https://dzen.ru/news/region/rostov-na-donu';
 # Ссылка на документ
    $fileContent = file_get_contents($document); # Получаем содержимое документа
    
    /**
     * Теперь же в переменной $file у нас содержится содержимое страница @url $document
     *
     * Вывести содержимое можно любым удобным для вас способом, к примеру оператором echo
     */
    echo $fileContent;
include("footer.php");
?>