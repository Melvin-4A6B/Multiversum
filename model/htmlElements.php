<?php

class htmlElements {

	public function __construct() 
	{

	}

	public function sanitize($content)
	{

	$dom = html_entity_decode($content);
	$dom = preg_replace('#<script(.?)>(.?)</script>#is', '', $dom);
	$dom = strip_tags($dom, '<script>');
	$dom = htmlentities($dom);
	$dom = htmlspecialchars($dom);
	return $dom;
	}
}