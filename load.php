<?php
header('Content-Type: text/html; charset=utf-8'); //ставим кодировку

if (!empty($_GET['text'])) { //если в GET запрос пришёл, то не пустой text
    $re = '/<div class="container bx-content-seection">.*(?=<footer class="bx-footer">)/ms'; //описываем регулярку для парсинга содержимого блока 
    $str = file_get_contents('https://www.mebel-donbass.ru/search/?q='.urlencode($_GET['text']).''); //получаем весь сайт целиком

    preg_match($re, $str, $match); //применяем регулярку
    if (!$match) //если регулярка ничего не нашла, значит говорим, что ничего нет
    {
        echo "<p align='center'><b>Совпадений нет &#10008;</b></p>";
    }
    else
        echo $match[0]; //выводим совпадения

    return;
}
?> 