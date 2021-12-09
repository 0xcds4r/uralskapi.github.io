<!-- Название функции -->
<font size=5>Android.sendSAMPDialogResult</font>
<br /><br />
<b class="ulme">Описание:</b><br />
<div class="codedo"> Отправить DialogResponse на сервер. </div> <!-- Описание функции -->
<br />
<b class="ulme">Параметры:</b><br />
<div class="codedo"> 1) int byteButtonID - отправить - 1 / отменить - 0<br/>2) int wListBoxItem - ID выбранного list item (значение по умолчанию: -1)<br/>3) String szInput - значение строки ввода </div> <!-- Параметры функции -->
<br />
<b class="ulme">Возвращаемые значения:</b><br />
<div class="codedo"> void </div> <!-- Возвращаемые значения функции -->
<br />
<b class="ulme">Примеры:</b><br />
<div class="codedo"> Android.sendSAMPDialogResult(1, -1, "password"); // отправить DialogResponse для password/input style<br/>Android.sendSAMPDialogResult(1, 228, "228"); // отправить DialogResponse для list/tablist/tablist headers style<br/>Android.sendSAMPDialogResult(1, -1, ""); // отправить DialogResponse для msg box style<br/>Android.sendSAMPDialogResult(0, -1, ""); // отправить DialogResponse cancel </div> <!-- Примеры использования функции -->
<br /><br />