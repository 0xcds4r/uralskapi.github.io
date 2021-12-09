<?php error_reporting(0); include ("../../elements/header.php");

function createPage($path, $info)
{
	file_put_contents($path, $info);
}

function addPageInfo($path, $info)
{
	$str = file_get_contents($path);
	if(!stripos($str, $info)) {
		file_put_contents($path, file_get_contents($path) . $info);
	}
}

function createPath($path) {
    if (is_dir($path)) return true;
    $prev_path = substr($path, 0, strrpos($path, '/', -2) + 1 );
    $return = createPath($prev_path);
    return ($return && is_writable($prev_path)) ? mkdir($path) : false;
}

function checkSpecialChars($value)
{
	$value = str_replace("[p]", "<p>", $value);
	$value = str_replace("[/p]", "</p>", $value);
	$value = str_replace("[/n]", "<br/>", $value);

	return $value;
}

function addFunctionInAPIList($function_name, $description, $params, $retInfo, $examples)
{
	$description = checkSpecialChars($description);
	$params = checkSpecialChars($params);
	$retInfo = checkSpecialChars($retInfo);
	$examples = checkSpecialChars($examples);

	$hashesFuncName = md5($function_name);
	createPath("u/" . $hashesFuncName . "/");
	createPage("u/" . $hashesFuncName . "/function_name.txt", $function_name);
	createPage("u/" . $hashesFuncName . "/function_desc.txt", $description);
	createPage("u/" . $hashesFuncName . "/function_params.txt", $params);
	createPage("u/" . $hashesFuncName . "/function_ret.txt", $retInfo);
	createPage("u/" . $hashesFuncName . "/function_exs.txt", $examples);
}

function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}

function removeFunctionFromAPIList($function_name)
{
	$hashesFuncName = md5($function_name);
	$path = "u/" . $hashesFuncName . "/";
	if (! is_dir($path)) {
		echo "<script>alert('Unknown api function!');</script>";
		return;
	}
	deleteDir($path);
}

function execGETReq()
{
	if($_GET['code'] == "add")
	{
		if( isset($_GET['name']) && 
			isset($_GET['desc']) && 
			isset($_GET['params']) && 
			isset($_GET['ret']) && 
			isset($_GET['exs'])) 
		{
			if(isset($_GET['key']) && $_GET['key'] == "ZGHAZN389103148515DNF8") {
				addFunctionInAPIList($_GET['name'], $_GET['desc'], $_GET['params'], $_GET['ret'], $_GET['exs']);
			}
		}
	}

	if($_GET['code'] == "del")
	{
		if(isset($_GET['key']) && $_GET['key'] == "ZGHAZN389103148515DNF8") {
			$function_name = $_GET['name'];
			removeFunctionFromAPIList($function_name);
		}
	}
}

execGETReq();

?>

<!-- начало тела -->
<?php include ("main_page.php");?>
<!-- Конец тела -->

<!-- начало футера (footer.php) -->
<?php include ("../../elements/footer.php");?>
<!-- Конец футера -->