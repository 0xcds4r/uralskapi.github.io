<br /><p style="text-align: center;"><strong>Добро пожаловать в документацию по SA-MP API!</strong></p>

<style>
.apifuncbox {
  padding-top: 4px;
  padding-bottom: 8px;
  padding-right: 8px;
  padding-left: 8px;
  -moz-box-sizing: border-box; 
  box-sizing: border-box;
}
</style>

<table width="100%" height="90%">
    <tr>
        <td style="vertical-align:top;" width="auto" bgcolor="#f5f5f5"><div class="btn-group"><div class="container"> <?php include("buttons.php"); ?> </div></div></td>
        <td style="vertical-align:top;" width="85%" bgcolor="#fafafa"><div class="apifuncbox" id="resultMsg"></div></td>
    </tr>
</table>

<script type="text/javascript">
<?php 
if(count($_GET) <= 0) {
    echo "document.getElementById('resultMsg').innerHTML = file_get_contents('welcome-page-api.php');";
}
else
{
    $currentPage = $_GET['show_page'];
    if(isset($currentPage))
    {
        echo "document.getElementById('resultMsg').innerHTML = file_get_contents('u/".md5($currentPage)."/index.php');";
    }
}
?>
</script>

<br style="clear:both;" />
<p style="text-align: left;">&nbsp;</p>
<table style="width: 100%; border-collapse: collapse; border-style: hidden;" border="1">