<?

	function get_external($url)
	{
		$ch = curl_init();
		$timeout = 10;
		curl_setopt($ch, CURLOPT_URL, $url);
		//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

	header('X-COMP-490: rj970793');
	
	$page_title = "Ramin's Primer Project";
	$external_url = 'http://www.csun.edu/~jeffw/';
	$current_date = date('d/m/Y H:i:s');
	$http_host = $_SERVER['HTTP_HOST'];
	$querystrig = $_SERVER['QUERY_STRING'];
	$request_method = $_SERVER['REQUEST_METHOD'];
	$request_uri = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= $page_title ?></title>
	<base href="<?= $external_url ?>" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
	<style>
		body { font: 125%; }
		#external-content 
		{ 
			margin: 0 auto;  
			width: 60%;
			border: 1px solid #000;
			overflow: auto;
		}
	</style>
</head>
<body>
<div class="container-fluid">
	<h1><?= $page_title ?></h1>

	<p>Welcome to my page!</p>
	<p>The time on the server is <span class="alert alert-info"><?= $current_date ?></span></p>
	<p>Here's a list of some server variables.  Noticed that <b>QUERY_STRING</b> value changes if you enter a different value for it.</p>

	<table class="table table-striped">
	<tr>
		<th>Server Vriable</th>
		<th>Value</th>
	</tr>
	<tr>
		<td>REQUEST_METHOD</td>
		<td><?= $request_method ?></td>
	</tr>
	<tr>
		<td>HTTP_HOST</td>
		<td><?= $http_host ?></td>
	</tr>
	<tr>
		<td>REQUEST_URI</td>
		<td><?= $request_uri  ?></td>
	</tr>
	<tr>
		<td>QUERY_STRING</td>
		<td class="alert alert-danger"><?= $querystrig  ?></td>
	</tr>
	</table>

	<p class="alert alert-warning">
		This is the content of Dr. Wiegley's homepage located at: <a href="<?= $external_url ?>" target="_blank"><?= $external_url ?></a>
	</p>
	<div id="external-content">
		<?= get_external($external_url); ?>
	</div>
</div>
</body>
</html>