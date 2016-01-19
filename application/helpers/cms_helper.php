<?php

function add_meta_title ($string)
{
	$CI =& get_instance();
	$CI->data['meta_title'] = e($string) . ' - ' . $CI->data['meta_title'];
}
function seoUrl($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}
function decodeseoURL($string){
	 //Convert whitespaces and underscore to dash
    $string = preg_replace("/[-]/", " ", $string);
    return $string;
}
function btn_edit ($uri)
{
	return anchor($uri, '<i class="glyphicon glyphicon-edit"></i>',array(
		'class'=>"dark-limegreen-link",
	));
}

function btn_delete ($uri)
{
	return anchor($uri, '<i class="glyphicon glyphicon-trash" title="Delete"></i>', array(
		'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?')",
		'class'=>"dark-limegreen-link",
	));
}
function btn_permit ($uri)
{
	return anchor($uri, '<i class="glyphicon glyphicon-lock"></i>', array(
		'class'=>"dark-limegreen-link",
	));
}
function image_path($path)
{
	return("http://localhost//codeigniter-LessonLearned/public_html/".$path);
}
function perm_converter($number){
	if($number>7){	
		return('Administrator');}
	elseif($number>=4 && $number<=7)
		{return('Developer');
	}elseif($number>=1 && $number<=3)
	{return('User');}
	else{return('User');}
}


function limit_to_numwords($string, $numwords){
	$excerpt = explode(' ', $string, $numwords + 1);
	if (count($excerpt) >= $numwords) {
		array_pop($excerpt);
	}
	$excerpt = implode(' ', $excerpt);
	return $excerpt;
}


function e($string){
	return htmlentities($string);
}




if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}