<?php
// file that contains only html elements
//parsing by icnludes/functions/parseTemplate()

$templates = array();

$templates['div'] = "<div class='{class}'>{text}</div>";


$templates['form'] = "
<form action='{action}' method='{method}'>
  <input type=submit value='{btn_text}' name='submit'>
</form>";





$templates['html_body'] = 
"<html>
	<head>
		<title>{title}</title>
		<link rel='stylesheet' type='text/css' href='styles/style.css'>
	</head>
	<body>
	{content}
	</body>
</html>";





 ?>