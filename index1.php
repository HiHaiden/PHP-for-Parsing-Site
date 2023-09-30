<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>AJAX</title>
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' type='text/css' /> <!-- Берём стили с сайта -->
</head>
<body style="background: white;">
<style type="text/css">
    .input_search {
        border: 3px solid rgb(220, 20, 60) !important;
        border-radius: 12px  !important;
        width: 32%  !important;
        margin: 12px  !important;
    }
</style>
<table width="100%">
    <tr>
        <td style="text-align: center"><input type="text" class="input_search" name="text" id='search' placeholder="Начните поиск &#10004;" onkeyup="keyup()"></td>
    </tr>
    <tr>
        <td id="content_table"><!-- Тут будет размещён полученный результат --></td>
    <tr>
</table>
</body>
<script type="text/javascript">
    function keyup() { //AJAX функция
        var xhttp;
        xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange = function() { //определяем код исполняемый при изменении стадии запроса
            if (this.readyState == 4 && this.status == 200) { //если операция завершена и ответ сервера 200
                load_update(this); //исполняем функцию записи данных в ячейку
            }
        };
        xhttp.open("GET", 'load.php?text=' + document.getElementById('search').value, true);
        xhttp.send();
        console.log(document.getElementById('search').value)
    }

    function load_update(xhttp) {
        var re = /\/сatalog\//gi; 
        var newstr = xhttp.responseText.replace(re, 'https://www.mebel-donbass.ru/assets/');
        document.getElementById("content_table").innerHTML = newstr; //помещаем наш результат 
    }
</script> 
</html> 