<?php 

function parseTemplate($template, $parameters = array())
{	
	foreach ($parameters as $key => $value) {
		$keyPlaceholder = '{' . $key . '}';
		$template = str_replace($keyPlaceholder, $value, $template);
	}

	return $template;
}



function body($content)
{
	global $templates;

	$current_page = ucfirst(str_replace('.php', '', basename($_SERVER['PHP_SELF'])));
	$body = parseTemplate($templates['html_body'], array('title' => $current_page, 'content' => $content));

	return $body;
}

function footer($content)
{
	$footer = '';
	return $footer;
}

//function to render body and close connection to DB
function render($body, $footer)
{
	global $database;
	
	echo $body;
	echo $footer;

	$database->close();
}

?>