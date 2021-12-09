<btn class="btn-group button" onClick="redirect('/dev/api/pages/webhelper/');">Web Helper</btn> <br />

<?php

$files1 = scandir("u/");

foreach ($files1 as $value) 
{
	if($value == "." || $value == "..") {
		continue;
	}

	referExec($value);
}

function loadPageEx($name)
{
	$function_name = file_get_contents("u/" . $name . "/function_name.txt");
	$function_desc = file_get_contents("u/" . $name . "/function_desc.txt");
	$function_params = file_get_contents("u/" . $name . "/function_params.txt");
	$function_ret = file_get_contents("u/" . $name . "/function_ret.txt");
	$function_exs = file_get_contents("u/" . $name . "/function_exs.txt");

	$format = file_get_contents("page_sample.php");

	return $format;
}

function referExec($value)
{
	$file = "u/" . $value . "/index.php";
	$function_name = file_get_contents("u/" . $value . "/function_name.txt");
	$function_desc = file_get_contents("u/" . $value . "/function_desc.txt");
	$function_params = file_get_contents("u/" . $value . "/function_params.txt");
	$function_ret = file_get_contents("u/" . $value . "/function_ret.txt");
	$function_exs = file_get_contents("u/" . $value . "/function_exs.txt");

	$hashesFuncName = md5($function_name);
	$data = (loadPageEx($hashesFuncName));
	$result = sprintf($data, $function_name, $function_desc, $function_params, $function_ret, $function_exs);
	$pathDeNoCr = "u/".$function_name."/index.php";
	$pathDe = "u/".md5($function_name)."/index.php";
	file_put_contents($pathDe, $result);

	$data_script = "<btn class=\"btn-group button\" onClick=\"redirect('/dev/api/pages/webhelper/?show_page=". $function_name . "');\">" . $function_name . "</btn><br />";
	echo $data_script;
}

?>

