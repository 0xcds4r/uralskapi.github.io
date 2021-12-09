<?php 

include ("../../elements/header.php");

session_start(); /* Starts the session */

if(!isset($_SESSION['session']))
{
	header("location: ../index.php?error=0");
	exit;
}
else
{
	if($_SESSION['session'] != "94377c156735b39dfa4ac607234cb87c") {
		header("location: ../index.php?error=1");
		exit;
	}
}
?>

<div class="container">
<h2>URALSK WIKI ADMIN PANEL</h2>
<a href="logout.php">Logout</a>
<strong>Auth success!</strong> <br /> <br />
<strong>Edit wiki:</strong> <br />
<div class="container">
<b>Локация:</b><br />
<input type="checkbox" id="whcheck" name="whcheck" checked /> <label for="whcheck">Web Helper API</label>
<input type="checkbox" id="sacheck" name="sacheck" /> <label for="sacheck">SA-MP API</label> <br />

<button onClick="insertSpecialChars(0)" style="width:100%;height:3%;">NL</button> <br /> <br />
<button onClick="insertSpecialChars(2)" style="width:100%;height:3%;">P</button> <br /> <br />
<b>Заголовок</b>
<textarea id="title_post" rows="8" style="width: 100%; height: 3%" autocomplete="off"></textarea>
<b>Описание</b>
<textarea id="desc_post" rows="8" style="width: 100%" autocomplete="off"></textarea>
<b>Параметры</b>
<textarea id="params_post" rows="8" style="width: 100%" autocomplete="off"></textarea>
<b>Возвращаемые значения</b>
<textarea id="ret_post" rows="8" style="width: 100%" autocomplete="off"></textarea>
<b>Примеры</b>
<textarea id="exs_post" rows="8" style="width: 100%" autocomplete="off"></textarea>

<button onClick="addFuncInAPIListFromPost()" style="width:100%;height:3%;">Create post</button> <br />
</div>

<?php include ("../../elements/footer.php"); ?>