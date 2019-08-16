<?php
// file that contains only html elements
//parsing by icnludes/functions/parseTemplate()

$templates = array();

$templates['div'] = "<div class='{class}'>{text}</div>";
$templates['a'] = "<a class='{class}' href='{href}'>{text}</a>";
$templates['a_new_window'] = "<a class='{class}' href='{href}' target='_blank'>{text}</a>";
$templates['table'] = "<table class='{class}'>{data}</table>";
$templates['th'] = "<th colspan='{colspan}'>{data}</th>";
$templates['tr'] = "<tr>{data}</tr>";
$templates['td'] = "<td>{data}</td>";


$templates['form'] = "
<form action='{action}' method='{method}'>
  <input type=submit value='{btn_text}' name='submit'>
</form>";





$templates['html_body'] = 
"<html>
	<head>
		<title>{title}</title>
		<link rel='stylesheet' type='text/css' href='styles/style.css?" . time() . "'>
	</head>
	<body>
	{content}
	</body>
</html>";





 ?>