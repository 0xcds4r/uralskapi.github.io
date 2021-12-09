<!-- Название функции -->
<font size=5>Android.storage_get_value</font>
<br /><br />
<b class="ulme">Описание:</b><br />
<div class="codedo"> Получить значение из хранилища. </div> <!-- Описание функции -->
<br />
<b class="ulme">Параметры:</b><br />
<div class="codedo"> String key - ключ </div> <!-- Параметры функции -->
<br />
<b class="ulme">Возвращаемые значения:</b><br />
<div class="codedo"> String - значение </div> <!-- Возвращаемые значения функции -->
<br />
<b class="ulme">Примеры:</b><br />
<div class="codedo"> Android.storage_set_value("weather", "rainy"); // Установим значение 'rainy' для ключа в 'weather' в хранилище.<br/>var weather = Android.storage_get_value('weather'); // Используя ключ, получим значение в переменную из хранилища.<br/>console.log(weather); // Выводим сообщение в консоль.<br/><br/>// Результат: rainy </div> <!-- Примеры использования функции -->
<br /><br />