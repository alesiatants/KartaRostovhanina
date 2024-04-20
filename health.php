<?php
include("head.php");
$document = 'https://2gis.ru/rostov/search/Больницы/rubricId/201';
$fileContent = file_get_contents($document); # Получаем содержимое документа
    
    /**
     * Теперь же в переменной $file у нас содержится содержимое страница @url $document
     *
     * Вывести содержимое можно любым удобным для вас способом, к примеру оператором echo
     */
    echo $fileContent;
?>


<?php
include("footer.php");
?>